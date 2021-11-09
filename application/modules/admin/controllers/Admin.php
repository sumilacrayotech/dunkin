<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->library('grocery_CRUD');
    }

    public function index()
    {
        $this->template->load('login_master','content');
    }

    function admin_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $res=$this->ion_auth->login($username,$password);
        if($res)
        {
            $user=$this->session->all_userdata();
            $name=$this->ion_auth->user()->row();
//echo "hello";
           // die;
            redirect("dashboard");
        }
        else
        {
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);">Invalid Username or Password</div>');
            redirect("admin");
        }
    }

    public function employees_management()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('customers');
            $crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
            $crud->display_as('salesRepEmployeeNumber','from Employeer')
                ->display_as('customerName','Name')
                ->display_as('contactLastName','Last Name');
            $crud->set_subject('Customer');
            $crud->set_relation('salesRepEmployeeNumber','employees','lastName');

            $output = $crud->render();

            $this->template->load('admin_blank','manage_staff',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }

    }

    function logout(){
        $this->ion_auth = new Ion_auth();
        $this->ion_auth->logout();
        redirect(base_url().'admin');
    }

    function profile()
    {
        $this->template->load('admin/advanced_form','profile');
    }

    /*function changeProfile_old()
    {
        $main = new Main();
        $postData = $this->input->post();
        if(!empty($postData['password']) and !empty($postData['current_password'])){
            $identity = $main->ifLogin()->email;
            $this->ion_auth->change_password($identity, $postData['current_password'], $postData['password']);
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: green; background-color: rgb(221, 221, 221);">Your profile details has been changed.</div>');
            redirect(base_url('admin/profile'));
        }*/
        
        function changeProfile()
    {
        $main = new Main();
        $postData = $this->input->post();
        //print_r($postData);
        $email=$this->input->post('emailid');
        //die;
        if(!empty($postData['password']) and !empty($postData['current_password'])){
            $identity = $main->ifLogin()->email;
           $this->ion_auth->change_password($identity,$postData['current_password'],$postData['password']);
            /*$password=md5($postData['password']);*/
            $data = array(
                'paas_text' => $postData['password']
            );
            //print_r($data);
            $this->db->where('email',$email);
            $this->db->update('users', $data);
            $this->session->set_flashdata('message_name', '<div style="border: 1px dotted; padding: 5px; color: green; background-color: rgb(221, 221, 221);">Your profile details has been changed.</div>');
            redirect(base_url('admin/profile'));
        }
        
        
        
        
        
    }
}
