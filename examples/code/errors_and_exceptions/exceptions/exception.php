<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeException extends Exception
{
    public mixed $value;

    function __construct(mixed $value)
    {
        $this->value = $value;
        $this->message = "Value has beign given.";
    }
}

class OtherException extends SomeException
{
    function __construct(int $number)
    {
        $this->value = $number;
        $this->message = "Number has beign given.";
    }
}

function someRiskySituation(): void
{
    $input = readline("Input: ");

    if (empty($input)) {
        print("No exception.\n");
    } elseif (!is_numeric($input)) {
        throw new SomeException($input);
    } else {
        throw new OtherException($input);
    }
}

try {
    someRiskySituation();
} catch (OtherException $e) {
    print("Some exception: " . $e->getMessage() . " (" . $e->value . ")\n");
} catch (SomeException $e) {
    print("Other exception: " . $e->getMessage() . " (" . $e->value . ")\n");
} finally {
    print("Will always execute.\n");
}

print("Will also execute (due to exception has been catched).\n");
