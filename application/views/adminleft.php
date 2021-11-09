<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $admin = new Main();?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>Supr admin</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Force IE9 to render in normla mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Le styles -->
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <!-- Headings -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />  -->
    <!-- Text -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> --> 
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->
    <!-- Core stylesheets do not remove -->
    <link id="bootstrap" href="<?php echo base_url()?>skin/admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    

    <link href="<?php echo base_url()?>skin/admin/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Plugin stylesheets -->
    <link href="<?php echo base_url()?>skin/admin/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>skin/admin/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
    <!-- Main stylesheets -->
    <link href="<?php echo base_url()?>skin/admin/css/main.css" rel="stylesheet" type="text/css" /> 
    
    <link href="<?php echo base_url()?>skin/admin/plugins/tables/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>skin/admin/plugins/tables/dataTables/TableTools.css" type="text/css" rel="stylesheet" />
    
    <!-- Custom stylesheets ( Put your own changes here ) -->

    <!--[if IE 8]><link href="<?php echo base_url()?>skin/admin/css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/respond.min.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="application-name" content="Supr" /> 
    <meta name="msapplication-TileColor" content="#3399cc" /> 
    <!-- Load modernizr first -->
    <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/modernizr.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
    .crud_search {
    left: -36px;
    padding: 3px;
    position: relative;
    top: 0px;
    width: 79px !important;
}
.search_clear {
    padding: 3px;
}
.per_page {
    position: absolute !important;
    top: 0 !important;
}
.pcontrol {
    top: 0 !important;
}
.pDiv {
    height: 34px;
}
#form-button-save {
    left: -29px !important;
    position: relative;
}
#save-and-go-back-button {
    left: -133px !important;
    position: relative;
}
#cancel-button {
    left: -69px;
    position: relative;
}
.report-div.success.report-list {
    margin-top: 66px!important;
}
.pDiv {
    height: 53px;
    padding: 0 !important;
}

#uniform-form-button-save > span {
    color: #fff;
}
/*.main-table-box {
    margin-top: 95px!important;
    }
    .filtering_form {
    position: relative!important;
    top: -200px!important;
}*/
.crud-action > img {
    width: 20px;
}
    </style>
    </head>
    <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar" style="position: fixed;"></div>
    <?php echo $admin->header()?>
    <!-- End #header -->
    <div id="wrapper">
        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        <!--Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="#" class="tipR" title="Hide sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>
        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <?php echo $admin->sidebar()?><!-- End #sidebar -->
        <!-- Important plugins put in all pages -->
        <?php 
        foreach($css_files as $file): ?>
        	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach($js_files as $file): ?>
        	<script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/bootstrap/bootstrap.js"></script>  
        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/libs/jRespond.min.js"></script>
        <!-- Misc plugins -->
        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/misc/totop/jquery.ui.totop.min.js"></script> 
        <!-- Search plugin -->
        
        <!-- Form plugins -->
        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/plugins/forms/uniform/jquery.uniform.min.js"></script>
        <!-- Init plugins -->
        <script type="text/javascript" src="<?php echo base_url()?>skin/admin/js/main.js"></script><!-- Core js functions -->
        <!-- Init plugins only for page -->
            <!--Body content-->
        <?php echo $contents;?>
        <!-- End #content -->
    </div><!-- End #wrapper -->
    <!-- Le javascript
    ================================================== -->
    </body>
</html>