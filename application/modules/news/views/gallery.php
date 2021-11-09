<?php $admin=new Main()?>
<link href="<?php echo $admin->skin('plugins/elfinder/elfinder.css');?>" type="text/css" rel="stylesheet" />
<link href="<?php echo $admin->skin('plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css');?>" type="text/css" rel="stylesheet" />
<style>
    .plupload{border: 1px solid #ccc}
    .title{border-bottom: 1px solid #ccc;margin: 10px}
</style>
<section class="content-header">
    <h1>
        Manage Gallery
        <small>Manage Gallery Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url().'news';?>">Manage News</a></li>
        <li class="active">Gallery</li>
    </ol>
</section>
<!-- Main content -->
<section class="content" style="background-color: #FFF;margin: 17px;">
    <?php echo $output; ?>
</section>
