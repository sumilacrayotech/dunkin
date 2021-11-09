<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">General</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <form action="" method="post" id="general"  enctype="multipart/form-data" accept-charset="utf-8">
    
    <div id="message"></div>

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Country Options</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Allowed Countries </label>
                            <select class="form-control select2" multiple="multiple" name="allowedcountries[]" data-placeholder="Select a Country" style="width: 100%;">
				             <?php
				                $i="0";
				                foreach ($countries as $val)
					                {?>             
					                <option value="<?php echo $val->id;?>|<?php echo $val->country_code;?>|<?php echo $val->country_name;?>" <?php if (In_array($val->id,$dbselected)) echo 'selected' ;?>><?php echo $val->country_name;?></option>       
									<?php
									}
									?>              
                          </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Zip Code Optional</label>
                        <select class="form-control select2" multiple="multiple" name="zipcodes[]" data-placeholder="Select a Country" style="width: 100%;">
							   <?php
							    $i="0";
							 foreach ($countries as $val)
							         {?> 							             
							            <option value="<?php echo $val->id;?>|<?php echo $val->country_code;?>|<?php echo $val->country_name;?>" <?php if (In_array($val->id,$dbselectedzip)) echo 'selected' ;?>><?php echo $val->country_name;?></option>
							         
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
                            <label for="exampleInputEmail1">State Required</label>
                            <select class="form-control select2" multiple="multiple" name="state[]" data-placeholder="Select a Country" style="width: 100%;">
					             <?php
					             $i="0";
					               foreach ($countries as $val)
					                { ?> 
					                	<option value="<?php echo $val->id;?>|<?php echo $val->country_code;?>|<?php echo $val->country_name;?>" <?php if (In_array($val->id,$dbselectedstate)) echo 'selected' ;?>><?php echo $val->country_name;?></option>
									         
									<?php
									}
									?>              
                              </select>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Locale Options</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Timezone</label>
                             <select class="form-control select2" name="timezone" data-placeholder="Select a Time Zone" style="width: 100%;">
                              <option value="">Select Time zone</option>
						             <?php
						             $i="0";
						               foreach ($zones as $val)
						                {?> 
						                    <option value="<?php echo $val->zone_id;?>" <?php if ($val->zone_id==$selectedzone->value) echo 'selected' ;?>><?php echo $val->zone_name;?></option>
						               <?php
										}
										?>              
                              </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Locale</label>
                           <select class="form-control select2" name="locale[]" multiple="multiple" data-placeholder="Select a Locale" style="width: 100%;">
                             <option value="">Select Locale</option>

							       <?php
						             $i="0";
							               foreach ($locales as $val)
							                { ?>
							                  <option value="<?php echo $val->id;?>|<?php echo $val->code;?>|<?php echo $val->name;?>" <?php if (In_array($val->id,$dbselectedlocale)) echo 'selected' ;?>><?php echo $val->name;?></option>
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
                            <label for="exampleInputEmail1">Default Locale</label>
                            <select class="form-control select2" name="defaultlocale" data-placeholder="Select a Locale" style="width: 100%;">
                              <option value="">Select Default Locale</option>

										    <?php
										     $i="0";
										      foreach ($locales as $val)
										      { ?>  
										        <option value="<?php echo $val->id;?>" <?php if ($val->id==$selecteddefault->value) echo 'selected' ;?>><?php echo $val->name;?></option>
										         
											  <?php
											   }
											  ?>              
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight Unit</label>
                            <select class="form-control select2" data-placeholder="Select a Weight/Unit"  name="unit" style="width: 100%;">
                            <option value="">Select Weight/Unit</option>
                                <option value="lbs" <?php if ($selectedunit->value=="lbs") echo 'selected' ;?>>lbs</option>
                                <option value="Kgs" <?php if ($selectedunit->value=="Kgs") echo 'selected' ;?>>Kgs</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Store Options</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Store Name</label>
                             <input id='field-store-name' class='form-control' name='store_name' type='text' value="<?php if ($selectedstore->value) echo $selectedstore->value;?>" maxlength='225' />	
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Phone Number</label>
                           <input id='field-phone' class='form-control' name='phone' type='text' value="<?php if ($selectedphone->value) echo $selectedphone->value;?>" maxlength='225' /> 
                           </div>
                        <!-- /.form-group -->
                       </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Country</label>
                            <select class="form-control select2"  name="storecountry" data-placeholder="Select a Country" style="width: 100%;">
                            <option value="">select a country</option>
				             <?php
				                $i="0";
				                foreach ($countries as $val)
					                {?>             
					                <option value="<?php echo $val->id;?>" <?php if ($val->id==$selectedstorecountry->value) echo 'selected' ;?>><?php echo $val->country_name;?></option>       
									<?php
									}
									?>              
                          </select>

                            </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Region/State</label>
                            <input id='field-region' class='form-control' name='region' type='text' value="<?php if ($selectedregion->value) echo $selectedregion->value;?>" maxlength='225' />                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ZIP/Postal Code</label>
                             <input id='field-postalcode' class='form-control' name='postalcode' type='text' value="<?php if ($selectedpostalcode->value) echo $selectedpostalcode->value;?>" maxlength='225' />	
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>City</label>
                           <input id='field-city' class='form-control' name='city' type='text' value="<?php if ($selectedcity->value) echo $selectedcity->value;?>" maxlength='225' /> 
                           </div>
                        <!-- /.form-group -->
                       </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Street Address</label>
                            <input id='field-address1' class='form-control' name='address1' type='text' value="<?php if ($selectedaddress1->value) echo $selectedaddress1->value;?>" maxlength='225' /> 
                            </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Street Address Line 2</label>
                            <input id='field-address2' class='form-control' name='address2' type='text' value="<?php if ($selectedaddress2->value) echo $selectedaddress2->value;?>" maxlength='225' />                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">VAT Number</label>
                             <input id='field-vat' class='form-control' name='vat' type='text' value="<?php if ($selectedvat->value) echo $selectedvat->value;?>" maxlength='225' />	
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo Change</label>
                            <input id='logo_file' class='form-control' name='logo_file' type='file'  /> 
                            </div>
                             <?php if ($selectedlogo->value)
                             {?>
	                            <div class="form-group">
	                            <img src="<?php echo base_url()?>/assets/uploads/logo/<?php echo $selectedlogo->value?>" width="100" height="auto">
	                            </div>
                           <?php } ?>

                   </div>
                </div>
                <!-- /.row -->
                
                 <!-- /.row -->
                
                 <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fav Icon</label>
                             <input id='fav_file' class='form-control' name='fav_file' type='file'  />	
                        </div>
                         <?php if ($selectedfav->value)
                             {?>
	                            <div class="form-group">
	                            <img src="<?php echo base_url()?>/assets/uploads/fav/<?php echo $selectedfav->value?>" width="50" height="auto">
	                            </div>
                           <?php } ?>

                    </div>
                    <div class="col-md-6">
                      </div>
                </div>
                <!-- /.row -->

                
                    <?php if($error)
					                {?>
                
                                            <div class="alert alert-danger">
				                               error on upload.
				                              </div>                
                                <?php } ?>




                
					                <?php if($success=="success")
					                {?>
                
                                            <div class="alert alert-success">
				                               Configurations successfully updated.
				                              </div>                
                                <?php } ?>

                
                 <div class="box-footer">
            <button  type="submit" value="sav" name="sav" class="btn btn-info">Update</button>
        </div>

            </div>
        </div>
        </form>
    </section>
    </div>
    