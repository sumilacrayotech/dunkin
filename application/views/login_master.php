<!DOCTYPE html>
<?php
$admin=new Main();?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dunkin Voucher Redemption Platform</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $admin->skin('bootstrap/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $admin->skin('dist/css/AdminLTE.min.css');?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $admin->skin('plugins/iCheck/square/blue.css');?>">
    <link rel="stylesheet" href="<?php echo $admin->skin('css/css/developer.css');?>">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">

<?php echo $contents;?>

<!-- jQuery 2.1.4 -->
<script src="<?php echo $admin->skin('plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo $admin->skin('bootstrap/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo $admin->skin('plugins/iCheck/icheck.min.js');?>"></script>
<script src="<?php echo $admin->skin('js/jquery.validate.js');?>"></script>
<script src="<?php echo $admin->skin('js/main-new.js');?>"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script type="text/javascript">
    $( document ).ready(function() {
        var vali= $("#adminlog").validate
        ({
            submitHandler: function(form)
            {
                $("#message").empty();
                $('#loading').show();
                $.ajax({
                    type:"POST",
                    url:'<?php echo base_url().'admin/admin_login';?>',
                    data:$("#adminlog input").serialize(),//only input
                    success: function(response)
                    {
                        $('#loading').hide();
                        $("#message").html();
                        var repage = '<?php echo base_url();?>index.php/dashboard';
                        if(response.trim()=='r')
                        {
                            window.location=repage;
                        }
                        else
                        {
                            $("#message").html(response);
                        }
                    }
                });
            }
        });
    });
</script>
</body>
</html>
