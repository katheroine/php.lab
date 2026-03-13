[⌂ Home](../../../README.md)
[▲ Previous: Fibers](../../fibers/fibers.md)
[▼ Next: Class components](./class_components.md)

# Classes

## Definition

> In programming, a **class** is a *syntactic entity structure* used to create *objects*.  The capabilities of a class differ between programming languages, but generally the shared aspects consist of *state* (*variables*) and *behavior* (*methods*) that are each either associated with a particular *object* or with all *objects* of that *class*.
>
> *Object state* can differ between each *instance* of the *class* whereas the *class state* is shared by all of them. The *object methods* include access to the *object state* (via an implicit or explicit parameter that references the *object*) whereas *class methods* do not.

If the language supports *inheritance*, a *class* can be defined based on another *class* with all of its *state* and *behavior* plus additional *state* and *behavior* that further specializes the *class*. The specialized *class* is a *sub-class*, and the *class* it is based on is its *superclass*.

In *purely object-oriented programming languages*, such as Java and C#, all *classes* might be part of an *inheritance tree* such that the *root class* is `Object`, meaning all *objects instances* are of `Object` or implicitly *extend* `Object`, which is called a top *type*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Class_(programming))

## Description

PHP includes a complete ***object model***. Some of its features are: *visibility*, *abstract* and *final classes* and *methods*, additional *magic methods*, *interfaces*, and *cloning*.

PHP treats *objects* in the same way as *references* or *handles*, meaning that each *variable* contains an *object reference* rather than a copy of the entire *object*.

-- [PHP Reference](https://www.php.net/manual/en/oop5.intro.php)

*Example: Class*

```php
<?php

class SomeClass
{
    public $someProperty = 64;
    private $otherProperty = 'broccoli';

    function someMethod()
    {
        return $this->otherProperty;
    }

    function otherMethod($someArgument)
    {
        $this->otherProperty = $someArgument;
    }
}

$someObject = new SomeClass();

print($someObject->someProperty . PHP_EOL);
print($someObject->someMethod() . PHP_EOL . PHP_EOL);

$someObject->someProperty = 128;
$someObject->otherMethod('cauliflower');

print($someObject->someProperty . PHP_EOL);
print($someObject->someMethod() . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
64
broccoli

128
cauliflower

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class.php)

## Class definition

>>> `class` keyword

Basic *class definitions* begin with the *keyword* `class`, followed by a *class name*, followed by a pair of curly braces which enclose the definitions of the properties and methods belonging to the class.

The *class name* can be any *valid label*, provided it is not a PHP *reserved word*. As of PHP 8.4.0, using a single underscore `_` as a *class name* is deprecated. A valid *class name* starts with a letter or underscore, followed by any number of letters, numbers, or underscores. As a regular expression, it would be expressed thus: `^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$`.

A *class* may contain its own *constants*, *variables* (called *properties*), and *functions* (called *methods*).

*Example: Simple class definition*

```php
<?php
class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class)

*Example: Class definiton*

```php
<?php

class SomeClass
{
    public $someProperty;
    public $otherProperty;

    function someMethod()
    {
        return "{$this->someProperty} & {$this->otherProperty}";
    }
}

class OtherClass
{
    public int $someNumber;
    public float $someValue;
    public string $someText;

    function someMethod(int $number, float $value): string
    {
        $this->someNumber = $number;
        $this->someValue = $value;
        $this->someText = (string) ($number * $value);

        return $this->someText;
    }

    function otherMethod(): float
    {
        return $this->someNumber * $this->someValue;
    }
}

$someObject = new SomeClass();
$someObject->someProperty = 256;
$someObject->otherProperty = 'tomato';
$result = $someObject->someMethod();

print($result . PHP_EOL);

$otherObject = new OtherClass();
$result = $otherObject->someMethod(3, 1.5);

print($result . PHP_EOL);
print($otherObject->otherMethod() . PHP_EOL);

```

**Result (PHP 8.4)**:

```
256 & tomato
4.5
4.5
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_definition.php)

## Class instantiation

>>> `new` keyword

To create an *instance of a class*, the `new` *keyword* must be used. An *object* will always be created unless the *object* has a *constructor* defined that throws an *exception* on error. *Classes* should be *defined* before *instantiation* (and in some cases this is a requirement).

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

Note:

If there are no *arguments* to be passed to the class's *constructor*, parentheses after the class name may be omitted.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

*Example: Class instantiation*

```php
<?php

