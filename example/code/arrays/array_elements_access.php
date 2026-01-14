<?php

$numbers = [];

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[2] = 6;

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

print("\$numbers[0]: " . current($numbers) . "\n");
print("\$numbers[1]: " . next($numbers) . "\n");
print("\$numbers[2]: " . next($numbers) . "\n\n");

print("\$numbers[2]: " . current($numbers) . "\n");
print("\$numbers[1]: " . prev($numbers) . "\n");
print("\$numbers[0]: " . prev($numbers) . "\n\n");

$values = &$numbers;

$values[0] = 3;
$values[1] = 6;
$values[2] = 9;

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

$items = [];

$items[2] = "Hello, there!";
$items['color'] = 'orange';
$items[3.14] = 'PI';

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n");
print("\$items[3.14]: {$items[3.14]}\n\n");

print("\$items[0]: " . current($items) . "\n");
print("\$items[1]: " . next($items) . "\n");
print("\$items[2]: " . next($items) . "\n\n");

print("\$items[2]: " . current($items) . "\n");
print("\$items[1]: " . prev($items) . "\n");
print("\$items[0]: " . prev($items) . "\n\n");

$things = &$items;

$things[2] = "Hi!";
$things['color'] = 'blue';
$things[3.14] = 'three point fourteen';

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n");
print("\$items[3.14]: {$items[3.14]}\n\n");
