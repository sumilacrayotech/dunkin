<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>CUSTOMER LOGIN</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">
    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div id="message"><?php echo $message_like ?></div>
            <div class="row justify-content-center ">
                <div class="col-xl-6 col-md-6">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Registered Customers</h3>
                                <p>If you have an account, sign in with your email address.</p>
                            </div>
                            <form method="post" action="" id="login_action">
                                <div class="form-group">
                                    <input type="email" value="<?php echo set_value('email'); ?>" class="form-control" name="email" placeholder="Your Email">
                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo set_value('password'); ?>" type="password" name="password" placeholder="Password">
                                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                        </div>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                </div>
                            </form>
                            <!--  <div class="different_login">
                                 <span> or</span>
                             </div> -->
                            <!--  <ul class="btn-login list_none text-center">
                                 <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                 <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                             </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>New Customers</h3>
                                <p>Creating an account has many benefits: check out faster, keep more than one address, track orders and more.</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Create an Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
</div>