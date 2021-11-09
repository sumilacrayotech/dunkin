<section class="content-header">
    <h1>
        Manage Category
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage Category</li>
    </ol>
</section>
<style>
    .star-rating {
        display:flex;
        flex-direction: row-reverse;
        font-size:1.5em;
        justify-content:space-around;
        padding:0 .2em;
        text-align:center;
        width:8em;
    }

    .star-rating input {
        display:none;
    }

    .star-rating label {
        color:#ccc;
        cursor:pointer;
    }

    .star-rating :checked ~ label {
        color:#f90;
    }

    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color:#fc0;
    }


</style>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
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