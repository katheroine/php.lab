<?php

define('SOME_BOOL_VALUE', true);
const OTHER_BOOL_VALUE = false;

print("Some logical value: " . SOME_BOOL_VALUE . "\nOther logical value: " . OTHER_BOOL_VALUE . "\n\n");

define('SOME_INT_NUMBER', 15);
const OTHER_INT_NUMBER = 10;

print("Some integer number: " . SOME_INT_NUMBER . "\nOther integer number: " . OTHER_INT_NUMBER . "\n\n");

define('SOME_DEC_NUMBER', 15.5);
const OTHER_DEC_NUMBER = 10.24;

print("Some decimal number: " . SOME_DEC_NUMBER . "\nOther decimal number: " . OTHER_DEC_NUMBER . "\n\n");

define('SOME_TEXT', 'orange');
const OTHER_TEXT = 'multimeter';

print("Some text: " . SOME_TEXT . "\nOther text: " . OTHER_TEXT . "\n\n");

define('SOME_ARRAY', [
    'nickname' => 'pumpkinette',
    'os' => 'linux',
    'browser' => 'opera',
]);
const OTHER_ARRAY = [
    'nickname' => 'nikologist',
    'os' => 'chromeos',
    'browser' => 'chrome',
];

print("Some array:\n");
print_r(SOME_ARRAY);
print("Other array:\n");
print_r(OTHER_ARRAY);
print("\n");

define('SOME_FUNCTION', function() {
    return 'some_function';
});
// const OTHER_FUNCTION = function() {
//     return 'other_function';
// };
// PHP Fatal error:  Constant expression contains invalid operations

print("Some function: " . (SOME_FUNCTION)() . "\n\n");

define('SOME_OBJECT', new stdClass());
const OTHER_OBJECT = new stdClass();

print("Some object:\n");
print_r(SOME_OBJECT);
print("Other object:\n");
print_r(OTHER_OBJECT);
print("\n");
