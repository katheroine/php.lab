<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$input = "secret";
$password = "secret";
$isValid = ($input === $password);

if ($isValid) {
    echo "Access granted.\n";
}
