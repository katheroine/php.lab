[⌂ Home](../../../../README.md)
[▲ Previous: Interfaces](../interfaces/interfaces.md)
[▼ Next: Errors](../../errors_and_exceptions/errors/errors.md)

# Traits

## Definition

> In computer programming, a **trait** is a language concept that represents a set of *methods* that can be used to extend the functionality of a *class*.

In *object-oriented programming*, behavior is sometimes shared between *classes* which are not related to each other. For example, many unrelated *classes* may have methods to serialize objects to JSON. Historically, there have been several approaches to solve this without duplicating the code in every class needing the behavior. Other approaches include *multiple inheritance* and *mixins*, but these have drawbacks: the behavior of the code may unexpectedly change if the order in which the *mixins* are applied is altered, or if new *methods* are added to the *parent classes* or *mixins*.

*Traits* solve these problems by allowing classes to use the *trait* and get the desired behavior. If a *class* uses more than one *trait*, the order in which the traits are used does not matter. The methods provided by the traits have direct access to the data of the class.

*Traits* combine aspects of *protocols* (*interfaces*) and *mixins*. Like an *interface*, a *trait* defines one or more *method signatures*, of which *implementing classes* must provide *implementations*. Like a *mixin*, a *trait* provides additional behavior for the *implementing class*.

In case of a *naming collision* between *methods* provided by different *traits*, the programmer must explicitly disambiguate which one of those *methods* will be used in the *class*; thus manually solving the *diamond problem* of *multiple inheritance*. This is different from other composition *methods* in *object-oriented programming*, where conflicting names are automatically resolved by *scoping rules*.

Operations which can be performed with *traits* include:

* *symmetric sum*: an operation that merges two disjoint *traits* to create a new *trait*,
* *override* (or *asymmetric sum*): an operation that forms a new *trait* by adding *methods* to an existing *trait*, possibly *overriding* some of its *methods*,
* *alias*: an operation that creates a new *trait* by adding a new name for an existing *method*,
* *exclusion*: an operation that forms a new *trait* by removing a *method* from an existing *trait*. (Combining this with the alias operation yields a shallow rename operation).

If a *method* is excluded from a *trait*, that *method* must be provided by the *class* that consumes the *trait*, or by a *parent class* of that *class*. This is because the *methods* provided by the *trait* might call the excluded *method*.

*Trait composition* is commutative (i.e. given traits A and B, A + B is equivalent to B + A) and associative (i.e. given traits A, B, and C, (A + B) + C is equivalent to A + (B + C)).

