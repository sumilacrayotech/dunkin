<?php echo $main->headerFront(); ?>
<div class="page-header">
    <!-- page-header -->
    <div class="container">
        <div class="row page-section">
            <!-- page section -->
            <div class="col-md-offset-2 col-md-8">
                <!-- page description -->
                <div class="page-description">
                    <h1 class="page-title"><?php echo $news->title ?></h1>
                </div>
            </div>
            <!-- /.page description -->
        </div>
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url()?>">Home</a></li>
                        <li><a href="<?php echo base_url()?>news-and-events.html">News & Events</a></li>
                        <li class="active"><?php echo $news->title ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.page section -->
    </div>
</div>
<div class="section-space80">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title mb60">
                    <?php echo $news->content ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title text-center mb60">
                    <h1>Event Photos</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial parent-container" id="testimonial">
                <?php foreach($gallery as $item): ?>
                <div class="col-md-12 item">
                    <div class="testimonial-box  bg-default text-center">
                        <a href="<?php echo base_url().'assets/uploads/news/'.$item->image ?>" class="imghover">
                            <img src="<?php echo base_url().'assets/uploads/news/'.$item->image ?>" alt="Real Estate Broker Website Templates" class="img-responsive">
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
    </div>
</div>
<?php echo $main->footerFront() ?>