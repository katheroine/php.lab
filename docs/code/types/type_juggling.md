[⌂ Home](../../../README.md)
[▲ Previous: Type declarations](./type_declarations.md)
[▼ Next: Expressions](../expressions/expressions.md)

# Type juggling

## Definition

> In computer science, **type conversion**, **type casting**, **type coercion**, and **type juggling** are different ways of changing an expression from one data type to another. An example would be the conversion of an *integer* value into a *floating point* value or its textual representation as a *string*, and vice versa. Type conversions can take advantage of certain features of type hierarchies or data representations. Two important aspects of a type conversion are whether it happens implicitly (automatically) or explicitly, and whether the underlying data representation is converted from one representation into another, or a given representation is merely reinterpreted as the representation of another data type. In general, both *primitive* and *compound data types* can be converted.

Each programming language has its own rules on how types can be converted. Languages with *strong typing* typically do little implicit conversion and discourage the reinterpretation of representations, while languages with *weak typing* perform many implicit conversions between data types. *Weak typing* language often allow forcing the compiler to arbitrarily interpret a data item as having different representations - this can be a non-obvious programming error, or a technical method to directly deal with underlying hardware.

> In most languages, the word *coercion* is used to denote an *implicit conversion*, either during compilation or during run time. For example, in an expression mixing integer and floating point numbers (like 5 + 0.1), the compiler will automatically convert *integer* representation into *floating point* representation so fractions are not lost. Explicit type conversions are either indicated by writing additional code (e.g. adding type identifiers or calling built-in routines) or by coding conversion routines for the compiler to use when it otherwise would halt with a type mismatch.

In most ALGOL-like languages, such as Pascal, Modula-2, Ada and Delphi, *conversion* and *casting* are distinctly different concepts. In these languages, *conversion* refers to either implicitly or explicitly changing a value from one data type storage format to another, e.g. a 16-bit integer to a 32-bit integer. The storage needs may change as a result of the *conversion*, including a possible loss of precision or truncation. The word cast, on the other hand, refers to explicitly changing the interpretation of the bit pattern representing a value from one type to another. For example, 32 contiguous bits may be treated as an array of 32 Booleans, a 4-byte string, an unsigned 32-bit integer or an IEEE single precision floating point value. Because the stored bits are never changed, the programmer must know low level details such as representation format, byte order, and alignment needs, to meaningfully cast.

In the C family of languages and ALGOL 68, the word *cast* typically refers to an explicit type conversion (as opposed to an implicit *conversion*), causing some ambiguity about whether this is a re-interpretation of a bit-pattern or a real data representation conversion. More important is the multitude of ways and rules that apply to what data type (or class) is located by a pointer and how a pointer may be adjusted by the compiler in cases like object (class) inheritance.

