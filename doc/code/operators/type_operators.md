[⌂ Home](../../../README.md)
[▲ Previous: Array operators](./array_operators.md)

# Type operators

`instanceof` is used to determine whether a PHP variable is an instantiated object of a certain class.

-- [PHP Reference](https://www.php.net/manual/en/language.operators.type.php)

*Example: instanceof operator*

```php
<?php

$i = 3;
$d = 2.5;
$s = "abc";
$c = new stdClass;
class dClass extends stdClass {}
$e = new dClass;
class nClass {}
$n = new nClass;

echo "\$i: ";
var_dump($i);
$is_stdclass = ($i instanceof stdClass);
print("\$i instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$d: ";
var_dump($d);
$is_stdclass = ($d instanceof stdClass);
print("\$d instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$s: ";
var_dump($s);
$is_stdclass = ($s instanceof stdClass);
print("\$s instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$c: ";
var_dump($c);
$is_stdclass = ($c instanceof stdClass);
print("\$c instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$e: ";
var_dump($e);
$is_stdclass = ($e instanceof stdClass);
print("\$e instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

echo "\$n: ";
var_dump($n);
$is_stdclass = ($n instanceof stdClass);
print("\$n instanceof stdClass: " . ($is_stdclass ? "true" : "false") . "\n\n");

```

**View**:
[Example](../../../example/code/operators/instanceof_operator.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$i: int(3)
$i instanceof stdClass: false

$d: float(2.5)
$d instanceof stdClass: false

$s: string(3) "abc"
$s instanceof stdClass: false

$c: object(stdClass)#1 (0) {
}
$c instanceof stdClass: true

$e: object(dClass)#2 (0) {
}
$e instanceof stdClass: true

$n: object(nClass)#3 (0) {
}
$n instanceof stdClass: false

```

*Example: Using instanceof with classes*

```php
<?php
class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof MyClass);
var_dump($a instanceof NotMyClass);
?>
```

The above example will output:

```
bool(true)
bool(false)
```

`instanceof` can also be used to determine whether a variable is an instantiated object of a class that inherits from a parent class:

*Example: Using instanceof with inherited classes*

```php
<?php
class ParentClass
{
}

class MyClass extends ParentClass
{
}

$a = new MyClass;

var_dump($a instanceof MyClass);
var_dump($a instanceof ParentClass);
?>
```

The above example will output:

```
bool(true)
bool(true)
```

To check if an object is not an `instanceof` a class, the *logical not operator* can be used.

*Example: Using instanceof to check if object is not an instanceof a class*

```php
<?php
class MyClass
{
}

$a = new MyClass;
var_dump(!($a instanceof stdClass));
?>
```

The above example will output:

```
bool(true)
```

Lastly, `instanceof` can also be used to determine whether a variable is an instantiated object of a class that implements an interface:

*Example: Using instanceof with interfaces*

```php
<?php
interface MyInterface
{
}

class MyClass implements MyInterface
{
}

$a = new MyClass;

var_dump($a instanceof MyClass);
var_dump($a instanceof MyInterface);
?>
```

The above example will output:

```
bool(true)
bool(true)
```

Although `instanceof` is usually used with a literal classname, it can also be used with another object or a string variable:

*Example: Using instanceof with other variables*

```php
<?php
interface MyInterface
{
}

class MyClass implements MyInterface
{
}

$a = new MyClass;
$b = new MyClass;
$c = 'MyClass';
$d = 'NotMyClass';

var_dump($a instanceof $b); // $b is an object of class MyClass
var_dump($a instanceof $c); // $c is a string 'MyClass'
var_dump($a instanceof $d); // $d is a string 'NotMyClass'
?>
```

The above example will output:

```
bool(true)
bool(true)
bool(false)
```

[The interface and its implementation in the above example is useless. -- KK]

`instanceof` does not throw any error if the variable being tested is not an object, it simply returns `false`. Constants, however, were not allowed prior to PHP 7.3.0.

*Example: Using instanceof to test other variables*

```php
<?php
$a = 1;
$b = NULL;
$c = fopen('/tmp/', 'r');
var_dump($a instanceof stdClass); // $a is an integer
var_dump($b instanceof stdClass); // $b is NULL
var_dump($c instanceof stdClass); // $c is a resource
var_dump(FALSE instanceof stdClass);
?>
```

The above example will output:

```
bool(false)
bool(false)
bool(false)
PHP Fatal error:  instanceof expects an object instance, constant given
```

As of PHP 7.3.0, constants are allowed on the left-hand-side of the `instanceof` operator.

*Example: Using instanceof to test constants*

```php
<?php
var_dump(FALSE instanceof stdClass);
?>
```

Output of the above example in PHP 7.3:

```
bool(false)
```

As of PHP 8.0.0, `instanceof` can now be used with arbitrary expressions. The expression must be wrapped in parentheses and produce a `string`.

*Example: Using instanceof with an arbitrary expression*

```php
<?php

class ClassA extends \stdClass {}
class ClassB extends \stdClass {}
class ClassC extends ClassB {}
class ClassD extends ClassA {}

function getSomeClass(): string
{
    return ClassA::class;
}

var_dump(new ClassA instanceof ('std' . 'Class'));
var_dump(new ClassB instanceof ('Class' . 'B'));
var_dump(new ClassC instanceof ('Class' . 'A'));
var_dump(new ClassD instanceof (getSomeClass()));
?>
```

Output of the above example in PHP 8:

```
bool(true)
bool(true)
bool(false)
bool(true)
```

The `instanceof` operator has a functional variant with the `is_a()` function.

-- [PHP Reference](https://www.php.net/manual/en/language.operators.type.php)

[▵ Up](#type-operators)
[⌂ Home](../../../README.md)
[▲ Previous: Array operators](./array_operators.md)
