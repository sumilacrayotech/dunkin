
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>skin/admin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
			<div class="text-center">
				<img src="<?php echo base_url() ?>skin/admin/images/logo.jpg">
				<!-- <h6 class="h6_titile">Voucher Redemption Platform</h6> -->
                <?php echo $this->session->flashdata('message_name'); ?>
			</div>
			<br>
				<form class="login100-form validate-form" method="post" action="<?php echo base_url('users/loginAction')?>">
					<span class="login100-form-title p-b-30">
						<span class="text_login">Login Form </span>
						<span class="bor_login"></span>
					</span>
					<div class="wrap-input100 validate-input m-b-25"  data-validate = "User name is required">
						<input class="input100" type="text" name="user_code" required placeholder="User Name">
						<div class="line"></div>
						
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>
                    <div class="wrap-input100 validate-input m-b-25"  data-validate = "User Code is required">
                        <input class="input100" type="password" name="password" required placeholder="Password">
                       <div class="line"></div>
                        <span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
                    </div>
					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</body>




