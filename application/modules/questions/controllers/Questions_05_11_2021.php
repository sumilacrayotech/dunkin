<?php
class Questions extends MY_Controller
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
        $this->load->library("pagination");
        error_reporting(0);
    }

    function topTenStores()
    {
        $this->db->where('redeemed_count !=', null);
        $this->db->order_by("redeemed_count", "desc");
        $this->db->limit(10);
        $collection =  $this->db->get('store')->result();
        return $collection;
    }

    function totalVoucher()
    {
        return $this->db->get('voucher')->num_rows();
    }

    function totalStore()
    {
        return $this->db->get('store')->num_rows();
    }

    function totalTransaction()
    {
        $this->db->where('status','Used');
        return $this->db->get('voucher')->num_rows();
    }

    function questionmain(){
        //$this->db->where('redeemed_count !=', null);
        //$this->db->order_by("redeemed_count", "desc");
        //$this->db->limit(10);
        $collection =  $this->db->get('questionnaire')->result();
        return $collection;
    }
    function questionmaintitle(){
        //$this->db->where('redeemed_count !=', null);
        //$this->db->order_by("redeemed_count", "desc");
        //$this->db->limit(10);
        $collection =  $this->db->get('questionnaire')->result();
        return $collection;
    }
    function store(){
        $collection =  $this->db->get('store')->result();
        return $collection;
    }
    public function index()
    {
        if ($this->ion_auth->logged_in() == 1) {
            $data['questmain'] = $this->questionmain();
            //$data['totalVoucher'] = $this->totalVoucher();
            //$data['totalTrans'] = $this->totalTransaction();
            //$data['totalStore'] = $this->totalStore();
            //$this->template->load('dashboard_master', 'dashboard',$data);
           // $this->template->load('dashboard_master', 'addUser',$data);
            $this->template->load('admin/advanced_form','addQuestions',$data);
        } else {

            $this->template->load('login_master', 'content');
        }
    }

    function listmainquestions(){

        if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }

        $crud = new grocery_CRUD();
        $crud->set_table('questionnaire');
        $crud->set_subject('Questionnaire');
        $crud->columns('questionnaireid', 'title','titlearabic','number', 'status','storeid');
        $crud->order_by('questionnaireid','desc');
        //$crud->add_fields('name','number','status');
        //$crud->set_relation('officeCode','offices','city');
        //$crud->set_relation('storeid','store','name');
        $crud->set_relation('storeid','store','name');
        //$crud->add_fields('questionnaireid', 'title', 'number', 'status','name');
        $crud->EDIT_fields( 'title','status','name');
        $crud->display_as('storeid','Store Name');
        $crud->unset_Edit();
        $crud->unset_add();
        $crud->unset_Read();
        $crud->unset_delete();
        //$crud->add_action('Edit Mainquest', base_url('skin/admin/images/password.png'), 'question/editmainquestions', '');
        $crud->add_action('Delete quest',base_url('skin/admin/images/icons/delete.png'),base_url('questions/deletequestionnaire/'), '');
        $crud->add_action('Edit Mainquest',base_url('skin/admin/images/icons/edit.png'),'questions/editmainquestions', '');
        $crud->add_action('Add quest',base_url('skin/admin/images/icons/add.png'),base_url('questions/addquestionsselected/'), '');
        $crud->add_action('List quest',base_url('skin/admin/images/icons/view.png'),base_url('questions/questionslist/'), '');
        $crud->add_action('Delete quest',base_url('skin/admin/images/icons/delete.png'),base_url('questions/deletequestionnaire/'), '');
        //$crud->columns('id, 'group_id, 'user_id','ref_id');
        //$crud->set_relation('ref_id', 'dist_info', 'ref_idkey');
        //$crud->edit_fields('name','number','status');
        //$crud->required_fields('name','number','status');
        //$crud->display_as('id','ID');
        $crud->unset_print();
        $output = $crud->render();
        $this->template->load('admin_blank', 'index', $output);
    }


    public function deletequestionnaire(){
        $questmainid=$this->uri->segment(3);
        $app  =  new App();
        $app->deletemainquestions($questmainid);
        redirect("questions/listmainquestions");
        $this->session->set_flashdata('messages', 'Questionnaire details deleted Successfully');
    }

    public function addmainquestions()
    {
        if ($this->ion_auth->logged_in() == 1) {
            $data['stores'] = $this->store();
            //$data['totalVoucher'] = $this->totalVoucher();
            //$data['totalTrans'] = $this->totalTransaction();
            //$data['totalStore'] = $this->totalStore();
            //$this->template->load('dashboard_master', 'dashboard',$data);
            // $this->template->load('dashboard_master', 'addUser',$data);
            $this->template->load('admin/advanced_form','questionnare',$data);
        } else {

            $this->template->load('login_master', 'content');
        }
    }


    public function editmainquestions($id){
        if ($this->ion_auth->logged_in() == 1) {
            $data['stores'] = $this->store();
            $data['questdetails']=$this->questionnaredetails($id);
            $this->template->load('admin/advanced_form','editquestionnare',$data);
        } else {

            $this->template->load('login_master', 'content');
        }
    }

    public function questionnaredetails($id){
        $this->db->where('questionnaireid=',$id);
        $collection =  $this->db->get('questionnaire')->row();
        return $collection;
    }


    public function mainquestionprocess(){
        $app  =  new App();
        $main = new Main();
        //$data['app'] = $app;
        //$data['main'] = $main;
        $storeid=$this->input->post('storeid');
        $title=$this->input->post('title');
        $titlearabic=$this->input->post('titlearabic');
        $status=$this->input->post('status');
        //$questionnaireid=$this->input->post('questionnaire');
        $data = array(
            'storeid' => $storeid,
            'title' => $title,
            'status' => $status,'titlearabic'=>$titlearabic
        );
        $data['order'] = $app->insertmainquestions($data);
        $lastId = $this->db->insert_id();
        $this->updateNumber($lastId);
        $this->session->set_flashdata('messages', 'Questionnaire details added Successfully');
        //redirect("questions/addmainquestions");
        redirect("questions/listmainquestions");
    }

    public function editmainquestionprocess(){
        $app  =  new App();
        $main = new Main();
        //$data['app'] = $app;
        //$data['main'] = $main;
        $storeid=$this->input->post('storeid');
        $title=$this->input->post('title');
        $status=$this->input->post('status');
        $id=$this->input->post('questid');
        //$questionnaireid=$this->input->post('questionnaire');
        $data = array(
            'storeid' => $storeid,
            'title' => $title,
            'status' => $status
        );
        $data['order'] = $app->updatemainquestions($data,$id);
        //$lastId = $this->db->insert_id();
        //$this->updateNumber($lastId);
        $this->session->set_flashdata('messages', 'Questionnaire details edited Successfully');
        //redirect("questions/addmainquestions");
        redirect("questions/listmainquestions");
    }










    function updateNumber($id)
    {
        $number = sprintf('%06d', $id);
        $user_logs_insert = array(
            "number" => $number
        );
        $this->db->where('questionnaireid', $id);
        //$this->db->update('voucher', $user_logs_insert);
        $this->db->update('questionnaire', $user_logs_insert);
    }




    public function addquestions()
    {
        if ($this->ion_auth->logged_in() == 1) {
            $data['questmain'] = $this->questionmaintitle();
            //$data['totalVoucher'] = $this->totalVoucher();
            //$data['totalTrans'] = $this->totalTransaction();
            //$data['totalStore'] = $this->totalStore();
            //$this->template->load('dashboard_master', 'dashboard',$data);
            // $this->template->load('dashboard_master', 'addUser',$data);
            $this->template->load('admin/advanced_form','addQuestions',$data);
        } else {

            $this->template->load('login_master', 'content');
        }
    }

    public function editquestions($qid)
    {
        if ($this->ion_auth->logged_in() == 1) {
            $data['questmain'] = $this->questionmaintitle();
            $data['questdt'] = $this->questioneditdt($qid);
            //$data['totalVoucher'] = $this->totalVoucher();
            //$data['totalTrans'] = $this->totalTransaction();
            //$data['totalStore'] = $this->totalStore();
            //$this->template->load('dashboard_master', 'dashboard',$data);
            // $this->template->load('dashboard_master', 'addUser',$data);
            $this->template->load('admin/advanced_form','editQuestions',$data);
        } else {

            $this->template->load('login_master', 'content');
        }
    }

