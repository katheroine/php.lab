[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)

# Class members

*Example: Class members*

```php
<?php

class SomeClass
{
    const SOME_CONSTANT = 'apple';

    public $someProperty = 'orange';

    public function someMethod()
    {
        return 'strawberry';
    }
}

$someObject = new SomeClass();

print('Statically accessed constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);
print('Dynamically accessed property value: ' . $someObject->someProperty . PHP_EOL);
print('Dynamically called method result: ' . $someObject->someMethod() . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Statically accessed constant value: apple
Dynamically accessed property value: orange
Dynamically called method result: strawberry
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_members.php)

*Example: Class static members*

```php
<?php

class SomeClass
{
    const SOME_CONSTANT = 'pear';

    public static $someStaticProperty = 'lemon';

    public static function someStaticMethod()
    {
        return 'blackberry';
    }
}

$someObject = new SomeClass();

print('Statically accessed constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);
print('Statically accessed static property value: ' . SomeClass::$someStaticProperty . PHP_EOL);
print('Statically called static method result: ' . SomeClass::someStaticMethod() . PHP_EOL);
print('Dynamically called static method result: ' . $someObject->someStaticMethod() . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Statically accessed constant value: pear
Statically accessed static property value: lemon
Statically called static method result: blackberry
Dynamically called static method result: blackberry
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_static_members.php)

## Visibility

The *visibility of a property*, a *method* or (as of PHP 7.1.0) a *constant* can be defined by prefixing the *declaration* with the *keywords* `public`, `protected` or `private`. *Class members* declared *public* can be accessed everywhere. *Members* declared *protected* can be accessed only within the *class itself* and by *inheriting* and *parent classes*. *Members* declared as *private* may only be accessed by the *class* that defines the *member*.

*Example: Class member visibility*

```php
<?php

class SomeClass
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

    function someMethod()
    {
        print(
            "# From the base class:\n"
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
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From the derived class:\n"
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
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

print(
    "# From the outside:\n"
    . "\n* constants:\n"
    . SomeClass::SOME_PUBLIC_CONSTANT . PHP_EOL
    . "\n* properties:\n"
    . $someObject->somePublicProperty . PHP_EOL
    . "\n* methods:\n"
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
# From the base class:

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

# From the derived class:

* constants:
public
protected

* properties:
public
protected

* methods:
public
protected

# From the outside:

* constants:
public

* properties:
public

* methods:
public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_member_visbility.php)

### Visibility from other objects

*Objects* of the same *type* will have access to each others *private* and *protected* members even though they are not the same *instances*. This is because the implementation specific details are already known when inside those *objects*.

*Example: Accessing private members of the same object type*

```php
<?php
class Test
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz(Test $other)
    {
        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}

$test = new Test('test');

$test->baz(new Test('other'));
?>
```

The above example will output:

```
string(5) "hello"
Accessed the private method.
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.visibility.php)

*Example: Class member visibility from the same class object*

```php
<?php

class SomeClass
{
    public const SOME_PUBLIC_CONSTANT = 'public';
    protected const SOME_PROTECTED_CONSTANT = 'protected';
    private const SOME_PRIVATE_CONSTANT = 'private';

    public $somePublicProperty = 'public';
    protected $someProtectedProperty = 'protected';
    private $somePrivateProperty = 'private';

    public function somePublicMethod()
    {
        return $this->somePublicProperty;
    }

    protected function someProtectedMethod()
    {
        return $this->someProtectedProperty;
    }

    private function somePrivateMethod()
    {
        return $this->somePrivateProperty;
    }

    function someMethod(SomeClass $object)
    {
        print(
            "* Constants:\n"
            . $object::class::SOME_PUBLIC_CONSTANT . PHP_EOL
            . $object::class::SOME_PROTECTED_CONSTANT . PHP_EOL
            . $object::class::SOME_PRIVATE_CONSTANT . PHP_EOL
            . "\n* Properties:\n"
            . $object->somePublicProperty . PHP_EOL
            . $object->someProtectedProperty . PHP_EOL
            . $object->somePrivateProperty . PHP_EOL
            . "\n* Methods:\n"
            . $object->somePublicMethod() . PHP_EOL
            . $object->someProtectedMethod() . PHP_EOL
            . $object->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$otherObject = new SomeClass();

$someObject->someMethod($otherObject);

```

**Result (PHP 8.4)**:

```
* Constants:
public
protected
private

* Properties:
public
protected
private

* Methods:
public
protected
private

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_member_visibility_from_same_class_object.php)

## Dynamic and static context

### Class members static access

*Example: Class members static access*

```php
<?php

class SomeClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';

    public static function someStaticMethod()
    {
        print("Inside static method:\n\n");
        print('Constant value (accessed by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Constant value (accessed by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Static property value (accessed by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Static property value (accessed by static): ' . static::$someStaticProperty . PHP_EOL);
    }
}

print("Outside class:\n\n");
print('Constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);
print('Static property value: ' . SomeClass::$someStaticProperty . PHP_EOL . PHP_EOL);
print("Static method call:\n\n");
SomeClass::someStaticMethod();

```

**Result (PHP 8.4)**:

```
Outside class:

Constant value: grapefruit
Static property value: lemon

Static method call:

Inside static method:

Constant value (accessed by self): grapefruit
Constant value (accessed by static): grapefruit
Static property value (accessed by self): lemon
Static property value (accessed by static): lemon
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_members_static_access.php)

### Class members dynamic access

*Example: Class members dynamic access*

```php
<?php

class SomeClass
{
    public $someProperty = 'lemon';

    public static function someStaticMethod()
    {
        print("Inside static method.\n\n");
    }

    public function someMethod()
    {
        print("Inside method:\n\n");
        print('Property value: ' . $this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();

print("Outside class:\n\n");
print('Property value: ' . $someObject->someProperty . PHP_EOL . PHP_EOL);
print("Static method call:\n\n");
$someObject->someStaticMethod();
print("Method call:\n\n");
$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Outside class:

Property value: lemon

Static method call:

Inside static method.

Method call:

Inside method:

Property value: lemon
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_members_dynamic_access.php)

## Object & class context

### Object context

>>> `$this` pseudo-variable

The *pseudo-variable* `$this` is available when a *method* is called from within an *object context*. `$this` is the *value* of the *calling object*.

Warning

Calling a *non-static method* statically throws an `Error`. Prior to PHP 8.0.0, this would generate a deprecation notice, and `$this` would be undefined.

*Example: Some examples of the `$this` pseudo-variable*

```php
<?php
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

class B
{
    function bar()
    {
        A::foo();
    }
}

$a = new A();
$a->foo();

A::foo();

$b = new B();
$b->bar();

B::bar();
?>
```

Output of the above example in PHP 7:

```
$this is defined (A)

Deprecated: Non-static method A::foo() should not be called statically in %s  on line 27
$this is not defined.

Deprecated: Non-static method A::foo() should not be called statically in %s  on line 20
$this is not defined.

Deprecated: Non-static method B::bar() should not be called statically in %s  on line 32

Deprecated: Non-static method A::foo() should not be called statically in %s  on line 20
$this is not defined.
```

Output of the above example in PHP 8:

```
$this is defined (A)

Fatal error: Uncaught Error: Non-static method A::foo() cannot be called statically in %s :27
Stack trace:
#0 {main}
  thrown in %s  on line 27
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.class)

### Class context

>>> scope resolution `::` operator

The ***scope resolution operator*** (also called *paamayim nekudotayim*) or in simpler terms, the *double colon*, is a *token* that allows access to a *constant*, *static property*, or *static method* of a *class* or one of its *parents*. Moreover, *static properties* or *methods* can be *overriden* via *late static binding*.

When *referencing* these items from outside the *class definition*, use the *name* of the *class*.

It's possible to reference the *class* using a *variable*. The *variable's value* can not be a *keyword* (e.g. `self`, `parent` and `static`).

*Paamayim nekudotayim* would, at first, seem like a strange choice for naming a double-colon. However, while writing the Zend Engine 0.5 (which powers PHP 3), that's what the Zend team decided to call it. It actually does mean double-colon - in Hebrew!

