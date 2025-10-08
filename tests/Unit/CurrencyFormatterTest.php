<?php

require '05/CurrencyFormatter.php';
$cf = new CurrencyFormatter();

test('Test standard Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ',', 'thousands' => ' ']
); 
expect($str)->toBe('2 410,12 PLN');
});

test('test currency as $ sign Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => '$'], 
    ['decimal' => ',', 'thousands' => ' ']
); 
expect($str)->toBe('2 410,12 $');
});

test('test decimal as dot Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => '.', 'thousands' => ' ']
    );
expect($str)->toBe('2 410.12 PLN');
});

test('test decimal as space Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ' ', 'thousands' => ' ']
    );
expect($str)->toBe('2 410 12 PLN');
});

test('thousands separator as , Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ',', 'thousands' => '.']
    );
expect($str)->toBe('2.410,12 PLN');
});

test('test before sign , Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['before' => '$'], 
    ['decimal' => ',', 'thousands' => ' ']
    );
expect($str)->toBe('$ 2 410,12');
});