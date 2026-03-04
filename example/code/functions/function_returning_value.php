<?php

function someFunction(int $someArgument, string $otherArgument): string
{
    $result = '';

    for ($i = 0; $i < $someArgument; $i++) {
        $result .= $otherArgument . PHP_EOL;
    }

    return $result;
}

$result = someFunction(3, 'Violet elephant...');
print($result);
