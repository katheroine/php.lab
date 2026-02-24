<?php

$numbers = [2, 4, 6];

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);
print("\$numbers[0]: {$numbers[0]}\n");
print("\$numbers[1]: {$numbers[1]}\n");
print("\$numbers[2]: {$numbers[2]}\n\n");

$values = [9.5, 8.5, 7.5];

print("Values:\n\n");
var_dump($values);
print(PHP_EOL);
print("\$values[0]: {$values[0]}\n");
print("\$values[1]: {$values[1]}\n");
print("\$values[2]: {$values[2]}\n\n");

$words = ["first", "two", "last"];

print("Words:\n\n");
var_dump($words);
print(PHP_EOL);
print("\$words[0]: {$words[0]}\n");
print("\$words[1]: {$words[1]}\n");
print("\$words[2]: {$words[2]}\n\n");

$items = [
  321,
  2.5,
  "orange",
  [2, 4, 6],
  new stdClass,
];

print("Items:\n\n");
var_dump($items);
print(PHP_EOL);
print("\$items[0]: {$items[0]}\n");
print("\$items[1]: {$items[1]}\n");
print("\$items[2]: {$items[2]}\n");
print("\$items[3]: {$items[3][0]}, {$items[3][1]}, {$items[3][2]}\n");
print("\$items[4]: " . gettype($items[4]) . "\n\n");

$data = [
  'id' => 1024,
  'programming_language' => 'PHP',
  'database' => 'MongoDB',
  'operating_system' => 'Linux',
];

print("Data:\n\n");
var_dump($data);
print(PHP_EOL);
print("\$data['id']: {$data['id']}\n");
print("\$data['programming_language']: {$data['programming_language']}\n");
print("\$data['database']: {$data['database']}\n");
print("\$data['operating_system']: {$data['operating_system']}\n\n");