class SomeClass
{
}

class OtherClass
{
    private(set) string $someProperty;

    function __construct(string $someValue)
    {
        $this->someProperty = $someValue;
    }
}

$someObject = new SomeClass;

print("Some object\n");
var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass();

print("Other object\n");
var_dump($otherObject);
print(PHP_EOL);

$anotherObject = new OtherClass('onion');

print("Another object\n");
var_dump($anotherObject);
print("Initialied property: {$anotherObject->someProperty}\n");
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some object
object(SomeClass)#1 (0) {
}

Other object
object(SomeClass)#2 (0) {
}

Another object
object(OtherClass)#3 (1) {
  ["someProperty"]=>
  string(5) "onion"
}
Initialied property: onion

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_instantiation.php)

If a *variable* containing a *string* with the *name of a class* is used with `new`, a new *instance* of that *class* will be created. If the *class* is in a *namespace*, its *fully qualified name* must be used when doing this.

*Example: Creating an instance*

```php
<?php
class SimpleClass {
}

$instance = new SimpleClass();
var_dump($instance);

// This can also be done with a variable:
$className = 'SimpleClass';
$instance = new $className(); // new SimpleClass()
var_dump($instance);
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

*Example: Class instantiation from a string*

```php
<?php

class SomeClass
{
}

class OtherClass
{
}

class AnotherClass
{
}

const CLASS_NAME = 'SomeClass';
$someObject = new (CLASS_NAME)();

print("Some object\n");
var_dump($someObject);
print(PHP_EOL);

$className = 'OtherClass';
$otherObject = new $className();

print("Other object\n");
var_dump($otherObject);
print(PHP_EOL);

$anotherObject = new ('An' . $className)();

print("Another object\n");
var_dump($anotherObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some object
object(SomeClass)#1 (0) {
}

Other object
object(OtherClass)#2 (0) {
}

Another object
object(AnotherClass)#3 (0) {
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_instantiation_from_string.php)

As of PHP 8.0.0, using `new` with arbitrary *expressions* is supported. This allows more complex *instantiation* if the *expression* produces a *string*. The *expressions* must be wrapped in parentheses.

*Example: Creating an instance using an arbitrary expression*

In the given example we show multiple examples of valid arbitrary *expressions* that produce a *class name*. This shows a call to a function, string concatenation, and the `::class` constant.

```php
<?php

class ClassA extends \stdClass {}
class ClassB extends \stdClass {}
class ClassC extends ClassB {}
class ClassD extends ClassA {}

function getSomeClass(): string
{
    return 'ClassA';
}

var_dump(new (getSomeClass()));
var_dump(new ('Class' . 'B'));
var_dump(new ('Class' . 'C'));
var_dump(new (ClassD::class));
?>
```

Output of the above example in PHP 8:

```
object(ClassA)#1 (0) {
}
object(ClassB)#1 (0) {
}
object(ClassC)#1 (0) {
}
object(ClassD)#1 (0) {
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

*Example: Class instantiation from and expression*

```php
<?php

class SomeClass
{
}

class OtherClass
{
}

class AnotherClass
{
}

function giveClassName(): string
{
    return 'OtherClass';
}

$someObject = new ('Some' . 'Class')();

print("Some object\n");
var_dump($someObject);
print(PHP_EOL);

$otherObject = new (giveClassName())();

print("Other object\n");
var_dump($otherObject);
print(PHP_EOL);

$anotherObject = new ('An' . giveClassName())();

print("Another object\n");
var_dump($anotherObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Some object
object(SomeClass)#1 (0) {
}

Other object
object(OtherClass)#2 (0) {
}

Another object
object(AnotherClass)#3 (0) {
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_instantiation_from_expression.php)

In the *class context*, it is possible to create a new *object* by `new self` and `new parent`.

[Also from `new static`. -- KK]

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

*Example: Class instantiation from `static`, `self` and `parent` keywords*

