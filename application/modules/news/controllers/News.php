<?php
class News extends MY_Controller
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
        if ($this->ion_auth->logged_in() == 1)
        {
            $this->app = new App();
            $crud = new grocery_CRUD();
            $crud->set_table('news');
            $crud->set_subject('News');
            $crud->columns('id', 'title','content','url_key','image');
            $crud->required_fields('title','url_key');
            $crud->field_type('status','dropdown',array(1 => 'Active', 0 => 'Inactive'));
            //$crud->add_action('Add Gallery', '' . base_url() . 'assets/uploads/psd-photo-gallery-icon-53263.jpg', 'news/gallery');
            $crud->set_field_upload('image','assets/uploads/news');
            $crud->set_rules('url_key', 'Url Key', 'required|is_unique[news.url_key]');
            $crud->edit_fields('title','content','image','status');
            $crud->add_fields('title','content','url_key','image','status');
            $output = $crud->render();
            $this->template->load('admin_blank', 'news', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }

    function subscription()
    {
        $email = $_POST['email'];
        $data = array(
            'email' => $email,
        );

        $this->db->insert('newsletter', $data);
        echo '<div class="alert alert-success" style="margin-top: 8px;padding: 6px;">
                  <strong>Success!</strong> Thank you for your subscription.
              </div>';
    }

    function newsletter()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $this->app = new App();
            $crud = new grocery_CRUD();
            $crud->set_table('newsletter');
            $crud->set_subject('Newsletter');
            $output = $crud->render();
            $this->template->load('admin_blank', 'newsletter', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }

    function gallery()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $image_crud = new image_CRUD();
            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('image');
            $image_crud->set_table('news_gallery')
                ->set_relation_field('news_id')
                ->set_image_path('assets/uploads/news');
            $output = $image_crud->render();

            $this->template->load('admin_blank', 'gallery', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }

    function newsandevents(){

        $main =new Main();
        $app  = new App();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['news'] = $app->getNews();
        $this->load->view('newsandevents',$data);
    }

    function read(){

        $main =new Main();
        $app  = new App();
        $data['main'] = $main;
        $data['app'] = $app;
        $news = $app->getNewsDetails();
        $data['news'] = $news;
        $data['gallery'] = $app->getGallery($news->id);
        $this->load->view('pages',$data);
    }
}
?>