[It's simply the *scope resolution operator* in other languages. -- KK]

*Example: `::` from outside the class definition*

```php
<?php
class MyClass {
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE;

echo MyClass::CONST_VALUE;
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php#language.oop5.paamayim-nekudotayim)

#### Accessing class members by `self`, `parent` and `static` keywords

Three special *keywords* `self`, `parent` and `static` are used to *access properties* or *methods* from inside the *class definition*.

*Example: `::` from inside the class definition*

```php
<?php
class MyClass {
    const CONST_VALUE = 'A constant value';
}

class OtherClass extends MyClass
{
    public static $my_static = 'static var';

    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}

$classname = 'OtherClass';
$classname::doubleColon();

OtherClass::doubleColon();
?>
```

When an *extending class* overrides the parent's definition of a *method*, PHP will not call the *parent's method*. It's up to the *extended class* on whether or not the *parent's method* is called. This also applies to *constructors* and *destructors*, *overloading*, and *magic method* definitions.

*Example: Calling a parent's method*

```php
<?php
class MyClass
{
    protected function myFunc() {
        echo "MyClass::myFunc()\n";
    }
}

class OtherClass extends MyClass
{
    // Override parent's definition
    public function myFunc()
    {
        // But still call the parent function
        parent::myFunc();
        echo "OtherClass::myFunc()\n";
    }
}

$class = new OtherClass();
$class->myFunc();
?>
```

See also some examples of *static call trickery*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php)

>>> `static` keyword

Tip

This page describes the use of the `static` *keyword* to define *static methods* and *properties*. `static` can also be used to define *static variables*, define *static anonymous functions* and for *late static bindings*.

Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. These can also be accessed statically within an instantiated class object.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.static.php)

>>> `self` keyword

>>> `parent` keyword

*Example: Class member access by `static`, `self` and `parent` keywords*

```php
<?php

class BaseClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    static function someStaticMethod()
    {
        print(static::class . '/' . self::class . " static method:\n\n");
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print(PHP_EOL);
    }

    function someMethod()
    {
        print(static::class . '/' . self::class . " method:\n\n");
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print('Dynamically accessed property value: ' . $this->someProperty . PHP_EOL);
        print(PHP_EOL);
    }
}

class DerivedClass extends BaseClass
{
    public const SOME_CONSTANT = 'potato';
    public static $someStaticProperty = 'tomato';
    public $someProperty = 'cucumber';

    function otherMethod()
    {
        print(static::class . '/' . self::class . " method:\n\n");
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print('Dynamically accessed property value: ' . $this->someProperty . PHP_EOL);
        print(PHP_EOL);
        print('Statically accessed parent constant value (by parent): ' . parent::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed parent static property value (by parent): ' . parent::$someStaticProperty . PHP_EOL);
        print(PHP_EOL);
    }
}

$someObject = new BaseClass();

$someObject->someStaticMethod();
$someObject->someMethod();

$otherObject = new DerivedClass();

$otherObject->someStaticMethod();
$otherObject->someMethod();
$otherObject->otherMethod();
```

**Result (PHP 8.4)**:

```
BaseClass/BaseClass static method:

Statically accessed constant value (by self): grapefruit
Statically accessed constant value (by static): grapefruit
Statically accessed static property value (by self): lemon
Statically accessed static property value (by static): lemon

BaseClass/BaseClass method:

Statically accessed constant value (by self): grapefruit
Statically accessed constant value (by static): grapefruit
Statically accessed static property value (by self): lemon
Statically accessed static property value (by static): lemon
Dynamically accessed property value: orange

DerivedClass/BaseClass static method:

Statically accessed constant value (by self): grapefruit
Statically accessed constant value (by static): potato
Statically accessed static property value (by self): lemon
Statically accessed static property value (by static): tomato

DerivedClass/BaseClass method:

Statically accessed constant value (by self): grapefruit
Statically accessed constant value (by static): potato
Statically accessed static property value (by self): lemon
Statically accessed static property value (by static): tomato
Dynamically accessed property value: cucumber

DerivedClass/DerivedClass method:

Statically accessed constant value (by self): potato
Statically accessed constant value (by static): potato
Statically accessed static property value (by self): tomato
Statically accessed static property value (by static): tomato
Dynamically accessed property value: cucumber

Statically accessed parent constant value (by parent): grapefruit
Statically accessed parent static property value (by parent): lemon
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_member_access_by_static_self_and_parent.php)

## Nullsafe properties and methods

>>> nullsafe `?->` operator

As of PHP 8.0.0, *properties* and *methods* may also be accessed with the *nullsafe operator* instead: `?->`. The *nullsafe operator* works the same as *property* or *method* access as above, except that if the object being dereferenced is `null` then `null` will be returned rather than an exception thrown. If the dereference is part of a chain, the rest of the chain is skipped.

The effect is similar to wrapping each access in an `is_null()` check first, but more compact.

*Example: Nullsafe operator*

```php
<?php

// As of PHP 8.0.0, this line:
$result = $repository?->getUser(5)?->name;

// Is equivalent to the following code block:
if (is_null($repository)) {
    $result = null;
} else {
    $user = $repository->getUser(5);
    if (is_null($user)) {
        $result = null;
    } else {
        $result = $user->name;
    }
}
?>
```

Note:

The *nullsafe operator* is best used when `null` is considered a valid and expected possible value for a *property* or *method return*. For indicating an error, a *thrown exception* is preferable.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php)

## Class constants

It is possible to *define* *constants* on a per-class basis remaining the same and unchangeable. The *default visibility* of *class constants* is *public*.

Note:

*Class constants* can be *redefined* by a *child class*. As of PHP 8.1.0, *class constants* cannot be *redefined* by a *child class* if it is *defined* as *final*.

It's also possible for *interfaces* to have *constants*.

It's possible to reference the *class* using a *variable*. The variable's value can not be a *keyword* (e.g. `self`, `parent` and `static`).

Note that *class constants* are allocated once per *class*, and not for each *class instance*.

As of PHP 8.3.0, *class constants* can have a *scalar type* such as `bool`, `int`, `float`, `string`, or even `array`. When using `array`, the contents can only be other *scalar types*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.constants.php)

*Example: Class constant*

```php
<?php

class SomeClass
{
    public const SOME_CONSTANT = 'grapefruit';
}

print('Constant value: ' . SomeClass::SOME_CONSTANT . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Constant value: grapefruit
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_constant.php)


*Example: Defining and using a constant*

```php
<?php
class MyClass
{
    const CONSTANT = 'constant value';

    function showConstant() {
        echo  self::CONSTANT . "\n";
    }
}

echo MyClass::CONSTANT . "\n";

$classname = "MyClass";
echo $classname::CONSTANT . "\n";

$class = new MyClass();
$class->showConstant();

echo $class::CONSTANT."\n";
?>
```

### Class name resolution

The *special `::class` constant* allows for *fully qualified class name resolution* at *compile time*, this is useful for *namespaced classes*:

*Example: Namespaced ::class example*

```php
<?php
namespace foo {
    class bar {
    }

    echo bar::class; // foo\bar
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.constants.php)

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

*Example: Class constant expression example*

```php
<?php
const ONE = 1;
class foo {
    const TWO = ONE * 2;
    const THREE = ONE + self::TWO;
    const SENTENCE = 'The value of THREE is '.self::THREE;
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.constants.php)

Note: As of PHP 8.3.0 *visibility variance* is checked more strictly. Prior to this version, the *visibility* of a *class constant* could be different from the *visibility* of the *constant* in the implemented *interface*.

*Example: Fetch class constant syntax, as of PHP 8.3.0*

```php
<?php
class Foo {
    public const BAR = 'bar';
    private const BAZ = 'baz';
}

$name = 'BAR';
echo Foo::{$name}, PHP_EOL; // bar
?>
```

Note:

```
As of PHP 8.3.0, class constants can be fetched dynamically using a variable.
```

### Class constant visibility modifiers

*Example: Class constant visibility*

```php
<?php

class SomeClass
{
    public const SOME_PUBLIC_CONSTANT = 'public';
    protected const SOME_PROTECTED_CONSTANT = 'protected';
    private const SOME_PRIVATE_CONSTANT = 'private';

    function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . self::SOME_PRIVATE_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From the derived class:\n\n"
            . self::SOME_PUBLIC_CONSTANT . PHP_EOL
            . self::SOME_PROTECTED_CONSTANT . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

print(
    "# From the outside:\n\n"
    . SomeClass::SOME_PUBLIC_CONSTANT . PHP_EOL
    . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
# From the base class:

public
protected
private

# From the derived class:

public
protected

# From the outside:

public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_constant_visibility_modifiers.php)

As of PHP 7.1.0, *class constants* may be defined as *public*, *private*, or *protected*. *Constants* declared without any explicit *visibility keyword* are defined as *public*.

*Example: Constant Declaration as of PHP 7.1.0*

```php
<?php
/**
 * Define MyClass
 */
class MyClass
{
    // Declare a public constant
    public const MY_PUBLIC = 'public';

    // Declare a protected constant
    protected const MY_PROTECTED = 'protected';

    // Declare a private constant
    private const MY_PRIVATE = 'private';

    public function foo()
    {
        echo self::MY_PUBLIC;
        echo self::MY_PROTECTED;
        echo self::MY_PRIVATE;
    }
}

$myclass = new MyClass();
MyClass::MY_PUBLIC; // Works
MyClass::MY_PROTECTED; // Fatal Error
MyClass::MY_PRIVATE; // Fatal Error
$myclass->foo(); // Public, Protected and Private work


/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
    // This is public
    function foo2()
    {
        echo self::MY_PUBLIC;
        echo self::MY_PROTECTED;
        echo self::MY_PRIVATE; // Fatal Error
    }
}

$myclass2 = new MyClass2;
echo MyClass2::MY_PUBLIC; // Works
$myclass2->foo2(); // Public and Protected work, not Private
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.visibility.php#language.oop5.visiblity-constants)

*Example: Class constant visibility modifiers, as of PHP 7.1.0*

```php
<?php
class Foo {
    public const BAR = 'bar';
    private const BAZ = 'baz';
}
echo Foo::BAR, PHP_EOL;
echo Foo::BAZ, PHP_EOL;
?>
```

Output of the above example in PHP 7.1:

```
bar

Fatal error: Uncaught Error: Cannot access private const Foo::BAZ in …
```

Note:

As of PHP 7.1.0 *visibility modifiers* are allowed for *class constants*.

*Example: Class constant visibility variance check, as of PHP 8.3.0*

```php
<?php

interface MyInterface
{
    public const VALUE = 42;
}

class MyClass implements MyInterface
{
    protected const VALUE = 42;
}
?>
```

Output of the above example in PHP 8.3:

```
Fatal error: Access level to MyClass::VALUE must be public (as in interface MyInterface) …
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.constants.php)

