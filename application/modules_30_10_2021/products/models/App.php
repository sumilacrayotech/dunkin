<?php
class App extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
    }

    function getConfigProduct($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('configurable_products')->row();
    }

    function createConfigTemplate($data){
        return $this->load->view('create_config',$data,true);
    }

    function douploadImage($file_name,$upload_path,$width,$height,$field)
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 1;
        $pass = '';
        while ($i <= 4) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        $image_name = $pass.'_'.time().'_'.str_replace(' ', '_', $file_name);
        $error = '';
        $imageName = '';
        $path= FCPATH . $upload_path;
        $config['image_library'] = 'gd2';
        $config['upload_path'] = $path;
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $config["allowed_types"] = 'jpg|png|jpeg';
        $config["max_size"] = 3072;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($field))
        {
            $error =  $this->upload->display_errors();
        }
        else
        {
            $config['image_library'] = 'gd2';
            $config['source_image']	= $path.$image_name;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            if($width){
                $config['width']	= $width;
            }
            if($height){
                $config['height']	= $height;
            }
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $imageName =  $image_name;
        }

        return array(
            'error' =>   $error,
            'file_name' => $imageName
        );
    }

    function getConfigAttributes($setId)
    {
        $collection = $this->db->select('t1.attribute_id, t1.set_id, t2.label')
            ->from('attribute_set_options as t1')
            ->where('t1.set_id', $setId)
            ->where('t2.configurable', 'Yes')
            ->join('attributes as t2', 't1.attribute_id = t2.attribute_id', 'LEFT')
            ->get()->result();
        return $collection;
    }

    function getSelectedConfigAttributesWithOptions($ids)
    {
        $arrayIds = explode(',',$ids);
        $collection = $this->db->select('t1.attribute_id, t1.set_id, t2.label, t2.required, t2.attribute_code')
            ->from('attribute_set_options as t1')
            ->where_in('t1.attribute_id', $arrayIds)
            ->where('t2.configurable', 'Yes')
            ->join('attributes as t2', 't1.attribute_id = t2.attribute_id', 'LEFT')
            ->get()->result();
        $data =[];
        foreach($collection as $item){
            $data[] = array(
                'attribute_id' => $item->attribute_id,
                'set_id' => $item->set_id,
                'label' => $item->label,
                'required' => $item->required,
                'attribute_code' => $item->attribute_code,
                'options' => $this->get_attribute_options($item->attribute_id)
            );
        }
        return $data;
    }

    function getOptionData($optionId)
    {
        $this->db->where('option_id', $optionId);
        return $this->db->get('attribute_options')->row();
    }

    function getSelectedConfigAttributes($ids)
    {
        $arrayIds = explode(',',$ids);
        $collection = $this->db->select('t1.attribute_id, t1.set_id, t2.label, t2.required, t2.attribute_code')
            ->from('attribute_set_options as t1')
            ->where_in('t1.attribute_id', $arrayIds)
            ->where('t2.configurable', 'Yes')
            ->join('attributes as t2', 't1.attribute_id = t2.attribute_id', 'LEFT')
            ->get()->result();
        return $collection;
    }

    function get_all_main_categories()
    {
        $this->db->where('parent_category',0);
        return $this->db->get('catalog_category')->result();
    }
    function get_main_subcategories($cid)
    {
        $this->db->where('parent_category', $cid);
        return $this->db->get('catalog_category')->result();
    }
    function check_subcategories($category_id)
    {
        $this->db->where('parent_category',$category_id);
        return $this->db->get('catalog_category')->num_rows();
    }
    function product_data($product_id)
    {
        $this->db->where('product_id', $product_id);
        return $this->db->get('catalog_product')->row();
    }
    function meta_info($product_id)
    {
        $this->db->where('section_id', $product_id);
        $this->db->where('section', 'product');
        return $this->db->get('seo')->row();
    }
    function category_tab_url($category_id)
    {
        $this->db->select('url');
        $this->db->where('category_id',$category_id);
        $res = $this->db->get('category_urls')->row();
        return $res->url;
    }
    function product_update($posts,$id)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
        /*echo '<pre>';
        print_r($post_value);die;*/
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
          if($option) 
          {
              foreach ($option['specification_value'] as $id => $key)
              {                 
                if(isset($option['id'][$id]))
                {
                   $array_update[] = array( 
                     'specification_name'    => $option['specification_name'][$id], 
                     'specification_value'   => $option['specification_value'][$id],
                     'id'                    => $option['id'][$id], 
                     );  
                }
                else
                {
                    $array_insert[] = array( 
                     'specification_name'    => $option['specification_name'][$id], 
                     'specification_value'   => $option['specification_value'][$id],
                     'product_id'    => $product_id
                     ); 
                }
                     
              } 
          }
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

    function specification($product_id)
    {
        $this->db->where('product_id', $product_id);
        return $this->db->get('product_specification')->result();
    }
    function get_product_code($product_id)
    {
        $this->db->select('product_code');
        $this->db->where('product_id',$product_id);
        $result=$this->db->get('catalog_product')->row();
        return $result->product_code;
    }
    function product_url($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id',$product_id);
        $result=$this->db->get('product_urls')->row();
        return $result;
    }
    function check_product_url($product_url)
    {
        $this->db->select('*');
        $this->db->where('u_key',$product_url);
        $result=$this->db->get('seo')->num_rows();
        return $result;
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
    function category_url_key($category_id)
    {
        $this->db->select('url_key');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res = $query->row_array();
        if ($res) {
            return $res['url_key'];
        }
    }
    function category_url($category_id)
    {
        $this->db->select("url_key");
        $this->db->where('section_id', $category_id);
        $query = $this->db->get('seo');
        $res = $query->row();
        if ($res) {
            $url_key = $res->url_key;
            $categories = implode("/", array_map(array($this, 'category_url_key'), explode("/", $url_key)));
            return  $categories;
        }
    }
    function product_url_rout($category_product_url,$product_url)
    {
        $data = '$route["' .$category_product_url.'"] = "product/product_view";';
        //$data .= '$route["' .$product_url.'"] = "product/product_view";';
        $this->load->helper('file');
        write_file(APPPATH . "cache/products.php", $data."\n","a+");
    }
    function check_product_code($product_code)
    {
        $this->db->select('product_id');
        $this->db->where('product_code',$product_code);
        $result=$this->db->get('catalog_product')->num_rows();
        return $result;
    }
    function user_delivery_address($order_id)
    {
        $this->db->where('order_id',$order_id);
        $delivery = $this->db->get('delivery_address')->row();
        return $delivery;
    }
    function contry_data($id)
    {
        $this->db->where('id',$id);
        $country = $this->db->get('tb_country')->row();
        return $country;
    }
    function order_product($order_id)
    {
        $this->db->where('order_id',$order_id);
        $country = $this->db->get('order_items');
        return $country->result();
    }
    function recent_product_data($product_id)
    {
        $query = $this->db->query("SELECT a.product_id,a.product_name,a.category,a.url_key,a.special_price,a.price,a.stock,b.image,b.id
        FROM catalog_product a,products_image b WHERE a.product_id=b.product_id AND a.status=1 AND
        b.default_image=1 AND a.product_id=$product_id");
        return $query->row_array();
    }
    function get_media_images($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id',$product_id);
        $exe = $this->db->get('products_image')->result();
        return $exe;
    }
    function default_image_name($id)
    {
        $this->db->select('image');
        $this->db->where('id',$id);
        $exe = $this->db->get('products_image')->row();
        return $exe->image;
    }
    function get_attributes($category_id)
    {
        $this->db->select('attributes');
        $this->db->where('category_id',$category_id);
        $res=$this->db->get('catalog_category')->row();
        return $res->attributes;
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
    function get_attribute_data($att_arr)
    {
        $this->db->where_in('attribute_id',$att_arr);
        //$this->db->where('configurable','No');
        $result = $this->db->get('attributes')->result();
        //print_r($this->db->last_query());
        //print_r($result);die;
        return $result;
    }
    function get_attribute_dataview($att_arr)
    {
        $this->db->where_in('attribute_id',$att_arr);
        $result = $this->db->get('attributes')->result();
        //print_r($this->db->last_query());die;
        //print_r($result);die;
        return $result;
    }
    function get_attribute_options($attribute_id)
    {
        $this->db->where('attribute_id',$attribute_id);
        return $this->db->get('attribute_options')->result();
    }
    function get_category_name($category_id)
    {
        $this->db->select('category_name');
        $this->db->where('category_id',$category_id);
        $res=$this->db->get('catalog_category')->row();
        return $res->category_name;
    }
    function get_category_hierarchy($category_id)
    {
        $this->db->select('url');
        $this->db->where('category_id',$category_id);
        $res=$this->db->get('category_urls')->row();
        $full_url=$res->url;
        $categories=array_map(array($this,'category_name'), explode("/", $full_url));
        return $categories;
    }
    function category_name($url)
    {
        $this->db->select('category_name');
        $this->db->where('url_key',$url);
        $res=$this->db->get('catalog_category')->row();
        return $res->category_name;
    }
    function category_id_hierarchy($category_id)
    {
        $this->db->select('url');
        $this->db->where('category_id',$category_id);
        $res=$this->db->get('category_urls')->row();
        $full_url=$res->url;
        $categories=array_map(array($this,'category_id'), explode("/", $full_url));
        return $categories;
    }
    function category_id($url)
    {
        $this->db->select('category_id');
        $this->db->where('url_key',$url);
        $res=$this->db->get('catalog_category')->row();
        return $res->category_id;
    }
    function getAttributeSet()
    {
        return $this->db->get('attribute_set')->result();
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

    function getSetAttributeIds($setId){
        $this->db->where('set_id', $setId);
        $rsSub = $this->db->get('attribute_set_options')->result();
        $attributeId = array();
        foreach ($rsSub as $item){
            $attributeId[] = $item->attribute_id;
        }
        return $attributeId;
    }

    function getAttributes($setId)
    {
        $this->app = new App();
        $attributes = $this->app->getSetAttributeIds($setId);
        $attribute_data = $this->app->get_attribute_data($attributes);
        $attribute_string = '';
        foreach ($attribute_data as $data)
        {
            $attribute_options = $this->app->get_attribute_options($data->attribute_id);
            $cite = ($data->required == 1) ? '<cite>*</cite>' : '';
            $required = ($data->required == 1) ? 'required' : '';
            $attribute_string .= '<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">' . $data->label . $cite . '</label>
                                <div class="col-sm-10">';
            if ($data->input_type == 'text')
            {
                $attribute_string .= '<input class="form-control ui-wizard-content valid" placeholder="Enter ' . $data->label . '" ' . $required . ' name="attr[attribute_value][]" type="text">';
            }
            elseif ($data->input_type == 'dropdown' || $data->input_type == 'Dropdown')
            {
                $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                $attribute_string .= '<option value="">---Please Select ' . $data->label . '---</option>';
                foreach ($attribute_options as $options)
                {
                    $optionValue = $options->option_value.'-'.$options->option_id;
                    $attribute_string .= '<option value="' . $optionValue . '">' . $options->option_value . '</option>';
                }
                $attribute_string .= '</select>';
            }
            elseif ($data->input_type == 'y/n')
            {
                $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                $attribute_string .= '<option value="">---Please Select ' . $data->label . '---</option>';
                $attribute_string .= '<option value="YES">YES</option>';
                $attribute_string .= '<option value="NO">NO</option>';
                $attribute_string .= '</select>';
            }
            elseif ($data->input_type == 'textarea')
            {
                $attribute_string .= '<textarea class="form-control ui-wizard-content" name="attr[attribute_value][]" ' . $required . '></textarea>';
            }
            $attribute_string .= '<input type="hidden" name="attr[attribute_label][]" value="' . $data->label . '">';
            $attribute_string .= '<input type="hidden" name="attr[attribute_id][]" value="' . $data->attribute_id . '">';
            $attribute_string .= '<input type="hidden" name="attr[attribute_code][]" value="' . $data->attribute_code . '">';
            $attribute_string .= '<input type="hidden" name="attr[layered_navigation][][" value="' . $data->layered_nav . '">';
            $attribute_string .= '<input type="hidden" name="attr[advanced_search][]" value="' . $data->advanced_search . '">';
            $attribute_string .= '<input type="hidden" name="attr[quick_search][]" value="' . $data->quick_search . '">';
            $attribute_string .= '</div>
                    </div>';
        }
        return $attribute_string;
    }

    function getTagSubGroup($id){
        $this->db->where_in('id',$id);
        $results = $this->db->get('tag_sub_group')->row();
        return $results;
    }

    function getTagMainGroup($id){
        $this->db->where_in('id',$id);
        $results = $this->db->get('tag_group')->row();
        return $results;
    }

    function categoryTags($categories){
        $this->db->where_in('category_id',$categories);
        $results = $this->db->get('catalog_category')->result();
        $tag_group = array();
        foreach ($results as $result){
            $tag_group[] = $result->tag_group;
        }

        $this->db->where_in('group_id',$tag_group);
        $tagGrp = $this->db->get('tag_sub_group')->result();
        $tag_sub_group = array();
        foreach ($tagGrp as $tagSub){
            $tag_sub_group[] = $tagSub->id;
        }

        $this->db->where_in('sub_group_id',$tag_sub_group);
        $tags = $this->db->get('tags')->result();
        $cms_category_multiselect = array();
        foreach($tags as $tag)
        {
            $subGroup = $this->getTagSubGroup($tag->sub_group_id);
            $mainGroup = $this->getTagMainGroup($subGroup->group_id);
            $cms_category_multiselect[$tag->id] = $mainGroup->group_name.' >> '.$subGroup->sub_group_name.' >> '.$tag->tag_name;
        }
        //print_r($cms_category_multiselect);die;
        return $cms_category_multiselect;
    }

    function getProductCategoryTag($productId){

        $this->db->select('category');
        $this->db->where('product_id',$productId);
        $product=$this->db->get('catalog_product')->row();
        $categories = explode(',',$product->category);

        return $this->categoryTags($categories);
    }

    function checkAttribute($attributeId)
    {
        $query = $this->db->query("SELECT * FROM attributes WHERE attribute_id=$attributeId AND configurable='No'");
        return $query->num_rows();
    }

    function getAttributeJson($json)
    {
        $attributeArray = json_decode($json,true);
        $array = [];
        foreach($attributeArray as $item){
            /*$checked = $this->checkAttribute($item['attribute_id']);
            if($checked!=0) {
                $array[] = $item;
            }*/
            $array[] = $item;
        }

        return $array;
    }

    function getConfigProductsByParent($parentId)
    {
        $this->db->where_in('parent_id',$parentId);
        $result = $this->db->get('configurable_products')->result();
        return $result;
    }

    function getCurrencies()
    {
        $main = new Main();
        $currencies = json_decode($main->getConfigValue('configurations/currency_setup/allowedcurrencies'),true);
        return $currencies;
    }

    function getCurrencyAmount($priceData,$currencyCode)
    {
        $prices = json_decode($priceData,true);

        $matches = array();
        foreach($prices as $a){
            if($a['currency_code'] == $currencyCode)
                $matches=$a;
        }
        return $matches;
    }
}
?>