```php
<?php

class BaseClass
{
    static function createStatic()
    {
        return new static();
    }

    static function createSelf()
    {
        return new self();
    }
}

class DerivedClass extends BaseClass
{
    static function createParent()
    {
        return new parent();
    }
}

$fromBaseStaticObject = BaseClass::createStatic();

print("From base static\n");
var_dump($fromBaseStaticObject);
print(PHP_EOL);

$fromBaseSelfObject = BaseClass::createSelf();

print("From base self\n");
var_dump($fromBaseSelfObject);
print(PHP_EOL);

$fromDerivedStatic = DerivedClass::createStatic();

print("From derived static\n");
var_dump($fromDerivedStatic);
print(PHP_EOL);

$fromDerivedSelf = DerivedClass::createSelf();

print("From derived self\n");
var_dump($fromDerivedSelf);
print(PHP_EOL);

$fromDerivedParent = DerivedClass::createParent();

print("From derived parent\n");
var_dump($fromDerivedParent);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
From base static
object(BaseClass)#1 (0) {
}

From base self
object(BaseClass)#2 (0) {
}

From derived static
object(DerivedClass)#3 (0) {
}

From derived self
object(BaseClass)#4 (0) {
}

From derived parent
object(BaseClass)#5 (0) {
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_instantiation_from_static_self_and_parent.php)

It's possible to create *instances* of an *object* in a couple of ways:

*Example: Creating new objects*

```php
<?php

class Test
{
    public static function getNew()
    {
        return new static();
    }
}

class Child extends Test {}

$obj1 = new Test(); // By the class name
$obj2 = new $obj1(); // Through the variable containing an object
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew(); // By the class method
var_dump($obj3 instanceof Test);

$obj4 = Child::getNew(); // Through a child class method
var_dump($obj4 instanceof Child);

?>
```

The above example will output:

```
bool(true)
bool(true)
bool(true)
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

*Example: Class instantiation by factory method*

```php
<?php

class SomeClass
{
    static function create()
    {
        return new static();
    }

    private function __construct()
    {
    }
}

$someObject = SomeClass::create();

print("Object:\n");
var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Object:
object(SomeClass)#1 (0) {
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_instantiation_by_factory_method.php)

When *assigning* an already created *instance* of a *class* to a new *variable*, the new *variable* will access the same *instance* as the *object* that was assigned. This behaviour is the same when *passing* *instances* to a *function*. A *copy* of an already created *object* can be made by *cloning* it.

*Example: Object assignment*

```php
<?php
class SimpleClass {
    public string $var;
}

$instance = new SimpleClass();

$assigned   =  $instance;
$reference  =& $instance;

$instance->var = '$assigned will have this value';

$instance = null; // $instance and $reference become null

var_dump($instance);
var_dump($reference);
var_dump($assigned);
?>
```

The above example will output:

```
NULL
NULL
object(SimpleClass)#1 (1) {
   ["var"]=>
     string(30) "$assigned will have this value"
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

*Example: Object assigning to the variable, passing to the function and returning by the function*

```php
<?php

class SomeClass
{
}

class OtherClass
{
}

class AnotherClass
{
}

function receivingFunction(object $objectArgument)
{
    print("As function argument\n");
    var_dump($objectArgument);
    print(PHP_EOL);
}

function returningFunction()
{
    return new AnotherClass();
}

$someObject = new SomeClass();

print("As a variable\n");
var_dump($someObject);
print(PHP_EOL);

receivingFunction(new OtherClass);

print("As a function result\n");
var_dump(returningFunction());
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
As a variable
object(SomeClass)#1 (0) {
}

As function argument
object(OtherClass)#2 (0) {
}

As a function result
object(AnotherClass)#2 (0) {
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/object_assignment_passing_and_returning.php)

*Example: Object access*

```php
<?php

class SomeClass
{
    public $someProperty = 'betroot';
}

$someObject = new SomeClass();

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

$someVariable = $someObject;

print("Variable:\n");
print_r($someVariable);
print(PHP_EOL);

$someReference = &$someObject;

print("Reference:\n");
print_r($someObject);
print(PHP_EOL);

$someClone = clone $someObject;

print("Clone:\n");
print_r($someClone);
print(PHP_EOL);

print("Change of variable\n\n");

$someVariable->someProperty = 'carrot';

print("Variable:\n");
print_r($someVariable);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

print("Change of reference\n\n");

$someReference->someProperty = 'parsley';

print("Reference:\n");
print_r($someObject);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

print("Change of clone\n\n");

$someClone->someProperty = 'radish';

print("Clone:\n");
print_r($someClone);
print(PHP_EOL);

