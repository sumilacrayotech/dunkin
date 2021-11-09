<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Generate Coupon
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Generate Coupon</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">General</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Coupon Code</label>
                            <input type="text" class="form-control" id="coupon_code" name="coupon_code">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Amount Type</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                <option value="">Select Type</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Percentage">Percentage</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="text" class="form-control" id="coupon_amount" name="coupon_amount">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usable Upto</label>
                            <input type="text" class="form-control" id="usable" name="usable" placeholder="Number Of times Usable">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expiry Date</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="exp_date" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cart Total Limit</label>
                            <input type="text" class="form-control" name="limit" id="limit">
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>

        <!--<div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Action Rule Products</h3>
            </div>
            <div class="box-body">
                <button type="button" style="margin-left: 0;" id="addSpecs" class="btn bg-olive margin">Add Product</button>
                <div id="p_specs">
                    <span class="input-group" style="width: 26%;">
                        <input type="text" class="form-control">
                        <span class="input-group-addon" style="padding: 2px;">
                            <button type="button" id="remScnt" class="btn btn-info btn-danger" style="float: left; margin-left: 4px;padding: 3px;">Remove</button>
                        </span>
                    </span>
                </div>
            </div>
        </div>-->
    </section>
</div>