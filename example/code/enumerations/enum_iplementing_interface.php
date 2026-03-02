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

print(SomeEnum::SomeCase->someMethod(0) . PHP_EOL);
print(SomeEnum::SomeCase->someMethod(1) . PHP_EOL);
print(SomeEnum::SomeCase->someMethod(2) . PHP_EOL);
print(SomeEnum::SomeCase->someMethod(3) . PHP_EOL);
