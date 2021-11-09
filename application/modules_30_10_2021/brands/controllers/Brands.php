<?php
class Brands extends MY_Controller
{

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
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('brands');
            $crud->columns('id','logo','name','url_key','description');
            $crud->required_fields('name','url_key');
            $crud->set_subject('Brands');
            $crud->field_type('name', 'color','#000');
            $crud->set_field_upload('logo','assets/uploads/brands');
            $output = $crud->render();

            $this->template->load('admin_blank','brands',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }
}