print("Object:\n");
print_r($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Object:
SomeClass Object
(
    [someProperty] => betroot
)

Variable:
SomeClass Object
(
    [someProperty] => betroot
)

Reference:
SomeClass Object
(
    [someProperty] => betroot
)

Clone:
SomeClass Object
(
    [someProperty] => betroot
)

Change of variable

Variable:
SomeClass Object
(
    [someProperty] => carrot
)

Object:
SomeClass Object
(
    [someProperty] => carrot
)

Change of reference

Reference:
SomeClass Object
(
    [someProperty] => parsley
)

Object:
SomeClass Object
(
    [someProperty] => parsley
)

Change of clone

Clone:
SomeClass Object
(
    [someProperty] => radish
)

Object:
SomeClass Object
(
    [someProperty] => parsley
)

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/object_access.php)

It is possible to access a member of a newly created object in a single expression:

*Example: Access member of newly created object*

```php
<?php
echo (new DateTime())->format('Y'), PHP_EOL;

// surrounding parentheses are optional as of PHP 8.4.0
echo new DateTime()->format('Y'), PHP_EOL;
?>
```

The above example will output something similar to:

```
2025
2025
```

Note: Prior to PHP 7.1, the arguments are not evaluated if there is no constructor function defined.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.new)

*Example: Class instantiation and immediate instance member access*

```php
<?php

class SomeClass
{
    public $someProperty = 'watermelon';
    private $otherProperty = 'pumpkin';

    function someMethod()
    {
        return $this->otherProperty;
    }
}

$value = (new SomeClass())->someProperty;

print($value . PHP_EOL);

$value = (new SomeClass())->someMethod();

print($value . PHP_EOL);

```

**Result (PHP 8.4)**:

```
watermelon
pumpkin
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_instantiation_and_immediate_instance_member_access.php)

## Readonly classes

>>> `readonly` modifier

As of PHP 8.2.0, a *class* can be marked with the `readonly` *modifier*. Marking a class as *readonly* will add the `readonly` modifier to every declared *property*, and prevent the creation of *dynamic properties*. Moreover, it is impossible to add support for them by using the `AllowDynamicProperties` *attribute*. Attempting to do so will trigger a compile-time error.

```php
<?php
#[\AllowDynamicProperties]
readonly class Foo {
}

// Fatal error: Cannot apply #[AllowDynamicProperties] to readonly class Foo
?>
```

As neither *untyped* nor *static properties* can be marked with the `readonly` modifier, *readonly classes* cannot declare them either:

```php
<?php
readonly class Foo
{
    public $bar;
}

// Fatal error: Readonly property Foo::$bar must have type
?>
```

```php
<?php
readonly class Foo
{
    public static int $bar;
}

// Fatal error: Readonly class Foo cannot declare static properties
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class.readonly)

*Example: Readonly class*

```php
<?php

readonly class SomeReadonlyClass
{
    public int $someProperty;
    public string $otherProperty;

    public function __construct()
    {
        $this->someProperty = 10;
        $this->otherProperty = 'magenta';
    }
}

$someReadonlyObject = new SomeReadonlyClass();

print("Some property: {$someReadonlyObject->someProperty}\n");
print("Some readonly property: {$someReadonlyObject->otherProperty}\n");

```

**Result (PHP 8.4)**:

```
Some property: 10
Some readonly property: magenta
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/readonly_class.php)

A *readonly class* can be extended if, and only if, the *child class* is also a *readonly class*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class.readonly)

*Example: Readonly class inheritance*

```php
<?php

readonly class SomeReadonlyClass
{
    public int $someProperty;
    public string $otherProperty;

    public function __construct()
    {
        $this->someProperty = 10;
        $this->otherProperty = 'magenta';
    }
}

readonly class SomeDerivedClass extends SomeReadonlyClass
{
}

$someReadonlyObject = new SomeDerivedClass();

print("Some property: {$someReadonlyObject->someProperty}\n");
print("Some readonly property: {$someReadonlyObject->otherProperty}\n");

```

**Result (PHP 8.4)**:

```
Some property: 10
Some readonly property: magenta
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/readonly_class_inheritance.php)

## Inheritance

>>> `extends` keyword

A *class* can *inherit* the *constants*, *methods*, and *properties* of another *class* by using the *keyword* `extends` in the *class declaration*. It is not possible to *extend* multiple *classes*; a *class* can only *inherit* from one *base class*.

The *inherited* *constants*, *methods*, and *properties* can be *overridden* by *redeclaring* them with the same *name* *defined* in the *parent class*. However, if the *parent class* has defined a *method* or *constant* as *final*, they may not be *overridden*. It is possible to *access* the *overridden* methods or *static properties* by referencing them with `parent::`.

