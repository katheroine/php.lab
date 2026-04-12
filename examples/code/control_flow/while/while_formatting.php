<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$i = 0;

while ($i < 10) {
  print("{$i}...\n");
  ++$i;
}

print("\n");

$i = 0;

while ($i < 10) {
  print($i++ . "...\n");
}

print("\n");

$i = 0;

while ($i < 10)
  print($i++ . "...\n");

print("\n");

$i = 0;

while ($i < 10) print($i++ . "...\n"); ++$i;

print("\n");

// Shortened form for HTML templates:

$i = 0;

while ($i < 10):
  print("{$i}...\n");
  ++$i;
endwhile;

print("\n");

$i = 0;

while ($i < 10): print("{$i}...\n"); ++$i; endwhile;

print("\n");
