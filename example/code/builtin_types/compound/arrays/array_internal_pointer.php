<?php

$someArray = [1, 3, 5];

print("Some array:\n");
print_r($someArray);
print(PHP_EOL);

$current = current($someArray);
$pos = pos($someArray); // alias of current
$key = key($someArray);

print(
    'current: ' . var_export($current, true) . PHP_EOL
    . 'pos: ' . var_export($pos, true) . PHP_EOL
    . 'key: ' . var_export($key, true) . PHP_EOL . PHP_EOL
);

$next = next($someArray);
$current = current($someArray);
$pos = pos($someArray);
$key = key($someArray);

print(
    'next: ' . var_export($next, true) . PHP_EOL
    . 'current: ' . var_export($current, true) . PHP_EOL
    . 'pos: ' . var_export($pos, true) . PHP_EOL
    . 'key: ' . var_export($key, true) . PHP_EOL . PHP_EOL
);

$next = next($someArray);
$current = current($someArray);
$pos = pos($someArray);
$key = key($someArray);

print(
    'next: ' . var_export($next, true) . PHP_EOL
    . 'current: ' . var_export($current, true) . PHP_EOL
    . 'pos: ' . var_export($pos, true) . PHP_EOL
    . 'key: ' . var_export($key, true) . PHP_EOL . PHP_EOL
);

$prev = prev($someArray);
$current = current($someArray);
$pos = pos($someArray);
$key = key($someArray);

print(
    'prev: ' . var_export($prev, true) . PHP_EOL
    . 'current: ' . var_export($current, true) . PHP_EOL
    . 'pos: ' . var_export($pos, true) . PHP_EOL
    . 'key: ' . var_export($key, true) . PHP_EOL . PHP_EOL
);

$prev = prev($someArray);
$current = current($someArray);
$pos = pos($someArray);
$key = key($someArray);

print(
    'prev: ' . var_export($prev, true) . PHP_EOL
    . 'current: ' . var_export($current, true) . PHP_EOL
    . 'pos: ' . var_export($pos, true) . PHP_EOL
    . 'key: ' . var_export($key, true) . PHP_EOL . PHP_EOL
);

$prev = prev($someArray);
$current = current($someArray);
$pos = pos($someArray);
$key = key($someArray);

print(
    'prev: ' . var_export($prev, true) . PHP_EOL
    . 'current: ' . var_export($current, true) . PHP_EOL
    . 'pos: ' . var_export($pos, true) . PHP_EOL
    . 'key: ' . var_export($key, true) . PHP_EOL . PHP_EOL
);
