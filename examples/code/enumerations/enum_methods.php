<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

enum SomeEnum: string
{
    case SomeCase = 'rabbit';
    case OtherCase = 'fox';
    case AnotherCase = 'owl';

    public function someMethod()
    {
        return $this->otherMethod();
    }

    protected function otherMethod()
    {
        return $this->anotherMethod();
    }

    private function anotherMethod()
    {
        return self::SomeCase->value;
    }
}

var_dump(SomeEnum::SomeCase);

$result = SomeEnum::SomeCase->someMethod();

var_dump($result);
