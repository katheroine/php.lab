[⌂ Home](../../../../README.md)
[▲ Previous: Abstract classes](../abstract_classes/abstract_classes.md)
[▼ Next: Traits](../traits/traits.md)

# Interfaces

## Definition

> In *object-oriented programming*, an **interface** or *protocol type* is a *data type* that acts as an *abstraction* of a *class*. It describes a set of *method signatures*, the *implementations* of which may be provided by multiple *classes* that are otherwise not necessarily related to each other. A *class* which provides the *methods* listed in an *interface* is said to implement the *interface*, or to adopt the protocol.
>
> *Interfaces* are useful for *encapsulation* and reducing *coupling*. For example, in Java, the Comparable interface specifies the *method* `compareTo`. Thus, a sorting *method* only needs to take *objects* of *types* which implement `Comparable` to sort them, without knowing about the inner nature of the *class* (except that two of these *objects* can be compared via `compareTo()`).

-- [Wikipedia](https://en.wikipedia.org/wiki/Interface_(object-oriented_programming))

## Description

*Object interfaces* allow you to create code which specifies which *methods* and *properties* a *class* must *implement*, without having to define how these *methods* or *properties* are *implemented*. *Interfaces* share a *namespace* with *classes*, *traits*, and *enumerations*, so they may not use the same *name*.

*Interfaces* are *defined* in the same way as a *class*, but with the *`interface` keyword* replacing the *`class` keyword* and without any of the *methods* having their contents *defined*.

All *methods* *declared* in an *interface* must be *public*; this is the nature of an *interface*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces)

*Example: Interface*

```php
<?php

interface SomeInterface
{
    public const SOME_CONSTANT = 'constant';

    public static function someStaticMethod(): string;
    public function someMethod(): string;
}

class SomeClass implements SomeInterface
{
    public static function someStaticMethod(): string
    {
        return 'static method';
    }

    public function someMethod(): string
    {
        return 'method';
    }
}

$someObject = new SomeClass();
print(
    SomeClass::SOME_CONSTANT . PHP_EOL
    . $someObject->someStaticMethod() . PHP_EOL
    . $someObject->someMethod() . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
constant
static method
method
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/interfaces/interface.php)

*Example: Interface example*

```php
<?php

// Declare the interface 'Template'
interface Template
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Implement the interface
// This will work
class WorkingTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

// This will not work
// Fatal error: Class BadTemplate contains 1 abstract methods
// and must therefore be declared abstract (Template::getHtml)
class BadTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.examples)

In practice, interfaces serve two complementary purposes:

* To allow *developers* to create *objects* of different *classes* that may be used interchangeably because they *implement* the same *interface* or *interfaces*. A common example is multiple database access services, multiple payment gateways, or different caching strategies. Different *implementations* may be swapped out without requiring any changes to the code that uses them.
* To allow a *function* or *method* to accept and operate on a *parameter* that conforms to an *interface*, while not caring what else the *object* may do or how it is *implemented*. These *interfaces* are often named like `Iterable`, `Cacheable`, `Renderable`, or so on to describe the significance of the behavior.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces)

*Example: Interface and dependency injection*

```php
<?php

interface Presentable
{
    public function getId(): int;
    public function getTitle(): string;
    public function getContent(): string;
}

class Note implements Presentable
{
    private static int $datumId = 0;

    public function __construct(
        private string $label,
        private string $text
    ) {
        ++self::$datumId;
    }

    public function getId(): int
    {
        return self::$datumId;
    }

    public function getTitle(): string
    {
        return $this->label;
    }

    public function getContent(): string
    {
        return $this->text;
    }
}

class Article implements Presentable
{
    public function __construct(
        private int $tag,
        private string $header,
        private string $body
    ) {
    }

    public function getId(): int
    {
        return $this->tag;
    }

    public function getTitle(): string
    {
        return $this->header;
    }

    public function getContent(): string
    {
        return $this->body;
    }
}

function display(Presentable $presentable)
{
    print(
        '#' . $presentable->getId()
        . ' "' . $presentable->getTitle() . '"' . PHP_EOL . PHP_EOL
        . $presentable->getContent() . PHP_EOL . PHP_EOL
    );
}

$someNote = new Note(
    'Python and prototyping',
    "Python is widely considered excellent for prototyping.\n"
    . "It is one of the most popular languages for rapid application development\n"
    . "because it allows developers to move from an idea to a working concept\n"
    . "much faster than lower-level languages like C++ or Java."
);

$someArticle = new Article(
    '1024',
    'C++ teaches more than any other programming language',
    "While modern languages like Python or Java automate many technical\n"
    . "details to improve developer productivity,\n"
    . "C++ leaves them in your hands, providing a deeper look at \"how computers think\"."
);

display($someNote);
display($someArticle);

```

