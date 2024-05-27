<?php

// "Return the interfaces which are implemented by the given class or interface"
// -- https://www.php.net/manual/en/function.class-implements.php

interface SomeInterface
{
}

interface OtherInterface
{
}

interface AnotherInterface extends OtherInterface
{
}

class SomeClass implements SomeInterface, OtherInterface
{
}

class OtherClass implements AnotherInterface
{
}

$someClassInterfaces = class_implements(new SomeClass());

var_dump($someClassInterfaces);

$otherClassInterfaces = class_implements('OtherClass');

var_dump($otherClassInterfaces);
