<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo base_url()?>" target="_blank">
            <img style="width: 50%" src="<?php echo base_url() ?>skin/admin/images/logo.png">
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div id="message"></div>
        <form method="post" id="adminlog">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback" style="top: 0px;"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback" style="top: 0px;"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>