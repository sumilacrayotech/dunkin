<style>
   /* .add-anchor.add_button {
        display: none;
    }*/
</style>
<?php
$main = new Main();
$companies = $main->getCompanies();
?>
<section class="content-header">
    <h1>
        Manage Voucher
        <small>Manage Voucher Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Voucher List</li>
    </ol>
    <?php echo $this->session->flashdata('message_name');?>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Voucher List</h3>
            <div class="box-tools pull-right" style="display: inline-block !important;">
                <!--<a href="<?php /*echo base_url('voucher/generateVoucher') */?>" class="export_btn"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Generate Voucher </a>-->
                <a href="javacript::void(0);" class="export_btn"> <i class="fa fa-external-link" aria-hidden="true"></i> Export </a>
                <a href="javacript::void(0);" class="downloadpdf_btn"> <i class="fa fa-download" aria-hidden="true"></i> Download PDF </a>
                <a href="<?php echo base_url('voucher/uploadsharedata') ?>" class="search_clear" style="margin-top: 1px;float: left;padding: 3px 8px 3px 8px;"> <i class="fa fa-download" aria-hidden="true"></i> Upload & Share Voucher </a>
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


<div id="export_model" class="modalstle export_model" style="display: none;">
    <div class="modal-contentstyle01">
    <div>
<span class="close01">×</span>
</div>
<form method="post" action="<?php echo base_url('voucher/exportCSV') ?>">
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
    <button type="submit" class="btn_save" style="background-color: #ff7f27;color: #fff;padding: 10px 8px;font-size: 15px;border: 1px solid #ff7f27;border-radius: 3px;width: 48%;font-weight: 500;line-height: 1;margin-left: 13px;"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download CSV </button>
</form>
</div>
</div>



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


<div id="addemail_model" class="modalstle addemail_model" style="display: none;">
    <div class="modal-contentstyle01">
        <div>
            <span class="close03">×</span>
        </div>
        <form method="post" action="<?php echo base_url('voucher/downloadPdf') ?>">
            <div class="form-group row text-left">
                <label for="from" class="col-sm-12 col-form-label small_first ">Add Email ID</label>
            </div>
            <div class="form-group row">
                <label for="from" class="col-sm-2 col-form-label small_second">Email ID</label>
                <div class="col-md-8 col-sm-10">
                    <input type="email" class="form-control" name="from" aria-describedby="from" placeholder="">
                </div>
            </div>



            <button type="submit" class="btn_save" style="background-color: #ff7f27;color: #fff;padding: 10px 8px;font-size: 15px;border: 1px solid #ff7f27;border-radius: 3px;width: 48%;font-weight: 500;line-height: 1;margin-left: 13px;"> SAVE </button>
        </form>
    </div>
</div>

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


$(document).ready(function(){
var modal=document.getElementById("export_model"),
span=document.getElementsByClassName("close01")[0];
span.onclick=function(){modal.style.display="none"};
// window.onclick=function(n){n.target==modal&&(modal.style.display="none")};
});


$(document).ready(function(){
var modal1=document.getElementById("downloadpdf_model"),
span1=document.getElementsByClassName("close02")[0];
span1.onclick=function(){modal1.style.display="none"};
// window.onclick=function(n){n.target==modal1&&(modal1.style.display="none")};
});

$(document).ready(function(){
var modal2=document.getElementById("addemail_model"),
span2=document.getElementsByClassName("close03")[0];
span2.onclick=function(){modal2.style.display="none"};
// window.onclick=function(n){n.target==modal1&&(modal1.style.display="none")};
});


$(".export_btn").click(function() {
$('#export_model').show();
});

$(".downloadpdf_btn").click(function() {
$('#downloadpdf_model').show();
});
$(".addemail_btn").click(function() {
$('#addemail_model').show();
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
</script>
