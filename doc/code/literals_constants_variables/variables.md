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

**Result**:

```
Number: 15
Text: Hello, there!

Number: 12.4
Text: Hi, everyone!

```

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

**Result**:

```
Number: 15
Text: Hello, there!

```

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

### Types in constant definitions

```php
<?php

$someBoolValue = true;

print("Some logical value: {$someBoolValue}\n\n");

$someIntNumber = 15;

print("Some integer number: {$someIntNumber}\n\n");

$someDecNumber = 15.5;

print("Some decimal number: {$someDecNumber}\n\n");

$someText = 'orange';

print("Some text string: {$someText}\n\n");

$someArray = [
    'nickname' => 'pumpkinette',
    'os' => 'linux',
    'browser' => 'opera',
];

print("Some array:\n");
print_r($someArray);
print("\n");

$someFunction = function() {
    return 'some_function';
};

print("Some function: " . $someFunction() . "\n\n");

$someObject = new stdClass();

print("Some object:\n");
print_r($someObject);
print("\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_definition_types.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Some logical value: 1

Some integer number: 15

Some decimal number: 15.5

Some text string: orange

Some array:
Array
(
    [nickname] => pumpkinette
    [os] => linux
    [browser] => opera
)

Some function: some_function

Some object:
stdClass Object
(
)

```

### Autovivification

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

**Result**:

```
Number: 15
Text: Hello, there!

```

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

## Assigning to the variables

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

```php
<?php

$someVariable = 15;
$otherVariable = "Hello, there!";

print("Some variable: {$someVariable}\nOther variable: {$otherVariable}\n\n");

$byValue = $someVariable;
$byReference = &$otherVariable;

print("Assinged by value: {$byValue}\nAssigned by reference: {$byReference}\n\n");

$someVariable = 1024;
$otherVariable = "Fly me to the moon.";

print("Some variable: {$someVariable}\nOther variable: {$otherVariable}\n\n");
print("Assinged by value: {$byValue}\nAssigned by reference: {$byReference}\n\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_assignment.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Some variable: 15
Other variable: Hello, there!

Assinged by value: 15
Assigned by reference: Hello, there!

Some variable: 1024
Other variable: Fly me to the moon.

Assinged by value: 15
Assigned by reference: Fly me to the moon.

```

## Destroying variables

A variable can be destroyed by using the `unset()` language construct.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.basics.php)

```php
<?php

$number = 15;
$text = "Hello, there!";

print("Does number exist: " . (isset($number) ? 'yes' : 'no') . "\nDoes number exist: " . (isset($text) ? 'yes' : 'no') . "\n\n");

unset($number);
unset($text);

print("Does number exist: " . (isset($number) ? 'yes' : 'no') . "\nDoes number exist: " . (isset($text) ? 'yes' : 'no') . "\n\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_destroying.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Does number exist: yes
Does number exist: yes

Does number exist: no
Does number exist: no

```

## Scope of the variables

