<?php

class SomeClass
{
    public function voidMethod(): void
    {
    }

    public function mixedMethod(mixed $parameter): mixed
    {
        return $parameter;
    }

    public function nullMethod(null $parameter): null
    {
        return $parameter;
    }

    public function booleanMethod(bool $parameter): bool
    {
        return ! $parameter;
    }

    public function integerMethod(int $parameter): int
    {
        return ++$parameter;
    }

    public function floatimgPointMethod(float $parameter): float
    {
        return $parameter * 2;
    }

    public function stringMethod(string $parameter): string
    {
        return '<' . $parameter . '>';
    }

    public function arrayMethod(array $parameter): array
    {
        $parameter[] = 'element';

        return $parameter;
    }

    public function iterableMethod(iterable $parameter): iterable
    {
        $result = [];

        foreach ($parameter as $key => $value) {
            $result[$key] = gettype($value);
        }

        return $result;
    }

    public function callableMethod(callable $parameter, array $arguments = []): callable
    {
        $parameter(...$arguments);

        return $parameter;
    }

    public function objectMethod(object $parameter): object
    {
        print(gettype($parameter) . PHP_EOL);

        return $parameter;
    }
}

class OtherClass
{
}

$someObject = new SomeClass();

$voidResult = $someObject->voidMethod();
$mixedResult = $someObject->mixedMethod(null);
$nullResult = $someObject->nullMethod(null);
$booleanResult = $someObject->booleanMethod(true);
$integerResult = $someObject->integerMethod(5);
$floatingPointResult = $someObject->floatimgPointMethod(2.4);
$stringResult = $someObject->stringMethod('hello');
$arrayResult = $someObject->arrayMethod([3, 5, 7]);
$iterableResult = $someObject->iterableMethod([
    2 => "Hello, there!",
    'color' => 'orange',
    3.14 => 'PI',
]);
$callableResult = $someObject->callableMethod(function (int $value): int {
    $result = $value * 10;
    print($result . PHP_EOL);

    return $result;
}, [3]);
$objectResult = $someObject->objectMethod(new OtherClass());

print(PHP_EOL);

print(
    var_export($voidResult, true) . ' (' . gettype($voidResult) . ")\n"
    . var_export($mixedResult, true) . ' (' . gettype($mixedResult) . ")\n"
    . var_export($nullResult, true) . ' (' . gettype($nullResult) . ")\n"
    . var_export($booleanResult, true) . ' (' . gettype($booleanResult) . ")\n"
    . var_export($integerResult, true) . ' (' . gettype($integerResult) . ")\n"
    . var_export($floatingPointResult, true) . ' (' . gettype($floatingPointResult) . ")\n"
    . var_export($stringResult, true) . ' (' . gettype($stringResult) . ")\n"
    . var_export($arrayResult, true) . ' (' . gettype($arrayResult) . ")\n"
    . var_export($iterableResult, true) . ' (' . gettype($iterableResult) . ")\n"
    . var_export($callableResult, true) . ' (' . gettype($callableResult) . ")\n"
    . var_export($objectResult, true) . ' (' . gettype($objectResult) . ")\n"
);
