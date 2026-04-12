<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    private const string PREFIX = '<';
    private const string POSTFIX = '>';

    function __construct(private string $content = '')
    {
    }

    public function __toString(): string
    {
        print(
            "Magic method __toString\n\n"
        );

        return static::PREFIX . $this->content . static::POSTFIX;
    }
}

$someObject = new SomeClass('Veni, vidi, vim!');

print($someObject . PHP_EOL . PHP_EOL);
