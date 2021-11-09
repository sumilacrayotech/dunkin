<?php
class Banners extends MY_Controller
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

            $crud->set_table('banners');
            $crud->columns('title','image','description','link');

            $crud->display_as('title','Title')
                 ->display_as('image','Image')
                 ->display_as('link','Link')
                 ->display_as('description','Description');
            $crud->set_subject('Home Slider');

            $crud->set_field_upload('image','assets/uploads/slider');
            $output = $crud->render();

            $this->template->load('admin_blank','banners',$output);
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
}
