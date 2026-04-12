<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$globalVariable = 1024;

print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n\n");

function someFunction()
{
    print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n\n");

    global $globalVariable;

    print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n");
    print("Global variable: {$globalVariable}\n\n");

    $globalVariable = 2048;

    print("Global variable: {$globalVariable}\n\n");
}

someFunction();

print("Global variable: {$globalVariable}\n\n");
