<?php
class Company extends MY_Controller
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
        if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }
    }

    function index(){
        $crud = new grocery_CRUD();
        $crud->set_table('company');
        $crud->set_subject('Company');
        $crud->columns('id', 'name', 'status');
        $crud->display_as('id','ID');
        $crud->unset_print();
        $output = $crud->render();
        $this->template->load('admin_blank', 'index', $output);
    }
}