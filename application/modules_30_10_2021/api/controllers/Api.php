<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->load->model('ion_auth_model');
        $this->load->model('App');
        $this->load->helper('url');
        header('Access-Control-Allow-Origin: *');
        error_reporting(0);
    }
    public function validate_get()
    {
        $app = new App();
        $responseData = array();
        $voucher_code = $this->input->get('voucher_code', TRUE);
        $voucherData = $app->getVoucherStatus($voucher_code);
        if(!empty($voucherData)){
            if($voucherData->status=='Used'){
                $responseData = array(
                    'status' => 'Used',
                    'store' => $voucherData->store,
                    'used_date' => $voucherData->used_date,
                );
            }

            if($voucherData->status=='Active'){
                $responseData = array(
                    'status' => 'Free',
                    'expiry_from' => $voucherData->expiry_from,
                    'expiry_to' => $voucherData->expiry_to,
                );
            }

            if($voucherData->status=='Processing'){
                $responseData = array(
                    'status' => 'Processing',
                    'expiry_from' => $voucherData->expiry_from,
                    'expiry_to' => $voucherData->expiry_to,
                );
            }
        }else{
            $responseData = array(
                'status' => 'Unavailable'
            );
        }
        $this->response($responseData);
    }

    public function update_post()
    {
        $app = new App();
        $rawData = file_get_contents("php://input");
        $arrayData = json_decode($rawData,true);
        $status = $arrayData['status'];
        $statusAlgorithm = array('Free','Processing','Used');
        if(!empty($arrayData)){
            if (in_array($status, $statusAlgorithm)) {
                if(empty($arrayData['voucher_code'])){
                    $responseData = array(
                        'message' => 'Voucher Code Not Available'
                    );
                }elseif (empty($arrayData['user_code'])){
                    $responseData = array(
                        'message' => 'User Code Not Available'
                    );
                }elseif (empty($arrayData['store'])){
                    $responseData = array(
                        'message' => 'Store Name Not Available'
                    );
                }else{
                    $app->voucherUpdate($arrayData['voucher_code'],$arrayData['user_code'],$arrayData['store'],$status);
                    $responseData = array(
                        'message' => 'success'
                    );
                }
            } else {
                $responseData = array(
                    'message' => 'Status Unavailable'
                );
            }
        }else{
            $responseData = array(
                'message' => 'Data Not Available'
            );
        }

        $this->response($responseData);
    }
}