<?php
$cart = $this->cart->contents();
$grand_total = '';
foreach($cart as $item){
    $pri = $item['subtotal'];
    $grand_total = $grand_total + $pri;
    $sub_total = $grand_total;
}
$formattedSubTotal = $main->getBaseCurrency($sub_total);
if($shippingCharge!=0) {
    $grandTotalFormatted = $main->getBaseCurrency($sub_total+$shippingCharge);
?>
    <table class="table table-striped">
        <tbody>
        <tr>
            <th>Sub Total</th>
            <th>
                <?php echo $formattedSubTotal ?>
            </th>
        </tr>
        <tr>
            <th>Shipping Charge</th>
            <th>
                <?php echo $main->getBaseCurrency($shippingCharge) ?>
            </th>
        </tr>
        <tr>
            <th>Grand Total</th>
            <th>
                <?php echo $grandTotalFormatted ?>
            </th>
        </tr>
        </tbody>
    </table>
<?php }else{
    $grandTotalFormatted = $main->getBaseCurrency($sub_total);
    ?>
    <table class="table table-striped">
        <tbody>
        <tr>
            <th>Sub Total</th>
            <th>
                <?php echo $formattedSubTotal ?>
            </th>
        </tr>
        <tr>
            <th>Grand Total</th>
            <th>
                <?php echo $grandTotalFormatted ?>
            </th>
        </tr>
        </tbody>
    </table>
<?php }?>
