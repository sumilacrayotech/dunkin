<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <h1>
        Manage Attributes
        <small>Creates Category Attributes Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url().'attribut';?>>">Manage Attributes</a></li>
        <li class="active">Add Attributes</li>
    </ol>
</section>
<section class="content">
    <form class="form-horizontal" id="add_attribute" action=""/>
    <div id="message"></div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Add Attributes</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Attribute Code<cite>*</cite></label>
                <div class="col-sm-10">
                    <input class="form-control" required="" onkeyup="valide_code()" autocomplete="OFF" id="attribute_code" type="text" name="attr[attribute_code]" onblur="unique_code(this.value)">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Input Type<cite>*</cite></label>
                <div class="col-sm-10">
                    <select name="attr[input_type]" id="option_val" onchange="options_li()" class="form-control">
                        <option value="text">Text field</option>
                        <option value="textarea">Text area</option>
                        <option value="date">Date</option>
                        <option value="y/n">Yes/no</option>
                        <option value="dropdown">Dropdown</option>
                        <option value="mutipleselect">Multiple select</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Required</label>
                <div class="col-sm-10">
                    <select name="attr[layered_nav]" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Swatch Type<cite>*</cite></label>
                <div class="col-sm-10">
                    <select name="attr[swatch_type]" id="swatch_type" class="form-control">
                        <option selected value="default">Default</option>
                        <option value="color_code">Color Code</option>
                        <option value="text">Text</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Configurable</label>
                <div class="col-sm-10">
                    <select name="attr[configurable]" class="form-control">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Use In Layered Navigation</label>
                <div class="col-sm-10">
                    <select name="attr[layered_nav]" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Use in Quick Search</label>
                <div class="col-sm-10">
                    <select name="attr[quick_search]" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Use in Advanced Search</label>
                <div class="col-sm-10">
                    <select name="attr[advanced_search]" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->

    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Manage Label / Options</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Label<cite>*</cite></label>
                <div class="col-sm-10">
                    <input class="form-control" required="" name="attr[label]" type="text">
                </div>
            </div>
            <div class="form-group" style="display: none;" id="opt">
                <label for="inputEmail3" class="col-sm-2 control-label">Manage Options (values of your attribute)</label>
                <div class="col-sm-10">
                    <button type="button" class="btn btn-success" id="addOpt">(+) Add Option</button>
                    <div id="p_scents" style="float: right; width: 100%;margin-top: 10px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button  type="submit" value="sav" name="sav" class="btn btn-info">Submit</button>
        </div>
    </div>
    <!-- /.box -->
    </form>
</section>
