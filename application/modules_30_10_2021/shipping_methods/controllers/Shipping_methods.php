<?php
class Shipping_methods extends MY_Controller
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

            $crud->set_table('shipping_methods');
            $crud->columns('shipping_id','shipping_title','enabled','applicable_countries','specific_countries');
            $crud->required_fields('shipping_title','enabled','applicable_countries');
            $crud->set_subject('Shipping Methods');
            $crud->field_type('shipping_title', 'color','#000'); 
            $crud->field_type('enabled','dropdown',array('yes' => 'Yes','no' => 'No'));
            $crud->field_type('applicable_countries','dropdown',array('All' => 'All Allowed Countries','Specific' => 'Specific Countries'));
            $crud->unset_texteditor('error_message');
            $results = $this->db->get('country')->result();
            $country_multiselect = array();
            foreach($results as $result)
            {
                $country_multiselect[$result->country_code] = $result->country_name;
            }
            $crud->field_type('specific_countries', 'multiselect', $country_multiselect);
            $output = $crud->render();
            $this->template->load('admin_blank','shipping_methods',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }
}
