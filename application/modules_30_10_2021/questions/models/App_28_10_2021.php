<?php
class App extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
    }


    function deletemainquestions($questmainid){
        $this->db->where('questionnaireid',$questmainid);
        $del=$this->db->delete('questionnaire');
        $this->db->where('questionnaireid',$questmainid);
        $del=$this->db->delete('questions');
    }

    function insertquestions($data){
        return $add=$this->db->insert('questions', $data);
    }
function insertmainquestions($data){
    return $add=$this->db->insert('questionnaire', $data);
}
function updatemainquestions($data,$id){
    $this->db->where('questionnaireid', $id);
    $this->db->update('questionnaire ',$data);
}
function updatequestions($data,$id){
    $this->db->where('questionid', $id);
    $this->db->update('questions ',$data);
}
    function getCurrentProductCollection(){

        $this->db->where('status', 1);
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function getProductCollection($start_from=null,$limit=null){

        $this->db->where('status', 1);
        $this->db->limit($limit, $start_from);
        if (!empty($_GET)){
            $params = $_GET;
            foreach ($params as $key => $param){
                $values = explode('_',$param);
                foreach ($values as $value){
                    if($key!='page'){
                        switch ($key) {
                            case "product_id":
                                $this->db->like('product_id', $value);
                                break;
                            case "product_name":
                                $this->db->like('product_name', $value);
                                break;
                            case "product_code":
                                $this->db->like('product_code', $value);
                                break;
                            default:
                        }
                    }
                }
            }
        }
        $this->db->order_by("product_id", "DESC");
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function getFilterUrl($code){
        $currentURL = current_url();
        $params   = @$_GET;
        unset($params[$code]);
        $fullURL = $currentURL . '?' . http_build_query($params);
        return $fullURL;
    }

    function getPaginationUrl($url,$value){
        $url_components = parse_url($url);
        if(empty($url_components['query'])){
            $rUrl = rtrim($url, '?');
            $filterUrl = $rUrl.'?page='.$value;
        }else{
            $filterUrl = $url.'&page='.$value;
        }
        return $filterUrl;
    }

    function paginate_function_admin($item_per_page, $current_page, $total_records, $total_pages)
    {
        $pageLink = $this->getFilterUrl('page');
        $pagination = '';
        if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
            $pagination .= '<ul class="pagination pagination-sm no-margin pull-right">';

            $right_links    = $current_page + 3;
            $previous       = $current_page - 3;
            $next           = $current_page + 1;
            $first_link     = true;

            if($current_page > 1){
                $previous_link = ($previous==0)? 1: $previous;
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,1).'" data-page="1" title="First">&laquo;</a></li>';
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,abs($previous_link)).'" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$i).'" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }
                $first_link = false;
            }

            if($first_link){ //if current active page is first link
                $pagination .= '<li><a class="active" href="javascript:void(0)">'.$current_page.'</a></li>';
            }elseif($current_page == $total_pages){ //if it's the last active link
                $pagination .= '<li><a class="active" href="javascript:void(0)">'.$current_page.'</a></li>';
            }else{ //regular current link
                $pagination .= '<li><a class="active" href="javascript:void(0)">'.$current_page.'</a></li>';
            }

            for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
                if($i<=$total_pages){
                    $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$i).'" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
                }
            }
            if($current_page < $total_pages){
                $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$next_link).'" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$total_pages).'" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
            }

            $pagination .= '</ul>';
        }
        return $pagination; //return pagination links
    }

    function array_flatten($array) {
        if (!is_array($array)) {
            return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, $this->array_flatten($value));
            }
            else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    function getConfigurationProduct($productId)
    {
        $this->db->select('attribute_info');
        $this->db->where('parent_id', $productId);
        $collection =  $this->db->get('configurable_products')->result();
        $jsonArray = [];
        foreach($collection as $item){
            $jsonArray[]= json_decode($item->attribute_info,true);
        }
        $select = [];
        foreach($jsonArray as $value) {
            foreach($value as $key => $opt){
                $select[$key][] = $opt;
            }
        }
        return $select;
    }

    function getAttributeDataByCode($code,$column)
    {
        $this->db->select($column);
        $this->db->where('attribute_code', $code);
        $row =  $this->db->get('attributes')->row();
        return $row->$column;
    }

    function getAttributesOption($ids)
    {
        $collection = $this->db->select('option_value as text,option_id as value')
            ->from('attribute_options')
            ->where_in('option_id', $ids)
            ->get()->result();
        return $collection;
    }

    function getOptionValue($optionId)
    {
        $this->db->select('option_value');
        $this->db->where('option_id',$optionId);
        $product = $this->db->get('attribute_options')->row();
        return $product->option_value;
    }

    function getCombination($optionId,$parentId)
    {
        $combination = "FIND_IN_SET('".$optionId."', combination)";
        $this->db->select('attribute_info');
        $this->db->where('status', 'Enable');
        $this->db->where($combination);
        $this->db->where('parent_id', $parentId);
        $collection = $this->db->get('configurable_products')->result();

        $jsonArray = [];
        foreach($collection as $item){
            $jsonArray[]= json_decode($item->attribute_info,true);
        }
        $select = [];
        foreach($jsonArray as $value) {
            foreach($value as $key => $opt){
                $select[$key][] = $opt;
            }
        }
        return $select;
    }

    function getProductData($productId,$column){

        $this->db->select($column);
        $this->db->where_in('product_id',$productId);
        $product = $this->db->get('catalog_product')->row();
        return $product->$column;
    }

    function getProduct($productId){

        $this->db->where_in('product_id',$productId);
        $product = $this->db->get('catalog_product')->row();
        return $product;
    }

    function getProductPrice($productId){

        $this->db->select('price,special_price');
        $this->db->where_in('product_id',$productId);
        $product = $this->db->get('catalog_product')->row();

        if($product->special_price){
            return $product->special_price;
        }else{
            return $product->price;
        }
    }

    function getCombinationPrice($parentId,$combination)
    {
        $this->db->select('price,special_price');
        $this->db->where('status', 'Enable');
        $this->db->where('combination',$combination);
        $this->db->where('parent_id', $parentId);
        $product = $this->db->get('configurable_products')->row();
        if($product->special_price){
            return $product->special_price;
        }else{
            return $product->price;
        }
    }

    function getCartPrice($cartData)
    {
        $combination = implode(',',$cartData['config']);
        $productId = $cartData['product_id'];
        if(empty($combination)) {
            $price = $this->getProductPrice($productId);
        }else{
            $price = $this->getCombinationPrice($productId,$combination);
        }
        return $price;
    }

    function getAllowedCountries()
    {
        $main = new Main();
        $allowedCountriesConfig = json_decode($main->getConfigValue('configurations/general/allowed_countries'),true);
        return $allowedCountriesConfig;
    }

    function getActivePaymentMethods()
    {
        $this->db->where('enabled', 'yes');
        $collection =  $this->db->get('payment_methods')->result();
        return $collection;
    }

    function getActiveShippingMethods()
    {
        $this->db->where('enabled', 'yes');
        $collection =  $this->db->get('shipping_methods')->result();
        return $collection;
    }

    function getShippingChargeById($shippingId)
    {
        $this->db->select('charge');
        $this->db->where_in('shipping_id',$shippingId);
        $product = $this->db->get('shipping_methods')->row();
        return $product->charge;
    }

    function getPaymentMethodData($id)
    {
        $this->db->where('id', $id);
        $result =  $this->db->get('payment_methods')->row();
        return $result;
    }

    function getOrderStatus($id)
    {
        $paymentMethod = $this->getPaymentMethodData($id);
        switch ($paymentMethod->type) {
            case 'offline':
                $status = 'pending';
                break;
            case "prepaid":
                $status = 'processing';
                break;
            default:
                $status = 'pending';
        }

        return $status;
    }

    function getDefaultLocale()
    {
        $main = new Main();
        $locale = $main->getConfigValue('');
    }

    function getOrder($orderId)
    {
        $this->db->where('id', $orderId);
        $result =  $this->db->get('sales_order')->row();
        return $result;
    }

    function getBillingAddress($orderId)
    {
        $this->db->where('id', $orderId);
        $result =  $this->db->get('sales_order_billing_address')->row();
        return $result;
    }

    function getShippingAddress($orderId)
    {
        $this->db->where('id', $orderId);
        $result =  $this->db->get('sales_order_shipping_address')->row();
        return $result;
    }

    function orderItems($orderId)
    {
        $this->db->where('order_id', $orderId);
        $collection =  $this->db->get('sales_order_item')->result();
        return $collection;
    }
}
?>