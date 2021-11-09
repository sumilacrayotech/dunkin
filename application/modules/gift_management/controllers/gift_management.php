<?php
class gift_management extends CI_Controller
{
    public function __construct()
    {   
        parent::__construct();
		$this->load->model('app');
        $this->load->model('common');
		$this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));	
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        error_reporting(0);
    }
    function index()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('tb_coupon')
            ->set_subject('Gift Coupon')
            ->columns('id','coupon_code','coupon_amount','amount_percentage','coupon_balance','usable2','limit','start','start_time','end','end_time');
            $crud->display_as('id','ID')
            ->display_as('coupon_code','Coupon Code')
            ->display_as('coupon_amount','Coupon Amount')
            ->display_as('amount_percentage','Discount %')
            ->display_as('coupon_balance','Balance Amount')
            ->display_as('usable2','Usable Times')
            ->display_as('limit','Limit')
            ->display_as('start','Start Date')
            ->display_as('start_time','Start Time')
            ->display_as('end','End Date')
            ->display_as('end_time','End Time');
            $crud->unset_add();
            $crud->unset_edit();
            $output = $crud->render();
            $this->template->load('adminleft','gift_management',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function make_gift_code()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            if($this->input->post('code_type')=='2')
            {
		      $this->form_validation->set_rules('coupon_code','coupon_code','required|callback_handle_coupon_code');			
		    }
            $this->form_validation->set_rules('counts','Counts','numeric|required');	
            $this->form_validation->set_rules('amounts','Amounts','numeric');
    		$this->form_validation->set_rules('usable','Usable','numeric|required');
    		$this->form_validation->set_rules('amount_percentage','amount_percentage','numeric');
    		$this->form_validation->set_rules('limit','Amount Limit','numeric|required');	
    		$this->form_validation->set_rules('start','Time Period','required');	
    		$this->form_validation->set_rules('start_time','Time Period','required');		
    		$this->form_validation->set_rules('end_time','Time Period','required');	
    		$this->form_validation->set_rules('end','Time Period','required');
            if($this->form_validation->run() == FALSE )
            {
                $this->template->load('form','make_gift_code');
            }  
            else
            {
                $this->app->save_gift_code();
				echo 'r';
            }              
            
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
}
?>