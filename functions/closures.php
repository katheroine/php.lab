<?php

$quantity = 4;
$message = "Hello, there!";

$simpleFunction = function () use ($quantity, $message): void {
    print("Simple function.\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
};

$simpleFunction();

print(PHP_EOL);

$functionWithLocalVariable = function () use ($quantity, $message): void {
    $i = 4;
    print("A function with a local variable: {$i}\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
};

$functionWithLocalVariable();

print(PHP_EOL);

$functionReturningValue = function () use ($quantity, $message): int {
    print("A function returning value.\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
    return 9;
};

$i = $functionReturningValue();
print("returned value: {$i}\n");

print(PHP_EOL);

$functionWithArguments = function (int $number, string $text) use ($quantity, $message): void {
    print("A function with some arguments:\nnumber: {$number}\ntext: {$text}\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
};

$functionWithArguments(6, "orange");

print(PHP_EOL);
