<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>My Account</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">My Orders</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row">
                <?php echo $sideBar ?>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" mb-3 ">
                                    <div class="card-header padd_newadd">
                                        <h2 class="head_adminh2"> Order History</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr style="font-size: 12px">
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Ship To</th>
                                                    <th>Order Total</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($orders as $order): ?>
                                                    <tr style="font-size: 12px">
                                                        <td>#<?php echo $order->order_increment_id ?></td>
                                                        <td><?php echo date('M d, Y',strtotime($order->created_at)) ?></td>
                                                        <td><?php echo $app->getOrderShipTo($order->shipping_address_id) ?></td>
                                                        <td><?php echo $main->CurrencyFormattedPrice($order->grand_total,$order->currency_code) ?></td>
                                                        <td><?php echo ucfirst(($order->status))?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('customer/order/view/'.$order->id) ?>" style="color: #eb4494;">View</a>
                                                            <span style="color: #9A9A9A;">&nbsp;|&nbsp;</span>
                                                            <a href="#" style="color: #eb4494;">Reorder</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>