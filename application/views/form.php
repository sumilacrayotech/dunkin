<!DOCTYPE html>
<?php $admin=new Main();?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DUNKIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $admin->skin('bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $admin->skin('dist/css/skins/_all-skins.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $admin->skin('css/css/developer.css'); ?>">
    <link rel="stylesheet" href="<?php echo $admin->skin('css/css/icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo $admin->skin('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
    <link href="<?php echo $admin->skin('plugins/jstree/dist/themes/default/style.min.css'); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo $admin->skin('plugins/select2/select2.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $admin->skin('dist/css/AdminLTE.min.css'); ?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo $admin->skin('js/jquery.min.js'); ?>"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php echo $admin->header(); ?>

    <?php echo $admin->sidebar(); ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $contents; ?>
    </div>
    <!-- /.content-wrapper -->
    <?php echo $admin->footer();?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-user bg-yellow"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->
                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->
            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->
                    <h3 class="control-sidebar-heading">Chat Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo $admin->skin('bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $admin->skin('plugins/select2/select2.full.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo $admin->skin('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo $admin->skin('plugins/fastclick/fastclick.js'); ?>"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="<?php echo $admin->skin('plugins/forms/uniform/jquery.uniform.min.js'); ?>"></script>
<!--<script type="text/javascript" src="--><?php //echo $admin->skin('plugins/forms/select/select2.min.js'); ?><!--"></script>-->
<script type="text/javascript" src="<?php echo $admin->skin('plugins/forms/validate/jquery.validate.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $admin->skin('plugins/forms/wizard/jquery.bbq.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $admin->skin('plugins/forms/wizard/jquery.form.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $admin->skin('plugins/forms/wizard/jquery.form.wizard.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $admin->skin('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="<?php echo $admin->skin('plugins/jstree/dist/jstree.min.js'); ?>"></script>
<script src="<?php echo $admin->skin('plugins/jstree/ui-tree.demo.min.js'); ?>"></script>
<script src="<?php echo $admin->skin('plugins/jstree/apps.min.js'); ?>"></script>
<script src="<?php echo $admin->skin('plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo $admin->skin('plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo $admin->skin('plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
<script src="<?php echo $admin->skin('plugins/iCheck/icheck.min.js'); ?>"></script>
<script src="<?php echo $admin->skin('js/add_product.js'); ?>"></script>
<script src="<?php echo $admin->skin('js/attribute.js'); ?>"></script>
<script src="<?php echo $admin->skin('js/add_category.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo $admin->skin('dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $admin->skin('dist/js/demo.js'); ?>"></script>
<script>
    $(document).ready(function ()
    {
        App.init();
        TreeView.init();
    });
</script>
<script>
    $("#wizard").formwizard({
        formPluginEnabled: true,
        validationEnabled: true,
        focusFirstInput: true,
        formOptions: {
            success: function (data)
            {
                //alert(data);
                //produce success message
                //createSuccessMsg($("#wizard .msg"), "You successfully submit this form");
                //window.location.href="<?php echo base_url().'products';?>"
            },
            resetForm: false
        },
        disableUIStyles: true,
        showSteps: true, //show the step
        validationOptions: {
            rules: {
                fname: {
                    required: true,
                    minlength: 4
                },
                lname: {
                    required: true,
                    minlength: 4
                },
                gender: {
                    required: true
                },
                username1: {
                    required: true,
                    minlength: 4
                },
                password1: {
                    required: true,
                    minlength: 5
                },
                confirm_password1: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password1"
                },
                email1: {
                    required: true,
                    email: true
                }
            },
            messages: {
                fname: {
                    required: "This field is required",
                    minlength: "This field must consist of at least 4 characters"
                },
                lname: {
                    required: "This field is required",
                    minlength: "This field must consist of at least 4 characters"
                },
                password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email1: "Please enter a valid email address",
                gender: "Choose a gender"
            }
        }
    });
</script>
<script>
    $(function ()
    {
        //Initialize Select2 Elements
        $(".select2").select2();
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
</script>
</body>
</html>
