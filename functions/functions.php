<?php

function simpleFunction(): void
{
    print("Simple function.\n");
}

simpleFunction();

print(PHP_EOL);

function functionWithLocalVariable(): void
{
    $i = 4;
    print("A function with a local variable: $i\n");
}

functionWithLocalVariable();

print(PHP_EOL);

function functionWithStaticLocalVariable(): void
{
    static $i = 1;
    print("A function with a static local variable: $i\n");

    $i++;
}

functionWithStaticLocalVariable();
functionWithStaticLocalVariable();
functionWithStaticLocalVariable();

print(PHP_EOL);

function functionReturningValue(): int
{
    print("A function returning value.\n");
    return 9;
}

$i = functionReturningValue();
print("Returned value: $i\n");

print(PHP_EOL);

function functionWithArguments(int $number, string $text): void
{
    print("A function with some arguments:\nnumber: $number\ntext: $text\n");
}

functionWithArguments(6, "orange");

print(PHP_EOL);
