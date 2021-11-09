<?php
class App extends CI_Model
{
    function getNewsDetails()
    {
        $record_num = end($this->uri->segment_array());

        $this->db->where('url_key',$record_num);
        $res = $this->db->get('news')->row();
        return $res;
    }

    function getGallery($id)
    {
        $this->db->where('news_id',$id);
        $res = $this->db->get('news_gallery')->result();
        return $res;
    }

    function getNews(){
        $this->db->order_by("id", "asc");
        $res = $this->db->get('news')->result();
        return $res;
    }
}
?>