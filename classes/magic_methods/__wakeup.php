<?php

class SomeClass
{
    public function __wakeup(): void
    {
        print(
            "Magic method __wakeup\n"
        );
    }
}

$someObject = new SomeClass();
$serialized = serialize($someObject);
unserialize($serialized);
