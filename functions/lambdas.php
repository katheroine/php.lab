<?php

$simpleFunction = function (): void {
    print("Simple function.\n");
};

$simpleFunction();

print(PHP_EOL);

$functionWithLocalVariable = function (): void {
    $i = 4;
    print("A function with a local variable: {$i}\n");
};

$functionWithLocalVariable();

print(PHP_EOL);

$functionReturningValue = function (): int {
    print("A function returning value.\n");
    return 9;
};

$i = $functionReturningValue();
print("returned value: {$i}\n");

print(PHP_EOL);

$functionWithArguments = function (int $number, string $text): void {
    print("A function with some arguments:\nnumber: {$number}\ntext: {$text}\n");
};

$functionWithArguments(6, "orange");

print(PHP_EOL);
