<?php

enum SomeEnum: string
{
    case SomeCase = 'rabbit';
    case OtherCase = 'fox';
    case AnotherCase = 'owl';

    public static function someMethod()
    {
        return self::otherMethod();
    }

    protected static function otherMethod()
    {
        return self::anotherMethod();
    }

    private static function anotherMethod()
    {
        return self::OtherCase->value;
    }
}

var_dump(SomeEnum::SomeCase);

$result = SomeEnum::SomeCase::someMethod();

var_dump($result);
