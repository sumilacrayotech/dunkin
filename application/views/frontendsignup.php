<!DOCTYPE html>
<html>
<head>
    <style>


    </style>
    <?php
    $main = new Main();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dunkin Voucher Redemption Platform</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->


    <!-- Content Wrapper. Contains page content -->

    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/vendor/bootstrap/css/bootstrap.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/css/util.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/css/main.css');?>" >

<body>

    <?php echo $contents; ?>

    <script src="<?php echo $main->skinNew('frontend/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
    <!--===============================================================================================-->
    <!--<script src=<?php //echo $main->skinNew('frontend/js/main.js');?>"></script>-->

    <script type="text/javascript">
        /*function myFunction(){
            alert("hai1111");
        }*/
        $("#go").click(function() {
            alert("hai");
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
//alert("hai");
            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

// Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                    if (e < onStar) {
                        $(this).addClass('hover');
                    }
                    else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

// JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var msg = "";
                if (ratingValue > 1) {
                    msg = "Thanks! You rated this " + ratingValue + " stars.";
                }
                else {
                    msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                }
//responseMessage(msg);
//alert(msg);
            });


        });



    </script>
    <!-- /.content-wrapper -->
</body>
</html>


