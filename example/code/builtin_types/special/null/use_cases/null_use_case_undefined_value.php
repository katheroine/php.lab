<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$user = [
    'name' => null,
    'age' => 30,
    'email' => null
];

if ($user['name'] === null) {
    echo "Username is missing.\n";
} else {
    echo "Welcome, " . $user['name'] . ".\n";
}
