<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    function __construct()
    {
        print("Constructor is running...\n");
    }

    function __destruct()
    {
        print("Destructor is running...\n");
    }

    function action() : void
    {
        print("Some action is performing...\n");
    }
}

print("The object will be created now.\n");

$someObject = new SomeClass();
$someObject->action();

print("The program will end now.\n");
