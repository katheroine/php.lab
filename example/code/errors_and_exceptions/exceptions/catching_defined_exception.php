<?php

class SomeException extends Exception
{
    public string $name = 'Some exception';

    function __construct()
    {
        $this->message = 'The exception has been thrown.';
    }
}

try {
    throw new SomeException();
} catch (Exception $exception) {
    print("The exception has been catched:\n");
    print_r($exception);
}
