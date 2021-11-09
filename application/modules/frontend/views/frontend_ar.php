

<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
            <div class="top_cssdiv"> <div class="left_div"> </div><div class="right_div"> <a href="<?php echo base_url() ?>frontend/signup/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>" class="lang_menu mob_lan"> <i class="fa fa-globe" aria-hidden="true"></i> English </a> </div> </div>
            <div class="text-center">
                <!--<img src="images/logo.jpg" class="logo_350">-->
                <img src="<?php echo base_url() ?>skin/admin2.3/frontend/images/logo.jpg" class="logo_350">
            </div>
            <br>
            <span class="login100-form-title p-b-30">
						<span class="text_login">استبيان العملاء</span>
						<span class="bor_login"></span>
					</span>

            <br>	<br>
            <form class="login100-form validate-form " action="<?php echo base_url().'frontend/customersignupprocessar'?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="wrap-input100 m-b-10" >
                            <label>الاسم</label>
                            <input type="hidden" name="hidquestid" value="<?php echo $this->uri->segment(3);?>" />
                             <input type="hidden" name="hidqrcode" value="<?php echo $this->uri->segment(4);?>" />
                            <input class="input100" type="text" name="customername"  placeholder="أدخل الاسم" required="">
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="wrap-input100  m-b-10" >
                            <label>البريد الالكتروني</label>
                            <input class="input100" type="email"  name="emailid" placeholder="أدخل البريد الإلكتروني" required>
                            <div class="line"></div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="wrap-input100 m-b-10"  >
                            <label>العمر </label>
                            <input class="input100" type="text" name="age" placeholder="أدخل العمر" required>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="wrap-input100 m-b-10"  >
                            <label>الجنس</label>
                            <div class="mar-top12">	<span><input type="radio"  name="gender" id="male" required value="Male">    <label for="male">ذكر</label></span>
                                <span><input type="radio"  name="gender" id="female" required value="Female">    <label for="female">أنثى</label></span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="wrap-input100  m-b-10" >
                            <label>المدينة </label>
                            <input class="input100" type="text" name="city" placeholder="أدخل المدينة" required>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="col-md-6">


                    </div>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn">
                        استمرار
                    </button>
                </div>
            </form>
        </div>
        <div class="text-center " style="display: block;width: 100%;position: relative;">
            <p class="text-center  mb-md-0" style="color: #333;">حقوق النشر 2021 . دانكن . جميع الحقوق محفوظة</p>
        </div>
    </div>

</div>



</body>
</html>
