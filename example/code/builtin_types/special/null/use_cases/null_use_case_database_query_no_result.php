<?php

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
