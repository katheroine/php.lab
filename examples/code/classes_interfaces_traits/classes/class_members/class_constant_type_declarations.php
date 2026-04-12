<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeClass
{
    const mixed MIXED_CONSTANT = null;
    const bool BOOLEAN_CONSTANT = true;
    const int INTEGER_CONSTANT = 5;
    const float FLOATING_POINT_CONSTANT = 2.4;
    const string STRING_CONSTANT = 'hello';
    const array ARRAY_CONSTANT = [3, 5, 7];
    const iterable ITERABLE_CONSTANT = [
        2 => "Hello, there!",
        'color' => 'orange',
        3.14 => 'PI',
    ];
}

print(
    var_export(SomeClass::MIXED_CONSTANT, true) . ' (' . gettype(SomeClass::MIXED_CONSTANT) . ")\n"
    . var_export(SomeClass::BOOLEAN_CONSTANT, true) . ' (' . gettype(SomeClass::BOOLEAN_CONSTANT) . ")\n"
    . var_export(SomeClass::INTEGER_CONSTANT, true) . ' (' . gettype(SomeClass::INTEGER_CONSTANT) . ")\n"
    . var_export(SomeClass::FLOATING_POINT_CONSTANT, true) . ' (' . gettype(SomeClass::FLOATING_POINT_CONSTANT) . ")\n"
    . var_export(SomeClass::STRING_CONSTANT, true) . ' (' . gettype(SomeClass::STRING_CONSTANT) . ")\n"
    . var_export(SomeClass::ARRAY_CONSTANT, true) . ' (' . gettype(SomeClass::ARRAY_CONSTANT) . ")\n"
    . var_export(SomeClass::ITERABLE_CONSTANT, true) . ' (' . gettype(SomeClass::ITERABLE_CONSTANT) . ")\n"
);
