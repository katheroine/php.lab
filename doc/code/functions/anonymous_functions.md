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

## Static anonymous functions

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

## Changelog

| Version | Description |
|---------|-------------|
| `8.3.0` | Closures created from magic methods can accept named parameters. |
| `7.1.0` | Anonymous functions may not close over superglobals, `$this`, or any variable with the same name as a parameter. |

Notes

Note: It is possible to use func_num_args(), func_get_arg(), and func_get_args() from within a closure.

-- [PHP Reference](https://www.php.net/manual/en/functions.anonymous.php)

[▵ Up](#anonymous-functions)
[⌂ Home](../../../README.md)
[▲ Previous: Functions](./functions.md)
