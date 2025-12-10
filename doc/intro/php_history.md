[⌂ Home](../../README.md)
[▲ Previous: What is PHP?](what_is_php.md)
[▼ Next: PHP features](php_features.md)

# PHP history

## PHP 1

PHP development began in **1993** when **Rasmus Lerdorf** wrote several *Common Gateway Interface (CGI)* programs in C, which he used to maintain his personal homepage. He extended them to work with web forms and to communicate with databases, and called this implementation ***Personal Home Page/Forms Interpreter*** or ***PHP/FI***.
An example of the early PHP syntax:

```html
<!--include /text/header.html-->

<!--getenv HTTP_USER_AGENT-->
<!--if substr $exec_result Mozilla-->
  Hey, you are using Netscape!<p>
<!--endif-->

<!--sql database select * from table where user='$username'-->
<!--ifless $numentries 1-->
  Sorry, that record does not exist<p>
<!--endif exit-->
  Welcome <!--$user-->!<p>
  You have <!--$index:0--> credits left in your account.<p>

<!--include /text/footer.html-->
```

PHP/FI could be used to build simple, dynamic web applications. To accelerate bug reporting and improve the code, Lerdorf initially announced the release of PHP/FI as "Personal Home Page Tools (PHP Tools) version 1.0" on the Usenet discussion group comp.infosystems.www.authoring.cgi on 8 June **1995**.

This release included basic functionality such as
* Perl-like variables,
* form handling,
* the ability to embed HTML.

By this point, the syntax had changed to resemble that of Perl, but was simpler, more limited, and less consistent.

## PHP 2

Early PHP was never intended to be a new programming language; rather, it grew organically, with Lerdorf noting in retrospect: *I don't know how to stop it [...] there was never any intent to write a programming language [...] I have absolutely no idea how to write a programming language [...] I just kept adding the next logical step on the way.* A development team began to form and, after months of work and beta testing, officially released ***PHP/FI 2*** in November **1997**.

The fact that PHP was not originally designed, but instead was developed organically has led to inconsistent naming of functions and inconsistent ordering of their parameters. In some cases, the function names were chosen to match the lower-level libraries which PHP was "wrapping", while in some very early versions of PHP the length of the function names was used internally as a hash function, so names were chosen to improve the distribution of *hash values*.

## PHP 3

**Zeev Suraski** and **Andi Gutmans** rewrote the parser in **1997** and formed the base of ***PHP 3***, changing the language's name to the recursive acronym ***PHP: Hypertext Preprocessor***. Afterwards, public testing of PHP 3 began, and the official launch came in June **1998**. Suraski and Gutmans then started a new rewrite of PHP's core, producing the ***Zend Engine*** in **1999**. They also founded *Zend Technologies* in Ramat Gan, Israel.

## PHP 4

On 22 May **2000**, ***PHP 4***, powered by the ***Zend Engine 1.0***, was released. By August 2008, this branch had reached version 4.4.9.

PHP 4 is now no longer under development and nor are any security updates planned to be released.

## PHP 5

### Early PHP 5

On 1 July **2004**, ***PHP 5.0*** was released, powered by the new ***Zend Engine 2.0***.

PHP 5.0 included new features such as
* improved support for *object-oriented programming*,
* as well as *iterators*,
* and *exceptions*.

***PHP 5.1*** and ***PHP 5.2*** were released the following years, adding smaller improvements and new features, such as
* the **PHP Data Objects (PDO)** extension (which defines a lightweight and consistent interface for accessing databases),
* numerous performance enhancements.

In 2008, PHP 5 became the only stable version under development.

*Late static binding* had been missing from previous versions of PHP, and was added in version 5.3.

Many high-profile open-source projects ceased to support PHP 4 in new code from February 5, 2008, because of the *GoPHP5* initiative, provided by a consortium of PHP developers promoting the transition from PHP 4 to PHP 5.

Over time, PHP interpreters became available on most existing 32-bit and 64-bit operating systems, either by building them from the PHP source code or by using pre-built binaries. For PHP versions 5.3 and 5.4, the only available Microsoft Windows binary distributions were 32-bit IA-32 builds, requiring Windows 32-bit compatibility mode while using Internet Information Services (IIS) on a 64-bit Windows platform. PHP version 5.5 made the 64-bit x86-64 builds available for Microsoft Windows.

