[⌂ Home](../../../README.md)
[▲ Previous: Objects](./objects.md)
[▼ Next: Anonymous classes](./anonymous_classes.md)

# Inheritance

## Definition

> In *object-oriented programming*, **inheritance** is the mechanism of basing an *object* or *class* upon another *object* (***prototype-based inheritance***) or *class* (***class-based inheritance***), retaining similar *implementation*. It is also defined as *deriving* new classes (*sub classes*) from existing ones such as *super class* or *base class* and then forming them into a *hierarchy of classes*. In most *class-based object-oriented languages* like C++, an *object* created through inheritance, a *child object*, acquires all the properties and behaviors of the *parent object*, with the exception of: *constructors*, *destructors*, *overloaded operators* and *friend functions* of the *base class*. *Inheritance* allows programmers to create *classes* that are built upon existing *classes*, to specify a new *implementation* while maintaining the same *behaviors* (realizing an *interface*), to reuse code and to independently extend original software via *public classes* and *interfaces*. The relationships of *objects* or *classes* through *inheritance* give rise to a directed acyclic graph.
>
> An *inherited class* is called a *subclass* of its *parent class* or *super class*. The term *inheritance* is loosely used for both *class-based* and *prototype-based programming*, but in narrow use the term is reserved for *class-based programming* (one *class* inherits from another), with the corresponding technique in *prototype-based programming* being instead called *delegation* (one *object* delegates to another). Class-modifying inheritance patterns can be pre-defined according to simple network interface parameters such that inter-language compatibility is preserved.

-- [Wikipedia](https://en.wikipedia.org/wiki/Inheritance_(object-oriented_programming))

[PHP supports class-based inheritance. -- KK]

## Description

***Inheritance*** is a well-established programming principle, and PHP makes use of this principle in its *object model*. This principle will affect the way many *classes* and *objects* relate to one another.

For example, when *extending* a *class*, the *subclass* *inherits* all of the *public* and *protected methods*, *properties* and *constants* from the *parent class*. Unless a *class* *overrides* those *methods*, they will retain their original functionality.

This is useful for *defining* and *abstracting* functionality, and permits the *implementation* of additional functionality in similar *objects* without the need to *reimplement* all of the shared functionality.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

*Example: Inheritance example*

```php
<?php

class Foo
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL;
    }

    public function printPHP()
    {
        echo 'PHP is great.' . PHP_EOL;
    }
}

class Bar extends Foo
{
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL;
    }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('baz'); // Output: 'Foo: baz'
$foo->printPHP();       // Output: 'PHP is great'
$bar->printItem('baz'); // Output: 'Bar: baz'
$bar->printPHP();       // Output: 'PHP is great'

?>
```

Output of the above example in PHP 8.5.0:

```
Foo: baz
PHP is great.
Bar: baz
PHP is great.
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

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

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'public constant';
    protected const SOME_PROTECTED_CONSTANT = 'protected constant';
    private const SOME_PRIVATE_CONSTANT = 'private constant';

    public $somePublicProperty = 'public property';
    protected $someProtectedProperty = 'protected property';
    private $somePrivateProperty = 'private property';

    public function somePublicMethod()
    {
        return 'public method';
    }

    protected function someProtectedMethod()
    {
        return 'protected method';
    }

    private function somePrivateMethod()
    {
        return 'private method';
    }

    public function someMethod()
    {
        print(
            '# ' . __METHOD__
            . "\n\n* private:\n"
            . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            . $this->somePrivateProperty . PHP_EOL
            . $this->somePrivateMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function otherMethod()
    {
        $this->someMethod();
        print(
            '#' . __METHOD__
            . "\n\n* protected:\n"
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print(
    "# Global scope:\n\n"
    . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
    . $someObject->somePublicProperty . PHP_EOL
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);

$someObject->otherMethod();

```

**Result (PHP 8.4)**:

```
# Global scope:

public constant
public property
public method

# SomeBaseClass::someMethod

* private:
private constant
private property
private method

#SomeDerivedClass::otherMethod

* protected:
protected constant
protected property
protected method

* public:
public constant
public property
public method

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_inheritance.php)

## Extending class

>>> `extends` keyword

A *class* can *inherit* the *constants*, *methods*, and *properties* of another *class* by using the *keyword* `extends` in the *class declaration*. It is not possible to *extend* multiple *classes*; a *class* can only *inherit* from one *base class*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends)

*Example: Extending class*

```php
<?php

class SomeClass
{
    public string $someProperty = 'base';
}

class OtherClass extends SomeClass
{
    public string $otherProperty = 'derived';
}

$someObject = new OtherClass();

print('Class: ' . get_class($someObject) . PHP_EOL);
print('Base class: ' . get_parent_class($someObject) . PHP_EOL);
print("Base class property: {$someObject->someProperty}\n");
print("Derived class property: {$someObject->otherProperty}\n");

```

**Result (PHP 8.4)**:

```
Class: OtherClass
Base class: SomeClass
Base class property: base
Derived class property: derived
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/extending_class.php)

Note:

Unless *autoloading* is used, the *classes* must be *defined* before they are used. If a *class* *extends* another, then the *parent class* must be *declared* before the *child class* structure. This rule applies to *classes* that *inherit* other *classes* and *interfaces*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

## Base and derived class

*Example: Base and derived class*

```php
<?php

class Mammal
{
    public string $classTaxon = "Mammalia";
}

class Fox extends Mammal
{
    public string $speciesTaxon = "Vulpes vulpes";
    public string $name;

    public function show() : void
    {
        print("Hi, my name is {$this->name}.\n"
            . "Class: {$this->classTaxon}\n"
            . "Species: {$this->speciesTaxon}\n"
        );
    }
}

$foxFerdinand = new Fox();

$foxFerdinand->name = "Ferdinand";
$foxFerdinand->show();

```

**Result (PHP 8.4)**:

