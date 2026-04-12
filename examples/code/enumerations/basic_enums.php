<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

enum SomeBasicEnum
{
    case SomeCase;
    case OtherCase;
    case AnotherCase;
}

print("Information:\n");
var_dump(SomeBasicEnum::SomeCase);
print('Type: ' . gettype(SomeBasicEnum::SomeCase) . PHP_EOL);
print('Class: ' . get_class(SomeBasicEnum::SomeCase) . PHP_EOL . PHP_EOL);

print('Enum case name property: ' . SomeBasicEnum::SomeCase->name . PHP_EOL . PHP_EOL);
