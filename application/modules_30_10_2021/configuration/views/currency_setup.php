<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Currency Setup
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Currency Setup</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <form action="" method="post" id="general"  enctype="multipart/form-data" accept-charset="utf-8">
    
    <div id="message"></div>

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Currency Options</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Base Currency </label>
                            <select class="form-control select2"  name="basecurrency" data-placeholder="Select a Currency" style="width: 100%;">
                            <option value="">Select Currency</option>
				             <?php
				                $i="0";
				                foreach ($currencies as $val)
					                {?>             
					                <option value="<?php echo $val->currency_code;?>" <?php if ($val->currency_code==$dbbasecurrency->value) echo 'selected' ;?>><?php echo $val->currency_name;?></option>
									<?php
									}
									?>              
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Allowed Currencies</label>
                        <select class="form-control select2" multiple="multiple" name="allowed_currency[]" data-placeholder="Select a Currency" style="width: 100%;">
                        <option value="">Select Currency</option>

							   <?php
							    $i="0";
							 foreach ($currencies as $val)
							         {?> 							             
							            <option value="<?php echo $val->currency_id;?>|<?php echo $val->currency_code;?>|<?php echo $val->currency_name;?>" <?php if (In_array($val->currency_id,$dbselectedallowedarr)) echo 'selected' ;?>><?php echo $val->currency_name;?></option>
							         
									<?php
									 }
									 ?>              
                        </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Currency Conversion</label>
                           <select class="form-control select2" data-placeholder="Select a Currency Conversion"  name="conversion" style="width: 100%;">
                            <option value="">Select Currency Conversion</option>
                                <option value="yes" <?php if ($dbconversion->value=="yes") echo 'selected' ;?>>Yes</option>
                                <option value="manual" <?php if ($dbconversion->value=="manual") echo 'selected' ;?>>Manual</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
                                        
                 


                
					                <?php if($success=="success")
					                {?>
                
                                            <div class="alert alert-success">
				                               Configurations successfully updated.
				                              </div>                
                                <?php } ?>

                
                 <div class="box-footer">
            <button  type="submit" value="sav" name="sav" class="btn btn-info">Update</button>
        </div>

                    </form>
    </section>
    </div>
    