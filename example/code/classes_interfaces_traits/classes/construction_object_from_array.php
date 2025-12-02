<?php

$someObject = (object) [
    'someVariable' => 'hello',
];

print($someObject->someVariable . PHP_EOL);

$someObject->someVariable = 'welcome';

print($someObject->someVariable . PHP_EOL);
