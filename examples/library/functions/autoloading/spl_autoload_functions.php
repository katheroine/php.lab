<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