Official security support for PHP 5.6 ended on 31 December 2018.

### Late PHP 5

Because it contained features originally intended to be part of 6.0, ***PHP 5.3*** was a significant release, adding
* support for *namespaces*,
* *closures*,
* *late static binding*,
* and many fixes and improvements to *standard functions*.

With the Unicode branch officially abandoned, a new release process was adopted in **2011**, planning a yearly release cycle, and a clear distinction between "feature releases" (x.y.z to x.y+1.z) and "major releases" (x.y.z to x+1.0.0). Remaining features which had been planned for the 6.0 release were included in ***PHP 5.4***, released in March **2012**, such as trait support and a new "short array syntax". This was followed by more incremental changes in ***PHP 5.5*** (June **2013**) and ***PHP 5.6*** (August **2014**).

For PHP versions 5.3 and 5.4, the only available Microsoft Windows binary distributions were 32-bit IA-32 builds, requiring Windows 32-bit compatibility mode while using Internet Information Services (IIS) on a 64-bit Windows platform. PHP version 5.5 made the 64-bit x86-64 builds available for Microsoft Windows.

Official security support for PHP 5.6 ended on 31 December 2018.

## PHP 6

PHP's native string functions worked only on raw bytes, making use with multibyte character encodings difficult. In **2005**, a project headed by **Andrei Zmievski** was initiated to bring *native Unicode support* throughout PHP, by embedding the *International Components for Unicode (ICU)* library, and representing text strings as UTF-16 internally. Since this would cause major changes both to the internals of the language and to user code, it was planned to release this as version 6.0 of the language, along with other major features then in development.

However, a shortage of developers who understood the necessary changes, and performance problems arising from conversion to and from UTF-16, which is rarely used in a web context, led to delays in the project. As a result, a ***PHP 5.3*** release was created in **2009**, with many non-Unicode features back-ported from PHP 6, notably *namespaces*. In March **2010**, the project in its current form was officially abandoned, and a ***PHP 5.4*** release was prepared to contain most remaining non-Unicode features from PHP 6, such as *traits* and *closure re-binding*. Initial hopes were that a new plan would be formed for Unicode integration, but by 2014 none had been adopted.

## PHP 7

During 2014 and 2015, a new major PHP version was developed, PHP 7. The numbering of this version involved some debate among internal developers. While the PHP 6 Unicode experiments had never been released, several articles and book titles referenced the PHP 6 names, which might have caused confusion if a new release were to reuse the name. After a vote, the name PHP 7 was chosen.

The foundation of ***PHP 7*** is a PHP branch that was originally dubbed PHP next generation (*phpng*). It was authored by **Dmitry Stogov**, **Xinchen Hui** and **Nikita Popov**, and aimed to optimize PHP performance by refactoring the Zend Engine while retaining near-complete language compatibility. By 14 July 2014, WordPress-based benchmarks, which served as the main benchmark suite for the phpng project, showed an almost 100% increase in performance. Changes from phpng make it easier to improve performance in future versions, as more compact data structures and other changes are seen as better suited for a successful migration to a *just-in-time (JIT) compiler*. Because of the significant changes, the reworked Zend Engine was called Zend Engine 3, succeeding Zend Engine 2 used in PHP 5.

PHP 7.0 also included changes which were not backwards compatible, as allowed for "major versions" under the versioning scheme agreed in 2011.
Changes to the core language inlcuded
* more consistent and complete syntax for *variable dereferencing*, allowing the use of the operators `->`, `[]`, `()`, `{}`, and `::`, with arbitrary meaningful `left-side expressions`,
* a more predictable behavior of the foreach statement,
* platform consistency of *bitwise shifts operators*,
* floating-point to integer conversion changed (e.g. infinity changed to convert to zero),
* return type declarations introduced for functions which complement the existing parameter type declarations,
* and support for the scalar types (`integer`, `float`, `string`, and `boolean`) in *parameter* and *return type declarations*,
* many fatal or recoverable-level legacy PHP error mechanisms replaced with modern object-oriented exceptions,
* removed support for hexadecimal number support in some implicit conversions from strings to number types,
* the behavior of the `list()` operator changed to remove support for strings,
* fixed `switch` statement allowed to have multiple default clauses,
* constructors for the few classes built-in to PHP which returned `null` upon failure changed to throw an *exception*,
* deprecated support for legacy PHP 4-style constructor methods,
* removed support for ASP-style delimiters `<%` and `%>` and `<script language="php"> ... </script>`.
* removed several unmaintained or deprecated server application programming interfaces (SAPIs) and extensions from the PHP core, most notably the legacy `mysql` extension.

