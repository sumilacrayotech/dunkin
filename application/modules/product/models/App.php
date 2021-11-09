<?php
class App extends CI_Model
{
    public function __construct()
    {
        $this->load->model('Main');
        $this->load->library('memcached_library');
    }

    function getMediaImages($productId)
    {
        $this->db->select('image');
        $this->db->where('product_id', $productId);
        $collection =  $this->db->get('products_image')->result();
        return $collection;
    }

    function getCategoryUrlKey($category_id)
    {
        $this->db->select('url_key,category_name');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res = $query->row();
        return $res;
    }

    function getCategoryUrl($urlIds)
    {
        $categories = explode('/',$urlIds);
        $data = [];
        foreach($categories as $category) {
            $url = $this->getCategoryUrlKey($category);
            $data[] = (object) array(
                'url_key' => $url->url_key,
                'name' => $url->category_name
            );
        }
        return $data;
    }

    function getProductBredCrumb($categoryId){
        $this->db->select('t2.url_ids');
        $this->db->where('catalog_category.category_id', $categoryId);
        $this->db->join('category_urls as t2', 'catalog_category.category_id = t2.category_id', 'LEFT');
        $result = $this->db->get('catalog_category')->row();
        $urlKeys = $this->getCategoryUrl($result->url_ids);
        return $urlKeys;
    }

    function getCategoryBredCrumb($categoryId,$productId)
    {
        if ( !extension_loaded('memcached')){
            $crumb = $this->getProductBredCrumb($categoryId);
        }else{
            $cacheName = 'productBredCrumb'.$productId;
            $crumbCache = $this->memcached_library->get($cacheName);
            if (!$crumbCache) {
                $crumb = $this->getProductBredCrumb($categoryId);
                $this->memcached_library->add($cacheName, $crumb);
            }else{
                $crumb = $crumbCache;
            }
        }

        return $crumb;
    }

    function getCurrentCategory(){
        $this->db->select('catalog_category.category_name,catalog_category.category_id');
        $urlKey = @end($this->uri->segment_array());
        $this->db->where('url_key', $urlKey);
        return $this->db->get('catalog_category')->row();
    }

    function rangeValue($val, $min, $max) {
        return ($val >= $min && $val <= $max);
    }

    function getPriceRange($collection)
    {
        $main = new Main();
        $rangeValue = [];
        if(!empty($_GET['price_from'])) {
            $priceFrom = $_GET['price_from'];
            $priceTo = $_GET['price_to'];
            foreach ($collection as $price) {
                $priceData = $main->getProductPrice($price->price_data);
                if ($priceData->special_price_index) {
                    $Price = $priceData->special_price_index;
                } else {
                    $Price = $priceData->price_index;
                }
                $check =  $this->rangeValue($Price,$priceFrom,$priceTo);
                if($check==true){
                    $rangeValue[] = $Price;
                }
            }
        }

        return $rangeValue;
    }

    function getCurrentCollectionMinMaxPrice($currentCollection){
        $allPrice = [];
        $main = new Main();
        foreach($currentCollection as $price){
            $priceData = $main->getProductPrice($price->price_data);
            if($priceData->special_price_index){
                $allPrice[]=$priceData->special_price_index;
            }else{
                $allPrice[]=$priceData->price_index;
            }
        }
        $maxPrice = round(max($allPrice));
        $minPrice = round(min($allPrice));
        return (object) array(
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        );
    }


