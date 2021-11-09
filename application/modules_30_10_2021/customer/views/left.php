<div class="col-lg-3 col-md-4 dashboard_menu">
    <div class="">
        <?php
        $record_num = end($this->uri->segment_array());
        $dashBoardActive = ($record_num== 'account') ? 'active' : '';
        $addressActive = ($record_num== 'address') ? 'active' : '';
        $EditAddressActive = ($this->uri->segment(2)== 'editAddress') ? 'active' : '';
        $ordersActive = ($record_num== 'history') ? 'active' : '';
        $orderViewActive = ($this->uri->segment(3)== 'view') ? 'active' : '';
        $detailsActive = ($record_num== 'details') ? 'active' : '';
        ?>
        <ul class="nav nav-tabs flex-column" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?php echo $dashBoardActive ?>" href="<?php echo base_url('customer/account')?>">
                    <i class="ti-layout-grid2"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $ordersActive ?> <?php echo $orderViewActive ?>" href="<?php echo base_url('customer/order/history')?>">
                    <i class="ti-shopping-cart-full"></i>Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $addressActive ?> <?php echo $EditAddressActive ?>" href="<?php echo base_url('customer/address')?>">
                    <i class="ti-location-pin"></i>My Address
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $detailsActive ?>" href="<?php echo base_url('customer/details') ?>">
                    <i class="ti-id-badge"></i>Account details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('customer/logout')?>">
                    <i class="ti-lock"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</div>