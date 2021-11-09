<?php
class Payment_methods extends MY_Controller
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

            $crud->set_table('payment_methods');
            $crud->columns('payment_id','payment_title','enabled','order_status','allowed_countries','sort_order');
            $crud->required_fields('payment_title','enabled','applicable_countries');
            $crud->set_subject('Payment Methods');
            $crud->field_type('Payment_title', 'color','#000'); 
            $crud->field_type('enabled','dropdown',array('yes' => 'Yes','no' => 'No'));          
            $crud->field_type('order_status','dropdown',array(1 => 'Pending'));
            $crud->unset_texteditor('instructions');
            $results = $this->db->get('country')->result();
            $country_multiselect = array();
            foreach($results as $result)
            {
                $country_multiselect[$result->country_code] = $result->country_name;
            }
            $crud->field_type('specific_countries', 'multiselect', $country_multiselect);
            $crud->field_type('allowed_countries','dropdown',array('0' => 'All Allowed Countries','1' => 'Specific Countries'));
            $output = $crud->render();
            $this->template->load('admin_blank','payment_methods',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }
}
