<?php

function currencyConverter($fromCurrency,$toCurrency,$amount) {
    $fromCurrency = urlencode($fromCurrency);
    $toCurrency = urlencode($toCurrency);
    $url  = "https://www.google.com/search?q=".$fromCurrency."+to+".$toCurrency;
    $get = file_get_contents($url);
    $data = preg_split('/\D\s(.*?)\s=\s/',$get);
    $exhangeRate = (float) substr($data[1],0,7);
    $convertedAmount = $amount*$exhangeRate;
    $data = array( 'exhangeRate' => $exhangeRate, 'convertedAmount' =>$convertedAmount,
        'fromCurrency' => strtoupper($fromCurrency), 'toCurrency' => strtoupper($toCurrency));
    print_r($data);
}
currencyConverter('USD','BHD',58);

//echo $orderIncNumber = sprintf("%'.09d\n", 8);
?>
