<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->library('grocery_CRUD');
    }

    function login()
    {
        $this->template->load('login_master','login');
    }

    function loginAction()
    {
        $app = new App();
        $userCode = $_POST['user_code'];
        if(!empty($userCode)) {
            $userData = $app->checkUserCode($userCode);
            if(empty($userData)){
                $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);">User Code Not Available</div>');
                redirect("users/login");
            }else{
                $email = $userData->email;
                $password = trim($_POST['password']);
                $remember = TRUE;
                $login = $this->ion_auth->login($email, $password, $remember);
                if($login) {
                    redirect("users/applyVoucher");
                }else{
                    $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);">User Code Not Available</div>');
                    redirect("users/login");
                }
            }
        }
    }

    function applyVoucher()
    {
        if ($this->ion_auth->logged_in() != 1) {
            redirect(base_url());
        }
        $app = new App();
        $voucherCode = trim($_GET['code']);
        if(empty($voucherCode)){
            $data['voucher'] = '';
        }else{
            $data['voucher'] = $app->getVoucher($voucherCode);
        }

        $voucher = trim($_GET['voucher']);
        if(empty($voucher)){
            $data['voucherData'] = '';
        }else{
            $data['voucherData'] = $app->getVoucher($voucher);
        }
        $this->template->load('login_master','applyVoucher',$data);
    }

    function applyVoucherAction()
    {
        if ($this->ion_auth->logged_in() != 1) {
            redirect(base_url());
        }
        $app = new App();
        $main = new Main();
        $voucherNumber = $_POST['voucher_number'];
        $voucher = $app->getVoucher($voucherNumber);
        if($voucher->status=='Used'){
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);margin-bottom: 12px;">Voucher Code Already Applied</div>');
            redirect("users/applyVoucher");
        }elseif ($voucher->status=='Inactive'){
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);margin-bottom: 12px;">Voucher Code InActive</div>');
            redirect("users/applyVoucher");
        }else{
            $user_code = $main->ifLogin()->username;
            $store = $main->ifLogin()->store_name;
            $store_id = $main->ifLogin()->store_id;
            $status = 'Used';

            $data = array(
                'user_code' => $user_code,
                'store' => $store,
                'status' => $status,
                'used_date' => date('Y-m-d H:i:s')
            );

            $this->db->where('number', $voucherNumber);
            $this->db->update('voucher', $data);

            $storeCode = $store_id;
            $redeemCount = $app->getStoreRedeemCount($storeCode)+1;
            $dataStore = array(
                'redeemed_count' => $redeemCount
            );
            $this->db->where('number', $storeCode);
            $this->db->update('store', $dataStore);

            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: green; background-color: rgb(221, 221, 221);margin-bottom: 12px;">Successfully Applied The Voucher - '.$voucherNumber.' <a onclick="myprint()" style="margin-right: 9px;font-size: 15px;float: right;" href="javascript:void(0)">Print</a></div>');
            redirect("users/applyVoucher?status=success&voucher=$voucherNumber");
        }
    }

    function checkVoucher()
    {
        if ($this->ion_auth->logged_in() != 1) {
            redirect(base_url());
        }
        $app = new App();
        $voucherCode = trim($_POST['voucher_code']);
        $voucher = $app->getVoucher($voucherCode);
        if(empty($voucher)){
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);margin-bottom: 12px;text-align: center;font-size: 17px;font-weight: 600;">Voucher Not Available</div>');
            redirect("users/applyVoucher");
        }else{
            redirect("users/applyVoucher?code=$voucherCode");
        }
    }

    function getUsers()
    {
        $this->db->select('id,first_name,last_name');
        $this->db->where('type','buyer');
        $this->db->from('users');
        $query = $this->db->get();
        $array = array();
        foreach ($query->result() as $row)
        {
            $array[$row->id]=ucfirst($row->first_name).' '.$row->last_name;
        }

        return $array;
    }

    public function invitation()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('buyer_invitation');

            $users = $this->getUsers();
            if(!empty($users))
            {
                $crud->field_type('assign_user','dropdown', $users);
            }
            else
            {
                $crud->change_field_type('assign_user', 'hidden');
            }

            $output = $crud->render();
            $this->template->load('admin_blank','invitation',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

    public function customers()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('users');
            $string="supervisor,employee";
            $array=array_map('intval', explode(',', $string));
            //$crud->where('type !=','admin');
            $crud->set_subject('Customers');
            $crud->columns('id', 'username','paas_text','store_name','type');
            $crud->edit_fields('store_id','username','store_name','type','email','first_name','last_name','company','phone','active');
            //$crud->unset_add();
            $crud->unset_read_fields('active','remember_code','created_on','last_login','forgotten_password_code','forgotten_password_time','remember_selector','ip_address','password','activation_selector','activation_code','forgotten_password_selector');
            $crud->add_fields('store_id','username','store_name','type','email','first_name','last_name','company','phone','active');
            $crud->field_type('store_id','hidden');
            //$crud->callback_before_insert(array($this,'test_callback'));
            $crud->unique_fields(array('username','email'));
            $crud->set_rules('email', 'Email', 'required|valid_email');
            $crud->required_fields('username','store_name','type','email','first_name','last_name','company','phone','active');
            $crud->field_type('active','dropdown',
                array('1' => 'Active', '2' => 'InActive'));
            $crud->add_action('Change Password', base_url('skin/admin/images/password.png'), 'users/changepassword', '');
            $crud->callback_edit_field('store_name',function ($value = '', $primary_key = null) {
                return '<input type="text" id="skill_input" value="'.$value.'" name="store_name">';
            });
            //$crud->field_type('store_id', 'hidden');
            $crud->unset_print();
            $output = $crud->render();
            $this->template->load('adminblank','customers',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

    function test_callback($post_array){
        $post_array['store_id'] = '1';
        return $post_array;
    }

    function changepassword()
    {
        $record_num = end($this->uri->segment_array());
        $data['userId'] = $record_num;
        $this->template->load('admin/advanced_form','changepassword',$data);
    }

    function changeProfileAction()
    {
        $main = new Main();
        $postData = $this->input->post();
        $app = new App();
        //echo "hello";
        //die;
        if(!empty($postData['password']) and !empty($postData['current_password'])){
            $userData = $app->getUserData($postData['id']);
            //$identity = $userData->email;
            $identity = $userData->username;
           // $this->ion_auth->change_password($identity, $postData['current_password'], $postData['password']);

            $data = array(
                'paas_text' => $postData['password']
            );
            $this->db->where('id', $postData['id']);
            $this->db->update('users', $data);

            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: green; background-color: rgb(221, 221, 221);">Your profile details has been changed.</div>');
            redirect(base_url('users/customers'));
        }
    }

    function group()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('groups');
            $crud->set_subject('Groups');
            $output = $crud->render();
            $this->template->load('admin_blank','customers',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

    public function designers()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('users');
            $crud->where('type','User');
            $crud->set_subject('Customers');
            $crud->columns('id', 'image','email','first_name','last_name','phone','type','country');
            $crud->set_field_upload('image','assets/uploads/user');
            $crud->edit_fields('image','email','civility','first_name','last_name','phone','date_of_birth','address','post_code','city','country','state');
            $crud->unset_add();
            $output = $crud->render();
            $this->template->load('admin_blank','designers',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

    function addUser()
    {
        $this->template->load('admin/advanced_form','addUser');
    }

    function addAction()
    {
        $this->app  = new App();
        $postData = $this->input->post();
        $this->ion_auth = new Ion_auth();
        $email = $postData['usercode'].'@dunkin.com';
        if ($this->app->check_mail($email) == 0){
            $password = $this->input->post('password');
            $update_data = array(
                'first_name'        => $postData['name'],
                'store_name'        => $postData['store_name'],
                'type'              => $postData['type'],
                'paas_text'         => $password
            );
            $this->ion_auth->register($postData['usercode'], $password, $email, $update_data);
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: green; background-color: rgb(221, 221, 221);">User Successfully Created</div>');
            redirect("users/customers");
        }
        else
        {
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);">Sorry,This User Code already exists</div>');
            redirect("users/addUser");
        }
    }

    function importUsers()
    {
        $file = fopen('csv/users.csv', 'r');
        $this->app  = new App();
        $this->ion_auth = new Ion_auth();
        while ( $row = fgetcsv($file, 3000, ",") ) {
            try {
                $email = trim($row[2]).'@dunkin.com';
                $password = trim($row[3]);
                $update_data = array(
                    'first_name'        => trim($row[2]),
                    'store_name'        => trim($row[1]),
                    'type'              => 'employee',
                    'paas_text'         => $password,
                    'store_id'          => trim($row[0])
                );
                $this->ion_auth->register(trim($row[2]), $password, $email, $update_data);
                echo $row[2].' Created'."\n";
            } catch (Exception $e) {
               echo $row[2].':- '.$e->getMessage()."\n";
            }
        }
    }

    function registerAction()
    {
        $app  = new App();
        $this->app  = new App();
        $postData = $this->input->post();
        $this->ion_auth = new Ion_auth();
        if ($this->app->check_mail($this->input->post('email')) == 0){
            $password = $this->input->post('password');
            $update_data = array(
                'first_name'        => $postData['first_name'],
                'last_name'         => $postData['last_name'],
                'civility'          => $postData['civility'],
                'store_name'        => $postData['store_name'],
                'type'              => 'buyer',
                'paas_text'         => $password
            );
            $email = $this->input->post('email');
            $this->ion_auth->register($email, $password, $email, $update_data);

            $app->insert_entry_chat($postData['store_name'], '', $email, $password);

            $dataEmail['customer_name'] = $postData['first_name'].' '.$postData['last_name'];
            $dataEmail['company_name'] = $postData['company'];
            $template = $app->getEmailTemplate('buyer_welcome');
            $message =  $app->emailTemplate('buyer_welcome',$dataEmail,$template);
            $app->sendEmail($email,$template->subject,$message);

            echo 'r';
        }
        else
        {
            echo '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);">Sorry,This email address already exists</div>';
        }
    }

    function importBuyer()
    {
        $app  = new App();
        $file = fopen("buyers.csv","r");
        $i = 0;
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            if($i!=0)
            {
                $email      = $data['0'];
                $password   = $data['1'];
                $first_name = $data['2'];
                $last_name  = $data['3'];
                $store_name = $data['4'];
                $store_type = $data['5'];
                $title      = $data['6'];
                $company    = $data['7'];
                $website    = $data['8'];
                $phone      = $data['9'];
                $date_of_birth  = $data['10'];
                $address    = $data['11'];
                $post_code  = $data['12'];
                $city       = $data['13'];
                $country    = $data['14'];
                $state      = $data['15'];
                $date_of_establishment  =  $data['16'];
                $phone_number       =      $data['17'];
                $invitation_code    =      $data['18'];
                if(!empty($store_name))
                {
                    $update_data = array(
                        'first_name'        => $first_name,
                        'last_name'         => $last_name,
                        'civility'          => 'Mr',
                        'store_name'        => $store_name,
                        'type'              => 'buyer',
                        'paas_text'         => $password,
                        'company'           => $company,
                        'website'           => $website,
                        'phone'             => $phone,
                        'address'           => $address,
                        'post_code'         => $post_code,
                        'city'              => $city,
                        'country'           => $country,
                        'state'             => $state,
                        'phone_number'      => $phone_number,
                        'user_type'         => 'user',
                    );

                    $this->ion_auth->register($email, $password, $email, $update_data);
                    $app->insert_entry_chat($store_name, '', $email, $password);
                    echo 'Email:--'.$email.' Successfully Registered '.$i."\n";
                }
            }
            $i++;
        }
        fclose($file);
    }

    function allStores()
    {
        if(!empty($_GET['term'])) {
            $keyword = $_GET['term'];
            $result = $this->db->select('*')->from('store')->where("name LIKE '%$keyword%'")->get()->result_array();
            $skillData = array();
            foreach ($result as $row){

                $skillData[] = $row['number'].'-'.$row['name'];

            }

            echo json_encode($skillData);
            die;
        }
    }

    function allStoresvalue()
    {
        if(!empty($_GET['term'])) {
            $keyword = $_GET['term'];
            $result = $this->db->select('*')->from('store')->where("name LIKE '%$keyword%'")->get()->result_array();
            $skillData = array();
            foreach ($result as $row){

                //$skillData[$row['id']] = $row['number'].'-'.$row['name'];
                $arrList[] = array(
                    "label" => $row['number'].'-'.$row['name'],
                    "value" => $row['storeid']
                );
            }

            echo json_encode($arrList);
            die;
        }
    }




    function logout(){
        $this->ion_auth = new Ion_auth();
        $this->ion_auth->logout();
        redirect(base_url());
    }
}
