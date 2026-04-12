<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function someFunction()
{
    class someClass
    {
        public $someProperty = 10;
    }

    $someObject = new SomeClass();

    print("Some function\n");
    print("Some class property: {$someObject->someProperty}\n");
}

someFunction();
