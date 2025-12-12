[⌂ Home](../../../README.md)
[▲ Previous: Constants](./constants.md)

# Variables

## Definition

> In *high-level programming*, a **variable** is an *abstract storage* or *indirection location* paired with an *associated symbolic name*, which contains some known or unknown quantity of data or object referred to as a *value*; or in simpler terms, a *variable* is a named container for a particular *set of bits* or *type of data* (like `integer`, `float`, `string`, etc...) or `undefined`. A *variable* can eventually be associated with or identified by a *memory address*.
>
> The *variable name* is the usual way to reference the *stored value*, in addition to referring to the variable itself, depending on the context. This separation of name and content allows the name to be used independently of the exact information it represents. The identifier in computer source code can be bound to a value during run time, and the value of the variable may thus change during the course of program execution.
>
> Variables in programming may not directly correspond to the concept of variables in mathematics. The latter is abstract, having no reference to a physical object such as storage location. The value of a computing variable is not necessarily part of an equation or formula as in mathematics. Furthermore, the variables can also be constants if the value is defined statically. Variables in computer programming are frequently given long names to make them relatively descriptive of their use, whereas variables in mathematics often have terse, one- or two-character names for brevity in transcription and manipulation.
>
> A variable's storage location may be referenced by several different *identifiers*, a situation known as *aliasing*. Assigning a value to the variable using one of the identifiers will change the value that can be accessed through the other identifiers.
>
> Compilers have to replace variables' symbolic names with the actual locations of the data. While a variable's name, type, and location often remain fixed, the data stored in the location may be changed during program execution.

-- [Wikipedia](https://en.wikipedia.org/wiki/Variable_(high-level_programming))

## Variable names

Variables in PHP are represented by a dollar sign followed by the name of the variable. The variable name is case-sensitive.

A valid variable *name* starts with a letter (`A-Z`, `a-z`, or the bytes from `128` through `255`) or underscore, followed by any number of letters, numbers, or underscores. As a regular expression, it would be expressed thus: `^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$`

PHP doesn't support Unicode variable names, however, some character encodings (such as UTF-8) encode characters in such a way that all bytes of a multi-byte character fall within the allowed range, thus making it a valid variable name.

`$this` is a special variable that can't be assigned. Prior to PHP 7.1.0, indirect assignment (e.g. by using variable variables) was possible.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

Rules for PHP variables:

* A variable starts with the $ sign, followed by the name of the variable
* A variable name must start with a letter or the underscore character
* A variable name cannot start with a number
* A variable name can only contain alpha-numeric characters and underscores (`A-z`, `0-9`, and `_` )
* Variable names are case-sensitive ($age and $AGE are two different variables)

-- [W3Schools](https://www.w3schools.com/php/php_variables.asp)

*Example: Valid variable names*

```php
<?php
$var = 'Bob';
$Var = 'Joe';
echo "$var, $Var";      // outputs "Bob, Joe"

$_4site = 'not yet';    // valid; starts with an underscore
$täyte = 'mansikka';    // valid; 'ä' is (Extended) ASCII 228.
?>
```

*Example: Invalid variable names*

```php
<?php
$4site = 'not yet';     // invalid; starts with a number
?>
```

PHP accepts a sequence of any bytes as a variable name. Variable names that do not follow the above-mentioned naming rules can only be accessed dynamically at runtime.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

[▵ Up](#variables)
[⌂ Home](../../../README.md)
[▲ Previous: Constants](./constants.md)
