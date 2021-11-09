<div class="content-wrapper">
<section class="content-header">
    <h1>
        Manage Products
        <small>Manage Products Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Create Product</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Product</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body" style="width: 30%; margin: 0 auto;padding-top: 30px;padding-bottom: 30px">
            <?php if($endParams=='option'){?>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <select name="attribute_set"  onchange="get_ConfigAttributes(this)" class="form-control" style="margin-bottom: 12px;">
                            <option value="">---Select Attribute Set--</option>
                            <?php foreach ($attributeSet as $item): ?>
                                <option <?php if($setId==$item->set_id){?> selected <?php }?> value="<?php echo $item->set_id?>"><?php echo $item->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if($setId){ $conAttribute = $app->getConfigAttributes($setId);?>
                    <div class="form-group" id="config_attr">
                        <?php foreach($conAttribute as $attr):?>
                        <label>
                            <input type="checkbox" name="config_attr[]" value="<?php echo $attr->attribute_id ?>" class="minimal">
                            <?php echo $attr->label ?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <input type="hidden" value="asdda" name="sss" />
                        <button class="btn btn-large btn-block btn-success" type="submit">Create A Configurable Product</button>
                    </div>
                </form>
            <?php }else{?>
                <form class="form-horizontal" action="" method="post">
                    <select name="attribute_set" class="form-control" style="margin-bottom: 12px;">
                        <?php foreach ($attributeSet as $item): ?>
                            <option value="<?php echo $item->set_id?>"><?php echo $item->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" value="asdda" name="sss" />
                    <button class="btn btn-large btn-block btn-success" type="submit">Create A Simple Product</button>
                </form>
            <?php }?>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
</div>