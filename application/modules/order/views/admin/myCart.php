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
                        <h3 class="box-title">Cart</h3>
                    </div>
                    <?php $cart = $this->cart->contents();?>
                    <div class="box-body" id="mycart_wrapper">
                        <?php if(count($cart)!=0) {
                            echo form_open('order/updateCart');
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 115px;">
                                        Items (Product)
                                    </th>
                                    <th style="width: 300px;text-align: center">Options</th>
                                    <th style="width: 400px;text-align: center">
                                        Product name
                                    </th>
                                    <th style="width: 160px;text-align: center">
                                        Product Code
                                    </th>
                                    <th style="width: 150px;text-align: center">
                                        Product Code
                                    </th>
                                    <th style="text-align: center">Qty</th>
                                    <th style="text-align: center">Totals</th>
                                    <th style="text-align: center">Delete</th>
                                </tr>
                                <?php
                                foreach($cart as $item):?>
                                    <?php
                                   /* echo '<pre>';
                                    print_r($item);*/
                                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                    $_product = $app->getProduct($item['id']);
                                    ?>
                                <tr>
                                    <td>
                                        <?php if($_product->image){?>
                                            <img id="main_preview" style="width: 100%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);" src="<?php echo base_url().'assets/uploads/products/main/'.$_product->image ?>"/>
                                        <?php }else{?>
                                            <img id="main_preview" style="width: 100%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);" src="<?php echo $main->skin('images/NoImageAvailable.png') ?>"/>
                                        <?php }?>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <?php
                                        if($item['options']){
                                            echo '<table class="table table-bordered" style="width: 50%;margin: auto;">';
                                            foreach($item['options'] as $attrCode => $option){
                                                echo ' <tr>
                                                            <th style="text-align: center">'.$app->getAttributeDataByCode($attrCode,'label').'</th>
                                                            <td style="text-align: center">'.$app->getOptionValue($option).'</td>
                                                        </tr>
                                                      ';
                                            }
                                            echo  '</table>';
                                        }else{
                                            echo 'No Option selected';
                                        }
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <?php echo $item['name'] ?>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <?php echo $_product->product_code ?>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <?php echo $main->getBaseCurrency($item['price']) ?>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;width: 11%">
                                        <div style="margin: auto;width: 87%;">
                                            <div class="qty_plus" style="float: left;">
                                                <a href="javascript:void(0)" class="sub btn btn-info btn-flat" onclick="qty_update<?php echo $item['id'] ?>('less')">-</a>
                                            </div>
                                            <?php
                                            $qty = $item['qty'];
                                            ?>
                                            <input style="width: 46%;float: left;text-align: center;margin: 0px 5px 0px 5px;" type="text" id="qty_change_<?php echo $item['id'];?>" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $qty;?>" class="form-control">
                                            <script type="text/javascript">
                                                var qty_inc<?php echo $item['id'] ?> = <?php echo $item['qty'] ?>;
                                                function qty_update<?php echo $item['id'] ?>(type_c)
                                                {
                                                    if(type_c=='add')
                                                    {
                                                        $('#qty_loader<?php echo $item['id'];?>').show();
                                                        qty_inc<?php echo $item['id'] ?>++;
                                                        $("#qty_change_<?php echo $item['id'];?>").val(qty_inc<?php echo $item['id'] ?>);
                                                    }
                                                    else
                                                    {
                                                        $('#qty_loader<?php echo $item['id'];?>').show();
                                                        qty_inc<?php echo $item['id'] ?>--;
                                                        $("#qty_change_<?php echo $item['id'];?>").val(qty_inc<?php echo $item['id'] ?>);
                                                    }

                                                    var qty<?php echo $item['id'];?> =$("#qty_change_<?php echo $item['id'];?>").val();
                                                    $.ajax({
                                                        type:"POST",
                                                        url:'<?php echo base_url('order/qtyUpdate')?>',
                                                        data: {'qty':qty<?php echo $item['id'];?>,'rid':'<?php echo $item['rowid'] ?>'},//only input
                                                        success: function(response)
                                                        {
                                                            $('#qty_loader<?php echo $item['id'];?>').hide();
                                                            $("#mycart_wrapper").load(location.href + " #mycart_wrapper");
                                                        }
                                                    });
                                                }
                                            </script>
                                            <div class="qty_minus" style="float: left;">
                                                <a href="javascript:void(0)" class="add btn btn-info btn-flat" id="qty_inc" onclick="qty_update<?php echo $item['id'] ?>('add')">+</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <?php echo $main->getBaseCurrency($item['subtotal']) ?>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <a href="http://php72.cerebel.com/crayotech-multistore/brands">
                                            <i style="font-size: 26px;" class="fa  fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    $pri = $item['subtotal'];
                                    $grand_total = $grand_total + $pri;
                                endforeach; ?>
                            </table>
                        <?php
                            echo form_close();
                        }else{?>
                            <p>You have no items in your shopping cart.</p>
                        <?php }?>
                        <div style="float: right;width: 30%;">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th>Sub Total</th>
                                    <th>
                                        <?php
                                            $sub_total = $grand_total;
                                            echo $main->getBaseCurrency($sub_total)
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Grand Total</th>
                                    <th><?php echo $main->getBaseCurrency($sub_total) ?></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a class="btn btn-block btn-info" style="float: right;width: 10%;" href="<?php echo base_url('order/checkout') ?>">Going To Checkout (<?php echo count($this->cart->contents()) ?>)</a>
        </div>
    </section>
</div>