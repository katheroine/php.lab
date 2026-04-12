<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$array = [];

print("Not initialised, before assignments: \$array = []\n\n");
print_r($array); print("\n");

$array = [0, 0, 0];

print("Initialised, before assignments: \$array = [0, 0, 0]\n\n");
print_r($array); print("\n");

$array = [1, 2];

print("After assignment: \$array = [1, 2]\n\n");
print_r($array); print("\n");

$array[1] = 3;

print("After overwriting element: \$array[1] = 3\n\n");
print_r($array); print("\n");

$array[] = 4;

print("After overwriting by adding element: \$array[] = 4\n\n");
print_r($array); print("\n");
