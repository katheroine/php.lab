<?php

$array = [];

print("Not initialised, before assignments: \$array = []\n\n");
print_r($array); print("\n");

$array = [0, 0, 0];

print("Initialised, before assignments: \$array = [0, 0, 0]\n\n");
print_r($array); print("\n");

$array[1] = 6;

print("After assignment: \$array[1] = 6\n\n");
print_r($array); print("\n");

$array[1] = 10;

print("After overwriting: \$array[1] = 10\n\n");
print_r($array); print("\n");
