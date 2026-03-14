[⌂ Home](../../../README.md)
[▲ Previous: Classe members](./class_members.md)
[▼ Next: Constructors and destructors](./constructors_and_destructors.md)

# Magic methods

***Magic methods*** are special *methods* which override PHP's default's action when certain actions are performed on an *object*.

Caution

All *methods names* starting with `__` are *reserved* by PHP. Therefore, it is not recommended to use such *method names* unless overriding PHP's behavior.

The following *method names* are considered *magical*: `__construct()`, `__destruct()`, `__call()`, `__callStatic()`, `__get()`, `__set()`, `__isset()`, `__unset()`, `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()`, `__toString()`, `__invoke()`, `__set_state()`, `__clone()`, and `__debugInfo()`.

Warning

All *magic methods*, with the exception of `__construct()`, `__destruct()`, and `__clone()`, must be declared as *public*, otherwise an `E_WARNING` is emitted. Prior to PHP 8.0.0, no diagnostic was emitted for the *magic methods* `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()`, and `__set_state()`.

Warning

If *type declarations* are used in the definition of a *magic method*, they must be identical to the *signature* described in this document. Otherwise, a fatal error is emitted. Prior to PHP 8.0.0, no diagnostic was emitted. However, `__construct()` and `__destruct()` must not declare a *return type*; otherwise a fatal error is emitted.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.magic.php)

## `__set`, `__get`, `__isset`, `__unset`

```
public __set(string $name, mixed $value): void
public __get(string $name): mixed
public __isset(string $name): bool
public __unset(string $name): void
```

**`__set()`** is run when writing data to *inaccessible* (*protected* or *private*) or *non-existing* *properties*.

**`__get()`** is utilized for reading data from *inaccessible* (*protected* or *private*) or *non-existing* *properties*.

**`__isset()`** is triggered by calling `isset()` or `empty()` on *inaccessible* (*protected* or *private*) or *non-existing* *properties*.

**`__unset()`** is invoked when `unset()` is used on *inaccessible* (*protected* or *private*) or *non-existing* *properties*.

The `$name` *argument* is the *name* of the *property* being interacted with. The `__set()` method's `$value` *argument* specifies the *value* the `$name`'ed *property* should be set to.

*Property overloading* only works in *object context*. These *magic methods* will not be triggered in *static context*. Therefore these *methods* should not be declared *static*. A warning is issued if one of the *magic overloading methods* is declared *static*.

Note:

The return value of *__set()* is ignored because of the way PHP processes the *assignment operator*. Similarly, `__get()` is never called when chaining assignments together like this:

```php
$a = $obj->b = 8;
```

Note:

PHP will not call an *overloaded method* from within the same *overloaded method*. That means, for example, writing `return $this->foo` inside of `__get()` will return `null` and raise an `E_WARNING` if there is no `foo` *property* defined, rather than calling `__get()` a second time. However, *overload methods* may invoke other *overload methods* implicitly (such as `__set()` triggering `__get()`).

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

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members)

### `__set`

**`__set`** is run when writing data to *inaccessible* (*protected* or *private*) or *non-existing* *properties*

```
public __set(string $name, mixed $value): void
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.overloading.php#object.set)

*Example: `__set` magic method*

```php
<?php

class SomeClass
{
    private array $data = [];

    public function __set(string $propertyName, mixed $propertyValue): void
    {
        print(
            "Magic method __set\n\n"
            . "Argument name: {$propertyName}\n"
            . "Argument value: {$propertyValue}\n\n"
        );

        $this->data[$propertyName] = $propertyValue;
    }
}

$someObject = new SomeClass();
$someObject->variable = "hello";

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Magic method __set

Argument name: variable
Argument value: hello

object(SomeClass)#1 (1) {
  ["data":"SomeClass":private]=>
  array(1) {
    ["variable"]=>
    string(5) "hello"
  }
}

```

**Source code**:
[Example](../../../../example/library/methods/magic_methods/__set.php)

### `__get`

**`__get()`** is utilized for reading data from *inaccessible* (*protected* or *private*) or *non-existing* *properties*.

```
public __set(string $name, mixed $value): void
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.overloading.php#object.get)

