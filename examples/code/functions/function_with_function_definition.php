<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function outerFunction()
{
    function innerFunction()
    {
        print("Inner funcion\n");
    }

    print("Outer function\n");
    innerFunction();
}

outerFunction();
