<?php
// PHP Reference: https://www.php.net/manual/en/function.unset.php

$number = 15;
$text = "Hello, there!";

print("Is number defined: "
    . (isset($number) ? 'yes' : 'no')
    . "\nIs text defined: "
    . (isset($text) ? 'yes' : 'no')
    . "\n\n");

unset($text);

print("Is number defined: "
    . (isset($number) ? 'yes' : 'no')
    . "\nIs text defined: "
    . (isset($text) ? 'yes' : 'no')
    . "\n\n");
