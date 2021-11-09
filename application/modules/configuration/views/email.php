<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Email Address Settings
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Email Address Settings</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <form action="" method="post" id="general"  enctype="multipart/form-data" accept-charset="utf-8">
    
    <div id="message"></div>

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">General Contact</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                             <input id='field-general-name' class='form-control' name='general_contact_name' type='text' value="<?php if ($dbgeneral_contact_name->value) echo $dbgeneral_contact_name->value;?>" maxlength='225' />	
                        </div>
                   </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                       <!-- /.form-group -->
                        <div class="form-group">
                            <label>Email</label>
                           <input id='field-phone' class='form-control' name='general_contact_email' type='text' value="<?php if ($dbgeneral_contact_email->value) echo $dbgeneral_contact_email->value;?>" maxlength='225' /> 
                           </div>
                   </div>               
                
            </div>
            <!-- /.row -->
        </div>
        
        </div>
        
        <div class="box box-default">
        <div class="box-header with-border">
                <h3 class="box-title">Customer Support</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                             <input id='field-store-name' class='form-control' name='support_name' type='text' value="<?php if ($dbsupport_name->value) echo $dbsupport_name->value;?>" maxlength='225' />	
                        </div>
                   </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                       <!-- /.form-group -->
                        <div class="form-group">
                            <label>Email</label>
                           <input id='field-phone' class='form-control' name='support_email' type='text' value="<?php if ($dbsupport_email->value) echo $dbsupport_email->value;?>" maxlength='225' /> 
                           </div>
                   </div>               
                
            </div>
            <!-- /.row -->
        </div>
        </div>
        
        
        <div class="box box-default">
        <div class="box-header with-border">
                <h3 class="box-title">Contact Us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enabled</label>
                             <select class="form-control select2" data-placeholder="Select Options"  name="contact_enable" style="width: 100%;">
                             <option value="">Select Options</option>
                                <option value="yes" <?php if ($dbcontact_enable->value=="yes") echo 'selected' ;?>>Yes</option>
                                <option value="no" <?php if ($dbcontact_enable->value=="no") echo 'selected' ;?>>No</option>
                            </select>
	
                        </div>
                   </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                       <!-- /.form-group -->
                        <div class="form-group">
                            <label>Email To</label>
                           <input id='field-phone' class='form-control' name='email_to' type='text' value="<?php if ($dbemail_to->value) echo $dbemail_to->value;?>" maxlength='225' /> 
                           </div>
                   </div>               
                
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
    