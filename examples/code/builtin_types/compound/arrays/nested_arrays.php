<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$values = [1, 3, 5, [2, 4, 6], 'seven'];

print("Values:\n\n");
var_dump($values);
print(PHP_EOL);

$secondNestedValue = $values[3][1];

print("Second even value: $secondNestedValue\n\n");

$data = [
  'name' => 'amelie',
  'address' => [
    'city' => 'Twin Peaks',
    'street' => 'Hundret Acre Wood',
    'house' => [
      'no' => 6,
      'flat_no' => 127
    ],
  ],
  'species' => 'owl',
];

print("Data:\n\n");
var_dump($data);
print(PHP_EOL);

$secondNestedData = $data['address']['house']['flat_no'];

print("Second nested data: $secondNestedData\n\n");
