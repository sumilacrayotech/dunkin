<?php echo $main->headerFront() ?>
<div class="page-content">
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper" style="background-image:url(<?php echo $main->skinFront('images/banner/about-banner.jpg') ?>);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <h1 class="text-white"><?php echo $page->title ?></h1>
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
    <!-- BREADCRUMB ROW -->
    <div class="bg-gray-light p-tb20">
        <div class="container">
            <ul class="wt-breadcrumb breadcrumb-style-2">
                <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><?php echo $page->title ?></li>
            </ul>
        </div>
    </div>
    <!-- BREADCRUMB ROW END -->
    <!-- ABOUT COMPANY SECTION START -->
    <div class="section-full p-t50 p-b70">
        <div class="container">
            <!-- TITTLE START -->
            <div class="section-head " style="margin-bottom: 15px;">
                <h2 class="text-uppercase"><?php echo $page->sub_title ?></h2>
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
                    <?php echo $page->content ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT COMPANY SECTION END -->
</div>
<?php echo $main->footerFront() ?>
