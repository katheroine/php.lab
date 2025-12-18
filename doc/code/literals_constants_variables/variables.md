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

The scope of a variable is the context within which it is defined. PHP has a *function scope* and a *global scope*. Any variable defined outside a function is limited to the *global scope*. When a file is included, the code it contains inherits the variable scope of the line on which the include occurs.

*Example: Example of global variable scope*

```php
<?php
$a = 1;
include 'b.inc'; // Variable $a will be available within b.inc
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php)

*Example: Global variable accessibility in an included file*

```php
<?php

$globalVariable = 1024;

include('included_file_with_function.php');

show();

```

Included file `included_file_with_function.php`:

```php
<?php

function show()
{
    global $globalVariable;

    print("Global variable: {$globalVariable}\n");
}

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/global_variable_in_included_file.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Global variable: 1024
```

Any variable created inside a *named function* or an *anonymous function* is limited to the scope of the function body. However, *arrow functions* [in PHP it's the special name for the *closures* defined in the simplified way using the arrow `=>` -- Katheroine] bind variables from the parent scope to make them available inside the body. If a file include occurs inside a function within the calling file, the variables contained in the called file will be available as if they had been defined inside the calling function.

*Example: Example of local variable scope*

```php
<?php
$a = 1; // global scope

function test()
{
    echo $a; // Variable $a is undefined as it refers to a local version of $a
}
?>
```

The example above will generate an undefined variable `E_WARNING` (or an `E_NOTICE` prior to PHP 8.0.0). This is because the echo statement refers to a local version of the $a variable, and it has not been assigned a value within this scope. Note that this is a little bit different from the C language in that global variables in C are automatically available to functions unless specifically overridden by a local definition. This can cause some problems in that people may inadvertently change a global variable. In PHP global variables must be declared global inside a function if they are going to be used in that function.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php)

*Example: Variable binding to a closure*

```php
<?php

$someVariable = 15;
$otherVariable = 1024;

// Regular closure:
$someClosure = function() use ($someVariable) {
    print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
    print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");

    print("Some variable: {$someVariable}\n");
    // print("Other variable: {$otherVariable}\n");
    // PHP Warning:  Undefined variable $otherVariable
};

$someClosure();

// Arrow function:
$otherClosure = fn() => $someVariable + $otherVariable;

$result = $otherClosure();

print("Arrow function result: {$result}\n");
```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_binding_to_closure.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Is some variable defined? yes
Is other variable defined? no
Some variable: 15
Arrow function result: 1039
```

*Example: Variables from the file included withing a function*

```php
<?php

function someFunction()
{
    print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
    print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");
    print('Is another variable defined? ' . (isset($anotherVariable) ? 'yes' : 'no') . "\n");
    print(PHP_EOL);

    $someVariable = 15;
    include('included_file_with_variables.php');

    print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
    print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");
    print('Is another variable defined? ' . (isset($anotherVariable) ? 'yes' : 'no') . "\n");

    print("Some variable: {$someVariable}\n");
    print("Other variable: {$otherVariable}\n");
    print("Another variable: {$anotherVariable}\n");
    print(PHP_EOL);
}

someFunction();

print('Is some variable defined? ' . (isset($someVariable) ? 'yes' : 'no') . "\n");
print('Is other variable defined? ' . (isset($otherVariable) ? 'yes' : 'no') . "\n");
print('Is another variable defined? ' . (isset($anotherVariable) ? 'yes' : 'no') . "\n");
print(PHP_EOL);

// print("Other variable: {$otherVariable}\n");
// PHP Warning:  Undefined variable $otherVariable

```

Included file `included_file_with_variables.php`:

```php
<?php

$otherVariable = 1024;
$anotherVariable = 20000;

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/variable_from_file_included_within_function.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Is some variable defined? no
Is other variable defined? no
Is another variable defined? no

Is some variable defined? yes
Is other variable defined? yes
Is another variable defined? yes
Some variable: 15
Other variable: 1024
Another variable: 20000

Is some variable defined? no
Is other variable defined? no
Is another variable defined? no

```

*Example: Variable scope*

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

### Global variables

