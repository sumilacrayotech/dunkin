<section class="content-header" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <h1>
        Manage Categories
        <small>Creates Product Categories Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . 'category'; ?>>">Manage Category</a></li>
        <li class="active">Edit Category</li>
    </ol>
</section>
<?php
$this->app = new App();
?>
<section class="content">
    <form class="form-horizontal" id="edit_category" action="">
    <div id="message"></div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit  <i><?php echo $category->category_name;?></i></h3>
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
                    <input class="form-control" required="" value="<?php echo $category->category_name;?>" type="text" name="cate[category_name]" id="product_name">
                    <input type="hidden" value="<?php echo $category->category_id;?>" name="category_id" />
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category URL<cite>*</cite></label>
                <div class="col-sm-10">
                    <input class="form-control" required="" id="url_key" value="<?php echo $category->url_key;?>" name="cate[url_key]" autocomplete="OFF" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Featured</label>
                <div class="col-sm-10">
                    <select name="cate[featured]" class="form-control">
                        <option <?php if($category->featured==0){ echo 'selected'; }?> value="0">No</option>
                        <option <?php if($category->featured==1){ echo 'selected'; }?> value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input class="form-control" style="padding: 1px;" id="image" placeholder="Short Title" type="file" name="image">
                    <?php if($category->image){?>
                        <img id="main_preview" style="width: 12%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);" src="<?php echo base_url().'assets/uploads/category/'.$category->image ?>"/>
                    <?php }else{?>
                        <img id="main_preview" style="width: 12%; float: left; margin-top: 9px; border: 1px solid rgb(204, 204, 204);display: none" src="#"/>
                    <?php }?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea id="editor1"  class="form-control" name="cate[description]"><?php echo $category->description;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Select Parent Category</label>
                <div class="col-sm-10">
                    <select name="cate[parent_category]"  class="form-control">
                        <?php if($category->parent_category == 0){ ?>
                            <option selected="" value="0">--Select Parent Category--</option>
                        <?php }else{?>
                            <option selected="" value="<?php echo $category->parent_category;?>"><?php echo $this->app->get_category_name($category->parent_category);?></option>
                        <?php }?>
                        <?php foreach($categorylist as $cat){?>
                            <option value="<?php echo $cat['category_id']; ?>" <?php echo set_select('cat', $cat['category_id']); ?>><?php echo $cat['category_name']; ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Page Title <i class="optional-text">(Optional)</i></label>
                <div class="col-sm-10">
                    <input class="form-control" name="seo[title]" value="<?php echo $seo->title?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Meta Keywords <i class="optional-text">(Optional)</i></label>
                <div class="col-sm-10">
                    <input class="form-control" name="seo[meta_keyword]" type="text" value="<?php echo $seo->meta_keyword?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Meta Description <i class="optional-text">(Optional)</i></label>
                <div class="col-sm-10">
                    <textarea  name="seo[meta_description]"  class="form-control"><?php echo $seo->meta_description?></textarea>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" value="sav" name="sav" class="btn btn-info">Save changes</button>
            <button type="submit" value="go" name="go" class="btn">Save and Go To Listing</button>
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
        $(".textarea").wysihtml5();
    });
    function remove_specific(specif_id)
    {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() . 'index.php/catalog/delete_tag' ?>',
            data: 'id=' + specif_id,
            success: function (data)
            {
                $('#operator_code').val(data);
            }
        });
    }
</script>