<?php

class SomeClass
{
    public function publicDisplay()
    {
        print("Hello, public!\n");
    }

    private function privateDisplay()
    {
        print("Hello, private!\n");
    }

    public function method()
    {
        static::publicDisplay();
        $this->publicDisplay();
        $this->privateDisplay();
    }
}

$someObject = new SomeClass();
$someObject->method();
