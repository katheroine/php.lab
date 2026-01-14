<?php

$numbers = [2, 4, 6];

print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");
var_dump($numbers); print("\n\n");

$values = [9.5, 8.5, 7.5];

print("\$values[0]: {$values[0]}\n");
print("\$values[1]: {$values[1]}\n");
print("\$values[2]: {$values[2]}\n\n");
var_dump($values); print("\n\n");

$words = ["first", "two", "last"];

print("\$words[0]: {$words[0]}\n");
print("\$words[1]: {$words[1]}\n");
print("\$words[2]: {$words[2]}\n\n");
var_dump($words); print("\n\n");

$items = [
  321,
  2.5,
  "orange",
  [2, 4, 6],
  new stdClass,
];

print("\$items[0]: {$items[0]}\n");
print("\$items[1]: {$items[1]}\n");
print("\$items[2]: {$items[2]}\n");
print("\$items[3]: {$items[3][0]}, {$items[3][1]}, {$items[3][2]}\n");
print("\$items[4]: " . gettype($items[4]) . "\n\n");
var_dump($items); print("\n\n");