    function getProductCollection($start_from=null,$limit=null){
        $priceRange = array();
        if(!empty($_GET['price_from'])) {
            $currentCollection = $this->getCurrentProductCollection();
            $priceRange = $this->getPriceRange($currentCollection);
        }
        $categoryId = $this->getCurrentCategory()->category_id;
        $category = "FIND_IN_SET('".$categoryId."', category)";
        $this->db->where($category);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start_from);
        if (!empty($_GET)){
            $params = $_GET;
            unset($params['price_from']);
            unset($params['price_to']);
            foreach ($params as $key => $param){
                $values = explode('_',$param);
                if($key!='page') {
                    $searchTermsCode = '"attribute_code":"' . $key . '"';
                    $this->db->like('attributes', $searchTermsCode, 'both');
                }
                $i=0;
                foreach ($values as $value){
                    if($key!='page'){
                        $searchTermsValue = '"attribute_value":"'.$value.'"';
                        if($i==0){
                            $this->db->like('attributes', $searchTermsValue, 'both');
                        }else{
                            $this->db->or_like('attributes', $searchTermsValue, 'both');
                        }
                    }
                    $i++;
                }
            }
            if($priceRange){
                $p=0;
                foreach($priceRange as $price){
                    $searchTermsPriceValue = '"price":"'.$price.'"';
                    if($p==0){
                        $this->db->like('price_data', $searchTermsPriceValue, 'both');
                    }else{
                        $this->db->or_like('price_data', $searchTermsPriceValue, 'both');
                    }
                    $p++;
                }
            }
        }
        $this->db->order_by("product_id", "DESC");
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function getProductCollectionSearch($start_from=null,$limit=null){

        $this->db->where('status', 1);
        $this->db->limit($limit, $start_from);
        if (!empty($_GET)){
            if(!empty(@$_GET['tag'])){
                $tags = "FIND_IN_SET('".@$_GET['tag']."', tags)";
                $this->db->where($tags);
            }
            $params = $_GET;
            unset($params['tag']);
            unset($params['tag_group']);
            foreach ($params as $key => $param){
                $values = explode('_',$param);

                if($key!='page') {
                    if($key!='q')
                    {
                        $searchTermsCode = '"attribute_code":"' . $key . '"';
                        $this->db->like('attributes', $searchTermsCode, 'both');
                    }
                }
                $i=0;
                foreach ($values as $value){
                    if($key!='page'){
                        if($key=='q')
                        {
                            $this->db->like('product_name', $value);
                        }
                        else
                        {
                            $searchTermsValue = '"attribute_value":"'.$value.'"';
                            if($i==0){
                                $this->db->like('attributes', $searchTermsValue, 'both');
                            }else{
                                $this->db->or_like('attributes', $searchTermsValue, 'both');
                            }
                        }

                    }
                    $i++;
                }
            }
        }
        $this->db->order_by("product_id", "DESC");
        $collection =  $this->db->get('catalog_product')->result();
        //print_r($this->db->last_query());die;
        return $collection;
    }

