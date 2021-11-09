<?php echo $main->headerFront() ?>
<div class="page-content">
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper" style="background-image:url(<?php echo $main->skinFront('images/banner/about-banner.jpg') ?>);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <h1 class="text-white">Major Clients</h1>
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
    <!-- BREADCRUMB ROW -->
    <div class="bg-gray-light p-tb20">
        <div class="container">
            <ul class="wt-breadcrumb breadcrumb-style-2">
                <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Home</a></li>
                <li>Major Clients</li>
            </ul>
        </div>
    </div>
    <!-- BREADCRUMB ROW END -->
    <!-- ABOUT COMPANY SECTION START -->
    <div class="section-full p-t50 p-b70">
        <div class="container">
            <!-- TITTLE START -->
            <div class="section-head " style="margin-bottom: 15px;">
                <h2 class="text-uppercase">Major Clients</h2>
                <div class="wt-separator-outer">
                    <div class="wt-separator style-square">
                        <span class="separator-left bg-primary"></span>
                        <span class="separator-right bg-primary"></span>
                    </div>
                </div>

            </div>
            <!-- TITLE END -->
            <!-- GALLERY CONTENT START -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-b20 ">
                    <div class="cli_box">
                        <h3>Clients</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-wrap mfp-gallery no-col-gap">
                    <?php foreach($clients as $client):?>
                    <div class="masonry-item cat-1 col-lg-3 col-md-3 col-sm-4 col-xs-6 m-b30 ">
                        <div class="wt-gallery-bx p-lr15 ">
                            <div class="wt-thum-bx wt-img-overlay5 wt-img-effect blurr my_imgboxcli client_imgbox1 ">
                                <div class="client_imgbox2">
                                    <img src="<?php echo base_url().'assets/uploads/clients/'.$client->logo ?>"  alt="">
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                            <a href="<?php echo base_url().'assets/uploads/clients/'.$client->logo ?>" class="mfp-link">
                                                <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- GALLERY CONTENT END -->
            <!-- GALLERY CONTENT START -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-b20 ">
                    <div class="cli_box">
                        <h3>CONSULTANTS</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-wrap mfp-gallery no-col-gap">
                    <?php foreach($consultant as $item): ?>
                    <div class="masonry-item cat-1 col-lg-3 col-md-3 col-sm-4 col-xs-6 m-b30 ">
                        <div class="wt-gallery-bx p-lr15 ">
                            <div class="wt-thum-bx wt-img-overlay5 wt-img-effect blurr my_imgboxcli client_imgbox1 ">
                                <div class="client_imgbox2">
                                    <img src="<?php echo base_url().'assets/uploads/clients/'.$item->logo ?>"  alt="">
                                    <div class="overlay-bx">
                                        <div class="overlay-icon">
                                            <a href="<?php echo base_url().'assets/uploads/clients/'.$item->logo ?>" class="mfp-link">
                                                <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- GALLERY CONTENT END -->
        </div>
    </div>
    <!-- ABOUT COMPANY SECTION END -->
</div>
<?php echo $main->footerFront() ?>
