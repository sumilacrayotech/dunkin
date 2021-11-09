<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Catalog
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Catalog</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <form action="" method="post" id="general"  enctype="multipart/form-data" accept-charset="utf-8">
    
    <div id="message"></div>

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Catalog Options</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Products per Page on Grid Default Value</label>
                             <input id='field-store-name' class='form-control' name='products_per_page' type='text' value="<?php if ($dbproducts_per_page->value) echo $dbproducts_per_page->value;?>" maxlength='225' />	
                        </div>
                   </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                       <!-- /.form-group -->
                        <div class="form-group">
                            <label>Product Listing Sort by</label>
                           <select class="form-control select2" data-placeholder="Select Options"  name="product_sort" style="width: 100%;">
                             <option value="">Select Options</option>
                                <option value="position" <?php if ($dbproduct_sort->value=="position") echo 'selected' ;?>>Position</option>
                                <option value="productname" <?php if ($dbproduct_sort->value=="productname") echo 'selected' ;?>>Product Name</option>
                                <option value="price" <?php if ($dbproduct_sort->value=="price") echo 'selected' ;?>>Price</option>
                            </select>
                           </div>
                   </div>               
                
            </div>
            <!-- /.row -->
        </div>
        
        </div>
        
        <div class="box box-default">
        <div class="box-header with-border">
                <h3 class="box-title">Product Reviews</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Enabled/Disabled</label>
                             <select class="form-control select2" data-placeholder="Select Options"  name="product_enable" style="width: 100%;">
                             <option value="">Select Options</option>
                                <option value="yes" <?php if ($dbproduct_enable->value=="yes") echo 'selected' ;?>>Yes</option>
                                <option value="no" <?php if ($dbproduct_enable->value=="no") echo 'selected' ;?>>No</option>
                            </select>
                        </div>
                   </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                       <!-- /.form-group -->
                        <div class="form-group">
                            <label>Allow Guests to Write Reviews</label>
                           <select class="form-control select2" data-placeholder="Select Options"  name="guest_review" style="width: 100%;">
                             <option value="">Select Options</option>
                                <option value="yes" <?php if ($dbguest_review->value=="yes") echo 'selected' ;?>>Yes</option>
                                <option value="no" <?php if ($dbguest_review->value=="no") echo 'selected' ;?>>No</option>
                            </select>
 
                           </div>
                   </div>               
                
            </div>
            <!-- /.row -->
        </div>
        </div>
        
        
        <div class="box box-default">
        <div class="box-header with-border">
                <h3 class="box-title">Inventory</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Display Out of Stock Products</label>
                             <select class="form-control select2" data-placeholder="Select Options"  name="stock_products" style="width: 100%;">
                             <option value="">Select Options</option>
                                <option value="yes" <?php if ($dbstock_products->value=="yes") echo 'selected' ;?>>Yes</option>
                                <option value="no" <?php if ($dbstock_products->value=="no") echo 'selected' ;?>>No</option>
                            </select>
                        </div>
                   </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                       <!-- /.form-group -->
                        <div class="form-group">
                            <label>Maximum Qty Allowed in Shopping Cart</label>
                           <input id='field-phone' class='form-control' name='max_quantity' type='text' value="<?php if ($dbmax_quantity->value) echo $dbmax_quantity->value;?>" maxlength='225' /> 
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
    