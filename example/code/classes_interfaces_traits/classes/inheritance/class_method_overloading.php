<?php

class SomeClass
{
    private array $actions = [];
    private const array ACTIONS = [
        'multipling' => 'array_product',
    ];

    function __construct()
    {
        $this->actions = [
            'adding' => function($values) {
                return array_sum($values);
            },
        ];
    }

    public function __call(string $methodName, mixed $methodArguments): mixed
    {
        if (! isset($this->actions[$methodName])) {
            return null;
        }

        return $this->actions[$methodName]($methodArguments);
    }

    public static function __callStatic(string $methodName, mixed $methodArguments): mixed
    {
        if (! isset(static::ACTIONS[$methodName])) {
            return null;
        }

        return static::ACTIONS[$methodName]($methodArguments);
    }
}

$someObject = new SomeClass();

$result = $someObject->adding(1, 2, 3);

print('1 + 2 + 3 = ' . $result . PHP_EOL . PHP_EOL);

$result = SomeClass::multipling(1, 2, 3);

print('1 * 2 * 3 = ' . $result . PHP_EOL . PHP_EOL);