    function getCurrentProductCollection(){
        $categoryId = $this->getCurrentCategory()->category_id;
        $where = "FIND_IN_SET('".$categoryId."', category)";
        $this->db->select('price_data,attributes');
        $this->db->where($where);
        $this->db->where('status', 1);
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function getCurrentProductCollectionSearch(){

        $this->db->where('status', 1);
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function relatedProduct($categoryId)
    {
        $where = "FIND_IN_SET('".$categoryId."', category)";
        $this->db->where($where);
        $this->db->where('status', 1);
        $this->db->limit(6);
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

    function checkInArrayParams($code,$value){
        $Params = @explode('_',@$_GET[$code]);
        if (in_array($value, $Params)) {
            return true;
        } else {
            return false;
        }
    }


    function layeredUrl($code,$value,$activeFilter){
        $url = $this->getFilterUrl($code);
        $uniq = array();
        if(!empty(@$_GET[$code])){
            $existParams = @explode('_',@$_GET[$code]);
            $uniq = array_unique($existParams);
        }
        if(!empty($uniq)){
            if($activeFilter==1){
                if (($key = array_search($value, $uniq)) !== false) {
                    unset($uniq[$key]);
                }
                $uniqParams = @implode('_', $uniq);
                $params = $uniqParams;
            }else{
                $uniqParams = @implode('_', $uniq);
                $params = $uniqParams.'_'.$value;
            }
        }else{
            $params = $value;
        }

        $url_components = parse_url($url);
        if(empty($url_components['query'])){
            $rUrl = rtrim($url, '?');
            if(!empty($params)){
                $filterUrl = $rUrl.'?'.$code.'='.$params;
            }else{
                $filterUrl = $rUrl;
            }
        }else{
            if(!empty($params)){
                $filterUrl = $url.'&'.$code.'='.$params;
            }else{
                $filterUrl = $url;
            }
        }
        return $filterUrl;
    }

    function getCurrentUrl(){
        $currentURL = current_url();
        $params   = @$_GET;
        $fullURL = $currentURL . '?' . http_build_query($params);
        $url_components = parse_url($fullURL);

        if(empty($url_components['query'])){
            $rUrl = rtrim($fullURL, '?');
            $filterUrl = $rUrl;
        }else{
            $filterUrl = $fullURL;
        }
        return $filterUrl;
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

    function priceRangeActionUrl()
    {
        $currentURL = current_url();
        $getData = $_GET;
        unset($getData['price_from']);
        unset($getData['price_to']);
        $params = http_build_query($getData);
        $fullURL = $currentURL . '?' . $params;

        return $fullURL;
    }

    function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
    {
        $pageLink = $this->getFilterUrl('page');
        $pagination = '';
        if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
            $pagination .= '<ul class="pagination mt-3 justify-content-center pagination_style1">';

            $right_links    = $current_page + 3;
            $previous       = $current_page - 3; //previous link
            $next           = $current_page + 1; //next link
            $first_link     = true; //boolean var to decide our first link

            if($current_page > 1){
                $previous_link = ($previous==0)? 1: $previous;
                $pagination .= '<li class="page-item"><a class="page-link" href="'.$this->getPaginationUrl($pageLink,1).'" data-page="1" title="First">&laquo;</a></li>'; //first link
                $pagination .= '<li class="page-item"><a class="page-link" href="'.$this->getPaginationUrl($pageLink,abs($previous_link)).'" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li class="page-item"><a class="page-link" href="'.$this->getPaginationUrl($pageLink,$i).'" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }
                $first_link = false; //set first link to false
            }

            if($first_link){ //if current active page is first link
                $pagination .= '<li class="page-item active"><a class="page-link" href="javascript:void(0)">'.$current_page.'</a></li>';
            }elseif($current_page == $total_pages){ //if it's the last active link
                $pagination .= '<li class="page-item active"><a class="page-link" href="javascript:void(0)">'.$current_page.'</a></li>';
            }else{ //regular current link
                $pagination .= '<li class="page-item active"><a class="page-link" href="javascript:void(0)">'.$current_page.'</a></li>';
            }

            for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
                if($i<=$total_pages){
                    $pagination .= '<li class="page-item"><a  class="page-link" href="'.$this->getPaginationUrl($pageLink,$i).'" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
                }
            }
            if($current_page < $total_pages){
                $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li class="page-item"><a class="page-link" href="'.$this->getPaginationUrl($pageLink,$next_link).'" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="page-item"><a class="page-link" href="'.$this->getPaginationUrl($pageLink,$total_pages).'" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
            }

            $pagination .= '</ul>';
        }
        return $pagination; //return pagination links
    }

    function getValueOption($attributeValues,$attributeId){
        $options = array();
        foreach ($attributeValues as $attributeValue){
            $data = explode('-',$attributeValue);
            if($data[1]==$attributeId){
                $options[] = $data[0];
            }
        }
        return $options;
    }

    function getAttributeCodeById($id){

        $this->db->select('attribute_code');
        $this->db->where('attribute_id',$id);
        $res = $this->db->get('attributes')->row();
        return $res->attribute_code;
    }

    function getAttributeIdByCode($code){

        $this->db->select('attribute_id');
        $this->db->where('attribute_code',$code);
        $res = $this->db->get('attributes')->row();
        return $res->attribute_id;
    }

    function getAttributeSwatchType($id){

        $this->db->select('swatch_type,attribute_id,label');
        $this->db->where('attribute_id',$id);
        $res = $this->db->get('attributes')->row();
        return $res;
    }

    function getFilterOptions($collection){
        $attributes = array();
        if(!empty($collection)){
            $attributeArrayFirst = array();
            $attributeValues =[];
            foreach ($collection as $attribute){
                $attributeArray= json_decode($attribute->attributes,true);
                foreach ($attributeArray as $item){
                    $attributeValues[$item['attribute_value']] = $item['attribute_value'].'-'.$item['attribute_id'];
                    if($item['layered_navigation']==1){
                        $attributeArrayFirst[$item['attribute_id']] = array(
                            'attribute_id' => $item['attribute_id'],
                            'attribute_label' => $item['attribute_label'],
                            'attribute_value' => $item['attribute_value'],
                            'layered_navigation' => $item['layered_navigation'],
                            'advanced_search' => $item['advanced_search'],
                            'quick_search' => $item['quick_search'],
                        );
                    }
                }
            }
            foreach ($attributeArrayFirst as $value){
                $attributes[] = array(
                    'attribute_id' => $value['attribute_id'],
                    'attribute_code' => $this->getAttributeCodeById($value['attribute_id']),
                    'attribute_label' => $value['attribute_label'],
                    ///'attribute_value' => $this->getValueOption($attributeValues,$value['attribute_id']),
                    'attribute_value' => $attributeValues,
                    'layered_navigation' => $value['layered_navigation'],
                    'advanced_search' => $value['advanced_search'],
                    'quick_search' => $value['quick_search'],
                );
            }
        }
        return $attributes;
    }

    function getCurrentFilters(){
        $params = $_GET;
        unset($params['page']);
        unset($params['tag_group']);
        $filter = [];
        foreach ($params as $key => $param) {
            $values = explode('_', $param);
            foreach ($values as $value){
                if($key=='tag'){
                    $filter[] = array(
                        'key' => $key,
                        'name' => $this->getTagName($value),
                        'value' => $value,
                    );
                }else{
                    $filter[] = array(
                        'key' => $key,
                        'name' => $value,
                        'value' => $value,
                    );
                }
            }
        }

       return $filter;
    }

    function product($url_key){

        $this->db->where_in('url_key',$url_key);
        $product = $this->db->get('catalog_product')->row();
        return $product;
    }

    function getProductSpecification($productId){

        $this->db->where_in('product_id',$productId);
        $specification = $this->db->get('product_specification')->result();
        return $specification;
    }
    
    function getUserData($id){
        $this->db->where('id',$id);
        return $this->db->get('users')->row();
    }

    function getAttributeSet()
    {
        return $this->db->get('attribute_set')->result();
    }

    function get_all_main_categories()
    {
        $this->db->where('parent_category',0);
        return $this->db->get('catalog_category')->result();
    }
    function product_data($product_id)
    {
        $this->db->where('product_id', $product_id);
        return $this->db->get('catalog_product')->row();
    }
    
    function showsubs($cat_id, $dashes = '')
    {
        $dashes .= '__';
        $this->db->where('parent_category', $cat_id);
        $rsSub = $this->db->get('catalog_category')->result();
        if (count($rsSub) >= 1) {
            foreach ($rsSub as $rows_sub) {
                $this->arr[] = array('category_name' => $dashes . $rows_sub->category_name, 'category_id' => $rows_sub->category_id);
                $this->showsubs($rows_sub->category_id, $dashes);
            }
        }
    }
    
    function showcats()
    {
        $this->db->where('parent_category', 0);
        $rsMain = $this->db->get('catalog_category')->result();
        $this->arr = array();
        if (count($rsMain) >= 1) {
            foreach ($rsMain as $rows_main) {
                $this->arr[] = array('category_name' => $rows_main->category_name, 'category_id' => $rows_main->category_id);
                $this->showsubs($rows_main->category_id);
            }
            return $this->arr;
        }
    }

    function specification($product_id)
    {
        $this->db->where('product_id', $product_id);
        return $this->db->get('product_specification')->result();
    }

    function meta_info($product_id)
    {
        $this->db->where('section_id', $product_id);
        $this->db->where('section', 'product');
        return $this->db->get('seo')->row();
    }

    function getAttributesFromSet($setId)
    {
        $this->db->select('attribute_id');
        $this->db->where('set_id',$setId);
        $res=$this->db->get('attribute_set_options')->result();
        $ides = array();
        foreach ($res as $re){
            $ides[] = $re->attribute_id;
        }
        return $ides;
    }
    function get_attribute_dataview($att_arr)
    {
        $this->db->where_in('attribute_id',$att_arr);
        $result = $this->db->get('attributes')->result();
        return $result;
    }
    function get_attribute_options($attribute_id)
    {
        $this->db->where('attribute_id',$attribute_id);
        return $this->db->get('attribute_options')->result();
    }
    function check_product_url($product_url)
    {
        $this->db->select('*');
        $this->db->where('u_key',$product_url);
        $result=$this->db->get('seo')->num_rows();
        return $result;
    }
    function product_url($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id',$product_id);
        $result=$this->db->get('product_urls')->row();
        return $result;
    }
    function get_product_code($product_id)
    {
        $this->db->select('product_code');
        $this->db->where('product_id',$product_id);
        $result=$this->db->get('catalog_product')->row();
        return $result->product_code;
    }
    function product_update($posts,$id)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
                
        $this->db->where('product_id',$id);
        $this->db->update('catalog_product', $post_value);
    }
    function seo_update($posts,$id)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
        $this->db->where('section_id',$id);
        $this->db->where('section','product');
        $this->db->update('seo', $post_value);
    }
    function product_specification_action($speci,$product_id)
    {
            
            $array=array();
            if($speci) 
             { 
                 foreach ($speci['specification_name'] as $id => $key)  
                 { 
                     $array[] = array( 
                     'specification_name'  => $speci['specification_name'][$id], 
                     'specification_value' => $speci['specification_value'][$id],
                     'product_id'          =>   $product_id
                     ); 
                 } 
             }
          for($i=0;$i<count($array);$i++)
          {
              $this->db->insert('product_specification',$array[$i]);
          } 
    }
    function product_specification_update($option,$product_id)
    {
            
          $array_update=array();
          $array_insert=array();
          /*echo '<pre>';
          print_r($option);
          echo '</pre>';die;*/
          if($option) 
          {
              foreach ($option['specification_value'] as $id => $key)
              {                 
                if(isset($option['id'][$id]))
                {
                    //die('1');
                   $array_update[] = array( 
                     'specification_name'    => $option['specification_name'][$id], 
                     'specification_value'   => $option['specification_value'][$id],
                     'id'                    => $option['id'][$id], 
                     );  
                }
                else
                {
                    //die('2');
                    $array_insert[] = array( 
                     'specification_name'    => $option['specification_name'][$id], 
                     'specification_value'   => $option['specification_value'][$id],
                     'product_id'    => $product_id
                     ); 
                }
                     
              } 
          }

        /*echo '<pre>';
        print_r($array_insert);
        echo '</pre>';die;*/

          for($i=0;$i<count($array_insert);$i++)
          {
            $this->db->insert('product_specification',$array_insert[$i]);
          } 
          for($i=0;$i<count($array_update);$i++)
          {
            $option_id = $array_update[$i]['id'];
            unset($array_update[$i]['id']);
            $this->db->where('id',$option_id);
            $this->db->update('product_specification',$array_update[$i]);
          } 
    }
    function update_product_url_key($product_id,$category_product_url,$product_url)
    {
        $data = array(
        'category_product_url' => $category_product_url,
            'product_url'      => $product_url
        );
        $this->db->where('product_id',$product_id);
        $this->db->update('product_urls',$data);
    }
    function product_url_rout($category_product_url,$product_url)
    {
        $data = '$route["' .$category_product_url.'"] = "product/product_view";';
        //$data .= '$route["' .$product_url.'"] = "product/product_view";';
        $this->load->helper('file');
        write_file(APPPATH . "cache/products.php", $data."\n","a+");
    }

