[⌂ Home](../../../README.md)
[▲ Previous: Variables](../literals_constants_variables/variables.md)
[▼ Next: Type system](../types/type_system.md)

# Types

## Definition

> In computer science and computer programming, a **data type** (or simply **type**) is a collection or grouping of data values, usually specified by
> * a set of possible values,
> * a set of allowed operations on these values,
> * and/or a representation of these values as machine types.
>
> A data type specification in a program constrains the possible values that an *expression*, such as a *variable* or a *function call*, might take. On literal data, it tells the compiler or interpreter how the programmer intends to use the data.
>
> Most programming languages support basic data types of *integer numbers* (of varying sizes), *floating-point numbers* (which approximate real numbers), *characters* and *booleans*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Data_type)

Parnas, Shore & Weiss (1976) identified five definitions of a *type* that were used-sometimes implicitly-in the literature:

* ***Syntactic***:
A type is a purely syntactic label associated with a variable when it is declared. Although useful for advanced type systems such as substructural type systems, such definitions provide no intuitive meaning of the types.

* ***Representation***:
A type is defined in terms of a composition of more primitive types - often machine types.

* ***Representation and behaviour***:
A type is defined as its representation and a set of operators manipulating these representations.

* ***Value space***:
A type is a set of possible values which a variable can possess. Such definitions make it possible to speak about (disjoint) unions or Cartesian products of types.

* ***Value space and behaviour***:
A type is a set of values which a variable can possess and a set of functions that one can apply to these values.

The definition in terms of a representation was often done in *imperative languages* such as ALGOL and Pascal, while the definition in terms of a value space and behaviour was used in *higher-level languages* such as Simula and CLU. Types including behavior align more closely with *object-oriented models*, whereas a *structured programming model* would tend to not include code, and are called *plain old data structures*.

