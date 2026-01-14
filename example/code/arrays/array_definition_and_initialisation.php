<?php

$array_1 = [];

print("Not initialised, defined as empty by []:\n\n");
print_r($array_1); print("\n");

$array_2 = array();

print("Not initialised, defined as empty by array():\n\n");
print_r($array_2); print("\n");

$array_3 = [2, 4, 6];

print("Initialised, defined as 3-element by []:\n\n");
print_r($array_3); print("\n");

$array_4 = array(3, 5, 7);

print("Initialised, defined as 3-element by array():\n\n");
print_r($array_4); print("\n");

$array_5 = range(1, 3);
print("Initialised, defined as 3-element by range():\n\n");
print_r($array_5); print("\n");

$array_6 = [
  'one' => 1,
  'two' => '2',
  'three' => '***',
];
print("Initialised, defined as 3-element associative by []:\n\n");
print_r($array_6); print("\n");

$array_7 = array(
  'three' => '######',
  "3" => 5.5,
  4
);
print("Initialised, defined as 3-element partially associative by array():\n\n");
print_r($array_7); print("\n");

$city = 'Twin Peaks';
$street = 'Hundret Acre Wood';
$house = [
  'no' => 6,
  'flat_no' => 127
];

$array_8 = compact('city', 'street', 'house');
print("Initialised, defined as 3-element associative by compact():\n\n");
print_r($array_8); print("\n");
