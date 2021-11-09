<?php
class Frontend extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        error_reporting(0);
    }


    public function index()
    {
        //if ($this->ion_auth->logged_in() == 1) {

            $this->template->load('frontendsignup', 'frontend',$data);
        //} else {

            //$this->template->load('login_master', 'content');
        //}
    }

    public function signup($uid)
    {
        //if ($this->ion_auth->logged_in() == 1) {

        $this->template->load('frontendsignup', 'frontend',$data);
        //} else {

        //$this->template->load('login_master', 'content');
        //}
    }

    public function signupar($uid)
    {
        //if ($this->ion_auth->logged_in() == 1) {

        $this->template->load('frontendsignupar', 'frontend_ar',$data);
        //} else {

        //$this->template->load('login_master', 'content');
        //}
    }



    public function ar()
    {
        //if ($this->ion_auth->logged_in() == 1) {

        $this->template->load('frontendsignupar', 'frontend_ar',$data);
        //} else {

        //$this->template->load('login_master', 'content');
        //}
    }


    public function success($qid)
    {
        //if ($this->ion_auth->logged_in() == 1) {

        $this->template->load('success_design', 'success',$data);
        //} else {

        //$this->template->load('login_master', 'content');
        //}
    }
    public function successar($qid)
    {
        //if ($this->ion_auth->logged_in() == 1) {

        $this->template->load('success_designar', 'successar',$data);
        //} else {

        //$this->template->load('login_master', 'content');
        //}
    }



    public function customersignupprocess(){
        $app  =  new App();
        $customername=$this->input->post('customername');
        $emailid=$this->input->post('emailid');
        $age=$this->input->post('age');
        $questionnaireid=$this->input->post('questionnaire');
        $gender=$this->input->post('gender');
        $city=$this->input->post('city');
        $data=array("name"=>$customername,"age"=>$age,"gender"=>$gender,"city"=>$city,"emailid"=>$emailid);
        $inscustid = $app->insertcustomer($data);
        $hidquestid=$this->input->post('hidquestid');
        //redirect("frontend/custlistmainquestions/$inscustid");
        redirect("frontend/custlistmainquestions/$inscustid/$hidquestid");
    }


    public function customersignupprocessar(){

        $app  =  new App();
        $customername=$this->input->post('customername');
        $emailid=$this->input->post('emailid');
        $age=$this->input->post('age');
        //die;
        $questionnaireid=$this->input->post('questionnaire');
        $gender=$this->input->post('gender');
        $city=$this->input->post('city');
        $data=array("name"=>$customername,"age"=>$age,"gender"=>$gender,"city"=>$city,"emailid"=>$emailid,"arabic"=>1);
        $inscustid = $app->insertcustomer($data);
        //redirect("frontend/custlistmainquestionsar/$inscustid");
        $hidquestid=$this->input->post('hidquestid');
        redirect("frontend/custlistmainquestionsar/$inscustid/$hidquestid");


    }




    public function custlistmainquestions($inscustid,$qid){
        //$qid=13;

        /*$this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('questionnaire');
        $randrec=$query->row();*/
        //$qid=$randrec->questionnaireid;

        $app  =  new App();
        $data['quest'] = $app->getcustomerquest($qid);
        $data['custid']=$inscustid;
        $data['qid']=$qid;
        $this->template->load('frontendsignup', 'customerquestions',$data);
    }

    public function custlistmainquestionsar($inscustid,$qid){
        //$qid=13;

        /*$this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('questionnaire');
        $randrec=$query->row();*/
        //$qid=$randrec->questionnaireid;

        $app  =  new App();
        $data['quest'] = $app->getcustomerquest($qid);
        $data['custid']=$inscustid;
        $this->template->load('frontendsignupar', 'customerquestionsar',$data);
    }




    public function custlistmainquestionsar_old($inscustid){
        $qid=13;

        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('questionnaire');
        $randrec=$query->row();
        //$qid=$randrec->questionnaireid;

        $app  =  new App();
        $data['quest'] = $app->getcustomerquest($qid);
        $data['custid']=$inscustid;
        $this->template->load('frontendsignup', 'customerquestionsar',$data);
    }




    public function customerquestionsprocess(){
        $totcount=$this->input->post('totcount');
        for($i=0;$i<$totcount;$i++){
           $questtitle=$this->input->post("questiontitle$i");
             $totcountcheck=$this->input->post("checkboxcount$i");
            $checkoptarr=array();
            $checkoptarrall=array();
            $radiooptarr=array();
for($j=0;$j<$totcountcheck;$j++){

    /*echo $checkopt=$this->input->post("opt$i$j");
    if ($checkopt!=''){
        $checkoptarr[]=$checkopt;
    }*/
}


            $checkopt=$this->input->post("opt$i");
            if ($checkopt!=''){
                $checkoptarr[]=$checkopt;
            }


            for($k=0;$k<$totcountcheck;$k++){
                //echo $radioopt=$this->input->post("radioopt$k$j");
                $checkopthid=$this->input->post("hidcheck$i$k");
                if ($checkopthid!=''){
                    $checkoptarrall[]=$checkopthid;
                }
            }






             $totcountradio=$this->input->post("radioboxcount$i");

            $radioopt=$this->input->post("radioopt$i");
            for($k=0;$k<$totcountradio;$k++){
                //echo $radioopt=$this->input->post("radioopt$k$j");
                 $radioopthid=$this->input->post("hidradio$i$k");
                if ($radioopthid!=''){
                    $radiooptarr[]=$radioopthid;
                }
            }
            $arrall = array();
            $arr = array();
            $arr1 = array();
            $answer=$this->input->post("answer$i");
            $category=$this->input->post("category$i");
            $inputopt=$this->input->post("inputopt$i");
            $questid=$this->input->post("questid$i");
            $questionnaireid=$this->input->post("questionnaireid$i");

            $this->db->where('questionnaireid',$questionnaireid);
            $qtdt =  $this->db->get('questionnaire')->row();
            $storeid=$qtdt->storeid;

            $this->db->where('storeid',$storeid);
            $storedt =  $this->db->get('store')->row();
            $redcount=$storedt->redeemed_count;
            $redcount=$redcount+1;
                $this->db->where('storeid',$storeid);
                $data=array("redeemed_count"=>$redcount);
                $this->db->update('store ',$data);





            if($category=='textbox'){
                //$jsonData="{}";
                $jsonData=$inputopt;
                $jsonDataall='';
            }else if($category=='checkbox') {

                foreach ($checkoptarr as $ansopt) {
                    $arr[] = $ansopt;
                }
                $jsonData = json_encode($arr);
                foreach ($checkoptarrall as $ansopt) {
                    $arrall[] = $ansopt;
                }
                $jsonDataall = json_encode($arrall);




            }
            else if($category=='radiobutton') {

                foreach ($radiooptarr as $ansopt) {
                    $arr1[] = $ansopt;
                }
                $jsonData = $radioopt;
                $jsonDataall1 = json_encode($arr1);
                $jsonDataall=$jsonDataall1;
            }

            $customerid=$this->input->post("customerid$i");

$data=array('storeid'=>$storeid,'custinput'=>$inputopt,'questiontitle'=>$questtitle,'answer'=>$answer,'category'=>$category,'custansweroptions'=>$jsonData,'answeroptions'=>$jsonDataall,'questionnaireid'=>$questionnaireid,'customerid'=>$customerid,'questid'=>$questid);
            $app  =  new App();
            $insertquest=$app->insertcustomerquestions($data);


        }
        //die;
        $this->session->set_flashdata('messages', 'You have successfully completed the survey');
        //redirect("frontend/success");
        redirect("frontend/success/$questionnaireid");

        //die;

    }



  function customerquestionsprocessar(){
      $totcount=$this->input->post('totcount');
      for($i=0;$i<$totcount;$i++){
          $questtitle=$this->input->post("questiontitle$i");
           $totcountcheck=$this->input->post("checkboxcount$i");
          $checkoptarr=array();
          $checkoptarrall=array();
          $radiooptarr=array();
          for($j=0;$j<$totcountcheck;$j++){

               $checkopt=$this->input->post("opt$i$j");
              if ($checkopt!=''){
                  $checkoptarr[]=$checkopt;
              }
          }

          for($k=0;$k<$totcountcheck;$k++){
              //echo $radioopt=$this->input->post("radioopt$k$j");
               $checkopthid=$this->input->post("hidcheck$i$k");
              if ($checkopthid!=''){
                  $checkoptarrall[]=$checkopthid;
              }
          }






          $totcountradio=$this->input->post("radioboxcount$i");
          //echo "<br>";
          $radioopt=$this->input->post("radioopt$i");
          for($k=0;$k<$totcountradio;$k++){
              //echo $radioopt=$this->input->post("radioopt$k$j");
               $radioopthid=$this->input->post("hidradio$i$k");
              if ($radioopthid!=''){
                  $radiooptarr[]=$radioopthid;
              }
          }
          $arrall = array();
          $arr = array();
          $arr1 = array();
          $answer=$this->input->post("answer$i");
          $category=$this->input->post("category$i");
          $inputopt=$this->input->post("inputopt$i");
          $questid=$this->input->post("questid$i");
          $questionnaireid=$this->input->post("questionnaireid$i");
          if($category=='textbox'){
              //$jsonData="{}";
              $jsonData=$inputopt;
              $jsonDataall='';
          }else if($category=='checkbox') {

              foreach ($checkoptarr as $ansopt) {
                  $arr[] = $ansopt;
              }
              $jsonData = json_encode($arr);
              foreach ($checkoptarrall as $ansopt) {
                  $arrall[] = $ansopt;
              }
              $jsonDataall = json_encode($arrall);




          }
          else if($category=='radiobutton') {

              foreach ($radiooptarr as $ansopt) {
                  $arr1[] = $ansopt;
              }
              $jsonData = $radioopt;
              $jsonDataall1 = json_encode($arr1);
              $jsonDataall=$jsonDataall1;
          }

          $customerid=$this->input->post("customerid$i");

          $data=array('arabic'=>1,'custinput'=>$inputopt,'questiontitle'=>$questtitle,'answer'=>$answer,'category'=>$category,'custansweroptions'=>$jsonData,'answeroptions'=>$jsonDataall,'questionnaireid'=>$questionnaireid,'customerid'=>$customerid,'questid'=>$questid);
          $app  =  new App();
          $insertquest=$app->insertcustomerquestions($data);


      }
      //die;
      $this->session->set_flashdata('messages', 'You have successfully completed the survey');
      redirect("frontend/successar/$questionnaireid");














  }







}
