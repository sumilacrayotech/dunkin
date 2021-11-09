<div class="product-image vertical_gallery">
    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
        <div class="item">
            <a href="#" class="product_gallery_item active" data-image="<?php echo base_url().'assets/uploads/products/main/'.$product->image?>" data-zoom-image="<?php echo base_url().'assets/uploads/products/main/'.$product->image?>">
                <img src="<?php echo base_url().'assets/uploads/products/main/'.$product->image?>" alt="product_small_img1" />
            </a>
        </div>
        <?php foreach($images as $image): ?>
        <div class="item">
            <a href="#" class="product_gallery_item active" data-image="<?php echo base_url().'assets/uploads/products/'.$image->image?>" data-zoom-image="<?php echo base_url().'assets/uploads/products/'.$image->image?>">
                <img src="<?php echo base_url().'assets/uploads/products/'.$image->image?>" alt="product_small_img1" />
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="product_img_box">
        <img id="product_img" src='<?php echo base_url().'assets/uploads/products/main/'.$product->image?>' data-zoom-image="<?php echo base_url().'assets/uploads/products/main/'.$product->image?>" alt="product_img1" />
        <a href="#" class="product_img_zoom" title="Zoom">
            <span class="linearicons-zoom-in"></span>
        </a>
    </div>
</div>