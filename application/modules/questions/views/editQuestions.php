<script>
    $(function() {
        $("#skill_input").autocomplete({
            source: "<?php echo base_url('users/allStores') ?>",
            minLength: 3
        });
    });
</script>
<div class="content-wrapper" style="min-height: 525px;">
    <section class="content-header">
        <h1>
            Add Question
            <small class="small_css">Customer Survey Portal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Manage Questions</a></li>
            <li class="active"> Add Question</li>
        </ol>
    </section>
    <section class="content">
        <div class="box_new">
            <div class="row">
                <div class="col-lg-6 col-xs-12">

                    <form method="post" action="<?php echo base_url();?>questions/editquestionsprocess">
                        <span style="color:green;font-size:18px;"><?php echo $this->session->flashdata('messages');?></span>

                        <div class="form-group">
                            <label for="username">Select Questionnaire</label>
                            <select class="form-control" id="questionnaire" name="questionnaire" required>
                                <option value="">Please Select</option>
                                <?php foreach($questmain as $qtmain){?>
                                <option value="<?php echo $qtmain->questionnaireid;?>" <?php if ($questdt->questionnaireid==$qtmain->questionnaireid){?>selected <?php }?>><?php echo $qtmain->title;?></option>
                                <?php } ?>
                            </select>
                        </div><?php $pageid=$this->uri->segment(4);?>
                        <input type="hidden" class="form-control form_inputnew" placeholder="" name="pageid" id="" value="<?php echo $pageid;?>">
                        <input type="hidden" class="form-control form_inputnew" placeholder="" name="questionid" id="" value="<?php echo $questdt->questionid;?>">

                        <div class="form-group">
                            <label for="username"> Questions</label>
                            <textarea class="form-control" name="questions" required><?php echo $questdt->questiontitle;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="username"> Questions Arabic</label>
                            <textarea class="form-control" name="questionsarabic" required><?php echo $questdt->questiontitlearabic;?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="username">Questions Category</label>
                            <select class="form-control" id="questions_category" name="questions_category" required>
                                <option value="">Please Select</option>
                                <option value="textbox" <?php if ($questdt->category=='textbox'){?>selected <?php } ?>>Text Box</option>
                                <option value="checkbox" <?php if ($questdt->category=='checkbox'){?>selected <?php } ?>>Checkbox </option>
                                <option value="radiobutton" <?php if ($questdt->category=='radiobutton'){?>selected <?php } ?>>Radio Button</option>
                                <option value="rating" <?php if ($questdt->category=='rating'){?>selected <?php } ?>>Rating</option>
                            </select>
                        </div>
                        <?php
                        $options=array();
                        $optionsar=array();
                            $answeropt=$questdt->answeroptions;
                        $answeroptar=$questdt->answeroptionsarabic;
                            $options = json_decode($answeropt, true);
                        $optionsar = json_decode($answeroptar, true);
////print_r($options);
?>
                        <?php if (count($options) >=1){?>
                        <div class="form-group">
                            <label for="username">Edit  (Options)</label>

                        </div>
                        <?php } ?>
                        <div class="divmore1">
                            <?php for($i=0;$i<count($options);$i++){?>
                        <div class="form-group"><input type="text" class="form-control form_inputnew" value="<?php echo $options[$i];?>" placeholder=" Text Here"  required="" name="answeropt[]" style="width:45%" /><input type="text" class="form-control form_inputnew" value="<?php echo $optionsar[$i];?>" placeholder=" Text Here"  required="" name="answeroptar[]" style="width:45%" /> <a href="javascript:void(0);" class="remove_field1">Remove</a></div>
                            <?php } ?>
                        </div>



                        <div id="addoptions" style="display: none;">
                            <div class="form-group">
                                <label for="username">Add  (Options)</label>
                                <br>
                                <!--<input type="text" class="form-control form_inputnew" placeholder="Text Here" name="answeropt[]" id="" >-->
                            </div>
                            <div class="divmore"></div>
                            <p class="text-right"><button id="Array_city" class="add_fields ">Add More Options</button></p>

                            <?php //if ($questdt->category=='checkbox'){?>
                            <div class="form-group">
                                <label for="username"> Answer</label>
                                <textarea class="form-control" name="answer"><?php echo $questdt->answer;?></textarea>
                                <!--<input type="number" class="form-control " placeholder="" name="answer" id=""  style="width: 120px;">-->
                            </div>

                            <div class="form-group">
                                <label for="username"> Answer Arabic</label>
                                <textarea class="form-control" name="answerarabic"><?php echo $questdt->answerarabic;?></textarea>
                                <!--<input type="number" class="form-control " placeholder="" name="answer" id=""  style="width: 120px;">-->
                            </div>
