<?php

$someNumbers = [1, 3, 5];
$otherNumbers = [7, 8, 9];
$anotherNumbers = [0 => 2, 1 => 4, 2 => 6];
$someValues = [0 => 7.1, 1 => 8.2, 2 => 9.3];
$otherValues = [10 => 1.2, 11 => 2.4, 12 => 3.6];

$someQuantities = [...$someNumbers, ...$otherNumbers];

print("Some quantities:\n\n");
print_r($someQuantities);
print(PHP_EOL);

$otherQuantities = [...$someNumbers, ...$anotherNumbers];

print("Other quantities:\n\n");
print_r($otherQuantities);
print(PHP_EOL);

$anotherQuantities = [...$anotherNumbers, ...$someNumbers];

print("Another quantities:\n\n");
print_r($anotherQuantities);
print(PHP_EOL);

$someMeasures = [...$someValues, ...$anotherNumbers];

print("Some measures:\n\n");
print_r($someMeasures);
print(PHP_EOL);

$otherMeasures = [...$someValues, ...$otherValues];

print("Other measures:\n\n");
print_r($otherMeasures);
print(PHP_EOL);

$someItems = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3,
];

$otherItems = [
    'color' => 'blue',
    'number' => 9,
];

$someVarietes = [...$someItems, ...$otherItems];

print("Some varietes:\n\n");
print_r($someVarietes);
print(PHP_EOL);

$otherVarietes = [...$otherItems, ...$someItems];

print("Other varietes:\n\n");
print_r($otherVarietes);
print(PHP_EOL);
