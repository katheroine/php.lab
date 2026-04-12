<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

$someTextSingleQuoted = 'Videmus nunc per speculum et in aenigmate.';
$someTextDoubleQuoted = "Omnis mundi creatura,\nquasi liber et pictura,\nnobis est in speculum.";
$someTextNowdoc = <<<'EndOfDictum'
    Actus me invito factus
    non est meus actus
EndOfDictum;
$someTextHereDoc = <<<EndOfLyrics
Foulës in the frith,
The fishës in the flod,
And I mon waxë wod;\n
Much sorwe I walkë with
For beste of bon and blod.
EndOfLyrics;

print($someTextSingleQuoted);
print(PHP_EOL . PHP_EOL);
print($someTextDoubleQuoted);
print(PHP_EOL . PHP_EOL);
print($someTextNowdoc);
print(PHP_EOL . PHP_EOL);
print($someTextHereDoc);
print(PHP_EOL . PHP_EOL);
