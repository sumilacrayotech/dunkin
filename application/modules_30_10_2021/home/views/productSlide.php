<?php foreach($Products as $product):?>
    <div class="item">
        <div class="product_wrap">
            <div class="product_img">
                <a href="product-detail.php">
                    <img height="250" width="250" src="<?php echo $main->uploadPath('products/main/'.$product->image) ?>" alt="el_img2">
                    <img height="250" width="250" class="product_hover_img" src="<?php echo $main->uploadPath('products/main/'.$product->image) ?>" alt="el_hover_img2">
                </a>
                <div class="product_action_box">
                    <ul class="list_none pr_action_btn">
                        <li><a href="<?php echo base_url('product/'.$product->url_key) ?>" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                        <li><a href="#"><i class="icon-heart"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="product_info">
                <h6 class="product_title"><a href="<?php echo base_url('product/'.$product->url_key) ?>"><?php echo $product->product_name ?></a></h6>
                <?php
                $priceData = $main->getProductPrice($product->price_data);
                if($priceData->special_price){
                    $offerPercent = (($priceData->price_index - $priceData->special_price_index)*100) /$priceData->price_index ;
                    ?>
                    <div class="product_price">
                        <span class="price"><?php echo $priceData->special_price ?></span>
                        <del><?php echo $priceData->price ?></del>
                        <div class="on_sale">
                            <span><?php echo round($offerPercent) ?>% Off</span>
                        </div>
                    </div>
                <?php }else{?>
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
            </div>
        </div>
    </div>
<?php endforeach; ?>