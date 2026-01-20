[⌂ Home](../../../README.md)
[▲ Previous: Objects](../objects/objects.md)

# Enumerations

## Availability

PHP 8 >= 8.1.0

## Basic enumerations

**Enumerations** are a restricting layer on top of *classes* and *class constants*, intended to provide a way to define a closed set of possible values for a type.

```php
<?php
enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

function do_stuff(Suit $s)
{
    // ...
}

do_stuff(Suit::Spades);
?>
```

## Casting

If an *enum* is converted to an *object*, it is not modified. If an *enum* is converted to an array, an *array* with a single name *key* (for *pure enums*) or an *array* with both name and value *keys* (for *backed enums*) is created. All other cast types will result in an error.

-- [PHP Reference](https://www.php.net/manual/en/language.types.enumerations.php)

## Enumerations overview

**Enumerations**, or *enums*, allow a developer to define a custom type that is limited to one of a discrete number of possible values. That can be especially helpful when defining a *domain model*, as it enables "making invalid states unrepresentable."

*Enums* appear in many languages with a variety of different features. In PHP, *enums* are a special kind of object. The `Enum` itself is a class, and its possible cases are all single-instance objects of that class. That means *enum cases* are valid *objects* and may be used anywhere an object may be used, including type checks.

The most popular example of *enumerations* is the built-in *boolean type*, which is an *enumerated type* with legal values `true` and `false`. *Enums* allows developers to define their own arbitrarily robust *enumerations*.

-- [PHP Reference](www.php.net/manual/en/language.enumerations.overview.php)

## Basic enumerations

*Enums* are similar to *classes*, and share the same *namespaces* as *classes*, *interfaces*, and *traits*. They are also *autoloadable* the same way. An *enum* defines a new *type*, which has a fixed, limited number of possible legal values.

```php
<?php

enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}
?>
```

This declaration creates a new *enumerated type* named `Suit`, which has four and only four legal values: `Suit::Hearts`, `Suit::Diamonds`, `Suit::Clubs`, and `Suit::Spades`. *Variables* may be assigned to one of those legal values. A *function* may be *type checked* against an *enumerated type*, in which case only values of that *type* may be passed.

```php
<?php

function pick_a_card(Suit $suit)
{
    /* ... */
}

$val = Suit::Diamonds;

// OK
pick_a_card($val);

// OK
pick_a_card(Suit::Clubs);

// TypeError: pick_a_card(): Argument #1 ($suit) must be of type Suit, string given
pick_a_card('Spades');
?>
```

An *enumeration* may have zero or more *case definitions*, with no maximum. A *zero-case enum* is syntactically valid, if rather useless.

For *enumeration cases*, the same syntax rules apply as to any label in PHP.

By default, *cases* are not intrinsically backed by a scalar value. That is, `Suit::Hearts` is not equal to `"0"`. Instead, each case is backed by a singleton object of that name. That means that:

```php
<?php

$a = Suit::Spades;
$b = Suit::Spades;

$a === $b; // true

$a instanceof Suit;  // true
?>
```

It also means that *enum* values are never `<` or `>` each other, since those comparisons are not meaningful on *objects*. Those comparisons will always return `false` when working with *enum* values.

This type of *case*, with no related data, is called a *pure case*. An *enum* that contains only *pure cases* is called a *pure enum*.

All *pure cases* are implemented as *instances* of their *enum type*. The (enum type) is represented internally as a *class*.

All *cases* have a *read-only property*, *name*, that is the case-sensitive name of the *case* itself.

```php
<?php

print Suit::Spades->name;
// prints "Spades"
?>
```

It is also possible to use the `defined()` and `constant()` functions to check for the existence of or read an *enum case* if the name is obtained dynamically. This is, however, discouraged as using *backed enums* should work for most *use cases*.

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.basics.php)

## Backed enumerations

By default, *enumerated cases* have no *scalar equivalent*. They are simply *singleton objects*. However, there are ample cases where an *enumerated case* needs to be able to round-trip to a database or similar datastore, so having a built-in scalar (and thus trivially serializable) equivalent defined intrinsically is useful.

To define a *scalar equivalent* for an *enumeration*, the syntax is as follows:

