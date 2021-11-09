<?php
class App extends CI_Model
{
   
    

    function customerlisting()
    {
      $this->db->where('type', 'User');
      $this->db->order_by("first_name", "asc");      
      $res = $this->db->get('users')->result();
        
       return $res;
    }
    
    
    function get_store_credit_data($credit_id)
    {
        $this->db->select('*');
        $this->db->where('id', $credit_id);
        $query = $this->db->get('store_credit');
        $res=$query->row();
        return $res;
    }
    
    
    function getbalance($customerid)
    {
        $this->db->select('*');
        $this->db->where('customer_id', $customerid);
        $res = $this->db->get('store_credit')->result();       
        return $res;
    }

    
    

    

 }
?>