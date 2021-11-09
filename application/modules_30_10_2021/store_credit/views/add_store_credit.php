<section class="content-header" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <h1>
        Manage Store Credits
        <small>Creates Store Credits Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . 'store_credit'; ?>">Manage Store credits</a></li>
        <li class="active">Add Store credit</li>
    </ol>
</section>
<section class="content">
    <form class="form-horizontal" id="add_store_credit" action="" method="post"/>
    <?php if($editcredit->id){?>
    <input type="hidden" name="creditid" value="<?php echo $editcredit->id?>">
    <?php } ?>
    <div id="message"></div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Store Credit</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        
<?php if($cuid){?>
         <div class="form-group">
         <input type="hidden" name="customer" id="customer" value="<?php echo $cuid?>">
           </div>
        <?php } else{?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Customer<cite>*</cite></label>
                <div class="col-sm-10">
                    <select class="form-control select2"  id="customer" name="customer" data-placeholder="Select a Customer" style="width: 100%;" >
                    <option value="">Select A Customer</option>
				             <?php
				                $i="0";
				                foreach ($customers as $val)
					                {?>             
					                <option value="<?php echo $val->id;?>" <?php if ($val->id==$editcredit->customer_id) echo 'selected' ;?>><?php echo $val->first_name;?>&nbsp;<?php echo $val->last_name;?></option>       
									<?php
									}
									?>              
                       </select>
                          <?php echo form_error('customer', '<div class="error">', '</div>'); ?>

                </div>
            </div>
            
   <?php } ?>   
   
           <?php if($cuid){?>
      
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Current Balance</label>
                <div class="col-sm-10">
                    <div id="balance"><?php echo $cubalance; ?></div>
                </div>
            </div>
            <?php } else{?>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Current Balance</label>
                <div class="col-sm-10" style="padding-top:10px">
                    <div id="balance"></div>
                </div>
            </div>

            <?php } ?>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Add Or Substract Credit Value</label>
                <div class="col-sm-10">
                
                <input type="text" class="form-control" placeholder="Credit Amount" name="credit_amount" size="255" value="<?php if($editcredit->add_or_subtract_amount){ echo $editcredit->add_or_subtract_amount;}?>">
                <div>You can add or Substract an amount from customer's balance by entering a number.For Example enter "99.5" to add "99.5" and substract "99.5" to "99.5"</div>
                <?php echo form_error('credit_amount', '<div class="error">', '</div>'); ?>




               </div>
            </div>
            
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Comments</label>
                <div class="col-sm-10">
                    <textarea id="description"  class="form-control" name="description"><?php if($editcredit->comments){ echo $editcredit->comments;}?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control select2" data-placeholder="Select a Rating"  name="status" style="width: 100%;">                            
                                <option value="1" <?php if($editcredit->status=="1") echo 'selected' ;?>>Active</option>
                                <option value="0" <?php if($editcredit->status=="0") echo 'selected' ;?>>InActive</option>
                               
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
<script type="text/javascript">


    $(document).ready(function() {
        $('select[name="customer"]').on('change', function() {
            var customerid = $(this).val();
            
                           $.ajax({  
                    url: "<?php echo base_url(); ?>store_credit/balance/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: "customer="+customerid, //The variables which are going.
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
                        $('#balance').html(data);
                    }
                })        });
    });
</script>
