<?php

class SomeClass
{
    public protected(set) string $someProperty = 'protected(set)';
    protected private(set) string $otherProperty = 'protected private(set)';

    public function someSettingMethod()
    {
        print("# In the base class\n\n");
        $this->someProperty .= ' - modified in base class';
        $this->otherProperty .= ' - modified in base class';
    }

    public function someGettingMethod()
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
    public function otherSettingMethod()
    {
        print("# In the derived class\n\n");
        $this->someProperty .= ' - modified in derived class';
    }

    public function otherGettingMethod()
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
    "# From the outside:\n\n"
    . $someObject->someProperty . PHP_EOL
    . PHP_EOL
);

var_dump($someObject);
print(PHP_EOL);
