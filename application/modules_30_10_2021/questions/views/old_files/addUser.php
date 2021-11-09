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

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="username"> Questions</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="username">Questions Category</label>
                            <select class="form-control" id="questions_category">
                                <option value="textbox">Text Box</option>
                                <option value="checkbox">Checkbox </option>
                                <option value="radiobutton">Radio Button</option>
                            </select>
                        </div>
                        <div id="addoptions" style="display: none;">
                            <div class="form-group">
                                <label for="username">Add  (Options)</label>
                                <br>
                                <input type="text" class="form-control form_inputnew" placeholder="Text Here" name="text" id="" >
                            </div>
                            <div class="divmore"></div>
                            <p class="text-right"><button id="Array_city" class="add_fields ">Add More Options</button></p>
                            <div class="form-group">
                                <label for="username"> Answer</label>
                                <input type="number" class="form-control " placeholder="" name="text" id=""  style="width: 120px;">
                            </div>

                        </div>

                        <button type="submit" class="btn_save">ADD</button>
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
        }
        else{
            $('#addoptions').show();
        }
    });
</script>

<script type="text/javascript">
    //Add Input Fields
    $(document).ready(function() {
        var max_fields = 20; //Maximum allowed input fields
        var wrapper    = $(".divmore"); //Input fields wrapper
        var add_button = $(".add_fields"); //Add button class or ID
        var x = 1; //Initial input field is set to 1

//- Using an anonymous function:

        //When user click on add input button
        $(add_button).click(function(e){
            e.preventDefault();
            //Check maximum allowed input fields
            if(x < max_fields){
                x++; //input field increment
                //add input field
                $(wrapper).append('<div class="form-group"><input type="text" class="form-control form_inputnew"  placeholder=" Text Here"  required="" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div>');
            }
        });

        //when user click on remove button
        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //remove inout field
            x--; //inout field decrement
        })
    });
</script>