<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Create New Customer Account</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Account</li>
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
            <div class=" login_wrap bg-white " style=" padding: 30px 20px;">
                <div class="col-xl-12 col-md-12">
                    <div id="message"><?php echo $message_like ?></div>
                    <form method="POST" action="" id="create_account">
                        <div class="row ">
                            <div class="col-xl-6 col-md-6">
                                <div class="heading_s1">
                                    <h3>Personal Information</h3>
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo set_value('first_name'); ?>" class="form-control" name="first_name" placeholder="First Name">
                                    <?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo set_value('last_name'); ?>" type="text" name="last_name" placeholder="Last Name">
                                    <?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="newsletter" id="exampleCheckbox1">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Sign Up for Newsletter</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="heading_s1">
                                    <h3>Sign-in Information</h3>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" name="email" placeholder="Email">
                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" id="password_new" name="password" placeholder="Password">
                                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirm Password">
                                    <?php echo form_error('password_confirm', '<div class="error">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Create an Account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
</div>