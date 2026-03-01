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
    'other key' => 1024,
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
  ["other key"]=>
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
    'other key' => 1024,
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
    [other key] => 1024
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
    'other key' => 1024,
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
    [other key] => 1024
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

## Object properties

*Example: Object properties*

```php
<?php

class Data
{
    public $programmingLanguage;
    public $database;
    protected $operatingSystem = 'Unix';
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }
}

$data = new Data(1024);
$data->setOperatingSystem('Linux');
$data->database = 'MongoDB';
$data->programmingLanguage = 'PHP';

print("Data:\n\n");
var_dump($data);
print(PHP_EOL);
print("id: {$data->getId()}\n");
print("operating system: {$data->getOperatingSystem()}\n");
print("database: {$data->database}\n");
print("programming language: {$data->programmingLanguage}\n\n");

```

**Result (PHP 8.4)**:

```
Data:

object(Data)#1 (4) {
  ["programmingLanguage"]=>
  string(3) "PHP"
  ["database"]=>
  string(7) "MongoDB"
  ["operatingSystem":protected]=>
  string(5) "Linux"
  ["id":"Data":private]=>
  int(1024)
}

id: 1024
operating system: Linux
database: MongoDB
programming language: PHP

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_properties.php)

### Defining and initialising object properties

*Example: Object properties defining and initialising*

```php
<?php

$someObjectFromArray = (object)[
    'some_key' => 'some value',
    'other key' => 1024,
    10 => true,
];

print("From array:\n\n");
var_dump($someObjectFromArray);
print(PHP_EOL);

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 16;
    private $somePrivateProperty;

    public function __construct(private $otherPrivateProperty = 'hello')
    {
        $this->somePrivateProperty = 64.5;
    }
}

$someObjectFromClass = new SomeClass();

print("From class without constructor argument:\n\n");
var_dump($someObjectFromClass);
print(PHP_EOL);

class OtherClass
{
    public bool $publicProperty;
    protected int $protectedProperty = 16;
    private float $somePrivateProperty;

    public function __construct(private string $otherPrivateProperty = 'hello')
    {
        $this->somePrivateProperty = 64.5;
    }
}

$otherObjectFromClass = new OtherClass(true);

print("From class with constructor argument:\n\n");
var_dump($otherObjectFromClass);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
From array:

object(stdClass)#1 (3) {
  ["some_key"]=>
  string(10) "some value"
  ["other key"]=>
  int(1024)
  ["10"]=>
  bool(true)
}

From class without constructor argument:

object(SomeClass)#2 (4) {
  ["publicProperty"]=>
  NULL
  ["protectedProperty":protected]=>
  int(16)
  ["somePrivateProperty":"SomeClass":private]=>
  float(64.5)
  ["otherPrivateProperty":"SomeClass":private]=>
  string(5) "hello"
}

From class with constructor argument:

object(OtherClass)#3 (3) {
  ["publicProperty"]=>
  uninitialized(bool)
  ["protectedProperty":protected]=>
  int(16)
  ["somePrivateProperty":"OtherClass":private]=>
  float(64.5)
  ["otherPrivateProperty":"OtherClass":private]=>
  string(1) "1"
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_properties_defining_and_initialising.php)

#### Object dynamic properties

*Example: Object dynamic properties*

```php
<?php

class SomeClass
{
    public $someProperty = 1;
}

$someObject = new SomeClass();
print("Some object:\n\n");
print_r($someObject);
print(PHP_EOL);

$someObject->otherProperty = 2;
$someObject->anotherProperty = 3;

print_r($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some object:

SomeClass Object
(
    [someProperty] => 1
)

SomeClass Object
(
    [someProperty] => 1
    [otherProperty] => 2
    [anotherProperty] => 3
)

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_dynamic_properties.php)

### Accessing object properties

*Example: Object properties accessing*

```php
<?php

$someObjectFromArray = (object)[
    'some_key' => 'some value',
    'other key' => 1024,
    10 => 10.5,
];

print("From array:\n\n");

print("some_key: {$someObjectFromArray->some_key}\n");
print("other key: {$someObjectFromArray->{'other key'}}\n");
print("other key: {$someObjectFromArray->{10}}\n\n");

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 16;
    private $privateProperty = 'hello';

    public function getProtectedProperty()
    {
        return $this->protectedProperty;
    }

    public function getPrivateProperty()
    {
        return $this->privateProperty;
    }
}

$someObjectFromClass = new SomeClass();

print("From class:\n\n");

print("publicProperty: {$someObjectFromClass->publicProperty}\n");
print("protectedProperty: {$someObjectFromClass->getProtectedProperty()}\n");
print("privateProperty: {$someObjectFromClass->getPrivateProperty()}\n\n");

```

**Result (PHP 8.4)**:

```
From array:

some_key: some value
other key: 1024
other key: 10.5

From class:

publicProperty:
protectedProperty: 16
privateProperty: hello

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_properties_accessing.php)

## Updating object properties

*Example: Object properties updating*

```php
<?php

class SomeClass
{
    public $publicProperty;
    protected $protectedProperty = 16;
    private $privateProperty = 'hello';

    public function setProtectedProperty($protectedProperty)
    {
        $this->protectedProperty = $protectedProperty;
    }

    public function setPrivateProperty($privateProperty)
    {
        $this->privateProperty = $privateProperty;
    }
}

$someObject = new SomeClass();

print("Some object:\n\n");
var_dump($someObject);
print(PHP_EOL);

$someObject->publicProperty = 2.5;
$someObject->setProtectedProperty(32);
$someObject->setPrivateProperty('hi');

var_dump($someObject);
print(PHP_EOL);

$someReference = $someObject;

$someReference->publicProperty = 100;
$someReference->setProtectedProperty(300);
$someReference->setPrivateProperty('welcome');

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some object:

object(SomeClass)#1 (3) {
  ["publicProperty"]=>
  NULL
  ["protectedProperty":protected]=>
  int(16)
  ["privateProperty":"SomeClass":private]=>
  string(5) "hello"
}

object(SomeClass)#1 (3) {
  ["publicProperty"]=>
  float(2.5)
  ["protectedProperty":protected]=>
  int(32)
  ["privateProperty":"SomeClass":private]=>
  string(2) "hi"
}

object(SomeClass)#1 (3) {
  ["publicProperty"]=>
  int(100)
  ["protectedProperty":protected]=>
  int(300)
  ["privateProperty":"SomeClass":private]=>
  string(7) "welcome"
}

```

**Source code**:
[Example](../../../../../example/code/builtin_types/compound/objects/object_properties_updating.php)

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
