<?php

class SomeClass
{
    public const same_name = 'lalala';
    public $same_name = 'hello';

    public function same_name(): void
    {
        print(
            self::same_name . PHP_EOL
            . $this->same_name . PHP_EOL
            . PHP_EOL
        );
    }
}

$object = new SomeClass();

print(SomeClass::same_name . PHP_EOL);
print($object->same_name . PHP_EOL);
$object->same_name();
