<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Address</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">My Address</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <?php echo $sideBar ?>
                <div class="col-lg-9 col-md-8">
                    <div id="message"><?php echo $message_like ?></div>
                    <div class="tab-content dashboard_content">
                        <div class="card">
                            <div class="card-header">
                                <h3>Account Details</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="save_billing_address" action="">
                                    <div id="form-sec" class="col-md-12" style="padding: 0px;">
                                        <div class="row">
                                            <div class="col-md-12 clearfix">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input type="text" value="<?php echo $customer->first_name ?>" name="first_name" id="first_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="First Name *">
                                                                <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input type="text" value="<?php echo $customer->last_name ?>" name="last_name" id="last_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Last Name *">
                                                                <?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input value="<?php echo set_value('phone_number'); ?>" name="phone_number" id="phone_number" class="form-control form-control" data-toggle="floatLabel" placeholder="Phone Number *" type="text">
                                                        <?php echo form_error('phone_number', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <textarea style="height: 100px" rows="5" class="form-control" placeholder="Address *" name="address" id="address" spellcheck="false"><?php echo set_value('address'); ?></textarea>
                                                        <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <div class="control">
                                                            <?php $countries = $app->getAllowedCountries(); ?>
                                                            <select name="country_code" id="country_code" class="form-control" data-toggle="floatLabel">
                                                                <option value="">---Select Country---</option>
                                                                <?php foreach($countries as $country): ?>
                                                                    <option <?php if($billingAddressData['billing_country']==$country['code']){?>selected<?php }?> value="<?php echo $country['code'] ?>"><?php echo $country['name'] ?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                            <?php echo form_error('country_code', '<div class="error">', '</div>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input value="<?php echo set_value('state'); ?>" name="state" id="state" class="form-control form-control" data-toggle="floatLabel" placeholder="State *" type="text">
                                                        <?php echo form_error('state', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 clearfix">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input value="<?php echo set_value('city'); ?>" name="city" id="city" class="form-control form-control" data-toggle="floatLabel" placeholder="City *" type="text">
                                                                <?php echo form_error('city', '<div class="error">', '</div>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input value="<?php echo set_value('zip_code'); ?>" name="zip_code" id="zip_code" class="form-control form-control" data-toggle="floatLabel" placeholder="Zip Code *" type="text">
                                                                <?php echo form_error('zip_code', '<div class="error">', '</div>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-fill-out" style="color: #FFF">Save Address</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>