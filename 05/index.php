<?php

include 'CurrencyFormatter.php';

$cf = new CurrencyFormatter();
$str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ',', 'thousands' => ' ']
); // => 2 410,12 PLN

var_dump($str);

// $test = CurrencyFormatter::format('2410.12');

// var_dump($test);