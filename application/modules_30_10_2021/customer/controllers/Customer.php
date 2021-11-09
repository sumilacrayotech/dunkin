<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

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
        $this->load->library("pagination");
        error_reporting(0);
    }

    function create()
    {
        $app = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['message_like'] = $this->session->flashdata('message_like');

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email','Email','trim|valid_email|required');
        $this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[20]|required');
        $this->form_validation->set_rules('password_confirm','Confirm password','trim|matches[password]|required');

        if ($this->form_validation->run() == FALSE) {

            if($app->ifLogin()){
                redirect(base_url('customer/account'));
            }else{
                $this->template->load('frontend/customer', 'create',$data);
            }

        } else {
            $postData = $this->input->post();
            $password = $postData['password'];
            $email = $postData['email'];
            $registerData = array(
                'first_name'        => $postData['first_name'],
                'last_name'         => $postData['last_name'],
            );

            if($this->ion_auth->register($email, $password, $email, $registerData)){
                $remember = TRUE;
                $login = $this->ion_auth->login($email, $password, $remember);
                if ($login == 1) {
                    if ($this->ion_auth->in_group('members')) {
                        redirect(base_url('customer/account'));
                    }
                }
            }else{
                $this->session->set_flashdata('message_like', $main->errorMessage(strip_tags($this->ion_auth->errors())));
                $data['message_like'] = $this->session->flashdata('message_like');
                $this->template->load('frontend/customer', 'create',$data);
            }
        }
    }

function index()
{
    if ($this->ion_auth->logged_in() != 1) {
        redirect('admin');
    }
    $crud = new grocery_CRUD();
    $crud->set_table('customer');
    $crud->set_subject('Customers');
    $crud->columns('name', 'age', 'gender', 'city', 'emailid');

//$crud->add_fields('name','number','status');
//$crud->set_relation('officeCode','offices','city');
//$crud->set_relation('storeid','store','name');
    //$crud->set_relation('storeid', 'store', 'name');
//$crud->add_fields('questionnaireid', 'title', 'number', 'status','name');
    $crud->EDIT_fields('title', 'status', 'name');
    $crud->display_as('storeid', 'Store Name');
    $crud->unset_Edit();
    $crud->unset_add();
    $crud->unset_Read();
    $crud->unset_delete();
    $crud->order_by('customerid','desc');
//$crud->add_action('Edit Mainquest', base_url('skin/admin/images/password.png'), 'question/editmainquestions', '');
    //$crud->add_action('Delete quest', base_url('skin/admin/images/icons/delete.png'), base_url('questions/deletequestionnaire/'), '');
    //$crud->add_action('Edit Mainquest', base_url('skin/admin/images/icons/edit.png'), 'questions/editmainquestions', '');
    //$crud->add_action('Add quest', base_url('skin/admin/images/icons/add.png'), base_url('questions/addquestionsselected/'), '');
    $crud->add_action('Delete Customer', base_url('skin/admin/images/icons/delete.png'), base_url('customer/deletecustomer/'), '');
    $crud->add_action('List questions', base_url('skin/admin/images/icons/view.png'), base_url('customer/questionslist/'), '');

//$crud->columns('id, 'group_id, 'user_id','ref_id');
//$crud->set_relation('ref_id', 'dist_info', 'ref_idkey');
//$crud->edit_fields('name','number','status');
//$crud->required_fields('name','number','status');
//$crud->display_as('id','ID');
    $crud->unset_print();
    $output = $crud->render();
    $this->template->load('admin_blank', 'index', $output);

}

    public function deletecustomer(){
        $custid=$this->uri->segment(3);
        $app  =  new App();
        $app->deletecustomer($custid);
        redirect("customer");
        $this->session->set_flashdata('messages', 'Customer details deleted Successfully');
    }


    public function questionslist(){

        if ($this->ion_auth->logged_in() == 1) {
             $custid=$this->uri->segment(3);
            //die;

            $config = array();
            //$config["base_url"] = base_url() . "index.php/StudentPagination_Controller/index";
            $config["base_url"] = base_url() . "customer/questionslist/$custid";
            $config["total_rows"] = $this->get_count($custid);
            //die;
            $config["per_page"] = 5;
            $config["uri_segment"] = 4;
            //$config["uri_segment"] =3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $this->pagination->initialize($config);


            //echo $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
            $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
//die;
            $data["links"] = $this->pagination->create_links();

            $data['questmain'] = $this->questionsselectedpage($custid,$config["per_page"], $page);

            $this->template->load('admin/advanced_form','questionslist',$data);
        } else {

            $this->template->load('login_master', 'content');
        }
    }


    function questionsselectedpage($custid,$limit,$start){

        $this->db->limit($limit, $start);
        $this->db->where('customerid',$custid);
        $collection =  $this->db->get('customerquestionsansw')->result();
        return $collection;
    }

    public function get_count($qid)
    {
        $this->db->where('customerid',$qid);
        $query = $this->db->get('customerquestionsansw');
        return $query->num_rows();
        //return $this->db->count_all("questions");
    }








    function logout(){
        $this->ion_auth = new Ion_auth();
        $this->ion_auth->logout();
        redirect(base_url());
    }
}