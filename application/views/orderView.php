<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>dashboard"><i class="fa fa-dashboard"></i>Dash Board</a></li>
            <li><a href="<?php echo base_url()?>order">Orders</a></li>
            <li><a href="javascript:void(0)">Order View</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="invoice" style="margin-top: 35px;">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    #<?php echo $order->order_increment_id ?>
                    <small class="pull-right">Date: <?php echo date('Y-m-d',strtotime($order->created_at)) ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Billing Address
                <address>
                    <strong><?php echo $billingAddress->name ?></strong><br>
                    <?php echo $billingAddress->address?><br>
                    <?php echo $billingAddress->city?><br>
                    <?php echo $billingAddress->state?><br>
                    <?php echo $billingAddress->country_code?><br>
                    <?php echo $billingAddress->zip_code?><br>
                    Phone: <?php echo $billingAddress->phone_number?><br>
                    Email: <?php echo $billingAddress->email?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Shipping Address
                <address>
                    <strong><?php echo $shippingAddress->name ?></strong><br>
                    <?php echo $shippingAddress->address?><br>
                    <?php echo $shippingAddress->city?><br>
                    <?php echo $shippingAddress->state?><br>
                    <?php echo $shippingAddress->country_code?><br>
                    <?php echo $shippingAddress->zip_code?><br>
                    Phone: <?php echo $shippingAddress->phone_number?><br>
                    Email: <?php echo $shippingAddress->email?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Order ID:</b> <?php echo $order->order_increment_id ?><br>
                <b>Status:</b> <?php echo ucfirst($order->status) ?><br>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orderItems as $item):
                        $product = $app->getProduct($item->product_id);
                        ?>
                        <tr>
                            <td>
                                <img height="150" width="150" src="<?php echo base_url().'assets/uploads/products/main/'.$product->image?>" alt="product_img1">
                            </td>
                            <td><?php echo $item->name ?></td>
                            <td><?php echo $item->sku ?></td>
                            <td><?php echo $item->qty ?></td>
                            <td><?php echo $main->CurrencyFormattedPrice($item->price,$order->currency_code); ?></td>
                            <td><?php echo $main->CurrencyFormattedPrice($item->row_total,$order->currency_code); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Payment Methods:</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php echo $order->payment_method?>
                </p>
                <p class="lead">Shipping Methods:</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php echo $order->shipping_method ?>
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead"> Order Totals </p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td><?php echo $main->CurrencyFormattedPrice($order->sub_total,$order->currency_code); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping(<?php echo $order->shipping_method ?>):</th>
                            <td><?php echo $main->CurrencyFormattedPrice($order->shipping_amount,$order->currency_code); ?></td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><strong><?php echo $main->CurrencyFormattedPrice($order->grand_total,$order->currency_code); ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                    Cancel
                </button>
                <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                    Send Email
                </button>
                <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                    Hold
                </button>
                <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">
                    Ship
                </button>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    Generate Invoice
                </button>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
</div>