<style>
    .flat-red {
        left: 1px !important;
    }
    .error {
        color: red;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Checkout
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('order/myCart') ?>">Cart</a></li>
            <li class="active">Checkout</li>
        </ol>
    </section>
    <section class="content">
        <form method="POST" id="admin_place_order" action="<?php echo base_url('order/orderPlace')?>">
            <div class="row" style="background-color: #FFF;padding-top: 22px;margin: 1px;">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shipping Address</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="shipping_customer_email">Email *</label>
                                <input type="email" required name="shipping_customer_email" class="form-control" id="shipping_customer_email">
                            </div>
                            <div class="form-group">
                                <label for="shipping_customer_name">Name *</label>
                                <input type="text" required class="form-control" name="shipping_customer_name" id="shipping_customer_name">
                            </div>
                            <div class="form-group">
                                <label for="shipping_phone_number">Phone Number *</label>
                                <input type="text" required name="shipping_phone_number" class="form-control" id="shipping_phone_number">
                            </div>
                            <div class="form-group">
                                <label for="shipping_address">Address *</label>
                                <textarea required name="shipping_address" id="shipping_address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="shipping_country">Country *</label>
                                <?php
                                $countries = $app->getAllowedCountries();
                                ?>
                                <select required class="form-control" name="shipping_country" id="shipping_country">
                                    <option value="">---Select Country---</option>
                                    <?php foreach($countries as $country): ?>
                                        <option value="<?php echo $country['code'] ?>"><?php echo $country['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="shipping_city">City *</label>
                                <input required type="text" name="shipping_city" class="form-control" id="shipping_city">
                            </div>
                            <div class="form-group">
                                <label for="shipping_state">State *</label>
                                <input required type="text" name="shipping_state" class="form-control" id="shipping_state">
                            </div>
                            <div class="form-group">
                                <label for="shipping_zip_code">Zip Code *</label>
                                <input required type="text" name="shipping_zip_code" class="form-control" id="shipping_zip_code">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input onclick="AddressSameAs()" name="address_same_as" id="address_same_as" type="checkbox"> Shipping address same as billing address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shipping Method</h3>
                        </div>
                        <table class="table table-bordered" style="width: 100%;">
                            <?php foreach($shippingMethods as $shippingMethod): ?>
                                <tr>
                                    <th style="text-align: center;width: 50%;"><?php echo $shippingMethod->shipping_title?></th>
                                    <td style="text-align: center">
                                        <input required type="radio" onclick="orderTotalFromShipping(<?php echo $shippingMethod->shipping_id?>)" name="shipping_method" value="<?php echo $shippingMethod->shipping_id?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Payment Method</h3>
                        </div>
                        <table class="table table-bordered" style="width: 100%;">
                            <?php foreach($paymentMethods as $paymentMethod): ?>
                                <tr>
                                    <th style="text-align: center;width: 50%;"><?php echo $paymentMethod->payment_title?></th>
                                    <td style="text-align: center">
                                        <input required type="radio" name="payment_method" value="<?php echo $paymentMethod->payment_id?>">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Billing Address</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="shipping_customer_email">Email *</label>
                                <input required type="email" name="billing_customer_email" class="form-control" id="billing_customer_email">
                            </div>
                            <div class="form-group">
                                <label for="shipping_customer_name">Name *</label>
                                <input required type="text" class="form-control" name="billing_customer_name" id="billing_customer_name">
                            </div>
                            <div class="form-group">
                                <label for="shipping_phone_number">Phone Number *</label>
                                <input required type="text" name="billing_phone_number" class="form-control" id="billing_phone_number">
                            </div>
                            <div class="form-group">
                                <label for="shipping_address">Address *</label>
                                <textarea required name="billing_address" id="billing_address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="shipping_country">Country *</label>
                                <select required class="form-control" name="billing_country" id="billing_country">
                                    <option value="">---Select Country---</option>
                                    <?php foreach($countries as $country): ?>
                                        <option value="<?php echo $country['code'] ?>"><?php echo $country['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="shipping_city">City *</label>
                                <input required type="text" name="billing_city" class="form-control" id="billing_city">
                            </div>
                            <div class="form-group">
                                <label for="shipping_state">State *</label>
                                <input required type="text" name="billing_state" class="form-control" id="billing_state">
                            </div>
                            <div class="form-group">
                                <label for="shipping_zip_code">Zip Code *</label>
                                <input required type="text" name="billing_zip_code" class="form-control" id="billing_zip_code">
                            </div>
                            <?php
                            $cart = $this->cart->contents();
                            foreach($cart as $item){
                                $pri = $item['subtotal'];
                                $grand_total = $grand_total + $pri;
                            }
                            ?>
                            <div style="float: right;width: 30%;" id="totals">
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
                            <button type="submit" class="btn btn-block btn-success btn-lg">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