-- [Wikipedia](https://en.wikipedia.org/wiki/Trait_(computer_programming))

## Description

PHP implements a way to reuse code called *traits*.

***Traits*** are a mechanism for code reuse in *single inheritance* languages such as PHP. A *trait* is intended to reduce some limitations of *single inheritance* by enabling a developer to reuse sets of *methods* freely in several independent *classes* living in different *class hierarchies*. The semantics of the combination of *traits* and *classes* is defined in a way which reduces complexity, and avoids the typical problems associated with *multiple inheritance* and *mixins*.

A *trait* is similar to a *class*, but only intended to group functionality in a fine-grained and consistent way. It is not possible to *instantiate* a *trait* on its own. It is an addition to traditional *inheritance* and enables *horizontal composition of behavior*; that is, the application of *class members* without requiring *inheritance*.

*Example: Trait example*

```php
<?php

trait TraitA {
    public function sayHello() {
        echo 'Hello';
    }
}

trait TraitB {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld
{
    use TraitA, TraitB; // A class can use multiple traits

    public function sayHelloWorld() {
        $this->sayHello();
        echo ' ';
        $this->sayWorld();
        echo "!\n";
    }
}

$myHelloWorld = new MyHelloWorld();
$myHelloWorld->sayHelloWorld();

?>
```

The above example will output:

```
Hello World!
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php#language.oop5.traits)

*Example: Trait*

```php
<?php

trait SomeTrait
{
    public const SOME_CONSTANT = 'constant';
    public static string $someStaticProperty = 'static property';
    public string $someProperty = 'property';
    public readonly string $someReadonlyProperty;

    public function __construct()
    {
        $this->someReadonlyProperty = 'readonly property';
    }

    public static function someStaticMethod(): string
    {
        return 'static method';
    }

    public function someMethod(): string
    {
        return 'method';
    }
}

class SomeClass
{
    use SomeTrait;

    public function otherMethod(): void
    {
        print(
            self::SOME_CONSTANT . PHP_EOL
            . self::$someStaticProperty . PHP_EOL
            . self::someStaticMethod() . PHP_EOL
            . $this->someProperty . PHP_EOL
            . $this->someReadonlyProperty . PHP_EOL
            . $this->someMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

$someObject = new SomeClass();
$someObject->otherMethod();

```

**Result (PHP 8.4)**:

```
constant
static property
static method
property
readonly property
method

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait.php)

## Trait and reusability

*Example: Trait and reusability*

```php
<?php

trait Presentable
{
    const DESCRIPTION_TITLE = "Description: ";
    const CORE_TITLE = "Core: ";

    private $presentationTitle = "";

    abstract function getLabel(): string;
    abstract function getCore(): string;

    public function show(): void
    {
        if (strlen($this->presentationTitle)) {
            print($this->presentationTitle . PHP_EOL);
        }
        print(
            self::DESCRIPTION_TITLE . $this->getLabel() . PHP_EOL
            . self::CORE_TITLE . $this->getCore() . PHP_EOL
            . PHP_EOL
        );
    }
}

class Value
{
    use Presentable;

    public function __construct(
        private float $value,
        private string $name,
        string $presentationTitle = ""
    ) {
        $this->presentationTitle = $presentationTitle;
    }

    private function getLabel(): string
    {
        return $this->name;
    }

    private function getCore(): string
    {
        return $this->value;
    }
}

class Content
{
    use Presentable;

    public function __construct(
        private string $content,
        private string $description = "",
        string $presentationTitle = ""
    ) {
        $this->presentationTitle = $presentationTitle;
    }

    private function getLabel(): string
    {
        return $this->description;
    }

    private function getCore(): string
    {
        return $this->content;
    }
}

$temp = new Value(23.2, "Good ambient temperature", "My favourite temperature");
$temp->show();

$lectio = new Content(
    "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
    "De beneficiis lectionis",
    "My favourite cite"
);
$lectio->show();

```

**Result (PHP 8.4)**:

```
My favourite temperature
Description: Good ambient temperature
Core: 23.2

My favourite cite
Description: De beneficiis lectionis
Core: In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_and_reusability.php)

## Trait members access

*Example: Trait members access*

```php
<?php

trait SomeTrait
{
    public const SOME_CONSTANT = 'constant';
    public static string $someStaticProperty = 'static property';
    public string $someProperty = 'property';
    public readonly string $someReadonlyProperty;

    public function __construct()
    {
        $this->someReadonlyProperty = 'readonly property';
    }

    public static function someStaticMethod(): string
    {
        return 'static method';
    }

    public function someMethod(): string
    {
        return 'method';
    }

    public static function someTraitContext(): void
    {
        print(
            "Trait context:\n"
            // . self::SOME_CONSTANT . PHP_EOL
            . self::$someStaticProperty . PHP_EOL
            . self::someStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public static function someClassContext(): void
    {
        print(
            "Class context:\n"
            . self::SOME_CONSTANT . PHP_EOL
            . self::$someStaticProperty . PHP_EOL
            . self::someStaticMethod() . PHP_EOL
            . PHP_EOL
        );
    }

    public function someObjectContext(): void
    {
        print(
            "Object context:\n"
            . self::SOME_CONSTANT . PHP_EOL
            . self::$someStaticProperty . PHP_EOL
            . self::someStaticMethod() . PHP_EOL
            . $this->someProperty . PHP_EOL
            . $this->someReadonlyProperty . PHP_EOL
            . $this->someMethod() . PHP_EOL
            . PHP_EOL
        );
    }
}

SomeTrait::someTraitContext();

class SomeClass
{
    use SomeTrait;
}

SomeClass::someClassContext();

$someObject = new SomeClass();
$someObject->someObjectContext();

```

**Result (PHP 8.4)**:

```
Trait context:
static property
static method

Class context:
constant
static property
static method

Object context:
constant
static property
static method
property
readonly property
method

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_members_access.php)

## Trait constant

*Traits* can, as of PHP 8.2.0, also define *constants*.

*Example: Defining constants*

```php
<?php
trait ConstantsTrait {
    public const FLAG_MUTABLE = 1;
    final public const FLAG_IMMUTABLE = 5;
}

class ConstantsExample {
    use ConstantsTrait;
}

$example = new ConstantsExample;
echo $example::FLAG_MUTABLE;
?>
```

The above example will output:

```
1
```

If a *trait* defines a *constant* then a *class* can not *define* a *constant* with the same *name* unless it is compatible (same *visibility*, *initial value*, and *finality*), otherwise a fatal error is issued.

*Example: Conflict resolution*

```php
<?php
trait ConstantsTrait {
    public const FLAG_MUTABLE = 1;
    final public const FLAG_IMMUTABLE = 5;
}

class ConstantsExample {
    use ConstantsTrait;
    public const FLAG_IMMUTABLE = 5; // Fatal error
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php#language.oop5.traits.constants)

*Example: Trait constant*

```php
<?php

trait SomeTrait
{
    public const SOME_CONSTANT = 'constant';
}

class SomeClass
{
    use SomeTrait;

    public static function someStaticMethod(): void
    {
        print(self::SOME_CONSTANT . PHP_EOL);
    }

    public function someMethod(): void
    {
        print(
            self::SOME_CONSTANT . PHP_EOL
            . $this::SOME_CONSTANT . PHP_EOL
        );
    }
}

print(SomeClass::SOME_CONSTANT . PHP_EOL);
$someObject = new SomeClass();
print($someObject::SOME_CONSTANT . PHP_EOL);
$someObject->someStaticMethod();
$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
constant
constant
constant
constant
constant
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_constant.php)

## Trait property

*Traits* can also define *properties*.

*Example: Defining properties*

```php
<?php

trait PropertiesTrait
{
    public $x = 1;
}

class PropertiesExample
{
    use PropertiesTrait;
}

$example = new PropertiesExample();
$example->x;

?>
```

If a *trait* *defines* a *property* then a *class* can not *define* a *property* with the same *name* unless it is compatible (same *visibility* and *type*, *readonly* modifier, and *initial* value), otherwise a fatal error is issued.

*Example: Conflict resolution*

```php
<?php
trait PropertiesTrait {
    public $same = true;
    public $different1 = false;
    public bool $different2;
    public bool $different3;
}

class PropertiesExample {
    use PropertiesTrait;
    public $same = true;
    public $different1 = true; // Fatal error
    public string $different2; // Fatal error
    readonly protected bool $different3; // Fatal error
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php#language.oop5.traits.properties)

*Example: Trait property*

```php
<?php

trait SomeTrait
{
    public string $someProperty = 'property';
}

class SomeClass
{
    use SomeTrait;

    public function someMethod(): void
    {
        print($this->someProperty . PHP_EOL);
    }
}

$someObject = new SomeClass();
print($someObject->someProperty . PHP_EOL);
$someObject->someMethod();


```

**Result (PHP 8.4)**:

```
property
property
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_property.php)

## Trait method

*Example: Trait method*

```php
<?php

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'method';
    }
}

class SomeClass
{
    use SomeTrait;

    public function otherMethod(): void
    {
        print(
            self::someMethod() . PHP_EOL
            . $this->someMethod() . PHP_EOL
        );
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
method
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_method.php)

## Trait static members

*Traits* can *define* *static variables*, *static methods* and *static properties*.

Note:

As of PHP 8.1.0, calling a *static method*, or accessing a *static property* directly on a *trait* is deprecated. *Static methods* and *properties* should only be accessed on a *class* using the *trait*.

*Example: Static variables*

```php
<?php

trait Counter
{
    public function inc()
    {
        static $c = 0;
        $c = $c + 1;
        echo "$c\n";
    }
}

class C1
{
    use Counter;
}

class C2
{
    use Counter;
}

$o = new C1();
$o->inc();
$p = new C2();
$p->inc();

?>
```

The above example will output:

```
1
1
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php#language.oop5.traits.static)

*Example: Static properties*

Caution

Prior to PHP 8.3.0, *static properties* *defined* in a *trait* were shared across all *classes* in the same *inheritance hierarchy* which used that *trait*. As of PHP 8.3.0, if a *child class* uses a *trait* with a *static property*, it will be considered distinct from the one defined in the *parent class*.

```php
<?php

trait T
{
    public static $counter = 1;
}

class A
{
    use T;

    public static function incrementCounter()
    {
        static::$counter++;
    }
}

class B extends A
{
    use T;
}

A::incrementCounter();

echo A::$counter, "\n";
echo B::$counter, "\n";

?>
```

Output of the above example in PHP 8.3:

```
2
1
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php#language.oop5.traits.static)

*Example: Trait static property*

```php
<?php

trait SomeTrait
{
    public static string $someStaticProperty = 'static property';
}

class SomeClass
{
    use SomeTrait;

    public static function someStaticMethod(): void
    {
        print(self::$someStaticProperty . PHP_EOL);
    }

    public function someMethod(): void
    {
        print(self::$someStaticProperty . PHP_EOL);
    }
}

print(SomeTrait::$someStaticProperty . PHP_EOL);
print(SomeClass::$someStaticProperty . PHP_EOL);
$someObject = new SomeClass();
$someObject->someMethod();

```

**Result (PHP 8.4)**:

```
static property
static property
static property
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_static_property.php)

*Example: Static methods*

```php
<?php

trait StaticExample
{
    public static function doSomething()
    {
        return 'Doing something';
    }
}

class Example
{
    use StaticExample;
}

echo Example::doSomething();

?>
```

The above example will output:

```
Doing something
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php#language.oop5.traits.static)

*Example: Trait static method*

```php
<?php

trait SomeTrait
{
    public static function someStaticMethod(): string
    {
        return 'static method';
    }
}

class SomeClass
{
    use SomeTrait;

    public static function otherStaticMethod(): void
    {
        print(self::someStaticMethod() . PHP_EOL);
    }

    public function otherMethod(): void
    {
        print(
            self::someStaticMethod() . PHP_EOL
            . $this::someStaticMethod() . PHP_EOL
            . $this->someStaticMethod() . PHP_EOL
        );
    }
}

print(SomeTrait::someStaticMethod() . PHP_EOL);
print(SomeClass::someStaticMethod() . PHP_EOL);
$someObject = new SomeClass();
print($someObject->someStaticMethod() . PHP_EOL);
$someObject::otherStaticMethod();
$someObject->otherMethod();

```

**Result (PHP 8.4)**:

```
static method
static method
static method
static method
static method
static method
static method
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_static_method.php)