public function questioneditdt($qid){
    $this->db->where('questionid',$qid);
    $collection =  $this->db->get('questions')->row();
    return $collection;


}

public function editquestionsprocess(){
    $app  =  new App();
    $main = new Main();
    //$data['app'] = $app;
    //$data['main'] = $main;
    $questions=$this->input->post('questions');
    $questionsarabic=$this->input->post('questionsarabic');
    $answer=$this->input->post('answer');
    $answerarabic=$this->input->post('answerarabic');

    $answeroptions=$this->input->post('answeropt');
    $answeroptionsar=$this->input->post('answeroptar');
    $questionnaireid=$this->input->post('questionnaire');
    $qid=$this->input->post('questionid');
    $pageid=$this->input->post('pageid');
    //$arrar=
    //print_r($answeroptions);
    $category=$this->input->post('questions_category');
    if($category=='textbox'){
        $jsonData="{}";
    }else {
        $arr = array();
        $arrar = array();
        foreach ($answeroptions as $ansopt) {
            $arr[] = $ansopt;
        }
        $jsonData = json_encode($arr);

        foreach ($answeroptionsar as $ansopt) {
            $arrar[] = $ansopt;
        }
        $jsonDataar= json_encode($arrar);


    }
    //echo $jsonData."\n";
    //die;
    $questiontype=$this->input->post('type');
    $status=$this->input->post('status');
    $data = array('questiontype'=>$questiontype,'status'=>$status,
        'questiontitle' => $questions,
        'answer' => $answer,'questiontitlearabic' => $questionsarabic,
        'answerarabic' => $answerarabic,
        'category' => $category,'answeroptions'=>$jsonData,'questionnaireid'=>$questionnaireid,'answeroptionsarabic'=>$jsonDataar
    );
    $data['qty'] = $app->updatequestions($data,$qid);
    $this->session->set_flashdata('messages', 'Question edited Successfully');
    //echo $pageid;
    //echo $qid;
    //die;
    if ($pageid==''){
        redirect("questions/questionslist/$questionnaireid");
    }else {
        redirect("questions/questionslist/$questionnaireid/$pageid");
    }




}

    public function addquestionsselected($id)
    {
        if ($this->ion_auth->logged_in() == 1) {
            $data['questmain'] = $this->questionmain();
            $data['id']=$id;
            //$data['totalVoucher'] = $this->totalVoucher();
            //$data['totalTrans'] = $this->totalTransaction();
            //$data['totalStore'] = $this->totalStore();
            //$this->template->load('dashboard_master', 'dashboard',$data);
            // $this->template->load('dashboard_master', 'addUser',$data);
            $this->template->load('admin/advanced_form','addQuestions',$data);
        } else {

            $this->template->load('login_master', 'content');
        }
    }







    function addquestionsprocess(){
        //echo "hello";
        $app  =  new App();
        $main = new Main();
        //$data['app'] = $app;
        //$data['main'] = $main;
        $questions=$this->input->post('questions');
        $questionsarabic=$this->input->post('questionsarabic');
        $answer=$this->input->post('answer');
        $answerarabic=$this->input->post('answerarabic');
        $answeroptions=$this->input->post('answeropt');
        $answeroptionsarabic=$this->input->post('answeroptarabic');
        $questionnaireid=$this->input->post('questionnaire');
        //print_r($answeroptions);
        $category=$this->input->post('questions_category');
        if($category=='textbox'){
            $jsonData="{}";
        }else {
            $arr = array();
            foreach ($answeroptions as $ansopt) {
                $arr[] = $ansopt;
            }
            $jsonData = json_encode($arr);
            $arrarabic = array();
            foreach ($answeroptionsarabic as $ansopt) {
                $arrarabic[] = $ansopt;
            }
            $jsonDataarabic = json_encode($arrarabic);



        }
        //echo $jsonData."\n";
        //die;
$questiontype=$this->input->post('type');
    $status=$this->input->post('status');
    $ratinglabel=$this->input->post('ratinglabel');
        $ratinglabelarabic=$this->input->post('ratinglabelarabic');
    if ($category=='rating'){
        $answer=$ratinglabel;
        $answerarabic=$ratinglabelarabic;
    }
        $data = array('questiontype'=>$questiontype,'status'=>$status,'answeroptionsarabic'=>$jsonDataarabic,
            'questiontitle' => $questions,'questiontitlearabic' => $questionsarabic,'answerarabic'=>$answerarabic,
            'answer' => $answer,
            'category' => $category,'answeroptions'=>$jsonData,'questionnaireid'=>$questionnaireid
        );
        $data['order'] = $app->insertquestions($data);
        $this->session->set_flashdata('messages', 'Question added Successfully');
        //redirect("questions/");
        redirect("questions/addquestionsselected/$questionnaireid");
    }

