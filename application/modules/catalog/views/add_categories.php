<section class="content-header" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <h1>
        Manage Categories
        <small>Creates Product Categories Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . 'category'; ?>>">Manage Category</a></li>
        <li class="active">Add Category</li>
    </ol>
</section>
<section class="content">
    <form class="form-horizontal" id="add_category" action=""/>
    <div id="message"></div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Category</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Name<cite>*</cite></label>
                <div class="col-sm-10">
                    <input class="form-control" autocomplete="OFF" required="" type="text" name="cate[category_name]" id="product_name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category URL<cite>*</cite></label>
                <div class="col-sm-10">
                    <input class="form-control" autocomplete="OFF" required="" id="url_key" value="" name="cate[url_key]" autocomplete="OFF" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Featured</label>
                <div class="col-sm-10">
                    <select name="cate[featured]"  class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input class="form-control" style="padding: 1px;" id="image" placeholder="Short Title" type="file" name="image">
                    <img id="main_preview" style="width: 12%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);display: none" src="#"/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea id="editor1"  class="form-control" name="cate[description]"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Select Parent Category</label>
                <div class="col-sm-10">
                    <select name="cate[parent_category]"  class="form-control">
                        <option value="0">---Select Parent Category---</option>
                        <?php
                        foreach ($categorylist as $cat)
                        { ?>
                            <option value="<?php echo $cat['category_id']; ?>" <?php echo set_select('cat', $cat['category_id']); ?>><?php echo $cat['category_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Page Title <i class="optional-text">(Optional)</i></label>
                <div class="col-sm-10">
                    <input class="form-control" name="seo[title]" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Meta Keywords <i class="optional-text">(Optional)</i></label>
                <div class="col-sm-10">
                    <input class="form-control" name="seo[meta_keyword]" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Meta Description <i class="optional-text">(Optional)</i></label>
                <div class="col-sm-10">
                    <textarea  name="seo[meta_description]"  class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button  type="submit" value="sav" name="sav" class="btn btn-info">Submit</button>
        </div>
    </div>
    </form>
</section>
<script type="text/javascript">
    $(function ()
    {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });
</script>