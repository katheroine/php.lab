<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Register and return default file extensions for spl_autoload"
// -- https://www.php.net/manual/en/function.spl-autoload-extensions.php

$extensions = spl_autoload_extensions();
var_dump($extensions);

$extensions = spl_autoload_extensions('.php,.phar');
var_dump($extensions);

set_include_path(__DIR__ . DIRECTORY_SEPARATOR . '__fixtures');

spl_autoload_register();

$otherObject = new \OtherClass();
$otherObject->otherFunction();