```
Hi, my name is Ferdinand.
Class: Mammalia
Species: Vulpes vulpes
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/base_and_derived_class.php)

## Members visibility

*Private methods* of a *parent class* are not accessible to a *child class*. As a result, *child classes* may reimplement a *private method* themselves without regard for normal inheritance rules. Prior to PHP 8.0.0, however, *final* and *static* restrictions were applied to *private methods*. As of PHP 8.0.0, the only *private method* restriction that is enforced is *private final constructors*, as that is a common way to "disable" the *constructor* when using *static factory methods* instead.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

*Example: Class inheritance and members visibility*

```php
<?php

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'public';
    protected const SOME_PROTECTED_CONSTANT = 'protected';
    private const SOME_PRIVATE_CONSTANT = 'private';

    public $somePublicProperty = 'public';
    protected $someProtectedProperty = 'protected';
    private $somePrivateProperty = 'private';

    public function somePublicMethod()
    {
        return 'public';
    }

    protected function someProtectedMethod()
    {
        return 'protected';
    }

    private function somePrivateMethod()
    {
        return 'private';
    }

    public function someMethod()
    {
        print(
            __METHOD__
            . "\n* constants:\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* properties:\n"
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . $this->somePrivateProperty . PHP_EOL
            . "\n* methods:\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }

    public function anotherMethod(): void
    {
        print(__METHOD__ . PHP_EOL);
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    function otherMethod()
    {
        print(
            __METHOD__
            . "\n* constants:\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* properties:\n"
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . "\n* methods:\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function anotherMethod(): void
    {
        parent::anotherMethod();
        print(__METHOD__ . PHP_EOL);
    }
}

$someObject = new SomeDerivedClass();

print(
    "# Global scope:\n"
    . "\n* constants:\n"
    . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
    . "\n* properties:\n"
    . $someObject->somePublicProperty . PHP_EOL
    . "\n* methods:\n"
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);

$someObject->someMethod();
$someObject->otherMethod();
$someObject->anotherMethod();
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
# Global scope:

* constants:
public

* properties:
public

* methods:
public

SomeBaseClass::someMethod
* constants:
public
protected
private

* properties:
public
protected
private

* methods:
public
protected
private

SomeDerivedClass::otherMethod
* constants:
public
protected

* properties:
public
protected

* methods:
public
protected

SomeBaseClass::anotherMethod
SomeDerivedClass::anotherMethod

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_inheritance_and_members_visibility.php)

*Example: Class members visibility modifiers*

```php
<?php

class Mammal
{
    public bool $isDomesticated;

    protected bool $hasTail;

    private bool $isMilkFeeded = true;
    private string $classTaxon = "Mammalia";
}

class Fox extends Mammal
{
    public string $name;

    public function __construct()
    {
        $this->hasTail = true;
        $this->isDomesticated = false;
    }

    public function show() : void
    {
        print("Hi, my name is {$this->name}\n"
            . "Species: {$this->speciesTaxon}\n"
            . "Do I have tail? {$this->hasTail}\n"
            . "Do I have fur? {$this->hasFur}\n"
            . "Am I domesticated? {$this->isDomesticated}\n\n"
        );
    }

    private bool $hasFur = true;
    private string $speciesTaxon = "Vulpes vulpes";
}

class UrbanFox extends Fox
{
    public function display() : void
    {
        print("Hi, my name is {$this->name}\n"
            . "Do I have tail? {$this->hasTail}\n"
            . "Am I domesticated? {$this->isDomesticated}\n\n"
        );
    }
}

$foxFerdinand = new Fox();

$foxFerdinand->name = "Ferdinand";
$foxFerdinand->isDomesticated = true;

$foxFerdinand->show();

print("Hi, my name is {$foxFerdinand->name}\n"
    . "Am I domesticated? {$foxFerdinand->isDomesticated}\n\n"
);

$foxMelody = new UrbanFox();

$foxMelody->name = "Melody";

$foxMelody->display();

```

**Result (PHP 8.4)**:

```
Hi, my name is Ferdinand
Species: Vulpes vulpes
Do I have tail? 1
Do I have fur? 1
Am I domesticated? 1

Hi, my name is Ferdinand
Am I domesticated? 1

Hi, my name is Melody
Do I have tail? 1
Am I domesticated?

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_members_visibility_modifiers.php)

## Members access

### Class constant access

#### Class constant access

*Example: Class constant access with visibility*

```php
<?php

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'base public';
    protected const SOME_PROTECTED_CONSTANT = 'base protected';
    private const SOME_PRIVATE_CONSTANT = 'base private';

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::SOME_PRIVATE_CONSTANT : ' . SomeBaseClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::SOME_PRIVATE_CONSTANT : ' . SomeBaseClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public static function derivedStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'derived public';
    protected const SOME_PROTECTED_CONSTANT = 'derived protected';
    private const SOME_PRIVATE_CONSTANT = 'derived shadowed private'; // It's not overriding but rather shadowing!
    // It's completly new constant - very own constant of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public static function derivedOverridingStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PRIVATE_CONSTANT : ' . (__CLASS__)::SOME_PRIVATE_CONSTANT . PHP_EOL
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT : ' . SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseStaticContext();
$someObject->baseDynamicContext();
$someObject->derivedStaticContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseStaticContext();
$otherObject->baseDynamicContext();
$otherObject->derivedOverridingStaticContext();
$otherObject->derivedOverridingDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseStaticContext

* private:

SomeBaseClass::SOME_PRIVATE_CONSTANT : base private
(__CLASS__)::SOME_PRIVATE_CONSTANT : base private
self::SOME_PRIVATE_CONSTANT : base private

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : base protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
(__CLASS__)::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : base public

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::SOME_PRIVATE_CONSTANT : base private
(__CLASS__)::SOME_PRIVATE_CONSTANT : base private
self::SOME_PRIVATE_CONSTANT : base private

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : base protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
(__CLASS__)::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : base public

SomeDerivedClass::derivedStaticContext

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
parent::SOME_PROTECTED_CONSTANT : base protected
SomeDerivedClass::SOME_PROTECTED_CONSTANT : base protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : base protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
parent::SOME_PUBLIC_CONSTANT : base public
SomeDerivedClass::SOME_PUBLIC_CONSTANT : base public
(__CLASS__)::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : base public

SomeDerivedClass::derivedDynamicContext

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
parent::SOME_PROTECTED_CONSTANT : base protected
SomeDerivedClass::SOME_PROTECTED_CONSTANT : base protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : base protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
parent::SOME_PUBLIC_CONSTANT : base public
SomeDerivedClass::SOME_PUBLIC_CONSTANT : base public
(__CLASS__)::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseStaticContext

* private:

SomeBaseClass::SOME_PRIVATE_CONSTANT : base private
(__CLASS__)::SOME_PRIVATE_CONSTANT : base private
self::SOME_PRIVATE_CONSTANT : base private

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : derived protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
(__CLASS__)::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : derived public

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::SOME_PRIVATE_CONSTANT : base private
(__CLASS__)::SOME_PRIVATE_CONSTANT : base private
self::SOME_PRIVATE_CONSTANT : base private

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : derived protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
(__CLASS__)::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : derived public

SomeDerivedOverridingClass::derivedOverridingStaticContext

* private:

SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT : derived shadowed private
(__CLASS__)::SOME_PRIVATE_CONSTANT : derived shadowed private
self::SOME_PRIVATE_CONSTANT : derived shadowed private
static::SOME_PRIVATE_CONSTANT : derived shadowed private

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
parent::SOME_PROTECTED_CONSTANT : base protected
SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT : derived protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : derived protected
self::SOME_PROTECTED_CONSTANT : derived protected
static::SOME_PROTECTED_CONSTANT : derived protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
parent::SOME_PUBLIC_CONSTANT : base public
SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT : derived public
(__CLASS__)::SOME_PUBLIC_CONSTANT : derived public
self::SOME_PUBLIC_CONSTANT : derived public
static::SOME_PUBLIC_CONSTANT : derived public

SomeDerivedOverridingClass::derivedOverridingDynamicContext

* private:

SomeDerivedOverridingClass::SOME_PRIVATE_CONSTANT : derived shadowed private
(__CLASS__)::SOME_PRIVATE_CONSTANT : derived shadowed private
self::SOME_PRIVATE_CONSTANT : derived shadowed private
static::SOME_PRIVATE_CONSTANT : derived shadowed private

* protected:

SomeBaseClass::SOME_PROTECTED_CONSTANT : base protected
parent::SOME_PROTECTED_CONSTANT : base protected
SomeDerivedOverridingClass::SOME_PROTECTED_CONSTANT : derived protected
(__CLASS__)::SOME_PROTECTED_CONSTANT : derived protected
self::SOME_PROTECTED_CONSTANT : derived protected
static::SOME_PROTECTED_CONSTANT : derived protected

* public:

SomeBaseClass::SOME_PUBLIC_CONSTANT : base public
parent::SOME_PUBLIC_CONSTANT : base public
SomeDerivedOverridingClass::SOME_PUBLIC_CONSTANT : derived public
(__CLASS__)::SOME_PUBLIC_CONSTANT : derived public
self::SOME_PUBLIC_CONSTANT : derived public
static::SOME_PUBLIC_CONSTANT : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_constant_access_with_visibility.php

#### Class final constant access

*Example: Class final constant access with visibility*

```php
<?php

class SomeBaseClass
{
    final public const SOME_FINAL_PUBLIC_CONSTANT = 'base final public const';
    final protected const SOME_FINAL_PROTECTED_CONSTANT = 'base final protected const';

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public static function derivedStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PROTECTED_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PUBLIC_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }

    public static function derivedDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PROTECTED_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PROTECTED_CONSTANT : ' . self::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PROTECTED_CONSTANT : ' . static::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'parent::SOME_FINAL_PUBLIC_CONSTANT : ' . parent::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . 'SomeDerivedClass::SOME_FINAL_PUBLIC_CONSTANT : ' . SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT . PHP_EOL
            . '(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : ' . (__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_FINAL_PUBLIC_CONSTANT : ' . self::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_FINAL_PUBLIC_CONSTANT : ' . static::SOME_FINAL_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseStaticContext();
$someObject->baseDynamicContext();
$someObject->derivedStaticContext();
$someObject->derivedDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseStaticContext

* protected:

SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
self::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
static::SOME_FINAL_PROTECTED_CONSTANT : base final protected const

* public:

SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : base final public const
(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : base final public const
self::SOME_FINAL_PUBLIC_CONSTANT : base final public const
static::SOME_FINAL_PUBLIC_CONSTANT : base final public const

SomeBaseClass::baseDynamicContext

* protected:

SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
self::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
static::SOME_FINAL_PROTECTED_CONSTANT : base final protected const

* public:

SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : base final public const
(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : base final public const
self::SOME_FINAL_PUBLIC_CONSTANT : base final public const
static::SOME_FINAL_PUBLIC_CONSTANT : base final public const

SomeDerivedClass::derivedStaticContext

* protected:

SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
parent::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
self::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
static::SOME_FINAL_PROTECTED_CONSTANT : base final protected const

* public:

SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : base final public const
parent::SOME_FINAL_PUBLIC_CONSTANT : base final protected const
SomeDerivedClass::SOME_FINAL_PUBLIC_CONSTANT : base final protected const
(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : base final public const
self::SOME_FINAL_PUBLIC_CONSTANT : base final public const
static::SOME_FINAL_PUBLIC_CONSTANT : base final public const

SomeDerivedClass::derivedDynamicContext

* protected:

SomeBaseClass::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
parent::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
SomeDerivedClass::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
(__CLASS__)::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
self::SOME_FINAL_PROTECTED_CONSTANT : base final protected const
static::SOME_FINAL_PROTECTED_CONSTANT : base final protected const

* public:

SomeBaseClass::SOME_FINAL_PUBLIC_CONSTANT : base final public const
parent::SOME_FINAL_PUBLIC_CONSTANT : base final protected const
SomeDerivedClass::SOME_FINAL_PUBLIC_CONSTANT : base final protected const
(__CLASS__)::SOME_FINAL_PUBLIC_CONSTANT : base final public const
self::SOME_FINAL_PUBLIC_CONSTANT : base final public const
static::SOME_FINAL_PUBLIC_CONSTANT : base final public const

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_final_constant_access_with_visibility.php)

### Property access

#### Dynamic property access

*Example: Class property access with visibility*

```php
<?php

class SomeBaseClass
{
    public $somePublicProperty = 'base public';
    protected $someProtectedProperty = 'base protected';
    private $somePrivateProperty = 'base private';

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public $somePublicProperty = 'derived public';
    protected $someProtectedProperty = 'derived protected';
    private $somePrivateProperty = 'derived shadowed private'; // It's not overriding but rather shadowing!
    // It's completly new property - very own property of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseDynamicContext();
$otherObject->derivedOverridingDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseDynamicContext

* private:

$this->somePrivateProperty : base private

* protected:

$this->someProtectedProperty : base protected

* public:

$this->somePublicProperty : base public

SomeDerivedClass::derivedDynamicContext

* protected:

$this->someProtectedProperty : base protected

* public:

$this->somePublicProperty : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseDynamicContext

* private:

$this->somePrivateProperty : base private

* protected:

$this->someProtectedProperty : derived protected

* public:

$this->somePublicProperty : derived public

SomeDerivedOverridingClass::derivedOverridingDynamicContext

* private:

$this->somePrivateProperty : derived shadowed private

* protected:

$this->someProtectedProperty : derived protected

* public:

$this->somePublicProperty : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_property_access_with_visibility.php)

#### Static property access

*Example: Class static property access with visibility*

```php
<?php

class SomeBaseClass
{
    public static $somePublicProperty = 'base static public';
    protected static $someProtectedProperty = 'base static protected';
    private static $somePrivateProperty = 'base static private';

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::$somePrivateProperty : ' . SomeBaseClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::$somePrivateProperty : ' . SomeBaseClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public static function derivedStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedClass::$someProtectedProperty : ' . SomeDerivedClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedClass::$somePublicProperty : ' . SomeDerivedClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedClass::$someProtectedProperty : ' . SomeDerivedClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedClass::$somePublicProperty : ' . SomeDerivedClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public static $somePublicProperty = 'derived static public';
    protected static $someProtectedProperty = 'derived static protected';
    private static $somePrivateProperty = 'derived shadowed static private'; // It's not overriding but rather shadowing!
    // It's completly new property - very own property of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public static function derivedOverridingStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::$somePrivateProperty : ' . SomeDerivedOverridingClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$someProtectedProperty : ' . SomeDerivedOverridingClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$somePublicProperty : ' . SomeDerivedOverridingClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedOverridingDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::$somePrivateProperty : ' . SomeDerivedOverridingClass::$somePrivateProperty . PHP_EOL
            . '(__CLASS__)::$somePrivateProperty : ' . (__CLASS__)::$somePrivateProperty . PHP_EOL
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::$someProtectedProperty : ' . SomeBaseClass::$someProtectedProperty . PHP_EOL
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$someProtectedProperty : ' . SomeDerivedOverridingClass::$someProtectedProperty . PHP_EOL
            . '(__CLASS__)::$someProtectedProperty : ' . (__CLASS__)::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::$somePublicProperty : ' . SomeBaseClass::$somePublicProperty . PHP_EOL
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'SomeDerivedOverridingClass::$somePublicProperty : ' . SomeDerivedOverridingClass::$somePublicProperty . PHP_EOL
            . '(__CLASS__)::$somePublicProperty : ' . (__CLASS__)::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseStaticContext();
$someObject->baseDynamicContext();
$someObject->derivedStaticContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseStaticContext();
$otherObject->baseDynamicContext();
$otherObject->derivedOverridingStaticContext();
$otherObject->derivedOverridingDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseStaticContext

* private:

SomeBaseClass::$somePrivateProperty : base static private
(__CLASS__)::$somePrivateProperty : base static private
self::$somePrivateProperty : base static private

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
(__CLASS__)::$someProtectedProperty : base static protected
self::$someProtectedProperty : base static protected
static::$someProtectedProperty : base static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
(__CLASS__)::$somePublicProperty : base static public
self::$somePublicProperty : base static public
static::$somePublicProperty : base static public

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::$somePrivateProperty : base static private
(__CLASS__)::$somePrivateProperty : base static private
self::$somePrivateProperty : base static private

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
(__CLASS__)::$someProtectedProperty : base static protected
self::$someProtectedProperty : base static protected
static::$someProtectedProperty : base static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
(__CLASS__)::$somePublicProperty : base static public
self::$somePublicProperty : base static public
static::$somePublicProperty : base static public

SomeDerivedClass::derivedStaticContext

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
parent::$someProtectedProperty : base static protected
SomeDerivedClass::$someProtectedProperty : base static protected
(__CLASS__)::$someProtectedProperty : base static protected
self::$someProtectedProperty : base static protected
static::$someProtectedProperty : base static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
parent::$somePublicProperty : base static public
SomeDerivedClass::$somePublicProperty : base static public
(__CLASS__)::$somePublicProperty : base static public
self::$somePublicProperty : base static public
static::$somePublicProperty : base static public

SomeDerivedClass::derivedDynamicContext

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
parent::$someProtectedProperty : base static protected
SomeDerivedClass::$someProtectedProperty : base static protected
(__CLASS__)::$someProtectedProperty : base static protected
self::$someProtectedProperty : base static protected
static::$someProtectedProperty : base static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
parent::$somePublicProperty : base static public
SomeDerivedClass::$somePublicProperty : base static public
(__CLASS__)::$somePublicProperty : base static public
self::$somePublicProperty : base static public
static::$somePublicProperty : base static public

# SomeDerivedOverridingClass:

SomeBaseClass::baseStaticContext

* private:

SomeBaseClass::$somePrivateProperty : base static private
(__CLASS__)::$somePrivateProperty : base static private
self::$somePrivateProperty : base static private

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
(__CLASS__)::$someProtectedProperty : base static protected
self::$someProtectedProperty : base static protected
static::$someProtectedProperty : derived static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
(__CLASS__)::$somePublicProperty : base static public
self::$somePublicProperty : base static public
static::$somePublicProperty : derived static public

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::$somePrivateProperty : base static private
(__CLASS__)::$somePrivateProperty : base static private
self::$somePrivateProperty : base static private

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
(__CLASS__)::$someProtectedProperty : base static protected
self::$someProtectedProperty : base static protected
static::$someProtectedProperty : derived static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
(__CLASS__)::$somePublicProperty : base static public
self::$somePublicProperty : base static public
static::$somePublicProperty : derived static public

SomeDerivedOverridingClass::derivedOverridingStaticContext

* private:

SomeDerivedOverridingClass::$somePrivateProperty : derived shadowed static private
(__CLASS__)::$somePrivateProperty : derived shadowed static private
self::$somePrivateProperty : derived shadowed static private
static::$somePrivateProperty : derived shadowed static private

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
parent::$someProtectedProperty : base static protected
SomeDerivedOverridingClass::$someProtectedProperty : derived static protected
(__CLASS__)::$someProtectedProperty : derived static protected
self::$someProtectedProperty : derived static protected
static::$someProtectedProperty : derived static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
parent::$somePublicProperty : base static public
SomeDerivedOverridingClass::$somePublicProperty : derived static public
(__CLASS__)::$somePublicProperty : derived static public
self::$somePublicProperty : derived static public
static::$somePublicProperty : derived static public

SomeDerivedOverridingClass::derivedOverridingDynamicContext

* private:

SomeDerivedOverridingClass::$somePrivateProperty : derived shadowed static private
(__CLASS__)::$somePrivateProperty : derived shadowed static private
self::$somePrivateProperty : derived shadowed static private
static::$somePrivateProperty : derived shadowed static private

* protected:

SomeBaseClass::$someProtectedProperty : base static protected
parent::$someProtectedProperty : base static protected
SomeDerivedOverridingClass::$someProtectedProperty : derived static protected
(__CLASS__)::$someProtectedProperty : derived static protected
self::$someProtectedProperty : derived static protected
static::$someProtectedProperty : derived static protected

* public:

SomeBaseClass::$somePublicProperty : base static public
parent::$somePublicProperty : base static public
SomeDerivedOverridingClass::$somePublicProperty : derived static public
(__CLASS__)::$somePublicProperty : derived static public
self::$somePublicProperty : derived static public
static::$somePublicProperty : derived static public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_static_property_access_with_visibility.php)

#### Readonly property access

*Example: Class readonly property access with visibility*

```php
<?php

class SomeBaseClass
{
    public function __construct(
        public readonly string $somePublicProperty = 'base readonly public',
        protected readonly string $someProtectedProperty = 'base readonly protected',
        private readonly string $somePrivateProperty = 'base readonly private',
    ) {
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    private readonly string $somePrivateProperty; // It's not overriding but rather shadowing!
    // It's completly new property - very own property of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function __construct()
    {
        // It mus be called for initialize properties before reading
        // from the derived class object calling base class method.
        parent::__construct(
            'derived readonly public',
            'derived readonly protected',
            'derived readonly private',
        );

        $this->somePrivateProperty = 'derived shadowed readonly private';
    }

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseDynamicContext();
$otherObject->derivedOverridingDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseDynamicContext

* private:

$this->somePrivateProperty : base readonly private

* protected:

$this->someProtectedProperty : base readonly protected

* public:

$this->somePublicProperty : base readonly public

SomeDerivedClass::derivedDynamicContext

* protected:

$this->someProtectedProperty : base readonly protected

* public:

$this->somePublicProperty : base readonly public

# SomeDerivedOverridingClass:

SomeBaseClass::baseDynamicContext

* private:

$this->somePrivateProperty : derived readonly private

* protected:

$this->someProtectedProperty : derived readonly protected

* public:

$this->somePublicProperty : derived readonly public

SomeDerivedOverridingClass::derivedOverridingDynamicContext

* private:

$this->somePrivateProperty : derived shadowed readonly private

* protected:

$this->someProtectedProperty : derived readonly protected

* public:

$this->somePublicProperty : derived readonly public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_readonly_property_access_with_visibility.php)

#### Final property access

```php
<?php

class SomeBaseClass
{
    final public $someFinalPublicProperty = 'base final public';
    final protected $someFinalProtectedProperty = 'base final protected';

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someFinalProtectedProperty : ' . $this->someFinalProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->someFinalPublicProperty : ' . $this->someFinalPublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someFinalProtectedProperty : ' . $this->someFinalProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->someFinalPublicProperty : ' . $this->someFinalPublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseDynamicContext

* protected:

$this->someFinalProtectedProperty : base final protected

* public:

$this->someFinalPublicProperty : base final public

SomeDerivedClass::derivedDynamicContext

* protected:

$this->someFinalProtectedProperty : base final protected

* public:

$this->someFinalPublicProperty : base final public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_final_property_access_with_visibility.php)

### Method access

#### Dynamic method access

*Example: Class method access with visibility*

```php
<?php

class SomeBaseClass
{
    public function somePublicMethod()
    {
        return 'base public';
    }

    protected function someProtectedMethod()
    {
        return 'base protected';
    }

    private function somePrivateMethod()
    {
        return 'base private';
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::somePrivateMethod() : ' . SomeBaseClass::somePrivateMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateMethod() : ' . (__CLASS__)::somePrivateMethod() . PHP_EOL
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedMethod() : ' . SomeBaseClass::someProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedMethod() : ' . (__CLASS__)::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicMethod() : ' . SomeBaseClass::somePublicMethod() . PHP_EOL
            . '(__CLASS__)::somePublicMethod() : ' . (__CLASS__)::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedMethod() : ' . SomeBaseClass::someProtectedMethod() . PHP_EOL
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'SomeDerivedClass::someProtectedMethod() : ' . SomeDerivedClass::someProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedMethod() : ' . (__CLASS__)::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicMethod() : ' . SomeBaseClass::somePublicMethod() . PHP_EOL
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'SomeDerivedClass::somePublicMethod() : ' . SomeDerivedClass::somePublicMethod() . PHP_EOL
            . '(__CLASS__)::somePublicMethod() : ' . (__CLASS__)::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public function somePublicMethod()
    {
        return 'derived public';
    }

    protected function someProtectedMethod()
    {
        return 'derived protected';
    }

    private function somePrivateMethod() // It's not overriding but rather shadowing!
    // It's completly new method - very own method of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.
    {
        return 'derived shadowed private';
    }

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::somePrivateMethod() : ' . SomeDerivedOverridingClass::somePrivateMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateMethod() : ' . (__CLASS__)::somePrivateMethod() . PHP_EOL
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedMethod() : ' . SomeBaseClass::someProtectedMethod() . PHP_EOL
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::someProtectedMethod() : ' . SomeDerivedOverridingClass::someProtectedMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedMethod() : ' . (__CLASS__)::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicMethod() : ' . SomeBaseClass::somePublicMethod() . PHP_EOL
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::somePublicMethod() : ' . SomeDerivedOverridingClass::somePublicMethod() . PHP_EOL
            . '(__CLASS__)::somePublicMethod() : ' . (__CLASS__)::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseDynamicContext();
$otherObject->derivedOverridingDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::somePrivateMethod() : base private
(__CLASS__)::somePrivateMethod() : base private
self::somePrivateMethod() : base private
$this->somePrivateMethod() : base private

* protected:

SomeBaseClass::someProtectedMethod() : base protected
(__CLASS__)::someProtectedMethod() : base protected
self::someProtectedMethod() : base protected
static::someProtectedMethod() : base protected
$this->someProtectedMethod() : base protected

* public:

SomeBaseClass::somePublicMethod() : base public
(__CLASS__)::somePublicMethod() : base public
self::somePublicMethod() : base public
static::somePublicMethod() : base public
$this->somePublicMethod() : base public

SomeDerivedClass::derivedDynamicContext

* protected:

SomeBaseClass::someProtectedMethod() : base protected
parent::someProtectedMethod() : base protected
SomeDerivedClass::someProtectedMethod() : base protected
(__CLASS__)::someProtectedMethod() : base protected
self::someProtectedMethod() : base protected
static::someProtectedMethod() : base protected
$this->someProtectedMethod() : base protected

* public:

SomeBaseClass::somePublicMethod() : base public
parent::somePublicMethod() : base public
SomeDerivedClass::somePublicMethod() : base public
(__CLASS__)::somePublicMethod() : base public
self::somePublicMethod() : base public
static::somePublicMethod() : base public
$this->somePublicMethod() : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::somePrivateMethod() : base private
(__CLASS__)::somePrivateMethod() : base private
self::somePrivateMethod() : base private
$this->somePrivateMethod() : base private

* protected:

SomeBaseClass::someProtectedMethod() : base protected
(__CLASS__)::someProtectedMethod() : base protected
self::someProtectedMethod() : base protected
static::someProtectedMethod() : derived protected
$this->someProtectedMethod() : derived protected

* public:

SomeBaseClass::somePublicMethod() : base public
(__CLASS__)::somePublicMethod() : base public
self::somePublicMethod() : base public
static::somePublicMethod() : derived public
$this->somePublicMethod() : derived public

SomeDerivedOverridingClass::derivedOverridingDynamicContext

* private:

SomeDerivedOverridingClass::somePrivateMethod() : derived shadowed private
(__CLASS__)::somePrivateMethod() : derived shadowed private
self::somePrivateMethod() : derived shadowed private
static::somePrivateMethod() : derived shadowed private
$this->somePrivateMethod() : derived shadowed private

* protected:

SomeBaseClass::someProtectedMethod() : base protected
parent::someProtectedMethod() : base protected
SomeDerivedOverridingClass::someProtectedMethod() : derived protected
(__CLASS__)::someProtectedMethod() : derived protected
self::someProtectedMethod() : derived protected
static::someProtectedMethod() : derived protected
$this->someProtectedMethod() : derived protected

* public:

SomeBaseClass::somePublicMethod() : base public
parent::somePublicMethod() : base public
SomeDerivedOverridingClass::somePublicMethod() : derived public
(__CLASS__)::somePublicMethod() : derived public
self::somePublicMethod() : derived public
static::somePublicMethod() : derived public
$this->somePublicMethod() : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_method_access_with_visibility.php)

#### Static method access

*Example: Class method access with visibility*

```php
<?php

class SomeBaseClass
{
    public static function somePublicStaticMethod()
    {
        return 'base public';
    }

    protected static function someProtectedStaticMethod()
    {
        return 'base protected';
    }

    private static function somePrivateStaticMethod()
    {
        return 'base private';
    }

    public static function baseStaticContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::somePrivateStaticMethod() : ' . SomeBaseClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeBaseClass::somePrivateStaticMethod() : ' . SomeBaseClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateStaticMethod() : ' . $this->somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . '$this->somePublicStaticMethod() : ' . $this->somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public static function derivedStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::someProtectedStaticMethod() : ' . SomeDerivedClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::somePublicStaticMethod() : ' . SomeDerivedClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function derivedDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::someProtectedStaticMethod() : ' . SomeDerivedClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedClass::somePublicStaticMethod() : ' . SomeDerivedClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . '$this->somePublicStaticMethod() : ' . $this->somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public static function somePublicStaticMethod()
    {
        return 'derived public';
    }

    protected static function someProtectedStaticMethod()
    {
        return 'derived protected';
    }

    private static function somePrivateStaticMethod()
    {
        return 'derived shadowed private';
    } // It's not overriding but rather shadowing!
    // It's completly new method - very own method of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public static function derivedOverridingStaticContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::somePrivateStaticMethod() : ' . SomeDerivedOverridingClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::someProtectedStaticMethod() : ' . SomeDerivedOverridingClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::somePublicStaticMethod() : ' . SomeDerivedOverridingClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public static function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'SomeDerivedOverridingClass::somePrivateStaticMethod() : ' . SomeDerivedOverridingClass::somePrivateStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePrivateStaticMethod() : ' . (__CLASS__)::somePrivateStaticMethod() . PHP_EOL
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'SomeBaseClass::someProtectedStaticMethod() : ' . SomeBaseClass::someProtectedStaticMethod() . PHP_EOL
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::someProtectedStaticMethod() : ' . SomeDerivedOverridingClass::someProtectedStaticMethod() . PHP_EOL
            . '(__CLASS__)::someProtectedStaticMethod() : ' . (__CLASS__)::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'SomeBaseClass::somePublicStaticMethod() : ' . SomeBaseClass::somePublicStaticMethod() . PHP_EOL
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'SomeDerivedOverridingClass::somePublicStaticMethod() : ' . SomeDerivedOverridingClass::somePublicStaticMethod() . PHP_EOL
            . '(__CLASS__)::somePublicStaticMethod() : ' . (__CLASS__)::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseStaticContext();
$someObject->baseDynamicContext();
$someObject->derivedStaticContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseStaticContext();
$otherObject->baseDynamicContext();
$otherObject->derivedOverridingStaticContext();
$otherObject->derivedOverridingDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseStaticContext

* private:

SomeBaseClass::somePrivateStaticMethod() : base private
(__CLASS__)::somePrivateStaticMethod() : base private
self::somePrivateStaticMethod() : base private

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
(__CLASS__)::someProtectedStaticMethod() : base protected
self::someProtectedStaticMethod() : base protected
static::someProtectedStaticMethod() : base protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
(__CLASS__)::somePublicStaticMethod() : base public
self::somePublicStaticMethod() : base public
static::somePublicStaticMethod() : base public

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::somePrivateStaticMethod() : base private
(__CLASS__)::somePrivateStaticMethod() : base private
self::somePrivateStaticMethod() : base private
$this->somePrivateStaticMethod() : base private

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
(__CLASS__)::someProtectedStaticMethod() : base protected
self::someProtectedStaticMethod() : base protected
static::someProtectedStaticMethod() : base protected
$this->someProtectedStaticMethod() : base protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
(__CLASS__)::somePublicStaticMethod() : base public
self::somePublicStaticMethod() : base public
static::somePublicStaticMethod() : base public
$this->somePublicStaticMethod() : base public

SomeDerivedClass::derivedStaticContext

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
parent::someProtectedStaticMethod() : base protected
SomeDerivedClass::someProtectedStaticMethod() : base protected
(__CLASS__)::someProtectedStaticMethod() : base protected
self::someProtectedStaticMethod() : base protected
static::someProtectedStaticMethod() : base protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
parent::somePublicStaticMethod() : base public
SomeDerivedClass::somePublicStaticMethod() : base public
(__CLASS__)::somePublicStaticMethod() : base public
self::somePublicStaticMethod() : base public
static::somePublicStaticMethod() : base public

SomeDerivedClass::derivedDynamicContext

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
parent::someProtectedStaticMethod() : base protected
SomeDerivedClass::someProtectedStaticMethod() : base protected
(__CLASS__)::someProtectedStaticMethod() : base protected
self::someProtectedStaticMethod() : base protected
static::someProtectedStaticMethod() : base protected
$this->someProtectedStaticMethod() : base protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
parent::somePublicStaticMethod() : base public
SomeDerivedClass::somePublicStaticMethod() : base public
(__CLASS__)::somePublicStaticMethod() : base public
self::somePublicStaticMethod() : base public
static::somePublicStaticMethod() : base public
$this->somePublicStaticMethod() : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseStaticContext

* private:

SomeBaseClass::somePrivateStaticMethod() : base private
(__CLASS__)::somePrivateStaticMethod() : base private
self::somePrivateStaticMethod() : base private

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
(__CLASS__)::someProtectedStaticMethod() : base protected
self::someProtectedStaticMethod() : base protected
static::someProtectedStaticMethod() : derived protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
(__CLASS__)::somePublicStaticMethod() : base public
self::somePublicStaticMethod() : base public
static::somePublicStaticMethod() : derived public

SomeBaseClass::baseDynamicContext

* private:

SomeBaseClass::somePrivateStaticMethod() : base private
(__CLASS__)::somePrivateStaticMethod() : base private
self::somePrivateStaticMethod() : base private
$this->somePrivateStaticMethod() : base private

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
(__CLASS__)::someProtectedStaticMethod() : base protected
self::someProtectedStaticMethod() : base protected
static::someProtectedStaticMethod() : derived protected
$this->someProtectedStaticMethod() : derived protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
(__CLASS__)::somePublicStaticMethod() : base public
self::somePublicStaticMethod() : base public
static::somePublicStaticMethod() : derived public
$this->somePublicStaticMethod() : derived public

SomeDerivedOverridingClass::derivedOverridingStaticContext

* private:

SomeDerivedOverridingClass::somePrivateStaticMethod() : derived shadowed private
(__CLASS__)::somePrivateStaticMethod() : derived shadowed private
self::somePrivateStaticMethod() : derived shadowed private
static::somePrivateStaticMethod() : derived shadowed private

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
parent::someProtectedStaticMethod() : base protected
SomeDerivedOverridingClass::someProtectedStaticMethod() : derived protected
(__CLASS__)::someProtectedStaticMethod() : derived protected
self::someProtectedStaticMethod() : derived protected
static::someProtectedStaticMethod() : derived protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
parent::somePublicStaticMethod() : base public
SomeDerivedOverridingClass::somePublicStaticMethod() : derived public
(__CLASS__)::somePublicStaticMethod() : derived public
self::somePublicStaticMethod() : derived public
static::somePublicStaticMethod() : derived public

SomeDerivedOverridingClass::derivedOverridingDynamicContext

* private:

SomeDerivedOverridingClass::somePrivateStaticMethod() : derived shadowed private
(__CLASS__)::somePrivateStaticMethod() : derived shadowed private
self::somePrivateStaticMethod() : derived shadowed private
static::somePrivateStaticMethod() : derived shadowed private

* protected:

SomeBaseClass::someProtectedStaticMethod() : base protected
parent::someProtectedStaticMethod() : base protected
SomeDerivedOverridingClass::someProtectedStaticMethod() : derived protected
(__CLASS__)::someProtectedStaticMethod() : derived protected
self::someProtectedStaticMethod() : derived protected
static::someProtectedStaticMethod() : derived protected

* public:

SomeBaseClass::somePublicStaticMethod() : base public
parent::somePublicStaticMethod() : base public
SomeDerivedOverridingClass::somePublicStaticMethod() : derived public
(__CLASS__)::somePublicStaticMethod() : derived public
self::somePublicStaticMethod() : derived public
static::somePublicStaticMethod() : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_static_method_access_with_visibility.php)

### Hooks access

A *hook* in a *child class* may access the *parent class's property* using the `parent::$prop` *keyword*, followed by the desired *hook*. For example, `parent::$propName::get()`. It may be read as "access the prop defined on the parent class, and then run its get operation (or set operation, as appropriate).

If not accessed this way, the *parent class's hook* is ignored. This behavior is consistent with how all *methods* work. This also offers a way to access the parent class's storage, if any. If there is no *hook* on the *parent property*, its default get/set behavior will be used. *Hooks* may not access any other *hook* except their own *parent* on their own *property*.

The example above could be rewritten as follows, which would allow for the `Point` class to add its own *set hook* in the future without issues (in the previous example, a *hook* added to the *parent class* would be ignored in the *child*).

*Example: Parent hook access (set)*

```php
<?php
class Point
{
    public int $x;
    public int $y;
}

class PositivePoint extends Point
{
    public int $x {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('Too small');
            }
            parent::$x::set($value);
        }
    }
}
?>
```

An example of overriding only a get hook could be:

*Example: Parent hook access (get)*

```php
<?php
class Strings
{
    public string $val;
}

class CaseFoldingStrings extends Strings
{
    public bool $uppercase = true;

    public string $val {
        get => $this->uppercase
            ? strtoupper(parent::$val::get())
            : strtolower(parent::$val::get());
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks.virtual)

*Example: Class property hook access with visibility*

```php
<?php

class SomeBaseClass
{
    public $somePublicProperty = 'base public' {
        get => $this->somePublicProperty . ' base hook';
    }
    protected $someProtectedProperty = 'base protected' {
        get => $this->someProtectedProperty . ' base hook';
    }
    private $somePrivateProperty = 'base private' {
        get => $this->somePrivateProperty . ' base hook';
    }

    public function baseDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedDynamicContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public $somePublicProperty = 'derived public' {
        get => parent::$somePublicProperty::get() . ' + ' . $this->somePublicProperty . ' derived hook';
    }
    protected $someProtectedProperty = 'derived protected' {
        get => parent::$someProtectedProperty::get() . ' + ' . $this->someProtectedProperty . ' derived hook';
    }
    private $somePrivateProperty = 'derived shadowed private' {
        get => $this->somePrivateProperty . ' derived shadowed hook';
    } // It's not overriding but rather shadowing!
    // It's completly new property hook - very own property hook of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }

}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseDynamicContext();
$someObject->derivedDynamicContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseDynamicContext();
$otherObject->derivedOverridingDynamicContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseDynamicContext

* private:

$this->somePrivateProperty : base private base hook

* protected:

$this->someProtectedProperty : base protected base hook

* public:

$this->somePublicProperty : base public base hook

SomeDerivedClass::derivedDynamicContext

* protected:

$this->someProtectedProperty : base protected base hook

* public:

$this->somePublicProperty : base public base hook

# SomeDerivedOverridingClass:

SomeBaseClass::baseDynamicContext

* private:

$this->somePrivateProperty : base private base hook

* protected:

$this->someProtectedProperty : derived protected base hook + derived protected derived hook

* public:

$this->somePublicProperty : derived public base hook + derived public derived hook

SomeDerivedOverridingClass::derivedOverridingDynamicContext

* private:

$this->somePrivateProperty : derived shadowed private derived shadowed hook

* protected:

$this->someProtectedProperty : derived protected base hook + derived protected derived hook

* public:

$this->somePublicProperty : derived public base hook + derived public derived hook

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_property_hook_access_with_visibility.php)

## Members overriding

The *inherited* *constants*, *methods*, and *properties* can be *overridden* by *redeclaring* them with the same *name* *defined* in the *parent class*. However, if the *parent class* has defined a *method* or *constant* as *final*, they may not be *overridden*. It is possible to *access* the *overridden* [constants, -- KK] methods or *static properties* by referencing them with `parent::`.

Note: As of PHP 8.1.0, *constants* may be declared as *final*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.extends)

### Class constant overriding

*Example: Class constant overriding with visibility*

```php
<?php

class SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'base public';
    protected const SOME_PROTECTED_CONSTANT = 'base protected';
    private const SOME_PRIVATE_CONSTANT = 'base private';

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public const SOME_PUBLIC_CONSTANT = 'derived public';
    protected const SOME_PROTECTED_CONSTANT = 'derived protected';
    private const SOME_PRIVATE_CONSTANT = 'derived shadowed private'; // It's not overriding but rather shadowing!
    // It's completly new constant - very own constant of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::SOME_PRIVATE_CONSTANT : ' . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::SOME_PRIVATE_CONSTANT : ' . static::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::SOME_PROTECTED_CONSTANT : ' . parent::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'self::SOME_PROTECTED_CONSTANT : ' . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . 'static::SOME_PROTECTED_CONSTANT : ' . static::SOME_PROTECTED_CONSTANT . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::SOME_PUBLIC_CONSTANT : ' . parent::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'self::SOME_PUBLIC_CONSTANT : ' . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . 'static::SOME_PUBLIC_CONSTANT : ' . static::SOME_PUBLIC_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseContext();
$someObject->derivedContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseContext();
$otherObject->derivedOverridingContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseContext

* private:

self::SOME_PRIVATE_CONSTANT : base private

* protected:

self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : base protected

* public:

self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : base public

SomeDerivedClass::derivedContext

* protected:

parent::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : base protected

* public:

parent::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseContext

* private:

self::SOME_PRIVATE_CONSTANT : base private

* protected:

self::SOME_PROTECTED_CONSTANT : base protected
static::SOME_PROTECTED_CONSTANT : derived protected

* public:

self::SOME_PUBLIC_CONSTANT : base public
static::SOME_PUBLIC_CONSTANT : derived public

SomeDerivedOverridingClass::derivedOverridingContext

* private:

self::SOME_PRIVATE_CONSTANT : derived shadowed private
static::SOME_PRIVATE_CONSTANT : derived shadowed private

* protected:

parent::SOME_PROTECTED_CONSTANT : base protected
self::SOME_PROTECTED_CONSTANT : derived protected
static::SOME_PROTECTED_CONSTANT : derived protected

* public:

parent::SOME_PUBLIC_CONSTANT : base public
self::SOME_PUBLIC_CONSTANT : derived public
static::SOME_PUBLIC_CONSTANT : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_constant_overriding_with_visibility.php)

### Dynamic property overriding

*Example: Class property overriding with visibility*

```php
<?php

class SomeBaseClass
{
    public $somePublicProperty = 'base public';
    protected $someProtectedProperty = 'base protected';
    private $somePrivateProperty = 'base private';

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public $somePublicProperty = 'derived public';
    protected $someProtectedProperty = 'derived protected';
    private $somePrivateProperty = 'derived shadowed private'; // It's not overriding but rather shadowing!
    // It's completly new property - very own property of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . '$this->somePrivateProperty : ' . $this->somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . '$this->someProtectedProperty : ' . $this->someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . '$this->somePublicProperty : ' . $this->somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseContext();
$someObject->derivedContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseContext();
$otherObject->derivedOverridingContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseContext

* private:

$this->somePrivateProperty : base private

* protected:

$this->someProtectedProperty : base protected

* public:

$this->somePublicProperty : base public

SomeDerivedClass::derivedContext

* protected:

$this->someProtectedProperty : base protected

* public:

$this->somePublicProperty : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseContext

* private:

$this->somePrivateProperty : base private

* protected:

$this->someProtectedProperty : derived protected

* public:

$this->somePublicProperty : derived public

SomeDerivedOverridingClass::derivedOverridingContext

* private:

$this->somePrivateProperty : derived shadowed private

* protected:

$this->someProtectedProperty : derived protected

* public:

$this->somePublicProperty : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_property_overriding_with_visibility.php)

### Static property overriding

*Example: Class static property overriding with visibility*

```php
<?php

class SomeBaseClass
{
    public static $somePublicProperty = 'base static public';
    protected static $someProtectedProperty = 'base static protected';
    private static $somePrivateProperty = 'base static private';

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . "\n* protected:\n\n"
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public static $somePublicProperty = 'derived static public';
    protected static $someProtectedProperty = 'derived static protected';
    private static $somePrivateProperty = 'derived shadowed static private'; // It's not overriding but rather shadowing!
    // It's completly new property - very own property of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public function derivedOverridingContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::$somePrivateProperty : ' . self::$somePrivateProperty . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::$somePrivateProperty : ' . static::$somePrivateProperty . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::$someProtectedProperty : ' . parent::$someProtectedProperty . PHP_EOL
            . 'self::$someProtectedProperty : ' . self::$someProtectedProperty . PHP_EOL
            . 'static::$someProtectedProperty : ' . static::$someProtectedProperty . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::$somePublicProperty : ' . parent::$somePublicProperty . PHP_EOL
            . 'self::$somePublicProperty : ' . self::$somePublicProperty . PHP_EOL
            . 'static::$somePublicProperty : ' . static::$somePublicProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseContext();
$someObject->derivedContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseContext();
$otherObject->derivedOverridingContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseContext

* private:

self::$somePrivateProperty : base static private

* protected:

self::$someProtectedProperty : base static protected
static::$someProtectedProperty : base static protected

* public:

self::$somePublicProperty : base static public
static::$somePublicProperty : base static public

SomeDerivedClass::derivedContext

* protected:

parent::$someProtectedProperty : base static protected
self::$someProtectedProperty : base static protected
static::$someProtectedProperty : base static protected

* public:

parent::$somePublicProperty : base static public
self::$somePublicProperty : base static public
static::$somePublicProperty : base static public

# SomeDerivedOverridingClass:

SomeBaseClass::baseContext

* private:

self::$somePrivateProperty : base static private

* protected:

self::$someProtectedProperty : base static protected
static::$someProtectedProperty : derived static protected

* public:

self::$somePublicProperty : base static public
static::$somePublicProperty : derived static public

SomeDerivedOverridingClass::derivedOverridingContext

* private:

self::$somePrivateProperty : derived shadowed static private
static::$somePrivateProperty : derived shadowed static private

* protected:

parent::$someProtectedProperty : base static protected
self::$someProtectedProperty : derived static protected
static::$someProtectedProperty : derived static protected

* public:

parent::$somePublicProperty : base static public
self::$somePublicProperty : derived static public
static::$somePublicProperty : derived static public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_static_property_overriding_with_visibility.php)

### Dynamic method overriding

*Example: Class dynamic method overriding with visibility*

```php
<?php

class SomeBaseClass
{
    public function somePublicMethod()
    {
        return 'base public';
    }

    protected function someProtectedMethod()
    {
        return 'base protected';
    }

    private function somePrivateMethod()
    {
        return 'base private';
    }

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public function somePublicMethod()
    {
        return 'derived public';
    }

    protected function someProtectedMethod()
    {
        return 'derived protected';
    }

    private function somePrivateMethod() // It's not overriding but rather shadowing!
    // It's completly new method - very own method of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.
    {
        return 'derived shadowed private';
    }

    public function derivedOverridingContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateMethod() : ' . self::somePrivateMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateMethod() : ' . static::somePrivateMethod() . PHP_EOL
            . '$this->somePrivateMethod() : ' . $this->somePrivateMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedMethod() : ' . parent::someProtectedMethod() . PHP_EOL
            . 'self::someProtectedMethod() : ' . self::someProtectedMethod() . PHP_EOL
            . 'static::someProtectedMethod() : ' . static::someProtectedMethod() . PHP_EOL
            . '$this->someProtectedMethod() : ' . $this->someProtectedMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicMethod() : ' . parent::somePublicMethod() . PHP_EOL
            . 'self::somePublicMethod() : ' . self::somePublicMethod() . PHP_EOL
            . 'static::somePublicMethod() : ' . static::somePublicMethod() . PHP_EOL
            . '$this->somePublicMethod() : ' . $this->somePublicMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseContext();
$someObject->derivedContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseContext();
$otherObject->derivedOverridingContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseContext

* private:

self::somePrivateMethod() : base private
$this->somePrivateMethod() : base private

* protected:

self::someProtectedMethod() : base protected
static::someProtectedMethod() : base protected
$this->someProtectedMethod() : base protected

* public:

self::somePublicMethod() : base public
static::somePublicMethod() : base public
$this->somePublicMethod() : base public

SomeDerivedClass::derivedContext

* protected:

parent::someProtectedMethod() : base protected
self::someProtectedMethod() : base protected
static::someProtectedMethod() : base protected
$this->someProtectedMethod() : base protected

* public:

parent::somePublicMethod() : base public
self::somePublicMethod() : base public
static::somePublicMethod() : base public
$this->somePublicMethod() : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseContext

* private:

self::somePrivateMethod() : base private
$this->somePrivateMethod() : base private

* protected:

self::someProtectedMethod() : base protected
static::someProtectedMethod() : derived protected
$this->someProtectedMethod() : derived protected

* public:

self::somePublicMethod() : base public
static::somePublicMethod() : derived public
$this->somePublicMethod() : derived public

SomeDerivedOverridingClass::derivedOverridingContext

* private:

self::somePrivateMethod() : derived shadowed private
static::somePrivateMethod() : derived shadowed private
$this->somePrivateMethod() : derived shadowed private

* protected:

parent::someProtectedMethod() : base protected
self::someProtectedMethod() : derived protected
static::someProtectedMethod() : derived protected
$this->someProtectedMethod() : derived protected

* public:

parent::somePublicMethod() : base public
self::somePublicMethod() : derived public
static::somePublicMethod() : derived public
$this->somePublicMethod() : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_method_overriding_with_visibility.php)

### Static method overriding

```php
<?php

class SomeBaseClass
{
    public static function somePublicStaticMethod()
    {
        return 'base public';
    }

    protected static function someProtectedStaticMethod()
    {
        return 'base protected';
    }

    private static function somePrivateStaticMethod()
    {
        return 'base private';
    }

    public function baseContext(): void
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // Cannot be called without error in the derived class:
            // . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            // Private members are unaccessible in the derived classes.
            . '$this->somePrivateStaticMethod() : ' . $this->somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . '$this->somePublicStaticMethod() : ' . $this->somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function derivedContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . '$this->someProtectedStaticMethod() : ' . $this->someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . '$this->somePublicStaticMethod() : ' . $this->somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

class SomeDerivedOverridingClass extends SomeBaseClass
{
    public static function somePublicStaticMethod()
    {
        return 'derived public';
    }

    protected static function someProtectedStaticMethod()
    {
        return 'derived protected';
    }

    private static function somePrivateStaticMethod()
    {
        return 'derived shadowed private';
    } // It's not overriding but rather shadowing!
    // It's completly new method - very own method of the derived class
    // because private member of the base class is unaccessible and not visible for the derived class.

    public static function derivedOverridingDynamicContext()
    {
        print(
            __METHOD__ . PHP_EOL
            . "\n* private:\n\n"
            . 'self::somePrivateStaticMethod() : ' . self::somePrivateStaticMethod() . PHP_EOL
            // This will be dangerous in case of further inheritance:
            . 'static::somePrivateStaticMethod() : ' . static::somePrivateStaticMethod() . PHP_EOL
            . "\n* protected:\n\n"
            . 'parent::someProtectedStaticMethod() : ' . parent::someProtectedStaticMethod() . PHP_EOL
            . 'self::someProtectedStaticMethod() : ' . self::someProtectedStaticMethod() . PHP_EOL
            . 'static::someProtectedStaticMethod() : ' . static::someProtectedStaticMethod() . PHP_EOL
            . "\n* public:\n\n"
            . 'parent::somePublicStaticMethod() : ' . parent::somePublicStaticMethod() . PHP_EOL
            . 'self::somePublicStaticMethod() : ' . self::somePublicStaticMethod() . PHP_EOL
            . 'static::somePublicStaticMethod() : ' . static::somePublicStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeDerivedClass();

print("# SomeDerivedClass:\n\n");

$someObject->baseContext();
$someObject->derivedContext();

$otherObject = new SomeDerivedOverridingClass();

print("# SomeDerivedOverridingClass:\n\n");

$otherObject->baseContext();
$otherObject->derivedOverridingContext();

```

**Result (PHP 8.4)**:

```
# SomeDerivedClass:

SomeBaseClass::baseContext

* private:

self::somePrivateMethod() : base private
$this->somePrivateMethod() : base private

* protected:

self::someProtectedMethod() : base protected
static::someProtectedMethod() : base protected
$this->someProtectedMethod() : base protected

* public:

self::somePublicMethod() : base public
static::somePublicMethod() : base public
$this->somePublicMethod() : base public

SomeDerivedClass::derivedContext

* protected:

parent::someProtectedMethod() : base protected
self::someProtectedMethod() : base protected
static::someProtectedMethod() : base protected
$this->someProtectedMethod() : base protected

* public:

parent::somePublicMethod() : base public
self::somePublicMethod() : base public
static::somePublicMethod() : base public
$this->somePublicMethod() : base public

# SomeDerivedOverridingClass:

SomeBaseClass::baseContext

* private:

self::somePrivateMethod() : base private
$this->somePrivateMethod() : base private

* protected:

self::someProtectedMethod() : base protected
static::someProtectedMethod() : derived protected
$this->someProtectedMethod() : derived protected

* public:

self::somePublicMethod() : base public
static::somePublicMethod() : derived public
$this->somePublicMethod() : derived public

SomeDerivedOverridingClass::derivedOverridingContext

* private:

self::somePrivateMethod() : derived shadowed private
static::somePrivateMethod() : derived shadowed private
$this->somePrivateMethod() : derived shadowed private

* protected:

parent::someProtectedMethod() : base protected
self::someProtectedMethod() : derived protected
static::someProtectedMethod() : derived protected
$this->someProtectedMethod() : derived protected

* public:

parent::somePublicMethod() : base public
self::somePublicMethod() : derived public
static::somePublicMethod() : derived public
$this->somePublicMethod() : derived public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_static_method_overriding_with_visibility.php)

*Example: Class inheritance and method overriding*

```php
<?php

class SomeBaseClass
{
    public function someMethod()
    {
        print("Some method from base class\n");
    }

    public function otherMethod()
    {
        print("Other method from base class\n");
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function otherMethod()
    {
        parent::otherMethod();
        print("Other method from derived class\n");
    }
}

$someObject = new SomeDerivedClass();

$someObject->someMethod();
$someObject->otherMethod();

```

**Result (PHP 8.4)**:

```
Some method from base class
Other method from base class
Other method from derived class
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_inheritance_and_method_overriding.php)

## Members overriding and compatibility

### Overriding and visibility compatibility rules

The *visibility* of *methods*, *properties* and *constants* can be relaxed, e.g. a *protected method* can be marked as *public*, but they cannot be restricted, e.g. marking a *public property* as *private*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

*Example: Class members overriding and visibility compatibility*

```php
<?php

class Association
{
    protected array $members = [];
    public int $strength = 0;

    public function __construct(
        public string $name,
        protected string $chairman,
    ) {
        $this->affiliate($chairman);
    }

    protected function affiliate(string $member)
    {
        $this->members[] = $member;
        ++$this->strength;
    }
}

class Club extends Association
{
    public array $members;

    public function affiliate(string $member)
    {
        parent::affiliate($member);
    }
}

function communityMeeting(Association $group)
{
    print(
        "Group name: {$group->name}\n"
        . "Group strength: {$group->strength}\n\n"
    );
}

$someGroup = new Association('Western Academy Top Graduates', 'Simon Daffodil');
print("# Association:\n\n");
communityMeeting($someGroup);

$otherGroup = new Club('Jotter Hobbyist Pen Club', 'Katy Pernickety');
$otherGroup->affiliate('Doris Frog');
$otherGroup->affiliate('Arthur Carbony');
$otherGroup->affiliate('John Thyme');
$otherGroup->affiliate('Kitty Pranky');
print("# Club:\n\n");
communityMeeting($otherGroup);
print("Members:\n");
foreach($otherGroup->members as $member) {
    print($member . PHP_EOL);
}

```

**Result (PHP 8.4)**:

```
# Association:

Group name: Western Academy Top Graduates
Group strength: 1

# Club:

Group name: Jotter Hobbyist Pen Club
Group strength: 5

Members:
Katy Pernickety
Doris Frog
Arthur Carbony
John Thyme
Kitty Pranky

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_members_overriding_and_visibility_compatibility.php)

### Overriding and method parameter number and requireness rules

A [method] *signature* is compatible if it respects the *variance rules*, makes a mandatory *parameter* optional, adds only optional new *parameters* and doesn't restrict but only relaxes the *visibility*. This is known as the *Liskov Substitution Principle*, or *LSP* for short. The *constructor*, and *private methods* are exempt from these *signature compatibility rules*, and thus won't emit a fatal error in case of a *signature* mismatch.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop.lsp)

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

*Example: Class method overriding and paramenter number compatibility*

```php
<?php

class Association
{
    protected array $members = [];
    public int $strength = 0;

    public function __construct(
        public string $name,
        protected string $chairman,
    ) {
        $this->affiliate($chairman);
    }

    public function affiliate(string $member)
    {
        $this->members[] = $member;
        ++$this->strength;
    }

    public function display()
    {
        foreach ($this->members as $member) {
            print($member . PHP_EOL);
        }
        print(PHP_EOL);
    }
}

class Club extends Association
{
    public function affiliate(string $member, ?int $id = null)
    {
        parent::affiliate($member);
    }
}

function communityMeeting(Association $group, array $newcomers = [])
{
    print(
        "Group name: {$group->name}\n"
        . "Group strength: {$group->strength}\n\n"
    );

    foreach ($newcomers as $newcomer) {
        $group->affiliate($newcomer);
    }
}

$someGroup = new Association('Western Academy Top Graduates', 'Simon Daffodil');
print("# Association:\n\n");
communityMeeting($someGroup, ['Karen McLaren', 'North Sloth', 'Ib Vermicelli']);
$someGroup->display();

$otherGroup = new Club('Jotter Hobbyist Pen Club', 'Katy Pernickety');
$otherGroup->affiliate('Doris Frog', 3);
$otherGroup->affiliate('Arthur Carbony', 5);
$otherGroup->affiliate('John Thyme');
$otherGroup->affiliate('Kitty Pranky');
print("# Club:\n\n");
communityMeeting($otherGroup);
$otherGroup->display();

```

**Result (PHP 8.4)**:

```
# Association:

Group name: Western Academy Top Graduates
Group strength: 1

Simon Daffodil
Karen McLaren
North Sloth
Ib Vermicelli

# Club:

Group name: Jotter Hobbyist Pen Club
Group strength: 5

Katy Pernickety
Doris Frog
Arthur Carbony
John Thyme
Kitty Pranky

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_method_overriding_and_parameter_number_compatibility.php)

*Exapmle: Class method overriding and parameter requireness compatibility*

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
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_method_overriding_and_parameter_requireness_compatibility.php)

### Overriding and method parameter name rule

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

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop.lsp)

### Overriding and property type compatibility rules

>>> **invariance**

By default, *properties* are neither *covariant* nor *contravariant*, hence *invariant*. That is, their *type* may not change in a *child class* at all. The reason for that is *"get" operations* must be *covariant*, and *"set" operations* must be *contravariant*. The only way for a *property* to satisfy both requirements is to be *invariant*.

As of PHP 8.4.0, with the addition of *abstract properties* (on an *interface* or *abstract class*) and *virtual properties*, it is possible to declare a *property* that has only a *get* or *set operation*. As a result, *abstract properties* or *virtual properties* that have only a *"get" operation* required may be *covariant*. Similarly, an *abstract property* or *virtual property* that has only a *"set" operation* required may be *contravariant*.

Once a *property* has both a *get* and *set operation*, however, it is no longer *covariant* or *contravariant* for further extension. That is, it is now *invariant*.

*Example: Property type variance*

```php
<?php
class Animal {}
class Dog extends Animal {}
class Poodle extends Dog {}

interface PetOwner
{
    // Only a get operation is required, so this may be covariant.
    public Animal $pet { get; }
}

class DogOwner implements PetOwner
{
    // This may be a more restrictive type since the "get" side
    // still returns an Animal.  However, as a native property
    // children of this class may not change the type anymore.
    public Dog $pet;
}

class PoodleOwner extends DogOwner
{
    // This is NOT ALLOWED, because DogOwner::$pet has both
    // get and set operations defined and required.
    public Poodle $pet;
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.variance.php)

### Overriding and method types compatibility rules

In PHP 7.2.0, *partial contravariance* was introduced by removing *type restrictions* on *parameters* in a *child method*. As of PHP 7.4.0, full *covariance* and *contravariance* support was added.

*Covariance* allows a *child's method* to *return* a *more specific type* than the *return type* of its *parent's method*. *Contravariance* allows a *parameter type* to be *less specific* in a *child method*, than that of its *parent*.

A *type declaration* is considered *more specific* in the following case:

* A *type* is removed from a *union type*
* A *type* is added to an *intersection type*
* A *class type* is changed to a *child class type*
* `iterable` is changed to *array* or `Traversable`

A *type class* is considered *less specific* if the opposite is true.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.variance.php#language.oop5.variance)

When *overriding a method*, its *signature* must be compatible with the *parent method*. Otherwise, a fatal error is emitted, or, prior to PHP 8.0.0, an `E_WARNING` level error is generated.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop.lsp)

Prior to PHP 8.1, most *internal classes* or *methods* didn't *declare* their *return types*, and any *return type* was allowed when *extending* them.

As of PHP 8.1.0, most *internal methods* started to "tentatively" declare their *return type*, in that case the *return type* of *methods* should be compatible with the *parent* being *extended*; otherwise, a deprecation notice is emitted. Note that lack of an explicit *return declaration* is also considered a *signature* mismatch, and thus results in the deprecation notice.

If the *return type* cannot be *declared* for an *overriding method* due to PHP cross-version compatibility concerns, a `ReturnTypeWillChange` *attribute* can be added to silence the deprecation notice.

*Example: The overriding method does not declare any return type*

```php
<?php
class MyDateTime extends DateTime
{
    public function modify(string $modifier) { return false; }
}

// "Deprecated: Return type of MyDateTime::modify(string $modifier) should either be compatible with DateTime::modify(string $modifier): DateTime|false, or the #[\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice" as of PHP 8.1.0
?>
```

*Example: The overriding method declares a wrong return type*

```php
<?php
class MyDateTime extends DateTime
{
    public function modify(string $modifier): ?DateTime { return null; }
}

// "Deprecated: Return type of MyDateTime::modify(string $modifier): ?DateTime should either be compatible with DateTime::modify(string $modifier): DateTime|false, or the #[\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice" as of PHP 8.1.0
?>
```

*Example: The overriding method declares a wrong return type without a deprecation notice*

```php
<?php
class MyDateTime extends DateTime
{
    /**
     * @return DateTime|false
     */
    #[\ReturnTypeWillChange]
    public function modify(string $modifier) { return false; }
}

// No notice is triggered
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance.internal-classes)

>>> **covariance**

To illustrate how *covariance* works, a simple *abstract parent class*, `Animal` is created. `Animal` will be extended by *children classes*, `Cat`, and `Dog`.

```php
<?php

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function speak();
}

class Dog extends Animal
{
    public function speak()
    {
        echo $this->name . " barks";
    }
}

class Cat extends Animal
{
    public function speak()
    {
        echo $this->name . " meows";
    }
}
```

Note that there aren't any *methods* which *return values* in this example. A few *factories* will be added which return a new *object* of *class type* `Animal`, `Cat`, or `Dog`.

```php
<?php

interface AnimalShelter
{
    public function adopt(string $name): Animal;
}

class CatShelter implements AnimalShelter
{
    public function adopt(string $name): Cat // instead of returning class type Animal, it can return class type Cat
    {
        return new Cat($name);
    }
}

class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Dog // instead of returning class type Animal, it can return class type Dog
    {
        return new Dog($name);
    }
}

$kitty = (new CatShelter)->adopt("Ricky");
$kitty->speak();
echo "\n";

$doggy = (new DogShelter)->adopt("Mavrick");
$doggy->speak();
```

The above example will output:

```
Ricky meows
Mavrick barks
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.variance.php#language.oop5.variance.covariance)

>>> **contravariance**

Continuing with the previous example with the *classes* `Animal`, `Cat`, and `Dog`, a *class* called `Food` and `AnimalFood` will be included, and a method `eat(AnimalFood $food)` is added to the `Animal` *abstract class*.

```php
<?php

class Food {}

class AnimalFood extends Food {}

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function eat(AnimalFood $food)
    {
        echo $this->name . " eats " . get_class($food);
    }
}
```

In order to see the behavior of *contravariance*, the eat *method* is *overridden* in the `Dog` *class* to allow any `Food` *type* *object*. The `Cat` class remains unchanged.

```php
<?php

class Dog extends Animal
{
    public function eat(Food $food) {
        echo $this->name . " eats " . get_class($food);
    }
}
```

The next example will show the behavior of contravariance.

```php
<?php

$kitty = (new CatShelter)->adopt("Ricky");
$catFood = new AnimalFood();
$kitty->eat($catFood);
echo "\n";

$doggy = (new DogShelter)->adopt("Mavrick");
$banana = new Food();
$doggy->eat($banana);
```

The above example will output:

```
Ricky eats AnimalFood
Mavrick eats Food
```

But what happens if $kitty tries to eat() the $banana?

```php
$kitty->eat($banana);
```

The above example will output:

```
Fatal error: Uncaught TypeError: Argument 1 passed to Animal::eat() must be an instance of AnimalFood, instance of Food given
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.variance.php#language.oop5.variance.contravariance)

*Example: Class method overriding and types compatibility*

```php
<?php

class Adept
{
    public $curiosity = "How the time works?";
}

class Craftman extends Adept
{
    public $knowledge = "There's a time dilation.";
}

class Master extends Craftman
{
    public $wisdom = "GPS clocks need time correction.";
}

class Association
{
    function affiliate(Craftman $member)
    {
        print(
            $member->curiosity . PHP_EOL
            . $member->knowledge . PHP_EOL . PHP_EOL
        );
    }

    function getGuide(): Craftman
    {
        return new Craftman();
    }
}

class Club extends Association
{
    function affiliate(Adept $member)
    {
        print($member->curiosity . PHP_EOL . PHP_EOL);
    }

    function getGuide(): Master
    {
        return new Master();
    }
}

function communityMeeting(Association $group)
{
    $newMember = new Craftman();

    print("Affiliating:\n\n");
    $group->affiliate($newMember);

    $newGuide = $group->getGuide();

    print("Guidance:\n\n");
    print(
        "Guide curiosity: {$newGuide->curiosity}\n"
        . "Guide knowledge: {$newGuide->knowledge}\n\n"
    );
}

$someGroup = new Association();
print("# Association:\n\n");
communityMeeting($someGroup);

$otherGroup = new Club();
print("# Club:\n\n");
communityMeeting($otherGroup);

```

**Result (PHP 8.4)**:

```
# Association:

Affiliating:

How the time works?
There's a time dilation.

Guidance:

Guide curiosity: How the time works?
Guide knowledge: There's a time dilation.

# Club:

Affiliating:

How the time works?

Guidance:

Guide curiosity: How the time works?
Guide knowledge: There's a time dilation.

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_method_overriding_and_types_compatibility.php)

