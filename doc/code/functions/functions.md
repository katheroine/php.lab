[⌂ Home](../../../README.md)
[▲ Previous: Enumerations](../builtin_types/compound/enumerations/enumerations.md)

# Functions

## Definition

> In computer programming, a **function** (also **procedure**, **method**, **subroutine**, **routine**, or **subprogram**) is a ***callable unit*** of software logic that has a well-formed interface and behavior and can be invoked multiple times.

*Callable units* provide a powerful programming tool. The primary purpose is to allow for the decomposition of a large and/or complicated problem into chunks that have relatively *low cognitive load* and to assign the chunks meaningful names (unless they are *anonymous*). Judicious application can reduce the cost of developing and maintaining software, while increasing its quality and reliability.

*Callable units* are present at multiple levels of abstraction in the programming environment. For example, a programmer may write a *function* in *source code* that is compiled to *machine code* that implements similar semantics. There is a *callable unit* in the *source code* and an associated one in the *machine code*, but they are different kinds of callable units – with different implications and features.

-- [Wikipedia](https://en.wikipedia.org/wiki/Function_(computer_programming))

## User-defined functions

A *function* is defined using the `function` keyword, a *name*, a *list of parameters* (which might be empty) seperated by commas (,) enclosed in parentheses, followed by the *body of the function* enclosed in curly braces, such as the following:

*Example: Declaring a new function named foo*

```php
<?php
function foo($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Example function.\n";
    return $retval;
}
?>
```

[`$retval` is not automatic/magic viariable, it's just undefined and this code will cause an error: `Warning: Undefined variable $retval in /home/user/scripts/code.php on line 5` -- KK]

Note:

As of PHP 8.0.0, the list of parameters may have a trailing comma:

```php
<?php
function foo($arg_1, $arg_2,) { }
?>
```

Any valid PHP code may appear inside the body of a function, even other functions and class definitions.

*Function names* follow the same rules as other *labels* in PHP. A valid function name starts with a letter or underscore, followed by any number of letters, numbers, or underscores. As a regular expression, it would be expressed thus: `^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$`.

Tip

See also the [Userland Naming Guide](https://www.php.net/manual/en/userlandnaming.php).

Functions need not be defined before they are referenced, except when a function is *conditionally defined* as shown in the two examples below.

When a function is defined in a conditional manner such as the two examples shown. Its definition must be processed prior to being called.

*Example: Conditional functions*

```php
<?php

$makefoo = true;

/* We can't call foo() from here
   since it doesn't exist yet,
   but we can call bar() */

bar();

if ($makefoo) {
  function foo()
  {
    echo "I don't exist until program execution reaches me.\n";
  }
}

/* Now we can safely call foo()
   since $makefoo evaluated to true */

if ($makefoo) foo();

function bar()
{
  echo "I exist immediately upon program start.\n";
}

?>
```

*Example: Functions within functions*

```php
<?php
function foo()
{
  function bar()
  {
    echo "I don't exist until foo() is called.\n";
  }
}

/* We can't call bar() yet
   since it doesn't exist. */

foo();

/* Now we can call bar(),
   foo()'s processing has
   made it accessible. */

bar();

?>
```

All functions and classes in PHP have the *global scope* - they can be called outside a function even if they were defined inside and vice versa.

PHP does not support *function overloading*, nor is it possible to *undefine* or *redefine* previously-declared functions.

Note: *Function names are case-insensitive* for the ASCII characters `A` to `Z`, though it is usually good form to call functions as they appear in their declaration.

Both variable number of *arguments* and *default arguments* are supported in functions. See also the function references for `func_num_args()`, `func_get_arg()`, and `func_get_args()` for more information.

It is possible to call *recursive functions* in PHP.

*Example: Recursive functions*

```php
<?php
function recursion($a)
{
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}
?>
```

Note: Recursive function/method calls with over 100-200 recursion levels can smash the stack and cause a termination of the current script. Especially, *infinite recursion* is considered a programming error.

-- [PHP Reference](https://www.php.net/manual/en/functions.user-defined.php)

## Function parameters and arguments

The *function parameters* are declared in the *function signature*. Information may be passed to functions via the *argument list*, which is a comma-delimited list of *expressions*. The *arguments* are *evaluated from left to right* and the result is assigned to the *parameters* of the function, before the function is actually called (*eager evaluation*).

PHP supports *passing arguments by value* (the default), *passing by reference*, and *default argument values*. *Variable-length argument lists* and *named arguments* are also supported.

Note:

As of PHP 7.3.0, it is possible to have a *trailing comma in the argument list* for a *function calls*:

```php
<?php
$v = foo(
    $arg_1,
    $arg_2,
);
?>
```

As of PHP 8.0.0, the *list of function parameters* may include a trailing comma, which will be ignored. That is particularly useful in cases where the list of parameters is long or contains long variable names, making it convenient to list parameters vertically.

*Example: Function parameter list with trailing comma*

```php
<?php
function takes_many_args(
    $first_arg,
    $second_arg,
    $a_very_long_argument_name,
    $arg_with_default = 5,
    $again = 'a default string', // This trailing comma was not permitted before 8.0.0.
)
{
    // ...
}
?>
```

### Passing arguments by reference

By default, *function arguments* are passed by value (so that if the value of the argument within the function is changed, it does not get changed outside of the function). To allow a function to modify its arguments, they must be passed by reference.

To have an argument to a function always passed by reference, prepend an ampersand (&) to the parameter name in the function definition:

*Example: Passing function arguments by reference*

```php
<?php
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;    // outputs 'This is a string, and something extra.'
?>
```

It is an error to pass a *constant expression* as an *argument* to a *parameter* that expects to be passed by *reference*.

### Default parameter values

A function may define *default values* for *parameters* using syntax similar to *assigning a variable*. The *default* is used only when the *parameter's argument* is not passed. Note that passing null does not assign the default value.

*Example: Use of default parameters in functions*

```php
<?php
function makecoffee($type = "cappuccino")
{
    return "Making a cup of $type.\n";
}
echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso");
?>
```

The above example will output:

```
Making a cup of cappuccino.
Making a cup of .
Making a cup of espresso.
```

*Default parameter* values may be *scalar values*, *arrays*, the *special type null*, and as of PHP 8.1.0, *objects* using the `new ClassName()` syntax.

*Example: Using non-scalar types as default values*

```php
<?php
function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}
echo makecoffee();
echo makecoffee(array("cappuccino", "lavazza"), "teapot");?>
```

The above example will output:

```
Making a cup of cappuccino with hands.
Making a cup of cappuccino, lavazza with teapot.
```

*Example: Using objects as default values (as of PHP 8.1.0)*

```php
<?php
class DefaultCoffeeMaker {
    public function brew() {
        return "Making coffee.\n";
    }
}
class FancyCoffeeMaker {
    public function brew() {
        return "Crafting a beautiful coffee just for you.\n";
    }
}
function makecoffee($coffeeMaker = new DefaultCoffeeMaker)
{
    return $coffeeMaker->brew();
}
echo makecoffee();
echo makecoffee(new FancyCoffeeMaker);
?>
```

The above example will output:

```
Making coffee.
Crafting a beautiful coffee just for you.
```

The *default value* must be a *constant expression*, not (for example) a *variable*, a *class member* or a *function call*.

Note that any *optional parameters* should be specified after any *required parameters*, otherwise they cannot be omitted from calls. Consider the following example:

*Example: Incorrect usage of default function parameters*

```php
<?php
function makeyogurt($container = "bowl", $flavour)
{
    return "Making a $container of $flavour yogurt.\n";
}

echo makeyogurt("raspberry"); // "raspberry" is $container, not $flavour
?>
```

The above example will output:

```
Fatal error: Uncaught ArgumentCountError: Too few arguments
 to function makeyogurt(), 1 passed in example.php on line 42
```

Now, compare the above with this:

*Example: Correct usage of default function parameters*

```php
<?php
function makeyogurt($flavour, $container = "bowl")
{
    return "Making a $container of $flavour yogurt.\n";
}

echo makeyogurt("raspberry"); // "raspberry" is $flavour
?>
```

The above example will output:

```
Making a bowl of raspberry yogurt.
```

As of PHP 8.0.0, *named arguments* can be used to skip over multiple optional parameters.

*Example: Correct usage of default function parameters*

```php
<?php
function makeyogurt($container = "bowl", $flavour = "raspberry", $style = "Greek")
{
    return "Making a $container of $flavour $style yogurt.\n";
}

echo makeyogurt(style: "natural");
?>
```

The above example will output:

```
Making a bowl of raspberry natural yogurt.
```

As of PHP 8.0.0, declaring *mandatory parameters* after *optional parameters* is deprecated. This can generally be resolved by dropping the default value, since it will never be used. One exception to this rule are parameters of the form `Type $param = null`, where the `null` default makes the *type* implicitly *nullable*. This usage is deprecated as of PHP 8.4.0, and an explicit nullable type should be used instead.

*Example: Declaring optional parameters after mandatory parameters*

```php
<?php

function foo($a = [], $b) {}     // Default not used; deprecated as of PHP 8.0.0
function foo($a, $b) {}          // Functionally equivalent, no deprecation notice

function bar(A $a = null, $b) {} // As of PHP 8.1.0, $a is implicitly required
                                 // (because it comes before the required one),
                                 // but implicitly nullable (deprecated as of PHP 8.4.0),
                                 // because the default parameter value is null
function bar(?A $a, $b) {}       // Recommended

?>
```

Note: As of PHP 7.1.0, *omitting a parameter* which does not specify a *default* throws an `ArgumentCountError`; in previous versions it raised a `Warning`.

Note: Parameters that expect the argument by reference may have a default value.

### Variable-length argument lists

PHP has support for *variable-length argument lists* in user-defined functions by using the *`...` token*.

Parameter lists may include the `...` token to denote that the function accepts a *variable number of arguments*. The arguments will be passed into the given variable as an *array*:

*Example: Using `...` to access variable arguments*

```php
<?php
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);
?>
```

The above example will output:

```
10
```

`...` can also be used when calling functions to *unpack* an *array* or `Traversable` *variable* or *literal* into the argument list:

*Example: Using `...` to provide arguments*

```php
<?php
function add($a, $b) {
    return $a + $b;
}

echo add(...[1, 2])."\n";

$a = [1, 2];
echo add(...$a);
?>
```

The above example will output:

```
3
3
```

You may specify *normal positional parameters* before the `...` token. In this case, only the *trailing arguments* that don't match a *positional argument* will be added to the *array* generated by `...`.

It is also possible to add a *type declaration* before the `...` token. If this is present, then all *arguments* captured by `...` must match that *parameter type*.

*Example: Type declared variable arguments*

```php
<?php
function total_intervals($unit, DateInterval ...$intervals) {
    $time = 0;
    foreach ($intervals as $interval) {
        $time += $interval->$unit;
    }
    return $time;
}

$a = new DateInterval('P1D');
$b = new DateInterval('P2D');
echo total_intervals('d', $a, $b).' days';

// This will fail, since null isn't a DateInterval object.
echo total_intervals('d', null);
?>
```

The above example will output:

```
3 days
Catchable fatal error: Argument 2 passed to total_intervals() must be an instance of DateInterval, null given, called in - on line 14 and defined in - on line 2
```

Finally, *variable arguments* can also be passed by *reference* by prefixing the `...` with an ampersand (`&`).

### Named arguments

PHP 8.0.0 introduced ***named arguments*** as an extension of the existing *positional parameters*. *Named arguments* allow *passing arguments* to a function based on the *parameter name*, rather than the *parameter position*. This makes the meaning of the argument *self-documenting*, makes the arguments *order-independent* and allows skipping default values arbitrarily.

*Named arguments* are passed by prefixing the value with the *parameter name* followed by a colon. Using reserved keywords as *parameter names* is allowed. The *parameter name* must be an *identifier*, specifying dynamically is not allowed.

*Example: Named argument syntax*

```php
<?php
myFunction(paramName: $value);
array_foobar(array: $value);

// NOT supported.
function_name($variableStoringParamName: $value);
?>
```

*Example: Positional arguments versus named arguments*

```php
<?php
// Using positional arguments:
array_fill(0, 100, 50);

// Using named arguments:
array_fill(start_index: 0, count: 100, value: 50);
?>
```

The order in which the *named arguments* are passed does not matter.

*Example: Same example as above with a different order of parameters*

```php
<?php
array_fill(value: 50, count: 100, start_index: 0);
?>
```

*Named arguments* can be combined with *positional arguments*. In this case, the *named arguments* must come after the *positional arguments*. It is also possible to specify only some of the optional arguments of a function, regardless of their order.

*Example: Combining named arguments with positional arguments*

```php
<?php
htmlspecialchars($string, double_encode: false);
// Same as
htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8', false);
?>
```

Passing an *argument* to the same *named parameter* multiple times results in an `Error` exception.

*Example: Error thrown when passing an argument to the same named parameter multiple times*

```php
<?php

function foo($param) { ... }

foo(param: 1, param: 2);
// Error: Named parameter $param overwrites previous argument

foo(1, param: 2);
// Error: Named parameter $param overwrites previous argument

?>
```

As of PHP 8.1.0, it is possible to use *named arguments* after *unpacking the arguments*. A *named argument* must not override an already *unpacked argument*.

*Example: Use named arguments after unpacking*

```php
<?php
function foo($a, $b, $c = 3, $d = 4) {
  return $a + $b + $c + $d;
}

var_dump(foo(...[1, 2], d: 40)); // 46
var_dump(foo(...['b' => 2, 'a' => 1], d: 40)); // 46

var_dump(foo(...[1, 2], b: 20)); // Fatal error. Named parameter $b overwrites previous argument
?>
```

-- [PHP Reference](https://www.php.net/manual/en/functions.arguments.php)

## Returning values

Values are ***returned*** by using the optional `return` statement. Any *type* may be *returned*, including *arrays* and *objects*. This causes the function to end its execution immediately and pass control back to the line from which it was called.

Note:

If the *return* is omitted the value null will be returned.

### Use of return

*Example: Use of return*

```php
<?php
function square($num)
{
    return $num * $num;
}
echo square(4);   // outputs '16'.
?>
```

A *function* can not *return* multiple values, but similar results can be obtained by returning an *array*.

*Example: Returning an array to get multiple values*

```php
<?php
function small_numbers()
{
    return [0, 1, 2];
}
// Array destructuring will collect each member of the array individually
[$zero, $one, $two] = small_numbers();

// Prior to 7.1.0, the only equivalent alternative is using list() construct
list($zero, $one, $two) = small_numbers();

?>
```

To return a *reference* from a *function*, use the *reference operator `&`* in both the *function declaration* and when assigning the returned value to a *variable*:

*Example: Returning a reference from a function*

```php
<?php
function &returns_reference()
{
    return $someref;
}

$newref =& returns_reference();
?>
```

For more information on references, please check out [References Explained](https://www.php.net/manual/en/language.references.php).

-- [PHP Reference](https://www.php.net/manual/en/functions.returning-values.php)

## Variable functions

PHP supports the concept of ***variable functions***. This means that if a *variable name* has parentheses appended to it, PHP will look for a *function* with the same *name* as whatever the *variable* evaluates to, and will attempt to execute it. Among other things, this can be used to implement *callbacks*, *function tables*, and so forth.

Variable functions won't work with language constructs such as `echo`, `print`, `unset()`, `isset()`, `empty()`, `include`, `require` and the like. Utilize wrapper functions to make use of any of these constructs as *variable functions*.

*Example: Variable function example*

```php
<?php
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '')
{
    echo "In bar(); argument was '$arg'.<br />\n";
}

// This is a wrapper function around echo
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // This calls foo()

$func = 'bar';
$func('test');  // This calls bar()

$func = 'echoit';
$func('test');  // This calls echoit()
?>
```

*Object methods* can also be called with the variable functions syntax.

*Example: Variable method example*

```php
<?php
class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this->$name(); // This calls the Bar() method
    }

    function Bar()
    {
        echo "This is Bar";
    }
}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname();  // This calls $foo->Variable()

?>
```

When calling *static methods*, the *function call* is stronger than the *static property operator*:

*Example: Variable method example with static properties*

```php
<?php
class Foo
{
    static $variable = 'static property';
    static function Variable()
    {
        echo 'Method Variable called';
    }
}

echo Foo::$variable; // This prints 'static property'. It does need a $variable in this scope.
$variable = "Variable";
Foo::$variable();  // This calls $foo->Variable() reading $variable in this scope.

?>
```

*Example: Complex callables*

```php
<?php
class Foo
{
    static function bar()
    {
        echo "bar\n";
    }
    function baz()
    {
        echo "baz\n";
    }
}

$func = array("Foo", "bar");
$func(); // prints "bar"
$func = array(new Foo, "baz");
$func(); // prints "baz"
$func = "Foo::bar";
$func(); // prints "bar"
?>
```

-- [PHP Reference](https://www.php.net/manual/en/functions.variable-functions.php)

## Internal (built-in) functions

PHP comes standard with many functions and constructs. There are also functions that require specific *PHP extensions* compiled in, otherwise fatal *undefined function* errors will appear. For example, to use image functions such as `imagecreatetruecolor()`, PHP must be compiled with *GD* support. Or, to use `mysqli_connect()`, PHP must be compiled with *MySQLi* support. There are many core functions that are included in every version of PHP, such as the *string* and *variable* functions. A call to `phpinfo()` or `get_loaded_extensions()` will show which *extensions* are loaded into PHP. Also note that many *extensions* are enabled by default and that the PHP manual is split up by extension. See the configuration, installation, and individual extension chapters, for information on how to set up PHP.

Reading and understanding a *function's prototype* is explained within the manual section titled [how to read a function definition](https://www.php.net/manual/en/about.prototypes.php). It's important to realize what a function returns or if a function works directly on a passed in value. For example, `str_replace()` will return the modified string while `usort()` works on the actual passed in variable itself. Each manual page also has specific information for each function like information on function parameters, behavior changes, return values for both success and failure, and availability information. Knowing these important (yet often subtle) differences is crucial for writing correct PHP code.

Note: If the parameters given to a function are not what it expects, such as passing an array where a string is expected, the return value of the function is *undefined*. In this case it will likely return `null` but this is just a convention, and cannot be relied upon. As of PHP 8.0.0, a `TypeError` exception is supposed to be thrown in this case.

Note:

*Scalar types* for built-in functions are *nullable* by default in *coercive mode*. As of PHP 8.1.0, passing null to an internal function parameter that is not declared nullable is discouraged and emits a deprecation notice in coercive mode to align with the behavior of user-defined functions, where *scalar types* need to be marked as *nullable* explicitly.

For example, `strlen()` function expects the parameter `$string` to be a *non-nullable string*. For historical reasons, PHP allows passing `null` for this parameter in *coercive mode*, and the parameter is implicitly cast to string, resulting in a `""` value. In contrast, a `TypeError` is emitted in *strict mode*.

```php
<?php
var_dump(strlen(null));
// "Deprecated: Passing null to parameter #1 ($string) of type string is deprecated" as of PHP 8.1.0
// int(0)

var_dump(str_contains("foobar", null));
// "Deprecated: Passing null to parameter #2 ($needle) of type string is deprecated" as of PHP 8.1.0
// bool(true)
?>
```

-- [PHP Reference](www.php.net/manual/en/functions.internal.php)

## Examples

```php
<?php

function simpleFunction(): void
{
    print("Simple function.\n");
}

simpleFunction();

print(PHP_EOL);

function functionWithLocalVariable(): void
{
    $i = 4;
    print("A function with a local variable: $i\n");
}

functionWithLocalVariable();

print(PHP_EOL);

function functionWithStaticLocalVariable(): void
{
    static $i = 1;
    print("A function with a static local variable: $i\n");

    $i++;
}

functionWithStaticLocalVariable();
functionWithStaticLocalVariable();
functionWithStaticLocalVariable();

print(PHP_EOL);

function functionReturningValue(): int
{
    print("A function returning value.\n");
    return 9;
}

$i = functionReturningValue();
print("Returned value: $i\n");

print(PHP_EOL);

function functionWithArguments(int $number, string $text): void
{
    print("A function with some arguments:\nnumber: $number\ntext: $text\n");
}

functionWithArguments(6, "orange");

print(PHP_EOL);

function functionWithDefaultArguments(int $number = 10, string $text = "moon"): void
{
    print("A function with some arguments:\nnumber: $number\ntext: $text\n");
}

functionWithDefaultArguments();
functionWithDefaultArguments(5);
functionWithDefaultArguments(7, "pencil");

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

A function with a static local variable: 1
A function with a static local variable: 2
A function with a static local variable: 3

A function returning value.
Returned value: 9

A function with some arguments:
number: 6
text: orange

A function with some arguments:
number: 10
text: moon
A function with some arguments:
number: 5
text: moon
A function with some arguments:
number: 7
text: pencil

```

*Example: Functions formatting*

```php
<?php

function explicit_function(int $number, string $text): int
{
  print("An explicit function with some arguments:\nnumber: $number\ntext: $text\n");
  return 2 * $number;
}

$result_1 = explicit_function(1, "apple");
print("returned value: $result_1\n\n");

$anonymous_function = function(int $number, string $text): int
{
  print("A function with some arguments:\nnumber: $number\ntext: $text\n");
  return 3 * $number;
};

$result_2 = $anonymous_function(2, "pear");
print("returned value: $result_2\n\n");

```

**View**:
[Example](../../../example/code/functions/functions_formatting.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
An explicit function with some arguments:
number: 1
text: apple
returned value: 2

A function with some arguments:
number: 2
text: pear
returned value: 6

```

*Example: Passing arguments*

```php
<?php

$value = 5;
$array = [2, 3, 6];
$object = (object)[ "value" => 7 ];

function functionReceivingValueByValue($argument)
{
    print("Function receiving value by value\n"
    . "-- begin:\n"
    . "before: \$argument = {$argument}\n"
    . "\$argument = \$argument * 2\n");

    $argument *= 2;

    print("after: \$argument = {$argument}\n"
    . "-- end.\n");
}

print("BEFORE: \$value = {$value}\n");
functionReceivingValueByValue($value);
print("AFTER: \$value = {$value}\n\n");

function functionReceivingValueByReference(&$argument)
{
  print("Function receiving value by reference\n"
    . "-- begin:\n"
    . "before: \$argument = {$argument}\n"
    . "\$argument = \$argument * 2\n");

  $argument *= 2;

  print("after: \$argument = {$argument}\n"
    . "-- end.\n");
}

print("BEFORE: \$value = {$value}\n");
functionReceivingValueByReference($value);
print("AFTER: \$value = {$value}\n\n");

function functionReceivingArrayByValue($argument)
{
  print("Function receiving array by value\n"
    . "-- begin:\n"
    . "before: \$argument[0] = {$argument[0]}\n"
    . "\$argument[0] *= 2\n");

  $argument[0] *= 2;

  print("after: \$argument[0] = {$argument[0]}\n"
    . "-- end.\n");
}

print("BEFORE: \$array[0] = {$array[0]}\n");
functionReceivingArrayByValue($array);
print("AFTER: \$array[0] = {$array[0]}\n\n");

function functionReceivingArrayByReference(&$argument)
{
  print("Function receiving array by reference\n"
    . "-- begin:\n"
    . "before: \$argument[0] = {$argument[0]}\n"
    . "\$argument[0] *= 2\n");

  $argument[0] *= 2;

  print("after: \$argument[0] = {$argument[0]}\n"
    . "-- end.\n");
}

print("BEFORE: \$array[0] = {$array[0]}\n");
functionReceivingArrayByReference($array);
print("AFTER: \$array[0] = {$array[0]}\n\n");

function functionReceivingObject($argument)
{
  print("Function receiving object\n"
    . "-- begin:\n"
    . "before: \$argument->value = {$argument->value}\n"
    . "\$argument = \$argument * 2\n");

  $argument->value *= 2;

  print("after: \$argument->value = {$argument->value}\n"
    . "-- end.\n");
}

print("BEFORE: object->value = {$object->value}\n");
functionReceivingObject($object);
print("AFTER: object->value = {$object->value}\n\n");

```

**View**:
[Example](../../../example/code/functions/passing_arguments.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
BEFORE: $value = 5
Function receiving value by value
-- begin:
before: $argument = 5
$argument = $argument * 2
after: $argument = 10
-- end.
AFTER: $value = 5

BEFORE: $value = 5
Function receiving value by reference
-- begin:
before: $argument = 5
$argument = $argument * 2
after: $argument = 10
-- end.
AFTER: $value = 10

BEFORE: $array[0] = 2
Function receiving array by value
-- begin:
before: $argument[0] = 2
$argument[0] *= 2
after: $argument[0] = 4
-- end.
AFTER: $array[0] = 2

BEFORE: $array[0] = 2
Function receiving array by reference
-- begin:
before: $argument[0] = 2
$argument[0] *= 2
after: $argument[0] = 4
-- end.
AFTER: $array[0] = 4

BEFORE: object->value = 7
Function receiving object
-- begin:
before: $argument->value = 7
$argument = $argument * 2
after: $argument->value = 14
-- end.
AFTER: object->value = 14

```

*Example: Returning value*

```php
<?php

function returning_boolean(): bool
{
  return true;
}

function returning_integer(): int
{
  return 7;
}

function returning_string(): string
{
  return "hello";
}

$b = returning_boolean();
print("boolean:\n"
  . "b = {$b}\n\n");

$i = returning_integer();
print("integer:\n"
  . "i = {$i}\n\n");

$s = returning_string();
print("string:\n"
  . "s = {$s}\n\n");

```

**View**:
[Example](../../../example/code/functions/returning_value.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
boolean:
b = 1

integer:
i = 7

string:
s = hello

```

*Example: Default arguments*

```php
<?php

function function_with_default_argument(int $argument = 3): int
{
  return $argument * 2;
}

$result = function_with_default_argument();
print("Result of calling function with default argument: {$result}\n");

$result = function_with_default_argument(4);
print("Result of calling function with provided argument: {$result}\n");

```

**View**:
[Example](../../../example/code/functions/default_arguments.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Result of calling function with default argument: 6
Result of calling function with provided argument: 8
```

*Example: Function with static variable*

```php
<?php

function function_with_static_variable(): void
{
  $i = 0;
  static $n = 0;

  print("A regular local variable: {$i}\n"
    . "A static local variable: {$n}\n");

  $i++;
  $n++;
}

print("Function first call:\n");
function_with_static_variable();
print("\n");

print("Function second call:\n");
function_with_static_variable();
print("\n");

print("Function third call:\n");
function_with_static_variable();
print("\n");

```

**View**:
[Example](../../../example/code/functions/function_with_static_variable.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Function first call:
A regular local variable: 0
A static local variable: 0

Function second call:
A regular local variable: 0
A static local variable: 1

Function third call:
A regular local variable: 0
A static local variable: 2

```

*Example: Function calling function*

```php
<?php

function inside(): string
{
  print("* Inside.\n");
  return "IN";
}

function outside(): string
{
  print("# Outside:\n"
    . "# Calling function from function...\n");
  $result = inside();
  print("# result: {$result}\n");
  return "OUT";
}

print("Calling function...\n");
$result = outside();
print("result: {$result}\n");

```

**View**:
[Example](../../../example/code/functions/function_calling_function.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Calling function...
# Outside:
# Calling function from function...
* Inside.
# result: IN
result: OUT

```

[▵ Up](#functions)
[⌂ Home](../../../README.md)
[▲ Previous: Enumerations](../builtin_types/compound/enumerations/enumerations.md)
