[⌂ Home](../../../README.md)
[▲ Previous: Objects](./objects.md)
[▼ Next: Anonymous classes](./anonymous_classes.md)

# Inheritance

## Description

***Inheritance*** is a well-established programming principle, and PHP makes use of this principle in its *object model*. This principle will affect the way many *classes* and *objects* relate to one another.

For example, when *extending* a *class*, the *subclass* *inherits* all of the *public* and *protected methods*, *properties* and *constants* from the *parent class*. Unless a *class* *overrides* those *methods*, they will retain their original functionality.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

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

This is useful for *defining* and *abstracting* functionality, and permits the *implementation* of additional functionality in similar *objects* without the need to *reimplement* all of the shared functionality.

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

The *visibility* of *methods*, *properties* and *constants* can be relaxed, e.g. a *protected method* can be marked as *public*, but they cannot be restricted, e.g. marking a *public property* as *private*. An exception are *constructors*, whose *visibility* can be restricted, e.g. a *public constructor* can be marked as *private* in a *child class*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php#language.oop5.inheritance)

*Example: Class inheritance and members visibility compatibility*

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
[Example](../../../../example/code/classes_interfaces_traits/classes/inheritance/class_inheritance_and_members_visibility_compatibility.php)

Note:

Unless *autoloading* is used, the *classes* must be *defined* before they are used. If a *class* *extends* another, then the *parent class* must be *declared* before the *child class* structure. This rule applies to *classes* that *inherit* other *classes* and *interfaces*.

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

### Return type compatibility with internal classes

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

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.inheritance.php)

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

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.basic.php#language.oop.lsp)

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

### Class inheritance and constructor signature compatibility rules

Unlike other methods, `__construct()` is exempt from the usual *signature compatibility* rules when being extended.

*Constructors* are ordinary *methods* which are called during the *instantiation* of their corresponding *object*. As such, they may define an arbitrary number of *arguments*, which may be *required*, may have a *type*, and may have a *default value*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor)

## `final` keyword

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

#### Hooks inheritance

##### Final hooks

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

##### Accessing parent hooks

A *hook* in a *child class* may access the *parent class's property* using the `parent::$prop` *keyword*, followed by the desired *hook*. For example, `parent::$propName::get()`. It may be read as "access the prop defined on the parent class, and then run its get operation" (or set operation, as appropriate).

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

[▵ Up](#inheritance)
[⌂ Home](../../../README.md)
[▲ Previous: Objects](./objects.md)
[▼ Next: Anonymous classes](./anonymous_classes.md)