### Overriding and constructor signature compatibility rules

An exception are *constructors*, whose *visibility* can be restricted, e.g. a *public constructor* can be marked as *private* in a *child class*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

Unlike other methods, `__construct()` is exempt from the usual *signature compatibility* rules when being extended.

*Constructors* are ordinary *methods* which are called during the *instantiation* of their corresponding *object*. As such, they may define an arbitrary number of *arguments*, which may be *required*, may have a *type*, and may have a *default value*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor)

### Overriding and readonly modifier

Note:

It is not allowed to *override* a *read-write property* with a *readonly property* or vice versa.

```php
<?php

class A {
    public int $prop;
}
class B extends A {
    // Illegal: read-write -> readonly
    public readonly int $prop;
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

## Overloading

*Overloading* in PHP provides means to dynamically create *properties* and *methods*. These *dynamic entities* are processed via *magic methods* one can establish in a *class* for various action types.

The *overloading methods* are invoked when interacting with *properties* or *methods* that have not been *declared* or are not *visible* in the current *scope*. The rest of this section will use the terms *inaccessible properties* and *inaccessible methods* to refer to this combination of *declaration* and *visibility*.

All *overloading methods* must be defined as *public*.

Note:

None of the *arguments* of these *magic methods* can be *passed by reference*.

Note:

PHP's interpretation of *overloading* is different than most object-oriented languages. *Overloading* traditionally provides the ability to have multiple *methods* with the same *name* but different quantities and *types* of *arguments*.

### Property overloading

* `public __set(string $name, mixed $value): void`
* `public __get(string $name): mixed`
* `public __isset(string $name): bool`
* `public __unset(string $name): void`

`__set()` is run when writing data to *inaccessible* (*protected* or *private*) or *non-existing properties*.

`__get()` is utilized for reading data from *inaccessible* (*protected* or *private*) or *non-existing properties*.

`__isset()` is triggered by calling `isset()` or `empty()` on *inaccessible* (*protected* or *private*) or *non-existing properties*.

`__unset()` is invoked when `unset()` is used on *inaccessible* (*protected* or *private*) or *non-existing properties*.

The `$name` argument is the *name* of the *property* being interacted with. The `__set()` method's `$value` argument specifies the value the `$name`'ed *property* should be set to.

*Property overloading* only works in *object context*. These *magic methods* will not be triggered in *static context*. Therefore these *methods* should not be *declared* *static*. A warning is issued if one of the *magic overloading methods* is *declared* *static*.

Note:

The *return value* of `__set()` is ignored because of the way PHP processes the *assignment operator*. Similarly, `__get()` is never called when chaining assignments together like this:

```
$a = $obj->b = 8;
```

Note:

PHP will not call an *overloaded method* from within the same *overloaded method*. That means, for example, writing `return $this->foo` inside of `__get()` will return `null` and raise an `E_WARNING` if there is no `foo` property defined, rather than calling `__get()` a second time. However, *overload methods* may invoke other *overload methods* implicitly (such as `__set()` triggering `__get()`).

*Example: Overloading properties via the `__get()`, `__set()`, `__isset()` and `__unset()` methods*

```php
<?php
class PropertyTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example.  */
    public function getHidden()
    {
        return $this->hidden;
    }
}


