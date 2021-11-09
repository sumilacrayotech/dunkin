<?php $admin = new Main()?>
<section class="content-header">
    <h1>Create Buyer</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Buyer</li>
    </ol>
</section>
<section class="content">
    <div id="message_designer" style="margin: 0px 0px 11px 0px;"></div>
    <form method="POST" action="" id="user_register_buyers">
        <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title" id="ajax_msg"></h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Title:</label>
                        <div class="form-control">
                            <div class="radio" style="float: left;width: 60px;margin-top: 0;">
                                <label>
                                    <input type="radio" name="civility" value="Miss">
                                    Miss
                                </label>
                            </div>
                            <div class="radio" style="float: left;width: 60px;margin-top: 1px;">
                                <label>
                                    <input type="radio" name="civility" value="Mrs">
                                    Mrs
                                </label>
                            </div>
                            <div class="radio" style="float: left;width: 60px;margin-top: 1px;">
                                <label>
                                    <input type="radio" name="civility" value="Mr">
                                    Mr
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Store Name *</label>
                        <input type="text" tabindex="1" required name="store_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name:</label>
                        <input type="text" tabindex="2" name="first_name" class="form-control">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" tabindex="3" name="last_name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" tabindex="4" name="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" tabindex="5" name="website" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" tabindex="6" name="password" id="password_new" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" tabindex="7" name="password_confirm" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-block btn-primary" style="float: left; width: 120px;" value="Create Account">
                <img id="loader_add_emp" src="<?php echo $admin->skin('images/103.gif');?>" style="margin-left: 10px; margin-top: 5px;display: none">
            </div>
        </div>
    </form>
</section>