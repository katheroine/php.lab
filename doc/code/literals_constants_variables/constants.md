[⌂ Home](../../../README.md)
[▲ Previous: Literals](./literals.md)
[▼ Next: Variables](./variables.md)

# Constants

## Definition

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

## Example

```php
<?php

define('NUMBER', 15.5);
const TEXT = "Hello, there!";

print("Number: " . NUMBER . "\nText: " . TEXT . "\n");

// TEXT = "Hi, everyone!"; // Error

```

**View**:
[Example](../../example/code/literals_constants_variables/constants/constants.php)

**Execute**:
* [OnlinePHP](https://onlinephp.io/c/d3636)
* [OneCompiler](https://onecompiler.com/php/446e5mnu9)

In the asbove example `NUMBER` and `TEXT` are constants. They can represent some values, like `15.5` and `"Hello, there!"`, but after the *initialisation*, their values cannot be changed. If a programmer tries to *assign* a value to a constant, the PHP parser will report an error, even if the assigned value is exactly the same as the initialization value.

## Ways of defining constants

There are two ways of defining constants:
* by `define` function,
* by `const` keyword.

**Defining constant by `define` function**

Historically original way of defining constants in PHP is the `define` funcion.

```php
<?php

define('SOME_CONSTANT', 1024);

```

**Defining constnt by `const` keyword**

The `const` keyword (by the way, very common in the other programming languages) has been introduced in PHP 5.3.

```php
<?php

const SOME_CONSTANT = 1024;

```

The below example shows both ways of defining constants.

```php
<?php

define('NUMBER', 15);
const TEXT = "Hello, there!";

print("Number: " . NUMBER . "\nText: " . TEXT . "\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/constants/constant_definition.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

### Differences between `define` function and `const` keyword usage

#### Constant definition placement

As opposed to defining constants using `define`, constants defined using the `const` keyword must be declared at the top-level scope because they are defined at compile-time. This means that they cannot be declared inside functions, loops, if statements or `try/catch` blocks.

-- [PHP Reference](https://www.php.net/manual/en/language.constants.syntax.php)

#### Types in constant definitions

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
[Example](../../example/code/literals_constants_variables/constants/constant_definition_types.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

#### Expressions in constant definitions

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
[Example](../../example/code/literals_constants_variables/constants/constant_definition_expressions.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

## Ways of accessing constants

There are three ways of accessing constants:
* by constant name,
* by `constant` function,
* by `get_defined_constants` function.

**Accessing constant by its name**

```php
<?php

echo 'SOME_CONSTANT';

```

**Accessing constnt by `constant` function**

```php
<?php

echo const('SOME_CONSTANT');

```

**Accessing constnt by `get_defined_constants` function**

```php
<?php

echo (get_defined_constants())['SOME_CONSTANT'];

```

The below example shows all the ways of accessing the contant.

```php
<?php

define('NUMBER', 15);
const VALUE = 12.4;
const TEXT = "Hello, there!";

print("Number: " . NUMBER . "\nValue: " . constant('VALUE') . "\nText: " . (get_defined_constants())['TEXT'] . "\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/constants/constant_access.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

The value of a constant is accessed simply by specifying its name. Unlike variables, a constant is not prepended with a `$`. It is also possible to use the `constant` function to read a constant's value if the constant's name is obtained dynamically. Use `get_defined_constants` to get a list of all defined constants.

-- [PHP Reference](https://www.php.net/manual/en/language.constants.syntax.php)

## Scope of the constants

Constants and (global) variables are in a different namespace. This implies that for example `true` and `$TRUE` are generally different.

-- [PHP Reference](https://www.php.net/manual/en/language.constants.syntax.php)

**Like *superglobals*, the *scope* of a constant is `global`.** Constants can be accessed from anywhere in a script without regard to scope.

As of PHP 7.1.0, *class constant* may declare a *visibility* of `protected` or `private`, making them only available in the hierarchical scope of the *class* in which it is defined.

– [PHP Reference](https://www.php.net/manual/en/language.constants.php)

The global scope of the constants declared by the `declare` function has been showed in the the following example. We can also see, that the `const` keyword can be used only in the global, class, interface, trait scope but not function.

```php
<?php

define("WEATHER", "windy");
const COLOR = "orange";
const NUMBER = 3;

printf("GLOBAL SCOPE: Weather: %s\n", WEATHER);
printf("GLOBAL SCOPE: Color: %s\n", COLOR);
printf("GLOBAL SCOPE: Number: %s\n", NUMBER);
print(PHP_EOL);

function someFunction()
{
    define("FLOWER", "rose");
    // const TREE = "pine";
    // PHP Parse error:  syntax error, unexpected token "const"

    printf("FUNCTION SCOPE: Weather: %s\n", WEATHER);
    printf("FUNCTION SCOPE: Color: %s\n", COLOR);
    printf("FUNCTION SCOPE: Number: %s\n", NUMBER);
    printf("FUNCTION SCOPE: Flower: %s\n", FLOWER);
    print(PHP_EOL);
}

someFunction();

printf("GLOBAL SCOPE: Flower: %s\n", FLOWER);
print(PHP_EOL);

class SomeClass
{
    const VEGETABLE = 'pumpkin';

    static function someClassFunction()
    {
        define('UTENSIL', 'cup');

        printf("CLASS SCOPE: Weather: %s\n", WEATHER);
        printf("CLASS SCOPE: Color: %s\n", COLOR);
        printf("CLASS SCOPE: Number: %s\n", NUMBER);
        // printf("CLASS SCOPE: Vegetable: %s\n", VEGETABLE);
        printf("CLASS SCOPE: Vegetable: %s\n", self::VEGETABLE);
        printf("CLASS SCOPE: Utensil: %s\n", UTENSIL);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        define('FURNITURE', 'armchair');

        printf("OBJECT SCOPE: Weather: %s\n", WEATHER);
        printf("OBJECT SCOPE: Color: %s\n", COLOR);
        printf("OBJECT SCOPE: Number: %s\n", NUMBER);
        printf("OBJECT SCOPE: Vegetable: %s\n", self::VEGETABLE);
        // printf("OBJECT SCOPE: Vegetable: %s\n", $this->VEGETABLE);
        printf("OBJECT SCOPE: Furniture: %s\n", FURNITURE);
        print(PHP_EOL);
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

printf("GLOBAL SCOPE: Vegetable: %s\n", SomeClass::VEGETABLE);
printf("GLOBAL SCOPE: Utensil: %s\n", UTENSIL);
printf("GLOBAL SCOPE: Furniture: %s\n", FURNITURE);
print(PHP_EOL);

interface SomeInterface
{
    const TREE = 'pine';
}

// printf("Tree defined? %s\n", defined('SomeInterface::TREE'));
// print(PHP_EOL);

printf("GLOBAL SCOPE: Tree: %s\n", SomeInterface::TREE);
print(PHP_EOL);

trait SomeTrait
{
    const FRUIT = 'orange';

    static function someTraitFunction()
    {
        define('TOOL', 'axe');

        printf("TRAIT SCOPE: Weather: %s\n", WEATHER);
        printf("TRAIT SCOPE: Color: %s\n", COLOR);
        printf("TRAIT SCOPE: Number: %s\n", NUMBER);
        // printf("TRAIT SCOPE: Fruit: %s\n", FRUIT);
        // printf("TRAIT SCOPE: Fruit: %s\n", self::FRUIT);
        // printf("TRAIT SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
        printf("TRAIT SCOPE: Tool: %s\n", TOOL);
        print(PHP_EOL);
    }

    static function someClassFunction()
    {
        define('DEVICE', 'calculator');

        printf("CLASS SCOPE: Weather: %s\n", WEATHER);
        printf("CLASS SCOPE: Color: %s\n", COLOR);
        printf("CLASS SCOPE: Number: %s\n", NUMBER);
        // printf("CLASS SCOPE: Fruit: %s\n", FRUIT);
        printf("CLASS SCOPE: Fruit: %s\n", self::FRUIT);
        // printf("CLASS SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
        printf("CLASS SCOPE: Device: %s\n", DEVICE);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        define('DECOR', 'vase');

        printf("OBJECT SCOPE: Weather: %s\n", WEATHER);
        printf("OBJECT SCOPE: Color: %s\n", COLOR);
        printf("OBJECT SCOPE: Number: %s\n", NUMBER);
        // printf("OBJECT SCOPE: Fruit: %s\n", FRUIT);
        // printf("OBJECT SCOPE: Fruit: %s\n", self::FRUIT);
        // printf("OBJECT SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
        printf("OBJECT SCOPE: Decor: %s\n", DECOR);
        print(PHP_EOL);
    }
}

SomeTrait::someTraitFunction();

// printf("GLOBAL SCOPE: Fruit: %s\n", SomeTrait::FRUIT);
printf("GLOBAL SCOPE: Tool: %s\n", TOOL);
// printf("GLOBAL SCOPE: Decor: %s\n", DECOR);
print(PHP_EOL);

class SomeTraitUsingClass
{
    use SomeTrait;
}

SomeTraitUsingClass::someClassFunction();

$some_trait_using_object = new SomeTraitUsingClass();
$some_trait_using_object->someObjectFunction();

printf("GLOBAL SCOPE: Fruit: %s\n", SomeTraitUsingClass::FRUIT);
printf("GLOBAL SCOPE: Tool: %s\n", TOOL);
printf("GLOBAL SCOPE: Device: %s\n", DEVICE);
printf("GLOBAL SCOPE: Decor: %s\n", DECOR);
print(PHP_EOL);

```

**View**:
[Example](../../example/code/literals_constants_variables/constants/constant_scope.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

## Functions handling constants

### [`define`](https://www.php.net/manual/en/function.define.php) function

**Syntax**

```
define(string $constant_name, mixed $value, bool $case_insensitive = false): bool
```

**Description**

Defines a named constant at runtime in the global scope.

**Arguments**

* **`constant_name`**

The name of the constant.

It is possible to define constants with reserved or even invalid names, whose value can (only) be retrieved with `constant` function. However, doing so is not recommended.

* **`value`**

The value of the constant.

While it is possible to define resource constants, it is not recommended and may cause unpredictable behavior.

* **`case_insensitive`**

If set to `true`, the constant will be defined *case-insensitive*. The default behavior is *case-sensitive*; i.e. `CONSTANT` and `Constant` represent different values.

Defining case-insensitive constants is deprecated as of PHP 7.3.0. As of PHP 8.0.0, only false is an acceptable value, passing true will produce a warning.

Case-insensitive constants are stored as lower-case.

**Return value**

Returns `true` on success or `false` on failure.

-- [PHP Reference](https://www.php.net/manual/en/function.define.php)

**Examples**

```php
<?php

define('NUMBER', 15);
define('TEXT', 'Hello, there!');

print("Number: " . NUMBER . "\nText: " . TEXT . "\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/constants/functions/function_define.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

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

– [PHP Reference](https://www.php.net/manual/en/language.constants.php)

For our purposes here, a letter is `a-z, A-Z`, and the ASCII characters from `128` through `255` (`0x80-0xff`).

*Example #1 Defining Constants*

```php
define("CONSTANT", "Hello world.");
echo CONSTANT; // outputs "Hello world."
echo Constant; // outputs "Constant" and issues a notice.

define("GREETING", "Hello you.", true);
echo GREETING; // outputs "Hello you."
echo Greeting; // outputs "Hello you."

// Works as of PHP 7
define('ANIMALS', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS[1]; // outputs "cat"

?>
```

*Example #2 Constants with Reserved Names*

This example illustrates the possibility to define a constant with the same name as a magic constant. Since the resulting behavior is obviously confusing, it is not recommended to do this in practise, though.

```php
<?php
var_dump(defined('__LINE__'));
var_dump(define('__LINE__', 'test'));
var_dump(constant('__LINE__'));
var_dump(__LINE__);
?>
```

The above example will output:

```
bool(false)
bool(true)
string(4) "test"
int(5)
```

-- [PHP Reference](https://www.php.net/manual/en/function.define.php)

### [`constant`](https://www.php.net/manual/en/function.constant.php) function

**Syntax**

```
constant(string $name): mixed
```

**Description**

Return the value of the constant indicated by the constant name.

`constant` is useful if you need to retrieve the value of a constant, but do not know its name. I.e. it is stored in a variable or returned by a function.

This function works also with *class constants* and *enum cases*.

**Arguments**

* **`name`**

The constant name.

**Return value**

Returns the value of the constant.

**Errors or exceptions**

If the constant is not defined, an `Error` exception is thrown. Prior to PHP 8.0.0, an `E_WARNING` level error was generated in that case.

– [PHP Reference](https://www.php.net/manual/en/function.constant.php)

**Examples**

```php
<?php
// PHP Reference: https://www.php.net/manual/en/function.constant.php

define('NUMBER', 15);
const TEXT = 'Hello, there!';

print("Number: " . constant('NUMBER') . "\nText: " . constant('TEXT') . "\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/constants/functions/function_constant.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

*Example #1 Using `constant()` with Constants*

```php
<?php

define("MAXSIZE", 100);

echo MAXSIZE;
echo constant("MAXSIZE"); // same thing as the previous line


interface bar {
    const test = 'foobar!';
}

class foo {
    const test = 'foobar!';
}

$const = 'test';

var_dump(constant('bar::'. $const)); // string(7) "foobar!"
var_dump(constant('foo::'. $const)); // string(7) "foobar!"

?>
```

*Example #2 Using `constant()` with Enum Cases (as of PHP 8.1.0)*

```php
<?php

enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

$case = 'Hearts';

var_dump(constant('Suit::'. $case)); // enum(Suit::Hearts)

?>
```

-- [PHP Reference](https://www.php.net/manual/en/function.constant.php)

### [`get_defined_constants`](https://www.php.net/manual/en/function.get-defined-constants.php) function

**Syntax**

```
get_defined_constants(bool $categorize = false): array
```

**Description**

Returns the names and values of all the constants currently defined. This includes those created by extensions as well as those created with the `define` function.

**Arguments**

* **`categorize`**

Causing this function to return a multi-dimensional array with categories in the keys of the first dimension and constants and their values in the second dimension.

```php
<?php
define("MY_CONSTANT", 1);
print_r(get_defined_constants(true));
?>

```

The above example will output something similar to:

```
Array
(
    [Core] => Array
        (
            [E_ERROR] => 1
            [E_WARNING] => 2
            [E_PARSE] => 4
            [E_NOTICE] => 8
            [E_CORE_ERROR] => 16
            [E_CORE_WARNING] => 32
            [E_COMPILE_ERROR] => 64
            [E_COMPILE_WARNING] => 128
            [E_USER_ERROR] => 256
            [E_USER_WARNING] => 512
            [E_USER_NOTICE] => 1024
            [E_ALL] => 2047
            [TRUE] => 1
        )

    [pcre] => Array
        (
            [PREG_PATTERN_ORDER] => 1
            [PREG_SET_ORDER] => 2
            [PREG_OFFSET_CAPTURE] => 256
            [PREG_SPLIT_NO_EMPTY] => 1
            [PREG_SPLIT_DELIM_CAPTURE] => 2
            [PREG_SPLIT_OFFSET_CAPTURE] => 4
            [PREG_GREP_INVERT] => 1
        )

    [user] => Array
        (
            [MY_CONSTANT] => 1
        )

)
```

**Return value**

Returns an array of `constant name => constant value` array, optionally groupped by extension name registering the constant.

– [PHP Reference](https://www.php.net/manual/en/function.get-defined-constants.php)

**Examples**

```php
<?php
// PHP Reference: https://www.php.net/manual/en/function.get-defined-constants.php

define('NUMBER', 15);
const TEXT = 'Hello, there!';

print("Number: " . (get_defined_constants())['NUMBER'] . "\nText: " . (get_defined_constants())['TEXT'] . "\n");

```

**View**:
[Example](../../example/code/literals_constants_variables/constants/functions/function_get_defined_constants.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

*Example #1 `get_defined_constants()` Example*

```php
<?php
print_r(get_defined_constants());
?>
```

The above example will output something similar to:

```
Array
(
    [E_ERROR] => 1
    [E_WARNING] => 2
    [E_PARSE] => 4
    [E_NOTICE] => 8
    [E_CORE_ERROR] => 16
    [E_CORE_WARNING] => 32
    [E_COMPILE_ERROR] => 64
    [E_COMPILE_WARNING] => 128
    [E_USER_ERROR] => 256
    [E_USER_WARNING] => 512
    [E_USER_NOTICE] => 1024
    [E_ALL] => 2047
    [TRUE] => 1
)
```

-- [PHP Reference](https://www.php.net/manual/en/function.get-defined-constants.php)

[▵ Up](#constants)
[⌂ Home](../../../README.md)
[▲ Previous: Literals](./literals.md)
[▼ Next: Variables](./variables.md)
