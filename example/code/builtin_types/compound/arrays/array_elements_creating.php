<?php

$numbers[0] = 2;
$numbers[1] = 4;
$numbers[] = 6;

print("Numbers:\n\n");
var_dump($numbers);
print(PHP_EOL);

$amounts = array(3, 6, 9);

print("Amounts:\n\n");
var_dump($amounts);
print(PHP_EOL);

$values = [9.5, 8.5, 7.5];

print("Values:\n\n");
var_dump($values);
print(PHP_EOL);

$items = [2, 'orange'];
$items[0] = 2.5;
$items[4] = 321;

print("Items:\n\n");
var_dump($items);
print(PHP_EOL);

$words = array(
  2 => 'second',
  'which' => 'last',
  1 => "first",
);

print("Words:\n\n");
var_dump($words);
print(PHP_EOL);

$things = [
  1,
  2,
  3 => 4,
  5,
  'key' => 'blue',
];

print("Things:\n\n");
var_dump($things);
print(PHP_EOL);
