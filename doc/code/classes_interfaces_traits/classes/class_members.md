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

------

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

------

[▵ Up](#class-components)
[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)
