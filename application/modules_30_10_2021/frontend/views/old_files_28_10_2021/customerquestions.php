

<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
            <div class="top_cssdiv"> <div class="left_div"><a href="index.html"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back</a> </div><div class="right_div"> <a href="index-ar.html" class="lang_menu mob_lan"> <i class="fa fa-globe" aria-hidden="true"></i> العربية </a> </div> </div>
            <div class="text-center">
                <!--<img src="images/logo.jpg" class="logo_350">-->
                <img src="<?php echo base_url() ?>skin/admin2.3/frontend/images/logo.jpg">
            </div>
            <br>
            <span class="login100-form-title p-b-30">
						<span class="text_login">Customer Survey</span>
						<span class="bor_login"></span>
					</span>

            <br>	<br>
            <form class="login100-form validate-form " method="post" action="<?php echo base_url();?>frontend/customerquestionsprocess">
                <div class="row">

                    <div class="col-md-12">
                        <?php
                        $j=0;
                        foreach($quest as $qt){?>
                        <div class="wrap-input100 m-b-10" >
                            <h5 class="m-b-15"><?php echo $qt->questiontitle;?></h5>
<input type="hidden" name="questiontitle<?php echo $j;?>" value="<?php echo $qt->questiontitle;?>" />
                            <input type="hidden" name="customerid<?php echo $j;?>" value="<?php echo $custid;?>" />
                        </div>
                            <?php
                            $options=array();
                            $answeropt=$qt->answeroptions;
                            $options = json_decode($answeropt, true);
//print_r($options);

                            ?>
                            <?php
                            $i=0;
                            if ($qt->category=='checkbox'){?>
                                <?php for($i=0;$i<count($options);$i++){?>
                                    <input type="hidden" name="hidcheck<?php echo $j;?><?php echo $i;?>" value="<?php echo $options[$i];?>" />
                            <div class="form-groupcheck">
                                <input type="checkbox" id="opt<?php echo $j;?><?php echo $i;?>" name="opt<?php echo $j;?><?php echo $i;?>" value="<?php echo $options[$i];?>">
                                <label for="opt<?php echo $j;?><?php echo $i;?>"><?php echo $options[$i];?></label>
                            </div>




                                    <?php }?>
                                <input type="hidden" name="checkboxcount<?php echo $j;?>" value="<?php echo $i;?>" />
                                <?php }?>
                            <?php
                            $k=0;
                            if ($qt->category=='radiobutton'){?>


                                <?php for($k=0;$k<count($options);$k++){?>
                                    <input type="hidden" name="hidradio<?php echo $j;?><?php echo $k;?>" value="<?php echo $options[$k];?>" />
                                    <div class="form-groupcheck">
                                        <input type="radio" id="radioopt<?php echo $j;?><?php echo $k;?>" name="radioopt<?php echo $j;?>" value="<?php echo $options[$k];?>">
                                        <label for="radioopt<?php echo $j;?><?php echo $k;?>"><?php echo $options[$k];?></label>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <input type="hidden" name="radioboxcount<?php echo $j;?>" value="<?php echo $k;?>" />
                            <?php if ($qt->category=='textbox'){?>
                                <div class="">
                                    <textarea class="form-control" name="inputopt<?php echo $j;?>"></textarea>
                                    <!--<label for="OriginalCoffee">Original Coffee</label>-->
                                </div>
                            <?php }?>
                                <br>
                            <input type="hidden" name="answer<?php echo $j;?>" value="<?php echo $qt->answer;?>" />
                            <input type="hidden" name="category<?php echo $j;?>" value="<?php echo $qt->category;?>" />

                            <input type="hidden" name="questid<?php echo $j;?>" value="<?php echo $qt->questionid;?>" />
                            <input type="hidden" name="questionnaireid<?php echo $j;?>" value="<?php echo $qt->questionnaireid;?>" />

<?php $j++; }?>
                        <input type="hidden" name="totcount" value="<?php echo $j;?>" />
                        <!--<div class="form-groupcheck">
                            <input type="checkbox" id="OriginalCoffee">
                            <label for="OriginalCoffee">Original Coffee</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="DecafCoffee">
                            <label for="DecafCoffee">Decaf Coffee</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="DarkRoastCoffee">
                            <label for="DarkRoastCoffee">Dark Roast Coffee</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="Cappuccino">
                            <label for="Cappuccino">Cappuccino</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="Latte">
                            <label for="Latte">Latte</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="Mocha">
                            <label for="Mocha">Mocha</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="HotChocolate">
                            <label for="HotChocolate">Hot Chocolate</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="Espresso">
                            <label for="Espresso">Espresso</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="KarakChai">
                            <label for="KarakChai">Karak Chai</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="Tea ">
                            <label for="Tea ">Tea </label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="IcedCoffee">
                            <label for="IcedCoffee">Iced Coffee</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="IcedMocha">
                            <label for="IcedMocha">Iced Mocha</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="IcedCaramelMacchiato">
                            <label for="IcedCaramelMacchiato">Iced Caramel Macchiato</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="IcedLatte">
                            <label for="IcedLatte">Iced Latte</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="ColdBrew">
                            <label for="ColdBrew">Cold Brew</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="FrozenDunkaccino">
                            <label for="FrozenDunkaccino">Frozen Dunkaccino</label>
                        </div>
                        <div class="form-groupcheck">
                            <input type="checkbox" id="Frappe ">
                            <label for="Frappe ">Frappe </label>
                        </div>-->

                    </div>



                    <div class="container-login100-form-btn p-t-20">

                        <button class="login100-form-btn">
                            Continue
                        </button>
                    </div>
            </form>
        </div>

    </div>
    <div class="text-center " style="display: block;width: 100%;position: relative;">
        <p class="text-center  mb-md-0" style="color: #333;">Copyright 2021. DUNKIN . All rights reserved</p>
    </div>
</div>
