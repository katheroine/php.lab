<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someText = 'Welcome to the jungle!';
$textLenght = strlen($someText);

for($i = 0; $i < $textLenght; $i++) {
    print($someText[$i]);
}

print(PHP_EOL);

$someWord = 'bundle';
$textStartIndex = strpos($someText, 'jungle');
$wordLength = strlen($someWord);

for($i = $textStartIndex, $j = 0; ($i < $textLenght && $j < $wordLength); $i++, $j++) {
    $someText[$i] = $someWord[$j];
}

print($someText . PHP_EOL);
