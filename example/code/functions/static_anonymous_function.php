<?php

class ElementsModifier
{
    static private $decoration = '*';

    public function modify(array &$someArgument)
    {
        array_walk($someArgument, static function(&$value, $key) {
            $value = self::$decoration
                . strtoupper($value)
                . self::$decoration;
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
