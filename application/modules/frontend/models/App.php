<?php
class App extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
    }


    function insertcustomer($data){
        $add=$this->db->insert('customer', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

function getcustomerquest($qid){
    $this->db->where('questionnaireid',$qid);
    $this->db->where('status','Active');
    $collection =  $this->db->get('questions')->result();
    return $collection;
}
function insertcustomerquestions($data){
    return $add=$this->db->insert('customerquestionsansw', $data);
}
/*function updatemainquestions($data,$id){
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
    }*/




}
?>