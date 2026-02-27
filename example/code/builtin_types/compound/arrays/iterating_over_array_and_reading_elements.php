<?php

$someArray = ['apple', 'orange', 'banana', 'pear', 'peach'];

for ($i = 0; $i < count($someArray); $i++) {
    print("{$i}: {$someArray[$i]}\n");
}

print(PHP_EOL);

while($element = current($someArray)) {
    print(key($someArray) . ": " . $element . PHP_EOL);
    next($someArray);
}

print(PHP_EOL);

$otherArray = [
    2 => 'apple',
    6 => 'orange',
    15 => 'banana',
    20 => 'pear',
    35 => 'peach',
];

foreach ($otherArray as $value) {
    print("{$value}\n");
}

print(PHP_EOL);

foreach ($otherArray as $key => $value) {
    print("{$key}: {$value}\n");
}

print(PHP_EOL);

array_walk($otherArray, function($value) {
    print("{$value}\n");
});

print(PHP_EOL);

array_walk($otherArray, function($value, $key) {
    print("{$key}: {$value}\n");
});

print(PHP_EOL);

$anotherArray = [
    'apple',
    'orange',
    'banana',
    'pear',
    'peach',
    'berry' => [
        'cherry',
        'strawberry',
        'blueberry',
        'raspberry',
        'blackberry']
    ];

array_walk_recursive($anotherArray, function($value) {
  print("{$value}\n");
});

print(PHP_EOL);

array_walk_recursive($anotherArray, function($value, $key) {
    print("{$key}: {$value}\n");
});

print(PHP_EOL);
