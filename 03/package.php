<?php
// collection test
use Illuminate\Support\Collection;

$numbers = new Collection([1,2,3,4,5,6,7,8,9,10]);

var_dump($numbers);

$filter = $numbers->filter(function ($numbers) {
    return $numbers < 5;
});

var_dump($filter);