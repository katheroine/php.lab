[⌂ Home](../../../README.md)
[▲ Previous: Functions](./functions.md)

# Anonymous functions

## Definition

> In computer programming, an **anonymous function** (**function literal**, **lambda function**, or **block**) is a *function definition* that is not bound to an *identifier*. *Anonymous functions* are often *arguments* being passed to *higher-order functions* or used for constructing the result of a *higher-order function* that needs to *return* a *function*. If the function is only used once, or a limited number of times, an anonymous function may be syntactically lighter than using a *named function*. Anonymous functions are ubiquitous in *functional programming languages* and other languages with *first-class functions*, where they fulfil the same role for the function type as literals do for other data types.

Anonymous functions originate in the work of Alonzo Church in his invention of the *lambda calculus*, in which all functions are anonymous, in 1936, before electronic computers. In several programming languages, anonymous functions are introduced using the keyword `lambda`, and anonymous functions are often referred to as *lambdas* or *lambda abstractions*. Anonymous functions have been a feature of programming languages since Lisp in 1958, and a growing number of modern programming languages support anonymous functions.

-- [Wikipedia](https://en.wikipedia.org/wiki/Anonymous_function)

> In programming languages, a **closure**, also **lexical closure** or **function closure**, is a technique for implementing lexically scoped name binding in a language with first-class functions. Operationally, a *closure* is a *record* storing a *function together with an environment*. The *environment* is a mapping associating each *free variable of the function* (variables that are used locally, but defined in an *enclosing scope*) with the *value or reference to which the name was bound when the closure was created*. Unlike a *plain function*, a *closure* allows the function to access those *captured variables* through the closure's copies of their *values* or *references*, even when the function is invoked outside their *scope*.

The concept of closures was developed in the 1960s for the mechanical evaluation of expressions in the λ-calculus and was first fully implemented in 1970 as a language feature in the PAL programming language to support lexically scoped first-class functions.

-- [Wikipedia](https://en.wikipedia.org/wiki/Closure_(computer_programming))

## Lambdas vs closures

The term *closure* is often used as a synonym for *anonymous function*, though strictly, an anonymous function is a *function literal* without a name, while a closure is an *instance of a function*, a value, whose non-local variables have been bound either to values or storage locations (depending on the language).

-- [Wikipedia](https://en.wikipedia.org/wiki/Closure_(computer_programming))

## Anonymous functions in PHP

**Anonymous functions**, also known as **closures**, allow the creation of functions which have no specified name. They are most useful as the value of callable parameters, but they have many other uses.

[PHP does not distinguish between the anonympus functions and closures. -- KK]

*Anonymous functions* are implemented using the `Closure` class.

*Example: Anonymous function example*

```php
<?php
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');
// outputs helloWorld
?>
```

*Closures* can also be used as the *values* of *variables*; PHP automatically converts such expressions into instances of the `Closure` internal class. Assigning a *closure* to a *variable* uses the same syntax as any other assignment, including the trailing semicolon:

*Example: Anonymous function variable assignment example*

```php
<?php
$greet = function($name) {
    printf("Hello %s\r\n", $name);
};

$greet('World');
$greet('PHP');
?>
```

*Closures* may also inherit *variables* from the *parent scope*. Any such variables must be passed to the use language construct. As of PHP 7.1, these variables must not include *superglobals*, `$this`, or *variables with the same name as a parameter*. A *return type declaration* of the function has to be placed after the *`use` clause*.

Example #3 Inheriting variables from the parent scope

```php
<?php
$message = 'hello';

// No "use"
$example = function () {
    var_dump($message);
};
$example();

// Inherit $message
$example = function () use ($message) {
    var_dump($message);
};
$example();

// Inherited variable's value is from when the function
// is defined, not when called
$message = 'world';
$example();

// Reset message
$message = 'hello';

// Inherit by-reference
$example = function () use (&$message) {
    var_dump($message);
};
$example();

// The changed value in the parent scope
// is reflected inside the function call
$message = 'world';
$example();

// Closures can also accept regular arguments
$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hello");

// Return type declaration comes after the use clause
$example = function () use ($message): string {
    return "hello $message";
};
var_dump($example());
?>
```

The above example will output something similar to:

```
Notice: Undefined variable: message in /example.php on line 6
NULL
string(5) "hello"
string(5) "hello"
string(5) "hello"
string(5) "world"
string(11) "hello world"
string(11) "hello world"
```

[That's what here is called "inheriting a variable from the parent scope" in general and in other programming languages implementing closures is also called *lexical scope inheritance* or simply *variable binding*. To be strict, we should explain that the *lexical scope inheritance* rule leads in turn to the *binding* between the *variable* and the *function* together forming a *closure*. -- KK]

[The third function call from the example above shows that the variable *binding* during the closure definition is implemented by PHP as by the value not by the reference. -- KK]

As of PHP 8.0.0, the list of scope-inherited variables may include a trailing comma, which will be ignored.

*Inheriting variables from the parent scope* is not the same as using *global variables*. *Global variables* exist in the *global scope*, which is the same no matter what function is executing. The *parent scope* of a *closure* is the function in which the closure was *declared* (not necessarily the function it was called from). See the following example:

*Example: Closures and scoping*

```php
<?php
// A basic shopping cart which contains a list of added products
// and the quantity of each product. Includes a method which
// calculates the total price of the items in the cart using a
// closure as a callback.
class Cart
{
    const PRICE_BUTTER  = 1.00;
    const PRICE_MILK    = 3.00;
    const PRICE_EGGS    = 6.95;

    protected $products = array();

    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }

    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] :
               FALSE;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback =
            function ($quantity, $product) use ($tax, &$total)
            {
                $pricePerItem = constant(__CLASS__ . "::PRICE_" .
                    strtoupper($product));
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };

        array_walk($this->products, $callback);
        return round($total, 2);
    }
}

$my_cart = new Cart;

// Add some items to the cart
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

// Print the total with a 5% sales tax.
print $my_cart->getTotal(0.05) . "\n";
// The result is 54.29
?>
```

*Example: Automatic binding of `$this`*

```php
<?php

class Test
{
    public function testing()
    {
        return function() {
            var_dump($this);
        };
    }
}

$object = new Test;
$function = $object->testing();
$function();

?>
```

The above example will output:

```
object(Test)#1 (0) {
}
```

When declared in the *context of a class*, the current class is automatically bound to it, making `$this` available inside of the function's scope. If this *automatic binding* of the current class is not wanted, then *static anonymous functions* may be used instead.

### Static anonymous functions

*Anonymous functions* may be declared *statically*. This prevents them from having the current class automatically bound to them. Objects may also not be bound to them at runtime.

*Example: Attempting to use $this inside a static anonymous function*

```php
<?php

class Foo
{
    function __construct()
    {
        $func = static function() {
            var_dump($this);
        };
        $func();
    }
};
new Foo();

?>
```

The above example will output:

```
Notice: Undefined variable: this in %s on line %d
NULL
```

*Example: Attempting to bind an object to a static anonymous function*

```php
<?php

$func = static function() {
    // function body
};
$func = $func->bindTo(new stdClass);
$func();

?>
```

The above example will output:

```
Warning: Cannot bind an instance to a static closure in %s on line %d
```

### Changelog

| Version | Description |
|---------|-------------|
| `8.3.0` | Closures created from magic methods can accept named parameters. |
| `7.1.0` | Anonymous functions may not close over superglobals, `$this`, or any variable with the same name as a parameter. |

Notes

Note: It is possible to use func_num_args(), func_get_arg(), and func_get_args() from within a closure.

-- [PHP Reference](https://www.php.net/manual/en/functions.anonymous.php)

## Arrow functions

**Arrow functions** were introduced in PHP 7.4 as a *more concise syntax for anonymous functions*.

Both *anonymous functions* and *arrow functions* are implemented using the `Closure` class.

*Arrow functions* have the basic form `fn (argument_list) => expr`.

*Arrow functions* support the same features as *anonymous functions*, except that *using variables from the parent scope is always automatic*.

When a *variable* used in the *expression* is defined in the *parent scope* it will be *implicitly captured by-value*. In the following example, the functions `$fn1` and `$fn2` behave the same way.

*Example: Arrow functions capture variables by value automatically*

```php
<?php

$y = 1;

$fn1 = fn($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
?>
```

The above example will output:

```
4
```

This also works if the *arrow functions* are *nested*:

*Example: Arrow functions capture variables by value automatically, even when nested*

```php
<?php

$z = 1;
$fn = fn($x) => fn($y) => $x * $y + $z;
// Outputs 51
var_export($fn(5)(10));
?>
```

Similarly to *anonymous functions*, the *arrow function syntax* allows *arbitrary function signatures*, including *parameter* and *return types*, *default values*, *variadics*, as well as *by-reference passing* and *returning*. All of the following are valid examples of *arrow functions*:

*Example: Examples of arrow functions*

```php
<?php

fn(array $x) => $x;
static fn($x): int => $x;
fn($x = 42) => $x;
fn(&$x) => $x;
fn&($x) => $x;
fn($x, ...$rest) => $rest;

?>
```

*Arrow functions* use *by-value variable binding*. This is roughly equivalent to performing a `use($x)` for every variable `$x` used inside the arrow function. A *by-value binding* means that it is not possible to modify any values from the outer scope. Anonymous functions can be used instead for by-ref bindings.

*Example: Values from the outer scope cannot be modified by arrow functions*

```php
<?php

$x = 1;
$fn = fn() => $x++; // Has no effect
$fn();
var_export($x);  // Outputs 1

?>
```

### Changelog

| Version | Description |
|---------|-------------|
| `7.4.0` | Arrow functions became available. |

Notes

Note: It is possible to use func_num_args(), func_get_arg(), and func_get_args() from within an arrow function.

-- [PHP Reference](https://www.php.net/manual/en/functions.arrow.php)

## Examples

*Example: Anonymous functions*

```php
<?php

$simpleFunction = function (): void {
    print("Simple function.\n");
};

$simpleFunction();

print(PHP_EOL);

$functionWithLocalVariable = function (): void {
    $i = 4;
    print("A function with a local variable: {$i}\n");
};

$functionWithLocalVariable();

print(PHP_EOL);

$functionReturningValue = function (): int {
    print("A function returning value.\n");
    return 9;
};

$i = $functionReturningValue();
print("returned value: {$i}\n");

print(PHP_EOL);

$functionWithArguments = function (int $number, string $text): void {
    print("A function with some arguments:\nnumber: {$number}\ntext: {$text}\n");
};

$functionWithArguments(6, "orange");

print(PHP_EOL);

```

**View**:
[Example](../../../example/code/functions/anonymous_functions.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Simple function.

A function with a local variable: 4

A function returning value.
returned value: 9

A function with some arguments:
number: 6
text: orange

```

*Example: Closures*

```php
<?php

$quantity = 4;
$message = "Hello, there!";

$simpleFunction = function () use ($quantity, $message): void {
    print("Simple function.\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
};

$simpleFunction();

print(PHP_EOL);

$functionWithLocalVariable = function () use ($quantity, $message): void {
    $i = 4;
    print("A function with a local variable: {$i}\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
};

$functionWithLocalVariable();

print(PHP_EOL);

$functionReturningValue = function () use ($quantity, $message): int {
    print("A function returning value.\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
    return 9;
};

$i = $functionReturningValue();
print("returned value: {$i}\n");

print(PHP_EOL);

$functionWithArguments = function (int $number, string $text) use ($quantity, $message): void {
    print("A function with some arguments:\nnumber: {$number}\ntext: {$text}\n"
        . "Quantity: {$quantity}\n"
        . "Message: {$message}\n"
    );
};

$functionWithArguments(6, "orange");

print(PHP_EOL);

```

**View**:
[Example](../../../example/code/functions/closures.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Simple function.
Quantity: 4
Message: Hello, there!

A function with a local variable: 4
Quantity: 4
Message: Hello, there!

A function returning value.
Quantity: 4
Message: Hello, there!
returned value: 9

A function with some arguments:
number: 6
text: orange
Quantity: 4
Message: Hello, there!

```

*Example: Callbacks*

```php
<?php

function sourceValue($prompt, $validate)
{
    do {
        $value = (string)readline($prompt);
        $validation_message = $validate($value);

        if (empty($validation_message))
            break;

        print($validation_message . "\nTry again.\n");
    } while (true);

    return $value;
}

function validateTemperatureInCelsius($value)
{
    $message = "";

    if ($value > 26) {
        $message = "Temperature is to high for human health.";
    } else if ($value < 22) {
        $message = "Temperature is to low for human health.";
    }

    return $message;
}

$temperature = sourceValue("Give the ambient temperature in degrees Celsius: ", "validateTemperatureInCelsius");
print("Tempetature has been set to " . $temperature . " degree Celsius.\n");

```

**View**:
[Example](../../../example/code/functions/callbacks.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Give the ambient temperature in degrees Celsius: 20
Temperature is to low for human health.
Try again.
Give the ambient temperature in degrees Celsius: 30
Temperature is to high for human health.
Try again.
Give the ambient temperature in degrees Celsius: 23
Tempetature has been set to 23 degree Celsius.
```

*Example: Callbacks formatting*

```php
<?php

function sourceValue($prompt, $validate)
{
    do {
        $value = (string)readline($prompt);
        $validation_message = $validate($value);

        if (empty($validation_message))
        break;

        print($validation_message . "\nTry again.\n");
    } while (true);

    return $value;
}

function validateTemperatureInCelsius($value)
{
    $message = "";

    if ($value > 26) {
        $message = "Temperature is to high for human health.";
    } else if ($value < 22) {
        $message = "Temperature is to low for human health.";
    }

    return $message;
}

$validateHumidityInPercents = function(float $value): string {
    if ($value > 60) {
        return "Humidity is to high for human health.";
    } else if ($value < 40) {
        return "Humidity is to low for human health.";
    }

    return '';
};

$temperature = sourceValue("Give the ambient temperature in degrees Celsius: ", "validateTemperatureInCelsius");
print("Tempetature has been set to " . $temperature . " degree Celsius.\n");

$humidity = sourceValue("Give the air humidity in percents: ", $validateHumidityInPercents);
print("Humidity has been set to " . $humidity . " percent.\n");

$pressure = sourceValue("Give the atmospheric pressure in hectopascals: ", function($value) {
  if ($value != 1013.25) {
    return "Pressure is not perfect.";
  }

  return '';
});
print("Pressure has been set to " . $pressure . " hectopascals.\n");

```

**View**:
[Example](../../../example/code/functions/callbacks_formatting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Give the ambient temperature in degrees Celsius: 20
Temperature is to low for human health.
Try again.
Give the ambient temperature in degrees Celsius: 30
Temperature is to high for human health.
Try again.
Give the ambient temperature in degrees Celsius: 23
Tempetature has been set to 23 degree Celsius.
Give the air humidity in percents: 15
Humidity is to low for human health.
Try again.
Give the air humidity in percents: 90
Humidity is to high for human health.
Try again.
Give the air humidity in percents: 56
Humidity has been set to 56 percent.
Give the atmospheric pressure in hectopascals: 1000
Pressure is not perfect.
Try again.
Give the atmospheric pressure in hectopascals: 1013.25
Pressure has been set to 1013.25 hectopascals.
```

*Example: Higher order functions*

```php
<?php

function someFunctionTakingFunction(mixed $value, int $quantity, callable $algorithm): mixed
{
    foreach (range(1, $quantity) as $i) {
        $value = $algorithm($value);
    }

    return $value;
}

$result = someFunctionTakingFunction(2, 3, function (mixed $value): mixed {
    return $value + 5;
});

print($result . PHP_EOL);

function someFunctionReturningFunction(): callable
{
    return function(string $name) {
        print("Hello, {$name}!\n");
    };
}

$function = someFunctionReturningFunction();
$result = $function("Kate");

print($result . PHP_EOL);

```

**View**:
[Example](../../../example/code/functions/higher_order_functions.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
17
Hello, Kate!

```

[▵ Up](#anonymous-functions)
[⌂ Home](../../../README.md)
[▲ Previous: Functions](./functions.md)
