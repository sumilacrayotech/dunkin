<?php echo $main->headerFront() ?>
<style>
    .wt-team-media img {
        height: 375px;
    }
</style>
<div class="page-content">
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper" style="background-image:url(<?php echo $main->skinFront('images/banner/about-banner.jpg') ?>);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="wt-bnr-inr-entry">
                <h1 class="text-white">Our Team</h1>
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
    <!-- BREADCRUMB ROW -->
    <div class="bg-gray-light p-tb20">
        <div class="container">
            <ul class="wt-breadcrumb breadcrumb-style-2">
                <li><a href="javascript:void(0);"><i class="fa fa-home"></i> Home</a></li>
                <li>Our Team</li>
            </ul>
        </div>
    </div>
    <!-- BREADCRUMB ROW END -->
    <!-- OUR TEAM MEMBER SECTION START -->
    <div class="section-full wt-our-team bg-white p-t80 p-b50">
        <div class="container">

            <!-- TITTLE START -->
            <div class="section-head text-center">
                <h2 class="text-uppercase">Our team</h2>
                <div class="wt-separator-outer">
                    <div class="wt-separator style-square">
                        <span class="separator-left bg-primary"></span>
                        <span class="separator-right bg-primary"></span>
                    </div>
                </div>
                <?php echo $main->StaticBlock(1)->content ?>
            </div>
            <!-- TITLE END -->
            <div class="section-content">
                <div class="row">
                    <?php foreach($teams as $team):?>
                        <!-- COLUMNS 1 -->
                        <div class="col-md-3 col-sm-6 col-xs-6 col-xs-100pc m-t30">
                            <div class="wt-team-four">
                                <div class="wt-team-media">
                                    <a href="javascript:void(0);"><img src="<?php echo base_url().'assets/uploads/team/'.$team->image?>" alt="" ></a>
                                </div>
                                <div class="wt-team-info">
                                    <div class="wt-team-skew-block">
                                        <div class="social-icons-outer p-a20">
                                            <ul class="social-icons social-square social-dark white-border m-b0">
                                                <?php if($team->facebook_url): ?>
                                                    <li><a href="<?php echo $team->facebook_url ?>" class="fa fa-facebook"></a></li>
                                                <?php endif; ?>
                                                <?php if($team->twitter_url): ?>
                                                    <li><a href="<?php echo $team->twitter_url ?>" class="fa fa-twitter"></a></li>
                                                <?php endif; ?>
                                                <?php if($team->linked_in_url): ?>
                                                    <li><a href="<?php echo $team->linked_in_url ?>" class="fa fa-linkedin"></a></li>
                                                <?php endif; ?>
                                                <?php if($team->rss_feed_url): ?>
                                                    <li><a href="<?php echo $team->rss_feed_url ?>" class="fa fa-rss"></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-a20">
                                        <h4 class="wt-team-title text-uppercase"><a href="javascript:void(0);"><?php echo $team->name ?></a></h4>
                                        <p><?php echo $team->designation?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 2 -->
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
    <!-- OUR TEAM MEMBER SECTION End -->
</div>
<?php echo $main->footerFront() ?>
