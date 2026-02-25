<?php

$numbers = [2, 3, 4];
$values = [5.1, 6.3, 7.5];
$items = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3.14,
];

$quantities = array_merge([0, 1], $numbers);

print("Quantities:\n\n");
print_r($quantities);
print(PHP_EOL);

$measures = array_merge($numbers, $values);

print("Measures:\n\n");
print_r($measures);
print(PHP_EOL);

$varietes = array_merge([0], $measures, $items, ['exit', 'quit']);

print("Varietes:\n\n");
print_r($varietes);
print(PHP_EOL);
