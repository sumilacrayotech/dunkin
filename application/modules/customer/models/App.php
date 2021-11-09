<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends CI_Model
{
    public function __construct()
    {
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->model('Main');
        parent::__construct();
    }

    function deletecustomer($custid){
        $this->db->where('customerid',$custid);
        $del=$this->db->delete('customer');
        $this->db->where('customerid',$custid);
        $del=$this->db->delete('customerquestionsansw');




    }

}