-- [Wikipedia](https://en.wikipedia.org/wiki/Type_conversion)

## Type juggling in PHP

PHP does not require explicit *type definition* in *variable declaration*. In this case, the type of a variable is determined by the value it stores. That is to say, if a `string` is assigned to variable `$var`, then `$var` is of type `string`. If afterwards an `int` value is assigned to `$var`, it will be of type `int`.

PHP may attempt to convert the type of a value to another automatically in certain contexts. The different contexts which exist are:

* Numeric
* String
* Logical
* Integral and string
* Comparative
* Function

Note: When a value needs to be interpreted as a different type, the value itself does not change types.

### Numeric contexts

This is the context when using an *arithmetical operator*.

In this context if either operand is a `float` (or not interpretable as an `int`), both operands are interpreted as `floats`, and the result will be a `float`. Otherwise, the operands will be interpreted as `int`s, and the result will also be an `int`. As of PHP 8.0.0, if one of the operands cannot be interpreted a TypeError is thrown.

### String contexts

This is the context when using `echo`, `print`, `string` *interpolation*, or the `string` *concatenation operator*.

In this context the value will be interpreted as `string`. If the value cannot be interpreted a `TypeError` is thrown. Prior to PHP 7.4.0, an `E_RECOVERABLE_ERROR` was raised.

### Logical contexts

This is the context when using *conditional statements*, the *ternary operator*, or a *logical operator*.

In this context the value will be interpreted as `bool`.

### Integral and string contexts

This is the context when using *bitwise operators*.

In this context if all operands are of type `string` the result will also be a `string`. Otherwise, the operands will be interpreted as `int`s, and the result will also be an `int`. As of PHP 8.0.0, if one of the operands cannot be interpreted a `TypeError` is thrown.

### Comparative contexts

This is the context when using a comparison operator.

The type conversions which occur in this context are explained in the [Comparison with Various Types table](https://www.php.net/manual/en/language.operators.comparison.php#language.operators.comparison.types).

### Function contexts

This is the context when a value is passed to a typed parameter, property, or returned from a function which declares a return type.

In this context the value must be a value of the type. Two exceptions exist, the first one is: if the value is of type `int` and the declared type is `float`, then the *integer* is converted to a *floating point* number. The second one is: if the declared type is a *scalar type*, the value is convertable to a *scalar type*, and the *coercive typing mode* is active (the default), the value may be converted to an accepted scalar value. See below for a description of this behaviour.

Warning

Internal functions automatically coerce `null` to scalar types, this behaviour is DEPRECATED as of PHP 8.1.0.

#### Coercive typing with simple type declarations

* *`bool` type declaration*: value is interpreted as `bool`.
* *`int` type declaration*: value is interpreted as `int` if the conversion is well-defined. For example the `string` is numeric.
* *`float` type declaration*: value is interpreted as `float` if the conversion is well-defined. For example the `string` is numeric.
* *`string` type declaration*: value is interpreted as `string`.

#### Coercive typing with union types

When `strict_types` is not enabled, scalar type declarations are subject to limited implicit type coercions. If the exact type of the value is not part of the union, then the target type is chosen in the following order of preference:

* int
* float
* string
* bool

If the type exists in the union and the value can be coerced to the type under PHP's existing type-checking semantics, then the type is chosen. Otherwise, the next type is tried.

Caution

As an exception, if the value is a `string` and both `int` and `float` are part of the union, the preferred type is determined by the existing numeric `string` semantics. For example, for "42" `int` is chosen, while for "42.0" `float` is chosen.

Note:

Types that are not part of the above preference list are not eligible targets for implicit coercion. In particular no implicit coercions to the `null`, `false`, and `true` types occur.

*Example: Example of types being coerced into a type part of the union*

```php
<?php
// int|string
42    --> 42          // exact type
"42"  --> "42"        // exact type
new ObjectWithToString --> "Result of __toString()"
                      // object never compatible with int, fall back to string
42.0  --> 42          // float compatible with int
42.1  --> 42          // float compatible with int
1e100 --> "1.0E+100"  // float too large for int type, fall back to string
INF   --> "INF"       // float too large for int type, fall back to string
true  --> 1           // bool compatible with int
[]    --> TypeError   // array not compatible with int or string

// int|float|bool
"45"    --> 45        // int numeric string
"45.0"  --> 45.0      // float numeric string

"45X"   --> true      // not numeric string, fall back to bool
""      --> false     // not numeric string, fall back to bool
"X"     --> true      // not numeric string, fall back to bool
[]      --> TypeError // array not compatible with int, float or bool
?>
```

[This example above has no sense as a code because it's semantically incorrect. -- KK]

### Type Casting

Type casting converts the value to a chosen type by writing the type within parentheses before the value to convert.

*Example #2 Type Casting*

```php
<?php
$foo = 10;          // $foo is an integer
$bar = (bool) $foo; // $bar is a boolean

var_dump($bar);
?>
```

The casts allowed are:
* `(int)` - cast to `int`
* `(bool)` - cast to `bool`
* `(float)` - cast to `float`
* `(string)` - cast to `string`
* `(array)` - cast to `array`
* `(object)` - cast to `object`
* `(unset)` - cast to `NULL`

Note:

`(integer)` is an alias of the `(int)` cast. `(boolean)` is an alias of the `(bool)` cast. `(binary)` is an alias of the `(string)` cast. `(double)` and `(real)` are aliases of the `(float)` cast. These casts do not use the canonical type name and are not recommended.

Warning

The `(real)` cast alias has been deprecated as of PHP 7.4.0 and removed as of PHP 8.0.0.

Warning

The `(unset)` cast has been deprecated as of PHP 7.2.0. Note that the `(unset)` cast is the same as assigning the value `NULL` to the variable or call. The `(unset)` cast is removed as of PHP 8.0.0.

Caution

The `(binary)` cast and `b` prefix exists for forward support. Currently `(binary)` and `(string)` are identical, however this may change and should not be relied upon.

Note:

Whitespaces are ignored within the parentheses of a cast. Therefore, the following two casts are equivalent:

```php
<?php
$foo = (int) $bar;
$foo = ( int ) $bar;
?>
```

Casting literal strings and variables to binary strings:

```php
<?php
$binary = (binary) $string;
$binary = b"binary string";
?>
```

Instead of casting a variable to a string, it is also possible to enclose the variable in double quotes.

`Example: Different Casting Mechanisms`

```php
<?php
$foo = 10;            // $foo is an integer
$str = "$foo";        // $str is a string
$fst = (string) $foo; // $fst is also a string

// This prints out that "they are the same"
if ($fst === $str) {
    echo "they are the same", PHP_EOL;
}
?>
```

Note: Because PHP supports indexing into *strings* via offsets using the same syntax as *array* indexing, the following example holds `true` for all PHP versions:

*Example: Using Array Offset with a String*

```php
<?php
$a    = 'car'; // $a is a string
$a[0] = 'b';   // $a is still a string
echo $a;       // bar
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.types.type-juggling.php)

[▵ Up](#type-juggling)
[⌂ Home](../../../README.md)
[▲ Previous: Type declarations](./type_declarations.md)
[▼ Next: Expressions](../expressions/expressions.md)
