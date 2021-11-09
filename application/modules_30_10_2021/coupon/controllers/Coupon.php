<?php
class Coupon extends MY_Controller
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
        error_reporting(0);
    }
    function index()
    {
        if($this ->ion_auth ->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('coupons')->set_subject('Gift Coupon')->columns('id','coupon_code','coupon_amount','amount_type','created_at','exp_date','usable','limit','status');
            $crud->display_as('id','ID')
                 ->display_as('coupon_code','Coupon Code')
                 ->display_as('coupon_amount','Amount')
                 ->display_as('amount_type','Amount Type')
                 ->display_as('created_at','Create Date')
                 ->display_as('exp_date','Expiry Date')
                 ->display_as('usable','Usable Count')
                 ->display_as('limit','Cart Total Limit')
                 ->display_as('status','Status');
            $crud->add_fields('coupon_code','coupon_amount','amount_type','exp_date','usable','limit','status');
            $output = $crud->render();
            $this->template->load('admin_blank','coupon',$output);
        }
        else
        {
            redirect(base_url().'admin');
        }
    }
}