The `global` keyword is used to bind a variable from a *global scope* into a *local scope*. The keyword can be used with a list of variables or a single variable. A **local variable** will be created referencing the *global variable* of the same name. If the **global variable** does not exist, the variable will be created in *global scope* and assigned `null`.

*Example: Using global*

```php
<?php
$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;

    $b = $a + $b;
}

Sum();
echo $b;
?>
```

The above example will output:

```
3
```

By declaring `$a` and `$b` *global* within the function, all references to either variable will refer to the *global* version. There is no limit to the number of *global variables* that can be manipulated by a function.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.global)

*Example: Global variables*

```php
<?php

$globalVariable = 1024;

print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n\n");

function someFunction()
{
    print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n\n");

    global $globalVariable;

    print('Is global variable defined? ' . (isset($globalVariable) ? 'yes' : 'no') . "\n");
    print("Global variable: {$globalVariable}\n\n");

    $globalVariable = 2048;

    print("Global variable: {$globalVariable}\n\n");
}

someFunction();

print("Global variable: {$globalVariable}\n\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/global_variables.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Is global variable defined? yes

Is global variable defined? no

Is global variable defined? yes
Global variable: 1024

Global variable: 2048

Global variable: 2048

```

A second way to access variables from the *global scope* is to use the special PHP-defined `$GLOBALS` array. The previous example can be rewritten as:

*Example: Using `$GLOBALS` instead of `global`*

```php
<?php
$a = 1;
$b = 2;

function Sum()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Sum();
echo $b;
?>
```

The `$GLOBALS` array is an associative array with the name of the *global variable* being the key and the contents of that variable being the value of the array element. Notice how `$GLOBALS` exists in any scope, this is because `$GLOBALS` is a *superglobal*. Here's an example demonstrating the power of *superglobals*:

*Example: Example demonstrating superglobals and scope*

```php
<?php
function test_superglobal()
{
    echo $_POST['name'];
}
?>
```

Using `global` keyword outside a function is not an error. It can be used if the file is included from inside a function.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.global)

### Static variables

Another important feature of variable scoping is the **static variable**. A *static variable* exists only in a local function scope, but it does not lose its value when program execution leaves this scope. Consider the following example:

*Example: Example demonstrating need for static variables*

```php
<?php
function test()
{
    $a = 0;
    echo $a;
    $a++;
}
?>
```

This function is quite useless since every time it is called it sets `$a` to `0` and prints `0`. The `$a++` which increments the variable serves no purpose since as soon as the function exits the `$a` variable disappears. To make a useful counting function which will not lose track of the current count, the `$a` variable is declared *static*:

*Example: Example use of static variables*

```php
<?php
function test()
{
    static $a = 0;
    echo $a;
    $a++;
}
?>
```

Now, `$a` is initialized only in first call of function and every time the `test()` function is called it will print the value of `$a` and increment it.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.static)

*Example: Static variables*

```php
<?php

function someFunction()
{
    static $quantity = 6 / (1 + 2);
    static $level = sqrt(9); // Correct from 8.3

    print("Quantity: {$quantity}\n");
    print("Level: {$level}\n\n");

    $quantity++;
    $level--;
}

someFunction();
someFunction();
someFunction();

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/static_variables.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Quantity: 2
Level: 3

Quantity: 3
Level: 2

Quantity: 4
Level: 1

```

*Static variables* also provide one way to deal with *recursive functions*. The following simple function recursively counts to `10`, using the static variable `$count` to know when to stop:

*Example: Static variables with recursive functions*

```php
<?php
function test()
{
    static $count = 0;

    $count++;
    echo $count;
    if ($count < 10) {
        test();
    }
    $count--;
}
?>
```

Prior to PHP 8.3.0, *static variables* could only be *initialized* using a *constant expression*. As of PHP 8.3.0, *dynamic expressions* (e.g. function calls) are also allowed:

*Example: Declaring static variables*

```php
<?php
function foo(){
    static $int = 0;          // correct
    static $int = 1+2;        // correct
    static $int = sqrt(121);  // correct as of PHP 8.3.0

    $int++;
    echo $int;
}
?>
```

*Static variables* inside *anonymous functions* persist only within that specific function instance. If the anonymous function is recreated on each call, the static variable will be reinitialized.

