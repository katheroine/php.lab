<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    public const string SOME_CONSTANT = 'SOME LABEL';
    private const string HIDDEN_FIELD_MESSAGE = 'hidden';

    public string $somePublicProperty = 'some public';
    public string $otherPublicProperty = 'other public';
    protected string $someProtectedProperty = 'some protected';

    public function __debugInfo(): array
    {
        print(
            "Magic method __debugInfo\n\n"
        );

        return [
            'SOME_CONSTANT' => static::SOME_CONSTANT,
            'somePublicProperty' => $this->somePublicProperty,
            'otherPublicProperty' => static::HIDDEN_FIELD_MESSAGE,
            'someProtectedProperty' => static::HIDDEN_FIELD_MESSAGE,
        ];
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);
