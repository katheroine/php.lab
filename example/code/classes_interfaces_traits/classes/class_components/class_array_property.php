<?php

class SomeClass
{
    public $someArrayProperty;

    public function __construct()
    {
        $this->someArrayProperty = [
            'some_key' => 'some value',
        ];
    }
}

$object = new SomeClass();
print_r($object->someArrayProperty);

$object->someArrayProperty['some_key'] = 'other value';
$object->someArrayProperty['other_key'] = 'value';
print_r($object->someArrayProperty);

$object->someArrayProperty = [
    'another_key' => 'another value',
];
print_r($object->someArrayProperty);

$someReference = &$object->someArrayProperty['another_key'];
$someReference = 'yet another value';
print_r($object->someArrayProperty);
