<?php $admin=new Main()?>
<link href="<?php echo $admin->skin('plugins/elfinder/elfinder.css');?>" type="text/css" rel="stylesheet" />
<link href="<?php echo $admin->skin('plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css');?>" type="text/css" rel="stylesheet" />
<style>
    .plupload{border: 1px solid #ccc}
    .title{border-bottom: 1px solid #ccc;margin: 10px}
</style>
<section class="content-header">
    <h1>
        Manage Products
        <small>Manage Products Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url().'products';?>">Manage Products</a></li>
        <li class="active">Product Image</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Product Images</h3>
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
