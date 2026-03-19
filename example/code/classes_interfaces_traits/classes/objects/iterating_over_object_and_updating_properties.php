<?php

class SomeClass
{
    public string $somePublicProperty = 'apple';
    public string $otherPublicProperty = 'orange';
    public string $anotherPublicProperty = 'banana';
    protected string $someProtectedProperty = 'pear';
    private string $somePrivateProperty = 'peach';

    public function iterateWithValues(string $postfix)
    {
        foreach ($this as &$value) {
            $value .= $postfix;
        }
    }

    public function iterateWithKeysAndValues(string $postfix)
    {
        foreach ($this as $key => &$value) {
            $value .= $postfix;
        }
    }
}

class OtherClass extends SomeClass
{
    public function iterateWithValues(string $postfix)
    {
        foreach ($this as &$value) {
            $value .= $postfix;
        }
    }

    public function iterateWithKeysAndValues(string $postfix)
    {
        foreach ($this as $key => &$value) {
            $value .= $postfix;
        }
    }
}

$someObject = new SomeClass();

print(
    "# SomeClass:\n\n"
    . "from outside:\n\n"
);

foreach ($someObject as &$value) {
    $value .= ' 1...';
}

print_r($someObject);
print(PHP_EOL);

foreach ($someObject as $key => &$value) {
    $value .= ' 2...';
}

print_r($someObject);
print(PHP_EOL);

print("from inside:\n\n");

$someObject->iterateWithValues(' 3...');

print_r($someObject);
print(PHP_EOL);

$someObject->iterateWithKeysAndValues(' 4...');

print_r($someObject);
print(PHP_EOL);

$otherObject = new OtherClass();

print(
    "# OtherClass:\n\n"
    . "from outside:\n\n"
);

foreach ($otherObject as &$value) {
    $value .= ' 5...';
}

print_r($otherObject);
print(PHP_EOL);

foreach ($otherObject as $key => &$value) {
    $value .= ' 6...';
}

print_r($otherObject);
print(PHP_EOL);

print("from inside:\n\n");

$otherObject->iterateWithValues(' 7...');

print_r($otherObject);
print(PHP_EOL);

$otherObject->iterateWithKeysAndValues(' 8...');

print_r($otherObject);
print(PHP_EOL);
