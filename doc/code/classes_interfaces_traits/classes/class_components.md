[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)

# Class components

## Properties

*Class member variables* are called ***properties***. They may be referred to using other terms such as *fields*, but for the purposes of this reference properties will be used. They are defined by using at least one modifier (such as *visibility*, *`static` keyword*, or, as of PHP 8.1.0, `readonly`), optionally (except for *readonly properties*), as of PHP 7.4, followed by a *type declaration*, followed by a *normal variable declaration*. This declaration may include an *initialization*, but this *initialization* must be a *constant value*.

Note:

An obsolete way of declaring class properties, is by using the *`var` keyword* instead of a *modifier*.

Note: A *property* *declared* without a *visibility modifier* will be *declared* as *public*.

Within *class methods* *non-static properties* may be accessed by using `->` (*object perator*): `$this->property` (where `property` is the name of the *property*). *Static properties* are accessed by using the `::` (double colon): `self::$property`.

The *pseudo-variable* `$this` is available inside any *class method* when that *method* is called from within an *object context*. `$this` is the *value* of the *calling object*.

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

### Type declarations

As of PHP 7.4.0, *property definitions* can include *type declarations*, with the exception of *callable*.

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

### Readonly properties

As of PHP 8.1.0, a *property* can be declared with the *`readonly` modifier*, which prevents *modification* of the *property* after *initialization*. Prior to PHP 8.4.0 a *readonly property* is implicitly *private-set*, and may only be written to from the same *class*. As of PHP 8.4.0, *readonly properties* are implicitly *protected* (set), so may be set from *child classes*. That may be *overridden* explicitly if desired.

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

### Dynamic properties

If trying to *assign* to a non-existent *property* on an *object*, PHP will automatically create a corresponding *property*. This *dynamically created property* will only be available on this *class instance*.

Warning

*Dynamic properties* are deprecated as of PHP 8.2.0. It is recommended to *declare* the *property* instead. To handle arbitrary *property names*, the *class* should implement the *magic methods* `__get()` and `__set()`. At last resort the *class* can be marked with the `#[\AllowDynamicProperties]` attribute.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.properties.php)

## Property hooks

***Property hooks***, also known as *property accessors* in some other languages, are a way to *intercept* and *override* the *read* and *write behavior* of a *property*. This functionality serves two purposes:

It allows for *properties* to be used directly, without *get-* and *set-* *methods*, while leaving the option open to add additional behavior in the future. That renders most boilerplate get/set methods unnecessary, even without using *hooks*.
It allows for *properties* that describe an *object* without needing to store a value directly.
There are two *hooks* available on n*on-static properties*: *get* and *set*. They allow overriding the *read* and *write behavior* of a *property*, respectively. *Hooks* are available for both *typed* and *untyped properties*.

A property may be *backed* or *virtual*. A *backed property* is one that actually stores a *value*. Any *property* that has no *hooks* is *backed*. A *virtual property* is one that has *hooks* and those *hooks* do not interact with the *property* itself. In this case, the *hooks* are effectively the same as *methods*, and the *object* does not use any space to store a *value* for that *property*.

*Property hooks* are incompatible with *readonly properties*. If there is a need to restrict access to a *get* or *set operation* in addition to altering its *behavior*, use *asymmetric property visibility*.

Note: Version Information

*Property hooks* were introduced in PHP 8.4.

### Basic hook syntax

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

The `$foo` *property* ends in `{}`, rather than a semicolon. That indicates the presence of *hooks*. Both a *get* and *set hook* are *defined*, although it is allowed to *define* only one or the other. Both *hooks* have a *body*, denoted by `{}`, that may contain arbitrary code.

The *set hook* additionally allows specifying the *type* and *name* of an incoming *value*, using the same syntax as a *method*. The *type* must be either the same as the type of the *property*, or *contravariant* (wider) to it. For instance, a *property* of *type `string`* could have a set *hook* that accepts `string|Stringable`, but not one that only accepts `array`.

At least one of the *hooks* references `$this->foo`, the *property* itself. That means the *property* will be *backed*. When calling `$example->foo = 'changed'`, the provided string will be first cast to lowercase, then saved to the *backing value*. When reading from the *property*, the previously saved value may conditionally be appended with additional text.

There are a number of shorthand syntax variants as well to handle common cases.

If the *get hook* is a single expression, then the `{}` may be omitted and replaced with an *arrow expression*.

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

A *property* may implement zero, one, or both *hooks* as the situation requires. All shorthand versions are mutually-independent. That is, using a short-get with a long-set, or a short-set with an explicit type, or so on is all valid.

On a *backed property*, omitting a *get* or *set hook* means the *default read* or *write behavior* will be used.

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

#### References

