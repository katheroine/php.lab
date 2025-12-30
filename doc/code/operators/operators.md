[⌂ Home](../../../README.md)
[▲ Previous: Expressions](../expressions/expressions.md)
[▼ Next: Arithmetic operators](../operators/arithmetic_operators.md)

# Operators

## Definition

> In computer programming, an **operator** is a programming language construct that provides functionality that may not be possible to define as a user-defined *function* (e.g. `sizeof` in C) or has syntax different than a function (e.g. *infix addition* as in `a+b`). Like other programming language concepts, *operator* has a generally accepted, although debatable meaning among practitioners while at the same time each language gives it specific meaning in that context, and therefore the meaning varies by individual language.

Some operators are represented with symbols – characters typically not allowed for a function identifier – to allow for presentation that is more familiar looking than typical function syntax. For example, a function that tests for greater-than could be named `gt`, but many languages provide an infix symbolic operator so that code looks more familiar. For example, this:

```
if gt(x, y) then return
```

Can be:

```
if x > y then return
```

Some languages allow a language-defined operator to be overridden with user-defined behavior and some allow for user-defined operator symbols.

Operators may also differ semantically from functions. For example, short-circuit boolean operations evaluate later arguments only if earlier ones are not false.

-- [Wikipedia](https://en.wikipedia.org/wiki/Operator_(computer_programming))

## Operators in PHP

An **operator** is something that takes one or more values (or *expressions*, in programming jargon) and yields another value (so that the construction itself becomes an expression).

*Operators* can be grouped according to the number of values they take. ***Unary operators*** take only one value, for example `!` (the *logical not operator*) or `++` (the *increment operator*). ***Binary operators*** take two values, such as the familiar arithmetical operators `+` (plus) and - (minus), and the majority of PHP operators fall into this category. Finally, there is a single ***ternary operator***, `? :`, which takes three values; this is usually referred to simply as "the ternary operator" (although it could perhaps more properly be called the *conditional operator*).

-- [PHP Reference](https://www.php.net/manual/en/language.operators.php)

PHP distinguish the following types of the operators:

- [Arithmetic](./arithmetic_operators.md)
- [Increment and Decrement](./increment_decrement_operators.md)
- [Assignment](./assignment_operators.md)
- [Bitwise](./bitwise_operators.md)
- [Comparison](./comparison_operators.md)
- [Error control](./error_control_operators.md)
- [Execution](./execution_operators.md)
- [Logical](./logical_operators.md)
- [String](./string_operators.md)
- [Array](./array_operators.md)
- [Type](./type_operators.md)

[▵ Up](#operators)
[⌂ Home](../../../README.md)
[▲ Previous: Expressions](../expressions/expressions.md)
[▼ Next: Arithmetic operators](../operators/arithmetic_operators.md)