**Result (PHP 8.4)**:

```
#1 "Python and prototyping"

Python is widely considered excellent for prototyping.
It is one of the most popular languages for rapid application development
because it allows developers to move from an idea to a working concept
much faster than lower-level languages like C++ or Java.

#1024 "C++ teaches more than any other programming language"

While modern languages like Python or Java automate many technical
details to improve developer productivity,
C++ leaves them in your hands, providing a deeper look at "how computers think".

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/interfaces/interface_and_dependency_injection.php)

*Interfaces* may define *magic methods* to require *implementing* *classes* to *implement* those *methods*.

Note:

Although they are supported, including *constructors* in *interfaces* is strongly discouraged. Doing so significantly reduces the flexibility of the *object* implementing the *interface*. Additionally, *constructors* are not enforced by *inheritance* rules, which can cause inconsistent and unexpected behavior.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces)

## Inplementing interface

>>> `implements` operator

To *implement* an *interface*, the *`implements` operator* is used. All *methods* in the *interface* must be *implemented* within a *class*; failure to do so will *result* in a fatal error. *Classes* may *implement* more than one *interface* if desired by separating each *interface* with a comma.

Warning

A *class* that *implements* an *interface* may use a different *name* for its *parameters* than the *interface*. However, as of PHP 8.0 the language supports *named arguments*, which means callers may rely on the *parameter name* in the *interface*. For that reason, it is strongly recommended that *developers* use the same *parameter names* as the *interface* being *implemented*.

Note:

*Interfaces* can be *extended* like *classes* using the *`extends` operator*.

Note:

The *class* *implementing* the *interface* must declare all *methods* in the *interface* with a *compatible signature*. A *class* can *implement* multiple *interfaces* which *declare* a *method* with the same *name*. In this case, the *implementation* must follow the *signature compatibility* rules for all the *interfaces*. So *covariance* and *contravariance* can be applied.

*Example: Implementing interface*

```php
<?php

interface Displayable
{
    public function getLabel(): string;
    public function getContent(): string;
}

class Datum implements Displayable
{
    public function __construct(
        private string $label,
        protected string $description
    ) {
    }

    public function getLabel(): string
    {
        return "Description: " . $this->description;
    }
}

$someDatum = new Datum(
    'Great operating system',
    'Linux is a great operating system for geeks, nerds and academics.'
);

print(
    $someDatum->getLabel() . PHP_EOL
    . $someDatum->getContent() . PHP_EOL
    . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
Description: De beneficiis lectionis
Core: In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/interfaces/implementing_interface.php)

## Interface constant

It's possible for *interfaces* to have *constants*. *Interface constants* work exactly like *class constants*. Prior to PHP 8.1.0, they cannot be *overridden* by a *class*/*interface* that *inherits* them.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.constants)

*Example: Interfaces with constants*

```php
<?php
interface A
{
    const B = 'Interface constant';
}

// Prints: Interface constant
echo A::B;


class B implements A
{
    const B = 'Class constant';
}

// Prints: Class constant
// Prior to PHP 8.1.0, this will however not work because it was not
// allowed to override constants.
echo B::B;
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.examples)

*Example: Interface constant*

```php
<?php

interface SomeInterface
{
    public const SOME_CONSTANT = 'constant';
}

class SomeClass implements SomeInterface
{
    public function someMethod(): void
    {
        print(self::SOME_CONSTANT . PHP_EOL);
    }
}

print(SomeInterface::SOME_CONSTANT . PHP_EOL);

$someObject = new SomeClass();
$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
constant
constant
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/interfaces/interface_constant.php)

## Interface method

*Example: Interface method*

```php
<?php

interface SomeInterface
{
    public function someMethod(): string;
}

class SomeClass implements SomeInterface
{
    public function someMethod(): string
    {
        return 'method';
    }

    public function otherMethod(): void
    {
        print($this->someMethod() . PHP_EOL);
    }
}

$someObject = new SomeClass();
print($someObject->someMethod() . PHP_EOL);
$someObject->otherMethod();

```

