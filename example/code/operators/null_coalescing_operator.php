<?php

$value = 'hi' ?? 'hello';
print("Value: {$value}\n");

$value = null ?? 'hello';
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

$value = $items[2] ?? '-';
print("Value: {$value}\n");

$value = $items[3] ?? '-';
print("Value: {$value}\n");

$value = $items['details']['color'] ?? '-';
print("Value: {$value}\n");

$value = $items['details']['weather'] ?? '-';
print("Value: {$value}\n");

print(PHP_EOL);

$object = (object) [
    'text' => "Hello, there!",
    'details' => (object)
    [
        'color' => 'orange',
        'value' => 'PI',
    ]
];

$value = $object->text ?? '-';
print("Value: {$value}\n");

$value = $object->content ?? '-';
print("Value: {$value}\n");

$value = $object->details->color ?? '-';
print("Value: {$value}\n");

$value = $object->details->weather ?? '-';
print("Value: {$value}\n");

print(PHP_EOL);
