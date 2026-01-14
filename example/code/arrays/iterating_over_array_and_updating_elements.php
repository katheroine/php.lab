<?php

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

for ($i = 0; $i < count($array); $i++) {
  $array[$i] *= 2;
}

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

foreach ($array as &$value) {
  $value *= 3;
}

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

foreach ($array as $key => $value) {
  $array[$key] *= 3;
}

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

array_walk($array, function(&$value) {
  $value *= 4;
});

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5];

print("Before:\n");
print_r($array);

array_walk($array, function($value, $key) use (&$array) {
  $array[$key] *= 4;
});

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5, 'nested' => [2, 4]];

print("Before:\n");
print_r($array);

array_walk_recursive($array, function(&$value) {
  $value *= 5;
});

print("After:\n");
print_r($array);

print("\n");

$array = [1, 3, 5, 'nested' => [2, 4]];

print("Before:\n");
print_r($array);

array_walk_recursive($array, function($value, $key) use (&$array) {
  $array[$key] *= 5;
});

print("After:\n");
print_r($array);

print("\n");