**Result (PHP 8.4)**:

```
method
method
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/interfaces/interface_method.php)

## Interface property

As of PHP 8.4.0, *interfaces* may also *declare* *properties*. If they do, the *declaration* must specify if the *property* is to be *readable*, *writeable*, or both. The *interface declaration* applies only to *public* *read* and *write access*.

A *class* may satisfy an *interface property* in multiple ways. It may *define* a *public property*. It may *define* a *public virtual property* that *implements* only the corresponding *hook*. Or a *read property* may be satisfied by a *readonly property*. However, an *interface property* that is *settable* may not be *readonly*.

*Example: Interface properties example*

```php
<?php
interface I
{
    // An implementing class MUST have a publicly-readable property,
    // but whether or not it's publicly settable is unrestricted.
    public string $readable { get; }

    // An implementing class MUST have a publicly-writeable property,
    // but whether or not it's publicly readable is unrestricted.
    public string $writeable { set; }

    // An implementing class MUST have a property that is both publicly
    // readable and publicly writeable.
    public string $both { get; set; }
}

// This class implements all three properties as traditional, un-hooked
// properties. That's entirely valid.
class C1 implements I
{
    public string $readable;

    public string $writeable;

    public string $both;
}

// This class implements all three properties using just the hooks
// that are requested.  This is also entirely valid.
class C2 implements I
{
    private string $written = '';
    private string $all = '';

    // Uses only a get hook to create a virtual property.
    // This satisfies the "public get" requirement.
    // It is not writeable, but that is not required by the interface.
    public string $readable { get => strtoupper($this->writeable); }

    // The interface only requires the property be settable,
    // but also including get operations is entirely valid.
    // This example creates a virtual property, which is fine.
    public string $writeable {
        get => $this->written;
        set {
            $this->written = $value;
        }
    }

    // This property requires both read and write be possible,
    // so we need to either implement both, or allow it to have
    // the default behavior.
    public string $both {
        get => $this->all;
        set {
            $this->all = strtoupper($value);
        }
    }
}
?>
```

## Examples

*Example: Extendable interfaces*

```php
<?php
interface A
{
    public function foo();
}

interface B extends A
{
    public function baz(Baz $baz);
}

// This will work
class C implements B
{
    public function foo()
    {
    }

    public function baz(Baz $baz)
    {
    }
}

// This will not work and result in a fatal error
class D implements B
{
    public function foo()
    {
    }

    public function baz(Foo $foo)
    {
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.examples)

*Example: Variance compatibility with multiple interfaces*

```php
<?php
class Foo {}
class Bar extends Foo {}

interface A {
    public function myfunc(Foo $arg): Foo;
}

interface B {
    public function myfunc(Bar $arg): Bar;
}

class MyClass implements A, B
{
    public function myfunc(Foo $arg): Bar
    {
        return new Bar();
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.examples)

*Example: Multiple interface inheritance*

```php
<?php
interface A
{
    public function foo();
}

interface B
{
    public function bar();
}

interface C extends A, B
{
    public function baz();
}

class D implements C
{
    public function foo()
    {
    }

    public function bar()
    {
    }

    public function baz()
    {
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.examples)

*Example: Interfaces with abstract classes*

```php
<?php
interface A
{
    public function foo(string $s): string;

    public function bar(int $i): int;
}

// An abstract class may implement only a portion of an interface.
// Classes that extend the abstract class must implement the rest.
abstract class B implements A
{
    public function foo(string $s): string
    {
        return $s . PHP_EOL;
    }
}

class C extends B
{
    public function bar(int $i): int
    {
        return $i * 2;
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.examples)

*Example: Extending and implementing simultaneously*

```php
<?php

class One
{
    /* ... */
}

interface Usable
{
    /* ... */
}

interface Updatable
{
    /* ... */
}

// The keyword order here is important. 'extends' must come first.
class Two extends One implements Usable, Updatable
{
    /* ... */
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php#language.oop5.interfaces.examples)

An *interface*, together with *type declarations*, provides a good way to make sure that a particular *object* contains particular *methods*. See `instanceof` operator and *type declarations*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.interfaces.php)

[▵ Up](#interfaces)
[⌂ Home](../../../../README.md)
[▲ Previous: Abstract classes](../abstract_classes/abstract_classes.md)
[▼ Next: Traits](../traits/traits.md)
