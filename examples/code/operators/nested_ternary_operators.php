<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$number = 3;
// $vaule = ($number < 2) ? "Number is less than 2." : ($number > 2) ? "Number is more than 2." : "Number is 2.";
$result = ($number < 2) ? "Number is less than 2." : (($number > 2) ? "Number is more than 2." : "Number is 2.");
print($result . PHP_EOL);
