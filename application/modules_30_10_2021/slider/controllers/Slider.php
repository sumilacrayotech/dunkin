<?php
class Slider extends MY_Controller
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

            $crud->set_table('slider');
            $crud->columns('slider_id','slider_title','type','slider_image','slider_description','slider_status');
            $crud->required_fields('slider_title','slider_image');
            $crud->set_subject('Slider');
            $crud->field_type('slider_title', 'color','#000');
            $crud->set_field_upload('slider_image','assets/uploads/slider');
            $crud->field_type('slider_status','dropdown',array(1 => 'Active', 0 => 'Inactive'));

            $output = $crud->render();

            $this->template->load('admin_blank','slider',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }
}
