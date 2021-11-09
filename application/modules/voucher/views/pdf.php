<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<table style="max-width: 1200px;margin: 0 auto;">
    <?php
    $_collectionSize = count($voucher);
    $_columnCount = 4;
    $i=0;
    foreach ($voucher as $row):

        if($row->products){
            $products = explode(',',$row->products);
            $items = array();
            foreach ($products as $product){
                $item = explode('|',$product);
                $items[] = $item[0].'('.$item[1].')';
            }
        }else{
            $products = explode(',',$row->custom_products);
            $items = array();
            foreach ($products as $key => $product){
                $items[] = $product.'(CU'.$row->number.$key.')';
            }
        }

        $qr =  $row->id.'|'.$row->number.'|'.$row->name.'|'.@implode(',',$items).'|'.$row->percentage.'%';
        $qrcode = "https://chart.googleapis.com/chart?cht=qr&chs=300x303&chl=$qr&choe=UTF-8";
        $logo = 'https://dunkin.demoatcrayotech.com/html/images/logo-pdf.png';
        ?>
    <?php  if ($i++%$_columnCount==0) {?>
    <tr>
        <?php }?>
        <td style="padding: 10px 15px;text-align: center;">
            <div class="pdf-box" >
                <img src="<?php echo $qrcode ?>">
                <img src="<?php echo $logo ?>" style="width: 100%;padding:0px 10px;">
                <div>
                    <h3 style="font-family: sans-serif;font-size: 18.5px;">#<?php echo $row->number ?></h3>
                </div>
            </div>
        </td>
    <?php if ($i%$_columnCount==0 || $i==$_collectionSize){?>
    </tr>
    <?php }?>
    <?php endforeach; ?>
</table>
</body>
</html>