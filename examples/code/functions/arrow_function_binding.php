<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someVariable = 10.5;
$otherVariable = 'binded variable';

$someFunction = fn () => "Some function with binded variable: {$someVariable}";

$result = $someFunction();
print("Some function result: {$result}\n");

$otherFunction = fn (string $someArgument): string => $someArgument . $otherVariable;

$result = $otherFunction('Variable: ');
print("Other function result: {$result}\n");
