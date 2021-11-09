<?php
class Configuration extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->library('grocery_CRUD');
        error_reporting(0);
        if($this ->ion_auth ->logged_in()!=1) {
            redirect(base_url().'admin');
        }
    }

    public function index()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('configuration');
                 
            $crud->set_subject('Main Config');
            $crud->unset_delete();
            $crud->unset_add();
            $crud->unset_texteditor('best_quality','support');
            $crud->edit_fields('email','phone_number','phone_number_two','address','place','facebook_url','linked_in_url','best_quality','support');
            $output = $crud->render();
            $data['output'] = $output;
            $this->template->load('admin_blank', 'configuration',$output);
        }
        else
        {
            redirect(base_url().'admin');
        }
    }
    
    function banner(){
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('banners');
                 
            $crud->set_subject('Home Slider');
            $crud->set_field_upload('image','assets/uploads/banner');
            $output = $crud->render();
            $data['output'] = $output;
            $this->template->load('admin_blank', 'banners',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

    public function home()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('home_config');

            $crud->set_subject('Home Config');
            $crud->set_field_upload('about_image','assets/uploads/banner');
            $crud->unset_delete();
            $crud->unset_add();
            $output = $crud->render();
            $data['output'] = $output;
            $this->template->load('admin_blank', 'configuration',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }


    function admin_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $res=$this->ion_auth->login($username,$password);
        if($res)
        {
            $this->session->all_userdata();
            $this->ion_auth->user()->row();

            echo 'r';
        } else {

            echo '<div class="alert alert-danger" role="alert">Invalid Username or Password</div>';
        }
    }

    function general()
    
    {
    
       $this->app = new App();       
	   if($this -> ion_auth -> logged_in()==1)
	    {   
	       $id="1";
	       $idstate="2";
	       $idzip="3";
	       $idzone="4";
	       $iddefault="5";
	       $idlocale="6";
	       $idunit="7";
	       $idstore="8";
	       $idstorecountry="9";
	       $idphone="10";	       
	       $idregion="11";
	       $idpostalcode="12";
	       $idaddress1="13";	       
	       $idaddress2="14";
	       $idcity="15";
	       $idvat="16";
	       $idlogo="35";
	       $idfav="36";

          if ($this->input->post('sav') == 'sav')
            {        
            
                 //---uploading logo---------------------
                  if($_FILES["logo_file"]['tmp_name'])
                  {
			        
	                  $config['upload_path'] = './assets/uploads/logo/';  
	                  $config['allowed_types'] = 'gif|jpg|png|jpeg';
	                  $config['max_size'] = 0;
	                  $new_name = time() . '-' . $_FILES["logo_file"]['name'];  
	                  $config['file_name'] = $new_name;
	                  $this->load->library('upload', $config);             
	                  
				        if (!$this->upload->do_upload('logo_file')) {			            
				            $data['error']=array('error' => $this->upload->display_errors());
				        } else {
				            $upload_data = $this->upload->data(); 
				            $this->app->configuration_update_logo($new_name,$idlogo);
  
				        }
				        
				       			        
                   }
                   
                   
                  
                   
                   //-----uploading fav icon-------------------------------
                   
                   if($_FILES["fav_file"]['tmp_name'])
                  {
			        
	                  $config1['upload_path'] = './assets/uploads/fav/';  
	                  $config1['allowed_types'] = 'gif|jpg|png|jpeg';
	                  $config1['max_size'] = 0;
	                  $new_name = time() . '-' . $_FILES["fav_file"]['name'];  
	                  $config1['file_name'] = $new_name;
	                  $this->upload->initialize($config1);
	                  $this->load->library('upload', $config1);             
	                  
				        if (!$this->upload->do_upload('fav_file')) {			            
				            $data['error']=array('error' => $this->upload->display_errors());
				        } else {
				            $upload_data = $this->upload->data(); 
				            $this->app->configuration_update_fav($new_name,$idfav);
  
				        }
			        
			        
                   }

                   
		  			        
				  $allowedcountriesarr=$this->input->post('allowedcountries');				  
				  $jsonarrallowed=array();
				  foreach ($allowedcountriesarr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrallowed[]=array('id'=> $text[0],'code'=> $text[1],'name'=> $text[2]);				  
				  }
								  
				  $jsonallowed = json_encode($jsonarrallowed);				  				                    
				  $statearr=$this->input->post('state');				  			  
				  $jsonarrstate=array();
				  foreach ($statearr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrstate[]=array('id'=> $text[0],'code'=> $text[1],'name'=> $text[2]);				  
				  }
								  
				  $jsonstate = json_encode($jsonarrstate);				  
				  $ziparr=$this->input->post('zipcodes');				  			  
				  $jsonarrzip=array();
				  foreach ($ziparr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrzip[]=array('id'=> $text[0],'code'=> $text[1],'name'=> $text[2]);				  
				  }
				  $timezone=$this->input->post('timezone');
				  $default=$this->input->post('defaultlocale');
				  //$locale=$this->input->post('locale');
				  $allowedlocalearr=$this->input->post('locale');				  
				  $jsonarrlocale=array();
				  foreach ($allowedlocalearr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrlocale[]=array('id'=> $text[0],'code'=> $text[1],'name'=> $text[2]);				  
				  }
				  
				  $jsonlocale = json_encode($jsonarrlocale);

				  $unit=$this->input->post('unit');				  
                  $store_name=$this->input->post('store_name');
				  $phone=$this->input->post('phone');
				  $storecountry=$this->input->post('storecountry');
				  $region=$this->input->post('region');				  
                  $postalcode=$this->input->post('postalcode');
				  $city=$this->input->post('city');
				  $address1=$this->input->post('address1');
				  $address2=$this->input->post('address2');
				  $vat=$this->input->post('vat');				  							  
				  $jsonzip = json_encode($jsonarrzip);				       
				  $this->app->configuration_update($jsonallowed,$id);
				  $this->app->configuration_update_state($jsonstate,$idstate);
				  $this->app->configuration_update_zip($jsonzip,$idzip);
				  $this->app->configuration_update_zone($timezone,$idzone);	
				  $this->app->configuration_update_default($default,$iddefault);
				  $this->app->configuration_update_locale($jsonlocale,$idlocale);
				  $this->app->configuration_update_unit($unit,$idunit);				  
                  $this->app->configuration_update_store($store_name,$idstore);
				  $this->app->configuration_update_country($storecountry,$idstorecountry);
				  $this->app->configuration_update_phone($phone,$idphone);
				  $this->app->configuration_update_region($region,$idregion);	
				  $this->app->configuration_update_postalcode($postalcode,$idpostalcode);
				  $this->app->configuration_update_address1($address1,$idaddress1);
				  $this->app->configuration_update_address2($address2,$idaddress2);
				  $this->app->configuration_update_city($city,$idcity);
				  $this->app->configuration_update_vat($vat,$idvat);				                                    
                  $data['success']="success";
             
			 } 
                                 
	               $data['countries']    =  $this->app->getCountries();
	               $data['zones']    =  $this->app->getZones();
	               $data['locales']    =  $this->app->getLocales();
	               $data['selectedcountries']    =  $this->app->getselectedcountry($id);               	               
	               $jsonval=json_decode($data['selectedcountries']->value);	            
	               $selectedarr=array();	            
	               foreach ($jsonval as $k=>$v)
	                     {
                            $selectedarr[]=$v->id; // etc.
                         }          
	               $data['dbselected']=$selectedarr;	               
	               $data['selectedstate']    =  $this->app->getselectedstate($idstate);
	               $jsonstateval=json_decode($data['selectedstate']->value);	            
	               $selectedstatearr=array();	            
	               foreach ($jsonstateval as $k=>$v)
	                     {
                            $selectedstatearr[]=$v->id; // etc.
                         }          
                   $data['dbselectedstate']=$selectedstatearr;                   
                   $data['selectedzip']    =  $this->app->getselectedzip($idzip);
	               $jsonzipval=json_decode($data['selectedzip']->value);	            
	               $selectedziparr=array();	            
	               foreach ($jsonzipval as $k=>$v)
	                     {
                            $selectedziparr[]=$v->id; // etc.
                         }          
                   $data['dbselectedzip']=$selectedziparr;
                   $data['selectedzone']    =  $this->app->getselectedzone($idzone); 
                   $data['selecteddefault']    =  $this->app->getselecteddefault($iddefault);
                   $data['selectedlocale']    =  $this->app->getselectedlocale($idlocale);
                   
                   $jsonlocaleval=json_decode($data['selectedlocale']->value);	            
	               $selectedlocalearr=array();	            
	               foreach ($jsonlocaleval as $k=>$v)
	                     {
                            $selectedlocalearr[]=$v->id; // etc.
                         }          
                   $data['dbselectedlocale']=$selectedlocalearr;
                   
                   
                   $data['selectedunit']    =  $this->app->getselectedunit($idunit); 
                   $data['selectedstore'] =  $this->app->getselectedstore($idstore);
                   $data['selectedphone'] =  $this->app->getselectedphone($idphone);
                   $data['selectedstorecountry'] =  $this->app->getselectedstorecountry($idstorecountry);
                   $data['selectedregion'] =  $this->app->getselectedregion($idregion);
                   $data['selectedpostalcode'] =  $this->app->getselectedpostalcode($idpostalcode);
                   $data['selectedaddress1'] =  $this->app->getselectedaddress1($idaddress1);
                   $data['selectedaddress2'] =  $this->app->getselectedaddress2($idaddress2); 
                   $data['selectedcity'] =  $this->app->getselectedcity($idcity); 
                   $data['selectedvat'] =  $this->app->getselectedvat($idvat);
                   $data['selectedlogo'] =  $this->app->getselectedlogo($idlogo);
                   $data['selectedfav'] =  $this->app->getselectedfav($idfav);  
                  
     
	       }            
	      
	      $this->template->load('admin/advanced_form','general',$data);
       
    }
    
    
    function currency_setup()
    
    {
    
       $this->app = new App();       
	   if($this -> ion_auth -> logged_in()==1)
	    {   
	       $idallowedcurrency="17";
	       $idbasecurrency="18";
	       $idconversion="19";

          if ($this->input->post('sav') == 'sav')
            {
               
				  $allowedcurrencyarr=$this->input->post('allowed_currency');				  
				  $jsonarrallowed=array();
				  foreach ($allowedcurrencyarr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrallowed[]=array('id'=> $text[0],'code'=> $text[1],'name'=> $text[2]);				  
				  }
				  $basecurrency=$this->input->post('basecurrency');
				  $conversion=$this->input->post('conversion');
				  $jsonallowedcurrency = json_encode($jsonarrallowed);					
			      $this->app->configuration_update_allowedcurrency($jsonallowedcurrency,$idallowedcurrency);
			      $this->app->configuration_update_basecurrency($basecurrency,$idbasecurrency);
			      $this->app->configuration_update_conversion($conversion,$idconversion);
                  $data['success']="success";
             
			 } 
                                 
	               $data['currencies']    =  $this->app->getCurrencies();	               
	               $data['dballowed_currencies']    = $this->app->getselectedallowedcurrencies($idallowedcurrency);	               
	               $data['dbbasecurrency']    = $this->app->getselectedbasecurrency($idbasecurrency);
	               $data['dbconversion']    = $this->app->getselectedconversion($idconversion);	              
	               $jsonallowedval=json_decode($data['dballowed_currencies']->value);	            
	               $selectedallowedarr=array();	            
	               foreach ($jsonallowedval as $k=>$v)
	                     {
                            $selectedallowedarr[]=$v->id; // etc.
                         }
                   $data['dbselectedallowedarr']=$selectedallowedarr;
                    
         
	       }            
	      
	      $this->template->load('admin/advanced_form','currency_setup',$data);
       
    }
    
    
     function email()
    
    {
    
       $this->app = new App();       
	   if($this -> ion_auth -> logged_in()==1)
	    {   
	       $idgeneralcontact="20";
	       $idgeneralcontactemail="21";
	       $idsupportname="22";
	       $idsupportemail="23";
	       $idcontactenable="24";
	       $idemailto="25";


          if ($this->input->post('sav') == 'sav')
            {
               	  $general_contact_name=$this->input->post('general_contact_name');
				  $general_contact_email=$this->input->post('general_contact_email');
				  $support_name=$this->input->post('support_name');
				  $support_email=$this->input->post('support_email');
                  $contact_enable=$this->input->post('contact_enable');
				  $email_to=$this->input->post('email_to');				  					
			      $this->app->configuration_update_general_contact_name($general_contact_name,$idgeneralcontact);
			      $this->app->configuration_update_general_contact_email($general_contact_email,$idgeneralcontactemail);
                  $this->app->configuration_update_support_name($support_name,$idsupportname);
                  $this->app->configuration_update_support_email($support_email,$idsupportemail);
                  $this->app->configuration_update_contact_enable($contact_enable,$idcontactenable);                      
                  $this->app->configuration_update_email_to($email_to,$idemailto);			      
                  $data['success']="success";
             
			 } 
                                 
	               	               
	               $data['dbgeneral_contact_name']    = $this->app->getselectedgeneral_contact_name($idgeneralcontact);
	               $data['dbgeneral_contact_email']    = $this->app->getselectedgeneral_contact_email($idgeneralcontactemail);
	               $data['dbsupport_name']    = $this->app->getselectedsupport_name($idsupportname);
	               $data['dbsupport_email']    = $this->app->getselectedsupport_email($idsupportemail);
	               $data['dbcontact_enable']    = $this->app->getselectedcontact_enable($idcontactenable);
	               $data['dbemail_to']    = $this->app->getselectedemail_to($idemailto);	               
	               
                    
         
	       }            
	      
	      $this->template->load('admin/advanced_form','email',$data);
       
    }
    
    
    function catalog()
    
    {
    
       $this->app = new App();       
	   if($this -> ion_auth -> logged_in()==1)
	    {   
	       $idproductsperpage="26";
	       $idproductsort="27";
	       $idproductenable="28";
	       $idguestreview="29";
	       $idstockproducts="30";
	       $idmaxquantity="31";


          if ($this->input->post('sav') == 'sav')
            {
               
				  $products_per_page=$this->input->post('products_per_page');
				  $product_sort=$this->input->post('product_sort');
				  $product_enable=$this->input->post('product_enable');
				  $guest_review=$this->input->post('guest_review');
                  $stock_products=$this->input->post('stock_products');
				  $max_quantity=$this->input->post('max_quantity');				  					
			      $this->app->configuration_update_products_per_page($products_per_page,$idproductsperpage);
			      $this->app->configuration_update_product_sort($product_sort,$idproductsort);
                  $this->app->configuration_update_product_enable($product_enable,$idproductenable);
                  $this->app->configuration_update_guest_review($guest_review,$idguestreview);
                  $this->app->configuration_update_stock_products($stock_products,$idstockproducts);                      
                  $this->app->configuration_update_max_quantity($max_quantity,$idmaxquantity);			      
                  $data['success']="success";
             
			 } 
                                 
	               $data['dbproducts_per_page']    = $this->app->getselectedproducts_per_page($idproductsperpage);
	               $data['dbproduct_sort']    = $this->app->getselectedproduct_sort($idproductsort);
	               $data['dbproduct_enable']    = $this->app->getselectedproduct_enable($idproductenable);
	               $data['dbguest_review']    = $this->app->getselectedguest_review($idguestreview);
	               $data['dbstock_products']    = $this->app->getselectedstock_products($idstockproducts);
	               $data['dbmax_quantity']    = $this->app->getselectedmax_quantity($idmaxquantity);	                    
         
	       }            
	      
	      $this->template->load('admin/advanced_form','catalog',$data);
       
    }
    
     function security()
    
    {
    
       $this->app = new App();       
	   if($this -> ion_auth -> logged_in()==1)
	    {   
	       $idwebsitekey="32";
	       $idsecretkey="33";
	       $idkeystatus="34";
	       
          if ($this->input->post('sav') == 'sav')
            {
               
				  $website_key=$this->input->post('website_key');
				  $secret_key=$this->input->post('secret_key');
				  $key_status=$this->input->post('key_status');				  			  					
			      $this->app->configuration_update_website_key($website_key,$idwebsitekey);
			      $this->app->configuration_update_secret_key($secret_key,$idsecretkey);
			      $this->app->configuration_update_key_status($key_status,$idkeystatus);
                  $data['success']="success";
             
			 } 
                                 
	               $data['dbwebsite_key']    = $this->app->getselectedwebsite_key($idwebsitekey);
	               $data['dbsecret_key']    = $this->app->getselectedsecret_key($idsecretkey);
	               $data['dbkey_status']    = $this->app->getselectedkey_status($idkeystatus);

	              	                    
         
	       }            
	      
	      $this->template->load('admin/advanced_form','security',$data);
       
    }






    
    
     
}