### Class constant type declarations

*Example: Class constant type declarations*

```php
<?php

class SomeClass
{
    const mixed MIXED_CONSTANT = null;
    const bool BOOLEAN_CONSTANT = true;
    const int INTEGER_CONSTANT = 5;
    const float FLOATING_POINT_CONSTANT = 2.4;
    const string STRING_CONSTANT = 'hello';
    const array ARRAY_CONSTANT = [3, 5, 7];
    const iterable ITERABLE_CONSTANT = [
        2 => "Hello, there!",
        'color' => 'orange',
        3.14 => 'PI',
    ];
}

print(
    var_export(SomeClass::MIXED_CONSTANT, true) . ' (' . gettype(SomeClass::MIXED_CONSTANT) . ")\n"
    . var_export(SomeClass::BOOLEAN_CONSTANT, true) . ' (' . gettype(SomeClass::BOOLEAN_CONSTANT) . ")\n"
    . var_export(SomeClass::INTEGER_CONSTANT, true) . ' (' . gettype(SomeClass::INTEGER_CONSTANT) . ")\n"
    . var_export(SomeClass::FLOATING_POINT_CONSTANT, true) . ' (' . gettype(SomeClass::FLOATING_POINT_CONSTANT) . ")\n"
    . var_export(SomeClass::STRING_CONSTANT, true) . ' (' . gettype(SomeClass::STRING_CONSTANT) . ")\n"
    . var_export(SomeClass::ARRAY_CONSTANT, true) . ' (' . gettype(SomeClass::ARRAY_CONSTANT) . ")\n"
    . var_export(SomeClass::ITERABLE_CONSTANT, true) . ' (' . gettype(SomeClass::ITERABLE_CONSTANT) . ")\n"
);

```

**Result (PHP 8.4)**:

```
NULL (NULL)
true (boolean)
5 (integer)
2.4 (double)
'hello' (string)
array (
  0 => 3,
  1 => 5,
  2 => 7,
) (array)
array (
  2 => 'Hello, there!',
  'color' => 'orange',
  3 => 'PI',
) (array)
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_constant_type_declarations.php)

*Example: Assigning types to class constants, as of PHP 8.3.0*

```php
<?php

class MyClass {
    public const bool MY_BOOL = true;
    public const int MY_INT = 1;
    public const float MY_FLOAT = 1.01;
    public const string MY_STRING = 'one';
    public const array MY_ARRAY = [self::MY_BOOL, self::MY_INT, self::MY_FLOAT, self::MY_STRING];
}

var_dump(MyClass::MY_BOOL);
var_dump(MyClass::MY_INT);
var_dump(MyClass::MY_FLOAT);
var_dump(MyClass::MY_STRING);
var_dump(MyClass::MY_ARRAY);
?>
```

Output of the above example in PHP 8.3:

```
bool(true)
int(1)
float(1.01)
string(3) "one"
array(4) {
  [0]=>
  bool(true)
  [1]=>
  int(1)
  [2]=>
  float(1.01)
  [3]=>
  string(3) "one"
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.constants.php)

## Properties

*Class member variables* are called ***properties***. They may be referred to using other terms such as *fields*, but for the purposes of this reference properties will be used.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties)

*Example: Class property*

```php
<?php

class SomeClass
{
    public $someProperty = 'lemon';
}

$someObject = new SomeClass();

print('Dynamically accessed property value: ' . $someObject->someProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Dynamically accessed property value: lemon
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property.php)

### Static properties

*Example: Class static property*

```php
<?php

class SomeClass
{
    public static $someStaticProperty = 'lemon';
}

print('Statically accessed static property value: ' . SomeClass::$someStaticProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Statically accessed static property value: lemon
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_static_property.php)

***Static properties*** are accessed using the *scope resolution operator* (`::`) and cannot be accessed through the *object operator* (`->`).

It's possible to reference the *class* using a *variable*. The *variable's value* cannot be a *keyword* (e.g. `self`, `parent` and `static`).

*Example: Static property example*

```php
<?php
class Foo
{
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}


print Foo::$my_static . "\n";

$foo = new Foo();
print $foo->staticValue() . "\n";
print $foo->my_static . "\n";      // Undefined "Property" my_static

print $foo::$my_static . "\n";
$classname = 'Foo';
print $classname::$my_static . "\n";

print Bar::$my_static . "\n";
$bar = new Bar();
print $bar->fooStatic() . "\n";
?>
```

Output of the above example in PHP 8 is similar to:

```
foo
foo

Notice: Accessing static property Foo::$my_static as non static in /in/V0Rvv on line 23

Warning: Undefined property: Foo::$my_static in /in/V0Rvv on line 23

foo
foo
foo
foo
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.static.php#language.oop5.static.properties)

### Property definition

They are defined by using at least one modifier (such as *visibility*, *`static` keyword*, or, as of PHP 8.1.0, `readonly`), optionally (except for *readonly properties*), as of PHP 7.4, followed by a *type declaration*, followed by a *normal variable declaration*. This declaration may include an *initialization*, but this *initialization* must be a *constant value*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties)

*Example: Class property definition*

```php
<?php

class SomeClass
{
    public $publicProperty;
    static $staticProperty;
    readonly string $readonlyProperty;
    final $finalProperty;
}

var_dump(get_class_vars(SomeClass::class));

```

**Result (PHP 8.4)**:

```
array(4) {
  ["publicProperty"]=>
  NULL
  ["readonlyProperty"]=>
  NULL
  ["finalProperty"]=>
  NULL
  ["staticProperty"]=>
  NULL
}
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property_definition.php)

*Example: Class property definition required modifier*

```php
<?php

class SomeClass
{
    public $publicProperty = 'public';
    static $staticProperty = 'static';
    readonly string $readonlyProperty;
    final $finalProperty = 'final';

    function __construct()
    {
        $this->readonlyProperty = 'readonly';
    }
}

$someObject = new SomeClass();

print(
    $someObject->publicProperty . PHP_EOL
    . SomeClass::$staticProperty . PHP_EOL
    . $someObject->readonlyProperty . PHP_EOL
    . $someObject->finalProperty . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
public
static
readonly
final
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property_definition_required_modifier.php)

Note:

An obsolete way of declaring class properties, is by using the *`var` keyword* instead of a *modifier*.

*Example: Property declarations*

```php
<?php
class SimpleClass
{
   public $var1 = 'hello ' . 'world';
   public $var2 = <<<EOD
hello world
EOD;
   public $var3 = 1+2;
   // invalid property declarations:
   public $var4 = self::myStaticMethod();
   public $var5 = $myVar;

   // valid property declarations:
   public $var6 = myConstant;
   public $var7 = [true, false];

   public $var8 = <<<'EOD'
hello world
EOD;

   // Without visibility modifier:
   static $var9;
   readonly int $var10;
}
?>
```

Note:

There are various *functions* to handle *classes* and *objects*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties)

### Property visibility modifiers

*Class properties* may be *defined* as `public`, `private`, or `protected`. *Properties* declared without any explicit *visibility keyword* are defined as *public*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties)

*Example: Class property visibility modifiers*

```php
<?php

class SomeClass
{
    public $somePublicProperty = 'public';
    protected $someProtectedProperty = 'protected';
    private $somePrivateProperty = 'private';

