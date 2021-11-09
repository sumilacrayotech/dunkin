<div class="limiter">
    <div class="container-login100">

        <?php foreach($quest as $qt){
           $qtid=$qt->questionnaireid;
        }?>
        <div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
            <div class="top_cssdiv"> <div class="left_div"> </div><div class="right_div"> <a href="<?php echo base_url();?>frontend/custlistmainquestions/<?php echo $this->uri->segment(3);?>/<?php echo $qtid;?>/<?php echo $this->uri->segment(5);?>" class="lang_menu mob_lan"> <i class="fa fa-globe" aria-hidden="true"></i> English </a> </div> </div>
            <div class="text-center">

                <img src="<?php echo base_url() ?>skin/admin2.3/frontend/images/logo.jpg" class="logo_350">
            </div>
            <br>
            <span class="login100-form-title p-b-30">
						<span class="text_login">ستبيان العملاء</span>
						<span class="bor_login"></span>
					</span>

            <br>	<br>
            <form class="login100-form validate-form " method="post" action="<?php echo base_url();?>frontend/customerquestionsprocessar" onsubmit="return valthisform();">
                <div class="row">
<input type="hidden" name="hidqrcode" value="<?php echo $qrcode;?>" />
                        
                    <div class="col-md-12">
                        <?php
                        $j=0;
                        foreach($quest as $qt){?>
                        <div class="wrap-input100 m-b-10" >
                            <h5 class="m-b-15"><?php if ($qt->questiontype=='Mandatory'){?><span class="Mandatory">*</span>  <?php } ?><?php echo $qt->questiontitlearabic;?></h5>
<input type="hidden" name="questiontitle<?php echo $j;?>" value="<?php echo $qt->questiontitlearabic;?>" />
                            <input type="hidden" name="customerid<?php echo $j;?>" value="<?php echo $custid;?>" />
                        </div>
                            <?php
                            $options=array();
                            $answeropt=$qt->answeroptionsarabic;
                            $options = json_decode($answeropt, true);
//print_r($options);

                            ?>
                            <?php
                            $i=0;
                            if ($qt->category=='checkbox'){?>
                                <?php for($i=0;$i<count($options);$i++){?>
                                    <input type="hidden" name="hidcheck<?php echo $j;?><?php echo $i;?>" value="<?php echo $options[$i];?>" />
                            <div class="form-groupcheck">
                                <input type="checkbox" class="check<?php echo $j;?>" id="opt<?php echo $j;?><?php echo $i;?>" name="opt<?php echo $j;?><?php echo $i;?>" value="<?php echo $options[$i];?>" onclick=updatecount("<?php echo $j;?>","<?php echo $qt->questiontype?>",<?php echo $i;?>)>
                                <label for="opt<?php echo $j;?><?php echo $i;?>"><?php echo $options[$i];?></label>
                            </div>




                                    <?php }?>
                                <input type="hidden" name="hidcheckboxcount<?php echo $j;?>"  id="hidcheckboxcount<?php echo $j;?>" value="0" />
                                <input type="hidden" name="checkboxcount<?php echo $j;?>" value="<?php echo $i;?>" />
                                <?php }?>

                            <input type="hidden" id="hidman<?php echo $j;?>" name="hidman<?php echo $j;?>" value="<?php echo $qt->questiontype;?>" />

                            <input type="hidden" name="hidtype<?php echo $j;?>"  id="hidtype<?php echo $j;?>" value="<?php echo $qt->category;?>" />


                            <?php
                            $k=0;
                            if ($qt->category=='radiobutton'){?>


                                <?php for($k=0;$k<count($options);$k++){?>
                                    <input type="hidden" name="hidradio<?php echo $j;?><?php echo $k;?>" value="<?php echo $options[$k];?>" />
                                    <div class="radio_div">
                                        <input type="radio" id="radioopt<?php echo $j;?><?php echo $k;?>" name="radioopt<?php echo $j;?>" value="<?php echo $options[$k];?>" <?php if ($qt->questiontype=='Mandatory'){?> Required <?php } ?>>
                                        <label for="radioopt<?php echo $j;?><?php echo $k;?>"><?php echo $options[$k];?></label>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <input type="hidden" name="radioboxcount<?php echo $j;?>" value="<?php echo $k;?>" />
                            <?php if ($qt->category=='textbox'){?>
                                <div class="">
                                    <textarea class="form-control" name="inputopt<?php echo $j;?>" <?php if ($qt->questiontype=='Mandatory'){?> Required <?php } ?>></textarea>
                                    <!--<label for="OriginalCoffee">Original Coffee</label>-->
                                </div>
                            <?php }?>


                            <?php if ($qt->category=='rating'){?>


                                <div class="row  m-b-20">
                                    <div class="col-md-12">
                                        <!--<div class="wrap-input100 m-b-5" >
                                            <h5 class="m-b-10 "><?php //cho $qt->answer;?></h5>

                                        </div>-->
                                        <label class="colo333">الرجاء وضع تقييمك للنقاط أدناه:</label>


                                    </div>
                                </div>

                                <?php
                                $optionsar=array();
                                $answeropt=$qt->answeroptionsarabic;
                                $optionsar = json_decode($answeropt, true);
//print_r($optionsar);

                                ?>


                                <?php for ($m = 0; $m < count($optionsar); $m++) { ?>
                                    <input type="hidden" name="hidrating<?php echo $j;?><?php echo $m;?>" value="0" id="hidrating<?php echo $j;?><?php echo $m;?>"/>

                                    <div class="row  m-b-10 ">
                                        <div class="col-md-5">
                                            <label class="label_css"><?php echo $optionsar[$m];//echo $qt->answer;?></label>
                                            <input type="hidden" name="hidratingrate<?php echo $j;?><?php echo $m;?>" value="<?php echo $optionsar[$m];?>" />
                                        </div>
                                        <div class="col-md-6">

                                            <div class='rating-stars '>
                                                <ul id='stars' style="">
                                                    <li class='star' title='Poor' data-value='1' onclick="getst(<?php echo $j;?>,<?php echo $m;?>,1);">
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Fair' data-value='2' onclick="getst(<?php echo $j;?>,<?php echo $m;?>,2);">
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Good' data-value='3' onclick="getst(<?php echo $j;?>,<?php echo $m;?>,3);">
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='Excellent' data-value='4' onclick="getst(<?php echo $j;?>,<?php echo $m;?>,4);">
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star' title='WOW!!!' data-value='5' onclick="getst(<?php echo $j;?>,<?php echo $m;?>,5);">
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>


                                    </div>

                                <?php } ?>


                            <?php }?>

                            <input type="hidden" name="ratecount<?php echo $j;?>" value="<?php echo $m;?>" />












                            <br>
                            <input type="hidden" name="answer<?php echo $j;?>" value="<?php echo $qt->answerarabic;?>" />
                            <input type="hidden" name="category<?php echo $j;?>" value="<?php echo $qt->category;?>" />

                            <input type="hidden" name="questid<?php echo $j;?>" value="<?php echo $qt->questionid;?>" />
                            <input type="hidden" name="questionnaireid<?php echo $j;?>" value="<?php echo $qt->questionnaireid;?>" />

<?php $j++; }?>
                        <input type="hidden" name="totcount" id="totcount" value="<?php echo $j;?>" />
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

                        <button type="submit" class="login100-form-btn">
                            استمرار
                        </button>

                    </div>
            </form>
        </div>

    </div>
    <div class="text-center " style="display: block;width: 100%;position: relative;">
        <p class="text-center  mb-md-0" style="color: #333;">حقوق النشر 2021 . دانكن . جميع الحقوق محفوظة</p>
    </div>
</div>
<script>
    function getst(row,col,no){

        $("#hidrating"+row+col).val(no);

    }

    function updatecount(j,type,i) {
        if ($(".check" + j).is(":checked")) {
            $("#hidcheckboxcount" + j).val(1);
        } else {
            $("#hidcheckboxcount" + j).val(0);
        }
    }





    function valthisform() {
        var flag = 0;
        var j=$("#totcount").val();
        //alert(j);
        var i = 0;
        for (i = 0; i < j; i++) {

            var hidtype = $("#hidtype" + i).val();

            var hidman = $("#hidman" + i).val();


            if (hidtype=='checkbox'){
                var  chkbox=$("#hidcheckboxcount"+i).val();

                if (hidman=='Mandatory' && chkbox==0){
                    alert("Please select the checkboxes");

                    flag=1;
                    break;
                }}



        }
        if (flag==1){
            return false;
        }
        else {
            return true;
        }

    }







</script>