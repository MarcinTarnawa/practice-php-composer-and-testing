<?php

use Core\Noticer;

test('first self test: Noticer message', function () {

    $test = Noticer::message('succes','Test String');

     expect($test)->toBe('Test String');
});