<?php

$someArray = [
    1 => 15.5,
    'some_key' => 'some value',
    2 => 3,
    'other_key' => null,
];

var_dump(isset($someArray));
var_dump($someArray);
print(PHP_EOL);

unset($someArray);

var_dump(isset($someArray));
print(PHP_EOL);
