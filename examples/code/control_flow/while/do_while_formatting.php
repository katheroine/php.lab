<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$i = 0;

do {
  print("{$i}...\n");
  ++$i;
} while ($i < 10);

print "\n";

$i = 0;

do {
  print($i++ . "...\n");
} while ($i < 10);

print "\n";

$i = 0;

do
  print($i++ . "...\n");
while ($i < 10);

print "\n";

$i = 0;

do print($i++ . "...\n"); while ($i < 10);

print "\n";
