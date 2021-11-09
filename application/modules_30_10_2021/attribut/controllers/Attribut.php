<?php
class Attribut extends MY_Controller
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
        if (!$this->ion_auth->in_group('admin'))
        {
            redirect('login/user_panel');
        }
    }

    function list_attribute()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('attributes')
                ->set_subject('Attributes');
            $crud->add_action('Edit', ''.base_url().'assets/uploads/pencil.png', 'attribut/edit_attribute');
            $crud->add_action('Swatches', ''.base_url().'skin/admin/images/icons/swatch_folder.ico', 'attribut/swatches');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->callback_before_delete(array($this,'options_before_delete'));
            $output = $crud->render();
            $this->template->load('admin_blank','attribut',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    public function options_before_delete($primary_key)
    {
        $this->db->where('attribute_id',$primary_key);
        $this ->db-> delete('attribute_options');
        return true;
    }
    function add_attribut()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $this->app = new App();

            $this->form_validation->set_rules('attr[attribute_code]', 'Attribute Code', 'required');
            $this->form_validation->set_rules('attr[label]', 'Label', 'required');
            $data['parent_category']    =  $this->app->get_category();
            $this->data['category_tree']= $this->load->view('attribut_category',$data,true);
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form','add_attribut',$this->data);
            }
            else
            {
                $categories = $this->input->post('cate');
                $comma_separated = implode(",", $categories);
                $specific_categories = substr($comma_separated, 1);
                $attributes = $this->input->post('attr');
                $attributes['specific_categories'] = $specific_categories;
                $option     = $this->input->post('option');
                $insert     = $this->app->attribute_insert($attributes);
                $attribute_id = $this->db->insert_id();
                if($option)
                {
                    if($insert==1)
                    {
                        $this->app->attribute_options_insert($option,$attribute_id);
                    }
                }
                
                echo 'r';
            }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function sub_cat()
    {
        $category_id=$this->input->post('category_id');
        $current_level=$this->input->post('level');
        if($current_level==1)
        {
            $span_class='label label-info';
        }
        elseif($current_level==2)
        {
            $span_class='label label-warning';
        }
        elseif($current_level==3)
        {
            $span_class='label label-important';
        }
        elseif($current_level==4)
        {
            $span_class='label label-inverse';
        }
        elseif($current_level==5)
        {
            $span_class='label';
        }
        elseif($current_level==6)
        {
            $span_class='label label-info';
        }
        elseif($current_level==7)
        {
            $span_class='label label-warning';
        }
        elseif($current_level==8)
        {
            $span_class='label label-important';
        }
        else
        {
            $span_class='label label-inverse';
        }
        $level=$current_level+1;
        $subcategories=$this->app->get_subcategory($category_id);
        if($subcategories)
        {
            $result='<ul style="list-style-type: none"> ';
            foreach($subcategories as $sub)
            {
                $check_id = $this->app->check_category($sub->category_id,$this->uri->segment(3));
                if($check_id==1)
                {
                    $checked_id = 'checked=""';
                }
                else
                {
                    $checked_id = '';
                }
                $check=$this->app->check_subcategories($sub->category_id);
                if($check!=0){$icon='<span class="icomoon-icon-plus-circle" style="cursor: pointer;" id="click_'.$sub->category_id.'" onclick="sub_cat('.$sub->category_id.','.$level.')"></span>';}
                else{
                    $icon='<span class="icomoon-icon-grid-3"></span> ';
                }
                $result.='<li>
                                '.$icon.'
                                <input '.$checked_id.' class="subcat_check" id="check_'.$sub->category_id.'" type="checkbox" value="'.$sub->category_id.'" data-subcat="'.$sub->category_id.'" data-cat="'.$category_id.'" name="cate[]" />
                                <span class="'.$span_class.'">'.$sub->category_name.'</span>
                                <div class="sub_category" id="subcat_'.$sub->category_id.'">

                                </div>
                                </li>';
            }
            $result.='</ul>';
            echo $result;

        }
    }
    function edit_attribute()
    {
        $this->app = new App();
        if($this -> ion_auth -> logged_in()==1)
        {
            $data['attrubute'] = $this->app->attribute_data($this->uri->segment(3));
            $data['options'] = $this->app->get_attributes_options($this->uri->segment(3));
            $data['parent_category']    =  $this->app->get_category();
            $data['category_tree']= $this->load->view('categories',$data,true);
            $this->form_validation->set_rules('attr[label]', 'Label', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form','edit_attribute',$data);
            }
            else
            {
                $categories = $this->input->post('cate');
                $comma_separated = implode(",", $categories);
                $specific_categories = substr($comma_separated, 1);
                $attributes = $this->input->post('attr');
                $attributes['specific_categories'] = $specific_categories;
                $option     = $this->input->post('option');
                $update     = $this->app->attribute_update($attributes,$this->input->post('attribute_id'));
                $this->app->attribute_options_update($option,$this->input->post('attribute_id'));
                if($this->input->post('sav')=='sav')
                {
                    echo 'r';
                }
                else
                {
                    echo '<div class="alert alert-success">
                        Attribute<strong>"'.$attributes['label'].'"</strong> successfully updated.
                      </div>';
                }
            }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function add_attribut_set()
    {
        $this->app = new App();
        if($this -> ion_auth -> logged_in()==1)
        {
            $data['attributes'] = $this->app->get_all_attributes();
            //print_r($_POST);die;
            $this->form_validation->set_rules('attrset[attribute_set_name]', 'Attribute Set Name', 'required');
            if ($this->form_validation->run() == FALSE)
            {
        	   $this->template->load('form','add_attribut_set',$data);
            }
            else
            {
                $attrset = $this->input->post('attrset');
                $option     = $this->input->post('attoption');
                //print_r($option);die;
                $set_data=array(
                    'name' => $attrset['attribute_set_name']
                );
                $insert_id=$this->app->common_insert('attribute_set',$set_data);
                if($insert_id) {
                    for ($i = 0; $i < count($option); $i++) {
                        $data = array(
                            'set_id' => $insert_id,
                            'attribute_id'=> $option[$i]
                        );
                        $attributesetinsert = $this->app->common_insert('attribute_set_options',$data);
                    }
                }
                if($attributesetinsert):
                    echo 'r';
                else:
                    echo '<div class="alert alert-error">
                                    Something went wrong
                                  </div>';
                endif;

            }
            
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function attribut_set()
    {
        if($this -> ion_auth -> logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('attribute_set')
                ->set_subject('Attributes Set');

            $crud->add_action('Delete', ''.base_url().'assets/uploads/close.png', 'attribut/delete_attribute_set');
            $crud->add_action('Edit', ''.base_url().'assets/uploads/pencil.png', 'attribut/edit_attribute_set');

            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $output = $crud->render();
            $this->template->load('admin_blank','attribute_set',$output);
        }
        else
        {
            $this->template->load('admin','content');
        }
    }
    function edit_attribute_set()
    {
        $this->app = new App();
        if($this -> ion_auth -> logged_in()==1)
        {
            $data['attrubute_set'] = $this->app->attributeset_data($this->uri->segment(3));
            $data['attributes'] = $this->app->get_all_attributes();
            $data['options'] = $this->app->attributeSetOptions($this->uri->segment(3));
            $this->form_validation->set_rules('attrset[attribute_set_name]', 'Attribute Set Name', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('form','edit_attribute_set',$data);
            }
            else
            {
                $attrset = $this->input->post('attrset');
                $option     = $this->input->post('attoption');
                $attribute_set_id=$this->input->post('attribute_set_id');
                $attribute_data=$this->app->get_attributeset_options($attribute_set_id);
                $set_data=array(
                    'name' => $attrset['attribute_set_name']
                );
                $where=array(
                    'set_id' => $attribute_set_id
                );
                $update=$this->app->common_update('attribute_set',$set_data,$where);
                //die;
                if($update) {
                    $del_attributes=$this->app->truncate_attributes($attribute_set_id);
                    for ($i = 0; $i < count($option); $i++) {
                        $data = array(
                            'set_id' => $attribute_set_id,
                            'attribute_id'=> $option[$i]
                        );
                        $attributesetinsert = $this->app->common_insert('attribute_set_options',$data);
                    }
                }
                if($attributesetinsert):
                    echo 'r';
                else:
                    echo '<div class="alert alert-error">
                                    Something went wrong
                                  </div>';
                endif;
            }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    function delete_attribute_set()
    {
        $this->app = new App();
        $attribute_set_id=$this->uri->segment(3);
        $delete_attributes=$this->app->delete_attribute_set($attribute_set_id);
        if($delete_attributes)
           redirect('attribut/attribut_set');

    }

    function check_code()
    {
        $code=$this->input->post('code');
        $check=$this->app->check_attributecode($code);
        echo $check;
    }

    function color_code_column_callback($value, $row)
    {
        $data = '<div style="border: 1px solid;width: 12%;text-align: center;background-color: '.$value.';">&nbsp;</div>';
        return $data;
    }

    function swatches($attributeId = 0)
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();
            $crud->set_table('swatches');
            $crud->required_fields('option_id');
            $crud->display_as('option_id','Option');
            $crud->set_subject('Swatches');
            $crud->callback_column('color_code',array($this,'color_code_column_callback'));
            $crud->set_relation('option_id','attribute_options','option_value', ['attribute_options.attribute_id' => $attributeId]);
            $crud->set_field_upload('swatch_image','assets/uploads/swatches');
            $crud->field_type('attribute_id', 'hidden', $attributeId);
            $output = $crud->render();

            $this->template->load('admin_blank','swatches',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }
}
?>