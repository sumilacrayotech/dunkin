
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_white page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <?php foreach($categoryBreadcrumb as $item): ?>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?><?php echo $item->url_key ?>"><?php echo $item->name ?></a></li>
                    <?php endforeach; ?>
                    <li class="breadcrumb-item active"><?php echo $product->product_name?></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->