## Trait abstract method

*Traits* support the use of *abstract methods* in order to impose requirements upon the exhibiting *class*. *Public*, *protected*, and *private methods* are supported. Prior to PHP 8.0.0, only *public* and *protected abstract methods* were supported.

Caution

As of PHP 8.0.0, the *signature* of a concrete *method* must follow the *signature compatibility rules*. Previously, its *signature* might be different.

*Example: Express requirements by abstract methods*

```php
<?php
trait Hello {
    public function sayHelloWorld() {
        echo 'Hello'.$this->getWorld();
    }
    abstract public function getWorld();
}

class MyHelloWorld {
    private $world;
    use Hello;
    public function getWorld() {
        return $this->world;
    }
    public function setWorld($val) {
        $this->world = $val;
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php#language.oop5.traits.abstract)

*Example: Trait abstract method*

```php
<?php

trait SomeTrait
{
    public $someVariable = 'hello';

    public abstract function someAbstractMethod(string $someParameter): string;

    public function someMothod(): void
    {
        print($this->someAbstractMethod($this->someVariable));
    }
}

class SomeClass
{
    use SomeTrait;

    public function someAbstractMethod(string $someParameter): string
    {
        return ucfirst($someParameter) . ' world!' . PHP_EOL;
    }
}

$someObject = new SomeClass();
$someObject->someMothod();

