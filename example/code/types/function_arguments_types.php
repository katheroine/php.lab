<?php

function someFunction(bool $answer)
{
    print("You answered " . ($answer ? 'yes' : 'no') . PHP_EOL);
}

someFunction(false);
someFunction(true);
// someFunction(null);
someFunction(0);
someFunction(2);

echo(PHP_EOL);

function otherFunction(int $number)
{
    print("Your quantity is {$number}\n");
}

otherFunction(3);
// otherFunction(null);
otherFunction(4.5);
otherFunction("5");

echo(PHP_EOL);

function anotherFunction(string $text)
{
    print("You said \"{$text}\"\n");
}

anotherFunction("Hi, there!");
// anotherFunction(null);
anotherFunction(6);

echo(PHP_EOL);
