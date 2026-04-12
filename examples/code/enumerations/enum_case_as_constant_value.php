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
}

const SOME_CONSTANT = SomeEnum::SomeCase;

print(SOME_CONSTANT->value . PHP_EOL);

function someFunction(SomeEnum $someParameter)
{
    print($someParameter->value . PHP_EOL);
}

someFunction(SomeEnum::OtherCase);

class SomeClass
{
    const SomeEnum SOME_CONSTANT = SomeEnum::SomeCase;
    public SomeEnum $someProperty = SomeEnum::OtherCase;
    private SomeEnum $otherProperty;

    public function someMethod(SomeEnum $someParameter)
    {
        $this->otherProperty = $someParameter;

        print(self::SOME_CONSTANT->value . PHP_EOL
            . $this->someProperty->value . PHP_EOL
            . $this->otherProperty->value . PHP_EOL);
    }
}

$someObject = new SomeClass();
$someObject->someProperty = SomeEnum::OtherCase;
$someObject->someMethod(SomeEnum::AnotherCase);