    function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . $this->somePrivateProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

print(
    "# From the outside:\n\n"
    . $someObject->somePublicProperty . PHP_EOL
    . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
# From the base class:

public
protected
private

# From the derived class:

public
protected

# From the outside:

public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_constant_visibility_modifiers.php)

*Example: Property declaration*

```php
<?php
/**
 * Define MyClass
 */
class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj = new MyClass();
echo $obj->public; // Works
echo $obj->protected; // Fatal Error
echo $obj->private; // Fatal Error
$obj->printHello(); // Shows Public, Protected and Private


/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
    // We can redeclare the public and protected properties, but not private
    public $public = 'Public2';
    protected $protected = 'Protected2';

    function printHello()
    {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

$obj2 = new MyClass2();
echo $obj2->public; // Works
echo $obj2->protected; // Fatal Error
echo $obj2->private; // Undefined
$obj2->printHello(); // Shows Public2, Protected2, Undefined

?>
```

Note: A *property* *declared* without a *visibility modifier* will be *declared* as *public*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties)

*Example: Class property declaration default visibility*

```php
<?php

class SomeClass
{
    static $staticProperty = 'static';
    readonly string $readonlyProperty;
    final $finalProperty = 'final';

    function __construct()
    {
        $this->readonlyProperty = 'readonly';
    }
}

$someObject = new SomeClass();

print(
    SomeClass::$staticProperty . PHP_EOL
    . $someObject->readonlyProperty . PHP_EOL
    . $someObject->finalProperty . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
public
static
readonly
final
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property_declaration_default_visibility.php)

### Asymmetric property visibility

As of PHP 8.4, *object properties* may also have their *visibility* set *asymmetrically*, with a different *scope* for *reading (get)* and *writing (set)*. Specifically, the *set visibility* may be specified separately, provided it is not more permissive than the *default visibility*.

*Example: Asymmetric property visibility*

```php
<?php
class Book
{
    public function __construct(
        public private(set) string $title,
        public protected(set) string $author,
        protected private(set) int $pubYear,
    ) {}
}

class SpecialBook extends Book
{
    public function update(string $author, int $year): void
    {
        $this->author = $author; // OK
        $this->pubYear = $year; // Fatal Error
    }
}

$b = new Book('How to PHP', 'Peter H. Peterson', 2024);

echo $b->title; // Works
echo $b->author; // Works
echo $b->pubYear; // Fatal Error

$b->title = 'How not to PHP'; // Fatal Error
$b->author = 'Pedro H. Peterson'; // Fatal Error
$b->pubYear = 2023; // Fatal Error
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.visibility.php#language.oop5.visibility-members)

*Example: Class property asymetric visibility*

```php
<?php

class SomeClass
{
    protected(set) string $someProperty = 'protected(set)';
    protected private(set) string $otherProperty = 'protected private(set)';

    function someSettingMethod()
    {
        print("# In the base class\n\n");
        $this->someProperty .= ' - modified in base class';
        $this->otherProperty .= ' - modified in base class';
    }

    function someGettingMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherSettingMethod()
    {
        print("# In the derived class\n\n");
        $this->someProperty .= ' - modified in derived class';
    }

    function otherGettingMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someGettingMethod();
$someObject->someSettingMethod();
var_dump($someObject);
print(PHP_EOL);

$otherObject = new OtherClass();
$otherObject->otherSettingMethod();
$otherObject->otherGettingMethod();
var_dump($otherObject);
print(PHP_EOL);

print(
    "# From the outside:\n\n"
    . $someObject->someProperty . PHP_EOL
    . PHP_EOL
);

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
# From the base class:

protected(set)
protected private(set)

# In the base class

object(SomeClass)#1 (2) {
  ["someProperty"]=>
  string(39) "protected(set) - modified in base class"
  ["otherProperty":protected]=>
  string(47) "protected private(set) - modified in base class"
}

# In the derived class

# From the derived class:

protected(set) - modified in derived class
protected private(set)

object(OtherClass)#2 (2) {
  ["someProperty"]=>
  string(42) "protected(set) - modified in derived class"
  ["otherProperty":protected]=>
  string(22) "protected private(set)"
}

# From the outside:

protected(set) - modified in base class

object(SomeClass)#1 (2) {
  ["someProperty"]=>
  string(39) "protected(set) - modified in base class"
  ["otherProperty":protected]=>
  string(47) "protected private(set) - modified in base class"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property_asymetric_visibility.php)

As of PHP 8.5, set *visibility* may also be applied to *static properties* of *classes*.

*Example: Asymmetric static property visibility*

```php
<?php
class Manager
{
    public private(set) static int $calls = 0;

    public function doAThing(): string
    {
        self::$calls++;
        // Do other stuff.
        return "some string";
    }
}

$m = new Manager();

$m->doAThing(); // Works
echo Manager::$calls; // Works
Manager::$calls = 5; // Fatal error
?>
```

The above example will output:

```
1
Fatal error: Uncaught Error: Cannot modify private(set) property Manager::$calls from global scope in /some/file.php
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.visibility.php#language.oop5.visibility-members)

There are a few caveats regarding *asymmetric visibility*:

* Only *typed properties* may have a separate *set visibility*.
* The *set visibility* must be the same as *get* or more restrictive. That is, `public protected(set)` and `protected protected(set)` are allowed, but `protected public(set)` will cause a syntax error.
* If a *property* is *public*, then the *main visibility* may be omitted. That is, `public private(set)` and `private(set)` will have the same result.
* A property with `private(set)` *visibility* is automatically *final*, and may not be redeclared in a *child class*.
* Obtaining a *reference* to a *property* follows *set visibility*, not *get*. That is because a *reference* may be used to modify the *property value*.
* Similarly, trying to write to an *array* *property* involves both a *get* and *set operation* internally, and therefore will follow the *set visibility*, as that is always the more restrictive.

Note: Spaces are not allowed in the *set-visibility declaration*. `private(set)` is correct. `private( set )` is not correct and will result in a parse error.

When a *class* *extends* another, the *child class* may redefine any *property* that is not *final*. When doing so, it may widen either the *main visibility* or the *set visibility*, provided that the new *visibility* is the same or wider than the *parent class*. However, be aware that if a *private property* is *overridden*, it does not actually change the parent's *property* but creates a new *property* with a different internal name.

*Example: Asymmetric property inheritance*

```php
<?php
class Book
{
    protected string $title;
    public protected(set) string $author;
    protected private(set) int $pubYear;
}

class SpecialBook extends Book
{
    public protected(set) string $title; // OK, as reading is wider and writing the same.
    public string $author; // OK, as reading is the same and writing is wider.
    public protected(set) int $pubYear; // Fatal Error. private(set) properties are final.
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.visibility.php#language.oop5.visibility-members)

*Example: Class property asymetric visibility and inheritance property redefinition*

```php
<?php

class SomeClass
{
    protected string $someProperty = 'protected';
    protected private(set) string $otherProperty = 'protected private(set)'; // final

    function someSettingMethod()
    {
        print("# In the base class\n\n");
        $this->someProperty .= ' - modified in base class';
        $this->otherProperty .= ' - modified in base class';
    }

    function someGettingMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    public protected(set) string $someProperty = 'public protected(set)';

    function otherSettingMethod()
    {
        print("# In the derived class\n\n");
        $this->someProperty .= ' - modified in derived class';
    }

    function otherGettingMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->someProperty . PHP_EOL
            . $this->otherProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someGettingMethod();
$someObject->someSettingMethod();
var_dump($someObject);
print(PHP_EOL);

$otherObject = new OtherClass();
$otherObject->otherSettingMethod();
$otherObject->otherGettingMethod();
var_dump($otherObject);
print(PHP_EOL);

print(
    "# From the outside (object of derived class):\n\n"
    . $otherObject->someProperty . PHP_EOL
    . PHP_EOL
);

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
# From the base class:

protected
protected private(set)

# In the base class

object(SomeClass)#1 (2) {
  ["someProperty":protected]=>
  string(34) "protected - modified in base class"
  ["otherProperty":protected]=>
  string(47) "protected private(set) - modified in base class"
}

# In the derived class

# From the derived class:

public protected(set) - modified in derived class
protected private(set)

object(OtherClass)#2 (2) {
  ["someProperty"]=>
  string(49) "public protected(set) - modified in derived class"
  ["otherProperty":protected]=>
  string(22) "protected private(set)"
}

# From the outside (object of derived class):

public protected(set) - modified in derived class

object(SomeClass)#1 (2) {
  ["someProperty":protected]=>
  string(34) "protected - modified in base class"
  ["otherProperty":protected]=>
  string(47) "protected private(set) - modified in base class"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property_asymetric_visibility_and_inheritance_redefinition.php)

### Property type declarations

As of PHP 7.4.0, *property definitions* can include *type declarations*, with the exception of *callable*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.typed-properties)

*Example: Class property type declarations*

