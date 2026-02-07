<?php

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

    if (!is_numeric($input)) {
        throw new SomeException($input);
    } else {
        throw new OtherException($input);
    }
}

try {
    someRiskySituation();
} catch (OtherException $e) {
    print("OTHER CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
} catch (SomeException $e) {
    print("SOME CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
} finally {
    print("Will always execute.\n");
}

print("Will also execute (due to exception has been catched).\n");
