<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Return hash id for given object"
// -- https://www.php.net/manual/en/function.spl-object-hash.php

$someObject = new stdClass();
$someObjectHash = spl_object_hash($someObject);

print($someObjectHash . PHP_EOL);
