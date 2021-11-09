<?php
class Seo extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
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

    function url_rewrite()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('seo');
            $crud->set_subject('URL Rewrites');
            $crud->unset_texteditor('meta_description');
            $crud->columns('seo_id', 'title','meta_keyword','meta_description','section','section_id','u_key');
            $crud->add_fields('title','meta_keyword','meta_description','section','section_id','u_key');
            $crud->edit_fields('title','meta_keyword','meta_description','section','u_key');
            $output = $crud->render();
            $this->template->load('admin_blank', 'url_rewrite', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }

    function searchTerms()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('search_terms');
            $crud->set_subject('Search Terms');
            $output = $crud->render();
            $this->template->load('admin_blank', 'url_rewrite', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }

}
?>