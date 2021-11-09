<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Shopping Cart</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
    <div class="section">
        <div class="container">
            <div id="message"><?php echo $message_like ?></div>
            <?php if(!empty($cartData)){ ?>
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="bg_whitediv">
                        <div class="table-responsive shop_cart_table">
                            <?php echo form_open('checkout/updateCart');?>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $grand_total = [];
                                foreach($cartData as $item):
                                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                    ?>
                                <tr>
                                    <td class="product-thumbnail"><a href="<?php echo $item['product_url'] ?>"><img src="<?php echo $item['image'] ?>" alt="<?php echo $item['name'] ?>"></a></td>
                                    <td class="product-name" data-title="Product"><a href="<?php echo $item['product_url'] ?>"><?php echo $item['name'] ?></a></td>
                                    <td class="product-price" data-title="Price"><?php echo $main->getCurrentCurrencyPrice($item['price']) ?></td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity">
                                            <input type="button" value="-" onclick="qty_update<?php echo $item['id'] ?>('less')" class="minus">
                                            <input type="text" id="qty_change_<?php echo $item['id'];?>" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'] ?>" title="Qty" class="qty" size="4">
                                            <script type="text/javascript">
                                                var qty_inc<?php echo $item['id'] ?> = <?php echo $item['qty'] ?>;
                                                function qty_update<?php echo $item['id'] ?>(type_c)
                                                {
                                                    if(type_c=='add')
                                                    {
                                                        $('#qty_loader').show();
                                                        qty_inc<?php echo $item['id'] ?>++;
                                                        $("#qty_change_<?php echo $item['id'];?>").val(qty_inc<?php echo $item['id'] ?>);
                                                    }
                                                    else
                                                    {
                                                        $('#qty_loader').show();
                                                        qty_inc<?php echo $item['id'] ?>--;
                                                        $("#qty_change_<?php echo $item['id'];?>").val(qty_inc<?php echo $item['id'] ?>);
                                                    }

                                                    var qty<?php echo $item['id'];?> =$("#qty_change_<?php echo $item['id'];?>").val();
                                                    $.ajax({
                                                        type:"POST",
                                                        url:'<?php echo base_url('checkout/qtyUpdate')?>',
                                                        data: {'qty':qty<?php echo $item['id'];?>,'rid':'<?php echo $item['rowid'] ?>'},//only input
                                                        success: function(response)
                                                        {
                                                            $('#qty_loader').hide();
                                                            $("#mycart_wrapper").load(location.href + " #mycart_wrapper_load");
                                                        }
                                                    });
                                                }
                                            </script>
                                            <input type="button" value="+" onclick="qty_update<?php echo $item['id'] ?>('add')" class="plus">
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total"><?php echo $main->getCurrentCurrencyPrice($item['subtotal']) ?></td>
                                    <td class="product-remove" data-title="Remove"><a onclick="return confirm('Are you sure you would like to remove this item from the shopping cart?')" href="<?php echo base_url() ?>checkout/removeItem/<?php echo $item['rowid']?>"><i class="ti-close"></i></a></td>
                                </tr>
                                <?php
                                $grand_total[] = $item['subtotal'];
                                endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" class="px-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                &nbsp;
                                            </div>
                                            <div class="col-lg-8 col-md-6 text-left text-md-right">
                                                <img style="width:6%;display: none" id="qty_loader" src="<?php echo $main->skinFront('images/cart.svg') ?>">
                                                <button class="btn btn-line-fill btn-sm" type="submit">Update Cart</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="bg_whitediv">
                        <div class="borderf p-31 p-md-41">
                            <div class="heading_s1 mb-3">
                                <h6>Order Summary</h6>
                            </div>
                            <div class="row no-gutters align-items-center" style="margin-bottom: 12px;">
                                <div class="col-lg-12 col-md-6 mb-3 mb-md-0">
                                    <div class="coupon field_form input-group">
                                        <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                        <div class="input-group-append">
                                            <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" id="mycart_wrapper">
                                <table class="table" id="mycart_wrapper_load">
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">Cart Subtotal</td>
                                        <td class="cart_total_amount"><?php echo $main->getCurrentCurrencyPrice(array_sum($grand_total)) ?></td>
                                    </tr>
                                    <!--<tr>
                                        <td class="cart_total_label">Discount</td>
                                        <td class="cart_total_amount">SAR40.10</td>
                                    </tr>-->
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <td class="cart_total_amount"><strong><?php echo $main->getCurrentCurrencyPrice(array_sum($grand_total)) ?></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="<?php echo base_url('checkout/index') ?>" class="btn btn-fill-out">Proceed To CheckOut</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }else{?>
            <div class="row">
                <div class="col-md-4 col-12">
                    <p>You have no items in your shopping cart.</p>
                    <p>Click <a href="<?php echo base_url() ?>">here</a> to continue shopping.</p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>