<?php
class Store extends MY_Controller
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
    }

    function index(){

        if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }

        $crud = new grocery_CRUD();
        $crud->set_table('store');
        $crud->set_subject('Store');
        $crud->order_by('storeid','desc');
        //$crud->columns('id', 'name', 'number', 'status');
        //$crud->columns('storeid', 'name', 'number', 'status');
        $crud->columns('name', 'number', 'status');
        $crud->add_fields('name','number','status');
        $crud->edit_fields('name','number','status');
        $crud->required_fields('name','number','status');
        $crud->display_as('id','ID');
        $crud->unset_print();
        $output = $crud->render();
        $this->template->load('admin_blank', 'index', $output);
    }

    function importStore()
    {
        $file = fopen('csv/shoplist.csv', 'r');
        $i=0;
        while ( $row = fgetcsv($file, 3000, ",") ) {

            $data = array(
                'name' => $row['1'],
                'number' => $row['0'],
                'status' => 'Active',
            );

            $this->db->insert('store',$data);

            echo $row['1'].'Inserted'."\n";
        }
    }
}