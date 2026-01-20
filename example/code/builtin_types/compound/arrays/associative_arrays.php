<?php

$items = [
  2 => "Hello, there!",
  'color' => 'orange',
  3.14 => 'PI',
];

print("\$items[2]: {$items[2]}\n");
print("\$items['color']: {$items['color']}\n");
print("\$items[3.14]: {$items[3.14]}\n\n");

var_dump($items);
