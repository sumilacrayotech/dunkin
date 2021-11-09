<style>
    #field1 {
        width: 59%;
        float: left;
        margin-top: 15px;
    }
    .cartLoader {
        width: 40%;
        float: right;
        margin: 20px 0px 0px 0px;
        display: none;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Order
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Create Order</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Select Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <?php if($message_like): ?>
                    <div class="alert alert-success alert-dismissible" style="margin: 13px;padding-bottom: 4px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4 style="font-size: 15px;"><i class="icon fa fa-check"></i><?php echo $message_like ?></h4>
                    </div>
                    <?php endif; ?>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 115px;">
                                    ID
                                    <div class="input-group margin" style="margin: 0px">
                                        <input type="text" name="product_id" class="form-control">
                                        <span class="input-group-btn">
                                          <button type="button" class="btn btn-info btn-flat">Go!</button>
                                        </span>
                                    </div>
                                </th>
                                <th style="width: 168px;">Image</th>
                                <th style="width: 400px;">
                                    Product
                                    <div class="input-group margin" style="margin: 0px">
                                        <input type="text" name="product_name" class="form-control">
                                        <span class="input-group-btn">
                                          <button type="button" class="btn btn-info btn-flat">Go!</button>
                                        </span>
                                    </div>
                                </th>
                                <th style="width: 300px;">
                                    Product Code
                                    <div class="input-group margin" style="margin: 0px">
                                        <input type="text" name="product_code" class="form-control">
                                        <span class="input-group-btn">
                                          <button type="button" class="btn btn-info btn-flat">Go!</button>
                                        </span>
                                    </div>
                                </th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Special Price</th>
                                <th>Qty</th>
                            </tr>
                            <?php
                            $i=0; foreach($productCollection as $_product): $i++; ?>
                            <tr>
                                <td>
                                    <?php echo $_product->product_id ?>
                                    

                                </td>
                                <td>
                                    <?php if($_product->image){?>
                                        <img id="main_preview" style="width: 100%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);" src="<?php echo base_url().'assets/uploads/products/main/'.$_product->image ?>"/>
                                    <?php }else{?>
                                        <img id="main_preview" style="width: 100%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);" src="<?php echo $main->skin('images/NoImageAvailable.png') ?>"/>
                                    <?php }?>
                                </td>
                                <td>
                                    <strong><?php echo $_product->product_name; ?></strong>
                                    <?php $configProduct = $app->getConfigurationProduct($_product->product_id);?>
                                    <form id="admin_add_to_cart" method="POST" action="<?php if($configProduct){echo base_url('order/addToCart');}else{echo base_url('order/simpleAddToCart'); }?>">
                                        <input type="hidden" name="product_id" value="<?php echo $_product->product_id ?>">
                                        <input type="hidden" name="product_name" value="<?php echo $_product->product_name ?>">
                                        <div style="clear: both"></div>
                                            <?php
                                            if(!empty($configProduct)):
                                                $i = 0;
                                                foreach($configProduct as $attributeCode => $optionIds):
                                                    $i++;
                                                    ?>
                                                    <?php if($i==1){?>
                                                    <div class="form-group">
                                                        <label><?php echo $app->getAttributeDataByCode($attributeCode,'label') ?></label>
                                                        <select required <?php if($i==1):?>onchange="combinationCheck(this,<?php echo $_product->product_id ?>,<?php echo $attributeCode ?>)"<?php endif;?> id="<?php echo $attributeCode ?>" class="form-control" name="config[<?php echo $attributeCode ?>]">
                                                            <option value="">---Select Option---</option>
                                                            <?php foreach($app->getAttributesOption($optionIds) as $options){?>
                                                                <option value="<?php echo $options->value ?>"><?php echo $options->text ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <?php }else{?>
                                                    <div class="form-group display">
                                                        <label><?php echo $app->getAttributeDataByCode($attributeCode,'label') ?></label>
                                                        <select <?php if($i==1):?>onchange="combinationCheck(this,<?php echo $_product->product_id ?>,<?php echo $attributeCode ?>)"<?php endif;?> id="<?php echo $attributeCode ?>" class="form-control">
                                                            <option value="">---Select Option---</option>
                                                        </select>
                                                    </div>
                                                    <?php }?>
                                                    <?php
                                                endforeach;
                                            endif; ?>
                                            <div id="config_options">
                                            </div>
                                        <div id="field1">
                                            <button type="button" style="float: left;" id="sub" class="sub btn btn-info btn-flat">-</button>
                                            <input type="text" name="qty" style="width: 22%;float: left;text-align: center;margin: 0px 5px 0px 5px;" class="form-control" id="1" value="1" min="1" max="3">
                                            <button type="button" id="add" class="add btn btn-info btn-flat">+</button>
                                            <button type="submit" style="float: right;width: 40%;" class="btn btn-block btn-primary">Add to cart</button>
                                        </div>
                                        <img class="cartLoader" src="<?php echo $main->skin('images/103.gif') ?>">
                                    </form>
                                </td>
                                <td>
                                    <?php echo $_product->product_code ?>
                                </td>
                                <td>
                                    <?php echo $main->ProductStatus($_product->status)?>
                                </td>
                                <td>
                                    <?php                                     
                                    $m=$i-1;                                   
                                    echo $main->getBaseCurrency($_product->price);
                                    ?>
                                   <?php  echo $dbselectedcode[$m][1].$dbselectedprice[$m][1];?> 
                                   <?php  echo $dbselectedcode[$m][2].$dbselectedprice[$m][2];?> 
                                   <?php  echo $dbselectedcode[$m][3].$dbselectedprice[$m][3];?> 
                                   <?php  echo $dbselectedcode[$m][4].$dbselectedprice[$m][4];?> 
                                   <?php  echo $dbselectedcode[$m][5].$dbselectedprice[$m][5];?> 
                                   <?php  echo $dbselectedcode[$m][6].$dbselectedprice[$m][6];?> 
                                  </td>
                                <td>
                                    <?php echo $main->getBaseCurrency($_product->special_price);?>
                                   <?php  echo $dbselectedcode[$m][1].$dbselectedspecialprice[$m][1];?> 
                                   <?php  echo $dbselectedcode[$m][2].$dbselectedspecialprice[$m][2];?> 
                                   <?php  echo $dbselectedcode[$m][3].$dbselectedspecialprice[$m][3];?> 
                                   <?php  echo $dbselectedcode[$m][4].$dbselectedspecialprice[$m][4];?> 
                                   <?php  echo $dbselectedcode[$m][5].$dbselectedspecialprice[$m][5];?> 
                                   <?php  echo $dbselectedcode[$m][6].$dbselectedspecialprice[$m][6];?>
                                </td>
                                <td>
                                    <?php echo $_product->qty ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-block btn-info" style="float: right;width: 8%;" href="<?php echo base_url('order/myCart') ?>">Going To Cart (<?php echo count($this->cart->contents()) ?>)</a>
        </div>
    </section>
</div>