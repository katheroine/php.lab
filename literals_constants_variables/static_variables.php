<?php

function someFunction()
{
    static $quantity = 6 / (1 + 2);
    static $level = sqrt(9); // Correct from 8.3

    print("Quantity: {$quantity}\n");
    print("Level: {$level}\n");

    $quantity++;
    $level--;
}

someFunction();
someFunction();
someFunction();

print(PHP_EOL);
