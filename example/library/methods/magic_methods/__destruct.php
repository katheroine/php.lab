<?php

class SomeClass
{
    public static $instanceQuantity = 0;

    public function __destruct()
    {
        print(
            "Magic method __destruct\n\n"
        );

        self::$instanceQuantity--;
    }
}

function someLocalSpace()
{
    $someObject = new SomeClass();
    SomeClass::$instanceQuantity++;

    print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

    $otherObject = new SomeClass();
    SomeClass::$instanceQuantity++;

    print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);
}

someLocalSpace();

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);
