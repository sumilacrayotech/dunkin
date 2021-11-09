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
        <h3>Add Services (<?php echo $this->app->get_product_service_name($this->uri->segment(3))?>)</h3>
    </div><!-- End .heading-->
    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
    <div class="row-fluid">
        <div class="span6" style="width:91%">
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Create</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                    <form class="form-horizontal" id="add_services" action="" enctype="multipart/form-data">
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Service Name<cite>*</cite></label>
                                <input class="span8" required="" type="text" name="servic_name" class="required-entry" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="product_service_id" value="<?php echo $this->uri->segment(3)?>" />
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                <label class="form-label span4" for="normal">Services<cite>*</cite></label>
                                <button class="btn btn-success" id="addScnt" type="button">Add Service</button>
                                <div id="p_scents" style="float: right; width: 68.5%;">
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