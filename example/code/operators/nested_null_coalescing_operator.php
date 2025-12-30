<?php

$text = "Text is set.";
$number = 3;
$result = $text ?? $number ?? "Either text and number aren't set.";
print($result . PHP_EOL);
