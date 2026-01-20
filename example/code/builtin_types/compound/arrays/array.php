<?php

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[2] = 6;

print("Not initialised, after some assignments:\n\n");
print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");
var_dump($numbers); print("\n");

$values = [9.5, 8.5, 7.5];

print("Initialised (by []):\n\n");
print("\$values[0]: {$values[0]}\n");
print("\$values[1]: {$values[1]}\n");
print("\$values[2]: {$values[2]}\n\n");
var_dump($values); print("\n");

$amounts = array(3, 6, 9);

print("Initialised (by array()):\n\n");
print("\$amounts[0]: {$amounts[0]}\n");
print("\$amounts[1]: {$amounts[1]}\n");
print("\$amounts[2]: {$amounts[2]}\n\n");
var_dump($amounts); print("\n");

$items = [2, "orange"];
$items[0] = 2.5;
$items[4] = 321;

print("Initialised, after some overwritting and appendings:\n\n");
print("\$items[0]: {$items[0]}\n");
print("\$items[1]: {$items[1]}\n");
print("\$items[2]: {$items[2]}\n"); // Warning:  Undefined array key 2
print("\$items[3]: {$items[3]}\n"); // Warning:  Undefined array key 3
print("\$items[4]: {$items[4]}\n");
print("\$items[5]: {$items[5]}\n\n"); // Warning:  Undefined array key 5
var_dump($items); print("\n");

$things = [
  1,
  2,
  3 => 4,
  5
];

print("Initialised with indexes:\n\n");
print("\$things[0]: {$things[0]}\n");
print("\$things[1]: {$things[1]}\n");
print("\$things[2]: {$things[2]}\n"); // Warning:  Undefined array key 2
print("\$things[3]: {$things[3]}\n");
print("\$things[4]: {$things[4]}\n\n");
var_dump($things); print("\n");

$words = array(
  2 => "last",
  0 => "first",
  1 => "two",
);

print("Initialised with unordered indexes:\n\n");
print("\$words[0]: {$words[0]}\n");
print("\$words[1]: {$words[1]}\n");
print("\$words[2]: {$words[2]}\n\n");
var_dump($words); print("\n");
