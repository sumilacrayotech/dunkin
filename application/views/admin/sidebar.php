<?php $admin=new Main();
$menu=$admin->getmenus();
//print_r($menu);
$menuarr=$menu[0]->menus;
//print_r($menuarr);
$menuarr1=explode(',',$menuarr);
//print_r($menuarr1);
$sess=$admin->ifLogin();
//echo "kkk-".$sess->user_id;
//print_r($sess);
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <?php
        $att_active = ($this->uri->segment(1)== 'configuration') ? 'active' : '';
        $att_order = ($this->uri->segment(1)== 'order') ? 'active' : '';
        $att_users = ($this->uri->segment(1)== 'users') ? 'active' : '';
        $cms = ($this->uri->segment(1)=='cms') ? 'active' : '';
        $news = ($this->uri->segment(1)=='news') ? 'active' : '';
        $catalog_active = ($this->uri->segment(1)== 'catalog') ? 'active' : '';
        $products_active = ($this->uri->segment(1)== 'products') ? 'active' : '';
        $attr_active = ($this->uri->segment(1)=='attribut') ? 'active' : '';
        $coupon_active = ($this->uri->segment(1)=='coupon') ? 'active' : '';
        $seo_active = ($this->uri->segment(1)=='seo') ? 'active' : '';
        $attribut_set_active = ($this->uri->segment(2)=='attribut_set') ? 'active' : '';
        $attribut_set_add_active = ($this->uri->segment(2)=='add_attribut_set') ? 'active' : '';
        $attribut_active = ($this->uri->segment(2)=='list_attribute') ? 'active' : '';
        $add_attribut_active = ($this->uri->segment(2)=='add_attribut') ? 'active' : '';
        ?>
         <div class="logo_sidebar">
              <a href="javascript:void(0)" id="full_sr" onclick="fullScreen()" class="logo">
        <!-- logo for regular state and mobile devices -->
        <img style="background-color: #1C161696;" src="<?php echo base_url() ?>skin/admin/images/logo.jpg" class="user-image" alt="User Image">
    </a>
         </div>
         <div class="search_sidebar">
             <input type="search" name="" class="search_bar" placeholder="Search...">
             <img src="<?php echo base_url() ?>skin/admin/images/search_icon.png" class="icon_search">
         </div>
        <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <?php  $urlval=$this->uri->segment(1);
            //echo "hello1";
            //echo "<br>";
            $urlval1=$this->uri->segment(2);
             //echo "<br>";
            $urlval2=$this->uri->segment(3);
            ?>

            <?php if (in_array('Dashboard',$menuarr1)){?>
            <li class=" treeview <?php if ($urlval=='dashboard'){?>activeli<?php } ?>">
                <a href="<?php echo base_url() ?>dashboard">
                   <img src="<?php echo base_url() ?>skin/admin/images/icon_01.png" class="orange_img">
                   <img src="<?php echo base_url() ?>skin/admin/images/icon_01w.png" class="white_img">
                    <span>Dashboard</span>
                </a>
            </li>
            <?php }?>
            <?php if (in_array('Manage Store',$menuarr1)){?>
               <li class=" treeview <?php if ($urlval=='store'){?> activeli <?php } ?>">
                <a href="<?php echo base_url() ?>store">
                   <img src="<?php echo base_url() ?>skin/admin/images/icon_02.png" class="orange_img">
                   <img src="<?php echo base_url() ?>skin/admin/images/icon_02w.png" class="white_img"> 
                   <span>Manage Store</span>
                </a>
            </li>
            <?php }?>
            <?php if (in_array('customerqrcode',$menuarr1)){?>
            <li class=" treeview <?php if ($urlval1=="index"){?> activeli <?php } ?>">
                <a href="<?php echo base_url() ?>customerqrcode/index">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_10.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_10w.png" class="white_img">
                     <span>QR Code </span>
                </a>
            </li>
            <?php }?>
            <?php if (in_array('Manage Questions',$menuarr1)){?>
            <li class=" treeview <?php if (($urlval1=='addmainquestions') || ($urlval1=='listmainquestions') || ($urlval=='questions')){?> activeli <?php } ?>">
                <a href="#">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_11.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_11w.png" class="white_img">
                     <span>Manage Questions</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>questions/addmainquestions">  <img src="<?php echo base_url() ?>skin/admin/images/icon_12.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_12w.png" class="white_img"> Add Questionnare </a></li>
                    <li><a href="<?php echo base_url() ?>questions/listmainquestions">  <img src="<?php echo base_url() ?>skin/admin/images/icon_13.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_13w.png" class="white_img"> List Questionnare </a></li>

                    <li><a href="<?php echo base_url() ?>questions/">   <img src="<?php echo base_url() ?>skin/admin/images/icon_14.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_14w.png" class="white_img"> Add Questions</a></li>
                </ul>
            </li>
            <?php }?>

            <?php if (in_array('Manage Customers',$menuarr1)){?>
            <li class=" treeview <?php if ($urlval=='customer'){?> activeli <?php } ?>">
                <a href="<?php echo base_url() ?>customer">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_05.png" class="orange_img">
                     <img src="<?php echo base_url() ?>skin/admin/images/icon_05w.png" class="white_img">
                    <span>Manage Customers</span>
                </a>
            </li>
                <?php }?>
            <?php if (in_array('User Management',$menuarr1)){?>
            <li class=" treeview <?php if (($urlval2=='add') || ($urlval1=='customers')){?> activeli <?php } ?>">
                <a href="#">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_03.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_03w.png" class="white_img">
                     <span>User Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>users/customers/">  <img src="<?php echo base_url() ?>skin/admin/images/icon_08.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_08w.png" class="white_img"> All Users</a></li>
                    <li><a href="<?php echo base_url() ?>users/adduser">   <img src="<?php echo base_url() ?>skin/admin/images/icon_09.png" class="orange_img">
                    <img src="<?php echo base_url() ?>skin/admin/images/icon_09w.png" class="white_img"> Add User</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if (in_array('Reports',$menuarr1)){?>
               <li class=" treeview <?php if (($urlval1=='usedQrcode')|| ($urlval1=='answeredquestionnaire')){?> activeli <?php } ?>">
                <a href="#">
                   <img src="<?php echo base_url() ?>skin/admin/images/icon_07.png" class="orange_img">
                   <img src="<?php echo base_url() ?>skin/admin/images/icon_07w.png" class="white_img">
                   <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                 <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo base_url() ?>customerqrcode/usedQrcode">
                            <img src="<?php echo base_url() ?>skin/admin/images/icon_06.png" class="orange_img">
                            <img src="<?php echo base_url() ?>skin/admin/images/icon_06w.png" class="white_img">Used QrCode
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>customerqrcode/answeredquestionnaire">
                            <img src="<?php echo base_url() ?>skin/admin/images/icon_15.png" class="orange_img">
                            <img src="<?php echo base_url() ?>skin/admin/images/icon_15w.png" class="white_img">Answered Questionnaire
                        </a>
                    </li>
                     <?php }?>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>