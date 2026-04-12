<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function functionWithDefaultArgument(int $argument = 3): int
{
    return $argument * 2;
}

$result = functionWithDefaultArgument();
print("Result of calling function with default argument: {$result}\n");

$result = functionWithDefaultArgument(4);
print("Result of calling function with provided argument: {$result}\n");
