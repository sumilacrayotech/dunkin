<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends CI_Model
{
    public function __construct(){
        parent::__construct();
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

    function getCategoryLevel($categoryId){

    }

    function getParentCategory(){
        $this->db->select('name, id, parent_category');
        $query = $this->db->get('category');
        $data = array();
        foreach ($query->result() as $row)
        {
            $data[] =array(
                $row->id => $row->name
            );
        }
        $categoryData = $this->array_flatten($data);
        return $categoryData;
    }

    function category_insert($posts,$table)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
        return $this->db->insert($table, $post_value);
    }
    function category_update($posts,$table,$id)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }

        $this->db->where('category_id',$id);
        $this->db->update($table, $post_value);
    }
    function check_category_url($category_url)
    {
        $this->db->select('*');
        $this->db->where('url',$category_url);
        $result=$this->db->get('category_urls')->num_rows();
        return $result;
    }
    function insert_url($catrgory_id,$url,$re_url_id)
    {
        $data = array(
            'category_id' =>$catrgory_id,
            'url' =>$url,
            'url_ids' =>$re_url_id,
        );
        $this->db->insert('category_urls', $data);
    }
    function update_url($catrgory_id,$url,$re_url_id)
    {
        $data = array(
            'url' =>$url,
            'url_ids' =>$re_url_id,
        );
        $this->db->where('category_id',$catrgory_id);
        $this->db->update('category_urls', $data);
    }
    function url_checking($url_key,$id)
    {
        $this->db->select('url_key');
        $this->db->where('url_key',$url_key);
        $this->db->where('category_id',$id);
        $query = $this->db->get('catalog_category');
        return $query->num_rows();
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
    function getAllAttributes()
    {
        return $this->db->get('attributes')->result();
    }

    function getTagGroups(){
        return $this->db->get('tag_group')->result();
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
    function get_level($id)
    {
        $this->db->select('level');
        $this->db->where('category_id', $id);
        $query = $this->db->get('category_level');
        $res=$query->row_array();
        return $res['level'];
    }
    function get_main_category($category_id)
    {
        $this->db->select('parent_category');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row_array();
        return$res['parent_category'];
    }
    function category_urlkey($category_id,$level)
    {
        $main= $this->get_main_category($category_id);
        if($main==0)
        {
            return $category_id;
        }
        else
        {
            $val=array();
            $val[]= $this->get_main_category($category_id);
            $j=0;
            for($i=1; $i<$level; $i++)
            {
                $val[$i]=$this->get_main_category($val[$j]);
                $j++;
            }
            $ky='';
            foreach(array_reverse($val) as $id)
            {
                if($id!=0)
                {
                    //$ky.= $this->url_key($id).'/';
                    $ky.= $id.'/';
                }
            }
            //return $ky.$this->url_key($category_id);
            return $ky.$category_id;
        }
    }
    function check_url($full_url)
    {
        $curl = curl_init($full_url);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        $result = curl_exec($curl);
        if ($result !== false)
        {
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($statusCode == 404)
            {
                return 0;
            }
            else
            {
                return 1;
            }
        }
        else
        {
            return 0;
        }
    }
    function get_category_level($category_id,$parent_id)
    {
        $parent_level=$this->get_main_category($category_id);
        if($parent_level==0)
        {
            $level=1;
        }
        else
        {
            $get_parent_level=$this->get_level($parent_id);
            $level=$get_parent_level+1;
        }
        return $level;
    }
    function seo_check($postvalue,$realvalue)
    {
        if($postvalue=='')
        {
            return $realvalue;
        }
        else
        {
            return $postvalue;
        }
    }
    function url_key($category_id)
    {
        $this->db->select('url_key');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row_array();
        return$res['url_key'];
    }
    function get_category_data($category_id)
    {
        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row();
        return $res;
    }
    function get_category_seo_data($category_id)
    {
        $this->db->select('title,meta_keyword,meta_description');
        $this->db->where('section','category');
        $this->db->where('section_id',$category_id);
        $query = $this->db->get('seo');
        $res=$query->row();
        return $res;
    }
    function get_category_name($category_id)
    {
        $this->db->select('category_name');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row();
        return $res->category_name;
    }
    function get_tag_group_name($group_id)
    {
        $this->db->select('group_name');
        $this->db->where('id', $group_id);
        $query = $this->db->get('tag_group');
        $res=$query->row();
        return $res->group_name;
    }
    function category_url_rout($url_key)
    {
        $data = '$route["' .$url_key.'"] = "home/products";';
        $output="";
        $output .= "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\n";
        $output .= implode("\n", $data);
        $output .="\n";
        $this->load->helper('file');
        write_file(APPPATH . "cache/category.php", $output,"a+");
    }
    function category_routes($url_key)
    {
        $data = '$route["' .$url_key.'"] = "product";';
        $this->load->helper('file');
        write_file(APPPATH . "cache/category.php", $data."\n","a+");
    }
    function add_category_tag($option,$category_id)
    {
        $array_insert=array();
        if($option)
        {
            foreach ($option['tag_name'] as $id => $key)
            {
                $array_insert[] = array(
                    'tag_name'    => $option['tag_name'][$id],
                    'category_id'    => $category_id
                );
            }
        }

        for($i=0;$i<count($array_insert);$i++)
        {
            $this->db->insert('tags',$array_insert[$i]);
        }
    }

    function category_tag_update($option,$category_id)
    {
        $array_update=array();
        $array_insert=array();
        if($option)
        {
            foreach ($option['tag_name'] as $id => $key)
            {
                if(isset($option['id'][$id]))
                {
                    //die('1');
                    $array_update[] = array(
                        'tag_name'    => $option['tag_name'][$id],
                        'category_id' => $category_id,
                        'id'          => $option['id'][$id],
                    );
                }
                else
                {
                    //die('2');
                    $array_insert[] = array(
                        'tag_name'    => $option['tag_name'][$id],
                        'category_id'    => $category_id
                    );
                }

            }
        }

        for($i=0;$i<count($array_insert);$i++)
        {
            $this->db->insert('tags',$array_insert[$i]);
        }
        for($i=0;$i<count($array_update);$i++)
        {
            $option_id = $array_update[$i]['id'];
            unset($array_update[$i]['id']);
            $this->db->where('id',$option_id);
            $this->db->update('tags',$array_update[$i]);
        }
    }

    function tags($category_id)
    {
        $this->db->where('category_id', $category_id);
        return $this->db->get('tags')->result();
    }
}
?>