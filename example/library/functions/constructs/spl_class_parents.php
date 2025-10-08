<?php

// "Return the parent classes of the given class"
// -- https://www.php.net/manual/en/function.class-parents.php

class SomeClass
{
}

class OtherClass extends SomeClass
{
}

class AnotherClass extends OtherClass
{
}

$otherClassParents = class_parents(new OtherClass());

var_dump($otherClassParents);

$anotherClassParents = class_parents('AnotherClass');

var_dump($anotherClassParents);
