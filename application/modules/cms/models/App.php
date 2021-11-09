<?php
class App extends CI_Model
{
    public function __construct()
    {
		error_reporting(0);
    }

    function getPage()
    {
        $record_num = end($this->uri->segment_array());
        $this->db->where('url_key',$record_num);
        $res = $this->db->get('cms_pages')->row();
        return $res;
    }

    function getClients($type)
    {
        $this->db->where('type',$type);
        return $this->db->get('clients')->result();
    }

    function getTeams()
    {
        $res = $this->db->get('our_team')->result();
        return $res;
    }

    function insert_service_points($speci,$service_id)
    {
         $array=array();
         if($speci) 
         { 
            foreach ($speci['services'] as $id => $key)  
            { 
                $array[] = array( 
                     'services'     => $speci['services'][$id], 
                     'service_id'   => $service_id
                ); 
            } 
          }
          for($i=0;$i<count($array);$i++)
          {
              $this->db->insert('service_points',$array[$i]);
          } 
    }
    function get_product_service_name($id)
    {
        $this->db->select('title');
        $this->db->where('id',$id);
        $res = $this->db->get('product_services')->row();
        return @$res->title;
    }
    function get_service_name($id)
    {
        $this->db->select('service_name');
        $this->db->where('id',$id);
        $res = $this->db->get('services')->row();
        return @$res->service_name;
    }
    function get_service_points($service_id)
    {
        $this->db->where('service_id',$service_id);
        return $this->db->get('service_points')->result();
    }
    function update_service($servic_name,$service_id)
    {
        if($servic_name=='')
        {
            $data = array(
            'service_name' =>$servic_name,
            );
        }
        else
        {
             $data = array(
            'service_name' =>$servic_name,
            );
        }
        $this->db->where('id',$service_id);
        return $this->db->update('services',$data);
    }
    function service_points_update($option,$service_id)
    {
            
          $array_update=array();
          $array_insert=array();
          if($option) 
          { 
              foreach ($option['services'] as $id => $key)  
              {                 
                if(isset($option['id'][$id]))
                {
                   $array_update[] = array( 
                     'services'      => $option['services'][$id], 
                     'service_id'    => $option['id'][$id], 
                     );  
                }
                else
                {
                    $array_insert[] = array( 
                     'services'      => $option['services'][$id], 
                     'service_id' => $service_id
                     ); 
                }
                     
              } 
          }
          for($i=0;$i<count($array_insert);$i++)
          {
            $this->db->insert('service_points',$array_insert[$i]);
          } 
          for($i=0;$i<count($array_update);$i++)
          {
            $option_id = $array_update[$i]['service_id'];
            unset($array_update[$i]['service_id']);
            $this->db->where('id',$option_id);
            $this->db->update('service_points',$array_update[$i]);
          } 
     }
}
?>