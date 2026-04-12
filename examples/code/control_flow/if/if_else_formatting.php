<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$condition = (1 > 2);

if ($condition)
  print("1 > 2\n");
else
  print("!(1 > 2)\n");

$condition = (2 > 1);

if ($condition)
  print("2 > 1\n");
else
  print("!(2 > 1)\n");

print("\n");

if (1 > 2)
  print("1 > 2\n");
else
  print("!(1 > 2)\n");

if (2 > 1)
  print("2 > 1\n");
else
  print("!(2 > 1)\n");

print("\n");

if (1 > 2) print("1 > 2\n");
else print("!(1 > 2)\n");

if (2 > 1) print("2 > 1\n");
else print("!(2 > 1)\n");

print("\n");

if (1 > 2) {
  print("1 > 2\n");
} else {
  print("!(1 > 2)\n");
}

if (2 > 1) {
  print("2 > 1\n");
} else {
  print("!(2 > 1)\n");
}

print("\n");

// Shortened form for HTML templates:

if (1 > 2):
  print("1 > 2\n");
else:
  print("!(1 > 2)\n");
endif;

if (2 > 1):
  print("2 > 1\n");
else:
  print("!(2 > 1)\n");
endif;

print("\n");

if (1 > 2):  print("1 > 2\n");
else: print("!(1 > 2)\n"); endif;

if (2 > 1):  print("2 > 1\n");
else: print("!(2 > 1)\n"); endif;

print("\n");
