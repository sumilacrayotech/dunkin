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
                    <li class="breadcrumb-item active">My Account</li>
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
                                        <h2 class="head_adminh2">Account Information</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header" style="background-color: #eb4494;border-radius: unset;">
                                        <h3 style="color: #FFF">Contact Information</h3>
                                    </div>
                                    <div class="card-body" style="border: 1px solid #DDD;border-top: unset;border-bottom: unset;height: 100px;">
                                        <address>
                                            <?php echo ucfirst($customer->first_name).' '.$customer->last_name ?><br/>
                                            <?php echo $customer->email ?>
                                        </address>
                                    </div>
                                    <div class="card-header" style="background-color: #f5f5f5; border-radius: unset;border: solid 1px #DDD;">
                                        <a style="color: #eb4494;" href="#">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #eb4494;border-radius: unset;">
                                        <h3 style="color: #FFF">Newsletters</h3>
                                    </div>
                                    <div class="card-body" style="border: 1px solid #DDD;border-top: unset;border-bottom: unset;height: 100px;">
                                        <p>You aren't subscribed to our newsletter.
                                        </p>
                                    </div>
                                    <div class="card-header" style="background-color: #f5f5f5; border-radius: unset;border: solid 1px #DDD;">
                                        <a style="color: #eb4494;" href="#">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" mb-3 ">
                                    <div class="card-header padd_newadd">
                                        <h2 class="head_adminh2">Address Book</h2>
                                    </div>
                                </div>
                            </div>
                            <?php foreach($defaultAddress as $addressDefault):?>
                                <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header" style="background-color: #eb4494;border-radius: unset;">
                                            <h3 style="color: #FFF"> Default <?php echo ucfirst($addressDefault->address_type) ?> Address </h3>
                                        </div>
                                        <div class="card-body" style="border: 1px solid #DDD;border-top: unset;border-bottom: unset;height: 200px;">
                                            <address>
                                                <?php echo ucfirst($addressDefault->first_name) ?> <?php echo ucfirst($addressDefault->last_name) ?><br/>
                                                <?php echo ucfirst($addressDefault->address) ?><br/>
                                                <?php echo ucfirst($addressDefault->state) ?><br/>
                                                <?php echo ucfirst($addressDefault->city) ?><br/>
                                                <?php echo ucfirst($addressDefault->zip_code) ?><br/>
                                                <?php echo ucfirst($main->getCountryNameByCode($addressDefault->country_code)) ?><br/>
                                                T: <?php echo ucfirst($addressDefault->phone_number) ?><br/>
                                            </address>
                                        </div>
                                        <!--<div class="card-header" style="background-color: #f5f5f5; border-radius: unset;border: solid 1px #DDD;">
                                            <a style="color: #eb4494;" href="<?php /*echo base_url('customer/editAddress/'.$addressDefault->id) */?>">Edit</a>
                                        </div>-->
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" mb-3 ">
                                    <div class="card-header padd_newadd">
                                        <h2 class="head_adminh2"> Recent Orders</h2>
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