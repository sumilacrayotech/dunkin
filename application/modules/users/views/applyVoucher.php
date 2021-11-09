<div class="container" >
    <section class="content" >
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="logo_boxtop">
                    <img src="<?php echo base_url() ?>skin/admin/images/logo.jpg">
                    <h6 class="h6_titile">Voucher Redemption Platform </h6>
                </div>
            </div>
        </div>
        <div class="box_new box_shdow">
            <?php echo $this->session->flashdata('message_name'); ?>
            <?php if($voucher->status=='Used') {?>
                <div style="border: 1px dotted; padding: 5px; color: red; background-color: rgb(221, 221, 221);margin-bottom: 12px;text-align: center;font-size: 17px;font-weight: 600;">Voucher Code Already  Applied</div>
            <?php } ?>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10 col-xs-12 padd_new">
                    <form method="post" action="<?php echo base_url('users/checkVoucher') ?>">
                        <div class="form-group row text-center">
                            <label for="staticEmail" class="col-md-2 col-form-label text-center small_first">Voucher </label>
                            <div class="col-md-8 text-center">
                                <input type="text" name="voucher_code" required class="form-control" placeholder="Enter your voucher"/>
                            </div>
                            <div class="col-md-2 text-center">
                                <button type="submit" class="btn_save">Check</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if(empty($voucher)){?>
            <div class="box_new box_shdow">
                <div class="row">
                    <div class="col-md-12 col-xs-12 padd_new text-center">
                        <h3 class="nodata_css">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <br />
                            No Data Available
                        </h3>
                    </div>
                    <div class="col-md-6 text-left">
                        <br />
                        <a href="<?php echo base_url('users/logout') ?>" class="btn_logout">LogOut</a>
                        <?php if(!empty($voucherData)){?>
                        <button id="printpdf_btn" onclick="myprint()" type="button" class="btn_logout">Print PDF</button>
                        <?php }?>
                    </div>
                </div>
            </div>
        <?php }else{?>
            <?php
            if($voucher->custom_products){
                $products = explode(',',$voucher->custom_products);
            }else{
                $products = explode(',',$voucher->products);
            }
            ?>
            <div class="box_new box_shdow">
                <div class="row">
                    <div class="col-md-12 col-xs-12 padd_new">
                        <table class="table_dashboardnew">
                            <tbody>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Exp.date</th>
                                <th>Status</th>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($products as $product): $i++; ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $product ?></td>
                                    <td><?php echo date('d-m-Y',strtotime($voucher->expiry_from)) ?> (To) <?php echo date('d-m-Y',strtotime($voucher->expiry_to)) ?></td>
                                    <td><?php echo $voucher->status ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br />
                    <?php if($voucher->status!='Used') {?>
                        <div class="col-md-6 text-left">
                            <br />
                            <a href="<?php echo base_url('users/logout') ?>" class="btn_logout">LogOut</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <br />
                            <button id="apply_voucher" type="button" class="btn_save">Apply</button>
                        </div>
                    <?php }?>
                </div>
            </div>
        <?php }?>
    </section>
</div>
<div id="voucher_model01" class="modalstle" style="display: none;">
    <form method="post" action="<?php echo base_url('users/applyVoucherAction') ?>">
        <input type="hidden" value="<?php echo $voucher->number ?>" name="voucher_number">
        <div class="modal-contentstyle01">
            <h4>Are you sure want to apply this voucher?</h4>
            <br />
            <button id="yes_btn" type="submit" class="btn_save" style="background-color: #ff7f27; color: #fff; padding: 10px 8px; font-size: 15px; border: 1px solid #ff7f27; border-radius: 3px; width: 48%; font-weight: 500; line-height: 1;">
                <i class="fa fa-check" aria-hidden="true"></i> Yes
            </button>
            <button id="no_btn" type="button" class="btn_save" style="background-color: #dc1a84; color: #fff; padding: 10px 8px; font-size: 15px; border: 1px solid #ff7f27; border-radius: 3px; width: 48%; font-weight: 500; line-height: 1;">
                <i class="fa fa-close" aria-hidden="true"></i> No
            </button>
        </div>
    </form>
