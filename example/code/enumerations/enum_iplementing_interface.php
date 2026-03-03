<?php

interface SomeInterface
{
    public function someMethod(int $someArgument): string;
}

enum SomeEnum: string implements SomeInterface
{
    case SomeCase = 'rabbit';
    case OtherCase = 'fox';
    case AnotherCase = 'owl';

    public function someMethod(int $someArgument): string
    {
        switch ($someArgument) {
            case 1:
                return self::SomeCase->value;
                break;
            case 2:
                return self::OtherCase->value;
                break;
            case 3:
                return self::AnotherCase->value;
                break;
            default:
                return 'none';
                break;
        }
    }
}

$result = SomeEnum::SomeCase::someMethod();

var_dump($result);
