<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends CI_Model
{
    public function __construct(){
        $this->load->library(['ion_auth', 'form_validation']);
        parent::__construct();
    }

    function check_mail($email)
    {
        $this->db->where('email',$email);
        return $this->db->get('users')->num_rows();
    }

    function checkUserCode($userCode)
    {
        $this->db->where('username',$userCode);
        return $this->db->get('users')->row();
    }

    function getVoucher($voucherCode)
    {
        $this->db->where('number',$voucherCode);
        return $this->db->get('voucher')->row();
    }

    function designerRegisterForm($section='')
    {
        $data['form'] = $section;
        return $this->load->view('register/designer',$data);
    }

    function buyerRegisterForm($section='')
    {
        $data['form'] = $section;
        return $this->load->view('register/buyer',$data);
    }
    
    function sideBar($section){
        $data['section'] = $section;
        return $this->load->view('sidebar',$data);
    }

    function getUserData($id){
        $this->db->where('id',$id);
        return $this->db->get('users')->row();
    }
    
    function BuyerLandingConfig(){

        $data = $this->db->select('*')->get_where('landing_page_config', array('id' => 1))->row();
        return $data;
    }
    
    function getNews($id){
        $this->db->where('id',$id);
        $res = $this->db->get('news')->row();
        return $res;
    }
    
    function getNewsCategory($id){
        $this->db->where('id',$id);
        $res = $this->db->get('news_category')->row();
        return $res;
    }
    
    function getLatestNews($id){
        $this->db->order_by("id", "asc");
        $this->db->limit(3);
        $this->db->where('category',$id);
        $res = $this->db->get('news')->result();
        return $res;
    }

    function getLatestPress($limit){
        $this->db->order_by("id", "asc");
        $this->db->limit($limit);
        $res = $this->db->get('press')->result();
        return $res;
    }
    
    function countries(){
        $countries = 
        array("AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CD" => "Congo, The Democratic Republic of The",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Cote D'ivoire",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and Mcdonald Islands",
            "VA" => "Holy See (Vatican City State)",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran, Islamic Republic of",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic of",
            "KR" => "Korea, Republic of",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao People's Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libyan Arab Jamahiriya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macao",
            "MK" => "Macedonia, The Former Yugoslav Republic of",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States of",
            "MD" => "Moldova, Republic of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territory, Occupied",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and The Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and The South Sandwich Islands",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan, Province of China",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic of",
            "TH" => "Thailand",
            "TL" => "Timor-leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VE" => "Venezuela",
            "VN" => "Viet Nam",
            "VG" => "Virgin Islands, British",
            "VI" => "Virgin Islands, U.S.",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe");
        return $countries;
    }
    
    function doupload($file_name,$upload_path,$width,$height,$field)
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 1;
        $pass = '';
        while ($i <= 4) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        $image_name = $pass.'_'.time().'_'.str_replace(' ', '_', $file_name);

        $path= FCPATH . $upload_path;
        $config['image_library'] = 'gd2';
        $config['upload_path'] = $path;
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $config["allowed_types"] = '*';
        $config["max_size"] = 1024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($field))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $config['image_library'] = 'gd2';
            $config['source_image']	= $path.$image_name;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']	= $width;
            $config['height']	= $height;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $image_name;
        }

    }

    function InsertPlan($plan,$userSession,$email,$token,$subscription)
    {
        $data = array(
            'user_id'           =>  $userSession->id,
            'plan_id'           =>  $plan->id,
            'object'            =>  $plan->object,
            'active'            =>  $plan->active,
            'aggregate_usage'   =>  $plan->aggregate_usage,
            'amount'            =>  $plan->amount,
            'amount_decimal'    =>  $plan->amount_decimal,
            'billing_scheme'    =>  $plan->billing_scheme,
            'currency'          =>  $plan->currency,
            'plan_interval'     =>  $plan->interval,
            'interval_count'    =>  $plan->interval_count,
            'livemode'          =>  $plan->livemode,
            'nickname'          =>  $plan->nickname,
            'product'           =>  $plan->product,
            'tiers'             =>  $plan->tiers,
            'tiers_mode'        =>  $plan->tiers_mode,
            'transform_usage'   =>  $plan->transform_usage,
            'trial_period_days' =>  $plan->trial_period_days,
            'usage_type'        =>  $plan->usage_type,
            'expiry_date'       =>  date('d-m-Y', strtotime('+'.$plan->interval_count.' months')),
            'plan_email'        =>  $email,
            'plan_source'       =>  $token,
            'subscription_customer_id'  => $subscription->id
        );
        $this->db->insert('stripe_plan', $data);
    }

    function getPlans()
    {
        $res = $this->db->get('subscription_plans')->result();
        return $res;
    }

    function getPlan($planId)
    {
        $this->db->where('id', $planId);
        return $this->db->get('subscription_plans')->row();
    }

    function insertSubscription($subacriptions,$planTitle,$planId)
    {
        $this->ion_auth = new Ion_auth();
        $userSession = $this->ion_auth->user()->row();
        $data = array(
            'subscription_id' => $subacriptions->id,
            'user_id'   =>  $userSession->id,
            'billing'   =>  $subacriptions->billing,
            'billing_cycle_anchor' => $subacriptions->billing_cycle_anchor,
            'cancel_at' => $subacriptions->cancel_at,
            'cancel_at_period_end' => $subacriptions->cancel_at_period_end,
            'canceled_at' => $subacriptions->canceled_at,
            'collection_method' => $subacriptions->collection_method,
            'current_period_start' => $subacriptions->current_period_start,
            'current_period_end' => $subacriptions->current_period_end,
            'customer' => $subacriptions->customer,
            'discount' => $subacriptions->discount,
            'ended_at' => $subacriptions->ended_at,
            'latest_invoice' => $subacriptions->latest_invoice,
            'next_pending_invoice_item_invoice' => $subacriptions->next_pending_invoice_item_invoice,
            'status' => $subacriptions->status,
            'plan_title' => $planTitle,
            'plan_id' => $planId
        );
        $this->db->insert('subacriptions', $data);
    }

    function updateSubscription($subacriptions,$subscriptionId)
    {
        $data = array(
            'billing'   =>  $subacriptions->billing,
            'billing_cycle_anchor' => $subacriptions->billing_cycle_anchor,
            'cancel_at' => $subacriptions->cancel_at,
            'cancel_at_period_end' => $subacriptions->cancel_at_period_end,
            'canceled_at' => $subacriptions->canceled_at,
            'collection_method' => $subacriptions->collection_method,
            'current_period_start' => $subacriptions->current_period_start,
            'current_period_end' => $subacriptions->current_period_end,
            'customer' => $subacriptions->customer,
            'discount' => $subacriptions->discount,
            'ended_at' => $subacriptions->ended_at,
            'latest_invoice' => $subacriptions->latest_invoice,
            'next_pending_invoice_item_invoice' => $subacriptions->next_pending_invoice_item_invoice,
            'status' => $subacriptions->status
        );
        $this->db->where('subscription_id', $subscriptionId);
        $this->db->update('subacriptions', $data);
    }

    function currentSubscription($userId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('status', 'active');
        return $this->db->get('subacriptions')->row();
    }

    function getUserLikesCount($userId)
    {
        $this->db->where_in('user_id',$userId);
        $productCount = $this->db->get('mylikes')->num_rows();
        return $productCount;
    }

    function getLikeCollection($start_from=null,$limit=null,$userId){
        $this->db->where('mylikes.user_id', $userId);
        $this->db->limit($limit, $start_from);
        $this->db->join('catalog_product', 'mylikes.product_id = catalog_product.product_id', 'LEFT');
        $collection =  $this->db->get('mylikes')->result();
        return $collection;
    }

    function getPaginationUrl($url,$value){
        $url_components = parse_url($url);
        if(empty($url_components['query'])){
            $rUrl = rtrim($url, '?');
            $filterUrl = $rUrl.'?page='.$value;
        }else{
            $filterUrl = $url.'&page='.$value;
        }
        return $filterUrl;
    }


    function getFilterUrl($code){
        $currentURL = current_url();
        $params   = @$_GET;
        unset($params[$code]);
        $fullURL = $currentURL . '?' . http_build_query($params);
        return $fullURL;
    }

    function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
    {
        $pageLink = $this->getFilterUrl('page');
        $pagination = '';
        if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
            $pagination .= '<ul class="amp_pro_paginationList">';

            $right_links    = $current_page + 3;
            $previous       = $current_page - 3; //previous link
            $next           = $current_page + 1; //next link
            $first_link     = true; //boolean var to decide our first link

            if($current_page > 1){
                $previous_link = ($previous==0)? 1: $previous;
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,1).'" data-page="1" title="First">&laquo;</a></li>'; //first link
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,abs($previous_link)).'" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$i).'" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }
                $first_link = false; //set first link to false
            }

            if($first_link){ //if current active page is first link
                $pagination .= '<li><a class="active" href="javascript:void(0)">'.$current_page.'</a></li>';
            }elseif($current_page == $total_pages){ //if it's the last active link
                $pagination .= '<li><a class="active" href="javascript:void(0)">'.$current_page.'</a></li>';
            }else{ //regular current link
                $pagination .= '<li><a class="active" href="javascript:void(0)">'.$current_page.'</a></li>';
            }

            for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
                if($i<=$total_pages){
                    $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$i).'" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
                }
            }
            if($current_page < $total_pages){
                $next_link = ($i > $total_pages) ? $total_pages : $i;
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$next_link).'" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li><a href="'.$this->getPaginationUrl($pageLink,$total_pages).'" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
            }

            $pagination .= '</ul>';
        }
        return $pagination; //return pagination links
    }

    function checkInvitationCode($invitationCode)
    {
        $this->db->select('*');
        $this->db->where('code',$invitationCode);
        $this->db->where('status','Inactive');
        $query = $this->db->get('buyer_invitation');
        $num = $query->num_rows();

        return $num;
    }

    function UpdateInvitationCode($invitationCode,$userId)
    {
        $data = array(
            'assign_user' => $userId,
            'status' => 'Active'
        );

        $this->db->where('code', $invitationCode);
        $this->db->update('buyer_invitation', $data);
    }

    function getStoreRedeemCount($Code)
    {
        $this->db->select('redeemed_count');
        $this->db->where('number',$Code);
        $query = $this->db->get('store')->row();
        return $query->redeemed_count;
    }

    function insertOption($userId,$name)
    {
        $data = array(
            'option_value' => $name,
            'user_id' => $userId,
            'attribute_id' => 2
        );
        $this->db->insert('attribute_options', $data);
    }

    function userCollection($userId)
    {
        $this->db->select('product_name,product_id,image');
        $this->db->where('status', 1);
        $this->db->where('user_id', $userId);
        $collection =  $this->db->get('catalog_product')->result();
        return $collection;
    }

    function deleteThreeSixty($productId)
    {
        $this->db->where('product_id',$productId);
        $this->db->delete('threesixty');
    }

    function deleteUserCollection($userId,$productId)
    {
        $this->db->where('product_id', $productId);
        $this->db->where('user_id', $userId);
        $this->db->delete('catalog_product');
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function insert_entry_chat($firstName, $lastName, $userEmail, $userPassword)
    {
        $cahtdb = $this->load->database('cahtdb', TRUE);

        $clientSecret = $this->generateRandomString();
        if($userPassword == null){
            $changedPassword = null;
        }
        else {
            $changedPassword = password_hash($userPassword,PASSWORD_BCRYPT); // default cost for BCRYPT to 12
        }
        $this->userSecret = $clientSecret;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userEmail = $userEmail;
        $this->userPassword = $changedPassword;
        $this->userType = 1;
        $this->userStatus =1;
        $this->userVerification = 1;
        $this->lastModified = date('Y-m-d G:i:s');
        $cahtdb->insert("users", $this);
    }

    function UpdateChatProfileImage($imageName,$emailId)
    {
        $cahtdb = $this->load->database('cahtdb', TRUE);
        $data = array(
            'userProfilePicture' => $imageName
        );

        $cahtdb->where('userEmail', $emailId);
        $cahtdb->update('users', $data);
    }

    function sendEmail($toEmail,$subject,$message)
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');

        $this->email->set_newline("\r\n");
        $this->email->from($from, 'AMF Showroom');
        $this->email->to($toEmail);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    function getEmailTemplate($templateIdentifier)
    {
        $this->db->where('identifier', $templateIdentifier);
        return $this->db->get('email_template')->row();
    }

    function emailTemplate($templateIdentifier,$data,$template)
    {
        $templateData = '';
        if($templateIdentifier=='designer_welcome')
        {
            $var = ["{customer_name}","{company_name}"];
            $value =[$data['customer_name'],$data['company_name']];
            $text = str_replace($var, $value, $template->content);
            $dataEmail['template'] = $text;
            $dataEmail['headTitle'] = $template->head_title;
            $templateData =  $this->load->view('email/welcome.php',$dataEmail,true);
        }

        if($templateIdentifier=='buyer_welcome')
        {
            $var = ["{customer_name}","{company_name}"];
            $value =[$data['customer_name'],$data['company_name']];
            $text = str_replace($var, $value, $template->content);
            $dataEmail['template'] = $text;
            $dataEmail['headTitle'] = $template->head_title;
            $templateData =  $this->load->view('email/welcome.php',$dataEmail,true);
        }

        if($templateIdentifier=='create_subscription')
        {
            $var = ["{customer_name}","{company_name}","{expiry_date}"];
            $value =[$data['customer_name'],$data['company_name'],$data['expiry_date']];
            $text = str_replace($var, $value, $template->content);
            $dataEmail['template'] = $text;
            $dataEmail['headTitle'] = $template->head_title;
            $templateData =  $this->load->view('email/welcome.php',$dataEmail,true);
        }

        if($templateIdentifier=='cancel_subscription')
        {
            $var = ["{customer_name}","{cancelled_date}"];
            $value =[$data['customer_name'],$data['cancelled_date']];
            $text = str_replace($var, $value, $template->content);
            $dataEmail['template'] = $text;
            $dataEmail['headTitle'] = $template->head_title;
            $templateData =  $this->load->view('email/welcome.php',$dataEmail,true);
        }

        return $templateData;
    }

    function changePasswordForm($data)
    {
        $template = $this->load->view('change_password.php',$data,true);
        return $template;
    }
}
?>