<?php

class SomeClass {
    private int $count;
    public array $someData = [] {
        get {
            return $this->someData;
        }
        set (array $value) {
            $this->someData = array_change_key_case($value, CASE_UPPER);
            $this->count = count($value);
        }
    }

    public function getCount(): int
    {
        return $this->count;
    }
}

$someObject = new SomeClass();
$someObject->someData = [
    'os' => 'Linux',
    'pl' => 'C++',
    'lvl' => 'nerd',
];

print($someObject->getCount() . PHP_EOL . PHP_EOL);

var_dump($someObject->someData);
