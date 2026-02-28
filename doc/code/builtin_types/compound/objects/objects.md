[⌂ Home](../../../../../README.md)
[▲ Previous: Arrays](../arrays/arrays.md)
[▼ Next: Enumerations](../enumerations/enumerations.md)

# Objects

## Description

If you look at the world around you, you’ll find many examples of tangible objects: lamps, phones, computers, and cars. Also, you can find intangible objects such as bank accounts and transactions.

All of these objects share the two common key characteristics:

* State
* Behavior

For example, a bank account has the state that consists of:

* Account number
* Balance

A bank account also has the following behaviors:

* Deposit
* Withdraw

PHP **objects** are conceptually similar to real-world objects because they consist of *state* and *behavior*.

An *object* holds its *state* in *variables* that are often referred to as *properties*. An *object* also exposes its *behavior* via *functions* which are known as *methods*.

-- [PHP Tutorial](https://www.phptutorial.net/php-oop/php-objects/#what-is-an-object)

*Example: Type object*

```php
<?php

$someObject = (object)[
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 15.5;
    private $privateProperty = 'hello';
}
$otherObject = new SomeClass();

print("Information:\n");
var_dump($someObject);
print('Type: ' . gettype($someObject) . PHP_EOL . PHP_EOL);

print("Information:\n");
var_dump($otherObject);
print('Type: ' . gettype($otherObject) . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Information:
object(stdClass)#1 (3) {
  ["some_key"]=>
  string(10) "some value"
  ["other_key"]=>
  int(1024)
  ["10"]=>
  bool(true)
}
Type: object

Information:
object(SomeClass)#2 (3) {
  ["publicProperty"]=>
  NULL
  ["protectedProperty":protected]=>
  float(15.5)
  ["privateProperty":"SomeClass":private]=>
  string(5) "hello"
}
Type: object

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object.php)

## Object definition and initialization

To create a new *object*, use the *`new` statement* to *instantiate* a *class*:

*Example: Object construction*

```php
<?php
class foo
{
    function do_foo()
    {
        echo "Doing foo.";
    }
}

$bar = new foo;
$bar->do_foo();
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.object.php)

