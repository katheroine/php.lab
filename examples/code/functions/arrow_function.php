<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someFunction = fn () => "Some function";

$result = $someFunction();
print("Some function result: {$result}\n");

$otherFunction = fn (int $someArgument): int => $someArgument * 3;

$result = $otherFunction(3);
print("Other function result: {$result}\n");
