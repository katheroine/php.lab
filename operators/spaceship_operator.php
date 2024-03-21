<?php

$value = (1 <=> 2);
print($value . PHP_EOL);

$value = (3 <=> 2);
print($value . PHP_EOL);

$value = (4 <=> 4);
print($value . PHP_EOL);

print(PHP_EOL);

$value = ('a' <=> 'b');
print($value . PHP_EOL);

$value = ("bee" <=> "axolotl");
print($value . PHP_EOL);

$value = ('c' <=> "c");
print($value . PHP_EOL);

print(PHP_EOL);

$value = ([3, 6] <=> [2, 7, 8]);
print($value . PHP_EOL);

$value = ([2, 1] <=> [2, 1]);
print($value . PHP_EOL);

print(PHP_EOL);

$value = (DateTime::createFromFormat('Y-m-d', '2000-02-01') <=> DateTime::createFromFormat('Y-m-d', '2000-01-01'));
print($value . PHP_EOL);

print(PHP_EOL);

$someArray = [5, 1, 6, 3];

usort($someArray, function ($a, $b) {
    return $a <=> $b;
});
print_r($someArray);
print(PHP_EOL);

usort($someArray, function ($a, $b) {
    return $b <=> $a;
});
print_r($someArray);
print(PHP_EOL);

usort($someArray, function ($a, $b) {
    return -($a <=> $b);
});
print_r($someArray);
print(PHP_EOL);
