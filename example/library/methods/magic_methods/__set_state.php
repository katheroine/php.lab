<?php

class SomeClass
{
    public const string SOME_CONSTANT = 'SOME LABEL';
    private const string HIDDEN_FIELD_MESSAGE = 'hidden';

    public string $somePublicProperty = 'some public';
    public string $otherPublicProperty = 'other public';
    protected string $someProtectedProperty = 'some protected';

    public static function __set_state(array $properties): object
    {
        print(
            "Magic method __set_state\n\n"
            . "Properties:\n"
        );
        var_dump($properties);
        print(PHP_EOL);

        return (object) [
            'SOME_CONSTANT' => static::SOME_CONSTANT,
            'somePublicProperty' => $properties['somePublicProperty'],
            'otherPublicProperty' => static::HIDDEN_FIELD_MESSAGE,
            'someProtectedProperty' => static::HIDDEN_FIELD_MESSAGE,
        ];
    }
}

$someObject = new SomeClass();

$result = var_export($someObject, true);
print($result . PHP_EOL . PHP_EOL);

eval('$otherObject = ' . $result . ';');

var_dump($otherObject);
print(PHP_EOL);
