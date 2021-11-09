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
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/animate.css')?>">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('bootstrap/css/bootstrap.min.css')?>">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/all.min.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/ionicons.min.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/linearicons.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/flaticon.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/simple-line-icons.css')?>">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="<?php echo $main->skinFront('owlcarousel/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('owlcarousel/css/owl.theme.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('owlcarousel/css/owl.theme.default.min.css')?>">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/magnific-popup.css')?>">
    <!-- jquery-ui CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/jquery-ui.css')?>">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/slick.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/slick-theme.css')?>">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/style.css')?>">
    <link rel="stylesheet" href="<?php echo $main->skinFront('css/responsive.css')?>">
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
<?php echo $main->headerFront()?>
<?php echo $contents ?>
<?php echo $main->footerFront()?>
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="<?php echo $main->skinFront('js/jquery-1.12.4.min.js')?>"></script>
<!-- jquery-ui -->
<script src="<?php echo $main->skinFront('js/jquery-ui.js')?>"></script>
<!-- popper min js -->
<script src="<?php echo $main->skinFront('js/popper.min.js')?>"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="<?php echo $main->skinFront('bootstrap/js/bootstrap.min.js')?>"></script>
<!-- owl-carousel min js  -->
<script src="<?php echo $main->skinFront('owlcarousel/js/owl.carousel.min.js')?>"></script>
<!-- magnific-popup min js  -->
<script src="<?php echo $main->skinFront('js/magnific-popup.min.js')?>"></script>
<!-- waypoints min js  -->
<script src="<?php echo $main->skinFront('js/waypoints.min.js')?>"></script>
<!-- parallax js  -->
<script src="<?php echo $main->skinFront('js/parallax.js')?>"></script>
<!-- countdown js  -->
<script src="<?php echo $main->skinFront('js/jquery.countdown.min.js')?>"></script>
<!-- imagesloaded js -->
<script src="<?php echo $main->skinFront('js/imagesloaded.pkgd.min.js')?>"></script>
<!-- isotope min js -->
<script src="<?php echo $main->skinFront('js/isotope.min.js')?>"></script>
<!-- jquery.dd.min js -->
<script src="<?php echo $main->skinFront('js/jquery.dd.min.js')?>"></script>
<!-- slick js -->
<script src="<?php echo $main->skinFront('js/slick.min.js')?>"></script>
<!-- elevatezoom js -->
<script src="<?php echo $main->skinFront('js/jquery.elevatezoom.js')?>"></script>
<!-- scripts js -->
<script src="<?php echo $main->skinFront('js/scripts.js')?>"></script>