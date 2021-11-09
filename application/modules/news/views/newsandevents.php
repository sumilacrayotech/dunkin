<?php echo $main->headerFront(); ?>
<div class="page-header">
    <!-- page-header -->
    <div class="container">
        <div class="row page-section">
            <!-- page section -->
            <div class="col-md-offset-2 col-md-8">
                <!-- page description -->
                <div class="page-description">
                    <h1 class="page-title">News & Events</h1>
                    <p class="page-text">Update yourself on the latest industry trends and get the full picture of our company growth; through skimming these events and columns.</p>
                </div>
            </div>
            <!-- /.page description -->
        </div>
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="active">News & Events</li>
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
            <?php foreach($news as $news): ?>
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <div class="post-holder mb40">
                        <!-- post-holder -->
                        <div class="post-img mb30">
                            <a href="<?php echo base_url().'news/'.$news->url_key ?>" class="imghover"><img src="<?php echo base_url().'assets/uploads/news/'.$news->image ?>" alt="<?php echo $news->title ?>" class="img-responsive"></a>
                        </div>
                        <h2 class="post-title mb20"><a href="<?php echo base_url().'news/'.$news->url_key ?>" class="title" style="color:#23527c!important;"><?php echo $news->title ?></a></h2>
                        <div class="post-block ">
                            <div class="post-content">
                                <a href="<?php echo base_url().'news/'.$news->url_key ?>" class="btn-link">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php echo $main->footerFront() ?>