$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "\n";

echo $obj->declared . "\n\n";

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n";
echo $obj->getHidden() . "\n";
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n";
?>
```

The above example will output:

```
Setting 'a' to '1'
Getting 'a'
1

Is 'a' set?
bool(true)
Unsetting 'a'
Is 'a' set?
bool(false)

1

Let's experiment with the private property named 'hidden':
Privates are visible inside the class, so __get() not used...
2
Privates not visible outside of class, so __get() is used...
Getting 'hidden'


Notice:  Undefined property via __get(): hidden in <file> on line 70 in <file> on line 29
```

### Method overloading

* `public __call(string $name, array $arguments): mixed`
* `public static __callStatic(string $name, array $arguments): mixed`

`__call()` is triggered when *invoking* *inaccessible methods* in an *object context*.

`__callStatic()` is triggered when *invoking* *inaccessible methods* in a *static context*.

The `$name` argument is the *name* of the *method* being called. The `$arguments` argument is an *enumerated array* containing the *parameters* passed to the `$name`'ed method.

*Example: Overloading methods via the `__call()` and `__callStatic()` methods*

```php
<?php
class MethodTest
{
    public function __call($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling object method '$name' "
             . implode(', ', $arguments). "\n";
    }

    public static function __callStatic($name, $arguments)
    {
        // Note: value of $name is case sensitive.
        echo "Calling static method '$name' "
             . implode(', ', $arguments). "\n";
    }
}

