<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Main');
    }

    function getHomeSlider()
    {
        $this->db->where('type','Home Top');
        $this->db->where('slider_status',1);
        $res = $this->db->get('slider')->result();
        return $res;
    }

    function getHomeMiddleSlider()
    {
        $this->db->where('type','Home Middle Slider');
        $this->db->where('slider_status',1);
        $res = $this->db->get('slider')->result();
        return $res;
    }

    function getHomeBottomSlider()
    {
        $this->db->where('type','Home Bottom');
        $this->db->where('slider_status',1);
        $res = $this->db->get('slider')->result();
        return $res;
    }

    function getMiddleBanner()
    {
        $this->db->where('type','Home Middle');
        $this->db->where('slider_status',1);
        $res = $this->db->get('slider')->result();
        return $res;
    }

    function getFeaturedCategories(){
        $this->db->select('catalog_category.category_name,catalog_category.category_id,t2.url_ids,catalog_category.image');
        $this->db->where('featured', 1);
        $this->db->join('category_urls as t2', 'catalog_category.category_id = t2.category_id', 'LEFT');
        $query = $this->db->get('catalog_category');
        $res = $query->result();
        return $res;
    }

    function url_key($category_id)
    {
        $this->db->select('url_key');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row_array();
        return $res['url_key'];
    }

    function getCategoryUrl($urlIds)
    {
        $categories = explode('/',$urlIds);
        $url = '';
        foreach($categories as $category) {
            $url .= $this->url_key($category).'/';
        }
        return rtrim($url,'/');
    }

    function getNewProducts()
    {
        $this->db->where('status', 1);
        $this->db->limit(6);
        $this->db->order_by("product_id", "DESC");
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function getPopularProducts()
    {
        $this->db->where('status', 1);
        $this->db->where('popular', 1);
        $this->db->limit(6);
        $this->db->order_by("product_id", "DESC");
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function getBestSellerProducts()
    {
        $this->db->where('status', 1);
        $this->db->where('best_seller', 1);
        $this->db->limit(6);
        $this->db->order_by("product_id", "DESC");
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function getProductReviewStarPercentage($productId)
    {
        $this->db->select_sum('overall_rating');
        $this->db->select('overall_rating');
        $this->db->select('count(*) as num');
        $this->db->where('status', '1');
        $this->db->where('product_id',$productId);
        $this->db->from('reviews');
        $totalReview = $this->db->get()->row();
        $totalReviews = $totalReview->overall_rating;
        $totalCount = $totalReview->num;

        $totalRating = round($totalReviews/$totalCount);
        $percentage = ($totalRating*2)*10;
        if(!empty($totalCount)){
            $reviewPercentage = $percentage;
        }else{
            $reviewPercentage = 0;
        }
        $review = (object) array(
            'totalReview' => $totalCount,
            'reviewPercentage' => $reviewPercentage
        );
        return $review;
    }

    function getProductSlide($data)
    {
        return $this->load->view('productSlide',$data,true);
    }
}
?>