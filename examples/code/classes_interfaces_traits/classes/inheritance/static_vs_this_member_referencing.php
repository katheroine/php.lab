<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public function publicDisplay()
    {
        print("Hello, public!\n");
    }

    private function privateDisplay()
    {
        print("Hello, private!\n");
    }

    public function method()
    {
        static::publicDisplay();
        $this->publicDisplay();
        $this->privateDisplay();
    }
}

$someObject = new SomeClass();
$someObject->method();