*Example: Static variables in anonymous functions*

```php
<?php
function exampleFunction($input) {
    $result = (static function () use ($input) {
        static $counter = 0;
        $counter++;
        return "Input: $input, Counter: $counter\n";
    });

    return $result();
}

// Calls to exampleFunction will recreate the anonymous function, so the static
// variable does not retain its value.
echo exampleFunction('A'); // Outputs: Input: A, Counter: 1
echo exampleFunction('B'); // Outputs: Input: B, Counter: 1
?>
```

As of PHP 8.1.0, when a method using *static variables* is *inherited* (but not *overridden*), the inherited method will now share static variables with the parent method. This means that *static variables in methods* now behave the same way as *static properties*[...]

*Example: Usage of static Variables in Inherited Methods*

```php
<?php
class Foo {
    public static function counter() {
        static $counter = 0;
        $counter++;
        return $counter;
    }
}
class Bar extends Foo {}
var_dump(Foo::counter()); // int(1)
var_dump(Foo::counter()); // int(2)
var_dump(Bar::counter()); // int(3), prior to PHP 8.1.0 int(1)
var_dump(Bar::counter()); // int(4), prior to PHP 8.1.0 int(2)
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.static)

*Example: Static variables of class methods and the inheritance*

```php
<?php

class SomeClass
{
    function someFunction()
    {
        static $number = 0;

        printf("Number: %d\n", $number);

        $number++;
    }
}

$someObject = new SomeClass();

$someObject->someFunction();
$someObject->someFunction();
$someObject->someFunction();

print(PHP_EOL);

$otherObject = new SomeClass();

$otherObject->someFunction();
$otherObject->someFunction();
$otherObject->someFunction();

print(PHP_EOL);

class SomeSubclass extends SomeClass
{
}

$anotherObject = new SomeSubclass();

$anotherObject->someFunction();
$anotherObject->someFunction();
$anotherObject->someFunction();

print(PHP_EOL);

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/static_variables_and_inheritance.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Number: 0
Number: 1
Number: 2

Number: 3
Number: 4
Number: 5

Number: 6
Number: 7
Number: 8

```

As of PHP 8.3.0, static variables can be initialized with arbitrary expressions. This means that method calls, for example, can be used to initialize static variables.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.static)

### References with global and static variables

PHP implements the `static` and `global` modifier for variables in terms of *references*. For example, a true global variable imported inside a function scope with the global statement actually creates a reference to the global variable. This can lead to unexpected behaviour which the following example addresses:

```php
<?php
function test_global_ref() {
    global $obj;
    $new = new stdClass;
    $obj = &$new;
}

function test_global_noref() {
    global $obj;
    $new = new stdClass;
    $obj = $new;
}

test_global_ref();
var_dump($obj);
test_global_noref();
var_dump($obj);
?>
```

The above example will output:

```
NULL
object(stdClass)#1 (0) {
}
```

A similar behaviour applies to the static statement. References are not stored statically:

```php
<?php
function &get_instance_ref() {
    static $obj;

    echo 'Static object: ';
    var_dump($obj);
    if (!isset($obj)) {
        $new = new stdClass;
        // Assign a reference to the static variable
        $obj = &$new;
    }
    if (!isset($obj->property)) {
        $obj->property = 1;
    } else {
        $obj->property++;
    }
    return $obj;
}

function &get_instance_noref() {
    static $obj;

    echo 'Static object: ';
    var_dump($obj);
    if (!isset($obj)) {
        $new = new stdClass;
        // Assign the object to the static variable
        $obj = $new;
    }
    if (!isset($obj->property)) {
        $obj->property = 1;
    } else {
        $obj->property++;
    }
    return $obj;
}

$obj1 = get_instance_ref();
$still_obj1 = get_instance_ref();
echo "\n";
$obj2 = get_instance_noref();
$still_obj2 = get_instance_noref();
?>
```

The above example will output:

```
Static object: NULL
Static object: NULL

