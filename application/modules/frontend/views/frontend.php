


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
            <div class="top_cssdiv"> <div class="left_div"> </div><div class="right_div"> <a href="<?php echo base_url() ?>frontend/signupar/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>" class="lang_menu mob_lan"> <i class="fa fa-globe" aria-hidden="true"></i> العربية </a> </div> </div>
            <div class="text-center">

                <img src="<?php echo base_url() ?>skin/admin2.3/frontend/images/logo.jpg" class="logo_350">
            </div>
            <br>
            <span class="login100-form-title p-b-30">
						<span class="text_login">Customer Survey</span>
						<span class="bor_login"></span>
					</span>
            <div style="text-align: center;">
            <span align="center" style="color:green;font-size:18px;" class="pull-none"><?php echo $this->session->flashdata('messages');?></span>
            </div>
            <br>	<br>
            <form class="login100-form validate-form " action="<?php echo base_url().'frontend/customersignupprocess'?>" method="post">
                <div class="row">

                    <div class="col-md-6">
                        <div class="wrap-input100 m-b-10" >
                            <input type="hidden" name="hidquestid" value="<?php echo $this->uri->segment(3);?>" />
                             <input type="hidden" name="hidqrcode" value="<?php echo $this->uri->segment(4);?>" />
                            
                            
                            <label>Name</label>
                            <input class="input100" type="text" name="customername" placeholder="Enter  name" required="">
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="wrap-input100  m-b-10" >
                            <label>Email ID</label>
                            <input class="input100" type="email" name="emailid" placeholder="Enter email id" required>
                            <div class="line"></div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="wrap-input100 m-b-10"  >
                            <label>Age </label>
                            <input class="input100" type="text" name="age" placeholder="Enter age" required>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="wrap-input100 m-b-10"  >
                            <label>Gender</label>
                            <!--mar-top12-->
                            <div class="" style="display:block">	<span> <input type="radio"  name="gender" id="male" value="Male" required>    <label for="male">Male</label></span>
                                <span><input type="radio"  name="gender" id="female" value="Female" required>    <label for="female">Female</label></span></div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="wrap-input100  m-b-10" >
                            <label>City </label>
                            <input class="input100" type="text" name="city" placeholder="Enter city" required>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="col-md-6">


                    </div>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn">
                        Continue
                    </button>
                    <!--<button type="button"   id="go">Go </button>-->
                </div>
            </form>
        </div>
        <div class="text-center " style="display: block;width: 100%;position: relative;">
            <p class="text-center  mb-md-0" style="color: #333;">Copyright 2021. DUNKIN . All rights reserved</p>
        </div>
    </div>

</div>