    function insertLikes($productId,$userId)
    {
        $data = array(
            'user_id' => $userId,
            'product_id' => $productId,
        );

        $this->db->insert('mylikes', $data);
    }

    function deleteLike($productId,$userId)
    {
        $this ->db-> where('user_id', $userId);
        $this ->db-> where('product_id', $productId);
        $this ->db-> delete('mylikes');
    }

    function getProductName($productId){

        $this->db->select('product_name');
        $this->db->where_in('product_id',$productId);
        $product = $this->db->get('catalog_product')->row();
        return $product->product_name;
    }

    function getLikeCount($productId)
    {
        $this->db->where_in('product_id',$productId);
        $productCount = $this->db->get('mylikes')->num_rows();
        return $productCount;
    }

    function currentUserLike($productId,$userId)
    {
        $this->db->where_in('product_id',$productId);
        $this->db->where_in('user_id',$userId);
        $likeCount = $this->db->get('mylikes')->num_rows();
        return $likeCount;
    }
    function get_attribute_data($att_arr)
    {
        if(!empty($att_arr))
        {
            $this->db->where_in('attribute_id',$att_arr);
        }
        $result = $this->db->get('attributes')->result();
        //print_r($this->db->last_query());
        //print_r($result);die;
        return $result;
    }
    function getSetAttributeIds($setId){
        $this->db->where('set_id', $setId);
        $rsSub = $this->db->get('attribute_set_options')->result();
        $attributeId = array();
        foreach ($rsSub as $item){
            $attributeId[] = $item->attribute_id;
        }
        return $attributeId;
    }
    function getAttributes($setId,$userId)
    {
        $this->app = new App();
        $attributes = $this->app->getSetAttributeIds($setId);
        $attribute_data = $this->app->get_attribute_data($attributes);
        $attribute_string = '';
        foreach ($attribute_data as $data) {
            $attribute_string .= '<div class="col-md-6">';
            $attribute_options = $this->app->get_attribute_options($data->attribute_id);
            $cite = ($data->required == 1) ? '<cite>*</cite>' : '';
            $required = ($data->required == 1) ? 'required' : '';
            $attribute_string .= '<h6>' . $data->label . $cite . '</h6>';
            if ($data->input_type == 'text') {
                $attribute_string .= '<input class="form-control ui-wizard-content valid" placeholder="Enter ' . $data->label . '" ' . $required . ' name="attr[attribute_value][]" type="text">';
            } elseif ($data->input_type == 'dropdown' || $data->input_type == 'Dropdown') {
                if ($data->attribute_code == 'designers') {
                    $attribute_string .= '<select style="width: 100%;background-color: #FFF;" class="chosen-selecta" name="attr[attribute_value][]" ' . $required . '>';
                    foreach ($attribute_options as $options) {
                        if ($options->user_id == $userId) {
                            $attribute_string .= '<option selected value="' . $options->option_value . '">' . $options->option_value . '</option>';
                        }
                    }
                    $attribute_string .= '</select>';
                } else {
                    $attribute_string .= '<select style="width: 100%;background-color: #FFF;" class="chosen-selecta" name="attr[attribute_value][]" ' . $required . '>';
                    $attribute_string .= '<option value="">---Please Select ' . $data->label . '---</option>';
                    foreach ($attribute_options as $options) {
                        $attribute_string .= '<option value="' . $options->option_value . '">' . $options->option_value . '</option>';
                    }
                    $attribute_string .= '</select>';
                }

            } elseif ($data->input_type == 'y/n') {
                $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                $attribute_string .= '<option value="">---Please Select ' . $data->label . '---</option>';
                $attribute_string .= '<option value="YES">YES</option>';
                $attribute_string .= '<option value="NO">NO</option>';
                $attribute_string .= '</select>';
            } elseif ($data->input_type == 'textarea') {
                $attribute_string .= '<textarea style="width: 100%;border-radius: 3px;" name="attr[attribute_value][]" ' . $required . '></textarea>';
            }
            $attribute_string .= '<input type="hidden" name="attr[attribute_label][]" value="' . $data->label . '">';
            $attribute_string .= '<input type="hidden" name="attr[attribute_id][]" value="' . $data->attribute_id . '">';
            $attribute_string .= '<input type="hidden" name="attr[attribute_code][]" value="' . $data->attribute_code . '">';
            $attribute_string .= '<input type="hidden" name="attr[layered_navigation][][" value="' . $data->layered_nav . '">';
            $attribute_string .= '<input type="hidden" name="attr[advanced_search][]" value="' . $data->advanced_search . '">';
            $attribute_string .= '<input type="hidden" name="attr[quick_search][]" value="' . $data->quick_search . '">';
            $attribute_string .= '';
            $attribute_string .= '</div>';
        }

        return $attribute_string;
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

    function getAttributeOptionFilter($value)
    {
        @list($OptionValue,$optionId,$attributeId) = explode('-',$value);
        return (object) array(
            'option_value' => $OptionValue,
            'option_id' => $optionId,
            'attribute_id' => $attributeId,
        );
    }

    function getOptionData($id){

        $this->db->select('attribute_options.option_value,attribute_options.option_id,t2.swatch_image,t2.color_code,t2.swatch_text');
        $this->db->where('attribute_options.option_id', $id);
        $this->db->join('swatches as t2', 'attribute_options.option_id = t2.option_id', 'LEFT');
        $result = $this->db->get('attribute_options')->row();
        return $result;
    }

    function getOptionDataDefault($id){

        $this->db->select('option_value,option_id');
        $this->db->where('option_id', $id);
        $result = $this->db->get('attribute_options')->row();
        return $result;
    }
}