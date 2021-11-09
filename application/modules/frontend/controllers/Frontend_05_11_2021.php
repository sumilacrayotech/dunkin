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


    public function success($qid,$qrcode)
    {
        //if ($this->ion_auth->logged_in() == 1) {

        $this->template->load('success_design', 'success',$data);
        //} else {

        //$this->template->load('login_master', 'content');
        //}
    }
    public function successar($qid,$qrcode)
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
         $hidqrcode=$this->input->post("hidqrcode");
        //redirect("frontend/custlistmainquestions/$inscustid");
        //redirect("frontend/custlistmainquestions/$inscustid/$hidquestid");
        redirect("frontend/custlistmainquestions/$inscustid/$hidquestid/$hidqrcode");
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
         $hidqrcode=$this->input->post("hidqrcode");
        //redirect("frontend/custlistmainquestionsar/$inscustid/$hidquestid");
         redirect("frontend/custlistmainquestionsar/$inscustid/$hidquestid/$hidqrcode");


    }




    public function custlistmainquestions($inscustid,$qid,$qrcode){
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
         $data['qrcode']=$qrcode;
         $hidqrcode=$this->input->post("hidqrcode");
        $this->template->load('frontendsignup', 'customerquestions',$data);
    }

    public function custlistmainquestionsar($inscustid,$qid,$qrcode){
        //$qid=13;

        /*$this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('questionnaire');
        $randrec=$query->row();*/
        //$qid=$randrec->questionnaireid;

        $app  =  new App();
        $data['quest'] = $app->getcustomerquest($qid);
        $data['custid']=$inscustid;
        $data['qrcode']=$qrcode;
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
         $hidqrcode=$this->input->post("hidqrcode");
         
       
        for($i=0;$i<$totcount;$i++){
            $customerid=$this->input->post("customerid$i");
            $hidrating=$this->input->post("hidrating$i");
           $questtitle=$this->input->post("questiontitle$i");
             $totcountcheck=$this->input->post("checkboxcount$i");
            $checkoptarr=array();
            $checkoptarrall=array();
            $radiooptarr=array();
            $rateoptarrall=array();
            $rateoptarrallopt=array();
for($j=0;$j<$totcountcheck;$j++){

     $checkopt=$this->input->post("opt$i$j");
    if ($checkopt!=''){
        $checkoptarr[]=$checkopt;
    }
}

           /* for($j=0;$j<$totcountcheck;$j++){
            $checkopt=$this->input->post("opt$i");
            if ($checkopt!=''){
                $checkoptarr[]=$checkopt;
            }
            }*/

            for($k=0;$k<$totcountcheck;$k++){
                //echo $radioopt=$this->input->post("radioopt$k$j");
                $checkopthid=$this->input->post("hidcheck$i$k");
                if ($checkopthid!=''){
                    $checkoptarrall[]=$checkopthid;
                }
            }
            $totcountrate=$this->input->post("ratecount$i");
            for($k=0;$k<$totcountrate;$k++){
                //echo $radioopt=$this->input->post("radioopt$k$j");
                $rateopthid=$this->input->post("hidrating$i$k");
                if ($rateopthid!=''){
                    $rateoptarrall[]=$rateopthid;
                }
            }

            for($k=0;$k<$totcountrate;$k++){
                //echo $radioopt=$this->input->post("radioopt$k$j");
                $rateopthid=$this->input->post("hidratingrate$i$k");
                if ($rateopthid!=''){
                    $rateoptarrallopt[]=$rateopthid;
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
            $arrallr = array();
            $arrallropt=array();
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
                $jsonDataall2='';
            }else if($category=='checkbox') {

                foreach ($checkoptarr as $ansopt) {
                    $arr[] = $ansopt;
                }
                $jsonData = json_encode($arr);
                foreach ($checkoptarrall as $ansopt) {
                    $arrall[] = $ansopt;
                }
                $jsonDataall = json_encode($arrall);

                $jsonDataall2='';


            }
            else if($category=='radiobutton') {

                foreach ($radiooptarr as $ansopt) {
                    $arr1[] = $ansopt;
                }
                $jsonData = $radioopt;
                $jsonDataall1 = json_encode($arr1);
                $jsonDataall=$jsonDataall1;
                $jsonDataall2='';
            }
            else if($category=='rating') {

                /*foreach ($checkoptarr as $ansopt) {
                    $arr[] = $ansopt;
                }
                $jsonData = json_encode($arr);*/
                //$arrallr=array();
                foreach ($rateoptarrall as $ansopt) {
                    $arrallr[] = $ansopt;
                }
                $jsonDataall2 = json_encode($arrallr);
                $jsonData='';
foreach($rateoptarrallopt as $ansopt){
    $arrallropt[] = $ansopt;
}
                $jsonDataallopt = json_encode($arrallropt);
                $jsonData='';
                $jsonDataall = json_encode($arrallropt);
            }

            
            $hidqrcode=$this->input->post("hidqrcode");
             
            
            

$data=array('noofstars'=>$jsonDataall2,'storeid'=>$storeid,'custinput'=>$inputopt,'questiontitle'=>$questtitle,'answer'=>$answer,'category'=>$category,'custansweroptions'=>$jsonData,'answeroptions'=>$jsonDataall,'questionnaireid'=>$questionnaireid,'customerid'=>$customerid,'questid'=>$questid);
            $app  =  new App();
            $insertquest=$app->insertcustomerquestions($data);

$this->db->where('id',$hidqrcode);
                $data=array("status"=>'Used',"customerid"=>$customerid);
                $this->db->update('customerqrcode ',$data);

        }
        //die;
         $this->db->where('questionnaireid',$questionnaireid);
            $qtdt1 =  $this->db->get('questionnaire')->row();
            $countc=$qtdt1->countans;
            //die($countc);
            $countc=$countc+1;
            //die("kkk".$countc);
            //die($questionnaireid);
                $this->db->where('questionnaireid',$questionnaireid);
                $datac=array("countans"=>$countc);
                $this->db->update('questionnaire',$datac);
            
        $datacust['arabic']=0;
        $this->db->where('customerid',$customerid);
        $this->db->update('customer ',$datacust);

        $this->session->set_flashdata('messages', 'You have successfully completed the survey');
        //redirect("frontend/success");
       
        //redirect("frontend/success/$questionnaireid");
redirect("frontend/success/$questionnaireid/$hidqrcode");

        //die;

    }



  function customerquestionsprocessar(){
      $totcount=$this->input->post('totcount');
       $hidqrcode=$this->input->post("hidqrcode");
       
       
       
       
      for($i=0;$i<$totcount;$i++){
          $questtitle=$this->input->post("questiontitle$i");
           $totcountcheck=$this->input->post("checkboxcount$i");
          $hidrating=$this->input->post("hidrating$i");
          $checkoptarr=array();
          $checkoptarrall=array();
          $radiooptarr=array();
          $radiooptarr=array();
          $rateoptarrall=array();
          $rateoptarrallopt=array();
          $questionnaireid=$this->input->post("questionnaireid$i");
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
          $totcountrate=$this->input->post("ratecount$i");
          for($k=0;$k<$totcountrate;$k++){
              //echo $radioopt=$this->input->post("radioopt$k$j");
              $rateopthid=$this->input->post("hidrating$i$k");
              if ($rateopthid!=''){
                  $rateoptarrall[]=$rateopthid;
              }
          }

          for($k=0;$k<$totcountrate;$k++){
              //echo $radioopt=$this->input->post("radioopt$k$j");
              $rateopthid=$this->input->post("hidratingrate$i$k");
              if ($rateopthid!=''){
                  $rateoptarrallopt[]=$rateopthid;
              }
          }

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
          $arrallr = array();
          $arrallropt=array();
          $answer=$this->input->post("answer$i");
          $category=$this->input->post("category$i");
          $inputopt=$this->input->post("inputopt$i");
          $questid=$this->input->post("questid$i");
          $questionnaireid=$this->input->post("questionnaireid$i");

          if($category=='textbox'){
              //$jsonData="{}";
              $jsonData=$inputopt;
              $jsonDataall='';
              $jsonDataall2='';
          }else if($category=='checkbox') {

              foreach ($checkoptarr as $ansopt) {
                  $arr[] = $ansopt;
              }
              $jsonData = json_encode($arr);
              foreach ($checkoptarrall as $ansopt) {
                  $arrall[] = $ansopt;
              }
              $jsonDataall = json_encode($arrall);
              $jsonDataall2='';



          }
          else if($category=='radiobutton') {

              foreach ($radiooptarr as $ansopt) {
                  $arr1[] = $ansopt;
              }
              $jsonData = $radioopt;
              $jsonDataall1 = json_encode($arr1);
              $jsonDataall=$jsonDataall1;
              $jsonDataall2='';
          }
          else if($category=='rating') {

              /*foreach ($checkoptarr as $ansopt) {
                  $arr[] = $ansopt;
              }
              $jsonData = json_encode($arr);*/
              //$arrallr=array();
              foreach ($rateoptarrall as $ansopt) {
                  $arrallr[] = $ansopt;
              }
              $jsonDataall2 = json_encode($arrallr);
              $jsonData='';
              foreach($rateoptarrallopt as $ansopt){
                  $arrallropt[] = $ansopt;
              }
              $jsonDataallopt = json_encode($arrallropt);
              $jsonData='';
              $jsonDataall = json_encode($arrallropt);
          }

          $customerid=$this->input->post("customerid$i");




          $data=array('noofstars'=>$jsonDataall2,'arabic'=>1,'custinput'=>$inputopt,'questiontitle'=>$questtitle,'answer'=>$answer,'category'=>$category,'custansweroptions'=>$jsonData,'answeroptions'=>$jsonDataall,'questionnaireid'=>$questionnaireid,'customerid'=>$customerid,'questid'=>$questid);
          $app  =  new App();
          $insertquest=$app->insertcustomerquestions($data);
          $this->db->where('id',$hidqrcode);
                $data=array("status"=>'Used',"customerid"=>$customerid);
                $this->db->update('customerqrcode ',$data);


      }
      //die;
      $this->db->where('questionnaireid',$questionnaireid);
            $qtdt1 =  $this->db->get('questionnaire')->row();
            $countc=$qtdt1->countans;
            //die($countc);
            $countc=$countc+1;
            //die("kkk".$countc);
            //die($questionnaireid);
                $this->db->where('questionnaireid',$questionnaireid);
                $datac=array("countans"=>$countc);
                $this->db->update('questionnaire',$datac);
      
      
      
      $datacust['arabic']=1;
      $this->db->where('customerid',$customerid);
      $this->db->update('customer ',$datacust);



      $this->session->set_flashdata('messages', 'You have successfully completed the survey');
      //redirect("frontend/successar/$questionnaireid");

redirect("frontend/successar/$questionnaireid/$hidqrcode");












  }







}
