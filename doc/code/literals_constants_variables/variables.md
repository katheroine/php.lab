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

## Example

```php
?php

$number = 15;
$text = "Hello, there!";

print("Number: " . $number . "\nText: {$text}\n\n");

$number = 12.4;
$text = "Hi, everyone!";

print("Number: {$number}\nText: " . $text . "\n\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variables.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

In the asbove example `$number$` and `$text` are variables. They can represent some values, like `15.5` and `"Hello, there!"`, and after the *initialisation*, their values can be changed.

The example shows two ways of combining variables with strings (in the `print` function). One is realised by the *concatenation operator* `.` (the dot sign), and the second one is called *string interpolation*.

## Defining variables

Variable is defined by placing its name for the first time followed by the equals sign (the *assign operator*) and its value.

```php
<?php

$number = 15;
$text = "Hello, there!";

print("Number: {$number}\nText: {$text}\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_definition.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

The act of creating a variable is called a *definition* and the act of setting up the value of just creating variable is called *initialisation*. Not every language requires the initialisation be done at the moment of definition. In meny strongly-typed languages, the definition consist setting up the name of the variable and its *type* and its initial value is setting automatically as for example `0` or an empty text string. Loosely-typed PHP doesn't allow to define a variable without initialisation.

The following example will generate a warning (`PHP Warning:  Undefined variable $number`) in PHP 8.4:

```php
<?php

$number;

print("Number: {$number}\n");

```

as well as this one, where there's no try of defining variable before using it at all:

```php
<?php

print("Number: {$number}\n");

```

It is not necessary to declare variables in PHP, however, it is a very good practice. Accessing an undefined variable will result in an `E_WARNING` (prior to PHP 8.0.0, `E_NOTICE`). An undefined variable has a default value of `null`. The `isset()` language construct can be used to detect if a variable has already been initialized.

*Example: Default value of an uninitialized variable*

```php
<?php
// Unset AND unreferenced (no use context) variable.
var_dump($unset_var);
?>
```

The above example will output:

```
Warning: Undefined variable $unset_var in ...
NULL
```

Relying on the default value of an uninitialized variable is problematic when including one file in another which uses the same variable name.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

## Autovivification

PHP allows array *autovivification* (automatic creation of new arrays) from an undefined variable. Appending an element to an undefined variable will create a new array and will not generate a warning.

*Example: Autovivification of an array from an undefined variable*

```php
<?php
$unset_array[] = 'value'; // Does not generate a warning.
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

## Accessing variables

Accessing variale is done by placing its name (with the dolar character `$` at the beginning) where its value is supposed to occure.

```php
<?php

$number = 15;
$text = "Hello, there!";

print("Number: " . $number . "\nText: {$text}\n\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_access.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

*Example: Accessing obscure variable names*

```php
<?php
${'invalid-name'} = 'bar';
$name = 'invalid-name';
echo ${'invalid-name'}, " ", $$name;
?>
```

The above example will output:

```
bar bar
```

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

## Assigning values to the variables

By default, variables are always assigned by *value*. That is to say, when an *expression* is assigned to a variable, the entire value of the original expression is copied into the destination variable. This means, for instance, that after assigning one variable's value to another, changing one of those variables will have no effect on the other.

PHP also offers another way to assign values to variables: assign by *reference*. This means that the new variable simply references (in other words, "becomes an alias for" or "points to") the original variable. Changes to the new variable affect the original, and vice versa.

To assign by reference, simply prepend an ampersand (`&`) to the beginning of the variable which is being assigned (the source variable). For instance, the following code snippet outputs `'My name is Bob'` twice:

```php
<?php
$foo = 'Bob';              // Assign the value 'Bob' to $foo
$bar = &$foo;              // Reference $foo via $bar.
$bar = "My name is $bar";  // Alter $bar...
echo $bar;
echo $foo;                 // $foo is altered too.
?>
```

One important thing to note is that only variables may be assigned by reference.

```php
<?php
$foo = 25;
$bar = &$foo;      // This is a valid assignment.
$bar = &(24 * 7);  // Invalid; references an unnamed expression.

function test()
{
   return 25;
}

$bar = &test();    // Invalid because test() doesn't return a variable by reference.
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

## Destroying variables

A variable can be destroyed by using the `unset()` language construct.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

[▵ Up](#variables)
[⌂ Home](../../../README.md)
[▲ Previous: Constants](./constants.md)