Because the presence of *hooks* intercept the *read* and *write process* for *properties*, they cause issues when acquiring a *reference* to a *property* or with indirect modification, such as `$this->arrayProp['key'] = 'value';`. That is because any attempted modification of the *value* by *reference* would bypass a *set hook*, if one is defined.

In the rare case that getting a *reference* to a *property* that has *hooks* defined is necessary, the *get hook* may be prefixed with `&` to cause it to return by *reference*. Defining both `get` and `&get` on the same *property* is a syntax error.

Defining both `&get` and `set` hooks on a *backed property* is not allowed. As noted above, writing to the *value* returned by *reference* would bypass the *set hook*. On *virtual properties*, there is no necessary common value shared between the two *hooks*, so defining both is allowed.

Writing to an *index* of an *array property* also involves an *implicit reference*. For that reason, writing to a *backed array property* with hooks defined is allowed if and only if it defines only a `&get` hook. On a *virtual property*, writing to the *array* returned from either `get` or `&get` is legal, but whether that has any impact on the object depends on the *hook* implementation.

Overwriting the entire *array property* is fine, and behaves the same as any other property. Only working with elements of the array require special care.

#### Inheritance

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

##### Serialization

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

## Class constants

It is possible to *define* *constants* on a per-class basis remaining the same and unchangeable. The *default visibility* of *class constants* is *public*.

Note:

*Class constants* can be *redefined* by a *child class*. As of PHP 8.1.0, *class constants* cannot be *redefined* by a *child class* if it is *defined* as *final*.

It's also possible for *interfaces* to have *constants*.

It's possible to reference the *class* using a *variable*. The variable's value can not be a *keyword* (e.g. `self`, `parent` and `static`).

Note that *class constants* are allocated once per *class*, and not for each *class instance*.

As of PHP 8.3.0, *class constants* can have a *scalar type* such as `bool`, `int`, `float`, `string`, or even `array`. When using `array`, the contents can only be other *scalar types*.

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

## `static` keyword

Tip

This page describes the use of the `static` *keyword* to define *static methods* and *properties*. `static` can also be used to define *static variables*, define *static anonymous functions* and for *late static bindings*.

Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. These can also be accessed statically within an instantiated class object.

### Static methods

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

### Static properties

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

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.static.php)

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

## Magic methods

***Magic methods*** are special *methods* which override PHP's default's action when certain actions are performed on an *object*.

Caution

All *methods names* starting with `__` are *reserved* by PHP. Therefore, it is not recommended to use such method names unless overriding PHP's behavior.

The following method names are considered magical: `__construct()`, `__destruct()`, `__call()`, `__callStatic()`, `__get()`, `__set()`, `__isset()`, `__unset()`, `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()`, `__toString()`, `__invoke()`, `__set_state()`, `__clone()`, and `__debugInfo()`.

Warning

All *magic methods*, with the exception of `__construct()`, `__destruct()`, and `__clone()`, must be declared as *public*, otherwise an `E_WARNING` is emitted. Prior to PHP 8.0.0, no diagnostic was emitted for the *magic methods* `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()`, and `__set_state()`.

Warning

If *type declarations* are used in the definition of a *magic method*, they must be identical to the *signature* described in this document. Otherwise, a fatal error is emitted. Prior to PHP 8.0.0, no diagnostic was emitted. However, `__construct()` and `__destruct()` must not declare a *return type*; otherwise a fatal error is emitted.

### `__sleep()` and `__wakeup()`

```
public __sleep(): array
public __wakeup(): void
```

`serialize()` checks if the class has a function with the magic name `__sleep()`. If so, that function is executed prior to any *serialization*. It can clean up the *object* and is supposed to *return* an *array* with the *names of all variables of that object* that should be *serialized*. If the method doesn't return anything then `null` is serialized and `E_NOTICE` is issued.

Note:

It is not possible for `__sleep()` to return names of *private properties* in *parent classes*. Doing this will result in an `E_NOTICE` level error. Use `__serialize()` instead.

Note:

As of PHP 8.0.0, *returning* a *value* which is not an *array* from `__sleep()` generates a warning. Previously, it generated a notice.

The intended use of `__sleep()` is to *commit pending data* or *perform* similar *cleanup tasks*. Also, the function is useful if a very large object doesn't need to be saved completely.

Conversely, `unserialize()` checks for the presence of a function with the magic name `__wakeup()`. If present, this function can reconstruct any resources that the *object* may have.

The intended use of `__wakeup()` is to reestablish any database connections that may have been lost during *serialization* and perform other reinitialization tasks.

*Example: Sleep and wakeup*

```php
<?php
class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }

    public function __wakeup()
    {
        $this->connect();
    }
}?>
```