$obj = new MethodTest;
$obj->runTest('in object context');

MethodTest::runTest('in static context');
?>
```

The above example will output:

```
Calling object method 'runTest' in object context
Calling static method 'runTest' in static context
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.overloading.php)

## Final class members

>>> `final` keyword

The `final` *keyword* prevents *child classes* from *overriding a method*, *property*, or *constant* by prefixing the *definition* with `final`. If the *class* itself is being defined *final* then it cannot be *extended*.

*Example: Final methods example*

```php
<?php
class BaseClass {
   public function test() {
       echo "BaseClass::test() called\n";
   }

   final public function moreTesting() {
       echo "BaseClass::moreTesting() called\n";
   }
}

class ChildClass extends BaseClass {
   public function moreTesting() {
       echo "ChildClass::moreTesting() called\n";
   }
}
// Results in Fatal error: Cannot override final method BaseClass::moreTesting()
?>
```

*Example: Final class example*

```php
<?php
final class BaseClass {
   public function test() {
       echo "BaseClass::test() called\n";
   }

   // As the class is already final, the final keyword is redundant
   final public function moreTesting() {
       echo "BaseClass::moreTesting() called\n";
   }
}

class ChildClass extends BaseClass {
}
// Results in Fatal error: Class ChildClass may not inherit from final class (BaseClass)
?>
```

