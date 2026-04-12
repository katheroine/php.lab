<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class NumberValueException extends Exception
{
    function __construct(
        public int $number = 0,
        string $message = "Some number has beign given.",
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message} ($this->number)";
    }
}

class ZeroException extends NumberValueException
{
    function __construct(
        public int $number = 0,
        string $message = "0 number has beign given.",
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($number, $message, $code, $previous);
    }
}

class OneException extends NumberValueException
{
    function __construct(
        public int $number = 1,
        string $message = "1 number has beign given.",
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($number, $message, $code, $previous);
    }
}

class ThousandException extends NumberValueException
{
    function __construct(
        public int $number = 1000,
        string $message = "1000 number has beign given.",
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($number, $message, $code, $previous);
    }
}

function draw_number(): int
{
    $number = readline("Give some number: ");

    if ($number == 0) {
        throw new ZeroException($number);
    } elseif ($number == 1) {
        throw new OneException($number);
    } elseif ($number == 10) {
        throw new NumberValueException($number);
    } elseif ($number == 1000) {
        throw new ThousandException($number);
    }

    return $number;
}

print("Program begin...\n");

try {
    print("Risky code...\n");

    $number = draw_number();

    print("Given number {$number} didn't case exception throwing.\n");
} catch (ZeroException $e) {
    print("CASE 1: {$e->getMessage()} ({$e->number})\n{$e}\n");
} catch (OneException $e) {
    print("CASE 2: {$e->getMessage()} ({$e->number})\n{$e}\n");
} catch (NumberValueException $e) {
    print("CASE 0: {$e->getMessage()} ({$e->number})\n{$e}\n");
} catch (ThousandException $e) { // Will be never catched.
    print("CASE 3: {$e->getMessage()} ({$e->number})\n{$e}\n");
}

print("Program end...\n");
