<!-- START SECTION BREADCRUMB -->
<style type="text/css">
    .product-item-name {
        display: block;
        font-size: 14px;
        margin: 0 0 3px 0;
        word-wrap: break-word;
        -webkit-hyphens: auto;
        -moz-hyphens: auto;
        -ms-hyphens: auto;
        hyphens: auto;
        box-shadow: 0 0 0 rgb(0 0 0 / 0%);
        font-weight: 400;
        font-size: 14px;
    }
    table#my-orders-table th {
        font-size: 14px;
        font-weight: 500;
    }
    table#my-orders-table td {
        font-weight: 400;
        font-size: 13px;
        vertical-align: top;
    }
    table#my-orders-table .price {
        color: #000;
        font-weight: 400;
        font-size: 14px;
    }
    .table tfoot > tr:first-child th,
    .table tfoot > tr:first-child td {
        border-top: 1px solid #ccc;
        padding-top: 18px;
    }
    table > thead > tr > th,
    table > tbody > tr > th,
    table > tfoot > tr > th,
    table > thead > tr > td,
    table > tbody > tr > td,
    table > tfoot > tr > td {
        padding: 11px 9px;
    }
    table > tbody > tr > th,
    table > tfoot > tr > th,
    table > tbody > tr > td,
    table > tfoot > tr > td {
        vertical-align: top;
    }
    #my-orders-table .mark,
    #my-orders-table mark {
        background-color: #fff;
    }
    ul.items-qty li {
        list-style: none;
    }
    .order-details-items .items-qty .item {
        white-space: nowrap;
    }
    @media (min-width: 768px) {
        #my-orders-table tfoot .amount,
        #my-orders-table tfoot .mark {
            text-align: right !important;
        }
    }
    @media only screen and (max-width: 639px) {
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) {
            border: none;
            display: block;
        }
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) > thead > tr > th {
            display: none;
        }
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) > tbody {
            display: block;
        }
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) > tbody > tr {
            display: block;
        }
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) tbody > tr > td:first-child {
            padding-top: 15px;
        }
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) > tbody > tr td,
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) > tbody > tr th {
            border-bottom: none;
            display: block;
            padding: 4.5px 9px;
        }
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) > tbody > tr td[data-th]:before,
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) > tbody > tr th[data-th]:before {
            padding-right: 9px;
            content: attr(data-th) ": ";
            display: inline-block;
            color: #555;
            font-weight: 700;
        }
        .account .table-order-items .product-item-name {
            display: inline-block;
            margin: 0;
        }
        .table-wrapper .table:not(.totals):not(.cart):not(.table-comparison) tbody > tr > td:last-child {
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }
        .order-details-items .col.price .price-including-tax,
        .order-details-items .col.subtotal .price-including-tax,
        .order-details-items .col.price .price-excluding-tax,
        .order-details-items .col.subtotal .price-excluding-tax {
            display: inline-block;
        }
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot {
            display: block;
        }
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot tr {
            display: block;
        }
        .abs-add-clearfix-mobile:before,
        .abs-add-clearfix-mobile:after,
        .abs-checkout-order-review tbody > tr:before,
        .abs-checkout-order-review tbody > tr:after,
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot tr:before,
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot tr:after,
        .table-giftregistry-items .col.product:before,
        .table-giftregistry-items .col.product:after,
        .multicheckout.order-review .data.table tbody > tr:before,
        .multicheckout.order-review .data.table tbody > tr:after {
            content: "";
            display: table;
        }
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot .mark {
            box-sizing: border-box;
            float: left;
            text-align: left;
            width: 70%;
        }
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot .amount {
            box-sizing: border-box;
            float: left;
            text-align: right;
            width: 30%;
        }
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot tr:first-child th,
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot tr:first-child td {
            padding-top: 18px;
        }
        .abs-add-clearfix-mobile:after,
        .abs-checkout-order-review tbody > tr:after,
        .table-wrapper .table:not(.totals):not(.table-comparison) tfoot tr:after,
        .table-giftregistry-items .col.product:after,
        .multicheckout.order-review .data.table tbody > tr:after {
            clear: both;
        }
        .order-details-items .items-qty {
            display: inline-block;
            vertical-align: top;
        }
        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 0 solid #dee2e6;
        }
    }
