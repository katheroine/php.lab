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

function someFunction(): int
{
    try {
        someRiskySituation();
        return 1;
    } catch (OtherException $e) {
        print("OTHER CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
        return 2;
    } catch (SomeException $e) {
        print("SOME CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
        return 3;
    } finally {
        print("Will always execute.\n");
        return 4;
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
    } catch (OtherException $e) {
        print("OTHER CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
        return 2;
    } catch (SomeException $e) {
        print("SOME CASE: " . $e->getMessage() . " (" . $e->value . ")\n");
        return 3;
    } finally {
        print("Will always execute.\n");
    }

    print("Will not execute (due to return).\n");
}

$result = otherFunction();
print("RETURNED: {$result}\n\n");
