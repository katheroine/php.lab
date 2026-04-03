<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

function repeat(int $number, string $text)
{
    for ($i = 0; $i < $number; $i++) {
        print($text . PHP_EOL);
    }
}

repeat(text: 'Blue elephant...', number: 3);
repeat(number: 2, text: '...is a symbol of PHP');
