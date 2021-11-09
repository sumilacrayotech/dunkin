<section class="content-header">
    <h1>
        Manage Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage Users</li>
    </ol>
</section>
<script>
    /*$(function() {
        $("#store_name_input_box").autocomplete({
            source: "<?php //echo base_url('users/allStores') ?>",
            minLength: 3,
            change: function() {
                $("#field-store_name").val("");
            }
        });


    });*/

    /*$(function () {


        $("#field-store_name").autocomplete({

            source: "<?php echo base_url('users/allStores') ?>"
        });
    });*/


    $(function () {
        $('#field-store_name').autocomplete({
            //source: [{'label': 'milan', 'value': '1'}, {'label': 'minos', 'value': '2'}],
            source: "<?php echo base_url('users/allStoresvalue') ?>",
            focus: function( event, ui ) {
                event.preventDefault();
                $('#field-store_name').val(ui.item.label);
            },
            select: function( event, ui ) {
                event.preventDefault();
                $('#field-store_name').val(ui.item.label);
                //$('#txt1').val(ui.item.value);
                alert(ui.item.value);
                $('input[name="store_id"]').val(ui.item.value);
            }
        });
    });






    /*$(function () {


        $("#skill_input").autocomplete({

            source: "<?php echo base_url('users/allStores') ?>"
        });
    });*/

    $(function () {
        $('#skill_input').autocomplete({
            //source: [{'label': 'milan', 'value': '1'}, {'label': 'minos', 'value': '2'}],
            source: "<?php echo base_url('users/allStoresvalue') ?>",
            focus: function( event, ui ) {
                event.preventDefault();
                $('#skill_input').val(ui.item.label);
            },
            select: function( event, ui ) {
                event.preventDefault();
                $('#skill_input').val(ui.item.label);
                //$('#txt1').val(ui.item.value);
                alert(ui.item.value);
                $('input[name="store_id"]').val(ui.item.value);
            }
        });
    });





    /*$(function () {
        var getData = function (request, response) {
            $.getJSON(
                "http://gd.geobytes.com/AutoCompleteCity?callback=?&q=" + request.term,
                function (data) {
                    response(data);
                });
        };

        var selectItem = function (event, ui) {
            $("#field-store_name").val(ui.item.value);
            return false;
        }

        $("#myText").autocomplete({
            source: getData,
            select: selectItem,
            minLength: 4,
            change: function() {
                $("#field-store_name").val("").css("display", 2);
            }
        });
    });*/





</script>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div>
        <?php echo $this->session->flashdata('message_name'); ?>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <!--<h3 class="box-title">Office Staff</h3>-->
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php echo $output; ?>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!--<script>
    $(document).ready(function(){
        $('.add_button').attr('href','<?php /*//echo base_url().'employee/add_staff';*/?>');
    });
</script>
-->