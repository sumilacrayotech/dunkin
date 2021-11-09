<script>
    $(function() {
        $("#skill_input").autocomplete({
            source: "<?php echo base_url('users/allStores') ?>",
            minLength: 3
        });
    });
</script>
<div class="content-wrapper" style="min-height: 525px;">
    <section class="content-header">
        <h1>
          Edit Questionnare
            <small class="small_css">Customer Survey Portal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Manage Questions</a></li>
            <li class="active"> Edit Questionnare</li>
        </ol>
    </section>
    <section class="content">
        <div class="box_new">
            <div class="row">
                  <div class="col-lg-12 col-xs-12">
                        <h4><strong>Edit Questionnare</strong></h4>
                   <br>
                  </div>
                   <form method="post" action="<?php echo base_url();?>questions/editmainquestionprocess">


                <div class="col-lg-4 col-xs-12">
                    <span style="color:green;font-size:18px;"><?php echo $this->session->flashdata('messages');?></span>
                   
                        <div class="form-group">
                            <label for="username"> Title</label>
                        <input type="text" class="form-control  " placeholder="" name="title" id=""  required value="<?php echo $questdetails->title;?> ">
                        </div>
                        <!--<div class="form-group">
                            <label for="username"> Number</label>
                        <input type="number" class="form-control  " placeholder="" name="text" id="" >
                        </div>-->
                    <input type="hidden" name="questid" value="<?php echo $this->uri->segment(3)?>" />
                         <div class="form-group">
                            <label for="username">Status</label>
                           <select class="form-control" id="status" name="status" required>
                               <option value="">Please Select</option>
                               <option value="Active" <?php if ($questdetails->status=='Active'){?>selected <?php } ?>>Active</option>
                                 <option value="Inactive" <?php if ($questdetails->status=='Inactive'){?>selected <?php } ?>>Inactive </option>
                         </select>
                        </div>
                    </div>
                     <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                            <label for="username">Store ID</label>
                           <select class="form-control" id="storeid" name="storeid" required>
                               <option value="">Please Select</option>
                               <?php foreach($stores as $store){?>
                                   <option value="<?php echo $store->storeid;?>" <?php if ($questdetails->storeid==$store->storeid){?>selected <?php } ?>><?php echo $store->name;?></option>
                               <?php } ?>

                           </select>
                        </div>
                         <!--<div class="form-group">
                            <label for="username"> Customer ID </label>
                        <input type="text" class="form-control  " placeholder="" name="text" id="" >
                        </div>-->
                       

                 
                 </div>  
                   <div class="col-lg-12 col-xs-12">    
                        <button type="submit" class="btn_save">Update</button>
                    </div>
                    </form>

                </div>
            </div>
    
    </section>
</div>
<style type="text/css">
.btn_save{
color: #fff;
border: solid 1px #ff6e0d;
border-radius: 3px;
background-color: #ff6e0d;
padding: 5px 35px;
font-size: 16px;
}
.btn_save:hover{
border: solid 1px #db1a83;
background-color: #db1a83;
}
.form_inputnew {
    display: inline-block;
    width: 80%;
}
.add_fields {
    border: 1px solid ghostwhite;
    color: #fff;
    background-color: #da1984;
    padding: 7px 15px;
    border-radius: 5px;
}
a.remove_field {
    color: red;
}
</style>

