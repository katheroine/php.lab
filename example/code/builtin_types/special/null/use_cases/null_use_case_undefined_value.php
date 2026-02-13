<?php

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