Static object: NULL
Static object: object(stdClass)#3 (1) {
  ["property"]=>
  int(1)
}
```

This example demonstrates that when assigning a reference to a static variable, it is not remembered when the `&get_instance_ref()` function is called a second time.

-- [PHP Reference](https://www.php.net/manual/en/language.variables.scope.php)

## Functions handling variables

### [`isset`](https://www.php.net/manual/en/function.isset.php) function

#### Availability

PHP 4, PHP 5, PHP 7, PHP 8

#### Syntax

```
isset(mixed $var, mixed ...$vars): bool
```

#### Description

Determine if a variable is considered set, this means if a variable is *declared* and is different than `null`.

If a variable has been unset with the `unset()` function, it is no longer considered to be set.

`isset()` will return `false` when checking a variable that has been assigned to `null`. Also note that a `null` character (`\0`) is not equivalent to the PHP `null` constant.

If multiple parameters are supplied then `isset()` will return `true` only if all of the parameters are considered set. Evaluation goes from left to right and stops as soon as an unset variable is encountered.

#### Attributes

* **`var`**

The variable to be checked.

* **`vars`**

Further variables.

#### Return value

Returns `true` if var exists and has any value other than `null`. `false` otherwise.

#### Examples

*Example: Basic example*

```php
<?php
// PHP Reference: https://www.php.net/manual/en/function.isset.php

$number = 15;
$text = "Hello, there!";

