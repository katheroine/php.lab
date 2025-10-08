<?php

// "The SensitiveParameterValue class allows wrapping sensitive values to protect them against accidental exposure."
// -- https://www.php.net/manual/en/class.sensitiveparametervalue.php

function someFunction(
    string $someParameter,
    string $someSensitiveParameter
) {
    throw new Exception('Error!');
}

function otherFunction(
    string $otherParameter,
    #[\SensitiveParameter]
    string $otherSensitiveParameter
) {
    throw new Exception('Error!');
}

try {
    someFunction('violet', 'strawberry');
} catch (Exception $exception) {
    print($exception . PHP_EOL . PHP_EOL);
}

try {
    otherFunction('orchid', 'grape');
} catch (Exception $exception) {
    print($exception . PHP_EOL . PHP_EOL);
}

class SomeClass
{
    private readonly string $someParameter;
    private SensitiveParameterValue $someSensitiveParameter;

    public function __construct()
    {
        $this->someParameter = 'rose';
        $this->someSensitiveParameter = new SensitiveParameterValue('orange');
    }

    public function display()
    {
        print(
            'Value: ' . $this->someParameter . PHP_EOL
            . 'Sensitive value: ' . $this->someSensitiveParameter->getValue() . PHP_EOL
        );
    }
}

$someObject = new SomeClass();

$someObject->display();

print(PHP_EOL);

print_r($someObject);

print(PHP_EOL);

var_dump($someObject);

print(PHP_EOL);
