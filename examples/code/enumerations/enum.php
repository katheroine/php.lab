<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

enum SomeEnum
{
    case SomeCase;
    case OtherCase;
    case AnotherCase;
}

print("Information:\n");
var_dump(SomeEnum::SomeCase);
print('Type: ' . gettype(SomeEnum::SomeCase) . PHP_EOL . PHP_EOL);

enum OtherEnum: string
{
    case SomeCase = 'some case';
    case OtherCase = 'other case';
    case AnotherCase = 'another case';
}

print("Information:\n");
var_dump(OtherEnum::OtherCase);
print('Type: ' . gettype(OtherEnum::OtherCase) . PHP_EOL . PHP_EOL);
