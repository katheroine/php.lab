<?php

function some_function()
{
    static $quantity = 6 / (1 + 2);
    static $level = sqrt(9); // Correct from 8.3

    print("Quantity: {$quantity}\n");
    print("Level: {$level}\n");

    $quantity++;
    $level--;
}

some_function();
some_function();
some_function();
