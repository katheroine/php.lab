<?php

$globalVariable = 1024;

print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n\n");

function someFunction()
{
    print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n\n");

    global $globalVariable;

    print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n");
    print("Global variable: {$globalVariable}\n\n");

    $globalVariable = 2048;

    print("Global variable: {$globalVariable}\n\n");
}

someFunction();

print("Global variable: {$globalVariable}\n\n");
