<?php
class Catalog extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->library('grocery_CRUD');
        error_reporting(0);
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

    function categoryOld(){
        if($this->ion_auth->logged_in()==1)
        {
            $app = new App();
            $parentCategory = $app->getParentCategory();
            $crud = new grocery_CRUD();

            $crud->set_table('category');
            $crud->columns('name','url_key','parent_category','description','image');

            $crud->display_as('name','Category Name')
                ->display_as('url_key','Url Key')
                ->display_as('main_banner_link','Main Banner Link')
                ->display_as('description','Description')
                ->display_as('image','Image')
                ->display_as('parent_category','Parent Category');

            //$crud->set_relation('parent_category','category','name');
            $crud->unique_fields(array('url_key'));
            $crud->field_type('parent_category','dropdown',$parentCategory);

            $crud->set_subject('Category');
            $crud->required_fields('name','url_key');
            $crud->set_field_upload('image','assets/uploads/category');
            $output = $crud->render();
            $this->template->load('admin_blank', 'category',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

    function category(){
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('catalog_category')
                ->set_subject('Category')
                ->columns('category_id','image','category_name','featured','url_key','parent_category');
            $crud->field_type('featured','dropdown',array(1 => 'Yes', 0 => 'No'));
            $crud->add_action('Edit', ''.base_url().'assets/uploads/pencil.png', 'catalog/editcategory');
            $crud->add_action('Product Collection', ''.base_url().'skin/admin/images/product.png', 'products/index');
            $crud->set_field_upload('image','assets/uploads/category');
            /*$crud->callback_after_upload(array($this,'example_callback_after_upload'));*/
            $crud->set_relation('parent_category','catalog_category','category_name');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->edit_fields('image');
            $output = $crud->render();
            $this->template->load('admin_blank', 'category',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

    function example_callback_after_upload($uploader_response,$field_info, $files_to_upload)
    {
        $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name;
        $config['image_library'] = 'gd2';
        $config['source_image']	= $file_uploaded;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['width']	= 304;
        $config['height']	= 318;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return true;
    }

    function add_categories()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $category = new App();
            $this->app = new App();
            $this->form_validation->set_rules('cate[category_name]', 'Category Name', 'required');
            $categories = $category->showcats();
            $attributes = $category->getAllAttributes();
            $data['attributes'] = $attributes;
            $data['categorylist'] = $categories;
            $data['attributes'] = $attributes;
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form','add_categories',$data);
            }
            else
            {
                $cate               = $this->input->post('cate');
                $seo                = $this->input->post('seo');
                $url                = trim($cate['url_key']);
                $parent_category_id = $cate['parent_category'];
                $file_name = $_FILES['image']['name'];
                if($file_name) {
                    $upload_path = 'assets/uploads/category/';
                    $resultImage = $this->app->douploadImage($file_name, $upload_path, '', '','image');
                    if(!empty($resultImage['error'])) {
                        echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">'.$resultImage['error'].' "UPLOAD IMAGE" Field</div>';
                        die;
                    } else {
                        $cate['image'] = $resultImage['file_name'];
                    }
                }
                if($parent_category_id==0) {
                    $full_url= base_url().$url;
                    $url_key_id = '';
                    $re_url = $url;
                } else {
                    $level=$category->get_level($parent_category_id);
                    $url_key_id = $category->category_urlkey($parent_category_id,$level);
                    $categories = implode("/", array_map(array($category,'url_key'), explode("/", $url_key_id)));
                    $full_url= base_url().$categories.'/'.$url;
                    $re_url = $categories.'/'.$url;
                }
                if($category->check_category_url($re_url) == '0' or $category->check_category_url($re_url) == 0)
                {
                    $cate_tf            = $category->category_insert($cate,'catalog_category');
                    $cate_id            = $this->db->insert_id();
                    $speci              = $this->input->post('speci');
                    #Level
                    $parent =   $cate['parent_category'];
                    $lavel  =   $category->get_category_level($cate_id,$parent);
                    $level_data =  array(
                        'category_id' => $cate_id,
                        'level'       => $lavel,
                    );
                    $this->db->insert('category_level', $level_data);
                    $category_level=$category->get_level($cate_id);
                    $url_key=$category->category_urlkey($cate_id,$category_level);
                    #Level End
                    if($cate_tf==1)
                    {
                        $title              = $category->seo_check($seo['title'],$cate['category_name']);
                        $meta_keyword       = $category->seo_check($seo['meta_keyword'],$cate['category_name']);
                        $meta_description   = $category->seo_check($seo['meta_description'],$cate['category_name']);
                        $section            = 'category';
                        #SEO INSERT
                        $data               = array(
                            'title'             =>  $title,
                            'meta_keyword'      =>  $meta_keyword,
                            'meta_description'  =>  $meta_description,
                            'section'           =>  $section,
                            'section_id'        =>  $cate_id,
                            'url_key'           =>  $url_key,
                            'u_key'             =>  $re_url
                        );
                        $complted= $this->db->insert('seo', $data);
                    }
                    if($parent_category_id==0) {
                        $re_url_id = $cate_id;
                    }else{
                        $re_url_id = $url_key_id.'/'.$cate_id;
                    }
                    $this->app->insert_url($cate_id,$re_url,$re_url_id);
                    $this->app->category_routes($re_url);
                    $this->app->add_category_tag($speci,$cate_id);
                    echo 'r';
                }
                else
                {
                    echo '<div class="alert alert-error">
                                    Category<strong>"Url KEY" is already exist. Please choose another one.
                                  </div>';
                }
            }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function editcategory()
    {
        $id = $this->uri->segment(3);
        $category = new App();
        $this->app = new App();
        $this->data['categorylist'] = $this->app->showcats();
        $this->app->get_category_data($id);

        if ($this->ion_auth->logged_in() == 1)
        {
            $this->form_validation->set_rules('cate[category_name]', 'Category Name', 'required');
            $data['categorylist'] = $this->app->showcats();
            $data['category'] = $this->app->get_category_data($id);
            $data['seo'] = $this->app->get_category_seo_data($id);
            //$data['speci'] = $this->app->tags($id);
            $attributes = $category->getAllAttributes();
            $data['attributes'] = $attributes;
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form', 'editcategory', $data);
            }
            else
            {
                $cate = $this->input->post('cate');
                $file_name = $_FILES['image']['name'];

                if($file_name) {
                    $upload_path = 'assets/uploads/category/';
                    $resultImage = $this->app->douploadImage($file_name, $upload_path, '', '','image');
                    if(!empty($resultImage['error'])) {
                        echo '<div style="color: red; border: 1px dotted; padding: 5px; margin: 5px; text-align: center;">'.$resultImage['error'].' "UPLOAD IMAGE" Field</div>';
                        die;
                    } else {
                        $cate['image'] = $resultImage['file_name'];
                    }
                }

                $properties = $this->input->post('attributes');
                $cate['attributes'] = implode(',', $properties);
                $seo = $this->input->post('seo');
                $url = trim($cate['url_key']);
                $id = $this->input->post('category_id');
                //$level=$category->get_level($id);

                $parent_category_id = $cate['parent_category'];
                if($parent_category_id==0)
                {
                    $full_url= base_url().$url;
                    $re_url = $url;
                }
                else
                {
                    $level=$category->get_level($parent_category_id);
                    $url_key_id = $category->category_urlkey($parent_category_id,$level);
                    $categories = implode("/", array_map(array($category,'url_key'), explode("/", $url_key_id)));
                    $full_url= base_url().$categories.'/'.$url;
                    $re_url = $categories.'/'.$url;
                }
                if ($category->url_checking($url, $id) == 0)
                {
                    if ($category->check_category_url($re_url) == '0' or $category->check_category_url($re_url) == 0)
                    {
                        $cate_tf = $category->category_update($cate, 'catalog_category', $id);
                        $cate_id = $id;
                        $parent = $cate['parent_category'];
                        $lavel = $category->get_category_level($cate_id, $parent);
                        $level_data = array('level' => $lavel);
                        $this->db->where('category_id', $cate_id);
                        $this->db->update('category_level', $level_data);
                        if ($lavel == 1)
                        {
                            $full_url = base_url() . $url . '.html';
                            $re_url = $url;
                            $re_url_id = $id;
                        }
                        else
                        {
                            $level=$category->get_level($parent_category_id);
                            $url_key_id = $category->category_urlkey($parent_category_id,$level);
                            $categories = implode("/", array_map(array($category,'url_key'), explode("/", $url_key_id)));
                            $full_url= base_url().$categories.'/'.$url;
                            $re_url = $categories.'/'.$url;
                            $re_url_id = $url_key_id.'/'.$id;
                        }
                        $category_level = $category->get_level($cate_id);
                        $url_key = $category->category_urlkey($cate_id, $category_level);
                        $title = $category->seo_check($seo['title'], $cate['category_name']);
                        $meta_keyword = $category->seo_check($seo['meta_keyword'], $cate['category_name']);
                        $meta_description = $category->seo_check($seo['meta_description'], $cate['category_name']);
                        #SEO INSERT
                        $data = array
                        (
                            'title'            => $title,
                            'meta_keyword'     => $meta_keyword,
                            'meta_description' => $meta_description,
                            'url_key'          => $url_key,
                            'u_key'            => $re_url
                        );
                        $this->db->where('section_id', $cate_id);
                        $this->db->where('section', 'category');
                        $this->db->update('seo', $data);
                        if ($this->input->post('sav') == 'sav')
                        {
                            echo '<div class="alert alert-success">
                                    Category<strong>"' . $cate['category_name'] . '"</strong> successfully updated.
                                  </div>';
                        }
                        elseif ($this->input->post('go') == 'go')
                        {
                            echo 'r';
                        }
                        $this->app->category_routes($re_url);
                        $this->app->update_url($cate_id, $re_url,$re_url_id);
                        $speci = $this->input->post('speci');
                        $this->app->category_tag_update($speci,$cate_id);
                    }
                    else
                    {
                        echo '<div class="alert alert-error">
                                    Category<strong>"Url KEY" is already exist. Please choose another one.
                                  </div>';
                    }
                }
                else
                {
                    $cate_tf = $category->category_update($cate, 'catalog_category', $id);
                    $cate_id = $id;
                    $parent = $cate['parent_category'];
                    $lavel = $category->get_category_level($cate_id, $parent);
                    $level_data = array('level' => $lavel);
                    $this->db->where('category_id', $cate_id);
                    $this->db->update('category_level', $level_data);
                    if ($lavel == 1)
                    {
                        $full_url = base_url() . $url . '.html';
                        $re_url = $url;
                        $re_url_id = $id;
                    }
                    else
                    {
                        $level=$category->get_level($parent_category_id);
                        $url_key_id = $category->category_urlkey($parent_category_id,$level);
                        $categories = implode("/", array_map(array($category,'url_key'), explode("/", $url_key_id)));
                        $full_url= base_url().$categories.'/'.$url;
                        $re_url = $categories.'/'.$url;
                        $re_url_id = $url_key_id.'/'.$id;
                    }
                    $category_level = $category->get_level($cate_id);
                    $url_key = $category->category_urlkey($cate_id, $category_level);
                    $title = $category->seo_check($seo['title'], $cate['category_name']);
                    $meta_keyword = $category->seo_check($seo['meta_keyword'], $cate['category_name']);
                    $meta_description = $category->seo_check($seo['meta_description'], $cate['category_name']);
                    #SEO INSERT
                    $data = array
                    (
                        'title'            => $title,
                        'meta_keyword'     => $meta_keyword,
                        'meta_description' => $meta_description,
                        'url_key'          => $url_key,
                        'u_key'            => $re_url
                    );
                    $this->db->where('section_id', $cate_id);
                    $this->db->where('section', 'category');
                    $this->db->update('seo', $data);
                    $this->app->category_routes($re_url);
                    $this->app->update_url($cate_id, $re_url,$re_url_id);
                    $speci = $this->input->post('speci');
                    $this->app->category_tag_update($speci,$cate_id);
                    if ($this->input->post('sav') == 'sav')
                    {
                        echo '<div class="alert alert-success">
                                Category<strong>"' . $cate['category_name'] . '"</strong> successfully updated.
                              </div>';
                    }
                    elseif ($this->input->post('go') == 'go')
                    {
                        echo 'r';
                    }
                }
            }
        }
        else
        {
            $this->template->load('login_master', 'content');
        }
    }
    function delete_tag()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->delete('tags');
    }
}
