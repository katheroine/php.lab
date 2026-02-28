<?php

$someObject = (object)[
    'someField' => 'some value',
    'otherField' => 1024
];

var_dump(isset($someObject));
var_dump($someObject);
print(PHP_EOL);

unset($someObject);

var_dump(isset($someObject));
print(PHP_EOL);
