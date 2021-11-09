<section class="content-header" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <h1>
        Manage Attribute Set
        <small>Creates Attribute Set Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . 'category'; ?>>">Manage Category</a></li>
        <li class="active">Add Attribute Set</li>
    </ol>
</section>
<section class="content">
    <form class="form-horizontal" id="add_attribute_set" action="">
    <div id="message"></div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Attribute Set</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Attribute Set Name<cite>*</cite></label>
                <div class="col-sm-10">
                    <input class="form-control" autocomplete="OFF" required="" type="text" name="attrset[attribute_set_name]" class="required-entry">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Select Attributes</label>
                <div class="col-sm-10">
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select Attributes" name="attoption[]" >
                        <?php foreach($attributes as $att):?>
                            <option value="<?php echo $att->attribute_id;?>"><?php echo $att->label;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button  type="submit" value="sav" name="sav" class="btn btn-info">Submit</button>
        </div>
    </div>
    </form>
</section>