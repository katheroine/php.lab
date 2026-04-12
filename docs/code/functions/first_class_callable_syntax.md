[⌂ Home](../../../README.md)
[▲ Previous: Anonymous functions](./anonymous_functions.md)
[▼ Next: Generators](../generators/generators.md)

# First class callable syntax

The **first class callable syntax** is introduced as of PHP 8.1.0, as a way of creating *anonymous functions* from *callable*. It supersedes existing *callable syntax* using *strings* and *arrays*. The advantage of this syntax is that it is accessible to static analysis, and uses the scope at the point where the *callable* is acquired.

`CallableExpr(...)` syntax is used to create a `Closure` object from *callable*. `CallableExpr` accepts any *expression* that can be directly *called* in the PHP grammar:

*Example: Simple first class callable syntax*

```php
<?php

class Foo {
   public function method() {}
   public static function staticmethod() {}
   public function __invoke() {}
}

$obj = new Foo();
$classStr = 'Foo';
$methodStr = 'method';
$staticmethodStr = 'staticmethod';


$f1 = strlen(...);
$f2 = $obj(...);  // invokable object
$f3 = $obj->method(...);
$f4 = $obj->$methodStr(...);
$f5 = Foo::staticmethod(...);
$f6 = $classStr::$staticmethodStr(...);

// traditional callable using string, array
$f7 = 'strlen'(...);
$f8 = [$obj, 'method'](...);
$f9 = [Foo::class, 'staticmethod'](...);
?>
```

Note:

The `...` is part of the syntax, and not an omission.

`CallableExpr(...)` has the same semantics as `Closure::fromCallable()`. That is, unlike callable using *strings* and *arrays*, `CallableExpr(...)` respects the scope at the point where it is created:

*Example: Scope comparison of `CallableExpr(...)` and traditional callable*

```php
<?php

class Foo {
    public function getPrivateMethod() {
        return [$this, 'privateMethod'];
    }

    private function privateMethod() {
        echo __METHOD__, "\n";
    }
}

$foo = new Foo;
$privateMethod = $foo->getPrivateMethod();
$privateMethod();
// Fatal error: Call to private method Foo::privateMethod() from global scope
// This is because call is performed outside from Foo and visibility will be checked from this point.

class Foo1 {
    public function getPrivateMethod() {
        // Uses the scope where the callable is acquired.
        return $this->privateMethod(...); // identical to Closure::fromCallable([$this, 'privateMethod']);
    }

    private function privateMethod() {
        echo __METHOD__, "\n";
    }
}

$foo1 = new Foo1;
$privateMethod = $foo1->getPrivateMethod();
$privateMethod();  // Foo1::privateMethod
?>
```

Note:

Object creation by this syntax (e.g `new Foo(...)`) is not supported, because `new Foo()` syntax is not considered a call.

Note:

The first-class callable syntax cannot be combined with the *nullsafe operator*. Both of the following result in a compile-time error:

```php
<?php
$obj?->method(...);
$obj?->prop->method(...);
?>
```

-- [PHP Reference](https://www.php.net/manual/en/functions.first_class_callable_syntax.php)

*Example: Function as variable*

```php
<?php

function someFunction(int $someArgument): int
{
    $result = $someArgument * 2;

    return $result;
}

$someFunctionVariable1 = 'someFunction';
$result = $someFunctionVariable1(3);
print("Some function result: {$result}\n");

$someFunctionVariable2 = someFunction(...);
$result = $someFunctionVariable2(3);
print("Some function result: {$result}\n");

$someFunctionVariable3 = 'someFunction'(...);
$result = $someFunctionVariable2(3);
print("Some function result: {$result}\n");

$someFunctionVariable4 = Closure::fromCallable('someFunction');
$result = $someFunctionVariable4(3);
print("Some function result: {$result}\n");

$otherFunctionVariable1 = function (int $someArgument): int
{
    $result = $someArgument * 3;

    return $result;
};

$result = $otherFunctionVariable1(3);
print("Other function result: {$result}\n");

$otherFunctionVariable2 = Closure::fromCallable($otherFunctionVariable1);
$result = $otherFunctionVariable2(3);
print("Other function result: {$result}\n");

```

**Result (PHP 8.4)**:

```
Some function result: 6
Some function result: 6
Some function result: 6
Some function result: 6
Other function result: 9
Other function result: 9
```

**Source code**:
[Example](../../../example/code/functions/function_as_variable.php)

[▵ Up](#first-class-callable-syntax)
[⌂ Home](../../../README.md)
[▲ Previous: Anonymous functions](./anonymous_functions.md)
[▼ Next: Generators](../generators/generators.md)
