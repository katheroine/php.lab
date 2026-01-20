<?php

$numbers = [2, 4, 6];

$second_element = $numbers[1];

print("Second number: $second_element\n\n");

list($e1, $e2, $e3) = $numbers;

print("First number: $e1\n");
print("Second number: $e2\n");
print("Third number: $e3\n\n");

list(,,$element_3) = $numbers;

print("Third number: $element_3\n\n");

list(1 => $element_2, 0 => $element_1) = $numbers;

print("First number: $element_1\n");
print("Second number: $element_2\n\n");

$items = [
  'greetings' => "Hello, there!",
  'color' => 'orange',
  'number' => 3.14,
];

list('greetings' => $item_1, 'number' => $item_2, 'color' => $item_3) = $items;

print("First item: $item_1\n");
print("Second item: $item_2\n");
print("Third item: $item_3\n\n");

function get_numbers() {
  return array(2, 4, 6);
}

$first_element = get_numbers()[0];

print("First number: $first_element\n\n");

list($elem_1) = get_numbers();

print("First number: $elem_1\n\n");

list(, $elem_2) = get_numbers();

print("Second number: $elem_2\n\n");

$values = [1, 3, 5, [7.1, 7.3, 7.5]];

list($el_1, $el_2, $el_3, list($nel_1, $nel_2, $nel_3)) = $values;

print("First value: $el_1\n");
print("Second value: $el_2\n");
print("Third value: $el_3\n");
print("First nested value: $nel_1\n");
print("Second nested value: $nel_2\n");
print("Third nested value: $nel_3\n\n");

$properties = [
  'name' => 'Amelie',
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

extract($properties);

print("First property: $name\n");
print("Second property:\n");
print_r($address);
print("Third property: $species\n");