```php
<?php

class SomeClass
{
    public mixed $mixedProperty = null;
    public bool $booleanProperty = true;
    public int $integerProperty = 5;
    public float $floatingPointProperty = 2.4;
    public string $stringProperty = 'hello';
    public array $arrayProperty = [3, 5, 7];
    public iterable $iterableProperty = [
        2 => "Hello, there!",
        'color' => 'orange',
        3.14 => 'PI',
    ];
    public stdClass $simpleObjectProperty;
    public OtherClass $objectProperty;

    function __construct()
    {
        $this->simpleObjectProperty = (object) [
            2 => "Hello, there!",
            'color' => 'orange',
            3.14 => 'PI',
        ];

        $this->objectProperty = new OtherClass();
    }
}

class OtherClass
{
}

$someObject = new SomeClass();

print(
    var_export($someObject->mixedProperty, true) . ' (' . gettype($someObject->mixedProperty) . ")\n"
    . var_export($someObject->booleanProperty, true) . ' (' . gettype($someObject->booleanProperty) . ")\n"
    . var_export($someObject->integerProperty, true) . ' (' . gettype($someObject->integerProperty) . ")\n"
    . var_export($someObject->floatingPointProperty, true) . ' (' . gettype($someObject->floatingPointProperty) . ")\n"
    . var_export($someObject->stringProperty, true) . ' (' . gettype($someObject->stringProperty) . ")\n"
    . var_export($someObject->arrayProperty, true) . ' (' . gettype($someObject->arrayProperty) . ")\n"
    . var_export($someObject->iterableProperty, true) . ' (' . gettype($someObject->iterableProperty) . ")\n"
    . var_export($someObject->simpleObjectProperty, true) . ' (' . gettype($someObject->simpleObjectProperty) . ")\n"
    . var_export($someObject->objectProperty, true) . ' (' . gettype($someObject->objectProperty) . ")\n"
);

```

**Result (PHP 8.4)**:

```
NULL (NULL)
true (boolean)
5 (integer)
2.4 (double)
'hello' (string)
array (
  0 => 3,
  1 => 5,
  2 => 7,
) (array)
array (
  2 => 'Hello, there!',
  'color' => 'orange',
  3 => 'PI',
) (array)
(object) array(
   '2' => 'Hello, there!',
   'color' => 'orange',
   '3' => 'PI',
) (object)
\OtherClass::__set_state(array(
)) (object)
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property_type_declarations.php)

*Example: Nullsafe properties*

```php
<?php

class SomeClass
{
    public $someProperty = null;

    function __construct($empty)
    {
        if (! $empty) {
            $this->someProperty = new OtherClass();
        }
    }
}

class OtherClass
{
    public $otherProperty = 'vanilla';
}

function someFunction($emptyResult, $emptyProperty)
{
    if ($emptyResult) {
        return null;
    }

    return new SomeClass($emptyProperty);
}

$result = someFunction(true, true)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, true)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, false)?->someProperty?->otherProperty;
print('Result: ' . $result . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Result:
Result:
Result: vanilla
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/nullsafe_properties.php)

*Example: Example of typed properties*

```php
<?php

class User
{
    public int $id;
    public ?string $name;

    public function __construct(int $id, ?string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

$user = new User(1234, null);

var_dump($user->id);
var_dump($user->name);

?>
```

The above example will output:

```
int(1234)
NULL
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.typed-properties)

### Property access

Within *class methods* *non-static properties* may be accessed by using `->` (*object perator*): `$this->property` (where `property` is the name of the *property*). *Static properties* are accessed by using the `::` (double colon): `self::$property`.

The *pseudo-variable* `$this` is available inside any *class method* when that *method* is called from within an *object context*. `$this` is the *value* of the *calling object*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties)

*Example: Class property access*

```php
<?php

class SomeClass
{
    static $someStaticProperty = 'base static';
    public $somePublicProperty = 'base public';
    protected $someProtectedProperty = 'base protected';
    private $somePrivateProperty = 'base private';

