<style type="text/css">
.radio {
    padding-left: 0;
}
</style>
<div class="contentwrapper"><!--Content wrapper-->
    <div class="heading">
        <h3>Creating Gift Codes</h3>                    
    </div><!-- End .heading-->
    <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
    <div class="row-fluid">
        <div class="span6" style="width:91%">
            <div class="box">
                <div class="title">
                    <h4> 
                        <span>Add Gift Code</span>
                    </h4>
                </div>
                <div class="content">
                    <div id="message"></div>
                    <form class="form-horizontal" id="add_coupon" action="" method="POST">
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="checkboxes">Coupon Code Type</label>
                                    <div class="span8 controls">
                                        <div class="left marginT5">
                                            <input type="radio" onclick="active_dynamic()" class="code_type" name="code_type" value="1" <?php if(isset($_POST['code_type'])) {if($_POST['code_type']=='1'){echo 'checked="checked"' ;}}else { echo 'checked="checked"' ; } ?>/> 
                                            Dynamic
                                        </div>
                                        <div class="left marginT5">
                                            <input type="radio" onclick="active_custom()" class="code_type" name="code_type" value="2" <?php if(isset($_POST['code_type'])) {if($_POST['code_type']=='2'){echo 'checked="checked"' ;}} ?>/> 
                                            Custom 
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="form-row row-fluid" id="ccode" style="display: none;">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Coupon Code</label>
                                    <input type="text" name="coupon_code"  id="coupon_code" value="<?php echo set_value('coupon_code') ; ?>"   placeholder="Coupon Code" class="span8" />
                                    <span class="error">
								        <?php echo form_error('coupon_code');?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid" id="howm">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">How Many Codes Now</label>
                                    <input type="text" name="counts" id="how" required value="<?php echo set_value('counts') ; ?>"   placeholder="How Many Codes Now ?" class="span8" />
                                    <span class="error"><?php echo form_error('counts');?></span>        
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="checkboxes">Amount Type</label>
                                    <div class="span8 controls">
                                        <div class="left marginT5">
                                            <input type="radio" onclick="amount_active()" class="amount_type" name="amount_type" value="1" <?php if(isset($_POST['amount_type'])) {if($_POST['amount_type']=='1'){echo 'checked="checked"' ;}}else { echo 'checked="checked"' ; } ?> /> 
                                            Amount
                                        </div>
                                        <div class="left marginT5">
                                            <input type="radio" onclick="pers_active()" class="amount_type" name="amount_type" value="2" <?php if(isset($_POST['amount_type'])) {if($_POST['amount_type']=='2'){echo 'checked="checked"' ;}} ?> />
                                            Percentage 
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="form-row row-fluid" id="amnt" style="<?php if(isset($_POST['amount_type'])) {if($_POST['amount_type']=='2'){echo 'display:none' ;}}?> ">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Gift Amount</label>
                                    <input type="text" name="amounts" <?php if(isset($_POST['amount_type'])) {if($_POST['amount_type']=='1'){echo 'required="required"' ;}}else { echo 'required="required"' ; } ?> value="<?php echo set_value('amounts') ; ?>" placeholder="Amount" class="span8" />
                                    <span class="error">
        				                <?php echo form_error('amounts');?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid" id="percent" style="display: none;">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Discount Percentage</label>
                                    <input type="text" name="amount_percentage"  <?php if(isset($_POST['amount_type'])) {if($_POST['amount_type']=='2'){echo 'required="required"' ;}} ?> value="<?php echo set_value('amount_percentage') ; ?>"   placeholder="Discount Percentage" class="span8" /> %
                                    <span class="error"><?php echo form_error('amount_percentage');?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="checkboxes">Coupon Type</label>
                                    <div class="span8 controls">
                                        <div class="left marginT5">
                                            <input type="radio" id="coupon_type" name="coupon_type" value="single" class="" <?php if(isset($_POST['coupon_type'])) {if($_POST['coupon_type']=='single'){echo 'checked="checked"' ;}}else { echo 'checked="checked"' ; } ?>/> 
                                            Single
                                        </div>
                                        <div class="left marginT5">
                                            <input type="radio" id="coupon_type" name="coupon_type" value="multiple" class="" <?php if(isset($_POST['coupon_type'])) {if($_POST['coupon_type']=='multiple'){echo 'checked="checked"' ;}} ?> /> 
                                            Multple 
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Usable Upto</label>
                                    <input type="text" name="usable" required value="<?php echo set_value('usable') ; ?>"   placeholder="Number Of times Usable" class="span8" />
                                    <span class="error"><?php echo form_error('usable');?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Time Period</label>
                                     <p id="datepairExample">
                                        <input type="text" id="start_date" class="date start" name="start" style="height:25px; width:20%;" placeholder="Start Date" value="<?php echo set_value('start') ; ?>" class="span8" />
                                        <input type="text" class="time start" name="start_time" style="height:25px;width:10%;" placeholder="Start Time" id="start_time" value="<?php echo set_value('start_time') ; ?>" class="span8"  /> to
                                        <input type="text" class="time end" name="end_time" style="height:25px;width:10%;" placeholder="End Time" value="<?php echo set_value('end_time') ; ?>" class="span8" />
                                        <input type="text" id="end_date" class="date end" name="end" style="height:25px;width:20%;" placeholder="End Date" value="<?php echo set_value('end') ; ?>" class="span8"  />
                         		     </p>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span4" for="normal">Amount Limit</label>
                                    <input type="text" name="limit" required value="<?php echo set_value('limit') ; ?>"   placeholder="Amount Limit" class="span8" />
                                    <span class="error">
    								    <?php echo form_error('limit');?>
                                    </span>
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