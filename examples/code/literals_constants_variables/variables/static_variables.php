<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function someFunction()
{
    static $quantity = 6 / (1 + 2);
    static $level = sqrt(9); // Correct from 8.3

    print("Quantity: {$quantity}\n");
    print("Level: {$level}\n\n");

    $quantity++;
    $level--;
}

someFunction();
someFunction();
someFunction();
