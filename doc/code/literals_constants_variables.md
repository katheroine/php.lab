# Literals, constants, variables

## Literals

> In computer science, a **literal** is a textual representation (notation) of a value as it is written in source code. Almost all programming languages have notations for atomic values such as integers, floating-point numbers, and strings, and usually for Booleans and characters; some also have notations for elements of enumerated types and compound values such as arrays, records, and objects. An anonymous function is a literal for the function type.
>
> In contrast to literals, variables or constants are symbols that can take on one of a class of fixed values, the constant being constrained not to change. Literals are often used to initialize variables.

-- [Wikipedia](https://en.wikipedia.org/wiki/Literal_(computer_programming))

```php
<?php

$number = 15.5;
$text = "Hello, there!";

print("There is some data.");
print("\nNumber: {$number}\nText: {$text}\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/literals.php)

**Execute**:
* [OnlinePHP](https://onlinephp.io/c/e808b)
* [OneCompiler](https://onecompiler.com/php/446d4ey5g)

In the asbove example `15.5` and `"Hello, there!"` are literals. They are used to initialize (assign a value in the creation process to) two variables. Another literal is `"There are some data."` used just to be displayed on the output.

## Constants

> In computer programming, a **constant** is a value that is not altered by the program during normal execution. When associated with an identifier, a constant is said to be *named*, although the terms *constant* and *named constant* are often used interchangeably. This is contrasted with a *variable*, which is an identifier with a value that can be changed during normal execution. To simplify, *constants*' values remains, while the values of *variables* varies, hence both their names.
>
> *Constants* are useful for both programmers and compilers:
> * *for programmers*, they are a form of self-documenting code and allow reasoning about correctness,
> * while *for compilers*, they allow compile-time and run-time checks that verify that constancy assumptions are not violated,[a] and allow or simplify some compiler optimizations.
>
> There are various specific realizations of the general notion of a constant, with subtle distinctions that are often overlooked. The most significant are:
> * *compile-time (statically valued) constants*,
> * *run-time (dynamically valued) constants*,
> * *immutable objects*,
> * and *constant types (const)*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Constant_(computer_programming))

A *constant* is an *identifier* (*name*) for a simple *value*. As the name suggests, that *value* cannot change during the execution of the script (except for *magic constants*, which aren't actually constants). Constants are case-sensitive. By convention, constant identifiers are always uppercase.

– [PHP Reference](https://www.php.net/manual/en/language.constants.php)

```php
<?php

define('NUMBER', 15.5);
const TEXT = "Hello, there!";

print("Number: " . NUMBER . "\nText: " . TEXT . "\n");

// TEXT = "Hi, everyone!"; // Error

```

**View**:
[Example](../../example/code/literals_constants_variables/constants.php)

**Execute**:
* [OnlinePHP](https://onlinephp.io/c/d3636)
* [OneCompiler](https://onecompiler.com/php/446e5mnu9)

In the asbove example `NUMBER` and `TEXT` are constants. They can represent some values, like `15.5` and `"Hello, there!"`, but after the *initialisation*, their values cannot be changed. If a programmer tries to *assign* a value to a constant, the PHP parser will report an error, even if the assigned value is exactly the same as the initialization value.

### Ways of defining constants

In the given example there were presented two ways of defining constants:
* by `define` function,
* by `const` keyword.

Historically original way of defining constants in PHP is the `define` funcion.

```php
<?php

define('SOME_CONSTANT', 1024);

```

The `const` keyword (by the way, very common in the other programming languages) has been introduced in PHP 5.3.

```php
<?php

const SOME_CONSTANT = 1024;

```

#### Differences between `define` function and `const` keyword usage

##### Constant definition placement

As opposed to defining constants using `define`, constants defined using the `const` keyword must be declared at the top-level scope because they are defined at compile-time. This means that they cannot be declared inside functions, loops, if statements or `try/catch` blocks.

-- [PHP Reference](https://www.php.net/manual/en/language.constants.syntax.php)

##### Types of the constant value

Constants defined by `define` function can be *boolean*, *integer*, *float (decimal)*, *string (text)*, *callable (function)* or *object (class instance)*. Constants defined by the `const` keyword can be all above except *functions*.

```php
<?php

define('SOME_BOOL_VALUE', true);
const OTHER_BOOL_VALUE = false;

print("Some logical value: " . SOME_BOOL_VALUE . "\nOther logical value: " . OTHER_BOOL_VALUE . "\n\n");

define('SOME_INT_NUMBER', 15);
const OTHER_INT_NUMBER = 10;

print("Some integer number: " . SOME_INT_NUMBER . "\nOther integer number: " . OTHER_INT_NUMBER . "\n\n");

define('SOME_DEC_NUMBER', 15.5);
const OTHER_DEC_NUMBER = 10.24;

print("Some decimal number: " . SOME_DEC_NUMBER . "\nOther decimal number: " . OTHER_DEC_NUMBER . "\n\n");

define('SOME_TEXT', 'orange');
const OTHER_TEXT = 'multimeter';

print("Some text: " . SOME_TEXT . "\nOther text: " . OTHER_TEXT . "\n\n");

define('SOME_ARRAY', [
    'nickname' => 'pumpkinette',
    'os' => 'linux',
    'browser' => 'opera',
]);
const OTHER_ARRAY = [
    'nickname' => 'nikologist',
    'os' => 'chromeos',
    'browser' => 'chrome',
];

print("Some array:\n");
print_r(SOME_ARRAY);
print("Other array:\n");
print_r(OTHER_ARRAY);
print("\n");

define('SOME_FUNCTION', function() {
    return 'some_function';
});
// const OTHER_FUNCTION = function() {
//     return 'other_function';
// };
// PHP Fatal error:  Constant expression contains invalid operations

print("Some function: " . (SOME_FUNCTION)() . "\n\n");

define('SOME_OBJECT', new stdClass());
const OTHER_OBJECT = new stdClass();

print("Some object:\n");
print_r(SOME_OBJECT);
print("Other object:\n");
print_r(OTHER_OBJECT);
print("\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/constant_value_types.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

##### Building of the constant value

While `define` allows a constant to be defined to an arbitrary expression, the `const` keyword has restrictions [...] When using the `const` keyword, only scalar (`bool`, `int`, `float` and `string`) expressions and constant arrays containing only scalar expressions are accepted. It is possible to define constants as a resource, but it should be avoided, as it can cause unexpected results [...]

-- [PHP Reference](https://www.php.net/manual/en/language.constants.syntax.php)

```php
<?php

// Using a function call
define('SOME_DATE', date('Y-m-d H:i:s'));
// const OTHER_DATE = date('Y-m-d H:i:s');
// PHP Fatal error:  Constant expression contains invalid operations

print('Some date: ' . SOME_DATE . "\n\n");

// Using concatenation with runtime values
$hostName = 'localhost'; // gethostname();
define('SOME_FILE_PATH', '/var/log/app_' . $hostName . '.log');
// const OTHER_FILE_PATH = '/var/log/app_' . $hostName . '.log';
// PHP Fatal error:  Constant expression contains invalid operations

print('Some date: ' . SOME_DATE . "\n\n");

// Using superglobals variables
define('SOME_FILE_NAME', $_SERVER['PHP_SELF']);
// const OTHER_FILE_NAME = $_SERVER['PHP_SELF'];
// PHP Fatal error:  Constant expression contains invalid operations

print('Some file name: ' . SOME_FILE_NAME . "\n\n");

// Using a non-constant array element
$prefix = 'app_';
define('SOME_SERVICE_INFO', [
    'version' => '1.0.0',
    'last_release_date' => '06.12.2025',
    'prefixed_name' => $prefix . 'service',
]);
// const OTHER_SERVICE_INFO = [
//     'version' => '1.0.0',
//     'last_release_date' => '06.12.2025',
//     'prefixed_name' => $prefix . 'service',
// ];
// PHP Fatal error:  Constant expression contains invalid operations

print("Some service info:\n");
print_r(SOME_SERVICE_INFO);
print("\n");

// Using non-scalar (e.g. object or resource) array element
define('SOME_TEST_INFO', [
    'type' => 'unit',
    'object'  => new stdClass(),
]);
const OTHER_TEST_INFO = [
    'type' => 'unit',
    'object'  => new stdClass(),
];

print("Some test info:\n");
print_r(SOME_TEST_INFO);
print("Other test info:\n");
print_r(OTHER_TEST_INFO);
print("\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/constant_value_building.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

### Ways of accessing constants

The value of a constant is accessed simply by specifying its name. Unlike variables, a constant is not prepended with a `$`. It is also possible to use the `constant` function to read a constant's value if the constant's name is obtained dynamically. Use `get_defined_constants` to get a list of all defined constants.

-- [PHP Reference](https://www.php.net/manual/en/language.constants.syntax.php)

### Functions handling constants

#### `define` function

Prior to PHP 8.0.0, constants defined using the `define()` function may be case-insensitive.

The *name* of a constant follows the same rules as any *label* in PHP. A valid constant name starts with a letter or underscore, followed by any number of letters, numbers, or underscores. As a regular expression, it would be expressed thusly: `^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$`

It is possible to `define()` constants with reserved or even invalid names, whose value can only be retrieved with the `constant()` function. However, doing so is not recommended.

*Example #1 Valid and invalid constant names*

```php
<?php

// Valid constant names
define("FOO", "something");
define("FOO2", "something else");
define("FOO_BAR", "something more");

// Invalid constant names
define("2FOO", "something");

// This is valid, but should be avoided:
// PHP may one day provide a magical constant
// that will break your script
define("__FOO__", "something");

?>
```

For our purposes here, a letter is `a-z, A-Z`, and the ASCII characters from `128` through `255` (`0x80-0xff`).

– [PHP Reference](https://www.php.net/manual/en/language.constants.php)

### Scope of the constants

Constants and (global) variables are in a different namespace. This implies that for example true and $TRUE are generally different.

-- [PHP Reference](https://www.php.net/manual/en/language.constants.syntax.php)

**Like *superglobals*, the *scope* of a constant is `global`.** Constants can be accessed from anywhere in a script without regard to scope.

As of PHP 7.1.0, *class constant* may declare a *visibility* of `protected` or `private`, making them only available in the hierarchical scope of the *class* in which it is defined.

– [PHP Reference](https://www.php.net/manual/en/language.constants.php)
