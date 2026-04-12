<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function findUserById($id) {
    $users = [
        1 => 'Alice',
        2 => 'Bob'
    ];

    return $users[$id] ?? null;
}

$user = findUserById(999);

if ($user === null) {
    echo "User not found.\n";
} else {
    echo "User: $user" . PHP_EOL;
}
