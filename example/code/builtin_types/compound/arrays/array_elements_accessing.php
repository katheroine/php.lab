<?php

$numbers = [];

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[2] = 6;

print("Numbers:\n\n");

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

print("current(\$numbers): " . current($numbers) . "\n");
print("next(\$numbers): " . next($numbers) . "\n");
print("next(\$numbers): " . next($numbers) . "\n\n");

print("current(\$numbers): " . current($numbers) . "\n");
print("prev(\$numbers): " . prev($numbers) . "\n");
print("prev(\$numbers): " . prev($numbers) . "\n\n");

$values = &$numbers;

$values[0] = 1;
$values[1] = 3;
$values[2] = 5;

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

$items = [];

$items[2] = "Hello, there!";
$items['color'] = 'orange';

print("Items:\n\n");

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n\n");

print("current(\$items): " . current($items) . "\n");
print("next(\$items): " . next($items) . "\n\n");

print("current(\$items): " . current($items) . "\n");
print("prev(\$items): " . prev($items) . "\n\n");

$things = &$items;

$things[2] = "Hi!";
$things['color'] = 'blue';

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n\n");
