<div class="row">
    <div class="col-12">
        <div class="heading_s1">
            <h3>Releted Products</h3>
        </div>
        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "3"}, "768":{"items": "4"}, "1199":{"items": "5"}}'>
            <?php foreach($relatedProducts as $relatedProduct):?>
            <div class="item">
                <div class="product">
                    <div class="product_img">
                        <a href="<?php echo base_url('product/'.$relatedProduct->url_key) ?>">
                            <img height="250" width="250" src="<?php echo base_url().'assets/uploads/products/main/'.$relatedProduct->image?>" alt="product_img1">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                <li><a href="#" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                <li><a href="#"><i class="icon-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title"><a href="<?php echo base_url('product/'.$relatedProduct->url_key) ?>"><?php echo $relatedProduct->product_name ?></a></h6>
                        <?php
                        $priceData = $main->getProductPrice($relatedProduct->price_data);
                        if($priceData->special_price){
                            $offerPercent = (($priceData->price_index - $priceData->special_price_index)*100) /$priceData->price_index ;
                            $allPrice[]=$priceData->special_price_index;
                            ?>
                            <div class="product_price">
                                <span class="price"><?php echo $priceData->special_price ?></span>
                                <del><?php echo $priceData->price ?></del>
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
                        $review = $app->getProductReviewStarPercentage($relatedProduct->product_id)
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
        </div>
    </div>
</div>