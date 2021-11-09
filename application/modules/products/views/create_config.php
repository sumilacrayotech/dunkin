<script>
    $(document).ready(function (e)
    {
        $("#config_product_form").on('submit',(function(e)
        {
            e.preventDefault();
            $("#config_message").empty();
            $('#config_load').show();
            $.ajax
            ({
                url:'<?php echo base_url().'products/createConfigProduct' ?>',
                type: 'POST',
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    $('#config_load').hide();
                    $("#config_message").html(data);

                  window.setTimeout( function(){
                        window.location = "<?php echo base_url().'products/edit_product/'.$product->product_id ?>";
                    }, 100 );
                }
            });
        }));
    });
</script>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form class="form-horizontal" id="config_product_form" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create Simple Associated Product</h4>
                </div>
                <div class="modal-body">
                    <div id="config_message"></div>
                    <div class="box-body">
                        <input type="hidden" value="<?php echo $product->product_id ?>" name="parent_id">
                        <div style="clear: both;height: 10px;"></div>
                        <div class="form-group">
                            <label for="inputEmail3" style="padding: 0px;width: 110px;" class="col-sm-2 control-label">Qty<cite>*</cite></label>
                            <div class="col-sm-8">
                                <input class="form-control" id="qty" type="text" required name="qty" value="<?php echo $product->qty?>">
                            </div>
                        </div>
                        <div style="clear: both;height: 10px;"></div>
                        <?php foreach($this->app->getCurrencies() as $currency):
                            $priceData = $this->app->getCurrencyAmount($product->price_data,$currency['code']);
                            ?>
                        <div class="form-group">
                            <label for="inputEmail3" style="padding: 0px;width: 110px;" class="col-sm-2 control-label"><?php echo $currency['code'] ?><cite>*</cite></label>
                            <div class="col-sm-8">
                                <input class="form-control" required id="price_<?php echo $currency['id'] ?>" placeholder="Price" value="<?php echo $priceData['price'] ?>" name="price_data[price][]" type="text" />
                                <input class="form-control" id="special_price_<?php echo $currency['id'] ?>" placeholder="Special Price" value="<?php echo $priceData['special_price'] ?>" name="price_data[special_price][]" style="margin-top: 7px;" type="text" />
                                <input type="hidden" name="price_data[currency_code][]" value="<?php echo $currency['code'] ?>">
                                <input type="hidden" name="price_data[currency_id][]" value="<?php echo $currency['id'] ?>">
                            </div>
                        </div>
                        <div style="clear: both;height: 10px;"></div>
                        <?php endforeach; ?>
                        <!--<div class="form-group">
                            <label for="inputEmail3" style="padding: 0px;width: 110px;" class="col-sm-2 control-label">Special Price</label>
                            <div class="col-sm-8">
                                <input class="form-control" id="special_price" type="text" name="special_price" value="<?php /*echo $product->special_price*/?>">
                            </div>
                        </div>
                        <div style="clear: both;height: 10px;"></div>-->
                        <?php
                        $configAttrOptions = $this->app->getSelectedConfigAttributesWithOptions($product->config_attributes);
                        foreach($configAttrOptions as $configOpt):
                            ?>
                            <div class="form-group">
                                <label style="padding: 0px;width: 110px;" class="col-sm-2 control-label"><?php echo $configOpt['label'] ?> <?php if($configOpt['required']==1):?><cite>*</cite><?php endif;?></label>
                                <div class="col-sm-8">
                                    <select class="form-control valid" <?php if($configOpt['required']==1):?>required<?php endif;?> name="attribute_info[<?php echo $configOpt['attribute_code'] ?>]">
                                        <option value="">---Select Option---</option>
                                        <?php foreach($configOpt['options'] as $optionAttr): ?>
                                            <option value="<?php echo $optionAttr->option_id?>"><?php echo $optionAttr->option_value?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div style="clear: both;height: 10px;"></div>
                            <?php
                            $attribute_string  = '<input type="hidden" name="attribute_info['.$configOpt['attribute_code'].'][]" value="' . $configOpt['label'] . '">';
                            $attribute_string .= '<input type="hidden" name="attribute_info['.$configOpt['attribute_code'].'][]" value="' . $configOpt['attribute_id'] . '">';
                            $attribute_string .= '<input type="hidden" name="attribute_info['.$configOpt['attribute_code'].'][]" value="' . $configOpt['attribute_code'] . '">';
                            //echo $attribute_string;
                        endforeach;?>
                        <div class="form-group">
                            <label style="padding: 0px;width: 110px;" class="col-sm-2 control-label">Stock <cite>*</cite></label>
                            <div class="col-sm-8">
                                <select class="form-control valid" required name="stock">
                                    <option value="1">In Stock</option>
                                    <option value="0">Out of Stock</option>
                                </select>
                            </div>
                        </div>
                        <div style="clear: both;height: 10px;"></div>
                        <div class="form-group">
                            <label style="padding: 0px;width: 110px;" class="col-sm-2 control-label">Status <cite>*</cite></label>
                            <div class="col-sm-8">
                                <select class="form-control valid" required name="status">
                                    <option value="1" selected="">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="padding: 0px;width: 110px;" class="col-sm-2 control-label">Visibility <cite>*</cite></label>
                            <div class="col-sm-8">
                                <select class="form-control valid" required name="visibility">
                                    <option value="Not Visible">Not Visible</option>
                                    <option value="Catalog">Catalog</option>
                                </select>
                            </div>
                        </div>
                        <div style="clear: both;height: 10px;"></div>
                        <div class="form-group">
                            <label style="padding: 0px;width: 110px;" for="exampleInputFile">Main Image</label>
                            <input type="file" name="default_image" id="main_config">
                            <img id="main_config_preview" style="width: 40%;float: right;margin-right: 93px;border: 1px solid #ccc;display: none" src="#"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <img src="<?php echo $main->skin('images/loader.gif') ?>" id="config_load" style="width: 7%;margin-right: 10px;display: none">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>