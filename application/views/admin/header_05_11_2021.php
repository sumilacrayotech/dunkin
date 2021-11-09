<script src="http://www.openjs.com/scripts/events/keyboard_shortcuts/shortcut.js"></script>
<script>
    /*shortcut.add("Ctrl+Shift+X",function() {
        alert("Hi there!");
    });*/
</script>
<style>
    cite{color: red}
</style>
<header class="main-header">
    <input type="hidden" value="<?php echo base_url();?>" id="base_url">
    <?php $admin=new Main();?>
<!--     <a href="javascript:void(0)" id="full_sr" onclick="fullScreen()" class="logo">
        <img style="background-color: #1C161696;" src="<?php echo base_url() ?>skin/admin/images/logo.jpg" class="user-image" alt="User Image">
    </a> -->
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="<?php echo base_url().'index.php/dashboard';?>" class="dropdown-toggle" data-toggle="dropdown">
                        <img style="background-color: #1C161696;" src="<?php echo base_url() ?>skin/admin/images/logo.jpg" class="user-image" alt="User Image">
                        <?php
                        $user=$this->ion_auth->user()->row(); 
                        $user=$user->username;
                        ?>
                        <span class="hidden-xs"><span style="text-transform: uppercase;"><?php echo $user;?></span></span> <br>
                        <span class="superadmin">Super Admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img style="background-color: #1C161696;" src="<?php echo base_url() ?>skin/admin/images/logo.jpg" class="img-circle" alt="User Image">
                            <p>
                             <?php echo $user;?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('admin/profile') ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url()?>admin/logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>