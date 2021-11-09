<!DOCTYPE html>
<html>
<head>
    <?php $main = new Main(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DUNKIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('bootstrap/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('plugins/daterangepicker/daterangepicker-bs3.css')?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('plugins/datepicker/datepicker3.css')?>">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('plugins/iCheck/all.css')?>">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('plugins/colorpicker/bootstrap-colorpicker.min.css')?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('plugins/timepicker/bootstrap-timepicker.min.css')?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('plugins/select2/select2.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('dist/css/AdminLTE.min.css')?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $main->skinNew('dist/css/skins/_all-skins.min.css')?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        base_url = "<?php echo base_url() ?>";
    </script>
    <script src="<?php echo $main->skinNew('plugins/jQuery/jQuery-2.2.0.min.js')?>"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php echo $main->header();?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $main->sidebar();?>

    <!-- Content Wrapper. Contains page content -->
    <?php echo $contents; ?>
    <!-- /.content-wrapper -->
    <?php echo $main->footer();?>
    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $main->skinNew('bootstrap/js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo $main->skinNew('plugins/select2/select2.full.min.js')?>"></script>
<!-- InputMask -->
<script src="<?php echo $main->skinNew('plugins/input-mask/jquery.inputmask.js')?>"></script>
<script src="<?php echo $main->skinNew('plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
<script src="<?php echo $main->skinNew('plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>
<script type="text/javascript" src="<?php echo $main->skin('plugins/forms/validate/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo $main->skin('js/add_product.js'); ?>"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo $main->skinNew('plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo $main->skinNew('plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo $main->skinNew('plugins/colorpicker/bootstrap-colorpicker.min.js')?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo $main->skinNew('plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo $main->skinNew('plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo $main->skinNew('plugins/iCheck/icheck.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo $main->skinNew('plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo $main->skinNew('dist/js/app.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $main->skinNew('dist/js/demo.js')?>"></script>
<!-- Page script -->
<script src="<?php echo $main->skinNew('js/advancedForm.js')?>"></script>
</body>
</html>