-- [Wikipedia](https://en.wikipedia.org/wiki/Data_type#Definition)

### Usability

A data type may be specified for many reasons:
* similarity,
* convenience,
* or to focus the attention.

It is frequently a matter of good organization that aids the understanding of complex definitions.

Almost all programming languages explicitly include the notion of data type, though the possible data types are often restricted by considerations of
* simplicity,
* computability,
* or regularity.

An explicit *data type declaration* typically allows the compiler to choose an efficient machine representation, but the conceptual organization offered by data types should not be discounted.

Different languages may use different data types or similar types with different semantics. For example, in the Python programming language, `int` represents an arbitrary-precision integer which has the traditional numeric operations such as addition, subtraction, and multiplication. However, in the Java programming language, the type `int` represents the set of 32-bit integers ranging in value from −2,147,483,648 to 2,147,483,647, with arithmetic operations that wrap on overflow. In Rust this 32-bit integer type is denoted `i32` and panics on overflow in debug mode.

Most programming languages also allow the programmer to define additional data types, usually by combining multiple elements of other types and defining the valid operations of the new data type. For example, a programmer might create a new data type named "complex number" that would include real and imaginary parts, or a color data type represented by three bytes denoting the amounts each of red, green, and blue, and a string representing the color's name.

Data types are used within type systems, which offer various ways of defining, implementing, and using them. In a type system, a data type represents a constraint placed upon the interpretation of data, describing representation, interpretation and structure of values or objects stored in computer memory. The type system uses data type information to check correctness of computer programs that access or manipulate the data. A compiler may use the *static type* of a value to optimize the storage it needs and the choice of algorithms for operations on the value. In many C compilers the float data type, for example, is represented in 32 bits, in accord with the IEEE specification for *single-precision floating point numbers*. They will thus use floating-point-specific microprocessor operations on those values (floating-point addition, multiplication, etc.).

-- [Wikipedia](https://en.wikipedia.org/wiki/Data_type#Concept)

### Classification

Data types may be categorized according to several factors:

* ***Primitive data types*** or ***built-in data types*** are types that are built-in to a language implementation. ***User-defined data types*** are non-primitive types. For example, Java's numeric types are primitive, while classes are user-defined.

* A value of an ***atomic type*** is a single data item that cannot be broken into component parts. A value of a ***composite type*** or ***aggregate type*** is a collection of data items that can be accessed individually. For example, an integer is generally considered atomic, although it consists of a sequence of bits, while an array of integers is certainly composite.

* ***Basic data types*** or ***fundamental data types*** are defined axiomatically from fundamental notions or by enumeration of their elements. ***Generated data types*** or ***derived data types*** are specified, and partly defined, in terms of other data types. All basic types are atomic. For example, integers are a basic type defined in mathematics, while an array of integers is the result of applying an array type generator to the integer type.

The terminology varies - in the literature, primitive, built-in, basic, atomic, and fundamental may be used interchangeably.

-- [Wikipedia](https://en.wikipedia.org/wiki/Data_type#Classification)

## Built-in types in PHP

Every single *expression* in PHP has one of the following *built-in types* depending on its value:

* `null`
* `bool`
* `int`
* `float`
* `string`
* `array`
* `object`
* `callable`
* `resource`

PHP is a *dynamically typed language*, which means that by default there is no need to specify the type of a variable, as this will be determined at runtime. However, it is possible to statically type some aspect of the language via the use of type declarations. Different types that are supported by PHP's type system can be found at the type system page.

-- [PHP Reference](https://www.php.net/manual/en/language.types.intro.php)

The example below uses `gettype` function, which displays the type of its argument.

*Example: Dynmically typed language*

```php
<?php

$n = null;
$b = true;
$i = 5;
$d = 2.4;
$s = "hello";
$a = [3, 5, 7];
$h = [
  2 => "Hello, there!",
  'color' => 'orange',
  3.14 => 'PI',
];
$u = function(int $number) {
  return $number * 3;
};
$o = (object) [
  2 => "Hello, there!",
  'color' => 'orange',
  3.14 => 'PI',
];
$co = new class {
  private int $number;
  public function set_number(int $number): void {
    $this->number = $number;
  }
  public function get_number(): int {
    return $this->number;
  }
};

echo "\$n = null; // null: " . $n . " (" . gettype($n) . ")\n\n";

echo "\$b = true; // boolean: " . $b . " (" . gettype($b) . ")\n\n";

echo "\$i = 5; // integer: " . $i . " (" . gettype($i) . ")\n\n";

echo "\$d = 2.4; // floating point double precision: " . $d . " (" . gettype($d) . ")\n\n";

echo "\$s = \"hello\"; // string: " . $s . " (" . gettype($s) . ")\n\n";

echo "\$a = [3, 5, 7]; // array:\n";
print_r($a);
echo "(" . gettype($a) . ")\n\n";

echo "\$h = [\n  2 => \"Hello, there!\",\n  'color' => 'orange',\n  3.14 => 'PI',\n];\n// hash:\n";
print_r($h);
echo "(" . gettype($h) . ")\n\n";

echo "\$u = function(int \$number) {\n  return number * 3;\n};\n// function:\n";
print_r($u);
echo "(" . gettype($u) . ")\n\n";

echo "\$o = (object) [  2 => \"Hello, there!\",\n  'color' => 'orange',\n  3.14 => 'PI',\n];\n// object (created from hash):\n";
print_r($o);
echo "(" . gettype($o) . ")\n\n";

echo "\$co = new class {\n  private int \$number;
  public function set_number(int \$number): void {\n    \$this->number = \$number;\n  }
  public function get_number(): int {\n    return \$number;\n  }\n};
// object (created from anonymous class):\n";
print_r($co);
echo "(" . gettype($co) . ")\n\n";

```

**View**:
[Example](../../../example/code/types/types.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
$n = null; // null:  (NULL)

$b = true; // boolean: 1 (boolean)

$i = 5; // integer: 5 (integer)

$d = 2.4; // floating point double precision: 2.4 (double)

$s = "hello"; // string: hello (string)

$a = [3, 5, 7]; // array:
Array
(
    [0] => 3
    [1] => 5
    [2] => 7
)
(array)

$h = [
  2 => "Hello, there!",
  'color' => 'orange',
  3.14 => 'PI',
];
// hash:
Array
(
    [2] => Hello, there!
    [color] => orange
    [3] => PI
)
(array)

$u = function(int $number) {
  return number * 3;
};
// function:
Closure Object
(
    [name] => {closure:/media/storage/repository/php/php.lab/example/code/types/types.php:14}
    [file] => /media/storage/repository/php/php.lab/example/code/types/types.php
    [line] => 14
    [parameter] => Array
        (
            [$number] => <required>
        )

)
(object)

$o = (object) [  2 => "Hello, there!",
  'color' => 'orange',
  3.14 => 'PI',
];
// object (created from hash):
stdClass Object
(
    [2] => Hello, there!
    [color] => orange
    [3] => PI
)
(object)

$co = new class {
  private int $number;
  public function set_number(int $number): void {
    $this->number = $number;
  }
  public function get_number(): int {
    return $number;
  }
};
// object (created from anonymous class):
class@anonymous Object
(
)
(object)

```

Types restrict the kind of operations that can be performed on them. However, if an expression/variable is used in an operation which its type does not support, PHP will attempt to ***type juggle*** the value into a type that supports the operation. This process depends on the context in which the value is used.

The *type comparison tables* may also be useful, as various examples of comparison between values of different types are present.

It is possible to force an expression to be *evaluated* to a certain type by using a ***type cast***. A variable can also be *type cast* in-place by using the `settype()` function on it.

To check the value and type of an expression, use the `var_dump()` function. To retrieve the type of an expression, use the `get_debug_type()` function. However, to check if an expression is of a certain type use the *`is_type` functions* instead.

*Example: Different Types*

```php
<?php
$a_bool = true;   // a bool
$a_str  = "foo";  // a string
$a_str2 = 'foo';  // a string
$an_int = 12;     // an int

echo get_debug_type($a_bool), "\n";
echo get_debug_type($a_str), "\n";

// If this is an integer, increment it by four
if (is_int($an_int)) {
    $an_int += 4;
}
var_dump($an_int);

// If $a_bool is a string, print it out
if (is_string($a_bool)) {
    echo "String: $a_bool";
}
?>
```

Output of the above example in PHP 8:

```
bool
string
int(16)
```

Prior to PHP 8.0.0, where the `get_debug_type()` is not available, the `gettype()` function can be used instead. However, it doesn't use the *canonical type names*.

-- [PHP Reference](https://www.php.net/manual/en/language.types.intro.php)

## Functions hangling types

### [`gettype`](https://www.php.net/manual/en/function.gettype.php) function

#### Availability

PHP 4, PHP 5, PHP 7, PHP 8

#### Syntax

```
gettype(mixed $value): string
```

#### Description

Returns the type of the PHP variable value. For type checking, use `is_*` functions.

#### Attributes

* **`value`**

The variable being type checked.

#### Return value

Possible values for the returned string are:

* "boolean"
* "integer"
* "double" (for historical reasons "double" is returned in case of a float, and not simply "float")
* "string"
* "array"
* "object"
* "resource"
* "resource (closed)" as of PHP 7.2.0
* "NULL"
* "unknown type"

-- [PHP Reference](https://www.php.net/manual/en/function.gettype.php)

#### Examples

*Example: Basic usage*

```php
<?php
// PHP Reference: https://www.php.net/manual/en/function.gettype.php

$answer = true;
$number = 15;
$text = "Hello, there!";

print("Answer: " . gettype($answer)
    . "\nNumber: " . gettype($number)
    . "\nText: " . gettype($text) . "\n");

```

**View**:
[Example](../../../example/code/types/functions/function_gettype.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
Answer: boolean
Number: integer
Text: string
```

*Example: `gettype()` example*

```php
<?php

$data = array(1, 1., NULL, new stdClass, 'foo');

foreach ($data as $value) {
    echo gettype($value), "\n";
}

?>
```

The above example will output something similar to:

```
integer
double
NULL
object
string
```

-- [PHP Reference](https://www.php.net/manual/en/function.gettype.php)

[▵ Up](#types)
[▲ Previous: Variables](../literals_constants_variables/variables.md)
[▼ Next: Type system](../types/type_system.md)
