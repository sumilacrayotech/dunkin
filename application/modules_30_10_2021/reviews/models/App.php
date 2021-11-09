<?php
class App extends CI_Model
{
   
    

    function productslisting()
    {
      $this->db->order_by("product_name", "asc");
      $res = $this->db->get('catalog_product')->result();
        
       return $res;
    }
    
    
    function get_review_data($review_id)
    {
        $this->db->select('*');
        $this->db->where('review_id', $review_id);
        $query = $this->db->get('reviews');
        $res=$query->row();
        return $res;
    }

    

 }
?>