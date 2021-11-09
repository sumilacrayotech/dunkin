<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_white page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1><?php echo $categoryName ?></h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $categoryName ?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="order">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="">Showing</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                            <option value="18">18</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container">
                        <?php
                        $allPrice = [];
                        foreach($productCollection as $product):

                            ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('product/'.$product->url_key) ?>">
                                        <img height="250" width="250" src="<?php echo base_url().'assets/uploads/products/main/'.$product->image?>" alt="product_img1">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
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
                                    $review = $app->getProductReviewStarPercentage($product->product_id)
                                    ?>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:<?php echo $review->reviewPercentage ?>%"></div>
                                        </div>
                                        <span class="rating_num">(<?php echo $review->totalReview ?>)</span>
                                    </div>
                                    <?php if(!empty($product->description)):?>
                                    <div class="pr_desc">
                                        <?php echo $product->description ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="list_product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php echo $pagination ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Categories</h5>
                            <ul class="widget_categories">
                                <?php foreach($main->rootCategories() as $category): ?>
                                <li><a href="<?php echo $category->url ?>"><span class="categories_name"><?php echo $category->category_name ?></span><span class="categories_num"></span></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Filter</h5>
                            <?php
                            $maxPrice = $minMax->maxPrice;
                            $minPrice = $minMax->minPrice;
                            ?>
                            <div class="filter_price">
                                <div id="price_filter" data-min="<?php echo $minPrice ?>" data-max="<?php echo $maxPrice ?>" data-min-value="<?php echo $minPrice ?>" data-max-value="<?php echo $maxPrice ?>" data-price-sign="<?php echo $main->getBaseCurrencyCode().' '?>"></div>
                                <div class="price_range">
                                    <span>Price: <span id="flt_price"></span></span>
                                    <form action="<?php echo $app->priceRangeActionUrl() ?>" method="POST">
                                       <input type="hidden" name="price_from" id="price_first">
                                       <input type="hidden" name="price_to" id="price_second">
                                       <input type="submit" id="price_slide_submit" style="display: none" value="search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($filter as $option):?>
                            <?php
                            $attributeId = $option['attribute_id'];
                            $swatchType = $app->getAttributeSwatchType($attributeId);
                            if($swatchType->attribute_id):
                            ?>
                            <?php if($swatchType->swatch_type=='default'):?>
                            <div class="widget">
                                <h5 class="widget_title"><?php echo $swatchType->label ?></h5>
                                <ul class="list_brand">
                                <?php $c=0; foreach ($option['attribute_value'] as $value): ?>
                                    <?php
                                    $optionData = $app->getAttributeOptionFilter($value);
                                    $optionSwatchData = $app->getOptionDataDefault($optionData->option_id);
                                    $filterValue = $optionSwatchData->option_value.'-'.$optionSwatchData->option_id;
                                    if(!empty($optionSwatchData)):
                                        $activeFilter =  $app->checkInArrayParams($option['attribute_code'],$filterValue);
                                        ?>
                                        <li>
                                            <div class="custome-checkbox">
                                                <input <?php if($activeFilter==1):?>checked<?php endif; ?> onclick="window.location.assign('<?php echo $app->layeredUrl($option['attribute_code'],$filterValue,$activeFilter) ?>')" class="form-check-input" type="checkbox" name="checkbox" id="<?php echo $optionSwatchData->option_id ?>">
                                                <label class="form-check-label" for="<?php echo $optionSwatchData->option_id ?>"><span><?php echo $optionSwatchData->option_value ?></span></label>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                    <?php $c++; endforeach;?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if($swatchType->swatch_type=='text'):?>
                            <div class="widget">
                                <h5 class="widget_title"><?php echo $swatchType->label ?></h5>
                                <div class="product_size_switch">
                                <?php $c=0; foreach ($option['attribute_value'] as $value): ?>
                                    <?php
                                    $optionData = $app->getAttributeOptionFilter($value);
                                    $optionSwatchData = $app->getOptionData($optionData->option_id);
                                    $filterValue = $optionSwatchData->option_value.'-'.$optionSwatchData->option_id;
                                    if(!empty($optionSwatchData)):
                                        $activeFilter =  $app->checkInArrayParams($option['attribute_code'],$filterValue);
                                        ?>
                                    <span <?php if($activeFilter==1):?>class="active"<?php endif; ?> onclick="window.location.assign('<?php echo $app->layeredUrl($option['attribute_code'],$filterValue,$activeFilter) ?>')"><?php echo $optionSwatchData->swatch_text?></span>
                                    <?php endif; ?>
                                    <?php $c++; endforeach;?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($swatchType->swatch_type=='color_code'):?>
                            <div class="widget">
                                <h5 class="widget_title"><?php echo $swatchType->label ?></h5>
                                <div class="product_color_switch">
                                    <?php $c=0; foreach ($option['attribute_value'] as $value): ?>
                                        <?php
                                        $optionData = $app->getAttributeOptionFilter($value);
                                        $optionSwatchData = $app->getOptionData($optionData->option_id);
                                        $filterValue = $optionSwatchData->option_value.'-'.$optionSwatchData->option_id;
                                        if(!empty($optionSwatchData)):
                                            $activeFilter =  $app->checkInArrayParams($option['attribute_code'],$filterValue);
                                        ?>
                                        <span <?php if($activeFilter==1):?>class="active"<?php endif; ?> onclick="window.location.assign('<?php echo $app->layeredUrl($option['attribute_code'],$filterValue,$activeFilter) ?>')" data-color="<?php echo $optionSwatchData->color_code?>"></span>
                                        <?php endif; ?>
                                    <?php $c++; endforeach;?>
                                </div>
                            </div>
                            <?php endif; ?>
                         <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>