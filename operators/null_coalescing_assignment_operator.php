<?php

$value = null;
$value ??= 'hello';
print("Value: {$value}\n");

$value = true;
$value ??= 'hello';
print("Value: {$value}\n");

$value = false;
$value ??= 'hello';
print("Value: {$value}\n");

print(PHP_EOL);

$items = [
    2 => "Hello, there!",
    'details' =>
    [
        'color' => 'orange',
        3.14 => 'PI',
    ]
];

$items[2] ??= '-';
print("Value: {$items[2]}\n");

$items[3] ??= '-';
print("Value: {$items[3]}\n");

$items['details']['color'] ??= '-';
print("Value: {$items['details']['color']}\n");

$items['details']['weather'] ??= '-';
print("Value: {$items['details']['weather']}\n");

print(PHP_EOL);

$object = (object) [
    'text' => "Hello, there!",
    'details' => (object)
    [
        'color' => 'orange',
        'value' => 'PI',
    ]
];

$object->text ??= '-';
print("Value: {$object->text}\n");

$object->content ??= '-';
print("Value: {$object->content}\n");

$object->details->color ??= '-';
print("Value: {$object->details->color}\n");

$object->details->weather ??= '-';
print("Value: {$object->details->weather}\n");

print(PHP_EOL);
