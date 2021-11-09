<script>
    $(function() {
        $("#skill_input").autocomplete({
            source: "<?php echo base_url('users/allStores') ?>",
            minLength: 3
        });
    });
</script>
<?php
$main = new Main();
?>
<div class="content-wrapper" style="min-height: 525px;">
    <section class="content-header">
        <h1>
            Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="box_new">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div>
                        <?php echo $this->session->flashdata('message_name'); ?>
                    </div>
                    <form method="post" action="<?php echo base_url('admin/changeProfile') ?>">
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" class="form-control" disabled value="<?php echo $main->ifLogin()->email ?>" name="username" placeholder="Enter user name">
                        </div>
                        <div class="form-group">
                            <label for="username">New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="username">Current Password</label>
                            <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                        </div>
                        <button type="submit" class="btn_save">Save</button>
                    </form>
                </div>
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
</style>