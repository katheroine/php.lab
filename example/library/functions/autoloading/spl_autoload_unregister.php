<?php

// "Unregister given function as __autoload() implementation"
// -- https://www.php.net/manual/en/function.spl-autoload-unregister.php

function someAutoloadingFunction($className)
{
    include(__DIR__ . "/__fixtures/{$className}.php");
}

spl_autoload_register('someAutoloadingFunction');

$someObject = new SomeClass();
$someObject->someFunction();

print(PHP_EOL);

$functions = spl_autoload_functions();
var_dump($functions);

print(PHP_EOL);

spl_autoload_unregister('someAutoloadingFunction');

$functions = spl_autoload_functions();
var_dump($functions);
