<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class ElementsModifier
{
    static private $decoration = '*';

    public function modify(array &$someArgument)
    {
        array_walk($someArgument, static function(&$value, $key) {
            $value = self::$decoration
                . strtoupper($value)
                . self::$decoration;
        });
    }
}

$colors = [
    'blue',
    'orange',
    'violet',
];

print_r($colors);

$modifier = new ElementsModifier();
$modifier->modify($colors);

print_r($colors);