</div>
<?php
if($voucherData->custom_products){
    $productsData = explode(',',$voucherData->custom_products);
}else{
    $productsData = explode(',',$voucherData->products);
}
?>
<div id="dvPrint" style="display: none;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff;border: 0px solid #edf0f2;" align="center">
        <tr>
            <td align="center" valign="top">
                <table border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                    <tr>
                        <td class="td container" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:55px 0px;">
                            <!-- Header -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="p30-15 tbrr" style="padding: 10px; border-radius:5px 5px 0px 0px;" bgcolor="#ffffff">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <th class="column-top" width="245" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td class="img m-center" colspan="3" style="font-size:0pt; line-height:0pt; text-align:center;">
                                                                <header>
                                                                    <img src="<?php echo base_url() ?>skin/admin/images/logo.jpg" width="130">
                                                                </header>
                                                            </td>
                                                            <td class="img m-right"  style="font-size:0pt; line-height:0pt; text-align:right;width: 100px;">
                                                                <?php
                                                                $qr =  $voucherData->id.'|'.$voucherData->number.'|'.$voucherData->name;
                                                                $qrcode = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=$qr&choe=UTF-8";
                                                                ?>
                                                                <img src="<?php echo $qrcode ?>" width="100">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </th>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="p30-15 tbrr" style="padding: 10px; border-radius:5px 5px 0px 0px;" bgcolor="#fff">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <th class="column-top" >
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td colspan="3" style="font-size:14px;font-family: sans-serif;color: #000;">
                                                                <strong> Store Name</strong> : <?php echo $voucherData->store ?>
                                                                <br>
                                                                <strong> Voucher Code</strong>  : <?php echo $voucherData->number ?>
                                                            </td>
                                                            <td style="font-size:14px;font-family: sans-serif;color: #000;text-align: right;">
                                                                <strong>Used Date</strong>  : <?php echo $voucherData->used_date ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </th>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="p30-15 tbrr" style="padding: 10px; border-radius:5px 5px 0px 0px;" bgcolor="#fff">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <th class="column-top" >
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <table class="table_dashboardnew" style="padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;width: 100%;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th style="text-transform: uppercase;background-color:#ff6e0d;color: #fff;padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;font-size: 14px;font-family: sans-serif;font-weight: 600;">No</th>
                                                                        <th style="text-transform: uppercase;background-color:#ff6e0d;color: #fff;padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;font-size: 14px;font-family: sans-serif;font-weight: 600;">Product Name</th>
                                                                        <th style="text-transform: uppercase;background-color:#ff6e0d;color: #fff;padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;font-size: 14px;font-family: sans-serif;font-weight: 600;">Exp.date</th>
                                                                        <th style="text-transform: uppercase;background-color:#ff6e0d;color: #fff;padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;font-size: 14px;font-family: sans-serif;font-weight: 600;">Status</th>
                                                                    </tr>
                                                                    <?php
                                                                    $i = 0;
                                                                    foreach ($productsData as $product): $i++; ?>
                                                                        <tr>
                                                                            <td style="padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;    color: #393939;font-weight: 500;font-size: 14px;font-family: sans-serif;text-align: center;"><?php echo $i ?></td>
                                                                            <td style="padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;    color: #393939;font-weight: 500;font-size: 14px;font-family: sans-serif;"><?php echo $product ?></td>
                                                                            <td style="padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;    color: #393939;font-weight: 500;font-size: 14px;font-family: sans-serif;"><?php echo date('d-m-Y',strtotime($voucherData->expiry_from)) ?> (To) <?php echo date('d-m-Y',strtotime($voucherData->expiry_to)) ?></td>
                                                                            <td style="padding: 10px;border: 1px solid #ecf0f5;border-collapse: collapse;    color: #393939;font-weight: 500;font-size: 14px;font-family: sans-serif;"><?php echo $voucherData->status ?></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </th>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<style type="text/css">
    body{
        /*background-color: #fff !important;*/
    }
    .box_new,.box_shdow{
        padding: 25px 15px;
        background-color: #ffff;
        margin: 10px 0px;
        border-radius: 5px;
        box-shadow: 1px 1px 9px 3px rgba(0,0,0,0.08);
    }
    .btn_save {
        color: #fff;
        border: solid 1px #ff6e0d;
        border-radius: 3px;
        background-color: #ff6e0d;
        padding: 5px 35px;
        font-size: 16px;
    }
    .small_first {
        font-size: 17px;
        line-height: 1.8;
        font-weight: 600;
    }
    .table_dashboardnew, td, th {
        padding: 10px;
        border: 1px solid #ecf0f5;
        border-collapse: collapse;
    }
    .table_dashboardnew {
        width: 100%;
    }

    .table_dashboardnew th {
        text-transform: uppercase;
        background-color: #ff6e0d;
        color: #fff;
    }
    .table_dashboardnew td {
        color: #393939;
        font-weight: 600;
    }
    .table_dashboardnew tr:nth-child(even) {
        background-color: #fafbfc;
    }
    .table_dashboardnew tr:hover {
        background-color: #f9f9f9;
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
    .close01, .close02 {
        cursor: pointer;
        color: #aaa;
        position: absolute;
        right: 8px;
        top: 0;
        font-size: 28px;
    }
    .tick_css i {
        text-align: center;
        font-size: 27px;
        border: 3px solid #FF6E0C;
        color: #ff6e0d;
        /* padding: 20px; */
        line-height: 50px;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        animation: blink 3s linear infinite;
    }
    @keyframes blink{
        0%{opacity: .8;}
        50%{opacity: .9;}
        100%{opacity: 1;}
    }
    .form-group {
        margin-bottom: 0px;
    }
    .nodata_css{
        color: #d2d6de;
    }
    h3.nodata_css i {
        margin-bottom: 8px;
        font-size: 43px;
    }
    .btn_logout, .btn_save:hover{
        color: #fff;
        border: solid 1px #dc1a84;
        border-radius: 3px;
        background-color: #dc1a84;
        padding: 5px 35px;
        font-size: 16px;
    }
    .btn_logout:hover{
        border: solid 1px #ff6e0d;
        background-color: #ff6e0d;
        color: #fff;
    }
    body {
        background-image: url(https://dunkin.demoatcrayotech.com/skin/admin/images/bg-new.jpg) !important;
        background-size: contain !important;
        background-repeat: repeat !important;
        position: relative;
        z-index: 1;
    }
    .logo_boxtop {
        margin: 0 auto;
        display: inline-block;
        background-color: #fff;
        padding: 10px 30px;
        border-radius: 10px;
    }
    h6.h6_titile {
        margin-top: 10px;
        font-size: 16px;
    }
    /*#print_div{
    height: 0px;
    }*/
    @media print{
        .no-print, .no-print *{
            display: none !important;
        }
        /*  #print_div{
          height: auto !important;
        }*/
        .table_dashboardnew tr:nth-child(even) {
            background-color: #fafbfc;
        }
        .print-m-0{
            margin: 0 !important;
        }
    }
</style>

<script>
    var modal01=document.getElementById("voucher_model01"),
        buttonshow=document.getElementById("yes_btn"),
        no_btn=document.getElementById("no_btn"),
        buttonshow01=document.getElementById("apply_voucher");
    buttonshow01.onclick=function(){modal01.style.display="block"};
    no_btn.onclick=function(){modal01.style.display="none"};
    buttonshow.onclick=function(){modal.style.display="block", modal01.style.display="none"};
</script>

<script type="text/javascript">

</script>
<script type="text/javascript">
    var modal=document.getElementById("voucher_model"),

// buttonshow02=document.getElementById("yes_btn"),
// buttonshow02.onclick=function(){modal.style.display="block"};


        span=document.getElementsByClassName("close01")[0];
    span.onclick=function(){modal.style.display="none"};
    window.onclick=function(n){n.target==modal&&(modal.style.display="none")};
</script>
<script src="https://dunkin.demoatcrayotech.com/skin/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script> -->

<script type="text/javascript">
    var currentZoom = 1.0;

    function ImageReturne() {
        var div = document.getElementById("dvPrint").innerHTML;
        var firstFunc = function step1() { setTimeout('step2()', 10); }
        var secondFunc = function step2() { window.print(); window.close() }
        var getImages = "<html><head><script>\n" + firstFunc + "\n" + secondFunc + "</scri" + "pt></head><body onload='step1()'>\n" + "'" + div + "" + "</body></html>";
        return getImages;
    }
    function myprint() {
        Pagelink = "about:blank";
        var pwa = window.open(Pagelink, "_new");
        pwa.document.open();
        pwa.document.write(ImageReturne());
        pwa.document.close();
    }

</script>