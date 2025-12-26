<?php

function someFunction($answer): bool
{
    $result = !$answer;

    print("The oposite answer is " . ($result ? 'yes' : 'no') . PHP_EOL);

    return $result;
}

someFunction(false);
someFunction(true);

echo(PHP_EOL);

function otherFunction($number): int
{
    $result = $number * 10;

    print("Your quantity 10 times is {$result}\n");

    return $result;
}

otherFunction(3);

echo(PHP_EOL);

function anotherFunction($text): string
{
    $result = strtoupper($text);

    print("Shout it out \"{$result}\"\n");

    return $result;
}

anotherFunction("Hi, there!");

echo(PHP_EOL);
