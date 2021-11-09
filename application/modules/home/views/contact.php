<?php $main->headerFront() ?>
    <style>
        .field-error {
            display: inline-block;
            margin: 0;
            color: red;
            margin-top: 6px;
        }
    </style>
<div class="page-content">
        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper" style="background-image:url(<?php echo $main->skinFront('images/banner/about-banner.jpg') ?>);">
            <div class="overlay-main bg-black opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <h1 class="text-white">Contact us</h1>
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- BREADCRUMB ROW -->
        <div class="bg-gray-light p-tb20">
            <div class="container">
                <ul class="wt-breadcrumb breadcrumb-style-2">
                    <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Home</a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </div>
        <!-- BREADCRUMB ROW END -->


        <!-- SECTION CONTENTG START -->
        <div class="section-full p-t80 p-b50">
            <div class="container">

                <!-- CONTACT DETAIL BLOCK -->
                <div class="section-content m-b30">

                    <div class="row">
                        <div class="col-md-4 col-sm-6 m-b30">
                            <div class="wt-icon-box-wraper center p-a30 bg-secondry" style="background-color: rgb(22 15 62);">
                                <!--    <div class="icon-sm text-white m-b10"><i class="iconmoon-smartphone-1"></i></div> -->
                                <?php echo $main->StaticBlock(6)->content ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 m-b30">
                            <div class="wt-icon-box-wraper center p-a30 bg-secondry" style="background-color: rgb(22 15 62);">
                                <?php echo $main->StaticBlock(7)->content ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 m-b30">
                            <div class="wt-icon-box-wraper center p-a30 bg-secondry" style="background-color: rgb(22 15 62);">
                                <?php echo $main->StaticBlock(8)->content ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- GOOGLE MAP & CONTACT FORM -->
                <div class="section-content m-b50">
                    <div class="row">
                        <!-- LOCATION BLOCK-->
                        <div class="wt-box col-md-2"></div>

                        <!-- CONTACT FORM-->
                        <div class="wt-box col-md-8">

                            <h4 class="text-uppercase">Contact Form </h4>
                            <div class="wt-separator-outer m-b30">
                                <div class="wt-separator style-square">
                                    <span class="separator-left bg-primary"></span>
                                    <span class="separator-right bg-primary"></span>
                                </div>
                            </div>
                            <div class="p-a30 bg-gray">
                                <?php if(!empty($status)){ ?>
                                    <div class="alert <?php echo $status['type']; ?>" style="width: 100%;margin: auto;margin-bottom: 19px;">
                                        <?php echo $status['msg']; ?>
                                    </div>
                                <?php } ?>
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" name="name" placeholder="Enter Name">
                                        </div>
                                        <?php echo form_error('name','<p class="field-error">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="number" value="<?php echo !empty($postData['phone_number'])?$postData['phone_number']:''; ?>" class="form-control" name="phone_number" placeholder="Enter number">
                                        </div>
                                        <?php echo form_error('phone_number','<p class="field-error">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" class="form-control" name="email" placeholder="Enter email">
                                        </div>
                                        <?php echo form_error('email','<p class="field-error">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                            <textarea class="form-control" name="message" rows="3"></textarea>
                                            <input type="hidden" name="contactSubmit" value="1"/>
                                        </div>
                                    </div>
                                    <button class="site-button " type="submit" style="color: #000;">Submit <i class="fa fa-angle-double-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
        <!-- SECTION CONTENT END -->
    </div>
<?php $main->footerFront() ?>