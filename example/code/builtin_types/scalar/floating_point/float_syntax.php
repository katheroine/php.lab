<?php

$someValue= 10.5;
$somePositiveValue = +3.2;
$someNegativeValue = -9.3;
$someValueInUnderscoredNotation = 10_000_1024.0;
$someValueInScientificNotationWithPositiveExponent = 0.125e1;
$someValueInScientificNotationWithNegativeExponent = 5e-8;
$otherValueInScientificNotationWithPositiveExponent = 0.25E2;
$otherValueInScientificNotationWithNegativeExponent = 3E-6;

print("10.5: ");
var_dump($someValue);
print("+3.2: ");
var_dump($somePositiveValue);
print("-9.3: ");
var_dump($someNegativeValue);
print("10_000_1024.0: ");
var_dump($someValueInUnderscoredNotation);
print("0.125e1: ");
var_dump($someValueInScientificNotationWithPositiveExponent);
print("5e-8: ");
var_dump($someValueInScientificNotationWithNegativeExponent);
print("0.25E2: ");
var_dump($otherValueInScientificNotationWithPositiveExponent);
print("3E-6: ");
var_dump($otherValueInScientificNotationWithNegativeExponent);
