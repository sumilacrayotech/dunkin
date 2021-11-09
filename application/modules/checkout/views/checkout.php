<!-- START SECTION BREADCRUMB -->
<style>
    .error {
        color: red;
        font-size: 12px;
    }
    .selected{
        position: absolute;top: 6px;right: 6px;color: #fff;font-size: 14px;background: #eb4494;padding: 7px;
    }
</style>
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="bg_whitediv">
                <div class="row">
                    <?php echo $loginForm ?>
                    <?php echo $coupon ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="bg_whitediv">
                        <div class="heading_s1">
                            <ul class="nav nav-tabs" role="tablist" id="order_step">
                                <?php if($tab==''){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link active activedone" id="Shipping-tab" data-toggle="tab" href="#Shipping" role="tab" aria-controls="Description" aria-selected="true"><i class="fas fa-address-card"></i> Address Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"><i class="fas fa-truck"></i> Shipping Methods</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"><i class="fas fa-credit-card" aria-hidden="true"></i> Payment Options</a>
                                    </li>
                                <?php }?>
                                <?php if($tab=='shippingMethods'){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('checkout/index') ?>"><i class="fas fa-address-card"></i> Address Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active activedone" id="Shipping-method-tab" data-toggle="tab" href="#Shipping-method" role="tab" aria-controls="ShippingMethod" aria-selected="true"><i class="fas fa-truck"></i> Shipping Methods</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"><i class="fas fa-credit-card" aria-hidden="true"></i> Payment Options</a>
                                    </li>
                                <?php }?>
                                <?php if($tab=='payment'){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('checkout/index') ?>"><i class="fas fa-address-card"></i> Address Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('checkout/index/shippingMethods') ?>"><i class="fas fa-truck"></i> Shipping Methods</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active activedone" id="Payment-tab" data-toggle="tab" href="#Payment" role="tab" aria-controls="Additional-info" aria-selected="true"><i class="fas fa-credit-card" aria-hidden="true"></i> Payment Options</a>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                        <div class="tab-content shop_info_tab">
                            <?php if($tab==''){ ?>
                            <div class="tab-pane fade active show" id="Shipping" role="tabpanel" aria-labelledby="Shipping-tab">
                                <b>SHIPPING ADDRESS</b>
                                <div class="row" style="margin: 0px;">
                                    <?php foreach($customerAddress as $address){?>
                                    <div class="col-md-4 chk-making-radio" id="shipping_address_load_show">
                                        <?php
                                        $loopShippingAddress = (array) $address;
                                        $arraysAreEqualAddress = $app->array_equal($loopShippingAddress, (array) $this->session->userdata('shippingAddressData'));

                                        if($arraysAreEqualAddress==true){
                                            $border = 'border: 2px solid #EB4494;';
                                        }else{
                                            $border ='';
                                        }
                                        ?>
                                        <div id="<?php echo $address->id?>_select_address" onclick="selectAddress(<?php echo $address->id?>)" class="adding-address-box address-box3" style="text-align: left;padding: 14px;height: 245px;<?php echo $border?>">
                                            <address>
                                                <?php echo ucfirst($address->first_name) ?> <?php echo ucfirst($address->last_name) ?><br/>
                                                <?php echo ucfirst($address->address) ?><br/>
                                                <?php echo ucfirst($address->state) ?><br/>
                                                <?php echo ucfirst($address->city) ?><br/>
                                                <?php echo ucfirst($address->zip_code) ?><br/>
                                                <?php echo ucfirst($main->getCountryNameByCode($address->country_code)) ?><br/>
                                                T: <?php echo ucfirst($address->phone_number) ?>
                                            </address>
                                            <?php
                                            if($arraysAreEqualAddress==true){
                                                $selectIconShow = 'style="display: block"';
                                            }else{
                                                $selectIconShow = 'style="display: none"';
                                            }
                                            ?>
                                            <i id="select_<?php echo $address->id?>" <?php echo $selectIconShow ?> class="fa fa-check selected unSelect" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if(empty($shippingAddressDataNew)){?>
                                    <div class="col-md-4 chk-making-radio" id="add_address_shipping">
                                        <div class="adding-address-box address-box3" style="height: 245px;" data-toggle="modal" data-target="#exampleModal">
                                            <div class="add-plus-class" id="add_sh_address">
                                                <div class="add-plus-img">
                                                    <button type="button" data-country-code="IN" class="delivery-add-new" data-address-type="checkout-del">
                                                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <div class="add-plus-title">
                                                    <span class="checkout-address-title"><b>ADD NEW ADDRESS</b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }else{?>
                                    <div class="col-md-4 chk-making-radio" id="shipping_address_load_show">
                                        <?php
                                        $loopShippingAddress = (array) $shippingAddressDataNew;
                                        $arraysAreEqualAddress = $app->array_equal($loopShippingAddress, (array) $this->session->userdata('shippingAddressData'));

                                        if($arraysAreEqualAddress==true){
                                            $border = 'border: 2px solid #EB4494;';
                                        }else{
                                            $border ='';
                                        }
                                        ?>
                                        <div id="0_select_address" class="adding-address-box address-box3" data-toggle="modal" data-target="#exampleModal" style="text-align: left;padding: 14px;height: 245px;<?php echo $border?>">
                                            <address>
                                                <?php echo ucfirst($shippingAddressDataNew->first_name) ?> <?php echo ucfirst($shippingAddressDataNew->last_name) ?><br/>
                                                <?php echo ucfirst($shippingAddressDataNew->address) ?><br/>
                                                <?php echo ucfirst($shippingAddressDataNew->state) ?><br/>
                                                <?php echo ucfirst($shippingAddressDataNew->city) ?><br/>
                                                <?php echo ucfirst($shippingAddressDataNew->zip_code) ?><br/>
                                                <?php echo ucfirst($main->getCountryNameByCode($shippingAddressDataNew->country_code)) ?><br/>
                                                T: <?php echo ucfirst($shippingAddressDataNew->phone_number) ?>
                                            </address>
                                            <?php
                                            if($arraysAreEqualAddress==true){
                                                $selectIconShow = 'style="display: block"';
                                            }else{
                                                $selectIconShow = 'style="display: none"';
                                            }
                                            ?>
                                            <i id="select_0" <?php echo $selectIconShow ?> class="fa fa-check selected unSelect" aria-hidden="true"></i>
                                            <a href="javascript:void(0)" data-country-code="IN" data-address-type="checkout-del" class="btn btn-fill-out" style="color: #FFF;padding: 2px 10px 2px 10px;float: right;">Edit</a>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                                <br>
                                <div class="form-check">
                                    <?php
                                    $shippingAddressCheck = (array) $shippingAddressData;
                                    $billingAddressCheck = (array) $billingAddressData;
                                    unset($shippingAddressCheck['save_address']);
                                    $arraysAreEqual = $app->array_equal($shippingAddressCheck, $billingAddressCheck);
                                    ?>
                                    <input <?php if($arraysAreEqual==true){?>checked<?php }?> class="form-check-input" type="checkbox" value="" onclick="AddressSameAs()" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked" style="margin-top: 3px;">
                                        My billing address is the same as my delivery address
                                    </label>
                                </div>
                                <br><br>
                                <?php echo $billingAddressForm ?>
                            </div>
                            <?php }?>
                            <?php if($tab=='shippingMethods'){ ?>
                            <div class="tab-pane fade active show" id="Shipping-method" role="tabpanel" aria-labelledby="Shipping-method-tab">
                                <b>SHIPPING METHODS</b>
                                <div class="payment_option">
                                    <br>
                                    <?php
                                    $s=0;
                                    foreach($shippingMethods as $shippingMethod):

                                        if(empty($shippingSelected)){
                                            if($s==0){
                                                $checked = 'checked';
                                                ?>
                                                <script>
                                                    orderTotalFromShipping(<?php echo $shippingMethod->shipping_id?>)
                                                </script>
                                            <?php
                                            }else{
                                                $checked = '';
                                            }

                                        }else{

                                            if($shippingSelected['title']==$shippingMethod->shipping_title){
                                                $checked = 'checked';
                                            }else{
                                                $checked = '';
                                            }
                                        }
                                        ?>
                                        <div class="custome-radio">
                                            <input <?php echo $checked ?> class="form-check-input" id="exampleRadios<?php echo $s ?>" onclick="orderTotalFromShipping(<?php echo $shippingMethod->shipping_id?>)" type="radio" name="shipping_method"  value="<?php echo $shippingMethod->shipping_id?>">
                                            <label class="form-check-label" for="exampleRadios<?php echo $s ?>"><?php echo $shippingMethod->shipping_title?></label>
                                        </div>
                                    <?php
                                        $s++;
                                    endforeach; ?>
                                </div>
                                <a href="<?php echo base_url('checkout/index/payment') ?>" class="btn btn-fill-out" style="color: #FFF;">Next</a>
                            </div>
                            <?php }?>
                            <?php if($tab=='payment'){ ?>
                            <div class="tab-pane fade fade active show" id="Payment" role="tabpanel" aria-labelledby="Payment">
                                <b> PAYMENT OPTIONS</b>
                                <br>
                                <br>
                                <div class="payment_option">
                                    <?php
                                    $p=0;
                                    foreach($paymentMethods as $paymentMethod):

                                        if(empty($paymentSelected)){

                                            if($p==0){
                                                $checkedP = 'checked';
                                                ?>
                                                <script>
                                                    orderTotalFromPayment(<?php echo $paymentMethod->payment_id?>)
                                                </script>
                                            <?php
                                            }else{
                                                $checkedP = '';
                                            }

                                        }else{

                                            if($paymentSelected['title']==$paymentMethod->payment_title){
                                                $checkedP = 'checked';
                                            }else{
                                                $checkedP = '';
                                            }
                                        }
                                        ?>
                                        <div class="custome-radio">
                                            <input onclick="orderTotalFromPayment(<?php echo $paymentMethod->payment_id?>)" <?php echo $checkedP ?> class="form-check-input" type="radio" name="payment_method" id="exampleRadios<?php echo $p ?>" value="<?php echo $paymentMethod->payment_id?>">
                                            <label class="form-check-label" for="exampleRadios<?php echo $p ?>"><?php echo $paymentMethod->payment_title?></label>
                                            <p data-method="<?php echo $paymentMethod->payment_id?>" class="payment-text"></p>
                                        </div>
                                    <?php
                                    $p++;
                                    endforeach; ?>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg_whitediv">
                        <div class="order_review1">
                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table" id="orderTotalAreaShow">
                                <table class="table" id="orderTotalAreaLoad">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $grand_total = [];
                                    foreach($cartData as $item):
                                    ?>
                                    <tr>
                                        <td><?php echo $item['name'] ?><span class="product-qty">x <?php echo $item['qty'] ?></span></td>
                                        <td><?php echo $main->getCurrentCurrencyPrice($item['subtotal']) ?></td>
                                    </tr>
                                    <?php
                                    $grand_total[] = $item['subtotal'];
                                    endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal"><?php echo $main->getCurrentCurrencyPrice(array_sum($grand_total)) ?></td>
                                    </tr>
                                    <?php if(!empty($shippingSelected)): ?>
                                    <tr>
                                        <th>Shipping(<?php echo $shippingSelected['title'] ?>)</th>
                                        <td class="product-subtotal"><?php echo $main->getCurrentCurrencyPrice($shippingSelected['amount']) ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal"><?php echo $main->getCurrentCurrencyPrice(array_sum($grand_total)+$shippingSelected['amount']) ?></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <?php if($tab=='payment'){ ?>
                            <a href="<?php echo base_url('checkout/orderPlace') ?>" class="btn btn-fill-out btn-block">Place Order</a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $shippingAddressForm ?>
</div>