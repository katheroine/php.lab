<?php
// PHP Reference: https://www.php.net/manual/en/function.isset.php

$number = 15;
$text = "Hello, there!";

print("Is number defined: "
    . (isset($number) ? 'yes' : 'no')
    . "\nIs text defined: "
    . (isset($text) ? 'yes' : 'no')
    . "\nIs answer defined: "
    . (isset($answer) ? 'yes' : 'no')
    . "\n");
