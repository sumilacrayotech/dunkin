

<div class="limiter">
    <div class="container-login100">
        <?php foreach($quest as $qt){
            $qtid=$qt->questionnaireid;
        }?>
        <div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
            <div class="top_cssdiv"> <div class="left_div"><a href="<?php echo base_url();?>frontend/signup/<?php echo $qid;?>/<?php echo $this->uri->segment(5);?>"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back</a> </div><div class="right_div"> <a href="<?php echo base_url();?>frontend/custlistmainquestionsar/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>" class="lang_menu mob_lan"> <i class="fa fa-globe" aria-hidden="true"></i> العربية </a> </div> </div>
            <div class="text-center">
                <!--<img src="images/logo.jpg" class="logo_350">-->
                <img src="<?php echo base_url() ?>skin/admin2.3/frontend/images/logo.jpg" class="logo_350">
            </div>
            <br>
            <span class="login100-form-title p-b-30">
                        <span class="text_login">Customer Survey</span>
                        <span class="bor_login"></span>
                    </span>

            <br>    <br>
            <form class="login100-form validate-form " method="post" action="<?php echo base_url();?>frontend/customerquestionsprocess">
                <div class="row">

                    <div class="col-md-12">
                        
                         <input type="hidden" name="hidqrcode" value="<?php echo $qrcode;?>" />
                        
                        
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
                            <div class="form-groupcheck checkbox-group" >
                                <!--<input type="checkbox"  id="opt<?php echo $j;?><?php echo $i;?>" name="opt<?php //echo $j;?><?php //echo $i;?>" value="<?php //echo $options[$i];?>">-->
                                <input type="checkbox" class="check<?php echo $j;?>" id="opt<?php echo $j;?><?php echo $i;?>" name="opt<?php echo $j;?><?php echo $i;?>" value="<?php echo $options[$i];?>" onclick=updatecount("<?php echo $j;?>","<?php echo $qt->questiontype?>",<?php echo $i;?>)>
                                <label for="opt<?php echo $j;?><?php echo $i;?>"><?php echo $options[$i];?></label>
                            </div>




                                    <?php }?>
                                    <input type="text" id="hidman<?php echo $j;?>" name="hidman<?php echo $j;?>" value="<?php echo $qt->questiontype;?>" />
                                <input type="text" name="hidtype<?php echo $j;?>"  id="hidtype<?php echo $j;?>" value="<?php $qt->category;?>" />
                                <input type="text" name="hidcheckboxcount<?php echo $j;?>"  id="hidcheckboxcount<?php echo $j;?>" value="0" />
                                <input type="hidden" name="checkboxcount<?php echo $j;?>" value="<?php echo $i;?>" />
                                <?php }?>
                            <?php
                            $k=0;
                            if ($qt->category=='radiobutton'){?>


                                <?php for($k=0;$k<count($options);$k++){?>
                                    <input type="hidden" name="hidradio<?php echo $j;?><?php echo $k;?>" value="<?php echo $options[$k];?>" />
                                    <div class="radio_div">
                                        <input type="radio" id="radioopt<?php echo $j;?><?php echo $k;?>" name="radioopt<?php echo $j;?>" value="<?php echo $options[$k];?>" <?php if ($qt->questiontype=='Mandatory'){?> Required <?php } ?> />
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

                                <input type="hidden" name="hidrating<?php echo $j;?>"  id="hidrating<?php echo $j;?>"/>
                                <div class="row  m-b-20">
                                    <div class="col-md-12">
                                        <!--<div class="wrap-input100 m-b-5" >
                                            <h5 class="m-b-10 "><?php //cho $qt->answer;?></h5>

                                        </div>-->
                                        <label class="colo333">Please select your rating below:</label>


                                    </div>
                                </div>

                                <div class="row  m-b-10 ">
                                  <div class="col-md-5">
                                        <label class="label_css"><?php echo $qt->answer;?></label>

                                    </div>
                                    <div class="col-md-6">

                                        <div class='rating-stars '>
                                            <ul id='stars'>
                                                <li class='star' title='Poor' data-value='1' onclick="getst(<?php echo $j;?>,1);">
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Fair' data-value='2' onclick="getst(<?php echo $j;?>,2);">
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Good' data-value='3' onclick="getst(<?php echo $j;?>,3);">
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Excellent' data-value='4' onclick="getst(<?php echo $j;?>,4);">
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='WOW!!!' data-value='5' onclick="getst(<?php echo $j;?>,5);">
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <?php }?>



                                <br>
                            <input type="hidden" name="answer<?php echo $j;?>" value="<?php echo $qt->answer;?>" />
                            <input type="hidden" name="category<?php echo $j;?>" value="<?php echo $qt->category;?>" />

                            <input type="hidden" name="questid<?php echo $j;?>" value="<?php echo $qt->questionid;?>" />
                            <input type="hidden" name="questionnaireid<?php echo $j;?>" value="<?php echo $qt->questionnaireid;?>" />

<?php $j++; }?>
                        <input type="hidden" name="totcount" value="<?php echo $j;?>" />
                        <input type="button" value="Go" onclick="myFunction()" />
                      

                    </div>



                    <div class="container-login100-form-btn p-t-20">

                        <button type="submit" class="login100-form-btn" onclick="return valthisform(<?php echo $j;?>);" >
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
<script type="text/javascript">
    function myFunction(){
        alert("hai12");
    }
    /*$("#go").click(function() {
        alert("hai");
    });*/
</script>
<script>

    var custom_arr1 = [];
    function valthisform(j){
        var flag=0;
        alert(j);
        var i=0;
         for(i=0;i<j;i++){
             alert("en");
             var hidtype=$("#hidtype"+i).val();
              alert(hidtype);
              /*var hidman=$("#hidman"+i).val();
              alert(hidman);

             if (hidtype=='checkbox'){
                 /*var  chkbox=$("#hidcheckboxcount"+i).val();
                 alert(chkbox);
  if (hidman=='Mandatory' && chkbox==0){
      alert("Please select the checkboxes");
      flag=1;
      break;
  }*/

             // }
          }
          alert("kkk"+flag);
          if (flag==1){
              return false;
          }
          else {
              return true;
          }
    }








    function updatecount(j,type,i){
        if ($(".check"+j).is(":checked")){
            $("#hidcheckboxcount"+j).val(1);
        }
        else{
            $("#hidcheckboxcount"+j).val(0);
        }



        /*var count=0;

var val;*/

//storing value in array

//if (type=='Mandatory'){
    /*if($("#opt"+j+i).is(':checked')){
        // Code in the case checkbox is checked.
        alert("checked");
        val=$("#opt"+j+i).val();
        alert(val);
        //count++;
        custom_arr1.push(val);

    } else {
        // Code in the case checkbox is NOT checked.
        alert("not checked");
        val=$("#opt"+j+i).val();
        custom_arr1.pop(val);
       // count--;
    }
alert(custom_arr1.length);*/
   /* var atLeastOneIsChecked = false;
    $('#check'+j).each(function () {
        if ($(this).is(':checked')) {
            atLeastOneIsChecked = true;

            return false;
        }
    });*/

//$("#hidcheckboxcount"+j).val(custom_arr1.length);

//}
    }
    function getst(row,no){

        $("#hidrating"+row).val(no);

    }


</script>