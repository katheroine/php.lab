<?php

function repeat(int $number, string $text)
{
    for ($i = 0; $i < $number; $i++) {
        print($text . PHP_EOL);
    }
}

repeat(text: 'Blue elephant...', number: 3);
repeat(number: 2, text: '...is a symbol of PHP');
