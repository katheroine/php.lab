<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someNumericText = '15';
$arithmeticOperationResult = 2 * $someNumericText;

print($arithmeticOperationResult. PHP_EOL);

$anotherNumericText = '10.24E2';
$arithmeticOperationResult = sqrt($anotherNumericText);

print($arithmeticOperationResult . PHP_EOL);

$otherNumericText = '9xoxo';
$arithmeticOperationResult = $otherNumericText / 3;
// PHP Warning:  A non-numeric value encountered

print($arithmeticOperationResult . PHP_EOL);
