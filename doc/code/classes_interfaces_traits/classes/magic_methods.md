[⌂ Home](../../../README.md)
[▲ Previous: Classe components](./class_components.md)

# Magic methods

***Magic methods*** are special *methods* which override PHP's default's action when certain actions are performed on an *object*.

Caution

All *methods names* starting with `__` are *reserved* by PHP. Therefore, it is not recommended to use such method names unless overriding PHP's behavior.

The following method names are considered magical: `__construct()`, `__destruct()`, `__call()`, `__callStatic()`, `__get()`, `__set()`, `__isset()`, `__unset()`, `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()`, `__toString()`, `__invoke()`, `__set_state()`, `__clone()`, and `__debugInfo()`.

Warning

All *magic methods*, with the exception of `__construct()`, `__destruct()`, and `__clone()`, must be declared as *public*, otherwise an `E_WARNING` is emitted. Prior to PHP 8.0.0, no diagnostic was emitted for the *magic methods* `__sleep()`, `__wakeup()`, `__serialize()`, `__unserialize()`, and `__set_state()`.

Warning

If *type declarations* are used in the definition of a *magic method*, they must be identical to the *signature* described in this document. Otherwise, a fatal error is emitted. Prior to PHP 8.0.0, no diagnostic was emitted. However, `__construct()` and `__destruct()` must not declare a *return type*; otherwise a fatal error is emitted.

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
[▲ Previous: Classe components](./class_components.md)
