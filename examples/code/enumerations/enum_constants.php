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

    const int CASES_NUMBER = 3;
}

var_dump(SomeEnum::SomeCase::CASES_NUMBER);
