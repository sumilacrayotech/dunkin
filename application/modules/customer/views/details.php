<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Account Details</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Account Details</li>
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
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div class="col-sm-6">
                                                        <div class="chek-form">
                                                            <div class="custome-checkbox">
                                                                <input onclick="showChangePassword()" <?php if(set_value('change_password')=='on'){?>checked<?php }?> class="form-check-input" type="checkbox" name="change_password" id="change_password">
                                                                <label class="form-check-label" for="change_password"><span>Change Password</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="change_password_section" <?php if(set_value('change_password')=='on'){?>style="width: 100%;display: block"<?php }else{?>style="width: 100%;display: none"<?php }?>>
                                                <div class="col-md-12 clearfix">
                                                    <div class="heading_s1">
                                                        <h3 style="font-size: 16px;">Change Password</h3>
                                                        <hr/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="password" value="<?php echo set_value('current_password'); ?>" id="current_password" name="current_password" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Current password *">
                                                                    <?php echo form_error('current_password', '<div class="error">', '</div>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="password" value="<?php echo set_value('new_password'); ?>" name="new_password" id="new_password" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="New password *">
                                                                    <?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 clearfix">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="password" id="con_new_password" value="<?php echo set_value('con_new_password'); ?>" name="con_new_password" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Reenter password *">
                                                                    <?php echo form_error('con_new_password', '<div class="error">', '</div>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-12">
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div class="col-sm-6">
                                                        <div class="chek-form">
                                                            <div class="custome-checkbox">
                                                                <input class="form-check-input" onclick="showChangeEmail()" type="checkbox" name="change_email" id="change_email">
                                                                <label class="form-check-label" for="change_email"><span>Change Email</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="change_email_section" style="width: 100%;display: none">
                                                <div class="col-md-12 clearfix">
                                                    <div class="heading_s1">
                                                        <h3 style="font-size: 16px;">Change Email</h3>
                                                        <hr/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="text" value="<?php /*echo $customer->email */?>" id="email" name="email" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Email *">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                        <p>In order to reset your password, please <a href="<?php echo base_url('customer/logout') ?>">Sign Out</a> and click on “Forgot Your Password?” from the Sign In page</p>
                                        <button type="submit" class="btn btn-fill-out" style="color: #FFF;">Save</button>
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