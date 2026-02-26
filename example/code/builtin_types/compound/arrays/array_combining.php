<?php

$someKeys = [1, 'value', 'fruit'];
$someValues = [32, 3.14, 'pear'];

$someArray = array_combine($someKeys, $someValues);

print("Some array:\n\n");
print_r($someArray);
print(PHP_EOL);
