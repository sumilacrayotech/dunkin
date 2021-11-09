<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small class="small_css">Customer Survey Portal </small>
        </h1>
      <!--   <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol> -->
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="box_new2">
            <div class="row">
                <div class="col-lg-3 col-xs-6 padd_new">
                    <!-- small box -->
                    <div class="small-box bg-white">
                         <div class="icon">
                            <img src="<?php echo base_url() ?>skin/admin/images/dashboard_01.png">
                        </div>
                        <div class="inner">
                             <p>Total QR Code</p>
                            <h3><?php echo $totalVoucher ?></h3>
                        </div>
                       

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6 padd_new">
                    <!-- small box -->
                    <div class="small-box bg-white">
                         <div class="icon">
                            <img src="<?php echo base_url() ?>skin/admin/images/dashboard_02.png">
                        </div>
                        <div class="inner">
                            <p>Scanned QR Code</p>
                            <h3><?php echo $totalTrans ?></h3>
                        </div>
                       

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6 padd_new">
                    <!-- small box -->
                    <div class="small-box bg-white">
                        <div class="icon">
                            <img src="<?php echo base_url() ?>skin/admin/images/dashboard_03.png">
                        </div>
                        <div class="inner">
                              <p>No of Store</p>
                            <h3><?php echo $totalStore ?></h3>
                        </div>
                        

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6 padd_new">
                    <!-- small box -->
                    <div class="small-box bg-white">
                         <div class="icon">
                            <img src="<?php echo base_url() ?>skin/admin/images/dashboard_04.png">
                        </div>
                        <div class="inner">
                              <p>Total Customer</p>
                            <h3><?php echo $totalTrans ?></h3>
                        </div>
                       

                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->

            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-12 connectedSortable">




                <!-- Calendar -->
                <div class="box_new">

                    <div class="box-header">
                        <h3 class="box-title">Top 10  Store</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table_dashboard">
                            <tr>
                                <th>NO</th>
                                <th>Store Code</th>
                                <th>Store Name</th>
                                <th> Answered questionnaire </th>
                            </tr>
                            <?php foreach ($stores as $store): ?>
                                <tr>
                                    <td><?php echo $store->id?></td>
                                    <td><?php echo $store->number?></td>
                                    <td><?php echo $store->name?></td>
                                    <td><?php echo $store->redeemed_count?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->


                </div>
                <!-- /.box -->

            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>

<style type="text/css">
.skin-blue .main-header .navbar {
   min-height: 200px;
}
.content-wrapper{
    position: relative;
    z-index: 9999;
    background-color: transparent;
}
body, .wrapper{
    background-color: #f5f6fa!important;
}
.main-header {
    position: relative;
    max-height: 65px;
    z-index: 1030;
}
.content-header>h1,.small_css {
    color: #fff !important;
}
.bg-white{
    background-color: #fff;
}
.small-box.bg-white div h3 {
    color: #ff671f;
    font-weight: 600;
        margin-bottom: 0;
}
.small-box.bg-white div p {
            color: #333;
    font-weight: 500;
    margin-bottom: 0;
    font-size: 15px;
}
.small-box>.inner {
    vertical-align: middle;
    padding: 15px 10px;
    display: inline-block;
}
.small-box .icon {
    vertical-align: middle;
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: relative;
    top:0px;
    display: inline-block;
    right: 0px;
    z-index: 0;
    font-size: 0px;
    color: rgb(255 0 0 / 15%);
}
.small-box:hover .icon {
    font-size: 0px;
}
.small-box {
    padding: 10px 5px;
    }
</style>