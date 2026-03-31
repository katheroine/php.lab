<?php

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'per speculum';
    }
}

trait OtherTrait
{
    use SomeTrait;

    public function otherMethod(): string
    {
        return 'in aenigmate';
    }
}

class SomeClass
{
    use OtherTrait;

    public function anotherMethod(): string
    {
        return
            'Videmus nunc ' . $this->someMethod()
            . ' et ' . $this->otherMethod() . '.';
    }
}

$someObject = new SomeClass();
print('Traits:' . PHP_EOL);
print_r(class_uses($someObject));
print('Some trait method result: ' . $someObject->someMethod() . PHP_EOL);
print('Other trait method result: ' . $someObject->otherMethod() . PHP_EOL);

print(PHP_EOL . $someObject->anotherMethod() . PHP_EOL);
