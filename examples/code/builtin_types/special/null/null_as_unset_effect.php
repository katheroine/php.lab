<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someValue = 10;

print("Some value: ");
var_dump($someValue);

unset($someValue);

print("Some value after unset: ");
var_dump($someValue);
// PHP Warning:  Undefined variable $someValue
