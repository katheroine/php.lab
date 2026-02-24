<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");

list($e1, $e2, $e3) = $numbers;

print("First number: $e1\n");
print("Second number: $e2\n");
print("Third number: $e3\n\n");

list(,,$element3) = $numbers;

print("Third number: $element3\n\n");

list(1 => $element2, 0 => $element1) = $numbers;

print("First number: $element1\n");
print("Second number: $element2\n\n");

print("Items:\n\n");

$items = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3.14,
];

list('greetings' => $item1, 'number' => $item2, 'color' => $item3) = $items;

print("First item: $item1\n");
print("Second item: $item2\n");
print("Third item: $item3\n\n");

print("Values:\n\n");

$values = [1, 3, 5, [7.1, 7.3, 7.5]];

list($el1, $el2, $el3, list($nel1, $nel2, $nel3)) = $values;

print("First value: $el1\n");
print("Second value: $el2\n");
print("Third value: $el3\n");
print("First nested value: $nel1\n");
print("Second nested value: $nel2\n");
print("Third nested value: $nel3\n\n");

print("Pairs:\n\n");

$pairs = [
  ['blue', 0x0000FF],
  ['orange', 0xFFA500],
  ['violet', 0x8A2BE2],
];

foreach($pairs as [$name, $value]) {
  print("Name: $name, Value: $value\n");
}
