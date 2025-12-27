[⌂ Home](../../../README.md)
[▲ Previous: Types](./types.md)
[▼ Next: Type declarations](./type_declarations.md)

# Type system

## Definition

A programming language consists of a system of *allowed sequences of symbols (constructs)* together with *rules that define how each construct is interpreted*. For example, a language might allow expressions representing various *types* of data, *expressions* that provide structuring rules for data, expressions representing various *operations* on data, and constructs that provide sequencing rules for the order in which to perform operations.

> A simple **type system** for a programming language is a set of rules that associates a data type (for example, integer, floating point, string) with each term (data-valued expression) in a computer program. In more ambitious type systems, a variety of constructs, such as variables, expressions, functions, and modules, may be assigned types.
>
> Type systems formalize and enforce the otherwise implicit categories the programmer uses for algebraic data types, data structures, or other data types, such as "string", "array of float", "function returning boolean".

The main purpose of a type system in a programming language is to *reduce possibilities for bugs* in computer programs due to mismatches in how values are interpreted in different parts of a program. The aim is to prevent operations expecting a certain kind of value from being applied to values for which that operation does not make sense (validity errors). A type system can detect and prevent some of these mismatches. When a type mismatch is detected, it is called a type error.

The type of a term constrains the contexts in which it may be used. For a variable, the type system determines the allowed values of that variable. For that variable to be presented as a parameter to an operation, the operation must be able to accept in that parameter any value that the type of the variable allows.

Type systems are typically specified as part of programming language design. They are built into interpreters and compilers for the language. In some languages, the type system can be extended by optional tools that perform added checks using the language's original type syntax and grammar.

Type systems allow defining interfaces between different parts of a computer program, and then checking that the parts have been connected in a consistent way. This checking can happen statically (at compile time), dynamically (at run time), or as a combination of both.

Type systems have other purposes as well, such as expressing business rules, enabling certain compiler optimizations, allowing for multiple dispatch, and providing a form of documentation.

-- [Wikipedia](https://en.wikipedia.org/wiki/Type_system)

## Type system in PHP

PHP uses a *nominal type system* with a strong *behavioral subtyping* relation. The *subtyping relation* is checked at compile time whereas the verification of types is dynamically checked at run time.

PHP's type system supports various *atomic types* that can be composed together to create more *complex types*. Some of these types can be written as *type declarations*.

### Atomic types

Some *atomic types* are *built-in types* which are tightly integrated with the language and cannot be reproduced with *user defined types*.

The list of *base types* is:

- Built-in types
    - Scalar types
        - bool
        - int
        - float
        - string
    - Compound types
        - array
        - object
    - Special types
        - resource
        - never
        - void
    - Relative class types
        - self
        - parent
        - static
    - Singleton types
        - false
        - true
    - Unit types
        - null
- User-defined types (class-types)
    - Interfaces
    - Classes
    - Enumerations
- callable

#### Scalar types

A value is considered scalar if it is of type `int`, `float`, `string` or `bool`.

#### User-defined types

It is possible to define custom types with `interfaces`, `classes` and `enumerations`. These are considered as user-defined types, or class-types. For example, a class called `Elephant` can be defined, then objects of type `Elephant` can be instantiated, and a function can request a parameter of type `Elephant`.

### Composite types

It is possible to combine multiple *atomic types* into *composite types*. PHP allows types to be combined in the following ways:

* Intersection of class-types (interfaces and class names).
* Union of types.

#### Intersection types

An *intersection type* accepts values which satisfies multiple class-type declarations, rather than a single one. Individual types which form the *intersection type* are joined by the `&` symbol. Therefore, an `intersection type` comprised of the types `T`, `U`, and `V` will be written as `T&U&V`.

#### Union types

A *union type* accepts values of multiple different types, rather than a single one. Individual types which form the *union type* are joined by the `|` symbol. Therefore, a `union type` comprised of the types `T`, `U`, and `V` will be written as `T|U|V`. If one of the types is an `intersection type`, it needs to be bracketed with parenthesis for it to written in *DNF*: `T|(X&Y)`.

### Type aliases

PHP supports two *type aliases*: `mixed` and `iterable` which corresponds to the *union type* of `object|resource|array|string|float|int|bool|null` and `Traversable|array` respectively.

Note: PHP does not support user-defined type aliases.

-- [PHP Reference](https://www.php.net/manual/en/language.types.type-system.php)

[▵ Up](#type-system)
[⌂ Home](../../../README.md)
[▲ Previous: Types](./types.md)
[▼ Next: Type declarations](./type_declarations.md)
