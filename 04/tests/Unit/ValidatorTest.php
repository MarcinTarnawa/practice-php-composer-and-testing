<?php

use Core\Validator;

test('validate is number', function () {
    $validate = new Validator;
    $test = $validate->number(1);
    expect($test)->toBeTrue();
});

test('validate is not number', function () {
    $validate = new Validator;
    $test = $validate->number('string');
    expect($test)->toBeFalse();
});