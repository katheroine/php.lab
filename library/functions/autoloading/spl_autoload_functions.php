<?php

// "Return all registered __autoload() functions"
// -- https://www.php.net/manual/en/function.spl-autoload-functions.php

$functions = spl_autoload_functions();
var_dump($functions);

function someFunction()
{
}

spl_autoload_register('someFunction');

$functions = spl_autoload_functions();
var_dump($functions);

spl_autoload_unregister('someFunction');

$functions = spl_autoload_functions();
var_dump($functions);
