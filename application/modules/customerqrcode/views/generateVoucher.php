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
            Add User
            <small class="small_css">Voucher Redemption </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> User Management</a></li>
            <li class="active"> Add User</li>
        </ol>
    </section>
    <section class="content">
        <div class="box_new">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div>
                        <?php echo $this->session->flashdata('message_name'); ?>
                    </div>
                    <form method="post" action="<?php echo base_url('users/addAction') ?>">
                        <div class="form-group">
                            <label for="username">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter user name">
                        </div>
                        <div class="form-group">
                            <label for="username">User Code</label>
                            <input type="text" class="form-control" name="usercode" placeholder="Enter user name">
                        </div>
                        <div class="form-group">
                            <label for="username">Store</label>
                            <input type="text" class="form-control" autocomplete="OFF" name="store_name" id="skill_input">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <select class="form-control form-control-lg" name="type">
                                <option>Select Type</option>
                                <option value="admin">Admin</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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