</style>
<div class="breadcrumb_section bg_whitediv page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
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
    </div>
    <!-- END CONTAINER-->
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class=" mb-3 ">
                                            <div class="card-header padd_newadd">
                                                <h2 class="head_adminh2"> #<?php echo $order->order_increment_id ?></h2>
                                                <small class="pull-right">Date: <?php echo date('Y-m-d',strtotime($order->created_at)) ?></small>
                                            </div>
                                        </div>
                                        <div class="order-details-items ordered">
                                            <div class="table-wrapper order-items">
                                                <table class="data table table-order-items" id="my-orders-table" summary="Items Ordered">
                                                    <thead>
                                                    <tr>
                                                        <th class="col name">Product Name</th>
                                                        <th class="col sku">SKU</th>
                                                        <th class="col price">Price</th>
                                                        <th class="col qty">Qty</th>
                                                        <th class="col subtotal">Subtotal</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($orderItems as $item):
                                                        $product = $app->getProduct($item->product_id);
                                                        ?>
                                                    <tr id="order-item-row-40">
                                                        <td class="col name" data-th="Product Name" style="padding-bottom: 11px;">
                                                            <strong class="product name product-item-name"><?php echo $item->name ?></strong>
                                                            <img height="150" width="150" src="<?php echo base_url().'assets/uploads/products/main/'.$product->image?>" alt="product_img1">
                                                        </td>
                                                        <td class="col sku" data-th="SKU"><?php echo $item->sku ?></td>
                                                        <td class="col price" data-th="Price">
                                                                <span class="price-excluding-tax" data-label="Excl. Tax">
                                                                    <span class="cart-price">
                                                                        <span class="price"><?php echo $main->CurrencyFormattedPrice($item->price,$order->currency_code); ?></span>
                                                                    </span>
                                                                </span>
                                                        </td>
                                                        <td class="col qty" data-th="Qty">
                                                            <ul class="items-qty">
                                                                <li class="item">
                                                                    <span class="title">Ordered</span>
                                                                    <span class="content"><?php echo $item->qty ?></span>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="col subtotal" data-th="Subtotal">
                                                            <span class="price-excluding-tax" data-label="Excl. Tax">
                                                                <span class="cart-price"> <span class="price"><?php echo $main->CurrencyFormattedPrice($item->row_total,$order->currency_code); ?></span> </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr class="subtotal">
                                                        <th colspan="4" class="mark" scope="row">
                                                            Subtotal
                                                        </th>
                                                        <td class="amount" data-th="Subtotal" style="padding-left: 0;">
                                                            <span class="price"><?php echo $main->CurrencyFormattedPrice($order->sub_total,$order->currency_code); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr class="shipping">
                                                        <th colspan="4" class="mark" scope="row">
                                                            Shipping (<?php echo $order->shipping_method ?>)
                                                        </th>
                                                        <td class="amount" data-th="Shipping &amp; Handling" style="padding-left: 0;">
                                                            <span class="price"><?php echo $main->CurrencyFormattedPrice($order->shipping_amount,$order->currency_code); ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr class="grand_total">
                                                        <th colspan="4" class="mark" scope="row">
                                                            <strong>Grand Total</strong>
                                                        </th>
                                                        <td class="amount" data-th="Estimated Total" style="padding-left: 0;">
                                                            <strong>
                                                                <span class="price"><strong><?php echo $main->CurrencyFormattedPrice($order->grand_total,$order->currency_code); ?></strong></span>
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="col-xs-6">
                                                <p class="lead" style="font-size: 14px;color: #000;"><strong>Payment Method: </strong> <?php echo $order->payment_method?></p>
                                            </div>
                                            <div class="col-xs-6">
                                                <p class="lead" style="font-size: 14px;color: #000;"><strong>Status: </strong> <?php echo ucfirst($order->status) ?></p>
                                            </div>
                                            <hr/>
                                            <a href="<?php echo base_url('customer/order/history') ?>">Back to My Orders</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 17px;">
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header" style="background-color: #eb4494;border-radius: unset;">
                                        <h3 style="color: #FFF"> Billing Address </h3>
                                    </div>
                                    <div class="card-body" style="border: 1px solid #DDD;border-top: unset;border-bottom: unset;height: 225px;">
                                        <address>
                                            <?php echo ucfirst($billingAddress->first_name) ?> <?php echo $billingAddress->last_name ?><br>
                                            <?php echo $billingAddress->address?><br>
                                            <?php echo $billingAddress->city?><br>
                                            <?php echo $billingAddress->state?><br>
                                            <?php echo $billingAddress->country_code?><br>
                                            <?php echo $billingAddress->zip_code?><br>
                                            T: <?php echo $billingAddress->phone_number?><br>
                                            Email: <?php echo $billingAddress->email?>
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header" style="background-color: #eb4494;border-radius: unset;">
                                        <h3 style="color: #FFF"> Shipping Address </h3>
                                    </div>
                                    <div class="card-body" style="border: 1px solid #DDD;border-top: unset;border-bottom: unset;height: 225px;">
                                        <address>
                                            <?php echo ucfirst($shippingAddress->first_name) ?> <?php echo $shippingAddress->last_name ?><br>
                                            <?php echo $shippingAddress->address?><br>
                                            <?php echo $shippingAddress->city?><br>
                                            <?php echo $shippingAddress->state?><br>
                                            <?php echo $shippingAddress->country_code?><br>
                                            <?php echo $shippingAddress->zip_code?><br>
                                            T: <?php echo $shippingAddress->phone_number?><br>
                                            Email: <?php echo $shippingAddress->email?>
                                        </address>
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