*Example: `__get` magic method*

```php
<?php

class SomeClass
{
    private array $data = [
        'platform' => 'linux',
        'language' => 'php',
        'database' => 'postgresql'
    ];

    public function __get(string $propertyName): mixed
    {
        print(
            "Magic method __get\n\n"
            . "Argument name: {$propertyName}\n\n"
        );

        if (! isset($this->data[$propertyName])) {
            return null;
        }

        return $this->data[$propertyName];
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print($someObject->platform . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["data":"SomeClass":private]=>
  array(3) {
    ["platform"]=>
    string(5) "linux"
    ["language"]=>
    string(3) "php"
    ["database"]=>
    string(10) "postgresql"
  }
}

Magic method __get

Argument name: platform

linux

```

**Source code**:
[Example](../../../../example/library/methods/magic_methods/__get.php)

### `__isset`

**`__isset()`** is triggered by calling `isset()` or `empty()` on *inaccessible* (*protected* or *private*) or *non-existing* *properties*.

```
public __isset(string $name): bool
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.overloading.php#object.isset)

*Example: `__isset` magic method*

```php
<?php

class SomeClass
{
    private array $data = [
        'platform' => 'linux',
        'language' => 'php',
        'database' => 'postgresql'
    ];

    public function __isset(string $propertyName): bool
    {
        print(
            "Magic method __isset\n\n"
            . "Property name: $propertyName\n\n"
        );

        return isset($this->data[$propertyName]);
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

print(var_export(isset($someObject->platform), true) . PHP_EOL . PHP_EOL);
print(var_export(isset($someObject->unexistent), true) . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["data":"SomeClass":private]=>
  array(3) {
    ["platform"]=>
    string(5) "linux"
    ["language"]=>
    string(3) "php"
    ["database"]=>
    string(10) "postgresql"
  }
}

Magic method __isset

Property name: platform

true

Magic method __isset

Property name: unexistent

false

```

**Source code**:
[Example](../../../../example/library/methods/magic_methods/__isset.php)

### `__unset`

```
public __unset(string $name): void
```

**`__unset()`** is invoked when `unset()` is used on *inaccessible* (*protected* or *private*) or *non-existing* *properties*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.overloading.php#object.unset)

*Example: `__unset` magic method*

```php
<?php

class SomeClass
{
    private array $data = [
        'platform' => 'linux',
        'language' => 'php',
        'database' => 'postgresql'
    ];

    public function __unset(string $propertyName): void
    {
        print(
            "Magic method __unset\n\n"
            . "Property name: $propertyName\n\n"
        );

        unset($this->data[$propertyName]);
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

unset($someObject->platform);

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (1) {
  ["data":"SomeClass":private]=>
  array(3) {
    ["platform"]=>
    string(5) "linux"
    ["language"]=>
    string(3) "php"
    ["database"]=>
    string(10) "postgresql"
  }
}

Magic method __unset

Property name: platform

object(SomeClass)#1 (1) {
  ["data":"SomeClass":private]=>
  array(2) {
    ["language"]=>
    string(3) "php"
    ["database"]=>
    string(10) "postgresql"
  }
}

```

**Source code**:
[Example](../../../../example/library/methods/magic_methods/__unset.php)

## `__call` and `__staticCall`

```
public __call(string $name, array $arguments): mixed
public static __callStatic(string $name, array $arguments): mixed
```

**`__call()`** is triggered when invoking *inaccessible* *methods* in an *object context*.

**`__callStatic()`** is triggered when invoking *inaccessible* *methods* in a *static context*.

The `$name` argument is the *name* of the *method* being called. The `$arguments` *argument* is an *enumerated array* containing the *parameters* passed to the `$name`'ed *method*.

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

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods)

## `__sleep()` and `__wakeup()`

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

## `__serialize()` and `__unserialize()`

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

## `__invoke()`

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

## `__set_state()`

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

## `__debugInfo()`

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

[▵ Up](#magic-methods)
[⌂ Home](../../../README.md)
[▲ Previous: Classe members](./class_members.md)
[▼ Next: Constructors and destructors](./constructors_and_destructors.md)
