<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function someFunction(int $someArgument, string $otherArgument): string
{
    $result = '';

    for ($i = 0; $i < $someArgument; $i++) {
        $result .= $otherArgument . PHP_EOL;
    }

    return $result;
}

$result = someFunction(3, 'Violet elephant...');
print($result);
