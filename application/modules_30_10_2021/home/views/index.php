<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
        <div class="carousel-inner">
            <!-- SECTION REPEAT -->
            <?php foreach($slider as $item):?>
            <div class="carousel-item background_bg active" data-img-src="<?php echo $main->uploadPath('slider/'.$item->slider_image)?>">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-10">
                                <div class="banner_content overflow-hidden">
                                    <?php echo $item->slider_description ?>
                                    <?php if($item->link):?>
                                        <a class="btn btn-fill-out staggered-animation text-uppercase" href="<?php echo $item->link ?>" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- SECTION REPEAT END-->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->
<div class="main_content">
    <!-- START SECTION CATEGORIES -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-autoplay="true" data-autoplayTimeout="500" data-margin="25" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "6"}, "991":{"items": "8"}, "1199":{"items": "9"}}'>
                       <?php foreach($featuredCategories as $featuredCategory): ?>
                        <div class="item">
                            <div class="categories_box">
                                <a href="<?php echo $app->getCategoryUrl($featuredCategory->url_ids) ?>">
                                    <img src="<?php echo $main->uploadPath('category/'.$featuredCategory->image) ?>" alt="cat_img1"/>
                                    <span><?php echo $featuredCategory->category_name ?></span>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CATEGORIES -->
    <div class="section small_pb small_pt">
        <div class="container " >
            <div class="bg_whitediv">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="heading_s1 text-left">
                            <h2>New Arrivals</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <a href="shop-list.html" class="viewall_btn">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-margin="20"  data-dots="false" data-nav="true" data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "4"}, "991":{"items": "5"}}'>
                            <?php
                                $newProductData['Products'] = $newProducts;
                                echo $app->getProductSlide($newProductData);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION BANNER -->
    <div class="section pb_20 small_pt">
        <div class="container">
            <div class="bg_whitediv">
                <div class="row">
                    <?php foreach($middleBanners as $middleBanner):?>
                    <div class="col-md-4">
                        <a class="hover_effect1" href="<?php echo $middleBanner->link ?>">
                            <img src="<?php echo $main->uploadPath('slider/'.$middleBanner->slider_image)?>" alt="" width="100%;">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
    <div class="section small_pb small_pt">
        <div class="container " >
            <div class="bg_whitediv">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="heading_s1 text-left">
                            <h2>Popular Products</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <a href="shop-list.html" class="viewall_btn">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-margin="20"  data-dots="false" data-nav="true" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "4"}, "991":{"items": "5"}}'>
                            <?php
                            $popularProductsData['Products'] = $popularProducts;
                            echo $app->getProductSlide($popularProductsData);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- START SECTION BANNER -->
    <div class="">
        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-margin="20"  data-dots="false" data-nav="true" data-responsive='{"0":{"items": "1"}, "481":{"items": "1"}, "768":{"items": "1"}, "991":{"items": "1"}}'>
            <?php foreach($homeMiddleSlider as $homeMiddle): ?>
            <div class="item">
                <a href="<?php echo $homeMiddle->link ?>">
                    <img src="<?php echo $main->uploadPath('slider/'.$homeMiddle->slider_image)?>" alt="shop_banner_img11" width="100%">
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- END SECTION BANNER -->
    <div class="section small_pb small_pt">
        <div class="container " >
            <div class="bg_whitediv">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="heading_s1 text-left">
                            <h2>Best Sellers</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <a href="#" class="viewall_btn">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-margin="20"  data-dots="false" data-nav="true" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "4"}, "991":{"items": "5"}}'>
                            <?php
                            $bestSellerProductsData['Products'] = $bestSellerProducts;
                            echo $app->getProductSlide($bestSellerProductsData);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION BANNER -->
    <div class="section pb_20 small_pt" >
        <div class="container">
            <div class="row">
                <?php foreach($homeBottomSlider as $bottomSlider):?>
                <div class="col-md-6">
                    <a class="hover_effect1 _4banner" href="<?php echo $bottomSlider->link ?>">
                        <img src="<?php echo $main->uploadPath('slider/'.$bottomSlider->slider_image)?>" alt="" width="100%;">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->
    <div class="section small_pb small_pt">
        <div class="container " >
            <div class="bg_whitediv">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="heading_s1 text-left">
                            <h2>Latest from Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-margin="20"  data-dots="false" data-nav="true" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "3"}}'>
                            <div class="item">
                                <div class="blog_post blog_style2 box_shadow1">
                                    <div class="blog_img">
                                        <a href="blog-single.html">
                                            <img src="<?php echo $main->skinFront('images/blog01.jpg') ?>" alt="el_blog_img1">
                                        </a>
                                    </div>
                                    <div class="blog_content bg-white">
                                        <div class="blog_text">
                                            <ul class="list_none blog_meta">
                                                <li><a href="#"><i class="ti-calendar"></i> Saturday July  4th, 2020</a></li>
                                                <li><a href="#"><i class="ti-user"></i> Admin</a></li>
                                            </ul>
                                            <h5 class="blog_title"><a href="blog-single.html"> Love the show, embarrassing the challenge</a></h5>
                                            <p>Disappear for a while For Ms.Eye Warapairin the actress after into politics but Fail the election. After she back to business way preparing to open ...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>