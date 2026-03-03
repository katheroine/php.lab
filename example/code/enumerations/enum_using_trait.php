<?php

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
