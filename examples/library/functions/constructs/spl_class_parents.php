<?php

/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

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
