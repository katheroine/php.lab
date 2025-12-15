<?php

$number = 15;
$text = "Hello, there!";

print("Does number exist: " . (isset($number) ? 'yes' : 'no') . "\nDoes number exist: " . (isset($text) ? 'yes' : 'no') . "\n\n");

unset($number);
unset($text);

print("Does number exist: " . (isset($number) ? 'yes' : 'no') . "\nDoes number exist: " . (isset($text) ? 'yes' : 'no') . "\n\n");
