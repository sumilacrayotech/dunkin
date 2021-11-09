<style>.noHover{  background-color: #eb4494 !important; color: #ffffff !important;position: relative !important;}</style>
<?php echo $breadcrumb ?>
<div class="main_content">
    <div class="section">
        <div class="container">
            <div id="message"></div>
            <div class="bg_whitediv">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <?php echo $media ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form method="POST" action="" id="add_to_cart">
                            <input type="hidden" name="product_id" value="<?php echo $product->product_id ?>">
                            <div class="pr_detail">
                                <div class="product_description">
                                    <h4 class="product_title"><?php echo $product->product_name ?></h4>
                                    <?php
                                    $priceData = $main->getProductPrice($product->price_data);
                                    if($priceData->special_price){
                                        $offerPercent = (($priceData->price_index - $priceData->special_price_index)*100) /$priceData->price_index ;
                                        $allPrice[]=$priceData->special_price_index;
                                        ?>
                                        <div class="product_price">
                                            <span class="price"><?php echo $priceData->special_price ?></span>
                                            <del><?php echo $priceData->price ?></del><br>
                                            <div class="on_sale">
                                                <span><?php echo round($offerPercent) ?>% Off</span>
                                            </div>
                                        </div>
                                    <?php }else{
                                        $allPrice[]=$priceData->price_index;
                                        ?>
                                        <div class="product_price">
                                            <span class="price"><?php echo $priceData->price ?></span>
                                        </div>
                                    <?php }?>
                                    <?php
                                    $review = $app->getProductReviewStarPercentage($product->product_id)
                                    ?>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:<?php echo $review->reviewPercentage ?>%"></div>
                                        </div>
                                        <span class="rating_num">(<?php echo $review->totalReview ?>)</span>
                                    </div>
                                    <?php if(!empty($product->short_title)){?>
                                        <div class="pr_desc">
                                            <?php echo $product->short_title ?>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="pr_desc">
                                            &nbsp;
                                        </div>
                                    <?php }?>
                                    <div class="product_sort_info">
                                        <ul>
                                            <li>&nbsp;</li>
                                            <?php if($product->warranty): ?>
                                                <li><i class="linearicons-shield-check"></i><?php echo $product->warranty ?></li>
                                            <?php endif; ?>
                                            <?php if($product->days_return_policy): ?>
                                                <li><i class="linearicons-sync"></i> <?php echo $product->days_return_policy ?> Day Return Policy</li>
                                            <?php endif; ?>
                                            <?php if($product->cash_on_delivery==1): ?>
                                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <?php if($product->config_attributes):?>
                                        <div class="pr_switch_wrap">
                                            <span class="switch_lable">Color</span>
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <span class="switch_lable">Size</span>
                                            <div class="product_size_switch">
                                                <span>xs</span>
                                                <span>s</span>
                                                <span>m</span>
                                                <span>l</span>
                                                <span>xl</span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <hr />
                                <div class="cart_extra">
                                    <div class="cart-product-quantity">
                                        <div class="quantity">
                                            <input type="button" value="-" class="minus">
                                            <input type="text" name="qty" value="1" title="Qty" class="qty" size="4">
                                            <input type="button" value="+" class="plus">
                                        </div>
                                    </div>
                                    <div class="cart_btn">
                                        <button class="btn btn-addtocart noHover" type="submit">
                                            <i class="icon-basket-loaded"></i> <span id="add_cart_txt">Add to cart</span>
                                            <img style="width:17%;position: absolute;left: 28px;top: 4px;display: none" id="qty_loader" src="<?php echo $main->skinFront('images/cart_product.svg') ?>">
                                        </button>

                                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                                    </div>
                                </div>
                                <hr />
                                <ul class="product-meta">
                                    <li>SKU: <?php echo $product->product_code ?></li>
                                    <li>Category:
                                        <?php foreach($categoryBreadcrumb as $item): ?>
                                            <a href="<?php echo base_url() ?><?php echo $item->url_key ?>"><?php echo $item->name ?></a>
                                        <?php endforeach; ?>
                                    </li>
                                </ul>
                                <div class="product_share">
                                    <span>Share:</span>
                                    <div class="addthis_inline_share_toolbox"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="bg_whitediv">
                <?php echo $details ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="bg_whitediv">
                <?php echo $related ?>
            </div>
        </div>
    </div>
</div>