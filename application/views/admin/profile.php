<!DOCTYPE html>
<?php $admin= new superadmin();?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | User Profile</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo $admin->skin('bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $admin->skin('dist/css/AdminLTE.min.css'); ?>"
    ">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $admin->skin('dist/css/skins/_all-skins.min.css'); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo $admin->skin('js/jquery.min.js');?>"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php echo $admin->header(); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $admin->sidebar(); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $contents; ?>
    </div>
    <!-- /.content-wrapper -->
    <?php echo $admin->footer();?>
</div>
<script src="<?php echo $admin->skin('bootstrap/js/bootstrap.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo $admin->skin('plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo $admin->skin('plugins/fastclick/fastclick.js');?>"></script>


<!-- AdminLTE App -->
<script src="<?php echo $admin->skin('dist/js/app.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $admin->skin('dist/js/demo.js');?>"></script>
</body>
</html>
