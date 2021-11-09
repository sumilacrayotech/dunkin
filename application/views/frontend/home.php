<!DOCTYPE html>
<html lang="en">
<head>
    <?php $main = new Main();?>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- SITE TITLE -->
    <title>Thaiwara</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $main->skinFront('images/logo_dark.png') ?>">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/animate.css') ?>">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('bootstrap/css/bootstrap.min.css') ?>">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/all.min.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/linearicons.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/simple-line-icons.css') ?>">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="<?php echo $main->skinFront('owlcarousel/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('owlcarousel/css/owl.theme.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('owlcarousel/css/owl.theme.default.min.css') ?>">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/magnific-popup.css') ?>">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/slick.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/slick-theme.css') ?>">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/responsive.css') ?>">
    <!-- Latest jQuery -->
    <script src="<?php echo $main->skinFront('js/jquery-1.12.4.min.js') ?>"></script>
</head>
<body>
<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER -->
<!-- Home Popup Section -->
<div class="modal fade subscribe_popup" id="onload-popup1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-7">
                        <div class="popup_content text-left">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h3>Subscribe Newsletter and Get 25% Discount!</h3>
                                </div>
                                <p>Subscribe to the newsletter to receive updates about new products.</p>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <input name="email" required type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-fill-out btn-block text-uppercase" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="background_bg h-100" data-img-src="assets/images/popup_img3.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Screen Load Popup Section -->
<?php echo $main->headerFront()?>
<?php echo $contents ?>
<?php echo $main->footerFront()?>
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
<!-- popper min js -->
<script src="<?php echo $main->skinFront('js/popper.min.js') ?>"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="<?php echo $main->skinFront('bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- owl-carousel min js  -->
<script src="<?php echo $main->skinFront('owlcarousel/js/owl.carousel.min.js') ?>"></script>
<!-- magnific-popup min js  -->
<script src="<?php echo $main->skinFront('js/magnific-popup.min.js') ?>"></script>
<!-- waypoints min js  -->
<script src="<?php echo $main->skinFront('js/waypoints.min.js') ?>"></script>
<!-- parallax js  -->
<script src="<?php echo $main->skinFront('js/parallax.js') ?>"></script>
<!-- countdown js  -->
<script src="<?php echo $main->skinFront('js/jquery.countdown.min.js') ?>"></script>
<!-- imagesloaded js -->
<script src="<?php echo $main->skinFront('js/imagesloaded.pkgd.min.js') ?>"></script>
<!-- isotope min js -->
<script src="<?php echo $main->skinFront('js/isotope.min.js') ?>"></script>
<!-- jquery.dd.min js -->
<script src="<?php echo $main->skinFront('js/jquery.dd.min.js') ?>"></script>
<!-- slick js -->
<script src="<?php echo $main->skinFront('js/slick.min.js') ?>"></script>
<!-- elevatezoom js -->
<script src="<?php echo $main->skinFront('js/jquery.elevatezoom.js') ?>"></script>
<!-- scripts js -->
<script src="<?php echo $main->skinFront('js/scripts.js') ?>"></script>
</body>
</html>