public function questionslist(){

    if ($this->ion_auth->logged_in() == 1) {
        $questionid=$this->uri->segment(3);
        //die;

        $config = array();
        //$config["base_url"] = base_url() . "index.php/StudentPagination_Controller/index";
        $config["base_url"] = base_url() . "questions/questionslist/$questionid";
        $config["total_rows"] = $this->get_count($questionid);
        //die;
        $config["per_page"] = 2;
        $config["uri_segment"] = 4;
        //$config["uri_segment"] =3;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);


        //echo $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
//die;
        $data["links"] = $this->pagination->create_links();
        //$data['questmain'] = $this->questionsselected($questionid);
        $data['questmain'] = $this->questionsselectedpage($questionid,$config["per_page"], $page);
//die;
        $data['page']=$page;
        $this->template->load('admin/advanced_form','questionslist',$data);
    } else {

        $this->template->load('login_master', 'content');
    }
}

function delquestions($questionid){

    $pageid=$this->uri->segment(4);
    $questionnaireid=$this->uri->segment(5);
    $qid=$this->uri->segment(3);
    $this->db->where('questionid',$qid);
    $del=$this->db->delete('questions');
    //$qid=$this->input->post('questionid');
    //$pageid=$this->input->post('pageid');
    if ($pageid==''){
        redirect("questions/questionslist/$questionnaireid");
    }else {
        redirect("questions/questionslist/$questionnaireid/$pageid");
    }



}


    function questionsselected($questionid){
        //$this->db->where('redeemed_count !=',$questionid);
        //$this->db->order_by("redeemed_count", "desc");
        //$this->db->limit(10);
        $collection =  $this->db->get('questions')->result();
        return $collection;
    }
    function questionsselectedpage($questionid,$limit,$start){
        //$this->db->where('redeemed_count !=',$questionid);
        //$this->db->order_by("redeemed_count", "desc");
        //$this->db->limit(10);
//echo $questionid;
//die;
        $this->db->limit($limit, $start);
        $this->db->where('questionnaireid',$questionid);
        $collection =  $this->db->get('questions')->result();
        return $collection;
    }
    public function get_count($qid)
    {
        $this->db->where('questionnaireid',$qid);
        $query = $this->db->get('questions');
        return $query->num_rows();
        //return $this->db->count_all("questions");
    }



    function admin_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $res=$this->ion_auth->login($username,$password);
        if($res)
        {
            $this->session->all_userdata();
            $this->ion_auth->user()->row();

            echo 'r';
        } else {

            echo '<div class="alert alert-danger" role="alert">Invalid Username or Password</div>';
        }
    }
}