<?php //}?>
                        </div>

                        <div class="form-group">
                            <label for="username"> Status</label>
                            <select class="form-control" name="status" required>
                                <option value="">Please Select</option>
                                <option value="Active" <?php if ($questdt->status=='Active'){?>selected <?php };?> >Active</option>
                                <option value="InActive" <?php if ($questdt->status=='InActive'){?>selected <?php };?>>InActive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username"> Question Type</label>
                            <select class="form-control" name="type" required>
                                <option value="">Please Select</option>
                                <option value="Mandatory" <?php if ($questdt->questiontype=='Mandatory'){?>selected <?php };?>>Mandatory</option>
                                <option value="Optional" <?php if ($questdt->questiontype=='Optional'){?>selected <?php };?>>Optional</option>
                            </select>
                        </div>




                        <button type="submit" class="btn_save">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<style type="text/css">
    .btn_save{
        color: #fff;
        border: solid 1px #ff6e0d;
        border-radius: 3px;
        background-color: #ff6e0d;
        padding: 5px 35px;
        font-size: 16px;
    }
    .btn_save:hover{
        border: solid 1px #db1a83;
        background-color: #db1a83;
    }
    .form_inputnew {
        display: inline-block;
        width: 80%;
    }
    .add_fields {
        border: 1px solid ghostwhite;
        color: #fff;
        background-color: #da1984;
        padding: 7px 15px;
        border-radius: 5px;
    }
    a.remove_field {
        color: red;
    }
</style>

<script type="text/javascript">
    $('#questions_category').on('change', function() {
        if ($('#questions_category').val() == 'textbox') {
            $('#addoptions').hide();
            $('.divmore1').hide();
        }
        else{
            $('#addoptions').show();
            $('.divmore1').show();
        }
    });

    $(document).ready(function() {
        <?php if (($questdt->category=='checkbox') || ($questdt->category=='radiobutton') || ($questdt->category=='rating')){?>
        $('#addoptions').show();
        <?php } else {?>
        $('#addoptions').hide();
        <?php } ?>
    });



</script>

<script type="text/javascript">
    //Add Input Fields
    $(document).ready(function() {
        var max_fields = 20; //Maximum allowed input fields
        var wrapper    = $(".divmore"); //Input fields wrapper
        var add_button = $(".add_fields"); //Add button class or ID
        var x = 1; //Initial input field is set to 1
var y=1;
//- Using an anonymous function:

        //When user click on add input button
        $(add_button).click(function(e){
            e.preventDefault();
            //Check maximum allowed input fields
            if(x < max_fields){
                x++; //input field increment
                //add input field
                $(wrapper).append('<div class="form-group"><input type="text" class="form-control form_inputnew"  placeholder=" Text Here"  required="" name="answeropt[]" style="width:45%" /><input type="text" class="form-control form_inputnew"  placeholder=" Text Here"  required="" name="answeroptar[]" style="width:45%"/>  <a href="javascript:void(0);" class="remove_field">Remove</a></div>');
            }
        });

        //when user click on remove button
        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //remove inout field
            x--; //inout field decrement
        });

        var wrapper1    = $(".divmore1");
        $(wrapper1).on("click",".remove_field1", function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            y--; //inout field decrement
        });


    });
</script>