PHP 7.0 marked the beginning of an expansion in PHP's *type system*. In PHP 5.x, only function parameters could have type declarations, but this was extended to function return types in 7.0, and object properties in 7.4. The types expressible also expanded, with
* *scalar types* (`integer`, `float`, `string`, and `boolean`) in 7.0;
* *iterable type*, *nullable types*,
* and `void` return type all in 7.1; and the *object type* in 7.2.

Other changes in this period aimed to add expressiveness to the language, such as
* the `??` *null coalesce operator*
* and `<=>` "spaceship" *three-way comparison operator* in 7.0;
* new syntax for *array derefencing* and catching multiple exception types in PHP 7.1;
* more flexible *Heredoc* and *Nowdoc* syntax in 7.3;
* and the *null-coalescing assignment operator* in 7.4.

## PHP 8

**PHP 8.0** was released on 26 November **2020**, as a major version with breaking changes from previous versions.

PHP 8 introduced
* union types,
* a new `static` return type,
* a new mixed type,
* attributes.

**Just-in-time compilation**

One of the most high-profile changes was the addition of a *JIT compiler*.

PHP 8's JIT compiler can provide substantial performance improvements for some use cases, while (then PHP) developer **Nikita Popov** stated that the performance improvements for most websites will be less substantial than the upgrade from PHP 5 to PHP 7. Substantial improvements are expected more for mathematical-type operations than for common web-development use cases. Additionally, the JIT compiler provides the future potential to move some code from C to PHP, due to the performance improvements for some use cases.

**Attributes**

A significant addition to the language in 8.0 is *attributes* which (often referred to as *annotations* in other programming languages) allow metadata to be added to program elements such as classes, methods, and parameters. Later versions added built-in attributes which change the behaviour of the language, such as
* `#[\SensitiveParameter]` attribute in **PHP 8.2**,
* `#[\Override]` attribute in **PHP 8.3**,
* `#[\Deprecated]` attribute in **PHP 8.4**,
* and `#[\NoDiscard]` attribute in **PHP 8.5**.

Type annotations were also added into PHP's C source code itself to allow internal functions and methods to have "complete type information in reflection".

**Composite types**