    function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . self::$someStaticProperty . PHP_EOL
            . static::$someStaticProperty . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . $this->somePrivateProperty . PHP_EOL
            . PHP_EOL
        );
    }

    static function staticMethod()
    {
        print(
            "# From the base class:\n\n"
            . self::$someStaticProperty . PHP_EOL
            . static::$someStaticProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From first derived class:\n\n"
            . self::$someStaticProperty . PHP_EOL
            . static::$someStaticProperty . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . $this->someProtectedProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

class AnotherClass extends SomeClass
{
    static $someStaticProperty = 'derived static';
    public $somePublicProperty = 'derived public';

    function anotherFunction()
    {
         print(
            "# From second derived class:\n\n"
            . static::$someStaticProperty . PHP_EOL
            . self::$someStaticProperty . PHP_EOL
            . $this->somePublicProperty . PHP_EOL
            . parent::$someStaticProperty . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

$anotherObject = new AnotherClass();
$anotherObject->anotherFunction();

print(
    "# From the outside:\n\n"
    . $someObject->somePublicProperty . PHP_EOL
    . PHP_EOL
);

$someObject->staticMethod();
$anotherObject->staticMethod();

```

**Result (PHP 8.4)**:

```
# From the base class:

base static
base static
base public
base protected
base private

# From first derived class:

base static
base static
base public
base protected

# From second derived class:

derived static
derived static
derived public
base static

# From the outside:

base public

# From the base class:

base static
base static

# From the base class:

base static
derived static

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_property_access.php)

*Typed properties* must be *initialized* before *accessing*, otherwise an `Error` is thrown.

*Example: Accessing properties*

```php
<?php

class Shape
{
    public int $numberOfSides;
    public string $name;

    public function setNumberOfSides(int $numberOfSides): void
    {
        $this->numberOfSides = $numberOfSides;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getNumberOfSides(): int
    {
        return $this->numberOfSides;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

$triangle = new Shape();
$triangle->setName("triangle");
$triangle->setNumberofSides(3);
var_dump($triangle->getName());
var_dump($triangle->getNumberOfSides());

$circle = new Shape();
$circle->setName("circle");
var_dump($circle->getName());
var_dump($circle->getNumberOfSides());
?>
```

The above example will output:

```
string(8) "triangle"
int(3)
string(6) "circle"

Fatal error: Uncaught Error: Typed property Shape::$numberOfSides must not be accessed before initialization
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.typed-properties)

*Example: Class typed property initialisation before access*

```php
<?php

class SomeClass
{
    public $untypedProperty;
    public string $typedProperty = 'initialised';
}

$someObject = new SomeClass();

print('Untyped: ' . $someObject->untypedProperty . PHP_EOL);
print('Typed:' . $someObject->typedProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Untyped:
Typed:initialised
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_typed_property_initialisation_before_access.php)

### Readonly properties

As of PHP 8.1.0, a *property* can be declared with the *`readonly` modifier*, which prevents *modification* of the *property* after *initialization*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.readonly-properties)

*Example: Example of readonly properties*

```php
<?php

class Test {
   public readonly string $prop;

   public function __construct(string $prop) {
       // Legal initialization.
       $this->prop = $prop;
   }
}

$test = new Test("foobar");
// Legal read.
var_dump($test->prop); // string(6) "foobar"

// Illegal reassignment. It does not matter that the assigned value is the same.
$test->prop = "foobar";
// Error: Cannot modify readonly property Test::$prop
?>
```

Note:

The *`readonly` modifier* can only be applied to *typed properties*. A *readonly property* without *type constraints* can be created using the *`mixed` type*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.readonly-properties)

*Example: Class readonly property*

```php
<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

$someObject = new SomeClass(32);

print($someObject->someReadonlyProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
32
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_readonly_property.php)

*Example: Class readonly property initialisation*

```php
<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

class OtherClass
{
    readonly mixed $otherReadonlyProperty;

    function initialiseReadonlyProperty(int $value)
    {
        $this->otherReadonlyProperty = $value;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$otherObject = new OtherClass();
$otherObject->initialiseReadonlyProperty(64);
print($otherObject->otherReadonlyProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
32
64
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_readonly_property_initialisation.php)

Note:

*Readonly static properties* are not supported.

A *readonly property* can only be *initialized* once, and only from the *scope* where it has been *declared*. Any other *assignment* or *modification* of the *property* will result in an `Error` exception.

*Example: Illegal initialization of readonly properties*

```php
<?php
class Test1 {
    public readonly string $prop;
}

$test1 = new Test1;
// Illegal initialization outside of private scope.
$test1->prop = "foobar";
// Error: Cannot initialize readonly property Test1::$prop from global scope
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.readonly-properties)

*Example: Class readonly property initialisation scope*

```php
<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

abstract class OtherClass
{
    readonly mixed $otherReadonlyProperty;
}

class AnotherClass extends OtherClass
{
    function __construct(int $value = 64)
    {
        $this->otherReadonlyProperty = $value * 2;
    }
}

$someObject = new SomeClass(64);
print($someObject->someReadonlyProperty . PHP_EOL);

$anotherObject = new AnotherClass();
print($anotherObject->otherReadonlyProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
64
128
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_readonly_property_initialisation_scope.php)

As of PHP 8.3.0, *readonly properties* can be reinitialized when *cloning* an *object* using the `__clone()` *method*.

*Example: Readonly properties and cloning*

```php
<?php
class Test1 {
    public readonly ?string $prop;

    public function __clone() {
        $this->prop = null;
    }

    public function setProp(string $prop): void {
        $this->prop = $prop;
    }
}

$test1 = new Test1;
$test1->setProp('foobar');

$test2 = clone $test1;
var_dump($test2->prop); // NULL
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.readonly-properties)

*Example: Class readonly property initialisation during cloning*

```php
<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }

    function __clone()
    {
        $this->someReadonlyProperty = 2;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$clonedObject = clone $someObject;
print($clonedObject->someReadonlyProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
32
2
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_readonly_property_initialisation_during_cloning.php)

Prior to PHP 8.4.0 a *readonly property* is implicitly *private-set*, and may only be written to from the same *class*. As of PHP 8.4.0, *readonly properties* are implicitly *protected (set)*, so may be set from *child classes*. That may be *overridden* explicitly if desired.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.readonly-properties)

*Example: Class readonly property visibility*

```php
<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = $value;
    }
}

class OtherClass
{
    function __construct(int $value = 64)
    {
        $this->someReadonlyProperty = $value * 2;
    }
}

$someObject = new SomeClass(32);
print($someObject->someReadonlyProperty . PHP_EOL);

$otherObject = new OtherClass();
print($otherObject->someReadonlyProperty . PHP_EOL);

```

**Result (PHP 8.4)**:

```
32
128
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_readonly_property_visibility.php)

Note:

Specifying an explicit *default value* on *readonly properties* is not allowed, because a *readonly property* with a *default value* is essentially the same as a *constant*, and thus not particularly useful.

```php
<?php

class Test {
    // Fatal error: Readonly property Test::$prop cannot have default value
    public readonly int $prop = 42;
}
?>
```

Note:

*Readonly properties* cannot be `unset()` once they are *initialized*. However, it is possible to *unset* a *readonly property* prior to *initialization*, from the scope where the *property* has been *declared*.

*Modifications* are not necessarily plain *assignments*, all of the following will also result in an `Error` exception:

```php
<?php

class Test {
    public function __construct(
        public readonly int $i = 0,
        public readonly array $ary = [],
    ) {}
}

$test = new Test;
$test->i += 1;
$test->i++;
++$test->i;
$test->ary[] = 1;
$test->ary[0][] = 1;
unset($test->ary[0]);
$ref =& $test->i;
$test->i =& $ref;
byRef($test->i);
foreach ($test as &$prop);
?>
```

However, *readonly properties* do not preclude *interior mutability*. *Objects* (or *resources*) stored in *readonly properties* may still be modified internally:

```php
<?php

class Test {
    public function __construct(public readonly object $obj) {}
}

$test = new Test(new stdClass);
// Legal interior mutation.
$test->obj->foo = 1;
// Illegal reassignment.
$test->obj = new stdClass;
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php#language.oop5.properties.readonly-properties)

*Example: Class readonly property interior mutability*

```php
<?php

class SomeClass
{
    readonly mixed $someReadonlyProperty;
    readonly mixed $otherReadonlyProperty;

    function __construct(int $value)
    {
        $this->someReadonlyProperty = (object) [
            'interior' => $value
        ];;
    }
}

$someObject = new SomeClass(32);

print_r($someObject->someReadonlyProperty);
print(PHP_EOL);

$someObject->someReadonlyProperty->interior = 64;

print_r($someObject->someReadonlyProperty);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
64
128
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_readonly_property_interior_mutability.php)

### Dynamic properties

If trying to *assign* to a non-existent *property* on an *object*, PHP will automatically create a corresponding *property*. This *dynamically created property* will only be available on this *class instance*.

Warning

*Dynamic properties* are deprecated as of PHP 8.2.0. It is recommended to *declare* the *property* instead. To handle arbitrary *property names*, the *class* should implement the *magic methods* `__get()` and `__set()`. At last resort the *class* can be marked with the `#[\AllowDynamicProperties]` attribute.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php)

*Example: Class dynamic property*

```php
<?php

class SomeClass
{
    public $someProperty = 1;
}

$someObject = new SomeClass();

print_r($someObject);
print(PHP_EOL);

$someObject->someDynamicProperty = 2;
$someObject->otherDynamicProperty = 3;

print_r($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
SomeClass Object
(
    [someProperty] => 1
)

SomeClass Object
(
    [someProperty] => 1
    [someDynamicProperty] => 2
    [otherDynamicProperty] => 3
)

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_dynamic_property.php)

## Methods

*Example: Class method*

```php
<?php

class SomeClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    public function someMethod()
    {
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
        print('Dynamically accessed property value: ' . $this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();

print("Method dynamic call:\n");
$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
Method dynamic call:
Statically accessed constant value (by self): grapefruit
Statically accessed constant value (by static): grapefruit
Statically accessed static property value (by self): lemon
Statically accessed static property value (by static): lemon
Dynamically accessed property value: orange
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_method.php)

### Static methods

*Example: Class static method*

```php
<?php

class SomeClass
{
    public const SOME_CONSTANT = 'grapefruit';
    public static $someStaticProperty = 'lemon';
    public $someProperty = 'orange';

    public static function someStaticMethod()
    {
        print('Statically accessed constant value (by self): ' . self::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed constant value (by static): ' . static::SOME_CONSTANT . PHP_EOL);
        print('Statically accessed static property value (by self): ' . self::$someStaticProperty . PHP_EOL);
        print('Statically accessed static property value (by static): ' . static::$someStaticProperty . PHP_EOL);
    }
}

print("Static method static call:\n");
SomeClass::someStaticMethod();
print(PHP_EOL);

$someObject = new SomeClass();

print("Static method dynamic call:\n");
$someObject->someStaticMethod();
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Static method static call:
Statically accessed constant value (by self): grapefruit
Statically accessed constant value (by static): grapefruit
Statically accessed static property value (by self): lemon
Statically accessed static property value (by static): lemon

Static method dynamic call:
Statically accessed constant value (by self): grapefruit
Statically accessed constant value (by static): grapefruit
Statically accessed static property value (by self): lemon
Statically accessed static property value (by static): lemon

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_static_method.php)

Because ***static methods*** are callable without an instance of the object created, the pseudo-variable $this is not available inside methods declared as static.

Warning

Calling *non-static methods* statically throws an `Error`.

Prior to PHP 8.0.0, calling *non-static methods* statically was deprecated, and generated an `E_DEPRECATED` warning.

*Example: Static method example*

```php
<?php
class Foo {
    public static function aStaticMethod() {
        // ...
    }
}

Foo::aStaticMethod();
$classname = 'Foo';
$classname::aStaticMethod();
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.static.php#language.oop5.static.methods)

### Method visibility modifiers

*Class methods* may be *defined* as *public*, *private*, or *protected*. Methods declared without any explicit *visibility keyword* are *defined* as *public*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.visibility.php#language.oop5.visiblity-methods)

*Example: Class method visibility modifiers*

```php
<?php

class SomeClass
{
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

    function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

print(
    "# From the outside:\n\n"
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
# From the base class:

public
protected
private

# From the derived class:

public
protected

# From the outside:

public

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_method_visibility_modifiers.php)

*Example: Class method visibility and polimorphism*

```php
<?php

class BaseClass
{
    public function somePublicMethod()
    {
        return 'base: public';
    }

    protected function someProtectedMethod()
    {
        return 'base: protected';
    }

    private function somePrivateMethod()
    {
        return 'base: private';
    }

    function someMethod()
    {
        print(
            '# From ' . static::class . PHP_EOL . PHP_EOL
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

class DerivedClass extends BaseClass
{
    function somePublicMethod()
    {
        return 'derived: public';
    }

    function someProtectedMethod()
    {
        return 'derived: protected';
    }

    function somePrivateMethod()
    {
        return 'derived: private';
    }

}

$baseObject = new BaseClass();
$baseObject->someMethod();

$derivedObject = new DerivedClass();
$derivedObject->someMethod();

```

**Result (PHP 8.4)**:

```
# From BaseClass

base: public
base: protected
base: private

# From DerivedClass

derived: public
derived: protected
base: private

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_method_visibility_and_polimorphism.php)

*Example: Method declaration*

```php
<?php
/**
 * Define MyClass
 */
class MyClass
{
    // Declare a public constructor
    public function __construct() { }

    // Declare a public method
    public function MyPublic() { }

    // Declare a protected method
    protected function MyProtected() { }

    // Declare a private method
    private function MyPrivate() { }

    // This is public
    function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClass;
$myclass->MyPublic(); // Works
$myclass->MyProtected(); // Fatal Error
$myclass->MyPrivate(); // Fatal Error
$myclass->Foo(); // Public, Protected and Private work


/**
 * Define MyClass2
 */
class MyClass2 extends MyClass
{
    // This is public
    function Foo2()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate(); // Fatal Error
    }
}

$myclass2 = new MyClass2;
$myclass2->MyPublic(); // Works
$myclass2->Foo2(); // Public and Protected work, not Private

class Bar
{
    public function test() {
        $this->testPrivate();
        $this->testPublic();
    }

    public function testPublic() {
        echo "Bar::testPublic\n";
    }

    private function testPrivate() {
        echo "Bar::testPrivate\n";
    }
}

class Foo extends Bar
{
    public function testPublic() {
        echo "Foo::testPublic\n";
    }

    private function testPrivate() {
        echo "Foo::testPrivate\n";
    }
}

$myFoo = new Foo();
$myFoo->test(); // Bar::testPrivate
                // Foo::testPublic
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.visibility.php#language.oop5.visiblity-methods)

### Method type declarations

*Example: Class method visibility modifiers*

```php
<?php

class SomeClass
{
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

    function someMethod()
    {
        print(
            "# From the base class:\n\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . $this->somePrivateMethod(). PHP_EOL
            . PHP_EOL
        );
    }
}

class OtherClass extends SomeClass
{
    function otherMethod()
    {
        print(
            "# From the derived class:\n\n"
            . $this->somePublicMethod() . PHP_EOL
            . $this->someProtectedMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->someMethod();

$otherObject = new OtherClass();
$otherObject->otherMethod();

print(
    "# From the outside:\n\n"
    . $someObject->somePublicMethod() . PHP_EOL
    . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
30
object

NULL (NULL)
NULL (NULL)
NULL (NULL)
false (boolean)
6 (integer)
4.8 (double)
'<hello>' (string)
array (
  0 => 3,
  1 => 5,
  2 => 7,
  3 => 'element',
) (array)
array (
  2 => 'string',
  'color' => 'string',
  3 => 'string',
) (array)
\Closure::__set_state(array(
)) (object)
\OtherClass::__set_state(array(
)) (object)

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_method_type_declarations.php)

*Example: Nullsafe methods*

```php
<?php

class SomeClass
{
    private $empty;

    public function someMethod()
    {
        if ($this->empty) {
            return null;
        }

        return new OtherClass();
    }

    function __construct($empty)
    {
        $this->empty = $empty;
    }
}

class OtherClass
{
    public function otherMethod()
    {
        return 'vanilla';
    }
}

function someFunction($emptyResult, $emptyMethod)
{
    if ($emptyResult) {
        return null;
    }

    return new SomeClass($emptyMethod);
}

$result = someFunction(true, true)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, true)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);

$result = someFunction(false, false)?->someMethod()?->otherMethod();
print('Result: ' . $result . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Result:
Result:
Result: vanilla
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/nullsafe_methods.php)

## Class properties and methods names

*Class properties* and *methods* live in separate "namespaces", so it is possible to have a *property* and a *method* with the same name. Referring to both a *property* and a *method* has the same notation, and whether a *property* will be *accessed* or a *method* will be *called*, solely depends on the context, i.e. whether the usage is a *variable access* or a *function call*.

*Example: Property access vs. method call*

```php
<?php
class Foo
{
    public $bar = 'property';

    public function bar() {
        return 'method';
    }
}

$obj = new Foo();
echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;
```

The above example will output:

```
property
method
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.properties-methods)

*Example: Property and method with the same name*

```php
<?php

class PaintPalette
{
    public $colours = [
        'red',
        'blue',
        'yellow',
    ];

    function colours()
    {
        return $this->colours;
    }
}

$palette = new PaintPalette();
print_r($palette->colours);
print_r($palette->colours());

```

**Result (PHP 8.4)**:

```
Array
(
    [0] => red
    [1] => blue
    [2] => yellow
)
Array
(
    [0] => red
    [1] => blue
    [2] => yellow
)
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/property_and_method_with_same_name.php)

That means that *calling* an *anonymous function* which has been *assigned* to a *property* is not directly possible. Instead the *property* has to be *assigned* to a *variable* first, for instance. It is possible to *call* such a *property* directly by enclosing it in parentheses.

*Example: Calling an anonymous function stored in a property*

```php
<?php
class Foo
{
    public $bar;

    public function __construct() {
        $this->bar = function() {
            return 42;
        };
    }
}

$obj = new Foo();

echo ($obj->bar)(), PHP_EOL;
```

The above example will output:

```
42
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop5.basic.properties-methods)

*Example: Anonymous function property and method with the same name*

```php
<?php

class PaintPalette
{
    private $palette = [
        'red',
        'blue',
        'yellow',
    ];

    public $colours;

    function __construct()
    {
        $this->colours = function() {
            return $this->palette;
        };
    }

    function colours()
    {
        return $this->palette;
    }
}

$palette = new PaintPalette();
print_r(($palette->colours)());
print_r($palette->colours());

```

**Result (PHP 8.4)**:

```
Array
(
    [0] => red
    [1] => blue
    [2] => yellow
)
Array
(
    [0] => red
    [1] => blue
    [2] => yellow
)
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/anonymous_function_property_and_method_with_same_name.php)

## Property hooks

***Property hooks***, also known as *property accessors* in some other languages, are a way to *intercept* and *override* the *read* and *write behavior* of a *property*. This functionality serves two purposes:

It allows for *properties* to be used directly, without *get-* and *set-* *methods*, while leaving the option open to add additional behavior in the future. That renders most boilerplate *get/set methods* unnecessary, even without using *hooks*.
It allows for *properties* that describe an *object* without needing to store a value directly.
There are two *hooks* available on *non-static properties*: *get* and *set*. They allow overriding the *read* and *write behavior* of a *property*, respectively. *Hooks* are available for both *typed* and *untyped properties*.

A property may be *backed* or *virtual*. A *backed property* is one that actually stores a *value*. Any *property* that has no *hooks* is *backed*. A *virtual property* is one that has *hooks* and those *hooks* do not interact with the *property* itself. In this case, the *hooks* are effectively the same as *methods*, and the *object* does not use any space to store a *value* for that *property*.

*Property hooks* are incompatible with *readonly properties*. If there is a need to restrict access to a *get* or *set operation* in addition to altering its *behavior*, use *asymmetric property visibility*.

[Type declaration, default value and set argument type in the set explicit-argument version are obligatory. -- KK]

[Static properties cannot have hooks, what is obvious considering the need of using `$this` in case of backed property hook and lack of memory usage in case of virtual property hook. -- KK]

Note: Version Information

*Property hooks* were introduced in PHP 8.4.

### Backed hooks

The general syntax for declaring a *hook* is as follows.

*Example: Property hooks (full version)*

```php
<?php
class Example
{
    private bool $modified = false;

    public string $foo = 'default value' {
        get {
            if ($this->modified) {
                return $this->foo . ' (modified)';
            }
            return $this->foo;
        }
        set(string $value) {
            $this->foo = strtolower($value);
            $this->modified = true;
        }
    }
}

$example = new Example();
$example->foo = 'changed';
print $example->foo;
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

At least one of the *hooks* references `$this->foo`, the *property* itself. That means the *property* will be *backed*. When calling `$example->foo = 'changed'`, the provided string will be first cast to lowercase, then saved to the *backing value*. When reading from the *property*, the previously saved value may conditionally be appended with additional text.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set(string $property) {
            $this->someProperty = '<' . $property . '>';
        }
        get {
            return trim($this->someProperty, '<>');
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook.php)

The `$foo` *property* ends in `{}`, rather than a semicolon. That indicates the presence of *hooks*[...] Both *hooks* have a *body*, denoted by `{}`, that may contain arbitrary code.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

Both a *get* and *set hook* are *defined*, although it is allowed to *define* only one or the other.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

On a *backed property*, omitting a *get* or *set hook* means the *default read* or *write behavior* will be used.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class asymetric backed property hook*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set(string $property) {
            $this->someProperty = '<' . $property . '>';
        }
    }
}

class OtherClass
{
    public int $otherProperty = 0 {
        get {
            return $this->otherProperty + 1;
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

$otherObject = new OtherClass();

var_dump($otherObject);
print(PHP_EOL);

$otherObject->otherProperty = 3;

var_dump($otherObject);
print(PHP_EOL);

print($otherObject->otherProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

<pineapple>

object(OtherClass)#2 (1) {
  ["otherProperty"]=>
  int(0)
}

object(OtherClass)#2 (1) {
  ["otherProperty"]=>
  int(3)
}

4

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_asymetric_backed_property_hook.php)

The *set hook* additionally allows specifying the *type* and *name* of an incoming *value*, using the same syntax as a *method*. The *type* must be either the same as the *type* of the *property*, or *contravariant* (wider) to it. For instance, a *property* of *type `string`* could have a set *hook* that accepts `string|Stringable`, but not one that only accepts `array`.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook contravariance*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set(string|array|object $property) {
            $this->someProperty = serialize($property);
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = [1, 2, 3];

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

$someObject->someProperty = (object) [
    'color' => 'green',
    'taste' => 'sour',
];

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(30) "a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}"
}

a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(66) "O:8:"stdClass":2:{s:5:"color";s:5:"green";s:5:"taste";s:4:"sour";}"
}

O:8:"stdClass":2:{s:5:"color";s:5:"green";s:5:"taste";s:4:"sour";}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_contravariance.php)

There are a number of shorthand syntax variants as well to handle common cases.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

If the *set hook's parameter type* is the same as the *property type* (which is typical), it may be omitted. In that case, the *value* to set is automatically given the name `$value`.

*Example: Property set defaults*

This example is equivalent to the previous.

```php
<?php
class Example
{
    private bool $modified = false;

    public string $foo = 'default value' {
        get => $this->foo . ($this->modified ? ' (modified)' : '');

        set {
            $this->foo = strtolower($value);
            $this->modified = true;
        }
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook shorthand omitted parameter type*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set {
            $this->someProperty = '<' . $value . '>';
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_shorthand_omitted_parameter_type.php).

If the *get hook* is a single *expression*, then the `{}` may be omitted and replaced with an *arrow expression*.

*Example: Property get expression*

This example is equivalent to the previous.

```php
<?php
class Example
{
    private bool $modified = false;

    public string $foo = 'default value' {
        get => $this->foo . ($this->modified ? ' (modified)' : '');

        set(string $value) {
            $this->foo = strtolower($value);
            $this->modified = true;
        }
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

If the *set hook* is only setting a modified version of the passed in *value*, then it may also be simplified to an *arrow expression*. The value the *expression* evaluates to will be set on the *backing value*.

*Example: Property set expression*

```php
<?php
class Example
{
    public string $foo = 'default value' {
        get => $this->foo . ($this->modified ? ' (modified)' : '');
        set => strtolower($value);
    }
}
?>
```

This example is not quite equivalent to the previous, as it does not also modify `$this->modified`. If multiple statements are needed in the set *hook body*, use the *braces version*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class backed property hook shorthand expression*

```php
<?php

class SomeClass
{
    public string $someProperty = '' {
        set => $this->someProperty = '<' . $value . '>';
        get => trim($this->someProperty, '<>');
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(0) ""
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_shorthand_expression.php)

A *property* may implement zero, one, or both *hooks* as the situation requires. All shorthand versions are mutually-independent. That is, using a *short-get* with a *long-set*, or a *short-set* with an explicit type, or so on is all valid.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

Note: *Hooks* can be defined when using *constructor property promotion*. However, when doing so, values provided to the *constructor* must match the *type* associated with the *property*, regardless of what the set *hook* might allow. Consider the following:

```php
<?php
class Example
{
    public function __construct(
        public private(set) DateTimeInterface $created {
            set (string|DateTimeInterface $value) {
                if (is_string($value)) {
                    $value = new DateTimeImmutable($value);
                }
                $this->created = $value;
            }
        },
    ) {
    }
}
```

Internally, the engine decomposes this to the following:

```php
<?php
class Example
{
    public private(set) DateTimeInterface $created {
        set (string|DateTimeInterface $value) {
            if (is_string($value)) {
                $value = new DateTimeImmutable($value);
            }
            $this->created = $value;
        }
    }

    public function __construct(
        DateTimeInterface $created,
    ) {
        $this->created = $created;
    }
}
```

Any attempts to set the *property* outside the *constructor* will allow either `string` or `DateTimeInterface` values, but the constructor will only allow `DateTimeInterface`. This is because the *defined type* for the *property* (`DateTimeInterface`) is used as the *parameter type* within the *constructor signature*, regardless of what the *set hook* allows. If this kind of behavior is needed from the *constructor*, *constructor property promotion* cannot be used.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class property hook and construction property promotion*

```php
<?php

class SomeClass
{
    function __construct(
        public string $someProperty = '' {
            set(string $property) {
                $this->someProperty = '<' . $property . '>';
            }
            get {
                return trim($this->someProperty, '<>');
            }
        }
    ) {
    }
}

$someObject = new SomeClass('mango');

var_dump($someObject);
print(PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->someProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(7) "<mango>"
}

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(11) "<pineapple>"
}

pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_backed_property_hook_and_constructor_property_promotion.php)

### Virtual properties

***Virtual properties*** are *properties* that have no *backing value*. A *property* is *virtual* if neither its *get* nor *set hook* references the *property* itself using exact syntax. That is, a *property* named `$foo` whose *hook* contains `$this->foo` will be *backed*. But the following is not a *backed property*, and will error:

*Example: Invalid virtual property*

```php
<?php
class Example
{
    public string $foo {
        get {
            $temp = __PROPERTY__;
            return $this->$temp; // Doesn't refer to $this->foo, so it doesn't count.
        }
    }
}
?>
```

For *virtual properties*, if a *hook* is omitted then that operation does not exist and trying to use it will produce an error. *Virtual properties* take up no memory space in an *object*. *Virtual properties* are suited for "derived" properties, such as those that are the combination of two other properties.

*Example: Virtual property*

```php
<?php
class Rectangle
{
    // A virtual property.
    public int $area {
        get => $this->h * $this->w;
    }

    public function __construct(public int $h, public int $w) {}
}

$s = new Rectangle(4, 5);
print $s->area; // prints 20
$s->area = 30; // Error, as there is no set operation defined.
?>
```

Defining both a *get* and *set hook* on a *virtual property* is also allowed.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php#language.oop5.property-hooks)

*Example: Class virtual property hook*

```php
<?php

class SomeClass
{
    public string $someProperty = 'grapes';
    public string $otherProperty {
        get {
            return 'sweet ' . $this->someProperty;
        }
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print($someObject->otherProperty . PHP_EOL . PHP_EOL);

$someObject->someProperty = 'pineapple';

var_dump($someObject);
print(PHP_EOL);

print($someObject->otherProperty . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(6) "grapes"
}

sweet grapes

object(SomeClass)#1 (1) {
  ["someProperty"]=>
  string(9) "pineapple"
}

sweet pineapple

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/class_virtual_property_hook.php)

Scoping

All *hooks* operate in the *scope* of the *object* being modified. That means they have access to all *public*, *private*, or *protected methods* of the *object*, as well as any *public*, *private*, or *protected properties*, including *properties* that may have their own *property hooks*. Accessing another *property* from within a *hook* does not bypass the *hooks* defined on that *property*.

The most notable implication of this is that non-trivial hooks may sub-call to an arbitrarily complex method if they wish.

*Example: Calling a method from a hook*

```php
<?php
class Person {
    public string $phone {
        set => $this->sanitizePhone($value);
    }

    private function sanitizePhone(string $value): string {
        $value = ltrim($value, '+');
        $value = ltrim($value, '1');

        if (!preg_match('/\d\d\d\-\d\d\d\-\d\d\d\d/', $value)) {
            throw new \InvalidArgumentException();
        }
        return $value;
    }
}
?>
```

### References

Because the presence of *hooks* intercept the *read* and *write process* for *properties*, they cause issues when acquiring a *reference* to a *property* or with indirect modification, such as `$this->arrayProp['key'] = 'value';`. That is because any attempted modification of the *value* by *reference* would bypass a *set hook*, if one is defined.

In the rare case that getting a *reference* to a *property* that has *hooks* defined is necessary, the *get hook* may be prefixed with `&` to cause it to return by *reference*. Defining both `get` and `&get` on the same *property* is a syntax error.

Defining both `&get` and `set` hooks on a *backed property* is not allowed. As noted above, writing to the *value* returned by *reference* would bypass the *set hook*. On *virtual properties*, there is no necessary common value shared between the two *hooks*, so defining both is allowed.

Writing to an *index* of an *array property* also involves an *implicit reference*. For that reason, writing to a *backed array property* with hooks defined is allowed if and only if it defines only a `&get` hook. On a *virtual property*, writing to the *array* returned from either `get` or `&get` is legal, but whether that has any impact on the *object* depends on the *hook* implementation.

Overwriting the entire *array property* is fine, and behaves the same as any other *property*. Only working with elements of the array require special care.

### Serialization

PHP has a number of different ways in which an *object* may be *serialized*, either for public consumption or for debugging purposes. The behavior of *hooks* varies depending on the use case. In some cases, the raw *backing value* of a *property* will be used, bypassing any *hooks*. In others, the *property* will be read or written "through" the *hook*, just like any other normal read/write action.

* `var_dump()`: Use raw value
* `serialize()`: Use raw value
* `unserialize()`: Use raw value
* `__serialize()`/`__unserialize()`: Custom logic, uses get/set hook
* *Array casting*: Use raw value
* `var_export()`: Use get hook
* `json_encode()`: Use get hook
* `JsonSerializable`: Custom logic, uses get hook
* `get_object_vars()`: Use get hook
* `get_mangled_object_vars()`: Use raw value

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.property-hooks.php)

[▵ Up](#class-components)
[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)
