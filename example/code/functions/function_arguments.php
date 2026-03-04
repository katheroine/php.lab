<?php

function someFunction(int $someArgument, string $otherArgument, $anotherArgument)
{
    for ($i = 0; $i < $someArgument; $i++) {
        print($otherArgument . PHP_EOL);
    }

    print($anotherArgument . PHP_EOL);
}

someFunction(3, 'Blue elephant...', 'Eats peanuts and interprets the code.');