*Example: Basic usage of __sleep*

```php
?php

class SomeClass
{
    public function __sleep(): array
    {
        print(
            "Magic method __sleep\n"
        );

        return [];
    }
}

$someObject = new SomeClass();
serialize($someObject);

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__sleep.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Magic method __sleep
```

*Example: Basic usage of __wakeup*

```php
<?php

class SomeClass
{
    public function __wakeup(): void
    {
        print(
            "Magic method __wakeup\n"
        );
    }
}

$someObject = new SomeClass();
$serialized = serialize($someObject);
unserialize($serialized);

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__wakeup.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Magic method __wakeup
```

### `__serialize()` and `__unserialize()`

```
public __serialize(): array
public __unserialize(array $data): void
```

`serialize()` checks if the *class* has a *function* with the *magic name* `__serialize()`. If so, that *function* is executed prior to any *serialization*. It must construct and return an *associative array* of *key/value pairs* that represent the *serialized form of the object*. If no *array* is returned a `TypeError` will be thrown.

Note:

If both `__serialize()` and `__sleep()` are defined in the same *object*, only `__serialize()` will be called. `__sleep()` will be ignored. If the object implements the `Serializable` interface, the interface's `serialize()` method will be ignored and `__serialize()` used instead.

The intended use of `__serialize()` is to define a *serialization-friendly arbitrary representation of the object*. Elements of the *array* may correspond to *properties* of the *object* but that is not required.

Conversely, `unserialize()` checks for the presence of a function with the magic name `__unserialize()`. If present, this function will be passed the restored *array* that was returned from `__serialize()`. It may then restore the *properties* of the *object* from that *array* as appropriate.

Note:

If both `__unserialize()` and `__wakeup()` are defined in the same *object*, only `__unserialize()` will be called. `__wakeup()` will be ignored.

Note:

This feature is available as of PHP 7.4.0.

*Example: Serialize and unserialize*

```php
<?php
class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __serialize(): array
    {
        return [
          'dsn' => $this->dsn,
          'user' => $this->username,
          'pass' => $this->password,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->dsn = $data['dsn'];
        $this->username = $data['user'];
        $this->password = $data['pass'];

        $this->connect();
    }
}?>
```

*Example: Basic usage of __serialize*

```php
<?php

class SomeClass
{
    public function __serialize(): array
    {
        print(
            "Magic method __serialize\n"
        );

        return [];
    }
}

$someObject = new SomeClass();
serialize($someObject);

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__serialize.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Magic method __serialize
```

*Example: Basic usage of __unserialize*

```php
<?php

class SomeClass
{
    public $variable;

    public function __unserialize(array $data): void
    {
        print(
            "Magic method __unserialize\n"
            . "Data: "
        );
        var_dump($data);
    }
}

$someObject = new SomeClass();
$serialized = serialize($someObject);
unserialize($serialized);

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__unserialize.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Magic method __unserialize
Data: array(1) {
  ["variable"]=>
  NULL
}
```

## `__toString()`

```
public __toString(): string
```

The `__toString()` method allows a *class* to decide how it will *react when it is treated like a string*. For example, what `echo $obj;` will print.

Warning

As of PHP 8.0.0, the *return value* follows standard PHP *type semantics*, meaning it will be *coerced* into a `string` if possible and if *strict typing* is disabled.

A `Stringable` object will not be accepted by a `string` *type declaration* if *strict typing* is enabled. If such behaviour is wanted the *type declaration* must accept `Stringable` and `string` via a *union type*.

As of PHP 8.0.0, any class that contains a `__toString()` method will also implicitly implement the `Stringable` interface, and will thus pass type checks for that interface. Explicitly implementing the interface anyway is recommended.

In PHP 7.4, the *returned value* must be a `string`, otherwise an `Error` is thrown.

Prior to PHP 7.4.0, the *returned value* must be a `string`, otherwise a fatal `E_RECOVERABLE_ERROR` is emitted.

Warning

It was not possible to *throw an exception* from within a `__toString()` method prior to PHP 7.4.0. Doing so will result in a fatal error.

*Example: Simple example*

```php
<?php
// Declare a simple class
class TestClass
{
    public $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function __toString()
    {
        return $this->foo;
    }
}

$class = new TestClass('Hello');
echo $class;
?>
```

The above example will output:

```
Hello
```

*Example: Basic usage*

```php
<?php

class SomeClass
{
    public function __toString(): string
    {
        print(
            "Magic method __toString\n"
        );

        return "";
    }
}

$someObject = new SomeClass();
(string) $someObject;

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__toString.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Magic method __toString
```

### `__invoke()`

```
__invoke( ...$values): mixed
```

The `__invoke()` method is called when a script tries to *call an object as a function*.

