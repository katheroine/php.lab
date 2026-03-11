[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)

# Class members

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

[▵ Up](#class-components)
[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)