```php
<?php

enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}
?>
```

A *case* that has a *scalar equivalent* is called a *backed case*, as it is "backed" by a simpler value. An *enum* that contains all *backed cases* is called a *backed enum*. A *backed enum* may contain only *backed cases*. A *pure enum* may contain only *pure cases*.

A *backed enum* may be backed by *types* of `int` or `string`, and a given *enumeration* supports only a *single type* at a time (that is, no *union of `int|string`*). If an *enumeration* is marked as having a *scalar equivalent*, then all cases must have a *unique scalar equivalent* defined explicitly. There are no *auto-generated scalar equivalents* (e.g., *sequential integers*). *Backed cases* must be *unique*; two *backed enum cases* may not have the same *scalar equivalent*. However, a *constant* may refer to a *case*, effectively creating an *alias*.

The *equivalent values* may be a *constant scalar expression*. Prior to PHP 8.2.0, the *equivalent values* had to be *literals* or *literal expressions*. This means that *constants* and *constant expressions* were not supported. That is, `1 + 1` was allowed, but `1 + SOME_CONST` was not.

*Backed cases* have an additional *read-only property*, `value`, which is the *value* specified in the definition.

```php
<?php

print Suit::Clubs->value;
// Prints "C"
?>
```

In order to enforce the *value property* as *read-only*, a *variable* cannot be assigned as a *reference* to it. That is, the following throws an error:

```php
<?php

$suit = Suit::Clubs;
$ref = &$suit->value;
// Error: Cannot acquire reference to property Suit::$value
?>
```

*Backed enums* implement an internal `BackedEnum` *interface*, which exposes two additional methods:

* `from(int|string): self` will take a *scalar* and return the corresponding *enum case*. If one is not found, it will throw a `ValueError`. This is mainly useful in cases where the *input scalar* is trusted and a missing *enum value* should be considered an application-stopping error.

* `tryFrom(int|string): ?self` will take a *scalar* and return the corresponding *enum case*. If one is not found, it will return `null`. This is mainly useful in cases where the *input scalar* is untrusted and the caller wants to implement their own *error handling* or default-value logic.

The `from()` and `tryFrom()` methods follow standard *weak/strong typing* rules. In *weak typing* mode, passing an `integer` or `string` is acceptable and the system will coerce the *value* accordingly. Passing a `float` will also work and be coerced. In *strict typing* mode, passing an `integer` to `from()` on a *string-backed enum* (or vice versa) will result in a `TypeError`, as will a `float` in all circumstances. All other parameter types will throw a `TypeError` in both modes.

```php
<?php

$record = get_stuff_from_database($id);
print $record['suit'];

$suit =  Suit::from($record['suit']);
// Invalid data throws a ValueError: "X" is not a valid scalar value for enum "Suit"
print $suit->value;

$suit = Suit::tryFrom('A') ?? Suit::Spades;
// Invalid data returns null, so Suit::Spades is used instead.
print $suit->value;
?>
```

Manually defining a `from()` or `tryFrom()` method on a Backed Enum will result in a fatal error.

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.backed.php)

## Enumeration methods

*Enums* (both *pure enums* and *backed enums*) may contain *methods*, and may *implement* *interfaces*. If an *enum* *implements* an *interface*, then any *type check* for that *interface* will also accept all *cases* of that *enum*.

```php
<?php

interface Colorful
{
    public function color(): string;
}

enum Suit implements Colorful
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    // Fulfills the interface contract.
    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades => 'Black',
        };
    }

    // Not part of an interface; that's fine.
    public function shape(): string
    {
        return "Rectangle";
    }
}

function paint(Colorful $c)
{
   /* ... */
}

paint(Suit::Clubs);  // Works

print Suit::Diamonds->shape(); // prints "Rectangle"
?>
```

In this example, all four *instances* of `Suit` have two *methods*, `color()` and `shape()`. As far as calling code and *type checks* are concerned, they behave exactly the same as any other *object instance*.

On a *backed enum*, the *interface* declaration goes after the *backing type declaration*.

```php
<?php

interface Colorful
{
    public function color(): string;
}

enum Suit: string implements Colorful
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';

    // Fulfills the interface contract.
    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades => 'Black',
        };
    }
}
?>
```

