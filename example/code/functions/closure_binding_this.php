<?php

class ElementsModifier
{
    private $decoration = '*';

    public function modify(array &$someArgument)
    {
        array_walk($someArgument, function (&$value, $key) {
            $value = $this->decoration
                . strtoupper($value)
                . $this->decoration;
        });
    }
}

$colors = [
    'blue',
    'orange',
    'violet',
];

print_r($colors);

$modifier = new ElementsModifier();
$modifier->modify($colors);

print_r($colors);
