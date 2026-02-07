<?php

class NumberValueException extends Exception {
    public int $number;
    // public string $message;
}

class ZeroException extends NumberValueException {
    function __construct(int $number) {
        $this->number = $number;
        $this->message = "0 number has beign given.";
    }
}

class OneException extends NumberValueException {
    function __construct(int $number) {
        $this->number = $number;
        $this->message = "1 number has beign given.";
    }
}

class ThousandException extends NumberValueException {
    function __construct(int $number) {
        $this->number = $number;
        $this->message = "1000 number has beign given.";
    }
}

function draw_number() {
    $number = readline("Give some number: ");

    if ($number == 0) {
        throw new ZeroException($number);
    } else if ($number == 1) {
        throw new OneException($number);
    } else if ($number == 1000) {
        throw new ThousandException($number);
    } else if ($number == 10000) { // Unhandled exception.
        throw new NumberValueException();
    }
}

print("Program begin...\n");

try {
    try {
        print("Risky code...\n");

        $number = draw_number();

        print("Given number " . $number . " didn't case exception throwing.\n");
    } catch (ZeroException $e) {
        print("CASE 1: " . $e->getMessage() . " (" . $e->number . ")\n");
    }
} catch (OneException $e) {
    print("CASE 2: " . $e->getMessage() . " (" . $e->number . ")\n");
} catch (ThousandException $e) {
    print("CASE 3: " . $e->getMessage() . " (" . $e->number . ")\n");
}

print("Program end...\n");
