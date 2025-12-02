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

A *constant* is an *identifier* (*name*) for a simple *value*. As the *name* suggests, that *value* cannot change during the execution of the script (except for *magic constants*, which aren't actually constants). Constants are case-sensitive. By convention, constant identifiers are always uppercase.

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

**Like *superglobals*, the *scope* of a constant is `global`.** Constants can be accessed from anywhere in a script without regard to scope.

As of PHP 7.1.0, *class constant* may declare a *visibility* of `protected` or `private`, making them only available in the hierarchical scope of the *class* in which it is defined.

– [PHP Reference](https://www.php.net/manual/en/language.constants.php)
