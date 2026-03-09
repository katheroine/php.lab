<?php

class SomeClass
{
    public static $someStaticProperty = 'lemon';
}

print('Statically accessed static property value: ' . SomeClass::$someStaticProperty . PHP_EOL);
