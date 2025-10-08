<?php

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
