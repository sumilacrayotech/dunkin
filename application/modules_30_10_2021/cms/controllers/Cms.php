<?php
class Cms extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
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
            $this->template->load('2colum-left','category');
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function category()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('cms_category')
            ->set_subject('Category')
            ->columns('category_id','category_name','url_key','status');
            $crud->add_fields('category_name','url_key','status','content');
            $crud->edit_fields('category_name','url_key','status','content');
            $crud->required_fields('category_name','url_key','status');
            $crud->unset_texteditor('content');
            $output = $crud->render();
            $this->template->load('adminleft','category',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function page()
    {
        $main =new Main();
        $app  = new App();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['page'] = $app->getPage();
        $this->load->view('page',$data);
    }

    function pages()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('cms_pages')
            ->set_subject('Profile')
            ->columns('page_id','title','status','url_key');
            $crud->required_fields('title','url_key','content','status');
            $crud->set_field_upload('image','assets/uploads/cms');
            $crud->field_type('status','dropdown',array(1 => 'Active', 0 => 'Inactive'));
            //$crud->set_rules('url_key', 'Url Key','trim|required|xss_clean|callback_url_check');
            //$crud->edit_fields('title','sub_title','content','image','status');
            //$crud->callback_after_update(array($this,'url_check'));
            //echo $crud->getState();die;
            //$crud->set_rules('url_key', 'Url Key', 'required|is_unique[cms_pages.url_key]');
            $output = $crud->render();
            $this->template->load('admin_blank','pages',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    public function url_check($str)
    {
        $num_row = $this->db->where('u_key',$str['url_key'])->get('seo')->num_rows();
        if ($num_row >= 1)
        {
            $this->form_validation->set_message('url_check', 'The Url Key already exists');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    function ourTeam()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('our_team');

            $crud->set_subject('Our Team');
            $crud->set_field_upload('image','assets/uploads/team');
            $output = $crud->render();
            $data['output'] = $output;
            $this->template->load('admin_blank', 'our_team',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function ourClients()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('clients');

            $crud->set_subject('Our Team');
            $crud->set_field_upload('logo','assets/uploads/clients');
            $output = $crud->render();
            $data['output'] = $output;
            $this->template->load('admin_blank', 'ourClients',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function images()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
       	    $image_crud = new image_CRUD();
    		$image_crud->set_primary_key_field('id');
    		$image_crud->set_url_field('image');
    		$image_crud->set_table('cms_images')
                ->set_relation_field('page_id')
    			->set_image_path('assets/uploads/cms');
    		$output = $image_crud->render();
            $this->template->load('adminleft','cms_images',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function static_block()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('static_block')
            ->set_subject('Static Block')
            ->columns('id','title','content','image');
            $crud->set_field_upload('image','assets/uploads/cms');
            $output = $crud->render();
            $this->template->load('admin_blank','static_block',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function post()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('cms_post')
            ->set_subject('Post')
            ->columns('post_id','title','status','content');
            $crud->edit_fields('title','content','status','categories');
            $crud->required_fields('title','categories','content','status');
            $this->db->select('category_id,category_name');
            $results = $this->db->get('cms_category')->result();
            $cms_category_multiselect = array();
            foreach($results as $result) 
            {
                $cms_category_multiselect[$result->category_id] = $result->category_name;
            }
            $crud->field_type('categories', 'multiselect', $cms_category_multiselect); 
            $output = $crud->render();
            $this->template->load('adminleft','post',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function news()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('news')
            ->set_subject('News');
            $crud->required_fields('title','content','status');
            $crud->field_type('status','dropdown',array(1 => 'Active', 0 => 'Inactive'));
            $output = $crud->render();
            $this->template->load('adminleft','news',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function service()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('services')
            ->set_subject('Services');
            $crud->display_as('product_service_id','Product Service Name');
            $crud->add_action('Edit Service Points', ''.base_url().'assets/uploads/network_service.png', 'cms/edit_services');
            $crud->set_relation('product_service_id','product_services','title');
            $output = $crud->render();
            $this->template->load('adminleft','service',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function clients()
    {
        $main =new Main();
        $app  = new App();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['clients'] = $app->getClients('Clients');
        $data['consultant'] = $app->getClients('Consultant');
        $this->load->view('clients',$data);
    }

    function ourTeams()
    {
        $main =new Main();
        $app  = new App();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['teams'] = $app->getTeams();
        $this->load->view('ourTeams',$data);
    }
}
?>