```php
<?php

$weather = 'windy';
$color = "orange";
$number = 3;
$level = 15.5;

printf("GLOBAL SCOPE: Weather: %s\n", $weather);
printf("GLOBAL SCOPE: Color: %s\n", $color);
printf("GLOBAL SCOPE: Number: %s\n", $number);
printf("GLOBAL SCOPE: Level: %s\n", $level);
print(PHP_EOL);

function someFunction()
{
    $flower = 'rose';
    static $degree = 10;

    // printf("FUNCTION SCOPE: Weather: %s\n", $weather);
    printf("FUNCTION SCOPE: Flower: %s\n", $flower);
    printf("FUNCTION SCOPE: Degree: %s\n", $degree);
    print(PHP_EOL);
}

someFunction();

// printf("GLOBAL SCOPE: Flower: %s\n", $flower);
// print(PHP_EOL);

class SomeClass
{
    public $vegetable = 'pumpkin';
    public static $grain = 'wheat';

    static function someClassFunction()
    {
        $utensil = 'cup';

        printf("CLASS SCOPE: Grain: %s\n", self::$grain);
        // printf("OBJECT SCOPE: Vegetable: %s\n", $this->vegetable);
        printf("CLASS SCOPE: Utensil: %s\n", $utensil);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        $furniture = 'armchair';

        printf("OBJECT SCOPE: Vegetable: %s\n", $this->vegetable);
        printf("OBJECT SCOPE: Grain: %s\n", self::$grain);
        // printf("OBJECT SCOPE: Grain: %s\n", $this->grain);
        printf("OBJECT SCOPE: Furniture: %s\n", $furniture);
        print(PHP_EOL);
    }
}

SomeClass::someClassFunction();

$someObject = new SomeClass();
$someObject->someObjectFunction();

printf("GLOBAL SCOPE: Grain: %s\n", SomeClass::$grain);
print(PHP_EOL);

trait SomeTrait
{
    public $fruit = 'orange';
    public static $plant = 'polypodium';

    static function someTraitFunction()
    {
        $tool = 'axe';

        // printf("OBJECT SCOPE: Fruit: %s\n", $this->fruit);
        printf("TRAIT SCOPE: Plant: %s\n", self::$plant);
        printf("TRAIT SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("TRAIT SCOPE: Tool: %s\n", $tool);
        print(PHP_EOL);
    }

    static function someClassFunction()
    {
        $device = 'calculator';

        // printf("OBJECT SCOPE: Fruit: %s\n", $this->fruit);
        printf("CLASS SCOPE: Plant: %s\n", self::$plant);
        printf("CLASS SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("CLASS SCOPE: Device: %s\n", $device);
        print(PHP_EOL);
    }

    function someObjectFunction()
    {
        $decor = 'vase';

        printf("OBJECT SCOPE: Fruit: %s\n", $this->fruit);
        printf("OBJECT SCOPE: Plant: %s\n", self::$plant);
        printf("OBJECT SCOPE: Plant: %s\n", SomeTrait::$plant);
        printf("OBJECT SCOPE: Decor: %s\n", $decor);
        print(PHP_EOL);
    }
}

SomeTrait::someTraitFunction();

printf("GLOBAL SCOPE: Plant: %s\n", SomeTrait::$plant);
print(PHP_EOL);

class SomeTraitUsingClass
{
    use SomeTrait;
}

SomeTraitUsingClass::someClassFunction();

$some_trait_using_object = new SomeTraitUsingClass();
$some_trait_using_object->someObjectFunction();

printf("GLOBAL SCOPE: Plant: %s\n", SomeTraitUsingClass::$plant);
print(PHP_EOL);

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_scope.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
GLOBAL SCOPE: Weather: windy
GLOBAL SCOPE: Color: orange
GLOBAL SCOPE: Number: 3
GLOBAL SCOPE: Level: 15.5

FUNCTION SCOPE: Flower: rose
FUNCTION SCOPE: Degree: 10

CLASS SCOPE: Grain: wheat
CLASS SCOPE: Utensil: cup

OBJECT SCOPE: Vegetable: pumpkin
OBJECT SCOPE: Grain: wheat
OBJECT SCOPE: Furniture: armchair

GLOBAL SCOPE: Grain: wheat

TRAIT SCOPE: Plant: polypodium
TRAIT SCOPE: Plant: polypodium
TRAIT SCOPE: Tool: axe

GLOBAL SCOPE: Plant: polypodium

CLASS SCOPE: Plant: polypodium
CLASS SCOPE: Plant: polypodium
CLASS SCOPE: Device: calculator

OBJECT SCOPE: Fruit: orange
OBJECT SCOPE: Plant: polypodium
OBJECT SCOPE: Plant: polypodium
OBJECT SCOPE: Decor: vase

GLOBAL SCOPE: Plant: polypodium

```

[▵ Up](#variables)
[⌂ Home](../../../README.md)
[▲ Previous: Constants](./constants.md)
