<section class="content-header">
    <h1>
       Manage Products
        <small>Enter All Product Informations Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url().'products';?>">Manage Products</a></li>
        <li class="active">Edit Products</li>
    </ol>
</section>
<?php
$this->app = new App();
?>
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Product Informations</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body" style="border: 1px solid #ccc;padding: 0px 0px 10px;">
            <form id="wizard" class="form-horizontal" method="post"/>
            <div class="msg"></div>
            <div class="wizard-steps clearfix"></div>
            <div class="step" id="account-details">
                <span class="step-info" data-num="1" data-text="General details"></span>
                <div class="input-box">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Product Name <cite>*</cite></label>
                        <div class="col-sm-10">
                            <input type="hidden" value="<?php echo $product->product_id ?>" name="paroduct_id">
                            <input class="form-control" id="product_name" placeholder="Product Name" type="text" required name="genaral[product_name]" value="<?php echo $product->product_name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Short Title <cite>*</cite></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="short_title" placeholder="Short Title" type="text" required name="genaral[short_title]" value="<?php echo $product->short_title ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Product URL<cite>*</cite></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="url_key" placeholder="Product URL" type="text" required name="genaral[url_key]" value="<?php echo $product->url_key ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea id="editor1" class="form-control textarea" rows="5" placeholder="Product Description" name="genaral[description]"><?php echo $product->description ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Status <cite>*</cite></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="genaral[status]">
                                <?php if($product->status!=''){?>
                                    <?php  if($product->status==1){?>
                                        <option value="1" selected="">Enable</option>
                                        <option value="0">Disable</option>
                                    <?php }else{?>
                                        <option value="0" selected="">Disable</option>
                                        <option value="1">Enable</option>
                                    <?php }?>
                                <?php }else{?>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="step" id="profile-details">
                <span class="step-info" data-num="2" data-text="Product Category"></span>
                <div class="form-row row-fluid">
                    <div style="display: inline-block;">
                        <?php
                        if($product->category!=0)
                        {
                            $category_name=$this->app->get_category_hierarchy($product->category);
                            echo '<code>Current Category : '.implode(' >> ',$category_name).'</code>';

                        }
                        echo $category_tree;
                        ?></div>
                    <?php
                    $attribute_json=$product->attributes;
                    $attribute_array=json_decode($attribute_json,true);
                    if(!empty($attribute_array))
                    {
                        ?>
                        <div  class="box box-primary" id="cat-main-tab">
                            <div class="box-header with-border">
                                <h3 class="box-title">Category Attributes</h3>
                            </div>
                            <div id="attribute_tag" class="input-box" style="padding: 10px">
                                <?php
                                $attributes = $this->app->get_attributes($product->category);
                                $att_arr = explode(',', $attributes);
                                $attribute_data = $this->app->get_attribute_data($att_arr);
                                $attribute_string = '';
                                $j=0;
                                foreach ($attribute_data as $data)
                                {
                                    $attribute_value=$attribute_array[$j]['attribute_value'];
                                    $attribute_options = $this->app->get_attribute_options($data->attribute_id);
                                    $cite = ($data->required == 1) ? '<cite>*</cite>' : '';
                                    $required = ($data->required == 1) ? 'required' : '';
                                    $attribute_string .= '<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">' . $data->label . $cite . '</label>
                                <div class="col-sm-10">';
                                    if ($data->input_type == 'text')
                                    {
                                        $attribute_string .= '<input class="form-control ui-wizard-content valid" placeholder="' . $data->label . '" ' . $required . ' name="attr[attribute_value][]" type="text" value="'.$attribute_value.'">';
                                    }
                                    elseif ($data->input_type == 'dropdown')
                                    {
                                        $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                                        $attribute_string .= '<option value="'.$attribute_value.'">'.$attribute_value.'</option>';
                                        foreach ($attribute_options as $options)
                                        {
                                            $attribute_string .= '<option value="' . $options->option_value . '">' . $options->option_value . '</option>';
                                        }
                                        $attribute_string .= '</select>';
                                    }
                                    elseif ($data->input_type == 'y/n')
                                    {
                                        $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                                        $attribute_string .= '<option value="'.$attribute_value.'">'.$attribute_value.'</option>';
                                        $attribute_string .= '<option value="YES">YES</option>';
                                        $attribute_string .= '<option value="NO">NO</option>';
                                        $attribute_string .= '</select>';
                                    }
                                    elseif ($data->input_type == 'textarea')
                                    {
                                        $attribute_string .= '<textarea class="form-control ui-wizard-content" name="attr[attribute_value][]" ' . $required . '>'.$attribute_value.'</textarea>';
                                    }
                                    $attribute_string .= '<input type="hidden" name="attr[attribute_label][]" value="' . $data->label . '">';
                                    $attribute_string .= '<input type="hidden" name="attr[attribute_id][]" value="' . $data->attribute_id . '">';
                                    $attribute_string .= '<input type="hidden" name="attr[layered_navigation][][" value="' . $data->layered_nav . '">';
                                    $attribute_string .= '<input type="hidden" name="attr[advanced_search][]" value="' . $data->advanced_search . '">';
                                    $attribute_string .= '<input type="hidden" name="attr[quick_search][]" value="' . $data->quick_search . '">';
                                    $attribute_string .= '</div>
                    </div>';
                                    $j++;
                                }
                                echo $attribute_string;
                                ?>

                            </div>
                        </div>
                    <?php
                    }
                    else
                    {
                        ?>
                        <div class="box box-primary" id="cat-main-tab" style="display: none">
                            <div class="box-header with-border">
                                <h3 class="box-title">Category Attributes</h3>
                            </div>
                            <div id="attribute_tag" class="input-box" style="padding: 10px"></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="step" id="contact-details">
                <span class="step-info" data-num="3" data-text="Product Specifications"></span>
                <div class="input-box">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="button" id="addSpecs" class="btn bg-olive margin">Add Specifications</button>
                        </div>
                    </div>
                    <div id="p_specs">
                        <?php if($speci){ foreach($speci as $sp):?>
                            <span>
                                <input type="hidden" value="<?php echo $sp->id;?>" name="speci[id][]" />
                                <input class="form-control" id="value3" placeholder="Value" name="speci[specification_value][]" style="float: left; position: relative;left: 9px; width: 352px;" value="<?php echo $sp->specification_value;?>" type="text" />
                                <button type="button" id="remScnt" onclick="remove_specific('<?php echo $sp->id;?>')" class="btn btn-info btn-danger" style="float: left; margin-left: 19px;">Remove</button>
                            <div style="clear: both; height: 11px;"></div>
                            </span>
                        <?php endforeach; } ?>
                    </div>
                </div>
            </div>
            <div class="step submit_step" id="other-details">
                <span class="step-info" data-num="4" data-text="Meta Informations"></span>
                <div class="input-box">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Meta Title</label>
                        <div class="col-sm-10">
                            <input class="form-control"  placeholder="Meta Title" type="text" value="<?php echo $meta->title?>" name="seo[title]" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Meta Keyword</label>
                        <div class="col-sm-10">
                            <input class="form-control"  placeholder="Meta Keyword" type="text" value="<?php echo $meta->meta_keyword?>" name="seo[meta_keyword]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Meta Description" name="seo[meta_description]"><?php echo $meta->meta_description?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions full">
                <button class="btn pull-left" type="reset"> Back</button>
                <button class="btn pull-right" type="submit"> Next</button>
            </div>
            </form>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<script type="text/javascript">
    $(function ()
    {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>

<script type="text/javascript">
    $(document).ready(function ()
    {
        //fill data to tree  with AJAX call
        $('#jstree-checkable').jstree({
            'plugins': ["wholerow", "checkbox"],
            'core': {
                'data': {
                    "url": "<?php echo base_url() . "dashboard/all_categories";?>",
                    "plugins": ["wholerow", "checkbox"],
                    "dataType": "json" // needed only if you do not supply JSON headers
                }
            }
        })
    });
    function remove_specific(specif_id)
    {
        $.ajax({
            type: 'GET',
            url: '<?=base_url() . 'index.php/products/delete_specific' ?>',
            data: 'id=' + specif_id,
            success: function (data)
            {
                $('#operator_code').val(data);
            }
        });
    }
</script>
