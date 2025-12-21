<?php
// PHP Reference: https://www.php.net/manual/en/function.gettype.php

$answer = true;
$number = 15;
$text = "Hello, there!";

print("Answer: " . gettype($answer)
    . "\nNumber: " . gettype($number)
    . "\nText: " . gettype($text) . "\n");
