<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// "Return the integer object handle for given object"
// -- https://www.php.net/manual/en/function.spl-object-id.php

$someObject = new stdClass();
$someObjectId = spl_object_id($someObject);

print($someObjectId . PHP_EOL);
