<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someVariable = 15;
$otherVariable = 1024;

// Regular closure:
$someClosure = function() use ($someVariable) {
    print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
    print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");

    print("Some variable: {$someVariable}\n");
    // print("Other variable: {$otherVariable}\n");
    // PHP Warning:  Undefined variable $otherVariable
};

$someClosure();

// Arrow function:
$otherClosure = fn() => $someVariable + $otherVariable;

$result = $otherClosure();

print("Arrow function result: {$result}\n");
