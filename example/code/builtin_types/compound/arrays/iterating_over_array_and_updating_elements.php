<?php

$someArray = [1, 3, 5];

print("Before:\n");
print_r($someArray);

for ($i = 0; $i < count($someArray); $i++) {
    $someArray[$i] *= 2;
}

print("After:\n");
print_r($someArray);
print(PHP_EOL);

$someArray = [1, 3, 5];

print("Before:\n");
print_r($someArray);

foreach ($someArray as &$value) {
    $value *= 3;
}

print("After:\n");
print_r($someArray);
print(PHP_EOL);

$someArray = [1, 3, 5];

print("Before:\n");
print_r($someArray);

foreach ($someArray as $key => $value) {
    $someArray[$key] *= 3;
}

print("After:\n");
print_r($someArray);
print(PHP_EOL);

$someArray = [1, 3, 5];

print("Before:\n");
print_r($someArray);

array_walk($someArray, function(&$value) {
    $value *= 4;
});

print("After:\n");
print_r($someArray);
print(PHP_EOL);

$someArray = [1, 3, 5];

print("Before:\n");
print_r($someArray);

array_walk($someArray, function($value, $key) use (&$someArray) {
    $someArray[$key] *= 4;
});

print("After:\n");
print_r($someArray);
print(PHP_EOL);

$someArray = [1, 3, 5, [2, 4]];

print("Before:\n");
print_r($someArray);

array_walk_recursive($someArray, function(&$value) {
  $value *= 5;
});

print("After:\n");
print_r($someArray);
print(PHP_EOL);

$someArray = [1, 3, 5, [2, 4]];

print("Before:\n");
print_r($someArray);

array_walk_recursive($someArray, function($value, $key) use (&$someArray) {
  $someArray[$key] *= 5;
});

print("someArray:\n");
print_r($someArray);
print(PHP_EOL);