*Example: Final property example as of PHP 8.4.0*

```php
<?php
class BaseClass {
   final protected string $test;
}

class ChildClass extends BaseClass {
    public string $test;
}
// Results in Fatal error: Cannot override final property BaseClass::$test
?>
```

*Example: Final constants example as of PHP 8.1.0*

```php
<?php
class Foo
{
    final public const X = "foo";
}

class Bar extends Foo
{
    public const X = "bar";
}

// Fatal error: Bar::X cannot override final constant Foo::X
?>
```

Note: As of PHP 8.0.0, *private methods* may not be declared *final* except for the *constructor*.

Note: A *property* that is declared *private(set)* is implicitly *final*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.final.php)

### Final hooks

*Hooks* may also be declared *final*, in which case they may not be overridden.

*Example: Final hooks*

```php
<?php
class User
{
    public string $username {
        final set => strtolower($value);
    }
}

class Manager extends User
{
    public string $username {
        // This is allowed
        get => strtoupper($this->username);

        // But this is NOT allowed, because set is final in the parent.
        set => strtoupper($value);
    }
}
?>
```

A *property* may also be declared *final*. A *final property* may not be redeclared by a child class in any way, which precludes altering hooks or widening its access.

Declaring *hooks* *final* on a *property* that is declared *final* is redundant, and will be silently ignored. This is the same behavior as *final methods*.

A *child class* may define or redefine individual *hooks* on a *property* by redefining the *property* and just the *hooks* it wishes to *override*. A *child class* may also add *hooks* to a *property* that had none. This is essentially the same as if the *hooks* were *methods*.

*Example: Hook inheritance*

```php
<?php
class Point
{
    public int $x;
    public int $y;
}

class PositivePoint extends Point
{
    public int $x {
        set {
            if ($value < 0) {
                throw new \InvalidArgumentException('Too small');
            }
            $this->x = $value;
        }
    }
}
?>
```

Each *hook* overrides *parent* implementations independently of each other. If a *child class* adds *hooks*, any *default value* set on the *property* is removed, and must be redeclared. That is the same consistent with how inheritance works on hook-less properties.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks.virtual)

[▵ Up](#inheritance)
[⌂ Home](../../../README.md)
[▲ Previous: Objects](./objects.md)
[▼ Next: Anonymous classes](./anonymous_classes.md)