```

**Result (PHP 8.4)**:

```
Hello world!
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_abstract_method.php)

## Trait final method

As of PHP 8.3.0, the *`final` modifier* can be applied using the *`as` operator* to *methods* *imported* from *traits*. This can be used to prevent *child classes* from *overriding* the *method*. However, the *class* that *uses* the *trait* can still *override* the *method*.

*Example: Defining a method coming from a trait as final*

```php
<?php

trait CommonTrait
{
    public function method()
    {
        echo 'Hello';
    }
}

class FinalExampleA
{
    use CommonTrait {
        CommonTrait::method as final; // The 'final' prevents child classes from overriding the method
    }
}

class FinalExampleB extends FinalExampleA
{
    public function method() {}
}

?>
```

The above example will output something similar to:

```
Fatal error: Cannot override final method FinalExampleA::method() in ...
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.traits.php)

*Example: Trait final method*

```php
<?php

trait SomeTrait
{
    public function someMethod(): string
    {
        return 'some method';
    }

    public function otherMethod(): string
    {
        return 'other method';
    }

    public function anotherMethod(): string
    {
        return 'another method';
    }
}

class SomeBaseClass
{
    use SomeTrait {
        SomeTrait::someMethod as final;
        SomeTrait::otherMethod as final otherTraitMethod;
    }

