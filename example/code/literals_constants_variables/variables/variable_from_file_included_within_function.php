<?php

function someFunction()
{
    print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
    print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");
    print('Is another variable defined? ' . (isset($anotherVariable) ? 'yes' : 'no') . "\n");
    print(PHP_EOL);

    $someVariable = 15;
    include('included_file_with_variables.php');

    print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
    print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");
    print('Is another variable defined? ' . (isset($anotherVariable) ? 'yes' : 'no') . "\n");

    print("Some variable: {$someVariable}\n");
    print("Other variable: {$otherVariable}\n");
    print("Another variable: {$anotherVariable}\n");
    print(PHP_EOL);
}

someFunction();

print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");
print('Is another variable defined? ' . (isset($anotherVariable) ? 'yes' : 'no') . "\n");
print(PHP_EOL);

// print("Other variable: {$otherVariable}\n");
// PHP Warning:  Undefined variable $otherVariable
