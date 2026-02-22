<?php

$someWord = 'hello';

print('Some word: ' . $someWord . PHP_EOL);
print('length: ' . strlen($someWord) . PHP_EOL . PHP_EOL);

$someQuote = 'Stat rosa pristina nomine, nomina nuda tenemus.';

print('Some quote: ' . $someQuote . PHP_EOL);
print('Length: ' . strlen($someQuote) . PHP_EOL);
print('Words quantity: ' . str_word_count($someQuote) . PHP_EOL . PHP_EOL);
