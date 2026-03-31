<?php

class SomeException extends Exception
{
    public string $name = 'Some exception';

    function __construct()
    {
        $this->message = 'The exception has been thrown.';
    }
}

throw new SomeException();
