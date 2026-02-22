<?php

$someNumericText = '15';
$arithmeticOperationResult = 2 * $someNumericText;

print($arithmeticOperationResult. PHP_EOL);

$anotherNumericText = '10.24E2';
$arithmeticOperationResult = sqrt($anotherNumericText);

print($arithmeticOperationResult . PHP_EOL);

$otherNumericText = '9xoxo';
$arithmeticOperationResult = $otherNumericText / 3;
// PHP Warning:  A non-numeric value encountered

print($arithmeticOperationResult . PHP_EOL);
