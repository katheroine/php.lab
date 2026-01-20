<?php

$values = [9.5, 2.5, 7.5];
$items = [2.5, "orange"];

print("values:\n");
print_r($values);
print("items:\n");
print_r($items);
print("\n");

$elements = array_merge($values, $items);

print("\$elements = array_merge(\$values, \$items)\n");
print("elements:\n");
print_r($elements);
print("\n");

$elements = $items + $values;

print("\$elements = \$items + \$values\n");
print("elements:\n");
print_r($elements);
print("\n");
