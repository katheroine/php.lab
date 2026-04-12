<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

for ($i = 0; $i < 10; $i++)
  echo "{$i}...\n";

echo "\n";

for ($i = 0; $i < 10; $i++) echo "{$i}...\n";

echo "\n";

for ($i = 0; $i < 10; $i++) {
  echo "{$i}...\n";
}

echo "\n";

// Shortened form for HTML templates:

for ($i = 0; $i < 10; $i++):
  echo "{$i}...\n";
endfor;

echo "\n";

for ($i = 0; $i < 10; $i++): echo "{$i}...\n"; endfor;

echo "\n";
