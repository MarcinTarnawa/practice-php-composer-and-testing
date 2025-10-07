<?php

test('Test Currency Formatter', function () {
    require '05/CurrencyFormatter.php';
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ',', 'thousands' => ' ']
); // => 2 410,12 PLN

expect($str)->toBe('2 410,12 PLN');
});
