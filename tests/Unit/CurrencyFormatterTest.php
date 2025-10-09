<?php

require '05/CurrencyFormatter.php';
$cf = new CurrencyFormatter();

it('Test no data Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12,
); 
expect($str)->toBe('2 410,12 PLN');
});

it('Test standard Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ',', 'thousands' => ' ']
); 
expect($str)->toBe('2 410,12 PLN');
});

it('test currency as $ sign Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => '$'], 
    ['decimal' => ',', 'thousands' => ' ']
); 
expect($str)->toBe('2 410,12 $');
});

it('test decimal as dot Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => '.', 'thousands' => ' ']
    );
expect($str)->toBe('2 410.12 PLN');
});

it('test decimal as space Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ' ', 'thousands' => ' ']
    );
expect($str)->toBe('2 410 12 PLN');
});

it('test thousands separator as dot Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['after' => 'PLN'], 
    ['decimal' => ',', 'thousands' => '.']
    );
expect($str)->toBe('2.410,12 PLN');
});

it('test before sign as $ Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['before' => '$'], 
    ['decimal' => ',', 'thousands' => ' ']
    );
expect($str)->toBe('$ 2 410,12');
});

it('test before sign as $ and dot as decimal separator Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.12, 
    ['before' => '$'], 
    ['decimal' => '.', 'thousands' => ' ']
    );
expect($str)->toBe('$ 2 410.12');
});

it('test number without decimal numbers with $ sign before Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410,
    ['before' => '$'], 
    ['decimal' => ',', 'thousands' => ' ']
    );
expect($str)->toBe('$ 2 410,00');
});

it('test number without decimal with PLN after sign Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410, 
    ['after' => 'PLN'], 
    );
expect($str)->toBe('2 410,00 PLN');
});

it('test number without thousand space with PLN after sign Formatter', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.77, 
    ['after' => 'PLN'],
    ['decimal' => ',', 'thousands' => '']
    );
expect($str)->toBe('2410,77 PLN');
});

it('test formatter without currency add', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->format(
    2410.77, 
    ['after' => ''],
    ['decimal' => ',', 'thousands' => ' ']
    );
expect($str)->toBe('2 410,77');
});

test('test addCurrency method after', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->addCurrency(
    2410.77, 
    ['after' => 'PLN']
    );
expect($str)->toBe('2410.77 PLN');
});

test('test addCurrency method empty', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->addCurrency(
    2410.77, 
    ['after' => '']
    );
expect($str)->toBe('2410.77');
});

test('test addCurrency method before', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->addCurrency(
    2410.77, 
    ['before' => 'PLN']
    );
expect($str)->toBe('PLN 2410.77');
});

test('test decimal method', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->decimal(
    2410.77, 
    ['decimal' => ',', 'thousands' => ' ']
    );
expect($str)->toBe('2 410,77');
});

test('test decimal method with dot', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->decimal(
    2410.77, 
    ['decimal' => '.', 'thousands' => ' ']
    );
expect($str)->toBe('2 410.77');
});

test('test decimal method without space between thousands', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->decimal(
    2410.77, 
    ['decimal' => ',', 'thousands' => '']
    );
expect($str)->toBe('2410,77');
});

test('test decimal method space between thousands', function () {
    $cf = new CurrencyFormatter();
    $str = $cf->decimal(
    322323222410.77, 
    ['decimal' => ',', 'thousands' => ' ']
    );
expect($str)->toBe('322 323 222 410,77');
});