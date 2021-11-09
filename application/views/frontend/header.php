<!-- START HEADER -->
<?php
$main = new Main();
$rootCategories = $main->rootCategories();
$this->load->library('cart');
?>
<header class="header_wrap">
    <div class="top-header dark_skin bg_dark1 d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-3">
                    <div class="header_topbar_info">
                        <img src="<?php echo $main->skinFront('images/lang.png') ?>" width="25">
                        <select name="countries" class="custome_select">
                            <option value='' data-title="ARABIC">ARABIC</option>
                            <option value='' data-title="ENGLISH">ENGLISH</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <ul class="header_links">
                            <li class="nav_topli"><a href="#">become a vendor</a></li>
                            <li class="nav_topli"><a href="#">Wishlist </a></li>
                            <li class="nav_topli"><a href="#">news </a></li>
                            <?php if($main->ifLogin()){?>
                                <li class="nav_topli">
                                    <a href="<?php echo base_url('customer/account') ?>">Hi, <?php echo $main->ifLogin()->first_name ?></a>|<a href="<?php echo base_url('customer/logout') ?>">Logout</a>
                                </li>
                            <?php }else{?>
                                <li class="nav_topli"><a href="<?php echo base_url('customer/create') ?>">Create an Account </a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="<?php echo base_url() ?>">
                    <img class="logo_dark" src="<?php echo $main->skinFront('images/logo_dark.png') ?>" alt="logo">
                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form action="shop-list.php">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null not_chosen">
                                        <option value="">All Category</option>
                                        <option value="">Cosmetic</option>
                                        <option value="">Skincare & Spa</option>
                                        <option value="">Consumer Goods</option>
                                        <option value="">Stationery</option>
                                        <option value="">Gift Shop</option>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." required="" type="text">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li class="hide_mob">
                        <div class="lng_dropdown">
                            <span class="ship_to">Ship to</span>
                            <select name="countries" class="custome_select">
                                <option value='ksa' data-image="<?php echo $main->skinFront('images/kuwait.jpg') ?>" data-title="ksa"> <span>KWD</span></option>
                                <option value='ksa' data-image="<?php echo $main->skinFront('images/oman.jpg') ?>" data-title="ksa"> <span> OMR </span></option>
                                <option value='ksa' data-image="<?php echo $main->skinFront('images/qatar.jpg') ?>" data-title="ksa"> <span> QAR </span></option>
                                <option value='ksa' data-image="<?php echo $main->skinFront('images/ksa.png') ?>" data-title="ksa"> <span> SAR </span></option>
                                <option value='ksa' data-image="<?php echo $main->skinFront('images/uae.jpg') ?>" data-title="ksa"> <span> AED </span></option>
                            </select>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('customer/account') ?>" class="nav-link"><i class="linearicons-user"></i><!--  <span class="text_sin">Sign In</span> --> </a></li>
                    <li>
                        <a href="#" class="nav-link">
                            <i class="linearicons-heart"></i>
                            <span class="wishlist_count">
                                0
                            </span>
                        </a>
                    </li>
                    <li class="dropdown cart_dropdown">
                        <a class="nav-link cart_trigger" href="#" data-toggle="dropdown">
                            <i class="linearicons-bag2"></i>
                            <span class="cart_count" id="cart_count">
                                <?php echo count($this->cart->contents()) ?>
                            </span>
                        </a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right" id="mini_cart_items">
                            <?php if($this->cart->contents()){?>
                            <ul class="cart_list">
                                <?php
                                $cartData = $this->cart->contents();
                                $grand_total = [];
                                foreach($cartData as $item): ?>
                                    <li>
                                        <a href="<?php echo base_url() ?>checkout/removeItem/<?php echo $item['rowid']?>" class="item_remove"">
                                            <i onclick="removeCartItem(<?php echo $item['rowid']?>)" class="ion-close"></i>
                                        </a>
                                        <a href="#"><img src="<?php echo $item['image'] ?>" alt="cart_thumb1"><?php echo $item['name'] ?></a>
                                        <span class="cart_quantity"> <?php echo $item['qty'] ?> x <span class="cart_amount"> <span class="price_symbole"><?php echo $main->currentCurrency() ?></span></span><?php echo number_format($item['price'],2) ?></span>
                                    </li>
                                <?php
                                $grand_total[] = $item['subtotal'];
                                endforeach; ?>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole"><?php echo $main->currentCurrency() ?></span></span><?php echo number_format(array_sum($grand_total),2) ?></p>
                                <p class="cart_buttons"><a href="<?php echo base_url('checkout/cart') ?>" class="btn btn-fill-line view-cart">View Cart</a><a href="<?php echo base_url('checkout/index') ?>" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                            <?php }else{?>
                            <ul class="cart_list">
                                <li>
                                    You have no items in your shopping cart.
                                </li>
                            </ul>
                            <?php }?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">All Categories</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <?php $_collectionSize = count($rootCategories) ?>
                                            <?php $_columnCount = 4; ?>
                                            <?php $i=0; foreach ($rootCategories as $_category): ?>
                                            <?php if ($i++%$_columnCount==0): ?>
                                             <li class="mega-menu-col col-lg-3">
                                               <ul>
                                                <?php endif ?>
                                                <li>
                                                    <a class="dropdown-item nav-link nav_item" href="<?php echo $_category->url ?>">
                                                        <?php echo $_category->category_name ?>
                                                    </a>
                                                </li>
                                                <?php if ($i%$_columnCount==0 || $i==$_collectionSize): ?>
                                                </ul>
                                            </li>
                                            <?php endif?>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </li>
                                <li> <a href="shop-list.php" class="nav-link nav_item">New Arrivals</a></li>
                                <li> <a href="shop-list.php" class="nav-link nav_item">Best Sellers</a></li>
                                <li> <a href="shop-list.php" class="nav-link nav_item">Today's Deal</a></li>
                                <li> <a href="shop-list.php" class="nav-link nav_item">Popular Products</a></li>
                                <li> <a href="shop-list.php" class="nav-link nav_item">Customer Service</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->