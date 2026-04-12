<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Register given function as __autoload() implementation"
// -- https://www.php.net/manual/en/function.spl-autoload-register.php

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
