<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dunkin CUSTOMER SURVEY</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <?php
    $main = new Main();
    ?>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/vendor/bootstrap/css/bootstrap.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/css/util.css');?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo $main->skinNew('frontend/css/main.css');?>" >
<!--===============================================================================================-->
<style type="text/css">
	.checkmark__circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 3;
  stroke-miterlimit: 10;
  stroke: #dc1985;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmarkc {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: block;
    stroke-width: 3;
    stroke: #dd1a86;
    stroke-miterlimit: 10;
    margin: 3% auto;
    box-shadow: inset 0px 0px 0px #dd1a86;
    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #fff;
  }
}
</style>
</head>
<body>
	
<?php
echo $contents;
?>

<script src="<?php echo $main->skinNew('frontend/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
<script src=<?php echo $main->skinNew('frontend/"js/main.js');?>"></script>
	


</body>
</html>