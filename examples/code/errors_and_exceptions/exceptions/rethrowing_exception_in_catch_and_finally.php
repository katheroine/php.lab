<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class SomeException extends Exception
{
    function __construct(public mixed $number)
    {
        $this->message = "Number has beign given.";
    }
}

class OtherException extends Exception
{
    function __construct(public mixed $value)
    {
        $this->message = "Value has beign given.";
    }
}

function someRiskySituation(): void
{
    $input = readline("Input: ");

    if (empty($input)) {
        return;
    } elseif (is_numeric($input)) {
        throw new SomeException($input);
    } else {
        throw new OtherException($input);
    }
}

try {
    someRiskySituation();
} catch (SomeException $e) {
    print("SOME CASE: " . $e->getMessage() . " (" . $e->number . ")\n");

    throw $e;
} catch (OtherException $e) {
    print("OTHER CASE: " . $e->getMessage() . " (" . $e->value . ")\n");

    throw new OtherException($e->getMessage() . ' rethrown');
} finally {
    print("Will always execute.\n");

    throw new Exception('From always executed code.');
}
