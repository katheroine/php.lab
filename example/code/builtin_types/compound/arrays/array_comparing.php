<?php

$someArray =  [null, true, 2, 3.14, 'orange'];
$otherArray = [0, true, 2, 3.14, 'blue', 'hello'];

$rightDifference = array_diff($someArray, $otherArray);
$leftDifference = array_diff($otherArray, $someArray);

print("Difference:\n\n");

print_r($rightDifference);
print(PHP_EOL);

print_r($leftDifference);
print(PHP_EOL);
