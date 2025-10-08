<?php

// "Return the traits used by the given class"
// -- https://www.php.net/manual/en/function.class-uses.php

trait SomeTrait
{
}

trait OtherTrait
{
}

trait AnotherTrait
{
    use OtherTrait;
}

class SomeClass
{
    use SomeTrait, OtherTrait;
}

class OtherClass
{
    use AnotherTrait;
}

$someClassTraits = class_uses(new SomeClass());

var_dump($someClassTraits);

$otherClassTraits = class_uses('OtherClass');

var_dump($otherClassTraits);
