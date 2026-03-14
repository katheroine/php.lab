<?php

class SomeClass
{
    protected string $someProperty = 'protected';
    protected private(set) string $otherProperty = 'protected private(set)'; // final

    function someSettingMethod()
    {
        print("# In the base class\n\n");
        $this->someProperty .= ' - modified in base class';
        $this->otherProperty .= ' - modified in base class';
    }

    function someGettingMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    public protected(set) string $someProperty = 'public protected(set)';

    function otherSettingMethod()
    {
        print("# In the derived class\n\n");
        $this->someProperty .= ' - modified in derived class';
    }

    function otherGettingMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someGettingMethod();
$someObject->someSettingMethod();
var_dump($someObject);
print(PHP_EOL);

$otherObject = new OtherClass();
$otherObject->otherSettingMethod();
$otherObject->otherGettingMethod();
var_dump($otherObject);
print(PHP_EOL);

print(
    "# From the outside (object of derived class):\n\n"
    . $otherObject->someProperty . PHP_EOL
    . PHP_EOL
);

var_dump($someObject);
print(PHP_EOL);
