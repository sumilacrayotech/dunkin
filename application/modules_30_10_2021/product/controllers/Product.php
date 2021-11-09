<?php
class Product extends MY_Controller
{
    protected $productCollection;
    protected $category;
    protected $priceRange;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->productCollection = $this->App->getCurrentProductCollection();
        error_reporting(0);
    }

    function index(){
        if($_POST['price_from']){
            $getData = $_REQUEST;
            $params = http_build_query($getData);
            redirect(current_url().'?'.$params);
        }

        $app = new App();
        $main = new Main();
        $minMaxPriceData = $app->getCurrentCollectionMinMaxPrice($this->productCollection);

        $this->category = $app->getCurrentCategory();
        if(isset($_GET["page"])){
            $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
            if(!is_numeric($page_number)){die('Invalid page number!');}
        }else{
            $page_number = 1;
        }

        $item_per_page = 12;

        $get_total_rows = count($app->getProductCollection());
        $total_pages = ceil($get_total_rows/$item_per_page);
        $page_position = (($page_number-1) * $item_per_page);
        $productCollection = $app->getProductCollection($page_position, $item_per_page);
        $data['productCollection'] =  $productCollection;
        $data['pagination'] = $app->paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
        $data['filter'] = $app->getFilterOptions($this->productCollection);
        $data['categoryName'] = $this->category->category_name;
        $data['productCount'] = $get_total_rows;
        $data['currentFilters'] = $app->getCurrentFilters();
        $data['message_like'] = $this->session->flashdata('message_like');
        $userSession = $this->ion_auth->user()->row();
        $data['user_id'] = $userSession->id;
        $data['main'] = $main;
        $data['app'] = $app;
        $data['minMax'] = $minMaxPriceData;
        $this->template->load('frontend/productListing', 'list',$data);
    }

    function search(){

        $app = new App();
        $main = new Main();

        $this->productCollection = $app->getCurrentProductCollectionSearch();
        $this->category = $this->App->getCurrentCategory();

        if(isset($_GET["page"])){
            $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
            if(!is_numeric($page_number)){die('Invalid page number!');}
        }else{
            $page_number = 1;
        }

        $item_per_page = 12;

        $get_total_rows = count($app->getProductCollectionSearch());
        $total_pages = ceil($get_total_rows/$item_per_page);
        $page_position = (($page_number-1) * $item_per_page);
        $productCollection = $app->getProductCollectionSearch($page_position, $item_per_page);
        $data['productCollection'] =  $productCollection;
        $data['pagination'] = $app->paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
        $data['filter'] = $app->getFilterOptions($this->productCollection);
        $data['tags'] = $app->getTags($this->productCollection);
        $data['categoryName'] = $this->category->category_name;
        $data['productCount'] = $get_total_rows;
        $data['currentFilters'] = $app->getCurrentFilters();
        $data['message_like'] = $this->session->flashdata('message_like');
        $userSession = $this->ion_auth->user()->row();
        $data['user_id'] = $userSession->id;
        $data['main'] = $main;
        $this->template->load('category', 'listing',$data);
    }

    function product_view(){
        $app = new App();
        $main = new Main();
        $url_key = end($this->uri->segment_array());
        $_product = $app->product($url_key);
        $categoryId = end(explode(',',$_product->category));
        $categoryBreadcrumb = $app->getCategoryBredCrumb($categoryId,$_product->product_id);
        $data['product'] = $_product;
        $data['main'] = $main;
        $data['app'] = $app;
        $data['categoryBreadcrumb'] = $categoryBreadcrumb;
        $data['images'] = $app->getMediaImages($_product->product_id);
        $data['relatedProducts'] = $app->relatedProduct($categoryId);
        $data['specification'] = $app->getProductSpecification($_product->product_id);
        $data['breadcrumb'] = $this->load->view('view/breadcrumb',$data,true);
        $data['media'] = $this->load->view('view/media',$data,true);
        $data['related'] = $this->load->view('view/related',$data,true);
        $data['details'] = $this->load->view('view/details',$data,true);
        $data['message_like'] = $this->session->flashdata('message_like');
        $this->template->load('frontend/product', 'product_view',$data);
    }

    function addtolike()
    {
        $main =new Main();
        $app  = new App();
        $this->app  = new App();
        $this->ion_auth = new Ion_auth();
        if ($this -> ion_auth -> logged_in()) {
            if ($this->ion_auth->in_group('members')) {

                $userSession = $this->ion_auth->user()->row();
                $userId = $userSession->id;
                $productId = end($this->uri->segment_array());

                $app->insertLikes($productId,$userId);

                $productCount = $app->getLikeCount($productId);
                $productData['like_count'] = $productCount;

                $app->product_update($productData,$productId);

                echo  '<span class="likenumber">'.$productCount.'</span><a href="javascript:void(0)" onclick="wishlistunlike(\''.$productId.'\')" style="color: #000;">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>';die;

            } else {

                echo 'You must login or register to add items to your likes.';
                die;
            }
        } else {


            echo 'You must login or register to add items to your likes.';
            die;
        }
    }

    function addtounlike()
    {
        $app  = new App();
        $userSession = $this->ion_auth->user()->row();
        $userId = $userSession->id;
        $productId = end($this->uri->segment_array());

        $app->deleteLike($productId,$userId);
        $productCount = $app->getLikeCount($productId);
        $productData['like_count'] = $productCount;

        $app->product_update($productData,$productId);
        echo  '<span class="likenumber">'.$productCount.'</span><a href="javascript:void(0)" onclick="wishlist(\''.$productId.'\')" style="color: #000;">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </a>';die;
    }
}