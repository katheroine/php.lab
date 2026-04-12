<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public string $somePublicProperty = 'public';
    protected string $someProtectedProperty = 'protected';
    private string $somePrivateProperty = 'private';

    public function __construct(
        string $somePublicValue = 'some public',
        string $someProtectedValue = 'some protected',
        string $somePrivateValue = 'some private'
    ) {
        $this->somePublicProperty = $somePublicValue;
        $this->someProtectedProperty = $someProtectedValue;
        $this->somePrivateProperty = $somePrivateValue;
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);