A significant extension to the language's type system is the addition of *composite types*:
* *union types* in **PHP 8.0** (e.g. `int|string` meaning "either integer or string),
* *intersection types* in **PHP 8.1** (e.g. `Traversable&Countable` meaning the value must implement both the `Traversable` and `Countable` interfaces),
* and *disjunctive normal form (DNF)* types in **PHP 8.2** (unions of intersections, such as `array|(Traversable&Countable)`).

Additional special type keywords have also been added, such as
* `mixed` and `static` in **PHP 8.0**,
* `never` (a bottom type indicating that a function never returns) in **PHP 8.1**,
* and `null`, `false` and `true` as stand-alone types in **PHP 8.2**.

The addition of a *rich type system* is part of a general trend towards a stricter language, and **PHP 8.0** included breaking changes to the handling of *`string` to `number` comparisons*, *numeric strings*, and incompatible method signatures. Later versions have introduced *deprecation notices* for behaviour which is planned as a breaking change in a future major version, such as passing `null` to non-nullable internal function parameters and referring to properties which have not been declared on the class.

**Nullsafe operator**

PHP 8 includes changes to allow alternate, more concise, or more consistent syntaxes in a number of scenarios. For example,
the *nullsafe operator* `?->` is similar to the *null coalescing operator* `??`, but used when calling methods.
The following code snippet will not throw an error if `getBirthday()` returns `null`:

```php
$human_readable_date = $user->getBirthday()?->diffForHumans();
```

**Constructor property promotion**

*Constructor property promotion* has been added as "syntactic sugar", allowing class properties to be set automatically when parameters are passed into a class constructor. This reduces the amount of boilerplate code that must be written.

**Match expression**

PHP 8 introduced the *match expression*. The match expression is conceptually similar to a switch statement and is more compact for some use cases. Because match is an expression, its result can be assigned to a variable or returned from a function.

**Standard library changes and additions**

*Weak maps* were added in PHP 8. A `WeakMap` holds references to objects, but these references do not prevent such objects from being garbage collected. This can provide performance improvements in scenarios where data is being cached; this is of particular relevance for object–relational mappings (ORM).

Various adjustments to interfaces, such as
* adding support for creating `DateTime` objects from interfaces,
* addition of a *`Stringable` interface* that can be used for type hinting.

Various new functions including
* `str_contains()`,
* `str_starts_with()`,
* `str_ends_with()`,
* `fdiv()`,
* `get_debug_type()`,
* `get_resource_id()`.

Object implementation of `token_get_all()` has been also added.

**Inheritance improvements**

Inheritance model has been improved by introducing:
* inheritance with private methods,
* abstract methods in traits improvements.

**Other changes**

Other minor changes include
* support for use of *`::class`* on objects, which serves as an alternative for the use of `get_class()`;
* *non-capturing catches* in try-catch blocks;
* variable syntax tweaks to resolve inconsistencies;
* support for *named arguments*;
* support for *trailing commas in parameter lists*, which adds consistency with support for trailing commas in other contexts, such as in arrays.

### PHP 8.0

PHP 8.0 was released on 26 November 2020

* Just-In-Time (JIT) compilation,
* arrays starting with a negative index,
* stricter/saner language semantics (validation for *abstract trait methods*),
* saner string to number comparisons,
* saner numeric strings,
* `TypeError` on invalid arithmetic/bitwise operators,
* reclassification of various engine errors,
* consistent type errors for internal functions,
* fatal error for incompatible method signatures,
* locale-independent float to string conversion,
* variable syntax tweaks,
* attributes,
* named arguments,
* match expression,
* constructor property promotion,
* union types,
* mixed type,
* static return type,
* nullsafe operator,
* non-capturing catches,
* throw expression,
* JSON extension is always available.

### PHP 8.1

PHP 8.1 was released on November 25, 2021.

* support for *enumerations* (also called "enums"),
* declaring properties as `readonly` (which prevents modification of the property after initialization),
* array unpacking with string keys,
* the new `never` type can be used to indicate that a function does not return,
* explicit octal integer literal notation,
* read-only properties,
* first-class callable syntax,
* `new` in initializers,
* pure intersection types,
* `final` class constraints,
* fibers.

### PHP 8.2

PHP 8.2 was released on December 8, 2022.

* readonly classes (whose instance properties are implicitly readonly),
* disjunctive normal form (DNF) types,
* the random extension, which provides a pseudorandom number generator with an object-oriented API,
* Sensitive Parameter value redaction,
* `null`, `false`, and `true` as stand-alone types,
* locale-independent case conversion,
* constants in traits.

### PHP 8.3

PHP 8.3 was released on November 23, 2023.

* readonly array properties,
* arrays allowed to be declared as immutable after initialization
* support for class aliases for built-in PHP classes,
* new methods for random float generation in the `Random` extension,
* enhanced PHP INI settings with fallback value support,
* the new `stream_context_set_options` function provides improved API for stream manipulation,
* *typed class constants*,
* dynamic class constant fetch,
* `#[\Override]` attribute,
* deep-cloning of read-only properties,
* new `json_validate` function,
* randomizer additions,
* the command-line linter supports multiple files.

### PHP 8.4

PHP 8.4 was released on 21 November 2024.

* property hooks,
* asymmetric visibility,
* an updated DOM API,
* performance improvements,
* bug fixes,
* general cleanup.

-- [Wikipedia](https://en.wikipedia.org/wiki/PHP#History); [PHP Documentation](https://www.php.net/manual/en/history.php.php)

[▵ Up](#php-history)
[⌂ Home](../../README.md)
[▲ Previous: What is PHP?](what_is_php.md)
[▼ Next: PHP features](php_features.md)