[That's can be also done by casting an array to the object like `(object) ['nickname' => 'katheroine', 'occupy' => 'programmer']` -- KK]

*Example: Object definition and initialisation*

```php
<?php

$objectFromEmptyArray = (object)[];
print("Defined from empty array:\n\n");
print_r($objectFromEmptyArray);
print(PHP_EOL);

$objectFromIndexedArray = (object)[null, true, 3, 'orange'];
print("Defined from indexed array:\n\n");
print_r($objectFromIndexedArray);
print(PHP_EOL);

$objectFromAssociativeArray = (object)[
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];
print("Defined from associative array:\n\n");
print_r($objectFromAssociativeArray);
print(PHP_EOL);

$objectFromStdClass = new stdClass();
print("Defined from stdClass class:\n\n");
print_r($objectFromStdClass);
print(PHP_EOL);

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty;
    private $privateProperty;
}

$uninitialisedObjectFromClass = new SomeClass();
print("Not initialised, defined from class:\n\n");
print_r($uninitialisedObjectFromClass);
print(PHP_EOL);

class OtherClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty
    ) {
    }
}

$initialisedObjectFromClass = new OtherClass(16, 14.2, 'welcome');
print("Initialised, defined from class:\n\n");
print_r($uninitialisedObjectFromClass);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Defined from empty array:

stdClass Object
(
)

Defined from indexed array:

stdClass Object
(
    [0] =>
    [1] => 1
    [2] => 3
    [3] => orange
)

Defined from associative array:

stdClass Object
(
    [some_key] => some value
    [other_key] => 1024
    [10] => 1
)

Defined from stdClass class:

stdClass Object
(
)

Not initialised, defined from class:

SomeClass Object
(
    [publicProperty] =>
    [protectedProperty:protected] =>
    [privateProperty:SomeClass:private] =>
)

Initialised, defined from class:

SomeClass Object
(
    [publicProperty] =>
    [protectedProperty:protected] =>
    [privateProperty:SomeClass:private] =>
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_definition_and_initialisation.php)

## Object assignment and overwriting

*Example: Object assignment and overwriting*

```php
<?php

class SomeClass
{
    function __construct(
        public $publicProperty = null,
        protected $protectedProperty = 15.5,
        private $privateProperty = 'hello'
    ) {
    }
}

$someObject = new SomeClass();
print("Initialised and assigned:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject = new SomeClass(16, 14.2, 'welcome');
print("Overwritten:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject->publicProperty = 'hello';
print("After overwriting a property:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject->dynamicProperty = 10;
print("After dynamically added a property:\n\n");
print_r($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Initialised and assigned:

SomeClass Object
(
    [publicProperty] =>
    [protectedProperty:protected] => 15.5
    [privateProperty:SomeClass:private] => hello
)

Overwritten:

SomeClass Object
(
    [publicProperty] => 16
    [protectedProperty:protected] => 14.2
    [privateProperty:SomeClass:private] => welcome
)

After overwriting a property:

SomeClass Object
(
    [publicProperty] => hello
    [protectedProperty:protected] => 14.2
    [privateProperty:SomeClass:private] => welcome
)

After dynamically added a property:

SomeClass Object
(
    [publicProperty] => hello
    [protectedProperty:protected] => 14.2
    [privateProperty:SomeClass:private] => welcome
    [dynamicProperty] => 10
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_definition_and_initialisation.php)

## Creating objects

*Example: Object creating*

```php
<?php

$objectFromIndexedArray = (object)[null, true, 3, 'orange'];
$objectFromAssociativeArray = (object)[
    'some_key' => 'some value',
    'other_key' => 1024,
    10 => true,
];
$objectFromStdClass = new stdClass();

class SomeClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty = 1024
    ) {
    }
}

$uninitialisedObjectFromClass = new SomeClass('hello', 15.5);

print("From indexed array:\n\n");
print_r($objectFromIndexedArray);
print(PHP_EOL);

print("From associative array:\n\n");
print_r($objectFromAssociativeArray);
print(PHP_EOL);

print("From stdClass class:\n\n");
print_r($objectFromStdClass);
print(PHP_EOL);

print("From defined class:\n\n");
print_r($uninitialisedObjectFromClass);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
From indexed array:

stdClass Object
(
    [0] =>
    [1] => 1
    [2] => 3
    [3] => orange
)

From associative array:

stdClass Object
(
    [some_key] => some value
    [other_key] => 1024
    [10] => 1
)

From stdClass class:

stdClass Object
(
)

From defined class:

SomeClass Object
(
    [publicProperty] => hello
    [protectedProperty:protected] => 15.5
    [privateProperty:SomeClass:private] => 1024
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_creating.php)

## Displaying objects

*Example: Object displaying*

```php
<?php

class SomeClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty = 1024
    ) {
    }
}

$someObject = new SomeClass('hello', 15.5);

print("Some object:\n\n");
var_dump($someObject);
print(PHP_EOL);
print_r($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some object:

object(SomeClass)#1 (3) {
  ["publicProperty"]=>
  string(5) "hello"
  ["protectedProperty":protected]=>
  float(15.5)
  ["privateProperty":"SomeClass":private]=>
  int(1024)
}

SomeClass Object
(
    [publicProperty] => hello
    [protectedProperty:protected] => 15.5
    [privateProperty:SomeClass:private] => 1024
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_displaying.php)

## Modifying objects

*Example: Object modifying*

```php
<?php

class SomeClass
{
    function __construct(
        public $publicProperty,
        protected $protectedProperty,
        private $privateProperty = 10
    ) {
    }

    public function setProtectedProperty($protectedProperty)
    {
        $this->protectedProperty = $protectedProperty;
    }

    public function setPrivateProperty($privateProperty)
    {
        $this->privateProperty = $privateProperty;
    }
}

$someObject = new SomeClass('some value', 15.5);

print_r($someObject);
print(PHP_EOL);

$someObject->publicProperty = 'hello';
$someObject->setProtectedProperty(0.2);
$someObject->setPrivateProperty(1024);

print_r($someObject);
print(PHP_EOL);

$someObject->someDynamicProperty = '16';
$someObject->otherDynamicProperty = 'coffee';

print_r($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
SomeClass Object
(
    [publicProperty] => some value
    [protectedProperty:protected] => 15.5
    [privateProperty:SomeClass:private] => 10
)

SomeClass Object
(
    [publicProperty] => hello
    [protectedProperty:protected] => 0.2
    [privateProperty:SomeClass:private] => 1024
)

SomeClass Object
(
    [publicProperty] => hello
    [protectedProperty:protected] => 0.2
    [privateProperty:SomeClass:private] => 1024
    [someDynamicProperty] => 16
    [otherDynamicProperty] => coffee
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_modifying.php)

## Destroying objects

*Example: Object destroying*

```php
<?php

$someObject = (object)[
    'someField' => 'some value',
    'otherField' => 1024
];

var_dump(isset($someObject));
var_dump($someObject);
print(PHP_EOL);

unset($someObject);

var_dump(isset($someObject));
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
bool(true)
object(stdClass)#1 (2) {
  ["someField"]=>
  string(10) "some value"
  ["otherField"]=>
  int(1024)
}

bool(false)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_destroying.php)

## Converting to object

If an *object* is converted to an *object*, it is not modified. If a *value* of any other *type* is converted to an *object*, a new *instance* of the `stdClass` *built-in class* is created. If the value was `null`, the new *instance* will be empty. An *array* converts to an *object* with *properties* named by *keys* and corresponding *values*. Note that in this case before PHP 7.2.0 *numeric keys* have been inaccessible unless iterated.

*Example: Casting to an object*

```php
<?php
$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'})); // outputs 'bool(true)'

// Deprecated as of PHP 8.1
var_dump(key($obj)); // outputs 'string(1) "1"'
?>
```

For any other value, a member variable named scalar will contain the value.

*Example: `(object)` cast*

```php
<?php
$obj = (object) 'ciao';
echo $obj->scalar;  // outputs 'ciao'
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.object.php)

[▵ Up](#objects)
[⌂ Home](../../../../../README.md)
[▲ Previous: Arrays](../arrays/arrays.md)
[▼ Next: Enumerations](../enumerations/enumerations.md)
