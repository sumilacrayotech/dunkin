<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
        $this->load->library('form_validation');
        $this->load->library('Memcached_library');
        error_reporting(0);
    }

	public function index()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
        $data['slider'] = $app->getHomeSlider();
        $data['featuredCategories'] = $app->getFeaturedCategories();
        $data['newProducts'] = $app->getNewProducts();
        $data['popularProducts'] = $app->getPopularProducts();
        $data['bestSellerProducts'] = $app->getBestSellerProducts();
        $data['middleBanners'] = $app->getMiddleBanner();
        $data['homeMiddleSlider'] = $app->getHomeMiddleSlider();
        $data['homeBottomSlider'] = $app->getHomeBottomSlider();
        $this->template->load('frontend/home', 'index', $data);
	}

}