    public function otherMethod(): string
    {
        return $this->otherTraitMethod() . ' overriden in base';
    }
}

class SomeDerivedClass extends SomeBaseClass
{
    public function anotherMethod(): string
    {
        return parent::anotherMethod() . ' overriden in derived';
    }
}

$someObject = new SomeDerivedClass();
print($someObject->someMethod() . PHP_EOL);
print($someObject->otherMethod() . PHP_EOL);
print($someObject->anotherMethod() . PHP_EOL);

```

**Result (PHP 8.4)**:

```
some method
other method overriden in base
another method overriden in derived
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/traits/trait_final_method.php)

## Precedence

An *inherited member* from a *base class* is *overridden* by a *member* inserted by a *trait*. The *precedence order* is that *members* from the current *class* *override* *trait methods*, which in turn *override* *inherited methods*.

*Example: Precedence order example*

An *inherited method* from a *base class* is *overridden* by the *method* inserted into `MyHelloWorld` from the `SayWorld` *trait*. The behavior is the same for *methods* defined in the `MyHelloWorld` *class*. The *precedence order* is that *methods* from the current *class* *override* *trait methods*, which in turn *override* *methods* from the *base class*.

```php
<?php
class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
?>
```

The above example will output:

```
Hello World!
```

*Example: Alternate precedence order example*

```php
<?php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo 'Hello Universe!';
    }
}

$o = new TheWorldIsNotEnough();
$o->sayHello();
?>
```

The above example will output:

```
Hello Universe!
```

## Multiple traits

*Multiple traits* can be inserted into a *class* by listing them in the *use statement*, separated by commas.

*Example: Multiple traits usage*

```php
<?php
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();
?>
```

The above example will output:

```
Hello World!
```

## Conflict resolution

If two *traits* insert a *method* with the same *name*, a fatal error is produced, if the conflict is not explicitly resolved.

To resolve *naming conflicts* between *traits* used in the same *class*, the *`insteadof` operator* needs to be used to choose exactly one of the conflicting *methods*.

Since this only allows one to exclude *methods*, the *`as` operator* can be used to add an *alias* to one of the *methods*. Note the *`as` operator* does not rename the *method* and it does not affect any other *method* either.

*Example: Conflict resolution*

In this example, `Talker` uses the *traits* `A` and `B`. Since `A` and `B` have conflicting *methods*, it defines to use the variant of `smallTalk` from *trait* `B`, and the variant of `bigTalk` from *trait* `A`.

The `Aliased_Talker` makes use of the *`as` operator* to be able to use `B`'s `bigTalk` implementation under an additional *alias* `talk`.

```php
<?php
trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}
?>
```

## Changing method visibility

Using the as syntax, one can also adjust the *visibility* of the *method* in the exhibiting *class*.

*Example: Changing method visibility*

```php
<?php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

// Change visibility of sayHello
class MyClass1 {
    use HelloWorld { sayHello as protected; }
}

// Alias method with changed visibility
// sayHello visibility not changed
class MyClass2 {
    use HelloWorld { sayHello as private myPrivateHello; }
}
?>
```

## Traits composed from traits

Just as *classes* can make use of *traits*, so can other *traits*. By using one or more *traits* in a *trait definition*, it can be composed partially or entirely of the *members* *defined* in those other *traits*.

Example: Traits composed from traits

```php
<?php
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World!';
    }
}

trait HelloWorld {
    use Hello, World;
}

class MyHelloWorld {
    use HelloWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
?>
```

The above example will output:

```
Hello World!
```

[▵ Up](#traits)
[⌂ Home](../../../../README.md)
[▲ Previous: Interfaces](../interfaces/interfaces.md)
[▼ Next: Errors](../../errors_and_exceptions/errors/errors.md)
