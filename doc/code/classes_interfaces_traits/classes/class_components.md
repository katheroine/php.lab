[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)

# Class components

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

## Visibility

The *visibility of a property*, a *method* or (as of PHP 7.1.0) a *constant* can be defined by prefixing the *declaration* with the *keywords* `public`, `protected` or `private`. *Class members* declared *public* can be accessed everywhere. *Members* declared *protected* can be accessed only within the *class itself* and by *inheriting* and *parent classes*. *Members* declared as *private* may only be accessed by the *class* that defines the *member*.

### Method visibility

*Class methods* may be *defined* as *public*, *private*, or *protected*. Methods declared without any explicit *visibility keyword* are *defined* as *public*.

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

[▵ Up](#class-components)
[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)