Inside a *method*, the `$this` *variable* is *defined* and refers to the *case instance*.

*Methods* may be arbitrarily complex, but in practice will usually return a *static value* or *match* on `$this` to provide different results for different *cases*.

Note that in this case it would be a better data modeling practice to also define a `SuitColor` *enum type* with values `Red` and `Black` and return that instead. However, that would complicate this example.

The above hierarchy is logically similar to the following *class* structure (although this is not the actual code that runs):

```php
<?php

interface Colorful
{
    public function color(): string;
}

final class Suit implements UnitEnum, Colorful
{
    public const Hearts = new self('Hearts');
    public const Diamonds = new self('Diamonds');
    public const Clubs = new self('Clubs');
    public const Spades = new self('Spades');

    private function __construct(public readonly string $name) {}

    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades => 'Black',
        };
    }

    public function shape(): string
    {
        return "Rectangle";
    }

    public static function cases(): array
    {
        // Illegal method, because manually defining a cases() method on an Enum is disallowed.
        // See also "Value listing" section.
    }
}
?>
```

Methods may be *public*, *private*, or *protected*, although in practice *private* and *protected* are equivalent as *inheritance* is not allowed.

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.methods.php)

## Enumeration static methods

*Enumerations* may also have *static methods*. The use for *static methods* on the *enumeration* itself is primarily for *alternative constructors*. E.g.:

```php
<?php

enum Size
{
    case Small;
    case Medium;
    case Large;

    public static function fromLength(int $cm): self
    {
        return match(true) {
            $cm < 50 => self::Small,
            $cm < 100 => self::Medium,
            default => self::Large,
        };
    }
}
?>
```

*Static methods* may be *public*, *private*, or *protected*, although in practice *private* and *protected* are equivalent as *inheritance* is not allowed.

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.static-methods.php)

## Enumeration constants

*Enumerations* may include *constants*, which may be *public*, *private*, or *protected*, although in practice *private* and *protected* are equivalent as *inheritance* is not allowed.

An *enum constant* may refer to an *enum case*:

```php
<?php

enum Size
{
    case Small;
    case Medium;
    case Large;

    public const Huge = self::Large;
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.constants.php)

## Traits

*Enumerations* may leverage *traits*, which will behave the same as on *classes*. The caveat is that *traits* used in an *enum* must not contain *properties*. They may only include *methods*, *static methods*, and *constants*. A *trait* with *properties* will result in a fatal error.

```php
<?php

interface Colorful
{
    public function color(): string;
}

trait Rectangle
{
    public function shape(): string {
        return "Rectangle";
    }
}

enum Suit implements Colorful
{
    use Rectangle;

    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    public function color(): string
    {
        return match($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades => 'Black',
        };
    }
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.traits.php)

## Enum values in constant expressions

Because *cases* are represented as *constants* on the *enum* itself, they may be used as *static values* in most *constant expressions*: *property defaults*, *static variable defaults*, *parameter defaults*, *global* and *class constant values*. They may not be used in other *enum case values*, but normal *constants* may refer to an *enum case*.

However, implicit *magic method calls* such as `ArrayAccess` on *enums* are not allowed in *static* or *constant definitions* as we cannot absolutely guarantee that the resulting value is *deterministic* or that the *method invocation* is free of side effects. *Function calls*, *method calls*, and *property access* continue to be invalid operations in *constant expressions*.

