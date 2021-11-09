<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="" id="save_shipping_address">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> SHIPPING ADDRESS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div>
                            <div id="form-sec" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 clearfix">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <?php
                                                        if(!empty($shippingAddressDataNew->first_name)){
                                                            $firstName = $shippingAddressDataNew->first_name;
                                                        }else{
                                                            $firstName = $customer->first_name;
                                                        }
                                                        if(!empty($shippingAddressDataNew->last_name)){
                                                            $lastName = $shippingAddressDataNew->last_name;
                                                        }else{
                                                            $lastName = $customer->last_name;
                                                        }
                                                        ?>
                                                        <input type="text" value="<?php echo $firstName ?>" required  name="first_name" id="shipping_first_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="First Name *">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input type="text" value="<?php echo $lastName ?>" required name="last_name" id="shipping_last_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Last Name *">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input required name="phone_number" value="<?php echo $shippingAddressDataNew->phone_number ?>" id="shipping_phone_number" class="form-control form-control" data-toggle="floatLabel" placeholder="Phone Number *" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea style="height: 100px" rows="5" class="form-control" placeholder="Address *" required name="address" id="shipping_address" spellcheck="false"><?php echo $shippingAddressDataNew->address ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <div class="control">
                                                    <?php $countries = $app->getAllowedCountries(); ?>
                                                    <select name="country_code" id="shipping_country" class="form-control" data-toggle="floatLabel">
                                                        <option value="">---Select Country---</option>
                                                        <?php foreach($countries as $country): ?>
                                                            <option <?php if($shippingAddressDataNew->country_code==$country['code']){?>selected<?php }?> value="<?php echo $country['code'] ?>"><?php echo $country['name'] ?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input required name="state" value="<?php echo $shippingAddressDataNew->state ?>" id="shipping_state" class="form-control form-control" data-toggle="floatLabel" placeholder="State *" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 clearfix">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input required name="city" value="<?php echo $shippingAddressDataNew->city ?>" id="shipping_city" class="form-control form-control" data-toggle="floatLabel" placeholder="City *" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input required name="zip_code" value="<?php echo $shippingAddressDataNew->zip_code ?>" id="shipping_zip_code" class="form-control form-control" data-toggle="floatLabel" placeholder="Zip Code *" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" checked name="save_address" id="exampleCheckbox1">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Save Address</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>