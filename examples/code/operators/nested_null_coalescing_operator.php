<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$text = "Text is set.";
$number = 3;
$result = $text ?? $number ?? "Either text and number aren't set.";
print($result . PHP_EOL);
