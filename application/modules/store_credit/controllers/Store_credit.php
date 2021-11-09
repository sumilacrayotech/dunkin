<?php
class Store_credit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
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
    function index()
    {
    
     $this->load->helper(array('form', 'url'));

     $this->load->library('form_validation');
     
      if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('store_credit')
                ->set_subject('Store credits')
                ->columns('id','customer_id','add_or_subtract_amount','current_balance_amount','status');           
            $crud->unset_add();
            $crud->unset_edit();
            $output = $crud->render();
            $this->template->load('admin_blank', 'store_credit',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }

        
    }
    
    
    function add_store_credit()
    {
    
         $cuid = $this->uri->segment(3);
         $data['cuid']=$cuid;
         
         $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $credit = new App();
            $this->app = new App();
            $data['customers'] = $credit->customerlisting();
            if($cuid)
		         {
		         
		          $data['balance']=$credit->getbalance($cuid); 
		          
		          $balanceamt="0";
		                   foreach ($data['balance'] as $val)
						     {      
						       $balanceamt=$balanceamt+$val->add_or_subtract_amount;
						     } 

		         $data['cubalance']=$balanceamt;
		         }
                        
            if($this->input->post('customer'))
            {
              $customerid=$this->input->post('customer');
            }
            
            $this->form_validation->set_rules('customer', 'Customer Name', 'required');
             $this->form_validation->set_rules('credit_amount', 'Credit Amount', 'required'); 
            
              if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form','add_store_credit',$data);
            }
            else
            {
            
                $customer               = $this->input->post('customer');
                $creditamount           = $this->input->post('credit_amount');                
                $description            = $this->input->post('description');
                $status                 = $this->input->post('status');
                $creditid               = $this->input->post('creditid');


                 #Review INSERT
                        $data               = array(
                            'customer_id'                  =>  $customer,
                            'add_or_subtract_amount'       =>  $creditamount,                                                                     
                            'comments'                     =>  $description,
                            'status'                       =>  $status
                            
                        );
                        
                    if($creditid)
                        {
                           $this->db->where('id', $creditid);
                           $this->db->update('store_credit', $data);

                        }
                        else
                        {    
                        
                          
                           $complted= $this->db->insert('store_credit', $data);
                           $last_id = $this->db->insert_id();
                           $data['balance']=$credit->getbalance($customerid);            
                           $balanceamt="0";
		                   foreach ($data['balance'] as $val)
						     {      
						       $balanceamt=$balanceamt+$val->add_or_subtract_amount;
						     } 
						     
						    $datacustomer  	= array(                            
                            'current_balance_amount'       =>  $balanceamt
                             );
					     
                            $this->db->where('id', $last_id);
                            $this->db->update('store_credit', $datacustomer);
                           
                         }
                          $data['success']="success";
                          redirect('store_credit/credit_list');

                   
             }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    
    
    
     function balance(){
     
     $customer               = $this->input->post('customer');

     
      if($this -> ion_auth -> logged_in()==1)
        {
            $credit = new App();
            $this->app = new App();
            $data['balance']=$credit->getbalance($customer);            
                           $balanceamt="0";
		                   foreach ($data['balance'] as $val)
						     {      
						       $balanceamt=$balanceamt+$val->add_or_subtract_amount;
						     } 
						     
       echo "<strong>".$balanceamt."</strong>";

     
         }
     }


    
    
    function credit_list(){
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('store_credit')
                ->set_subject('Store credits')
                ->columns('id','customer_id','add_or_subtract_amount','current_balance_amount','status','transaction_date');
            $crud->set_relation('customer_id', 'users', '{first_name} {last_name}');
            $crud->display_as('customer_id','Customer Name'); 
            $crud->display_as('add_or_subtract_amount','Balance Change');
            $crud->display_as('current_balance_amount','New Balance');
            $crud->field_type('status', 'dropdown', array(1 => 'Active', 0 => 'Inactive'));         
            $crud->unset_add();
            $crud->unset_edit();
            $output = $crud->render();
            $this->template->load('admin_blank', 'store_credit',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }


    
}
?>