print("Is number defined: "
    . (isset($number) ? 'yes' : 'no')
    . "\nIs text defined: "
    . (isset($text) ? 'yes' : 'no')
    . "\nIs answer defined: "
    . (isset($answer) ? 'yes' : 'no')
    . "\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/functions/function_isset.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Is number defined: yes
Is text defined: yes
Is answer defined: no
```

*Example: isset() Examples*

```php
<?php

$var = '';

// This will evaluate to TRUE so the text will be printed.
if (isset($var)) {
    echo "This var is set so I will print.", PHP_EOL;
}

// In the next examples we'll use var_dump to output
// the return value of isset().

$a = "test";
$b = "anothertest";

var_dump(isset($a));     // TRUE
var_dump(isset($a, $b)); // TRUE

unset ($a);

var_dump(isset($a));     // FALSE
var_dump(isset($a, $b)); // FALSE

$foo = NULL;
var_dump(isset($foo));   // FALSE

?>
```

This also work for elements in arrays:

*Example: Example of isset() with array elements*

```php
<?php

$a = array ('test' => 1, 'hello' => NULL, 'pie' => array('a' => 'apple'));

var_dump(isset($a['test']));            // TRUE
var_dump(isset($a['foo']));             // FALSE
var_dump(isset($a['hello']));           // FALSE

// The key 'hello' equals NULL so is considered unset
// If you want to check for NULL key values then try:
var_dump(array_key_exists('hello', $a)); // TRUE

// Checking deeper array values
var_dump(isset($a['pie']['a']));        // TRUE
var_dump(isset($a['pie']['b']));        // FALSE
var_dump(isset($a['cake']['a']['b']));  // FALSE

?>
```

*Example: isset() on String Offsets*

```php
<?php
$expected_array_got_string = 'somestring';
var_dump(isset($expected_array_got_string['some_key']));
var_dump(isset($expected_array_got_string[0]));
var_dump(isset($expected_array_got_string['0']));
var_dump(isset($expected_array_got_string[0.5]));
var_dump(isset($expected_array_got_string['0.5']));
var_dump(isset($expected_array_got_string['0 Mostel']));
?>
```

The above example will output:

```
bool(false)
bool(true)
bool(true)
bool(true)
bool(false)
bool(false)
```

`isset()` only works with *variables* as passing anything else will result in a parse error. For checking if *constants* are set use the `defined()` function.

Because `this` is a language construct and not a function, it cannot be called using variable functions, or named arguments.

When using `isset()` on inaccessible object properties, the `__isset()` overloading method will be called, if declared.

-- [PHP Reference](https://www.php.net/manual/en/function.isset.php)

### [`unset`](https://www.php.net/manual/en/function.unset.php)

#### Availability

PHP 4, PHP 5, PHP 7, PHP 8

#### Syntax

```
unset(mixed $var, mixed ...$vars): void
```

#### Description

`unset()` destroys the specified variables.

The behavior of `unset()` inside of a function can vary depending on what type of variable you are attempting to destroy.

If a *globalized variable* is `unset()` inside of a function, only the *local variable* is destroyed. The variable in the calling environment will retain the same value as before `unset()` was called.

-- [PHP Reference](www.php.net/manual/en/function.unset.php)

#### Arguments

This function has no arguments.

#### Return values

This function does not return anything.

#### Examples

*Example: Basic usage*

```php
<?php
// PHP Reference: https://www.php.net/manual/en/function.unset.php

$number = 15;
$text = "Hello, there!";

print("Is number defined: "
    . (isset($number) ? 'yes' : 'no')
    . "\nIs text defined: "
    . (isset($text) ? 'yes' : 'no')
    . "\n\n");

unset($text);

print("Is number defined: "
    . (isset($number) ? 'yes' : 'no')
    . "\nIs text defined: "
    . (isset($text) ? 'yes' : 'no')
    . "\n\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/functions/function_unset.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Is number defined: yes
Is text defined: yes

Is number defined: yes
Is text defined: no

```

*Example: Using unset()*

```php
<?php
function destroy_foo()
{
    global $foo;
    unset($foo);
}

$foo = 'bar';
destroy_foo();
echo $foo;
?>
```

To `unset()` a global variable inside of a function, then use the `$GLOBALS` array to do so:

*Example: `unset()` a Global Variable*

```php
<?php
function foo()
{
    unset($GLOBALS['bar']);
}

$bar = "something";
foo();
?>
```

If a variable that is PASSED BY REFERENCE is `unset()` inside of a function, only the local variable is destroyed. The variable in the calling environment will retain the same value as before `unset()` was called.

*Example: unset() with Reference*

```php
<?php
function foo(&$bar)
{
    unset($bar);
    $bar = "blah";
}

$bar = 'something';
echo "$bar\n";

foo($bar);
echo "$bar\n";
?>
```

If a static variable is `unset()` inside of a function, `unset()` destroys the variable only in the context of the rest of a function. Following calls will restore the previous value of a variable.

*Example: `unset()` with Static Variable*

```php
<?php
function foo()
{
    static $bar;
    $bar++;
    echo "Before unset: $bar, ";
    unset($bar);
    $bar = 23;
    echo "after unset: $bar\n";
}

foo();
foo();
foo();
?>
```

-- [PHP Reference](www.php.net/manual/en/function.unset.php)

### [`get_defined_vars`](https://www.php.net/manual/en/function.get-defined-vars.php) function

#### Availability

PHP 4 >= 4.0.4, PHP 5, PHP 7, PHP 8

#### Syntax

```
get_defined_vars(): array
```

#### Description

This function returns a multidimensional array containing a list of all defined variables, be them environment, server or user-defined variables, within the scope that `get_defined_vars()` is called.

#### Arguments

This function has no arguments.

#### Return values

A multidimensional array with all the variables.

-- [PHP Reference](https://www.php.net/manual/en/function.get-defined-vars.php)

#### Examples

*Example: Basic usage*

```php
<?php
// PHP Reference: https://www.php.net/manual/en/function.get-defined-vars.php

$number = 15;
$text = "Hello, there!";

print("Number: " . (get_defined_vars())['number'] . "\nText: " . (get_defined_vars())['text'] . "\n");

```

**View**:
[Example](../../../example/code/literals_constants_variables/variables/functions/function_get_defined_vars.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Number: 15
Text: Hello, there!
```

*Example: `get_defined_vars()` Example*

```php
<?php
$b = array(1, 1, 2, 3, 5, 8);

$arr = get_defined_vars();

// print $b
print_r($arr["b"]);

/* print path to the PHP interpreter (if used as a CGI)
 * e.g. /usr/local/bin/php */
echo $arr["_"];

// print the command-line parameters if any
print_r($arr["argv"]);

// print all the server vars
print_r($arr["_SERVER"]);

// print all the available keys for the arrays of variables
print_r(array_keys(get_defined_vars()));
?>
```

-- [PHP Reference](https://www.php.net/manual/en/function.get-defined-vars.php)

[▵ Up](#variables)
[⌂ Home](../../../README.md)
[▲ Previous: Constants](./constants.md)