Note: As of PHP 8.1.0, *constants* may be declared as *final*.

*Example: Simple class inheritance*

```php
<?php
class SimpleClass
{
    function displayVar()
    {
        echo "Parent class\n";
    }
}

class ExtendClass extends SimpleClass
{
    // Redefine the parent method
    function displayVar()
    {
        echo "Extending class\n";
        parent::displayVar();
    }
}

$extended = new ExtendClass();
$extended->displayVar();
?>
```

The above example will output:

```
Extending class
Parent class
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends)

*Example: Class inheritance*

```php
<?php

class BaseClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    static function someStaticMethod()
    {
        return 'kiwi';
    }

    function someMethod()
    {
        return 'melon';
    }

    function otherMethod()
    {
        return 'watermelon';
    }

    function anotherMethod()
    {
        return 'avocado';
    }
}

class DerivedClass extends BaseClass
{
    public const OTHER_CONSTANT = 'potato';
    public static $otherStaticProperty = 'tomato';
    public $otherProperty = 'cucumber';

    function otherMethod()
    {
        return 'radish';
    }

    function anotherMethod()
    {
        return parent::anotherMethod();
    }
}

$someObject = new BaseClass();

print("Base class:\n\n");
print('Some constant: ' . BaseClass::SOME_CONSTANT . PHP_EOL);
print('Some static property: ' . BaseClass::$someStaticProperty . PHP_EOL);
print("Some property: {$someObject->someProperty}\n");
print(PHP_EOL);
print("Some method result: {$someObject->someMethod()}\n");
print("Other method result: {$someObject->otherMethod()}\n");
print("Another method result: {$someObject->anotherMethod()}\n");
print(PHP_EOL);

$otherObject = new DerivedClass();

print("Derived class:\n\n");
print('Some constant: ' . DerivedClass::SOME_CONSTANT . PHP_EOL);
print('Some static property: ' . DerivedClass::$someStaticProperty . PHP_EOL);
print("Some property: {$otherObject->someProperty}\n");
print(PHP_EOL);
print('Other constant: ' . DerivedClass::OTHER_CONSTANT . PHP_EOL);
print('Other static property: ' . DerivedClass::$otherStaticProperty . PHP_EOL);
print("Some property: {$otherObject->otherProperty}\n");
print(PHP_EOL);
print("Some method result: {$otherObject->someMethod()}\n");
print("Other method result: {$otherObject->otherMethod()}\n");
print("Another method result: {$otherObject->anotherMethod()}\n");
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Base class:

Some constant: grapefruit
Some static property: lemon
Some property: orange

Some method result: melon
Other method result: watermelon
Another method result: avocado

Derived class:

Some constant: grapefruit
Some static property: lemon
Some property: orange

Other constant: potato
Other static property: tomato
Some property: cucumber

Some method result: melon
Other method result: radish
Another method result: avocado

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_inheritance.php)

### Class inheritance and method signature compatibility rules

When *overriding a method*, its *signature* must be compatible with the *parent method*. Otherwise, a fatal error is emitted, or, prior to PHP 8.0.0, an `E_WARNING` level error is generated. A *signature* is compatible if it respects the *variance rules*, makes a mandatory *parameter* optional, adds only optional new *parameters* and doesn't restrict but only relaxes the *visibility*. This is known as the *Liskov Substitution Principle*, or *LSP* for short. The *constructor*, and *private methods* are exempt from these *signature compatibility rules*, and thus won't emit a fatal error in case of a *signature* mismatch.

*Example: Compatible child methods*

```php
<?php

class Base
{
    public function foo(int $a) {
        echo "Valid\n";
    }
}

class Extend1 extends Base
{
    function foo(int $a = 5)
    {
        parent::foo($a);
    }
}

class Extend2 extends Base
{
    function foo(int $a, $b = 5)
    {
        parent::foo($a);
    }
}

$extended1 = new Extend1();
$extended1->foo();
$extended2 = new Extend2();
$extended2->foo(1);
```

The above example will output:

```
Valid
Valid
```

The following examples demonstrate that a *child method* which removes a *parameter*, or makes an optional *parameter* mandatory, is not compatible with the parent method.

*Example: Fatal error when a child method removes a parameter*

