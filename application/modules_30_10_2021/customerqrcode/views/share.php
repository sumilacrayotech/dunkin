<style>
    /* .add-anchor.add_button {
         display: none;
     }*/
</style>
<!-- Main content -->
<section class="content" style="height: 850px">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Voucher List</h3>
        </div>
        <div class="box-body">

            <div class="table_voucher">
                <div class="text-right">
                    <a href="javascript:void(0)" onclick="doRequest(0)" class="sending_btn">SEND</a>
                </div>
                <br>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>VOUCHER NUMBER</th>
                        <th>NAME</th>
                        <th>EXPIRY FROM</th>
                        <th>EXPIRY TO</th>
                        <th>STATUS</th>
                        <th>EMAIL</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $i = 0;
                    $j = '';
                    foreach ($vouchers as $voucher): $i++;
                        $j .= $voucher->id.',' ;
                    ?>
                    <tr>
                        <td><?php echo $voucher->id ?></td>
                        <td><?php echo $voucher->number ?></td>
                        <td><?php echo $voucher->name ?></td>
                        <td><?php echo $voucher->expiry_from ?></td>
                        <td><?php echo $voucher->expiry_to ?></td>
                        <td><?php echo $voucher->status ?></td>
                        <td><?php echo $voucher->email_id ?></td>
                        <td>
                            <img style="width: 24%;display: none;" id="<?php echo $voucher->id ?>" src="<?php echo base_url('skin/frontend/images/103.gif') ?>" />
                            <div id="<?php echo $voucher->id ?>_status">Pending</div>
                        </td>
                    </tr>
                    <div id="addemail_model<?php echo $i?>" class="modalstle addemail_model" style="display: none;">
                        <div class="modal-contentstyle01">
                            <div>
                                <a class="close03" href="<?php echo base_url('voucher/share') ?>" >×</a>
                            </div>
                            <form method="post" action="<?php echo base_url('voucher/downloadPdf') ?>">
                                <input type="hidden" id="id" value="<?php echo $voucher->id ?>">
                                <div class="form-group row text-left">
                                    <label for="from" class="col-sm-12 col-form-label small_first ">Add Email ID</label>
                                </div>
                                <div class="form-group row">
                                    <label for="from" class="col-sm-2 col-form-label small_second">Email ID</label>
                                    <div class="col-md-8 col-sm-10">
                                        <input type="email" class="form-control" name="email" aria-describedby="from" placeholder="">
                                    </div>
                                </div>
                                <button type="submit" class="btn_save" style="background-color: #ff7f27;color: #fff;padding: 10px 8px;font-size: 15px;border: 1px solid #ff7f27;border-radius: 3px;width: 48%;font-weight: 500;line-height: 1;margin-left: 13px;"> SAVE </button>
                            </form>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function(){
                            var modal2=document.getElementById("addemail_model<?php echo $i?>"),
                                span2=document.getElementsByClassName("close03")[0];
                            span2.onclick=function(){modal2.style.display="none"};
                        });
                        $(".addemail_btn<?php echo $i ?>").click(function() {
                            $('#addemail_model<?php echo $voucher->id ?>').show();
                        });
                    </script>
                    <?php
                    endforeach;
                    $jArray =  rtrim($j, ',');
                    echo '<script>
                            var toRequest = new Array('.$jArray.');
                          </script>';
                    ?>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<div id="downloadpdf_model" class="modalstle downloadpdf_model" style="display: none;">
    <div class="modal-contentstyle01">
        <div>
            <span class="close02">×</span>
        </div>
        <form method="post" action="<?php echo base_url('voucher/downloadPdf') ?>">
            <div class="form-group row text-left">
                <label for="from" class="col-sm-12 col-form-label small_first ">Range (ID)</label>
            </div>
            <div class="form-group row">
                <label for="from" class="col-sm-2 col-form-label small_second">From</label>
                <div class="col-md-8 col-sm-10">
                    <input type="number" class="form-control" name="from" aria-describedby="from" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="to" class="col-sm-2 col-form-label small_second"> To</label>
                <div class="col-md-8  col-sm-10">
                    <input type="number" class="form-control" name="to" aria-describedby="to" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="to" class="col-sm-2 col-form-label small_second">Voucher Name</label>
                <div class="col-md-8  col-sm-10">
                    <input type="text" class="form-control" name="voucher_name" aria-describedby="to" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="to" class="col-sm-2 col-form-label small_second">Company</label>
                <div class="col-md-8  col-sm-10">
                    <select class="form-control" name="company">
                        <option value="">---Select Company---</option>
                        <?php foreach ($companies as $company): ?>
                            <option value="<?php echo $company->name ?>"><?php echo $company->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn_save" style="background-color: #ff7f27;color: #fff;padding: 10px 8px;font-size: 15px;border: 1px solid #ff7f27;border-radius: 3px;width: 48%;font-weight: 500;line-height: 1;margin-left: 13px;"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download PDF </button>
        </form>
    </div>
