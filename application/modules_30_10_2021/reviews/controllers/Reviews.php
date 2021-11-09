<?php
class Reviews extends MY_Controller
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
        if($this -> ion_auth -> logged_in()==1)
        {
            $review = new App();
            $this->app = new App();
            $data['products'] = $review->productslisting();
            $this->form_validation->set_rules('product', 'Product Name', 'required');
            $this->form_validation->set_rules('rating', 'Rating', 'required');


             
              if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form','add_review',$data);
            }
            else
            {
            
                $product               = $this->input->post('product');
                $rating                = $this->input->post('rating');
                $rating1               = $this->input->post('rating1');
                $rating2               = $this->input->post('rating2');
                $rating3               = $this->input->post('rating3');
                $rating4               = $this->input->post('rating4');
                $description           = $this->input->post('description');
                $status                = $this->input->post('status');

                 #Review INSERT
                        $data               = array(
                            'product_id'                   =>  $product,
                            'overall_rating'               =>  $rating,
                            'value_rating'                 =>  $rating1,
                            'comfortable_rating'           =>  $rating2,
                            'greatdesign_rating'           =>  $rating3,
                            'wellmade_rating'             =>  $rating4,
                            'description'            =>  $description,
                            'status'                 =>  $status
                            
                        );
                        $complted= $this->db->insert('reviews', $data);
                        $data['success']="success";
                        $this->template->load('form','review',$data);

                   
             }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    
    
    function add_review()
    {
    
         $review_id = $this->uri->segment(3);
         

         

    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $review = new App();
            $this->app = new App();
            $data['products'] = $review->productslisting();
            $data['editreview']=$review->get_review_data($review_id);
         
         //print_r($data['editreview']);
            $this->form_validation->set_rules('product', 'Product Name', 'required');
            $this->form_validation->set_rules('rating', 'Rating', 'required');


             
              if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form','add_review',$data);
            }
            else
            {
            
                $product               = $this->input->post('product');
                $rating                = $this->input->post('rating');
                $rating1               = $this->input->post('rating1');
                $rating2               = $this->input->post('rating2');
                $rating3               = $this->input->post('rating3');
                $rating4               = $this->input->post('rating4');
                $description           = $this->input->post('description');
                $status                = $this->input->post('status');
                $reviewid               = $this->input->post('reviewid');


                 #Review INSERT
                        $data               = array(
                            'product_id'                   =>  $product,
                            'overall_rating'               =>  $rating,
                            'description'            =>  $description,
                            'status'                 =>  $status
                            
                        );
                        
                    if($reviewid)
                        {
                           $this->db->where('review_id', $reviewid);
                           $this->db->update('reviews', $data);

                        }
                        else
                        {    
                           $complted= $this->db->insert('reviews', $data);
                         }
                          $data['success']="success";
                          redirect('reviews/review');

                   
             }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function overall_rating_column_callback($value, $row)
    {
        $checked = 'checked';
        if($value==5){$five=$checked;}else{$five='';}
        if($value==4){$four=$checked;}else{$four='';}
        if($value==3){$three=$checked;}else{$three='';}
        if($value==2){$two=$checked;}else{$two='';}
        if($value==1){$one=$checked;}else{$one='';}

        $id = $row->review_id;

        $data = '<div class="star-rating"><input type="radio" id="5-stars1" name="'.$id.'" value="5" '.$five.' />
					<label for="5-stars1" class="star">&#9733;</label>
					<input type="radio" id="4-stars1" name="'.$id.'" value="4" '.$four.'/>
					<label for="4-stars1" class="star">&#9733;</label>
					<input type="radio" id="3-stars1" name="'.$id.'" value="3" '.$three.'/>
					<label for="3-stars1" class="star">&#9733;</label>
					<input type="radio" id="2-stars1" name="'.$id.'" value="2" '.$two.'/>
					<label for="2-stars1" class="star">&#9733;</label>
					<input type="radio" id="1-star1" name="'.$id.'" value="1" '.$one.'/>
					<label for="1-star1" class="star">&#9733;</label></div>';
        return $data;
    }

    function value_rating_column_callback($value, $row)
    {
        $checked = 'checked';
        if($value==5){$five=$checked;}else{$five='';}
        if($value==4){$four=$checked;}else{$four='';}
        if($value==3){$three=$checked;}else{$three='';}
        if($value==2){$two=$checked;}else{$two='';}
        if($value==1){$one=$checked;}else{$one='';}

        $id = $row->review_id;

        $data = '<div class="star-rating"><input type="radio" id="5-stars1" name="value_rating'.$id.'" value="5" '.$five.' />
					<label for="5-stars1" class="star">&#9733;</label>
					<input type="radio" id="4-stars1" name="value_rating'.$id.'" value="4" '.$four.'/>
					<label for="4-stars1" class="star">&#9733;</label>
					<input type="radio" id="3-stars1" name="value_rating'.$id.'" value="3" '.$three.'/>
					<label for="3-stars1" class="star">&#9733;</label>
					<input type="radio" id="2-stars1" name="value_rating'.$id.'" value="2" '.$two.'/>
					<label for="2-stars1" class="star">&#9733;</label>
					<input type="radio" id="1-star1" name="value_rating'.$id.'" value="1" '.$one.'/>
					<label for="1-star1" class="star">&#9733;</label></div>';
        return $data;
    }

    function comfortable_rating_column_callback($value, $row)
    {
        $checked = 'checked';
        if($value==5){$five=$checked;}else{$five='';}
        if($value==4){$four=$checked;}else{$four='';}
        if($value==3){$three=$checked;}else{$three='';}
        if($value==2){$two=$checked;}else{$two='';}
        if($value==1){$one=$checked;}else{$one='';}

        $id = $row->review_id;

        $data = '<div class="star-rating"><input type="radio" id="5-stars1" name="comfortable_rating'.$id.'" value="5" '.$five.' />
					<label for="5-stars1" class="star">&#9733;</label>
					<input type="radio" id="4-stars1" name="comfortable_rating'.$id.'" value="4" '.$four.'/>
					<label for="4-stars1" class="star">&#9733;</label>
					<input type="radio" id="3-stars1" name="comfortable_rating'.$id.'" value="3" '.$three.'/>
					<label for="3-stars1" class="star">&#9733;</label>
					<input type="radio" id="2-stars1" name="comfortable_rating'.$id.'" value="2" '.$two.'/>
					<label for="2-stars1" class="star">&#9733;</label>
					<input type="radio" id="1-star1" name="comfortable_rating'.$id.'" value="1" '.$one.'/>
					<label for="1-star1" class="star">&#9733;</label></div>';
        return $data;
    }

    function greatdesign_rating_column_callback($value, $row)
    {
        $checked = 'checked';
        if($value==5){$five=$checked;}else{$five='';}
        if($value==4){$four=$checked;}else{$four='';}
        if($value==3){$three=$checked;}else{$three='';}
        if($value==2){$two=$checked;}else{$two='';}
        if($value==1){$one=$checked;}else{$one='';}

        $id = $row->review_id;

        $data = '<div class="star-rating"><input type="radio" id="5-stars1" name="greatdesign_rating'.$id.'" value="5" '.$five.' />
					<label for="5-stars1" class="star">&#9733;</label>
					<input type="radio" id="4-stars1" name="greatdesign_rating'.$id.'" value="4" '.$four.'/>
					<label for="4-stars1" class="star">&#9733;</label>
					<input type="radio" id="3-stars1" name="greatdesign_rating'.$id.'" value="3" '.$three.'/>
					<label for="3-stars1" class="star">&#9733;</label>
					<input type="radio" id="2-stars1" name="greatdesign_rating'.$id.'" value="2" '.$two.'/>
					<label for="2-stars1" class="star">&#9733;</label>
					<input type="radio" id="1-star1" name="greatdesign_rating'.$id.'" value="1" '.$one.'/>
					<label for="1-star1" class="star">&#9733;</label></div>';
        return $data;
    }

    function wellmade_rating_column_callback($value, $row)
    {
        $checked = 'checked';
        if($value==5){$five=$checked;}else{$five='';}
        if($value==4){$four=$checked;}else{$four='';}
        if($value==3){$three=$checked;}else{$three='';}
        if($value==2){$two=$checked;}else{$two='';}
        if($value==1){$one=$checked;}else{$one='';}

        $id = $row->review_id;

        $data = '<div class="star-rating"><input type="radio" id="5-stars1" name="wellmade_rating'.$id.'" value="5" '.$five.' />
					<label for="5-stars1" class="star">&#9733;</label>
					<input type="radio" id="4-stars1" name="wellmade_rating'.$id.'" value="4" '.$four.'/>
					<label for="4-stars1" class="star">&#9733;</label>
					<input type="radio" id="3-stars1" name="wellmade_rating'.$id.'" value="3" '.$three.'/>
					<label for="3-stars1" class="star">&#9733;</label>
					<input type="radio" id="2-stars1" name="wellmade_rating'.$id.'" value="2" '.$two.'/>
					<label for="2-stars1" class="star">&#9733;</label>
					<input type="radio" id="1-star1" name="wellmade_rating'.$id.'" value="1" '.$one.'/>
					<label for="1-star1" class="star">&#9733;</label></div>';
        return $data;
    }

    function review(){
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('reviews')
                ->set_subject('Reviews')
                ->columns('review_id','product_id','overall_rating');
            $crud->add_action('Edit', ''.base_url().'assets/uploads/pencil.png', 'reviews/add_review');
            $crud->set_relation('product_id','catalog_product','product_name');
            $crud->callback_column('overall_rating',array($this,'overall_rating_column_callback'));
            /*$crud->callback_column('value_rating',array($this,'value_rating_column_callback'));
            $crud->callback_column('comfortable_rating',array($this,'comfortable_rating_column_callback'));
            $crud->callback_column('greatdesign_rating',array($this,'greatdesign_rating_column_callback'));
            $crud->callback_column('wellmade_rating',array($this,'wellmade_rating_column_callback'));*/
            $crud->unset_add();
            $crud->unset_edit();
            $output = $crud->render();
            $this->template->load('admin_blank', 'review',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }


    
}
?>