```php
<?php

class Base
{
    public function foo(int $a = 5) {
        echo "Valid\n";
    }
}

class Extend extends Base
{
    function foo()
    {
        parent::foo(1);
    }
}
```

Output of the above example in PHP 8 is similar to:

```
Fatal error: Declaration of Extend::foo() must be compatible with Base::foo(int $a = 5) in /in/evtlq on line 13
```

*Example: Fatal error when a child method makes an optional parameter mandatory*

```php
<?php

class Base
{
    public function foo(int $a = 5) {
        echo "Valid\n";
    }
}

class Extend extends Base
{
    function foo(int $a)
    {
        parent::foo($a);
    }
}
```

Output of the above example in PHP 8 is similar to:

```
Fatal error: Declaration of Extend::foo(int $a) must be compatible with Base::foo(int $a = 5) in /in/qJXVC on line 13
```

Warning

Renaming a method's *parameter* in a *child class* is not a *signature incompatibility*. However, this is discouraged as it will result in a runtime `Error` if *named arguments* are used.

*Example: Error when using named arguments and parameters were renamed in a child class*

```php
<?php

class A {
    public function test($foo, $bar) {}
}

class B extends A {
    public function test($a, $b) {}
}

$obj = new B;

// Pass parameters according to A::test() contract
$obj->test(foo: "foo", bar: "bar"); // ERROR!
```

The above example will output something similar to:

```
Fatal error: Uncaught Error: Unknown named parameter $foo in /in/XaaeN:14
Stack trace:
#0 {main}
  thrown in /in/XaaeN on line 14
```

*Exapmle: Class inheritance and signature compatibility*

```php
<?php

class Flower
{
    private const STAMP = '*';

    public function bloom(int $quantity)
    {
        $blossoms = '';

        for ($i = 0; $i < $quantity; $i++) {
            $blossoms .= static::STAMP;
        }

        return $blossoms;
    }
}

class Rose extends Flower
{
    protected const STAMP = '@';

    public function bloom(int $quantity = 3): string
    {
        return parent::bloom($quantity);
    }
}

class RoseBush extends Rose
{
    public function bloom(int $columns = 3, int $rows = 3): string
    {
        $blossoms = '';

        for ($i = 0; $i < $rows; $i++) {
            $blossoms .= Rose::bloom($columns);

            if ($i < $rows - 1) {
                $blossoms .= PHP_EOL;
            }
        }

        return $blossoms;
    }
}

function garden(Flower $flower, int $number)
{
    print($flower->bloom($number) . PHP_EOL . PHP_EOL);
}

$flower = new Flower();
$rose = new Rose();
$bush = new RoseBush();

garden($flower, 3);
garden($rose, 4);
garden($bush, 5);

```

**Result (PHP 8.4)**:

```
***

@@@@

@@@@@
@@@@@
@@@@@

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_inheritance_and_method_signature_compatibility.php)

## Class name resolution

>>> `::class`

The *class keyword* is also used for *class name resolution*. To obtain the *fully qualified name* of a class `ClassName` use `ClassName::class`. This is particularly useful with *namespaced classes*.

*Example: Class name resolution*

```php
<?php
namespace NS {
    class ClassName {
    }

    echo ClassName::class;
}
?>
```

The above example will output:

```
NS\ClassName
```

Note:

The *class name* resolution using `::class` is a *compile time* transformation. That means at the time the *class name string* is created no *autoloading* has happened yet. As a consequence, *class names* are expanded even if the *class* does not exist. No error is issued in that case.

*Example: Missing class name resolution*

```php
<?php
print Does\Not\Exist::class;
?>
```

The above example will output:

```
Does\Not\Exist
```

As of PHP 8.0.0, `::class` may also be used on *objects*. This resolution happens at *runtime*, not *compile time*. Its effect is the same as calling `get_class()` on the *object*.

*Example: Object name resolution*

```php
<?php
namespace NS {
    class ClassName {
    }

    $c = new ClassName();
    print $c::class;
}
?>
```

The above example will output:

```
NS\ClassName
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class.class)

*Example: Class name resolution*

```php
<?php

namespace SomeNamespace;

class SomeClass
{
}

print(SomeClass::class . PHP_EOL);

```

**Result (PHP 8.4)**:

```
SomeNamespace\SomeClass
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_name_resolution.php)

[▵ Up](#classes)
[⌂ Home](../../../README.md)
[▲ Previous: Fibers](../../fibers/fibers.md)
[▼ Next: Class components](./class_components.md)
