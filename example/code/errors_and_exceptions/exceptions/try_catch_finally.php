<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class NumberValueException extends Exception
{
    public int $number;
}

class ZeroException extends NumberValueException
{
    public function __construct(int $number)
    {
        $this->number = $number;
        $this->message = "0 number has beign given.";
    }
}

class OneException extends NumberValueException
{
    public function __construct(int $number)
    {
        $this->number = $number;
        $this->message = "1 number has beign given.";
    }
}

class ThousandException extends NumberValueException
{
    public function __construct(int $number)
    {
        $this->number = $number;
        $this->message = "1000 number has beign given.";
    }
}

function drawNumber()
{
    $number = readline("Give some number: ");

    if ($number == 0) {
        throw new ZeroException($number);
    } elseif ($number == 1) {
        throw new OneException($number);
    } elseif ($number == 1000) {
        throw new ThousandException($number);
    } elseif ($number == 10000) {
        throw new NumberValueException();
    }
}

print("Program begin...\n");

try {
    print("Risky code...\n");

    $number = drawNumber();

    print("Given number " . $number . " didn't case exception throwing.\n");
} catch (ZeroException $e) {
    print("CASE 1: " . $e->getMessage() . " (" . $e->number . ")\n");
} catch (OneException $e) {
    print("CASE 2: " . $e->getMessage() . " (" . $e->number . ")\n");
} catch (ThousandException $e) {
    print("CASE 3: " . $e->getMessage() . " (" . $e->number . ")\n");
} finally {
    print("End of risks.\n");
}

print("Program end...\n");
