<?php
class Customerqrcode extends MY_Controller
{
    protected $productCollection;
    protected $category;
    protected $priceRange;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('image_CRUD');
        error_reporting(0);
        /*if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }*/
    }

    function usedQrcode()
    {
        if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }
        $crud = new grocery_CRUD();
        $crud->set_table('customerqrcode');
        $crud->set_subject('Customer QrCode');
        $crud->where('status','Used');
        $crud->columns('id','qr_code','number', 'name', 'storeid','customerid','status');
        $crud->display_as('storeid','Store');
        $crud->display_as('customerid','Customer');
        //$crud->set_relation('storeid','store', 'name');
        //$crud->set_relation('customerid','customer', 'name');
        $crud->callback_column('qr_code',array($this,'_callback_qrcode_url'));
        //$crud->where('status','Used');
        $crud->unset_print();
        $output = $crud->render();
        $this->template->load('admin_blank', 'usedVoucher', $output);
    }


    function answeredquestionnaire()
    {
        if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }
        $crud = new grocery_CRUD();
        $crud->set_table('questionnaire');
        $crud->set_subject('Questionnaire');
        $crud->where('countans!=0');
        $crud->columns('questionnaireid','number','title','status','countans');
        $crud->display_as('countans','Answered Count');
        $crud->display_as('questionnaireid','ID');
        $crud->unset_print();
        $output = $crud->render();
        $this->template->load('admin_blank', 'activeVoucher', $output);
    }

    function index(){
        if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }
        $this->session->unset_userdata('voucher_data');
        $crud = new grocery_CRUD();
        $crud->set_table('customerqrcode');
        $crud->set_subject('Customer Qr Code');
        //$crud->columns('id','qr_code','number', 'name','company', 'expiry_from','expiry_to', 'status','email_id','percentage');
        $crud->columns('id','qr_code','number', 'name', 'expiry_from','expiry_to', 'status','storeid','questionnaireid');
        $crud->display_as('id','ID');

        $crud->display_as('number','VOUCHER NUMBER');
        //$crud->add_fields(array('name','expiry_from','expiry_to','products','company','custom_products','status','percentage','qty'));
        $crud->add_fields(array('name','expiry_from','expiry_to','status','qty','storeid','questionnaireid'));
        $crud->display_as('storeid','STORE');
        $crud->display_as('questionnaireid','Questionnaire');
        $crud->display_as('id','ID');
        //$crud->edit_fields(array('name','expiry_from','expiry_to','products','company','custom_products','status','email_id','percentage','qr_code'));
         $crud->edit_fields(array('name','expiry_from','expiry_to','status','qr_code','storeid','questionnaireid'));

        //$crud->required_fields('name','expiry_from','expiry_to','company','status','percentage');
        $crud->required_fields('name','expiry_from','expiry_to','status');
        $crud->order_by('id','desc');
        $this->db->select('product_name,product_id,item_number');
        $results = $this->db->get('catalog_product')->result();
        $products_multiselect = array();
        foreach ($results as $result) {
            $products_multiselect[$result->product_name.'|'.$result->item_number] = $result->product_name;
        }
        $crud->field_type('products', 'multiselect', $products_multiselect);

        $this->db->select('storeid, name');
        $this->db->from('store');
        $query = $this->db->get();
        $finalArray = array();
        foreach ($query->result() as $row)
        {
            $finalArray[$row->storeid]=$row->name;
        }

        if(empty($finalArray)) {
            $companyArray[0] = 'No Stores';
        }else{
            $companyArray = $finalArray;
        }
        $crud->field_type('storeid','dropdown', $companyArray);

        $this->db->where('status','Active');
        $this->db->select('questionnaireid, title');
        $this->db->from('questionnaire');
        $query = $this->db->get();
        $finalArray = array();
        foreach ($query->result() as $row)
        {
            $finalArray[$row->questionnaireid]=$row->title;
        }

        if(empty($finalArray)) {
            $companyArray[0] = 'No Questions';
        }else{
            $companyArray = $finalArray;
        }
        $crud->field_type('questionnaireid','dropdown', $companyArray);

        //$crud->set_relation('company','company', 'name');

        $crud->callback_add_field('custom_products',function () {
            return '<input style="display: none" type="text" id="mySingleField" maxlength="50" value="" name="custom_products"><ul id="methodTags"></ul><p><a href="#" onclick="createTag()">Add Product</a></p>';
        });
        $crud->callback_add_field('qty',function () {
            return '<input type="text" id="qty" onkeyup="integerInRange(this.value, 1, 500)" name="qty">';
        });
        $crud->callback_edit_field('custom_products',function ($value = '', $primary_key = null) {
            return '<input style="display: none" type="text" id="mySingleField" maxlength="50" value="'.$value.'" name="custom_products"><ul id="methodTags"></ul><p><a href="#" onclick="createTag()">Add Product</a></p>';
        });
        $crud->callback_edit_field('qr_code',function ($value, $primary_key,$row) {
            $qr =  $row->id.'|'.$row->number.'|'.$row->name;
            $qrcode = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=$qr&choe=UTF-8";
            return "<img src='".$qrcode."'>";
        });
        $crud->callback_column('qr_code',array($this,'_callback_qrcode_url'));
        $crud->callback_after_insert(array($this, 'InsertNumber'));
        $output = $crud->render();
        $this->template->load('admin_blank', 'index', $output);
    }

    function InsertNumber($post_array,$primary_key)
    {
        $this->updateVoucherNumber($primary_key);
        if($post_array['qty']){
            $generateQty = $post_array['qty']-1;
            $voucher = $this->getVoucher($primary_key);
            for ($x = 1; $x <= $generateQty; $x++) {

                $data = array(
                    'name'              =>  $voucher->name,
                    'expiry_from'       =>  $voucher->expiry_from,
                    'expiry_to'         =>  $voucher->expiry_to,
                    'questionnaireid'          =>  $voucher->questionnaireid,
                    'storeid'           =>  $voucher->storeid,
                    //'custom_products'   =>  $voucher->custom_products,
                    'status'   =>  $voucher->status,
                    //'percentage'   =>  $voucher->percentage,
                );
                //$this->db->insert('voucher', $data);
                $this->db->insert('customerqrcode', $data);
                $lastId = $this->db->insert_id();
                $this->updateVoucherNumber($lastId);
            }
        }
        return true;
    }

    function getVoucher($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('customerqrcode')->row();
        return $query;
    }

    function updateVoucherNumber($id)
    {
        $number = sprintf('%06d', $id);
        $user_logs_insert = array(
            "number" => $number
        );
        $this->db->where('id', $id);
        $this->db->update('customerqrcode', $user_logs_insert);
    }

    public function _callback_qrcode_url($value, $row)
    {
        $questionnaireid = $row->questionnaireid;
        $qr =  base_url().'frontend/signup/'.$questionnaireid.'/'.$row->id;
        $qrcode = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=$qr&choe=UTF-8";
        return "<img src='".$qrcode."'>";
    }

    function share()
    {
        $data = $_POST;
        if(!empty($data['submit_delete'])=='delete'){
            $this->db->where_in('id', $data['voucher_id']);
            $this->db->delete('voucher');
            $this->session->set_flashdata('message_name', '<div style="color: green;border: 1px dotted;margin-top: 8px;padding: 5px;font-size: 18px;">Successfully deleted vouchers</div>');
            redirect('voucher');
        }else{
            $this->session->set_userdata('voucher_data',$data['voucher_id']);
            $ids = $this->session->userdata('voucher_data');
            $this->db->where_in('id', $ids );
            $collection =  $this->db->get('voucher')->result();
            $data['vouchers'] = $collection;
            $this->template->load('adminblank', 'share', $data);
        }
    }

    function uploadShareData()
    {
        $this->template->load('adminblank', 'uploadShareData');
    }

    function uploadCsv()
    {
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        $voucherIds = array();
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
        {
           if(trim($filesop[0])!='id'){
               $voucherIds[] = trim($filesop[0]);
               $voucherId = trim($filesop[0]);
               $emailId = trim($filesop[9]);
               $dataUpdate = array(
                   'email_id' => $emailId
               );
               $this->db->where('id', $voucherId);
               $this->db->update('voucher', $dataUpdate);
           }
        }
        $this->session->set_userdata('voucher_data',$voucherIds);
        $ids = $this->session->userdata('voucher_data');
        $this->db->where_in('id', $ids );
        $collection =  $this->db->get('voucher')->result();
        $data['vouchers'] = $collection;
        $this->template->load('adminblank', 'share', $data);
    }

    function getVoucherById($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('voucher')->row();
    }

    function sendEmail()
    {
        $main = new Main();
        $id = $_GET['data'];
        $voucher = $this->getVoucherById($id);
        if(empty($voucher->email_id)){
            echo '0';
        }else{
            $message = '
            <table>
                <tr>
                    <td style="width: 50%;">Voucher Code</td>
                    <td>#'.$voucher->number.'</td>
                </tr>
                <tr>
                    <td style="width: 50%;">Name</td>
                    <td>'.$voucher->name.'</td>
                </tr>
                <tr>
                    <td style="width: 50%;">Expiry</td>
                    <td>'.$voucher->expiry_from.' To '.$voucher->expiry_to.'</td>
                </tr>
                <tr>
                    <td style="width: 50%;">Percentage</td>
                    <td>'.$voucher->percentage.'%</td>
                </tr>
            </table>
        ';
        }
        $response = $main->sendEmail($voucher->email_id,'Dunkin Voucher #'.$voucher->number,$message);
        if($response==1){
            $this->db->set('send', 'Yes');
            $this->db->where('id', $id);
            $this->db->update('voucher');
            echo '1';
        }else{
            echo '2';
        }
    }

    function pdfView()
    {
        $from = $_GET['from'];
        $to = $_GET['to'];
        if(!empty($to)){
            $this->db->where("id BETWEEN $from AND $to");
        }

        if(!empty($_GET['voucher_name'])) {
            $voucherName = trim($_GET['voucher_name']);
            $this->db->like('name', $voucherName);
        }
        if(!empty($_GET['company'])) {
            $company = trim($_GET['company']);
            $this->db->like('company', $company);
        }

        $result = $this->db->get('voucher')->result();
        $data['voucher'] = $result;
        $this->load->view('pdf',$data);
    }

    function downloadPdf()
    {
        $data = $_POST;
        $from = $data['from'];
        $to = $data['to'];
        $company = $data['company'];
        $voucher_name = $data['voucher_name'];
       /* if($from < $to){

        }else{
            $result = '';
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . strlen($result));
            header('Content-Disposition: attachment; filename=' . time().'-nodata-vouchers.pdf' );
            echo $result;
        }*/
        $value = base_url().'voucher/pdfView?from='.$from.'&to='.$to.'&company='.$company.'&voucher_name='.$voucher_name;
        $postdata = http_build_query(
            array(
                'apikey' => '2d5f00e6-8347-4502-becd-6719809843f0',
                'value' => $value
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);

        $result = file_get_contents('https://api.html2pdfrocket.com/pdf', false, $context);
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($result));
        header('Content-Disposition: attachment; filename=' . time().'-vouchers.pdf' );
        echo $result;
    }

    function exportCSV()
    {
        $data = $_POST;
        $from = $data['from'];
        $to = $data['to'];
        /*if($from < $to){


        }else{
            $filename = 'nodata_'.date('Ymd').'.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
        }*/
        if(!empty($to)){
            $this->db->where("id BETWEEN $from AND $to");
        }

        if(!empty($data['voucher_name'])) {
            $voucherName = trim($data['voucher_name']);
            $this->db->like('name', $voucherName);
        }
        /*if(!empty($data['company'])) {
            $company = trim($data['company']);
            $this->db->like('company', $company);
        }*/
        //$myData = $this->db->get('voucher')->result();
        $myData = $this->db->get('customerqrcode')->result();
        $filename = 'mydata_'.date('Ymd').'.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // file creation
        $file = fopen('php://output', 'w');

        //$header = array("id","number","name","expiry_from","expiry_to","products","company","custom_products","status","email_id");
        $header = array("id","number","name","expiry_from","expiry_to","status");
        fputcsv($file, $header);

        foreach ($myData as $line){


            //fputcsv($file,array($line->id,$line->number,$line->name,$line->expiry_from,$line->expiry_to,$line->products,$line->company,$line->custom_products,$line->status,$line->email_id));
            fputcsv($file,array($line->id,$line->number,$line->name,$line->expiry_from,$line->expiry_to,$line->status));
        }

        fclose($file);
        exit;
    }
}