</div>
<script>
    function doRequest(index) {
        $('#'+toRequest[index]).show();
        $('#'+toRequest[index]+'_status').hide();
        $.ajax({
            url:'<?php echo base_url('voucher/sendEmail') ?>?data='+toRequest[index],
            async:true,
            success: function(data){
                $('#'+toRequest[index]).hide();
                if(data==1){
                    $('#'+toRequest[index]+'_status').html('Completed');
                }
                if(data==0){
                    $('#'+toRequest[index]+'_status').html('Email Id not available');
                }
                if(data==2){
                    $('#'+toRequest[index]+'_status').html('Failed');
                }
                if (index+1<toRequest.length) {
                    doRequest(index+1);
                }
                $('#'+toRequest[index]+'_status').show();
            }
        });
    }
</script>
<style type="text/css">
    .table_voucher table{
        width: 100%;
    }
    .table_voucher table{
        border: solid 1px #ddd;
    }
    .table_voucher table tr th {
        text-transform: uppercase;
        vertical-align: middle !important;
        background-color: #ddd;
        padding: 10px 8px;
        font-size: 12px;
    }
    .table_voucher table tr th, .table_voucher table tr td {
        text-align: left;
        font-size: 15px;
        border-right: 1px solid #ddd;
        border-left: 1px solid #ddd;
        border-bottom: 1px solid #ddd!important;
        overflow: hidden;
        vertical-align: middle !important;
    }
    .table_voucher table tr:nth-child(even)  {
        background: #f7f7f7;
    }
    a.export-anchor, a.print-anchor {
        display: none;
    }
    .export_btn, .downloadpdf_btn {
        font-size: 13px;
        float: left;
        display: block;
        cursor: pointer;
        padding: 3px 8px;
        background-color: #ff6e0d;
        border-radius: 3px;
        margin-right: 0px;
        margin-left: 10px;
        color: #fff;
        border: solid 1px #ff6e0d;
        transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
    }
    .share_btn, .sending_btn {
        font-size: 13px;
        /*float: left;*/
        display: inline-block;
        cursor: pointer;
        padding: 3px 20px;
        background-color: #ff6e0d;
        border-radius: 3px;
        margin-right: 0px;
        margin-left: 10px;
        color: #fff;
        border: solid 1px #ff6e0d;
        transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
    }
    .export_btn:hover, .downloadpdf_btn:hover, .share_btn:hover, .sending_btn:hover{
        background-color: #db1a83;
        color: #fff;
    }
    .modalstle {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: #000;
        background-color: rgba(0,0,0,.4);
    }
    .modal-contentstyle01 {
        border-radius: 5px;
        text-align: center;
        background-color: #fefefe;
        margin: auto;
        padding: 30px 20px;
        position: relative;
        border: 2px solid #fff8f2;
        max-width: 480px;
        width: 80%;
    }
    .close01, .close02, .close03 {
        cursor: pointer;
        color: #aaa;
        position: absolute;
        right: 8px;
        top: 0;
        font-size: 28px;
    }
    .small_second{
        color: #4f4f4f;
        font-weight: 600;
        line-height: 2.4;
        text-align: left;
        width: 118px;
    }
    .small_first{
        text-align: left;
        font-size: 17px;
        font-weight: 600;
    }
</style>
<script>
    $(".export_btn").click(function() {
        $('#export_model').show();
    });

    $(".downloadpdf_btn").click(function() {
        $('#downloadpdf_model').show();
    });
</script>
<script>
    function integerInRange(value, min, max) {

        if(value < min || value > max)
        {
            document.getElementById("qty").value = "1";
            alert("min = 1 and max = 500");
        }
    }
    function closeEmail<?php echo $i?>(id){
        alert(id);
    }
</script>
