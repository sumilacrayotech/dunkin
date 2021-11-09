<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    function check_mail($email)
    {
        $this->db->where('email',$email);
        return $this->db->get('users')->num_rows();
    }

    function getUserData($id){
        $this->db->where('id',$id);
        return $this->db->get('users')->row();
    }

    function getVoucherStatus($voucherCode)
    {
        $this->db->where('number',$voucherCode);
        return $this->db->get('voucher')->row();
    }

    function voucherUpdate($voucherNumber,$user_code,$store,$status)
    {
        $data = array(
            'user_code' => $user_code,
            'store' => $store,
            'status' => $status,
            'used_date' => date('Y-m-d H:i:s')
        );

        $this->db->where('number', $voucherNumber);
        $this->db->update('voucher', $data);
        return true;
    }
}
?>