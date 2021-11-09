<div id="billing_address_data_load">
    <div id="save_billing_address_message"><?php echo $message_like ?></div>
    <form method="POST" id="save_billing_address" action="<?php echo base_url('checkout/saveBillingAddressSession') ?>">
        <?php
        $shippingAddressCheck = (array) $shippingAddressData;
        $billingAddressCheck = (array) $billingAddressData;
        unset($shippingAddressCheck['save_address']);
        $arraysAreEqual = $app->array_equal($shippingAddressCheck, $billingAddressCheck);
        if($arraysAreEqual==true){
            $display = 'style="display: none"';
        }else{
            $display = 'style="display: block"';
        }
        ?>
        <div id="billing_address_data" <?php echo $display ?>>
            <h5 class="modal-title" id=""> BILLING ADDRESS</h5><br>
            <div id="form-sec" class="col-md-12" style="padding: 0px;">
                <div class="row">
                    <div class="col-md-12 clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="text" value="<?php echo $billingAddressData->first_name ?>" required name="first_name" id="billing_first_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Fist Name *">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="text" value="<?php echo $billingAddressData->last_name ?>" required name="last_name" id="billing_last_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Last Name *">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <input required name="phone_number" value="<?php echo $billingAddressData->phone_number ?>" id="phone_number" class="form-control form-control" data-toggle="floatLabel" placeholder="Phone Number *" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <textarea style="height: 100px" rows="5" class="form-control" placeholder="Address *" required name="address" id="billing_address" spellcheck="false"><?php echo $billingAddressData->address ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="control">
                                    <?php $countries = $app->getAllowedCountries(); ?>
                                    <select name="country_code" id="billing_country" class="form-control" data-toggle="floatLabel">
                                        <option value="">---Select Country---</option>
                                        <?php foreach($countries as $country): ?>
                                            <option <?php if($billingAddressData->country_code==$country['code']){?>selected<?php }?> value="<?php echo $country['code'] ?>"><?php echo $country['name'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <input required name="city" value="<?php echo $billingAddressData->city ?>" id="city" class="form-control form-control" data-toggle="floatLabel" placeholder="State *" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input required name="state" value="<?php echo $billingAddressData->state ?>" id="state" class="form-control form-control" data-toggle="floatLabel" placeholder="City *" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input required name="zip_code" value="<?php echo $billingAddressData->zip_code ?>" id="zip_code" class="form-control form-control" data-toggle="floatLabel" placeholder="Zip Code *" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-fill-out" style="color: #FFF">Next</button>
        <img id="save_billing_address_loader" style="display: none" src="<?php echo $main->skinFront('images/103.gif') ?>">
    </form>
</div>