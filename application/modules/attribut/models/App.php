<?php
class App extends CI_Model
{
    function attribute_insert($posts)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
        return $this->db->insert('attributes', $post_value);
    }
    function attribute_update($posts,$id)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }

        $this->db->where('attribute_id',$id);
        $this->db->update('attributes', $post_value);
    }
    function get_category()
    {
        $this->db->where('parent_category','0');
        return $this->db->get('catalog_category')->result();
    }
    function get_subcategory($category_id)
    {
        $this->db->where('parent_category',$category_id);
        return $this->db->get('catalog_category')->result();
    }
    function check_subcategories($category_id)
    {
        $this->db->where('parent_category',$category_id);
        return $this->db->get('catalog_category')->num_rows();
    }
    function check_category($category_id,$attribute_id)
    {
        $this->db->select('specific_categories');
        $this->db->where('attribute_id',$attribute_id);
        $res_att = $this->db->get('attributes')->row();
        $specific_categories = explode(',', $res_att->specific_categories);
        if(in_array($category_id,$specific_categories))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    function get_main_category($category_id)
    {
        $this->db->select('parent_category');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row_array();
        $parent_id = @$res['parent_category'].',';
        if($parent_id!=0)
        {
            $parent_id .= $this->get_main_category($res['parent_category']);
        }
        return $parent_id;

    }
    function get_level($id)
    {
        $this->db->select('level');
        $this->db->where('category_id', $id);
        $query = $this->db->get('category_level');
        $res=$query->row_array();
        return @$res['level'];
    }
    function attribute_set_insert($posts)
    {
        $post_value = array();
        foreach($posts as $key=>$post)
        {
            $post_value[$key] = $post;
        }
        return $this->db->insert('attribute_set', $post_value);
    }
    function attribute_options_insert($option,$attribute_id)
    {

            $array=array();
            if($option)
             {
                 foreach ($option['option_value'] as $id => $key)
                 {
                     $array[] = array(
                     'option_value'    => $option['option_value'][$id],
                     'option_position' => $option['option_position'][$id],
                     'attribute_id'    => $attribute_id
                     );
                 }
             }
          for($i=0;$i<count($array);$i++)
          {
              $this->db->insert('attribute_options',$array[$i]);
          }
    }
    function attribute_options_update($option,$attribute_id)
    {

          $array_update=array();
          $array_insert=array();
          if($option)
          {
              foreach ($option['option_value'] as $id => $key)
              {
                if(isset($option['option_id'][$id]))
                {
                   $array_update[] = array(
                     'option_value'    => $option['option_value'][$id],
                     'option_position' => $option['option_position'][$id],
                     'attribute_id'    => $attribute_id,
                     'option_id'    => $option['option_id'][$id], 
                     );
                }
                else
                {
                    $array_insert[] = array(
                     'option_value'    => $option['option_value'][$id],
                     'option_position' => $option['option_position'][$id],
                     'attribute_id'    => $attribute_id
                     );
                }

              }
          }
          for($i=0;$i<count($array_insert);$i++)
          {
            $this->db->insert('attribute_options',$array_insert[$i]);
          }
          for($i=0;$i<count($array_update);$i++)
          {
            $option_id = $array_update[$i]['option_id'];
            unset($array_update[$i]['option_id']);
            $this->db->where('option_id',$option_id);
            $this->db->update('attribute_options',$array_update[$i]);
          }
    }

    function attribute_data($attribute_id)
    {
        $this->db->where('attribute_id', $attribute_id);
        return $this->db->get('attributes')->row();
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


    function get_attributes_options($attribute_id)
    {
        $this->db->where('attribute_id', $attribute_id);
        return $this->db->get('attribute_options')->result();
    }
    function get_all_attributes()
    {
        return $this->db->get('attributes')->result();
    }
    function getAllAttributes()
    {
        return $this->db->get('attributes')->result();
    }
    function common_insert($table,$post)
    {
        $this->db->insert($table,$post);
        return $this->db->insert_id();
    }
    function get_all_attributesets()
    {
        return($this->db->get('attribute_set')->result());
    }
    function attributeset_data($id)
    {
        $this->db->where('set_id',$id);
        return $this->db->get('attribute_set')->row();
    }
    function get_attributeset_options($id)
    {
        $this->db->where('set_id',$id);
        $this->db->join('attributes','attributes.attribute_id = attribute_set_options.attribute_id');
        return $this->db->get('attribute_set_options')->result();
    }
    function attributeSetOptions($id){
        $this->db->where('set_id',$id);
        return $this->db->get('attribute_set_options')->result();
    }
    function get_attributeset_ids($id)
    {
        $this->db->where('set_id',$id);
        return $this->db->get('attribute_set_options')->result();
    }
    function common_update($table,$post,$where)
    {
        $this->db->where($where);
        $update=$this->db->update($table,$post);
        if($update)
            return TRUE;
        return FALSE;
    }

    function truncate_attributes($id)
    {
        $this->db->where('set_id',$id);
        $query=$this->db->delete('attribute_set_options');
        if($query)
            return TRUE;
        return FALSE;
    }

    function delete_attribute_set($id)
    {
        $this->db->where('set_id',$id);
        $query1=$this->db->delete('attribute_set');

        $this->db->where('set_id',$id);
        $query2=$this->db->delete('attribute_set_options');
        if($query2)
            return TRUE;
        return FALSE;
    }

    function check_attributecode($code)
    {
        $this->db->where('attribute_code',$code);
       return $this->db->get('attributes')->num_rows();
    }

    function checkSwatch($optionId)
    {
        $this->db->where('option_id',$optionId);
        return $this->db->get('swatches')->num_rows();
    }
}
?>