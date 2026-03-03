<?php

enum SomeEnum: string
{
    case SomeCase = 'rabbit';
    case OtherCase = 'fox';
    case AnotherCase = 'owl';
}

global $someVariable;
$someVariable = SomeEnum::SomeCase;

print($someVariable->value . PHP_EOL);

function someFunction(SomeEnum $someParameter = SomeEnum::OtherCase)
{
    print($someParameter->value . PHP_EOL);
}

someFunction();

class SomeClass
{
    const SomeEnum SOME_CONSTANT = SomeEnum::SomeCase;
    public SomeEnum $someProperty = SomeEnum::OtherCase;
    public static SomeEnum $otherProperty = SomeEnum::AnotherCase;
    private SomeEnum $anotherProperty;

    public function someMethod(SomeEnum $someParameter = SomeEnum::AnotherCase)
    {
        $this->anotherProperty = $someParameter;

        print(self::SOME_CONSTANT->value . PHP_EOL
            . $this->someProperty->value . PHP_EOL
            . self::$otherProperty->value . PHP_EOL
            . $this->anotherProperty->value . PHP_EOL);
    }
}

$someObject = new SomeClass();
$someObject->someMethod();
