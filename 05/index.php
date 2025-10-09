<?php

include 'CurrencyFormatter.php';

$cf = new CurrencyFormatter();
$str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], // after or before available
    ['decimal' => ',', 'thousands' => ' ']
); // => 2 410,12 PLN

var_dump($str);