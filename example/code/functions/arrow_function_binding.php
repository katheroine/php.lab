<?php

$someVariable = 10.5;
$otherVariable = 'binded variable';

$someFunction = fn () => "Some function with binded variable: {$someVariable}";

$result = $someFunction();
print("Some function result: {$result}\n");

$otherFunction = fn (string $someArgument): string => $someArgument . $otherVariable;

$result = $otherFunction('Variable: ');
print("Other function result: {$result}\n");
