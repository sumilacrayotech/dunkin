<style type="text/css">
    .uploader {
        border: 1px solid #ddd !important;
    }
    #p_scents p {
    padding-top: 12px!important;
    clear: both;
}
</style>
<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Edit a Service Points (<?php echo $this->app->get_product_service_name($this->uri->segment(3))?>)</h3>
    </div><!-- End .heading-->
    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
    <div class="row-fluid">
        <div class="span6" style="width:91%">
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Edit</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="edit_ceiling_message"></div>
                    <form class="form-horizontal" id="edit_ceiling" action="" enctype="multipart/form-data">
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Service Name<cite>*</cite></label>
                                    <input class="span8" required="" value="<?php echo $service_name;?>" type="text" name="service_name" class="required-entry" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $this->uri->segment(3) ?>" name="service_id"/>
                        <script type="text/javascript">
                        function remove_range(specif_id)
                        {
                            $.ajax({
                                type: 'GET',
                                url: '<?=base_url() . 'index.php/cms/delete_service_point'?>',
                                data: 'id=' + specif_id,
                                success: function (data)
                                {
                                    
                                }
                            });
                        }
                        </script>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Services<cite>*</cite></label>
                                <button class="btn btn-success" id="addScnt" type="button">Add Or Edit Service</button>
                                    <div id="p_scents" style="float: right; width: 68.5%;">
                                        <?php foreach($points as $item):?>
                                            <p>
                                                <input type="hidden" value="<?php echo $item->id;?>" name="service[id][]" />
                                                <input class="span9" id="lable3" placeholder="Width" style="float: left; width: 539px;" name="service[services][]" value="<?php echo $item->services;?>" type="text" />
                                                <button type="button" id="remScnt" onclick="remove_range('<?php echo $item->id;?>')" class="btn btn-warning" style="float: left; margin-left: 19px;">Remove</button>
                                            </p>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" value="sav" name="sav" class="btn btn-info">Save</button>
                            <button type="button" class="btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div><!-- End .box -->
        </div><!-- End .span6 --><!-- End .span6 --><!-- End .span6 -->
    </div><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid --><!-- End .row-fluid -->
<!-- Page end here -->
</div>