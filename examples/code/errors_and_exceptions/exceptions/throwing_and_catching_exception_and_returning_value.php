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

function someFunction(): int
{
    try {
        someRiskySituation();
        return 1;
    } catch (SomeException $e) {
        print("SOME CASE: " . $e->getMessage() . " (" . $e->number . ")\n");
        return 2;
    } catch (OtherException $e) {
        print("OTHER CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
        return 3;
    } finally {
        print("Will always execute.\n");
    }

    print("Will not execute (due to return).\n");
}

$result = someFunction();
print("RETURNED: {$result}\n\n");

function otherFunction(): int
{
    try {
        someRiskySituation();
        return 1;
    } catch (SomeException $e) {
        print("SOME CASE: " . $e->getMessage() . " (" . $e->number . ")\n");
        return 2;
    } catch (OtherException $e) {
        print("OTHER CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
        return 3;
    } finally {
        print("Will always execute.\n");
        return 4;
    }

    print("Will not execute (due to return).\n");
}

$result = otherFunction();
print("RETURNED: {$result}\n\n");
