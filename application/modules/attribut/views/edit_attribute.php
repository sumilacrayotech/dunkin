<section class="content-header" xmlns="http://www.w3.org/1999/html">
    <h1>
        Manage Attributes
        <small>Creates Category Attributes Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . 'attribut'; ?>>">Manage Attributes</a></li>
        <li class="active">Edit Attributes</li>
    </ol>
</section>
<section class="content">
    <form class="form-horizontal" id="edit_attribute" action="">
        <input type="hidden" name="attribute_id" value="<?php echo $attrubute->attribute_id ?>">
    <div id="message"></div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Attributes</h3>
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
                    <input readonly class="form-control" required="" onkeyup="valide_code()" autocomplete="OFF" id="attribute_code" type="text" name="attr[attribute_code]" onblur="unique_code(this.value)" value="<?php echo $attrubute->attribute_code ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Input Type<cite>*</cite></label>
                <div class="col-sm-10">
                    <?php
                    if ($attrubute->input_type == 'text')
                    {
                        $type = 'Text field';
                    }
                    if ($attrubute->input_type == 'textarea')
                    {
                        $type = 'Text area';
                    }
                    if ($attrubute->input_type == 'date')
                    {
                        $type = 'Date';
                    }
                    if ($attrubute->input_type == 'y/n')
                    {
                        $type = 'Yes/no';
                    }
                    if ($attrubute->input_type == 'dropdown')
                    {
                        $type = 'Dropdown';
                    }
                    if ($attrubute->input_type == 'multipleselect')
                    {
                        $type = 'Multiple select';
                    }
                    ?>
                    <input type="hidden" id="option_val" value="<?php echo $attrubute->input_type; ?>"/>
                    <input class="form-control" readonly type="text" value="<?php echo $type ?>" class="required-entry"/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Required</label>
                <div class="col-sm-10">
                    <select name="attr[required]" class="form-control">
                        <option <?php if ($attrubute->required == 0)
                                { ?>selected="" <?php } ?>value="0">No
                        </option>
                        <option <?php if ($attrubute->required == 1)
                                { ?>selected="" <?php } ?>value="1">Yes
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Swatch Type<cite>*</cite></label>
                <div class="col-sm-10">
                    <select name="attr[swatch_type]" id="swatch_type" class="form-control">
                        <option <?php if ($attrubute->swatch_type == 'default'){ ?>selected=""<?php } ?> value="default">Default</option>
                        <option <?php if ($attrubute->swatch_type == 'color_code'){ ?>selected=""<?php } ?> value="color_code">Color Code</option>
                        <option <?php if ($attrubute->swatch_type == 'text'){ ?>selected=""<?php } ?> value="text">Text</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Configurable</label>
                <div class="col-sm-10">
                    <select name="attr[configurable]" class="form-control">
                        <option <?php if ($attrubute->configurable == 'No')
                                { ?>selected="" <?php } ?>value="No">No
                        </option>
                        <option <?php if ($attrubute->configurable == 'Yes')
                                { ?>selected="" <?php } ?>value="Yes">Yes
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Use In Layered Navigation</label>
                <div class="col-sm-10">
                    <select name="attr[layered_nav]" class="form-control">
                        <option <?php if ($attrubute->layered_nav == 0)
                                { ?>selected=""<?php } ?> value="0">No
                        </option>
                        <option <?php if ($attrubute->layered_nav == 1)
                                { ?>selected=""<?php } ?> value="1">Yes
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Use In Layered Navigation</label>
                <div class="col-sm-10">
                    <select name="attr[layered_nav]" class="form-control">
                        <option <?php if ($attrubute->layered_nav == 0)
                                { ?>selected=""<?php } ?> value="0">No
                        </option>
                        <option <?php if ($attrubute->layered_nav == 1)
                                { ?>selected=""<?php } ?> value="1">Yes
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Use in Quick Search</label>
                <div class="col-sm-10">
                    <select name="attr[quick_search]" class="form-control">
                        <option <?php if ($attrubute->quick_search == 0)
                                { ?>selected=""<?php } ?> value="0">No
                        </option>
                        <option <?php if ($attrubute->quick_search == 1)
                                { ?>selected=""<?php } ?> value="1">Yes
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Use in Advanced Search</label>
                <div class="col-sm-10">
                    <select name="attr[advanced_search]" class="form-control">
                        <option <?php if ($attrubute->advanced_search == 0)
                                { ?>selected=""<?php } ?> value="0">No
                        </option>
                        <option <?php if ($attrubute->advanced_search == 1)
                                { ?>selected=""<?php } ?> value="1">Yes
                        </option>
                    </select>
                </div>
            </div>
        </div>
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
                    <input class="form-control" value="<?php echo $attrubute->label; ?>" required="" name="attr[label]" type="text">
                </div>
            </div>
            <div class="form-group" id="opt">
                <label for="inputEmail3" class="col-sm-2 control-label">Manage Options (values of your attribute)</label>
                <div class="col-sm-10">
                    <button type="button" class="btn btn-success" id="addOpt">(+) Add Option</button>
                    <div id="p_scents" style="float: right; width: 100%;margin-top: 10px;">
                        <?php foreach ($options as $opt): ?>
                            <div id="rem">
                                <input type="hidden" value="<?php echo $opt->option_id; ?>" name="option[option_id][]"/>
                                <input class="form-control" id="lable3" placeholder="Value" style="float: left; width: 32%;" value="<?php echo $opt->option_value; ?>" name="option[option_value][]" type="text"/>
                                <input class="form-control" id="value3" placeholder="Position" style="float: left; position: relative; left: 9px; width: 32%;" value="<?php echo $opt->option_position; ?>" name="option[option_position][]" type="text"/>
                                <button type="button" id="remScnt" class="btn btn-danger" style="float: left; margin-left: 19px;">Remove</button>
                                <div style="clear: both; height: 11px;"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" value="sav" name="sav" class="btn btn-info">Save</button>
            <button type="submit" class="btn">Save and Continue Edit</button>
        </div>
    </div>
    </form>
</section>
