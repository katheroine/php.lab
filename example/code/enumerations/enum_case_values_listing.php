<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

enum SomeEnum: string
{
    case SomeCase = 'some case';
    case OtherCase = 'other case';
    case AnotherCase = 'another case';
}

foreach (SomeEnum::SomeCase->cases() as $case) {
    var_dump($case);
    print($case->value . PHP_EOL. PHP_EOL);
}
