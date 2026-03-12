[⌂ Home](../../../README.md)
[▲ Previous: Classes](./classes.md)
[▼ Next: Magic methods](./magic_methods.md)

# Class components

## Visibility

The *visibility of a property*, a *method* or (as of PHP 7.1.0) a *constant* can be defined by prefixing the *declaration* with the *keywords* `public`, `protected` or `private`. *Class members* declared *public* can be accessed everywhere. *Members* declared *protected* can be accessed only within the *class itself* and by *inheriting* and *parent classes*. *Members* declared as *private* may only be accessed by the *class* that defines the *member*.

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
