<style>
    .config_image {
        width: 63px;
        text-align: center;
    }
    .config_action {
        border: 1px solid #DDD;
        padding: 5px;
        margin: 2px;
        background-color: #DDD;
        color: #000;
    }
</style>
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
$app = new App();
?>
<section class="content">
    <form class="form-horizontal" id="edit_product" method="POST" action="" enctype="multipart/form-data">
        <div id="message"></div>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Product Information</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Name <cite>*</cite></label>
                    <div class="col-sm-10">
                        <input type="hidden" value="<?php echo $product->product_id ?>" name="paroduct_id">
                        <input class="form-control" id="product_name" placeholder="Product Name" type="text" required name="genaral[product_name]" value="<?php echo $product->product_name ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Short Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="short_title" placeholder="Short Title" type="text" name="genaral[short_title]" value="<?php echo $product->short_title ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Popular</label>
                    <div class="col-sm-10">
                        <select name="genaral[popular]" class="form-control">
                            <option <?php if($product->popular==0){ echo 'selected'; }?> value="0">No</option>
                            <option <?php if($product->popular==1){ echo 'selected'; }?> value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Best Seller</label>
                    <div class="col-sm-10">
                        <select name="genaral[best_seller]" class="form-control">
                            <option <?php if($product->best_seller==0){ echo 'selected'; }?> value="0">No</option>
                            <option <?php if($product->best_seller==1){ echo 'selected'; }?> value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Main Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" style="padding: 1px;" id="image" placeholder="Short Title" type="file" name="image">
                        <?php if($product->image){?>
                            <img id="main_preview" style="width: 12%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);" src="<?php echo base_url().'assets/uploads/products/main/'.$product->image ?>"/>
                        <?php }else{?>
                            <img id="main_preview" style="width: 12%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);display: none" src="#"/>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product URL<cite>*</cite></label>
                    <div class="col-sm-10">
                        <input <?php if(!empty($product->url_key)){?> disabled <?php }?> class="form-control" id="url_key" placeholder="Product URL" type="text" required name="genaral[url_key]" value="<?php echo $product->url_key ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="editor1" class="form-control textarea" name="genaral[description]"><?php echo $product->description ?></textarea>
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
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Code<cite>*</cite></label>
                    <div class="col-sm-10">
                        <input class="form-control" <?php if(!empty($product->product_code)){?> disabled <?php }?> id="product_code" type="text" required name="genaral[product_code]" value="<?php echo $product->product_code ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Qty<cite>*</cite></label>
                    <div class="col-sm-10">
                        <input class="form-control" id="qty" type="text" required name="genaral[qty]" value="<?php echo $product->qty?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Weight</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="price" type="text" name="genaral[weight]" value="<?php echo $product->weight?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Warranty</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="warranty" type="text" name="genaral[warranty]" value="<?php echo $product->warranty?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Days Return Policy</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="days_return_policy" type="text" name="genaral[days_return_policy]" value="<?php echo $product->days_return_policy?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Cash On Delivery</label>
                    <div class="col-sm-10">
                        <select name="genaral[cash_on_delivery]" class="form-control">
                            <option <?php if($product->cash_on_delivery==0){ echo 'selected'; }?> value="0">No</option>
                            <option <?php if($product->cash_on_delivery==1){ echo 'selected'; }?> value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <!--
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Special Price</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="special_price" type="text" name="genaral[special_price]" value="<?php /*echo $product->special_price*/?>">
                    </div>
                </div>-->
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Select Category</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Category" name="categories[]" >
                            <?php
                            $cu_properties=explode(',',$product->category);
                            if($categorylist):
                                foreach($categorylist as $cat):
                                    if(in_array($cat['category_id'],$cu_properties))
                                    {
                                        $class='selected';
                                    }
                                    else
                                    {
                                        $class='';
                                    }
                                    echo '<option value="'.$cat['category_id'].'" '.$class.'>'.$cat['category_name'].'</option>';
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>
                <?php
                $attribute_json = $product->attributes;
                $attribute_array = $this->app->getAttributeJson($attribute_json);
                //$attribute_array = json_decode($attribute_json,true);
                if(!empty($attribute_array))
                {
                    ?>
                        <?php
                        $attributes = $this->app->getAttributesFromSet($product->attribute_set_id);
                        $attributeData = $this->app->get_attribute_dataview($attributes);
                        /*echo '<pre>';
                        print_r($attributeData);
                        echo '</pre>';die;*/
                        $attribute_string = '';
                        $j=0;

                        foreach ($attributeData as $data)
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
                            elseif ($data->input_type == 'dropdown' || $data->input_type == 'Dropdown')
                            {
                                $attribute_string .= '<select class="form-control ui-wizard-content valid" name="attr[attribute_value][]" ' . $required . '>';
                                //$attribute_string .= '<option value="'.$attribute_value.'">'.$attribute_value.'</option>';

                                foreach ($attribute_options as $options)
                                {
                                    $optionValue = $options->option_value.'-'.$options->option_id;
                                    if($attribute_value==$optionValue){
                                        $dropChecked = "selected";
                                    }else{
                                        $dropChecked = "";
                                    }
                                    $attribute_string .= '<option '.$dropChecked.' value="'. $optionValue.'">' . $options->option_value . '</option>';
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
                            $attribute_string .= '<input type="hidden" name="attr[attribute_code][]" value="' . $data->attribute_code . '">';
                            $attribute_string .= '<input type="hidden" name="attr[layered_navigation][][" value="' . $data->layered_nav . '">';
                            $attribute_string .= '<input type="hidden" name="attr[advanced_search][]" value="' . $data->advanced_search . '">';
                            $attribute_string .= '<input type="hidden" name="attr[quick_search][]" value="' . $data->quick_search . '">';
                            $attribute_string .= '</div>
                            </div>';
                            $j++;
                        }
                        echo $attribute_string;
                        ?>
                    <?php
                }
                else
                {
                    echo $this->app->getAttributes($product->attribute_set_id);
                }
                ?>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Price</h3>
            </div>
            <div class="box-body">
                <?php
                foreach($this->app->getCurrencies() as $currency):
                    $priceData = $this->app->getCurrencyAmount($product->price_data,$currency['code']);
                   if(empty($priceData)){
                    ?>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $currency['code'] ?></label>
                        <div class="col-sm-10">
                            <input class="form-control" required id="price_<?php echo $currency['id'] ?>" placeholder="Price" name="price_data[price][]" type="text" />
                            <input class="form-control" id="special_price_<?php echo $currency['id'] ?>" placeholder="Special Price" name="price_data[special_price][]" style="margin-top: 7px;" type="text" />
                            <input type="hidden" name="price_data[currency_code][]" value="<?php echo $currency['code'] ?>">
                            <input type="hidden" name="price_data[currency_id][]" value="<?php echo $currency['id'] ?>">
                        </div>
                    </div>
                    <?php }else{
                       ?>
                       <div class="form-group">
                           <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $currency['code'] ?></label>
                           <div class="col-sm-10">
                               <input class="form-control" required id="price_<?php echo $currency['id'] ?>" placeholder="Price" value="<?php echo $priceData['price'] ?>" name="price_data[price][]" type="text" />
                               <input class="form-control" id="special_price_<?php echo $currency['id'] ?>" placeholder="Special Price" value="<?php echo $priceData['special_price'] ?>" name="price_data[special_price][]" style="margin-top: 7px;" type="text" />
                               <input type="hidden" name="price_data[currency_code][]" value="<?php echo $currency['code'] ?>">
                               <input type="hidden" name="price_data[currency_id][]" value="<?php echo $currency['id'] ?>">
                           </div>
                       </div>
                    <?php }?>
                <?php endforeach;?>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Specifications</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">
                        <button type="button" id="addSpecs" class="btn bg-olive margin">Add Specifications</button>
                    </label>
                    <div class="col-sm-10">
                        <div id="p_specs" style="position: relative;left: 1px;">
                            <?php if($speci){ foreach($speci as $sp):?>
                                <span>
                                <input type="hidden" value="<?php echo $sp->id;?>" name="speci[id][]" />
                                <input class="form-control" id="value4" placeholder="Value" name="speci[specification_name][]" style="float: left; position: relative;left: -1px; width: 349px;" value="<?php echo $sp->specification_name;?>" type="text" />
                                <input class="form-control" id="value3" placeholder="Value" name="speci[specification_value][]" style="float: left; position: relative;left: 9px; width: 352px;" value="<?php echo $sp->specification_value;?>" type="text" />
                                <button type="button" id="remScnt" onclick="remove_specific('<?php echo $sp->id;?>')" class="btn btn-info btn-danger" style="float: left; margin-left: 19px;">Remove</button>
                                <div style="clear: both; height: 11px;"></div>
                            </span>
                            <?php endforeach; } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Search Engine Optimisation</h3>
            </div>
            <div class="box-body">
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
            <?php if(!empty($product->config_attributes)): ?>
            <div class="box-header with-border">
                <h3 class="box-title">Configurable Product</h3>
            </div>
            <div class="box-body">
                <label for="inputEmail3" class="col-sm-2 control-label">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn bg-olive margin">Create Configuration</button>
                </label>
                <div class="form-group">
                    <div style="float: right;width: 81%;margin-right: 16px;">
                        <div class="box-body no-padding">
                            <?php
                            $table = $this->app->getConfigProductsByParent($product->product_id);
                            $attributesConfig = explode(',',$product->config_attributes);
                            $configAttribute = $this->app->getSelectedConfigAttributes($attributesConfig)
                            ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                   <!-- <th>Name</th>
                                    <th>SKU</th>-->
                                    <th>Price</th>
                                    <th>Special Price</th>
                                    <th>Stock</th>
                                    <th>Qty</th>
                                    <?php foreach($configAttribute as $conAttr): ?>
                                        <th><?php echo $conAttr->label ?></th>
                                    <?php endforeach; ?>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($table as $ConItem): ?>
                                <tr>
                                    <td><?php echo $ConItem->id ?></td>
                                    <td>
                                        <?php
                                            if($ConItem->default_image==''){
                                                echo '----';
                                            }else{
                                                echo '<div class="config_image"><img style="width: 100%;border: 1px solid #DDD;" src="'.base_url().'assets/uploads/products/main/'.$ConItem->default_image.'"></div>';
                                            }
                                        ?>
                                    </td>
                                    <!--<td>
                                        <?php
/*                                            if($ConItem->name==''){
                                                echo '----';
                                            }else{
                                                echo $ConItem->name;
                                            }
                                        */?>
                                    </td>
                                    <td>
                                        <?php
/*                                        if($ConItem->product_code==''){
                                            echo '----';
                                        }else{
                                            echo $ConItem->product_code;
                                        }
                                        */?>
                                    </td>-->
                                    <td>
                                        <?php
                                        $priceData = $app->getCurrencyAmount($ConItem->price_data,$main->getConfigValue('configurations/currency_setup/basecurrency'));
                                        if($priceData['price']==''){
                                            echo '----';
                                        }else{
                                            echo $main->getBaseCurrency($priceData['price']);
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($priceData['special_price']==''){
                                            echo '----';
                                        }else{
                                            echo $main->getBaseCurrency($priceData['special_price']);
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($ConItem->stock==0){
                                            echo 'Out of stock';
                                        }else{
                                            echo 'In stock';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($ConItem->qty==0){
                                            echo '----';
                                        }else{
                                            echo $ConItem->qty;
                                        }
                                        ?>
                                    </td>
                                    <?php
                                    $attributeInfo = json_decode($ConItem->attribute_info,true);
                                    foreach($attributeInfo as $conAttr){?>
                                        <?php
                                        echo '<td>'.$this->app->getOptionData($conAttr)->option_value.'</td>';
                                        ?>
                                    <?php } ?>
                                    <td>
                                        <a class="config_action" href="<?php echo base_url().'products/addConfigMediaImage/'.$ConItem->id?>">Add Media Image</a>
                                        <a class="config_action" href="<?php echo base_url().'products/editConfigProduct/'.$ConItem->id?>">Edit</a>
                                        <a class="config_action" onclick="return confirm('Are you sure want to delete?')" href="<?php echo base_url().'products/deleteConfigProduct/'.$ConItem->id.'/productid/'.$product->product_id?>">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="box-footer">
                <input type="submit" value="Save" name="sav" class="btn btn-info">
                <button type="submit" class="btn">Save and Continue Edit</button>
            </div>
        </div>
    </form>
</section>
<script type="text/javascript">
    $(function ()
    {
        CKEDITOR.replace('editor1');
    });
    function remove_specific(specif_id)
    {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() . 'index.php/products/delete_specific' ?>',
            data: 'id=' + specif_id,
            success: function (data)
            {
                $('#operator_code').val(data);
            }
        });
    }
</script>
<!-- Modal -->
<?php
if(!empty($product->config_attributes)):
    $data['product'] = $product;
    $data['app'] = $this->app;
    echo $this->app->createConfigTemplate($data);
 endif;
?>