<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Default implementation for __autoload()"
// "This function is intended to be used as a default implementation for __autoload().
// If nothing else is specified and spl_autoload_register() is called without any parameters
// then spl_autoload() will be used for any later call to __autoload()."
// -- https://www.php.net/manual/en/function.spl-autoload.php

set_include_path(__DIR__ . DIRECTORY_SEPARATOR . '__fixtures');
spl_autoload_extensions('.php');

// spl_autoload('SomeClass', '.php');
spl_autoload_register();

$someObject = new \SomeClass();
$someObject->someFunction();
