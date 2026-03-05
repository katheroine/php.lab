<?php

$someFunction = fn () => "Some function";

$result = $someFunction();
print("Some function result: {$result}\n");

$otherFunction = fn (int $someArgument): int => $someArgument * 3;

$result = $otherFunction(3);
print("Other function result: {$result}\n");
