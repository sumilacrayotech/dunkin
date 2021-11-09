<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Config Option
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Edit Config Option</a></li>
        </ol>
    </section>
    <script>
        $(document).ready(function (e)
        {
            $("#update_config_product").on('submit',(function(e)
            {
                e.preventDefault();
                $("#config_message").empty();
                $('#config_load').show();
                $.ajax
                ({
                    url:'<?php echo base_url().'products/editConfigProductAction' ?>',
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
                            window.location = "<?php echo base_url().'products/edit_product/'.$configProduct->parent_id ?>";
                        }, 100 );
                    }
                });
            }));
        });
    </script>
    <section class="content">
        <div class="box box-default">
            <div id="config_message"></div>
            <form method="POST" enctype="multipart/form-data" id="update_config_product" action="">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" value="<?php echo $configProduct->name ?>" class="form-control" id="name" name="name">
                                <input type="hidden" value="<?php echo $configProduct->id ?>" name="id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Qty</label>
                                <input type="text" required value="<?php echo $configProduct->qty ?>" class="form-control" id="qty" name="qty">
                            </div>
                            <div class="form-group">
                                <label>Stock <cite>*</cite></label>
                                <select class="form-control valid" required name="stock">
                                    <option <?php if($configProduct->stock==1){?>selected<?php }?> value="1">In Stock</option>
                                    <option <?php if($configProduct->stock==0){?>selected<?php }?> value="0">Out of Stock</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Visibility <cite>*</cite></label>
                                <select class="form-control valid" required name="visibility">
                                    <option <?php if($configProduct->visibility=='Not Visible'){?>selected<?php }?> value="Not Visible">Not Visible</option>
                                    <option <?php if($configProduct->visibility=='Catalog'){?>selected<?php }?> value="Catalog">Catalog</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status <cite>*</cite></label>
                                <select class="form-control valid" required name="status">
                                    <option <?php if($configProduct->status==1){?>selected<?php }?> value="1">Enable</option>
                                    <option <?php if($configProduct->status==0){?>selected<?php }?> value="0">Disable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Main Image</label>
                                <input type="file" name="default_image" id="main_config">
                                <img id="main_config_preview" style="width: 40%; float: left; margin-top: 15px; border: 1px solid rgb(204, 204, 204);display: none" src="#"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php foreach($app->getCurrencies() as $currency):
                                $priceData = $app->getCurrencyAmount($configProduct->price_data,$currency['code']);
                                ?>
                                <div class="form-group">
                                    <label for="inputEmail3" style="padding: 0px;width: 110px;" class="col-sm-2 control-label"><?php echo $currency['code'] ?><cite>*</cite></label>
                                    <div>
                                        <input class="form-control" required id="price_<?php echo $currency['id'] ?>" placeholder="Price" value="<?php echo $priceData['price'] ?>" name="price_data[price][]" type="text" />
                                        <input class="form-control" id="special_price_<?php echo $currency['id'] ?>" placeholder="Special Price" value="<?php echo $priceData['special_price'] ?>" name="price_data[special_price][]" style="margin-top: 7px;" type="text" />
                                        <input type="hidden" name="price_data[currency_code][]" value="<?php echo $currency['code'] ?>">
                                        <input type="hidden" name="price_data[currency_id][]" value="<?php echo $currency['id'] ?>">
                                    </div>
                                </div>
                                <div style="clear: both;height: 10px;"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button type="submit" style="float: left;width: 13%;" class="btn btn-block btn-primary">Save Changes</button>
                    <img src="<?php echo $main->skin('images/loader.gif') ?>" id="config_load" style="width: 3%;margin-left: 14px;display: none;">
                </div>
            </form>
        </div>
    </section>
</div>