<?php

class SomeClass
{
    public function getDetails()
    {
        return (object)
        [
            'color' => 'orange',
        ];
    }

    public function getData()
    {
        return null;
    }
}

$someObject = new SomeClass();

print("Value: {$someObject->getDetails()->color}\n");
print("Value: {$someObject->getDetails()?->color}\n");
// print("Value: {$someObject->getData()->smell}\n");
print("Value: {$someObject->getData()?->smell}\n");
