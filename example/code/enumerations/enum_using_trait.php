<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait SomeTrait
{
    public static function someMethod()
    {
        return self::OtherCase->value;
    }
}

enum SomeEnum: string
{
    use SomeTrait;

    case SomeCase = 'rabbit';
    case OtherCase = 'fox';
    case AnotherCase = 'owl';
}

$result = SomeEnum::SomeCase::someMethod();

var_dump($result);
