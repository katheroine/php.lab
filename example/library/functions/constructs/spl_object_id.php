<?php

// "Return the integer object handle for given object"
// -- https://www.php.net/manual/en/function.spl-object-id.php

$someObject = new stdClass();
$someObjectId = spl_object_id($someObject);

print($someObjectId . PHP_EOL);
