<?php
class Products extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('image_CRUD');
        error_reporting(0);
        if ($this->ion_auth->logged_in() != 1) {
            redirect('admin');
        }
    }
    function index($categoryId=0)
    {
        $crud = new grocery_CRUD();
        $crud->set_table('catalog_product');
        $crud->set_subject('Products');
        $crud->columns('product_id', 'item_number','product_name', 'search_name', 'status');
        $crud->display_as('product_id','ID');
        $crud->required_fields('item_number','product_name','status');
        $crud->unset_print();
        $crud->unset_export();
        $output = $crud->render();
        $this->template->load('admin_blank', 'products', $output);
    }

    function rename_image($post_array,$primary_key)
    {
        $filename = $post_array['image_name'];
        $position = $post_array['position'];
        $product_id = $this->uri->segment(3);
        @list($filename_1,$extension) = explode('.',$filename);
        $imageName = 'image'.$product_id.'-'.$position.'.'.$extension;
        $basePath = FCPATH;
        $olderName = $basePath.'assets/uploads/360/'.$filename;
        rename($basePath.'assets/uploads/360/'.$filename, $basePath.'assets/uploads/360/'.$imageName);
        $post_array['image_name'] = $imageName;
        return $post_array;
    }

    function add_product()
    {
        $this->app = new App();
        if ($this->ion_auth->logged_in() == 1)
        {
            $setId = $this->uri->segment(3);
            $data['attributeSet'] = $this->app->getAttributeSet();
            $data['endParams'] = @end($this->uri->segment_array());
            $data['setId'] = $setId;
            $data['app'] = $this->app;
            $this->template->load('admin/advanced_form', 'add_product',$data);
            if ($this->input->post())
            {
                if($this->input->post('config_attr')){
                    $configAttributes = implode(',',$this->input->post('config_attr'));
                }else{
                    $configAttributes = '';
                }
                $pro_data = array(
                    'product_name' => '',
                    'attribute_set_id' => $this->input->post('attribute_set'),
                    'config_attributes' => $configAttributes
                );
                $this->db->insert('catalog_product', $pro_data);
                $product_id = $this->db->insert_id();
                $data = array(
                    'section'    => 'product',
                    'section_id' => $product_id,
                );
                $this->db->insert('seo', $data);
                $product_url = array(
                    'product_id' => $product_id
                );
                $this->db->insert('product_urls', $product_url);
                redirect('products/edit_product/' . $product_id);
            }
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }
    function upload()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $this->template->load('fileupload', 'upload');
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }
    function product_images()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $image_crud = new image_CRUD();
            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('image');
            $image_crud->set_table('products_image')
                ->set_relation_field('product_id')
                ->set_image_path('assets/uploads/products');
            $output = $image_crud->render();

            $this->template->load('admin_blank', 'productimage', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }

    function default_image()
    {
        $product_id = $this->uri->segment(4);
        $this->app = new App();
        $data_bef = array(
            'default_image' => 0
        );
        $this->db->where('product_id', $product_id);
        $this->db->update('products_image', $data_bef);
        $id = $this->uri->segment(3);
        $data = array(
            'default_image' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('products_image', $data);
        $image_name = 'thumb__' . $this->app->default_image_name($id);
        $data_img = array('default_image' => $image_name);
        $this->db->where('product_id', $product_id);
        $this->db->update('catalog_product', $data_img);
    }
    function edit_product()
    {
        $this->app = new App();
        $this->main = new Main();
        $allPostData = $this->input->post();
        if ($this->ion_auth->logged_in() == 1)
        {
            $ProductData['main_categories'] = $this->app->get_all_main_categories();
            $data['parent_category'] = $this->app->get_all_main_categories();
            $general_details=$this->app->product_data($this->uri->segment(3));
            $data['category']=$general_details->category;
            $this->session->set_userdata('current_category', $general_details->category);
            $categories = $this->app->showcats();
            $ProductData['categorylist'] = $categories;
            $ProductData['product'] = $general_details;
            $ProductData['speci'] = $this->app->specification($this->uri->segment(3));
            $ProductData['meta'] = $this->app->meta_info($this->uri->segment(3));
            $ProductData['main'] = $this->main;
            $this->form_validation->set_rules('genaral[product_name]', 'Product Name', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $attrbuteData = $this->app->getAttributes($general_details->attribute_set_id);
                $productData['attributesData'] = $attrbuteData;
                $this->template->load('form', 'product_edit', $ProductData);
            }
            else
            {
                $app = new app;
                $genaral = $this->input->post('genaral');
                $attributes = $this->input->post('attr');
                $seo = $this->input->post('seo');
                $speci = $this->input->post('speci');
                $category_product_url = 'product/'.$genaral['url_key'];
                $product_url = $genaral['url_key'];
                $url_checking_result = $app->check_product_url($category_product_url);
                $pro_url = $app->product_url($this->input->post('paroduct_id'));
                $product_attributes = array();
                if (isset($attributes['attribute_id']))
                {
                    foreach ($attributes['attribute_label'] as $key => $val)
                    {
                        $att_arr = array(
                            'attribute_id'       => $attributes['attribute_id'][$key],
                            'attribute_code'       => $attributes['attribute_code'][$key],
                            'attribute_label'    => $attributes['attribute_label'][$key],
                            'attribute_value'    => $attributes['attribute_value'][$key],
                            'layered_navigation' => $attributes['layered_navigation'][$key],
                            'advanced_search'    => $attributes['advanced_search'][$key],
                            'quick_search'       => $attributes['quick_search'][$key]
                        );
                        array_push($product_attributes, $att_arr);
                    }
                }
                $file_name = $_FILES['image']['name'];
                if($file_name) {
                    $upload_path = 'assets/uploads/products/main/';
                    $resultImage = $app->douploadImage($file_name, $upload_path, '', '','image');
                    if(!empty($resultImage['error'])) {
                        echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">'.$resultImage['error'].' "UPLOAD IMAGE" Field</div>';
                        die;
                    } else {
                        $genaral['image'] = $resultImage['file_name'];
                    }
                }
                $genaral['attributes'] = json_encode((object)$product_attributes);
                if ($seo['title'] == '') {
                    $seo['title'] = $genaral['product_name'];
                } else {
                    $seo['title'] = $seo['title'];
                }
                if ($seo['meta_keyword'] == '') {
                    $seo['meta_keyword'] = $genaral['product_name'];
                } else {
                    $seo['meta_keyword'] = $seo['meta_keyword'];
                }if ($seo['meta_description'] == '') {
                    $seo['meta_description'] = $genaral['product_name'];
                } else {
                    $seo['meta_description'] = $seo['meta_description'];
                }
                if($genaral['url_key']) {
                    $seo['u_key'] = $category_product_url;
                }

                $product_code = $app->get_product_code($this->input->post('paroduct_id'));

                if(!empty($genaral['product_code'])){
                    if ($product_code == $genaral['product_code']){
                        echo '<b style="color: red">The "Product Code" already Exists.You Must Provide unique Product Code</b>';
                        die;
                    }
                }
                if(!empty($genaral['url_key'])){
                    if ($url_checking_result != '0' or $url_checking_result != 0){
                        echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">The "URL KEY" already Exists.You Must Provide unique URL Key (Genarate <a href="javascript:void(0)" onclick="gen_url(' . "'" . $product_url . "'" . ')">Url</a>)</div>';
                        die;
                    }
                }
                $priceOptions = $allPostData['price_data']['price'];
                $price_data = [];
                $pid=0;
                foreach ($priceOptions as $priceId => $key){
                    $price_data[] = array(
                        'price'         => $allPostData['price_data']['price'][$priceId],
                        'special_price' => $allPostData['price_data']['special_price'][$priceId],
                        'currency_code' => $allPostData['price_data']['currency_code'][$priceId],
                        'currency_id'   => $allPostData['price_data']['currency_id'][$priceId],
                    );
                    $pid++;
                }
                if(count($app->getCurrencies())==count($price_data)){
                    $genaral['price_data'] = json_encode($price_data);
                }else{
                    echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">Please fil all prices</div>';
                    die;
                }

                try
                {
                    $genaral['category'] = @implode(',',$this->input->post('categories'));
                    $this->app->product_update($genaral, $this->input->post('paroduct_id'));
                    $this->app->seo_update($seo, $this->input->post('paroduct_id'));
                    $this->app->product_specification_update($speci, $this->input->post('paroduct_id'));
                    $app->update_product_url_key($this->input->post('paroduct_id'), $category_product_url, $product_url);
                    $app->product_url_rout($category_product_url, $product_url);
                    if ($this->input->post('sav') == 'Save') {
                        echo 'r';
                    } else {
                        echo '<div class="alert alert-success">
                                Product <strong>"' . $genaral['product_name'] . '"</strong> successfully updated.
                              </div>';
                    }
                    die;
                }
                catch( Exception $e )
                {
                    echo '<b style="color: red">Something went wrong. Please contact developer</b>';
                    die;
                }
            }
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }
    function delete_specific()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->delete('product_specification');
    }
    function orders()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('product_enquiry')
                ->set_subject('Product Enquiry');
            $crud->order_by('id', 'desc');
            $crud->unset_add();
            $crud->unset_edit();
            $output = $crud->render();
            $this->template->load('form', 'orders', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }
    function order_view()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $this->template->load('form', 'order_view');
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }
    function category_tree()
    {
        $data['parent_category'] = $this->app->get_all_main_categories();
        $this->template->load('form', 'category_tree', $data);
    }
    function sub_category()
    {
        $this->app = new App();
        $category_id = $this->input->post('category_id');
        $current_level = $this->input->post('level');
        $level = $current_level + 1;
        $subcategories = $this->app->get_main_subcategories($category_id);
        $current_catgory=$this->session->userdata('current_category');
        if ($subcategories)
        {
            $result = '<ul style="list-style-type: none"> ';
            foreach ($subcategories as $sub)
            {
                if($current_catgory!='')
                {
                    if($current_catgory == $sub->category_id)
                    {
                        $checkbox="checked";
                    }
                    else
                    {
                        $checkbox='';
                    }
                }
                else
                {
                    $checkbox='';
                }
                $check = $this->app->check_subcategories($sub->category_id);
                if ($check != 0)
                {
                    $icon = '<span class="fa fa-fw fa-plus-square-o" style="cursor: pointer;" onclick="sub_cat(' . $sub->category_id . ',' . $level . ')"></span>';
                }
                else
                {
                    $icon = '<span class="fa fa-fw fa-square-o"></span> ';
                }
                $result .= '<li>
                                ' . $icon . '
                                <input '.$checkbox.' onclick="get_attributes(this.value)" class="subcat_check" id="check_' . $sub->category_id . '" type="checkbox" value="' . $sub->category_id . '" data-subcat="' . $sub->category_id . '" data-cat="' . $category_id . '" name="genaral[category]" />
                                <span class="label">' . $sub->category_name . '</span>
                                <div class="sub_category" id="subcat_' . $sub->category_id . '">
                                </div>
                                </li>';
            }
            $result .= '</ul>';
            echo $result;
        }
    }
    function get_attributes()
    {
        $this->app = new App();
        $category_id = $this->input->post('category_id');
        $attributes = $this->app->get_attributes($category_id);
        $att_arr = explode(',', $attributes);
        $attribute_data = $this->app->get_attribute_data($att_arr);
        $attribute_string = '';
        foreach ($attribute_data as $data)
        {
            $attribute_options = $this->app->get_attribute_options($data->attribute_id);
            $cite = ($data->required == 1) ? '<cite>*</cite>' : '';
            $required = ($data->required == 1) ? 'required' : '';
            $attribute_string .= '<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">' . $data->label . $cite . '</label>
                                <div class="col-sm-10">';
            if ($data->input_type == 'text')
            {
                $attribute_string .= '<input class="form-control ui-wizard-content valid" placeholder="Enter ' . $data->label . '" ' . $required . ' name="attr[attribute_value][]" type="text">';
            }
            elseif ($data->input_type == 'dropdown')
            {
                $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                $attribute_string .= '<option value="">---Please Select ' . $data->label . '---</option>';
                foreach ($attribute_options as $options)
                {
                    $attribute_string .= '<option value="' . $options->option_value . '">' . $options->option_value . '</option>';
                }
                $attribute_string .= '</select>';
            }
            elseif ($data->input_type == 'y/n')
            {
                $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                $attribute_string .= '<option value="">---Please Select ' . $data->label . '---</option>';
                $attribute_string .= '<option value="YES">YES</option>';
                $attribute_string .= '<option value="NO">NO</option>';
                $attribute_string .= '</select>';
            }
            elseif ($data->input_type == 'textarea')
            {
                $attribute_string .= '<textarea class="form-control ui-wizard-content" name="attr[attribute_value][]" ' . $required . '></textarea>';
            }
            $attribute_string .= '<input type="hidden" name="attr[attribute_label][]" value="' . $data->label . '">';
            $attribute_string .= '<input type="hidden" name="attr[attribute_id][]" value="' . $data->attribute_id . '">';
            $attribute_string .= '<input type="hidden" name="attr[layered_navigation][][" value="' . $data->layered_nav . '">';
            $attribute_string .= '<input type="hidden" name="attr[advanced_search][]" value="' . $data->advanced_search . '">';
            $attribute_string .= '<input type="hidden" name="attr[quick_search][]" value="' . $data->quick_search . '">';
            $attribute_string .= '</div>
                    </div>';
        }
        echo $attribute_string;
    }

    function createConfigProduct()
    {
        $app = new App();
        $postData = $this->input->post();
        $file_name = $_FILES['default_image']['name'];
        $upload_path = 'assets/uploads/products/main/';
        if($file_name) {
            $resultImage = $app->douploadImage($file_name, $upload_path, '', '','default_image');
            if(!empty($resultImage['error'])) {
                echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">'.$resultImage['error'].' "UPLOAD IMAGE" Field</div>';
                die;
            } else {
                $postData['default_image'] = $resultImage['file_name'];
            }
        }
        $postData['attribute_info'] = json_encode($postData['attribute_info']);
        $postData['combination'] = @implode(',',json_decode($postData['attribute_info'],true));

        $priceOptions = $postData['price_data']['price'];
        $price_data = [];
        $pid=0;
        foreach ($priceOptions as $priceId => $key){
            $price_data[] = array(
                'price'         => $postData['price_data']['price'][$priceId],
                'special_price' => $postData['price_data']['special_price'][$priceId],
                'currency_code' => $postData['price_data']['currency_code'][$priceId],
                'currency_id'   => $postData['price_data']['currency_id'][$priceId],
            );
            $pid++;
        }
        if(count($app->getCurrencies())==count($price_data)){
            $postData['price_data'] = json_encode($price_data);
        }else{
            echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">Please fil all prices</div>';
            die;
        }
        $this->db->insert('configurable_products',$postData);
        echo '<div class="alert alert-success">
                                Option product <strong>"' . $postData['name'] . '"</strong> successfully created.
                              </div>';
    }

    function editConfigProduct($id)
    {
        if ($this->ion_auth->logged_in() == 1) {
            $app = new App();
            $main = new Main();
            $data['app'] = $app;
            $data['main'] = $main;
            $data['configProduct'] = $app->getConfigProduct($id);
            $this->template->load('admin/advanced_form', 'editConfigProduct',$data);
        } else {
            $this->template->load('login_master', 'content');
        }
    }

    function editConfigProductAction()
    {
        $app = new App();
        $postData = $this->input->post();
        $file_name = $_FILES['default_image']['name'];
        $upload_path = 'assets/uploads/products/main/';
        if($file_name) {
            $resultImage = $app->douploadImage($file_name, $upload_path, '', '','default_image');
            if(!empty($resultImage['error'])) {
                echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">'.$resultImage['error'].' "UPLOAD IMAGE" Field</div>';
                die;
            } else {
                $postData['default_image'] = $resultImage['file_name'];
            }
        }

        $priceOptions = $postData['price_data']['price'];
        $price_data = [];
        $pid=0;
        foreach ($priceOptions as $priceId => $key){
            $price_data[] = array(
                'price'         => $postData['price_data']['price'][$priceId],
                'special_price' => $postData['price_data']['special_price'][$priceId],
                'currency_code' => $postData['price_data']['currency_code'][$priceId],
                'currency_id'   => $postData['price_data']['currency_id'][$priceId],
            );
            $pid++;
        }
        if(count($app->getCurrencies())==count($price_data)){
            $postData['price_data'] = json_encode($price_data);
        }else{
            echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">Please fil all prices</div>';
            die;
        }

        $this->db->where('id',$postData['id']);
        $this->db->update('configurable_products',$postData);
        echo '<div class="alert alert-success">Option product successfully Updated.</div>';
    }

    function deleteConfigProduct($id)
    {
        $productId =  end($this->uri->segment_array());
        $this->db->where('id', $id);
        $this->db-> delete('configurable_products');
        redirect(base_url().'products/edit_product/'.$productId);
    }

    function addConfigMediaImage()
    {
        if ($this->ion_auth->logged_in() == 1)
        {
            $image_crud = new image_CRUD();
            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('image');
            $image_crud->set_table('configurable_products_image')
                ->set_relation_field('product_id')
                ->set_image_path('assets/uploads/products');
            $output = $image_crud->render();

            $this->template->load('admin_blank', 'productimage', $output);
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }
}
?>