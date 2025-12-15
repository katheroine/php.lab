<?php

$someBoolValue = true;

print("Some logical value: {$someBoolValue}\n\n");

$someIntNumber = 15;

print("Some integer number: {$someIntNumber}\n\n");

$someDecNumber = 15.5;

print("Some decimal number: {$someDecNumber}\n\n");

$someText = 'orange';

print("Some text string: {$someText}\n\n");

$someArray = [
    'nickname' => 'pumpkinette',
    'os' => 'linux',
    'browser' => 'opera',
];

print("Some array:\n");
print_r($someArray);
print("\n");

$someFunction = function() {
    return 'some_function';
};

print("Some function: " . $someFunction() . "\n\n");

$someObject = new stdClass();

print("Some object:\n");
print_r($someObject);
print("\n");
