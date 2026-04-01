<?php

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

function someRiskySituation()
{
    $input = readline("Input: ");

    if (empty($input)) {
        return $input;
    } elseif (is_numeric($input)) {
        throw new SomeException($input);
    } else {
        throw new OtherException($input);
    }
}

print("Program begin...\n");

try {
    try {
        print("Risky code...\n");

        $result = someRiskySituation();

        print("Result {$result} didn't case exception throwing.\n");
    } catch (SomeException $e) {
        print("SOME CASE: " . $e->getMessage() . " (" . $e->number . ")\n");
    }
} catch (OtherException $e) {
    print("OTHER CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
} finally {
    print("Will always execute.\n");
}

print("Program end...\n");
