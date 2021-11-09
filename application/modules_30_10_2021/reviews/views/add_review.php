<style>
.star-rating {
  border:solid 1px #ccc;
  display:flex;
  flex-direction: row-reverse;
  font-size:1.5em;
  justify-content:space-around;
  padding:0 .2em;
  text-align:center;
  width:5em;
}

.star-rating input {
  display:none;
}

.star-rating label {
  color:#ccc;
  cursor:pointer;
}

.star-rating :checked ~ label {
  color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
  color:#fc0;
}


</style>


<section class="content-header" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <h1>
        Manage Reviews
        <small>Creates Product Reviews Here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url() . 'reviews'; ?>">Manage Reviews</a></li>
        <li class="active">Add Review</li>
    </ol>
</section>
<section class="content">
    <form class="form-horizontal" id="add_review" action="" method="post"/>
    <?php if($editreview->review_id){?>
    <input type="hidden" name="reviewid" value="<?php echo $editreview->review_id?>">
    <?php } ?>
    
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Review</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Name<cite>*</cite></label>
                <div class="col-sm-10">
                    <select class="form-control select2"  id="product" name="product" data-placeholder="Select a Product" style="width: 100%;" >
				             <?php
				                $i="0";
				                foreach ($products as $val)
					                {?>             
					                <option value="<?php echo $val->product_id;?>" <?php if ($val->product_id==$editreview->product_id) echo 'selected' ;?>><?php echo $val->product_name;?></option>       
									<?php
									}
									?>              
                          </select>
                          <?php echo form_error('product', '<div class="error">', '</div>'); ?>

                </div>
            </div>
                        
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Overall Rating</label>
                <div class="col-sm-10">
                <div class="star-rating">
				  <input type="radio" id="5-stars" name="rating" value="5" <?php if($editreview->overall_rating=="5") echo 'checked' ;?>/>
				  <label for="5-stars" class="star">&#9733;</label>
				  <input type="radio" id="4-stars" name="rating" value="4" <?php if($editreview->overall_rating=="4") echo 'checked' ;?>/>
				  <label for="4-stars" class="star">&#9733;</label>
				  <input type="radio" id="3-stars" name="rating" value="3" <?php if($editreview->overall_rating=="3") echo 'checked' ;?>/>
				  <label for="3-stars" class="star">&#9733;</label>
				  <input type="radio" id="2-stars" name="rating" value="2" <?php if($editreview->overall_rating=="2") echo 'checked' ;?>/>
				  <label for="2-stars" class="star">&#9733;</label>
				  <input type="radio" id="1-star" name="rating" value="1" <?php if($editreview->overall_rating=="1") echo 'checked' ;?>/>
				  <label for="1-star" class="star">&#9733;</label>
               </div>

               </div>
            </div>
            
            <!--<div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Value</label>
                <div class="col-sm-10">
                <div class="star-rating">
					<input type="radio" id="5-stars1" name="rating1" value="5" <?php if($editreview->value_rating=="5") echo 'checked' ;?>/>
					<label for="5-stars1" class="star">&#9733;</label>
					<input type="radio" id="4-stars1" name="rating1" value="4" <?php if($editreview->value_rating=="4") echo 'checked' ;?>/>
					<label for="4-stars1" class="star">&#9733;</label>
					<input type="radio" id="3-stars1" name="rating1" value="3" <?php if($editreview->value_rating=="3") echo 'checked' ;?>/>
					<label for="3-stars1" class="star">&#9733;</label>
					<input type="radio" id="2-stars1" name="rating1" value="2" <?php if($editreview->value_rating=="2") echo 'checked' ;?>/>
					<label for="2-stars1" class="star">&#9733;</label>
					<input type="radio" id="1-star1" name="rating1" value="1" <?php if($editreview->value_rating=="1") echo 'checked' ;?>/>
					<label for="1-star1" class="star">&#9733;</label>
                </div>
               </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Comfortable</label>
                <div class="col-sm-10">
                <div class="star-rating">
					<input type="radio" id="5-stars2" name="rating2" value="5" <?php if($editreview->comfortable_rating=="5") echo 'checked' ;?>/>
					<label for="5-stars2" class="star">&#9733;</label>
					<input type="radio" id="4-stars2" name="rating2" value="4" <?php if($editreview->comfortable_rating=="4") echo 'checked' ;?>/>
					<label for="4-stars2" class="star">&#9733;</label>
					<input type="radio" id="3-stars2" name="rating2" value="3" <?php if($editreview->comfortable_rating=="3") echo 'checked' ;?> />
					<label for="3-stars2" class="star">&#9733;</label>
					<input type="radio" id="2-stars2" name="rating2" value="2" <?php if($editreview->comfortable_rating=="2") echo 'checked' ;?> />
					<label for="2-stars2" class="star">&#9733;</label>
					<input type="radio" id="1-star2" name="rating2" value="1" <?php if($editreview->comfortable_rating=="1") echo 'checked' ;?>/>
					<label for="1-star2" class="star">&#9733;</label>
                </div>
               </div>
            </div>
            
             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Great Design</label>
                <div class="col-sm-10">
                <div class="star-rating">
					<input type="radio" id="5-stars3" name="rating3" value="5" <?php if($editreview->greatdesign_rating=="5") echo 'checked' ;?>/>
					<label for="5-stars3" class="star">&#9733;</label>
					<input type="radio" id="4-stars3" name="rating3" value="4" <?php if($editreview->greatdesign_rating=="4") echo 'checked' ;?>/>
					<label for="4-stars3" class="star">&#9733;</label>
					<input type="radio" id="3-stars3" name="rating3" value="3" <?php if($editreview->greatdesign_rating=="3") echo 'checked' ;?>/>
					<label for="3-stars3" class="star">&#9733;</label>
					<input type="radio" id="2-stars3" name="rating3" value="2" <?php if($editreview->greatdesign_rating=="2") echo 'checked' ;?>/>
					<label for="2-stars3" class="star">&#9733;</label>
					<input type="radio" id="1-star3" name="rating3" value="1" <?php if($editreview->greatdesign_rating=="1") echo 'checked' ;?>/>
					<label for="1-star3" class="star">&#9733;</label>
                </div>
               </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Well Made</label>
                <div class="col-sm-10">
                <div class="star-rating">
					<input type="radio" id="5-stars4" name="rating4" value="5" <?php if($editreview->wellmade_rating=="5") echo 'checked' ;?>/>
					<label for="5-stars4" class="star">&#9733;</label>
					<input type="radio" id="4-stars4" name="rating4" value="4" <?php if($editreview->wellmade_rating=="4") echo 'checked' ;?>/>
					<label for="4-stars4" class="star">&#9733;</label>
					<input type="radio" id="3-stars4" name="rating4" value="3" <?php if($editreview->wellmade_rating=="3") echo 'checked' ;?>/>
					<label for="3-stars4" class="star">&#9733;</label>
					<input type="radio" id="2-stars4" name="rating4" value="2" <?php if($editreview->wellmade_rating=="2") echo 'checked' ;?>/>
					<label for="2-stars4" class="star">&#9733;</label>
					<input type="radio" id="1-star4" name="rating4" value="1" <?php if($editreview->wellmade_rating=="1") echo 'checked' ;?>/>
					<label for="1-star4" class="star">&#9733;</label>
                </div>
               </div>
            </div>-->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea id="editor1"  class="form-control" name="description"><?php if($editreview->description){ echo $editreview->description;}?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control select2" data-placeholder="Select a Rating"  name="status" style="width: 100%;">                            
                                <option value="1" <?php if($editreview->status=="1") echo 'selected' ;?>>Active</option>
                                <option value="0" <?php if($editreview->status=="0") echo 'selected' ;?>>InActive</option>
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
    $(function ()
    {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });
</script>