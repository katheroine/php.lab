<?php

$array = ['apple', 'orange', 'banana', 'pear', 'peach'];

for ($i = 0; $i < count($array); $i++) {
  print("\$array[{$i}]: {$array[$i]}\n");
}

print("\n");

$array = [2 => 'apple', 6 => 'orange', 15 => 'banana', 20 => 'pear', 35 => 'peach'];

foreach ($array as $value) {
  print("element: {$value}\n");
}

print("\n");

foreach ($array as $key => $value) {
  print("\$array[{$key}]: {$value} (the same: {$array[$key]})\n");
}

print("\n");

array_walk($array, function($value) {
  print("element: {$value}\n");
});

print("\n");

array_walk($array, function($value, $key) {
  print("\$array[{$key}]: {$value}\n");
});

print("\n");

$array = ['apple', 'orange', 'banana', 'pear', 'peach', 'nested' => ['cherry', 'strawberry', 'blueberry', 'raspberry', 'blackberry']];

array_walk_recursive($array, function($value) {
  print("element: {$value}\n");
});

print("\n");

array_walk_recursive($array, function($value, $key) {
  print("\$array[{$key}]: {$value}\n");
});

print("\n");
