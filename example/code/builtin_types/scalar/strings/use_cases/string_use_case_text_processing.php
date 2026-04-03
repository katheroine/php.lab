<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$input = "  Hello, World!  ";
$clean = trim($input);
$upper = strtoupper($clean);
$replaced = str_replace("WORLD", "PHP", $upper);

print($replaced . PHP_EOL);