*Example: Using __invoke()*

```php
<?php
class CallableClass
{
    public function __invoke($x)
    {
        var_dump($x);
    }
}
$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));
?>
```

The above example will output:

```
int(5)
bool(true)
```

*Example: Using __invoke()*

```php
<?php
class Sort
{
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function __invoke(array $a, array $b): int
    {
        return $a[$this->key] <=> $b[$this->key];
    }
}

$customers = [
    ['id' => 1, 'first_name' => 'John', 'last_name' => 'Do'],
    ['id' => 3, 'first_name' => 'Alice', 'last_name' => 'Gustav'],
    ['id' => 2, 'first_name' => 'Bob', 'last_name' => 'Filipe']
];

// sort customers by first name
usort($customers, new Sort('first_name'));
print_r($customers);

// sort customers by last name
usort($customers, new Sort('last_name'));
print_r($customers);
?>
```

The above example will output:

```
Array
(
    [0] => Array
        (
            [id] => 3
            [first_name] => Alice
            [last_name] => Gustav
        )

    [1] => Array
        (
            [id] => 2
            [first_name] => Bob
            [last_name] => Filipe
        )

    [2] => Array
        (
            [id] => 1
            [first_name] => John
            [last_name] => Do
        )

)
Array
(
    [0] => Array
        (
            [id] => 1
            [first_name] => John
            [last_name] => Do
        )

    [1] => Array
        (
            [id] => 2
            [first_name] => Bob
            [last_name] => Filipe
        )

    [2] => Array
        (
            [id] => 3
            [first_name] => Alice
            [last_name] => Gustav
        )

)
```

*Example: Basic usage*

```php
<?php

class SomeClass
{
    public function __invoke(mixed $argument1, mixed $argument2): void
    {
        print(
            "Magic method __invoke\n"
            . "Method arguments: \n"
            . $argument1 . PHP_EOL
            . $argument2 . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject(4, "hello");

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__invoke.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Magic method __invoke
Method arguments:
4
hello
```

### `__set_state()`

```
static __set_state(array $properties): object
```

This *static method* is called for *classes* exported by `var_export()`.

The only *parameter* of this *method* is an *array* containing exported properties in the form `['property' => value, ...]`.

*Example: Using __set_state()*

```php
<?php

class A
{
    public $var1;
    public $var2;

    public static function __set_state($an_array)
    {
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
$a->var1 = 5;
$a->var2 = 'foo';

$b = var_export($a, true);
var_dump($b);
eval('$c = ' . $b . ';');
var_dump($c);
?>
```

The above example will output:

```
string(60) "A::__set_state(array(
   'var1' => 5,
   'var2' => 'foo',
))"
object(A)#2 (2) {
  ["var1"]=>
  int(5)
  ["var2"]=>
  string(3) "foo"
}
```

Note: When exporting an *object*, `var_export()` does not check whether `__set_state()` is implemented by the *object's class*, so re-importing objects will result in an `Error` exception, if `__set_state()` is not implemented. Particularly, this affects some *internal classes*. It is the responsibility of the programmer to verify that only *objects* will be re-imported, whose class implements `__set_state()`.

*Example: Basic usage*

```php

class SomeClass
{
    public $variable;

    public static function __set_state(array $properties): object
    {
        print(
            "Magic method __set_state\n"
            . "Properties: "
        );
        var_dump($properties);

        return (object) [];
    }
}

$someObject = new SomeClass();
var_export($someObject);

print(PHP_EOL);

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__set_state.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
\SomeClass::__set_state(array(
   'variable' => NULL,
))
```

### `__debugInfo()`

```
__debugInfo(): array
```

This method is called by `var_dump()` when dumping an *object* to get the *properties* that should be shown. If the method isn't defined on an *object*, then all *public*, *protected* and *private properties* will be shown.

*Example: Using __debugInfo()*

```php
<?php
class C {
    private $prop;

    public function __construct($val) {
        $this->prop = $val;
    }

    public function __debugInfo() {
        return [
            'propSquared' => $this->prop ** 2,
        ];
    }
}

var_dump(new C(42));
?>
```

The above example will output:

```
object(C)#1 (1) {
  ["propSquared"]=>
  int(1764)
}
```

*Example: Basic usage*

```php
<?php

class SomeClass
{
    public $variable;

    public function __debugInfo(): array
    {
        print(
            "Magic method __debugInfo\n"
        );

        return [];
    }
}

$someObject = new SomeClass();
var_dump($someObject);

```

**View**:
[Example](../../../../example/library/functions/magic_methods/__debugInfo.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Magic method __debugInfo
object(SomeClass)#1 (0) {
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.magic.php)

[▵ Up](#class-components)
[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
