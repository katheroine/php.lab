<?php

$someText = 'Hi, there!';
$otherText = "Hello.";

print("Information:\n");
var_dump($someText);
print('Type: ' . gettype($someText) . PHP_EOL);

print("Information:\n");
var_dump($otherText);
print('Type: ' . gettype($otherText) . PHP_EOL);
