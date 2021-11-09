<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Security Options
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Security</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <form action="" method="post" id="general"  enctype="multipart/form-data" accept-charset="utf-8">
    
    <div id="message"></div>

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Google Recaptcha</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Google API website key</label>
                             <input id='field-store-name' class='form-control' name='website_key' type='text' value="<?php if ($dbwebsite_key->value) echo $dbwebsite_key->value;?>" maxlength='225' />	
                        </div>
                   </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                       <!-- /.form-group -->
                        <div class="form-group">
                            <label>Google API secret key</label>
                           <input id='field-phone' class='form-control' name='secret_key' type='text' value="<?php if ($dbsecret_key->value) echo $dbsecret_key->value;?>" maxlength='225' /> 
                           </div>
                   </div>               
                
            </div>
            <!-- /.row -->
        </div>
        
       
        <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enable</label>
                             <select class="form-control select2" data-placeholder="Select a Status"  name="key_status" style="width: 100%;">
                            <option value="">Select Status</option>
                                <option value="yes" <?php if ($dbkey_status->value=="yes") echo 'selected' ;?>>Yes</option>
                                <option value="no" <?php if ($dbkey_status->value=="no") echo 'selected' ;?>>No</option>
                            </select>
	
                        </div>
                   </div>
                    <!-- /.col -->
                              
                
            </div>
            <!-- /.row -->
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
        
       </div>
       </form>
         </section>
    </div>
    