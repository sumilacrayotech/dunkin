<ul class="cart_list">
    <?php
    $grand_total = [];
    foreach($cartData as $item): ?>
    <li>
        <a href="#" class="item_remove"><i class="ion-close"></i></a>
        <a href="#"><img src="<?php echo $item['image'] ?>" alt="cart_thumb1"><?php echo $item['name'] ?></a>
        <span class="cart_quantity"> <?php echo $item['qty'] ?> x <span class="cart_amount"> <span class="price_symbole"><?php echo $main->currentCurrency() ?></span></span><?php echo number_format($item['price'],2) ?></span>
    </li>
    <?php
        $grand_total[] = $item['subtotal'];
    endforeach; ?>
</ul>
<div class="cart_footer">
    <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole"><?php echo $main->currentCurrency() ?></span></span><?php echo number_format(array_sum($grand_total),2) ?></p>
    <p class="cart_buttons"><a href="<?php echo base_url('checkout/cart') ?>" class="btn btn-fill-line view-cart">View Cart</a><a href="<?php echo base_url('checkout/index') ?>" class="btn btn-fill-out checkout">Checkout</a></p>
</div>