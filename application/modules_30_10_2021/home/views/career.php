<?php echo $main->headerFront() ?>
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
                <h1 class="text-white">Careers</h1>
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
    <!-- BREADCRUMB ROW -->
    <div class="bg-gray-light p-tb20">
        <div class="container">
            <ul class="wt-breadcrumb breadcrumb-style-2">
                <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Home</a></li>
                <li>Careers</li>
            </ul>
        </div>
    </div>
    <!-- BREADCRUMB ROW END -->
    <!-- ABOUT COMPANY SECTION START -->
    <div class="section-full p-t50 p-b70">
        <div class="container">
            <!-- TITTLE START -->
            <div class="section-head " style="margin-bottom: 15px;">
                <h2 class="text-uppercase">Careers</h2>
                <div class="wt-separator-outer">
                    <div class="wt-separator style-square">
                        <span class="separator-left bg-primary"></span>
                        <span class="separator-right bg-primary"></span>
                    </div>
                </div>
            </div>
            <!-- TITLE END -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <!-- APPLY NOW YOUR SUGGETION -->
                    <div class="p-a15 ">
                        <div class="wt-box border-2 p-a30" style="box-shadow: 0px 1px 14px 1px rgb(0 0 0 / 12%);border-radius: 3px;">
                            <?php if(!empty($status)){ ?>
                                <div class="alert <?php echo $status['type']; ?>" style="width: 100%;margin: auto;margin-bottom: 19px;">
                                    <?php echo $status['msg']; ?>
                                </div>
                            <?php } ?>
                            <form method="post" action="" enctype="multipart/form-data">
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
                                    <label>Upload CV (PDF)</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-file"></i></span>
                                        <input type="file" required class="form-control" name="cv" placeholder="Upload CV">
                                        <input type="hidden" name="careerSubmit" value="1"/>
                                    </div>
                                    <?php echo form_error('cv','<p class="field-error">','</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <textarea class="form-control" name="message" rows="3"></textarea>
                                    </div>
                                </div>
                                <button class="site-button " type="submit" style="color: #000;">Submit <i class="fa fa-angle-double-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ABOUT COMPANY SECTION END -->
</div>
<?php echo $main->footerFront() ?>
