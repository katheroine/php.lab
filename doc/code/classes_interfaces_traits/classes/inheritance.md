[⌂ Home](../../../README.md)
[▲ Previous: Objects](./objects.md)
[▼ Next: Anonymous classes](./anonymous_classes.md)

# Inheritance

## Object inheritance

***Inheritance*** is a well-established programming principle, and PHP makes use of this principle in its *object model*. This principle will affect the way many *classes* and *objects* relate to one another.

For example, when *extending* a *class*, the *subclass* *inherits* all of the *public* and *protected methods*, *properties* and *constants* from the *parent class*. Unless a *class* *overrides* those *methods*, they will retain their original functionality.

This is useful for *defining* and *abstracting* functionality, and permits the *implementation* of additional functionality in similar *objects* without the need to *reimplement* all of the shared functionality.

*Private methods* of a *parent class* are not accessible to a *child class*. As a result, *child classes* may reimplement a *private method* themselves without regard for normal inheritance rules. Prior to PHP 8.0.0, however, *final* and *static* restrictions were applied to *private methods*. As of PHP 8.0.0, the only *private method* restriction that is enforced is *private final constructors*, as that is a common way to "disable" the *constructor* when using *static factory methods* instead.

The *visibility* of *methods*, *properties* and *constants* can be relaxed, e.g. a *protected method* can be marked as *public*, but they cannot be restricted, e.g. marking a *public property* as *private*. An exception are *constructors*, whose *visibility* can be restricted, e.g. a *public constructor* can be marked as *private* in a *child class*.

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

[▵ Up](#inheritance)
[⌂ Home](../../../README.md)
[▲ Previous: Objects](./objects.md)
[▼ Next: Anonymous classes](./anonymous_classes.md)
