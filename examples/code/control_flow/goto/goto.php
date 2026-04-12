<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$c = 10;
$a = 0;

start:
$a += $c;
$c--;
if ($c == 0)
  goto stop;
goto start;

stop:
print($a . "\n");
