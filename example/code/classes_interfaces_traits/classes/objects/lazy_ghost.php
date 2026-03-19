<?php

class SomeClass
{
    public string $someProperty;

    public function __construct(string $someProperty)
    {
        print("Construction...\n");

        $this->someProperty = $someProperty;
    }
}

$someReflection = new ReflectionClass(SomeClass::class);
$someGhost = $someReflection->newLazyGhost(function (SomeClass $object) {
    $object->__construct('initialised');
});

print(
    'Ghost type: ' . gettype($someGhost) . PHP_EOL
    . 'Ghost class: ' . get_class($someGhost) . PHP_EOL
    . PHP_EOL
);

var_dump($someGhost);
print(PHP_EOL);

print("Property reading: {$someGhost->someProperty}\n\n");

var_dump($someGhost);
print(PHP_EOL);
