<?php

// "Return hash id for given object"
// -- https://www.php.net/manual/en/function.spl-object-hash.php

$someObject = new stdClass();
$someObjectHash = spl_object_hash($someObject);

print($someObjectHash . PHP_EOL);
