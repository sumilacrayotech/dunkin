<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->library('memcached_library');
    }

    function header(){
        return $this->load->view('admin/header');
    }

    function headerFront(){
        return $this->load->view('frontend/header');
    }

    function sidebar(){
        return $this->load->view('admin/sidebar');
    }

    function footer(){
        return $this->load->view('admin/footerAdmin');
    }

    function footerFront(){
        return $this->load->view('frontend/footer');
    }

    function uploadPath($file)
    {
        return base_url().'assets/uploads/'.$file;
    }

    function skin($file){
        return base_url().'skin/admin/'.$file;
    }

    function skinNew($file){
        return base_url().'skin/admin2.3/'.$file;
    }

    function skinFront($file){
        return base_url().'skin/frontend/'.$file;
    }

    function uploadedImageCms($file){
        return base_url().'assets/uploads/cms/'.$file;
    }

    function staticBlock($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $res = $this->db->get('static_block')->row();
        return $res;
    }

    function mainConfig()
    {
        $this->db->select('*');
        $this->db->where('id',1);
        $res = $this->db->get('configuration')->row();
        return $res;
    }

    function getLatestNews(){
        $this->db->order_by("id", "asc");
        $this->db->limit(3);
        //$this->db->where('category',$id);
        $res = $this->db->get('news')->result();
        return $res;
    }

    function getBaseCurrency($price)
    {
        $BaseCurrencyCode = $this->getConfigValue('configurations/currency_setup/basecurrency');
        if($price){
            return "$BaseCurrencyCode ".number_format($price, 2);
        }else{
            return 'No Price Available';
        }

    }

    function getCurrentCurrencyPrice($price)
    {
        $BaseCurrencyCode = $this->getConfigValue('configurations/currency_setup/basecurrency');
        if($price){
            return "$BaseCurrencyCode".number_format($price, 2);
        }else{
            return "$BaseCurrencyCode".number_format(0, 2);
        }

    }

    function CurrencyFormattedPrice($price,$currency)
    {
        if($price){
            return "$currency".' '.number_format($price, 2);
        }else{
            return "$currency".' '.number_format(0, 2);
        }
    }

    function currentCurrency(){
        $BaseCurrencyCode = $this->getConfigValue('configurations/currency_setup/basecurrency');
        return $BaseCurrencyCode;
    }

    function getBaseCurrencyCode()
    {
        $BaseCurrencyCode = $this->getConfigValue('configurations/currency_setup/basecurrency');
        return $BaseCurrencyCode;
    }

    function ProductStatus($status)
    {
        if($status==1){
            return 'Enable';
        }else{
            return 'Disable';
        }
    }

    function getConfigValue($path)
    {
        $this->db->select('value');
        $this->db->where('path',$path);
        $res = $this->db->get('config_data')->row();
        return $res->value;
    }

    function getProductPrice($priceData)
    {
        $baseCurrency = $this->getConfigValue('configurations/currency_setup/basecurrency');
        $prices = json_decode($priceData,true);

        $matches = array();
        foreach($prices as $a){
            if($a['currency_code'] == $baseCurrency)
                $matches=$a;
        }
        if(!empty($matches['price'])){
            $price = $baseCurrency.' '. $matches['price'];
        }else{
            $price = '';
        }
        if(!empty($matches['special_price'])){
            $specialPrice = $baseCurrency.' '. $matches['special_price'];
        }else{
            $specialPrice = '';
        }
        $price = (object) array(
          'price' => $price,
          'price_index' => $matches['price'],
          'special_price' => $specialPrice,
          'special_price_index' => $matches['special_price']
        );

        return $price;
    }

    function getMainCategories()
    {
        $this->db->select('catalog_category.category_name,catalog_category.category_id,t2.url_ids');
        $this->db->where('parent_category', 0);
        $this->db->join('category_urls as t2', 'catalog_category.category_id = t2.category_id', 'LEFT');
        $query = $this->db->get('catalog_category');
        $res = $query->result();
        $data = [];
        foreach($res as $_category){
            $data[] = (object) array(
                'url' => base_url().$this->getCategoryUrl($_category->url_ids),
                'category_name' => $_category->category_name,
            );
        }
        return $data;
    }

    function getCategoryUrlKey($category_id)
    {
        $this->db->select('url_key');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res = $query->row_array();
        return $res['url_key'];
    }

    function getCategoryUrl($urlIds)
    {
        $categories = explode('/',$urlIds);
        $url = '';
        foreach($categories as $category) {
            $url .= $this->getCategoryUrlKey($category).'/';
        }
        return rtrim($url,'/');
    }

    function rootCategories()
    {
        if ( !extension_loaded('memcached')){
            $rootCategories = $this->getMainCategories();
        }else{
            $rootCategoriesCache = $this->memcached_library->get('rootCategories');
            if (!$rootCategoriesCache) {
                $rootCategories = $this->getMainCategories();
                $this->memcached_library->add('rootCategories', $rootCategories);
            }else{
                $rootCategories = $rootCategoriesCache;
            }
        }
        return $rootCategories;
    }

    function getMemcacheKeys() {
        if ( !extension_loaded('memcached')){
            $this->memcached_library->flush();
        }
    }

    function successMessage($message){
        $messageHtml ='<div class="alert alert-success" style="border-radius: unset;padding: 8px 8px 8px 8px;font-size: 14px;">
                <i class="fas fa-check-circle" style="font-size: 20px;"></i> '.$message.'
            </div>';
        return $messageHtml;
    }

    function errorMessage($message){
        $messageHtml ='<div class="alert alert-danger" style="border-radius: unset;padding: 8px 8px 8px 8px;font-size: 14px;">
                <i class="fas fa-check-circle" style="font-size: 20px;"></i> '.$message.'
            </div>';
        return $messageHtml;
    }

    function warningMessage($message){
        $messageHtml ='<div class="alert alert-warning" style="border-radius: unset;padding: 8px 8px 8px 8px;font-size: 14px;">
                <i class="fas fa-check-circle" style="font-size: 20px;"></i> '.$message.'
            </div>';
        return $messageHtml;
    }

    function infoMessage($message){
        $messageHtml ='<div class="alert alert-primary" style="border-radius: unset;padding: 8px 8px 8px 8px;font-size: 14px;">
                <i class="fas fa-info-circle" style="font-size: 20px;"></i> '.$message.'
            </div>';
        return $messageHtml;
    }

    function ifLogin()
    {
        $userSession = $this->ion_auth->user()->row();
        //print_r($userSession);
        //die;

        return $userSession;
    }

    function getCountryNameByCode($code)
    {
        $this->db->select('country_name');
        $this->db->where('country_code',$code);
        $res = $this->db->get('country')->row();
        return $res->country_name;
    }

    function getCompanies()
    {
        $this->db->where('status','Active');
        $res = $this->db->get('company')->result();
        return $res;
    }

function getmenus(){
        //$userid=1;
    $sess=$this->ifLogin();
    $userid=$sess->user_id;
    $this->db->where('id',$userid);
    $res = $this->db->get('users')->result();
    return $res;
}




    function sendEmail($toEmail,$subject,$message)
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');

        $this->email->set_newline("\r\n");
        $this->email->from($from,'Dunkin Voucher');
        $this->email->to($toEmail);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }



}
?>