```php
<?php

// This is an entirely legal Enum definition.
enum Direction implements ArrayAccess
{
    case Up;
    case Down;

    public function offsetExists($offset): bool
    {
        return false;
    }

    public function offsetGet($offset): mixed
    {
        return null;
    }

    public function offsetSet($offset, $value): void
    {
        throw new Exception();
    }

    public function offsetUnset($offset): void
    {
        throw new Exception();
    }
}

class Foo
{
    // This is allowed.
    const DOWN = Direction::Down;

    // This is disallowed, as it may not be deterministic.
    const UP = Direction::Up['short'];
    // Fatal error: Cannot use [] on enums in constant expression
}

// This is entirely legal, because it's not a constant expression.
$x = Direction::Up['short'];
var_dump("\$x is " . var_export($x, true));

$foo = new Foo();
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.expressions.php)

## Differences from objects

Although *enums* are built on *classes* and *objects*, they do not support all object-related functionality. In particular, *enum cases* are forbidden from having *state*.

* *Constructors* and *destructors* are forbidden.
* *Inheritance* is not supported. *Enums* may not *extend* or be *extended*.
* *Static* or *object properties* are not allowed.
* *Cloning* an *enum case* is not supported, as *cases* must be *singleton instances*.
* *Magic methods*, except for those listed below, are disallowed.
* *Enums* must always be declared before they are used.

The following *object* functionality is available, and behaves just as it does on any other *object*:

* *Public*, *private*, and *protected methods*.
* *Public*, *private*, and *protected static methods*.
* *Public*, *private*, and *protected constants*.
* *Enums* may *implement* any number of *interfaces*.
* *Enums* and *cases* may have *attributes* attached to them. The `TARGET_CLASS` target filter includes *enums* themselves. The *TARGET_CLASS_CONST* target filter includes *enum cases*.
* `__call`, `__callStatic`, and `__invoke` *magic methods*.
* `__CLASS__` and `__FUNCTION__` *constants* behave as normal.

The `::class` *magic constant* on an *enum type* evaluates to the *type* name including any *namespace*, exactly the same as an *object*. The `::class` *magic constant* on a `case` instance also evaluates to the *enum type*, as it is an *instance* of that *type*.

Additionally, *enum cases* may not be *instantiated* directly with `new`, nor with `ReflectionClass::newInstanceWithoutConstructor()` in *reflection*. Both will result in an error.

```php
<?php

$clovers = new Suit();
// Error: Cannot instantiate enum Suit

$horseshoes = (new ReflectionClass(Suit::class))->newInstanceWithoutConstructor()
// Error: Cannot instantiate enum Suit
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.object-differences.php)

## Value listing

Both *pure enums* and *backed enums* implement an *internal interface* named `UnitEnum`. `UnitEnum` includes a *static method* `cases()`. `cases()` returns a *packed array* of all defined *cases* in the order of *declaration*.

```php
<?php

Suit::cases();
// Produces: [Suit::Hearts, Suit::Diamonds, Suit::Clubs, Suit::Spades]
?>
```

Manually defining a `cases()` method on an *enum* will result in a fatal error.

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.listing.php)

## Serialization

*Enumerations* are *serialized* differently from *objects*. Specifically, they have a new *serialization code*, `"E"`, that specifies the name of the *enum case*. The *deserialization* routine is then able to use that to set a *variable* to the existing *singleton value*. That ensures that:

```php
<?php

Suit::Hearts === unserialize(serialize(Suit::Hearts));

print serialize(Suit::Hearts);
// E:11:"Suit:Hearts";
?>
```

On *deserialization*, if an *enum* and *case* cannot be found to match a *serialized value* a warning will be issued and `false` returned.

If a *pure enum* is serialized to `JSON`, an error will be thrown. If a *backed enum* is serialized to `JSON`, it will be represented by its *scalar value* only, in the appropriate *type*. The behavior of both may be overridden by implementing `JsonSerializable`.

For `print_r()`, the output of an *enum case* is slightly different from *objects* to minimize confusion.

```php
<?php

enum Foo {
    case Bar;
}

enum Baz: int {
    case Beep = 5;
}

print_r(Foo::Bar);
print_r(Baz::Beep);

/* Produces

Foo Enum (
    [name] => Bar
)
Baz Enum:int {
    [name] => Beep
    [value] => 5
}
*/
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.serialization.php)

## Why enums aren't extendable

Classes have *contracts* on their *methods*:

```php
<?php

class A {}
class B extends A {}

function foo(A $a) {}

function bar(B $b) {
    foo($b);
}
?>
```

This code is *type-safe*, as `B` follows the *contract* of `A`, and through the magic of *co/contra-variance*, any expectation one may have of the methods will be preserved, exceptions excepted.

*Enums* have contracts on their *cases*, not *methods*:

```php
<?php

enum ErrorCode {
    case SOMETHING_BROKE;
}

function quux(ErrorCode $errorCode)
{
    // When written, this code appears to cover all cases
    match ($errorCode) {
        ErrorCode::SOMETHING_BROKE => true,
    };
}

