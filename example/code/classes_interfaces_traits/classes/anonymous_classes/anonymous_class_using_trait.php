<?php

trait SomeTrait
{
    protected const string OTHER_CONSTANT = 'trait';

    protected function otherMethod(): void
    {
        print('using ' . self::OTHER_CONSTANT . PHP_EOL);
    }
}

$someObject = new class {
    use SomeTrait;

    private const string SOME_CONSTANT = 'some';
    private string $someProperty = 'anonymous';

    public function someMethod(): void
    {
        print(
            ucfirst(self::SOME_CONSTANT) . ' '
            . $this->someProperty
            . ' class' . PHP_EOL
        );

        $this->otherMethod();
    }
};

$someObject->someMethod();