?>
```

The *`match` statement* in the function `quux` can be *static* analyzed to cover all of the *cases* in `ErrorCode`.

But imagine it was allowed to extend *enums*:

```php
<?php

// Thought experiment code where enums are not final.
// Note, this won't actually work in PHP.
enum MoreErrorCode extends ErrorCode {
    case PEBKAC;
}

function fot(MoreErrorCode $errorCode) {
    quux($errorCode);
}

fot(MoreErrorCode::PEBKAC);

?>
```

Under normal *inheritance* rules, a *class* that *extends* another will pass the *type check*.

The problem would be that the *`match` statement* in `quux()` no longer covers all the *cases*. Because it doesn't know about `MoreErrorCode::PEBKAC` the `match` will throw an *exception*.

Because of this *enums* are *final* and can't be *extended*.

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.object-differences.inheritance.php)

## Examples

*Example: Basic limited values*

```php
<?php

enum SortOrder
{
    case Asc;
    case Desc;
}

function query($fields, $filter, SortOrder $order = SortOrder::Asc)
{
     /* ... */
}
?>
```

The `query()` function can now proceed safe in the knowledge that `$order` is guaranteed to be either `SortOrder::Asc` or `SortOrder::Desc`. Any other value would have resulted in a `TypeError`, so no further error checking or testing is needed.

*Example: Advanced exclusive values*

```php
<?php

enum UserStatus: string
{
    case Pending = 'P';
    case Active = 'A';
    case Suspended = 'S';
    case CanceledByUser = 'C';

    public function label(): string
    {
        return match($this) {
            self::Pending => 'Pending',
            self::Active => 'Active',
            self::Suspended => 'Suspended',
            self::CanceledByUser => 'Canceled by user',
        };
    }
}
?>
```

In this example, a user's status may be one of, and exclusively, `UserStatus::Pending`, `UserStatus::Active`, `UserStatus::Suspended`, or `UserStatus::CanceledByUser`. A function can type a parameter against UserStatus and then only accept those four values, period.

All four values have a `label()` method, which returns a human-readable string. That string is independent of the "machine name" scalar equivalent string, which can be used in, for example, a database field or an HTML select box.

```php
<?php

foreach (UserStatus::cases() as $case) {
    printf('<option value="%s">%s</option>\n', $case->value, $case->label());
}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.enumerations.examples.php)

## Examples

*Example: Basic usage*

```php
<?php

enum status
{
  case draft;
  case pending;
  case published;
  case soft_deleted;
  case restored;
  case deleted;
  case testing;
  case revising;
  case accepted;
}

print("status draft: ");
print_r(status::draft);
print("status pending: ");
print_r(status::pending);
print("status published: ");
print_r(status::published);
print("status soft_deleted: ");
print_r(status::soft_deleted);
print("status restored: ");
print_r(status::restored);
print("status deleted: ");
print_r(status::deleted);
print("status testing: ");
print_r(status::testing);
print("status revising: ");
print_r(status::revising);
print("status accepted: ");
print_r(status::accepted);

print("\n");

$post_status = status::published;
print("post_status: ");
print_r($post_status);
$post_status = status::testing;
print("post_status: ");
print_r($post_status);

print("\n");

```

**View**:
[Example](../../../../../example/code/builtin_types/compound/enums/enum.php)

**Execute**:
* [OnlinePHP]()
* [OneCompiler]()

**Result**:

```
status draft: status Enum
(
    [name] => draft
)
status pending: status Enum
(
    [name] => pending
)
status published: status Enum
(
    [name] => published
)
status soft_deleted: status Enum
(
    [name] => soft_deleted
)
status restored: status Enum
(
    [name] => restored
)
status deleted: status Enum
(
    [name] => deleted
)
status testing: status Enum
(
    [name] => testing
)
status revising: status Enum
(
    [name] => revising
)
status accepted: status Enum
(
    [name] => accepted
)

post_status: status Enum
(
    [name] => published
)
post_status: status Enum
(
    [name] => testing
)

```

[▵ Up](#enumerations)
[⌂ Home](../../../README.md)
[▲ Previous: Objects](../objects/objects.md)
