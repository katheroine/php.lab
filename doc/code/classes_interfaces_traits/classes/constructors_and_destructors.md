[⌂ Home](../../../README.md)
[▲ Previous: Magic methods](./magic_methods.md)
[▼ Next: Objects](./objects.md)

# Constructors and destructors

*Example: Constructor and destructor*

```php
<?php

class SomeClass
{
    function __construct()
    {
        print("Constructor is running...\n");
    }

    function __destruct()
    {
        print("Destructor is running...\n");
    }

    function action() : void
    {
        print("Some action is performing...\n");
    }
}

print("The object will be created now.\n");

$someObject = new SomeClass();
$someObject->action();

print("The program will end now.\n");

```

**Result (PHP 8.4)**:

```
The object will be created now.
Constructor is running...
Some action is performing...
The program will end now.
Destructor is running...
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor_and_destructor.php)

## Constructor

```
__construct(mixed ...$values = ""): void
```

PHP allows developers to declare *constructor methods* for *classes*. *Classes* which have a *constructor method* call this method on each newly-created *object*, so it is suitable for any *initialization* that the *object* may need before it is used.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor)

*Example: Constructor*

```php
<?php

class SomeClass
{
    public static $instanceQuantity = 0;

    public string $somePublicProperty;
    protected string $someProtectedProperty;
    private string $somePrivateProperty;

    public function __construct(
        string $somePublicValue = 'some public',
        string $someProtectedValue = 'some protected',
        string $somePrivateValue = 'some private'
    ) {
        print(
            "Magic method __construct\n\n"
        );

        self::$instanceQuantity++;

        $this->somePublicProperty = $somePublicValue;
        $this->someProtectedProperty = $someProtectedValue;
        $this->somePrivateProperty = $somePrivateValue;
    }
}

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

$someObject = new SomeClass();

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass(
    'pear',
    'orange',
    'banana'
);

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

var_dump($otherObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
Instance quantity: 0

Magic method __construct

Instance quantity: 1

object(SomeClass)#1 (3) {
  ["somePublicProperty"]=>
  string(11) "some public"
  ["someProtectedProperty":protected]=>
  string(14) "some protected"
  ["somePrivateProperty":"SomeClass":private]=>
  string(12) "some private"
}

Magic method __construct

Instance quantity: 2

object(SomeClass)#2 (3) {
  ["somePublicProperty"]=>
  string(4) "pear"
  ["someProtectedProperty":protected]=>
  string(6) "orange"
  ["somePrivateProperty":"SomeClass":private]=>
  string(6) "banana"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor.php)

### Old-style constructors

Prior to PHP 8.0.0, *classes* in the *global namespace* will interpret a *method* named the same as the *class* as an *old-style constructor*. That syntax is deprecated, and will result in an `E_DEPRECATED` error but still call that *function* as a *constructor*. If both `__construct()` and a same-name method are defined, `__construct()` will be called.

In *namespaced classes*, or any *class* as of PHP 8.0.0, a *method* named the same as the *class* never has any special meaning.

Always use `__construct()` in new code.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor)

### Arguments

*Constructors* are ordinary *methods* which are called during the *instantiation* of their corresponding *object*. As such, they may define an arbitrary number of *arguments*, which may be *required*, may have a *type*, and may have a *default value*. *Constructor arguments* are called by placing the *arguments* in parentheses after the *class name*.

*Example: Using constructor arguments*

```php
<?php
class Point {
    protected int $x;
    protected int $y;

    public function __construct(int $x, int $y = 0) {
        $this->x = $x;
        $this->y = $y;
    }
}

// Pass both parameters.
$p1 = new Point(4, 5);
// Pass only the required parameter. $y will take its default value of 0.
$p2 = new Point(4);
// With named parameters (as of PHP 8.0):
$p3 = new Point(y: 5, x: 4);
?>
```

If a class has no *constructor*, or the *constructor* has no *required arguments*, the parentheses may be omitted.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor)

*Example: Constructor arguments*

```php
<?php

class SomeClass
{
    public string $somePublicProperty = 'public';
    protected string $someProtectedProperty = 'protected';
    private string $somePrivateProperty = 'private';

    public function __construct(
        string $somePublicValue = 'some public',
        string $someProtectedValue = 'some protected',
        string $somePrivateValue = 'some private'
    ) {
        $this->somePublicProperty = $somePublicValue;
        $this->someProtectedProperty = $someProtectedValue;
        $this->somePrivateProperty = $somePrivateValue;
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (3) {
  ["somePublicProperty"]=>
  string(11) "some public"
  ["someProtectedProperty":protected]=>
  string(14) "some protected"
  ["somePrivateProperty":"SomeClass":private]=>
  string(12) "some private"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor_arguments.php)

### Constructor promotion

As of PHP 8.0.0, *constructor parameters* may also be *promoted* to correspond to an *object property*. It is very common for *constructor parameters* to be *assigned* to a *property* in the *constructor* but otherwise not operated upon. *Constructor promotion* provides a short-hand for that use case. The example above could be rewritten as the following.

*Example: Using constructor property promotion*

```php
<?php
class Point {
    public function __construct(protected int $x, protected int $y = 0) {
    }
}
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)

*Example: Constructor promotion*

```php
<?php

class SomeClass
{
    public function __construct(
        public $somePublicProperty = 'public',
        protected string $someProtectedProperty = 'protected',
        private string $somePrivateProperty = 'private',
        public readonly string $someReadonlyProperty = 'readonly',
    ) {
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass(
    'apple',
    'lemon',
    'banana',
    'mango',
);

var_dump($otherObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (4) {
  ["somePublicProperty"]=>
  string(6) "public"
  ["someProtectedProperty":protected]=>
  string(9) "protected"
  ["somePrivateProperty":"SomeClass":private]=>
  string(7) "private"
  ["someReadonlyProperty"]=>
  string(8) "readonly"
}

object(SomeClass)#2 (4) {
  ["somePublicProperty"]=>
  string(5) "apple"
  ["someProtectedProperty":protected]=>
  string(5) "lemon"
  ["somePrivateProperty":"SomeClass":private]=>
  string(6) "banana"
  ["someReadonlyProperty"]=>
  string(5) "mango"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor_promotion.php)

#### Property modifiers used in constructor promotion

When a *constructor argument* includes a *modifier*, PHP will interpret it as both an *object property* and a *constructor argument*, and assign the *argument value* to the *property*. The *constructor body* may then be empty or may contain other *statements*. Any additional *statements* will be executed after the *argument* values have been *assigned* to the corresponding *properties*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)

Note:

Using a *visibility modifier* (`public`, `protected` or `private`) is the most likely way to apply *property promotion*, but any other single *modifier* (such as `readonly`) will have the same effect.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)

*Example: Constructor promotion property modifiers*

```php
<?php

class SomeClass
{
    function __construct(
        public string $someProperty,
        readonly float $otherProperty = 10.0,
    ) {
    }
}

$someObject = new SomeClass("hello");

var_dump($someObject);
print(PHP_EOL);

print(
    $someObject->someProperty . PHP_EOL
    . $someObject->otherProperty . PHP_EOL
    . PHP_EOL
);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (2) {
  ["someProperty"]=>
  string(5) "hello"
  ["otherProperty"]=>
  float(10)
}

hello
10

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor_promotion_property_modifiers.php)

#### Selective constructor promotion

Not all *arguments* need to be *promoted*. It is possible to mix and match *promoted* and *not-promoted arguments*, in any order. *Promoted arguments* have no impact on code calling the *constructor*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)

*Example: Constructor promotion for not all properties*

```php
<?php

class SomeClass
{
    public $somePublicProperty = 'public';
    protected string $someProtectedProperty = 'protected';

    public function __construct(
        private string $somePrivateProperty = 'private',
        public readonly string $someReadonlyProperty = 'readonly',
    ) {
    }
}

$someObject = new SomeClass();

var_dump($someObject);
print(PHP_EOL);

$otherObject = new SomeClass(
    'banana',
    'mango',
);
$otherObject->somePublicProperty = 'lemon';

var_dump($otherObject);
print(PHP_EOL);

```

**Result (PHP 8.4)**:

```
object(SomeClass)#1 (4) {
  ["somePublicProperty"]=>
  string(6) "public"
  ["someProtectedProperty":protected]=>
  string(9) "protected"
  ["somePrivateProperty":"SomeClass":private]=>
  string(7) "private"
  ["someReadonlyProperty"]=>
  string(8) "readonly"
}

object(SomeClass)#2 (4) {
  ["somePublicProperty"]=>
  string(5) "lemon"
  ["someProtectedProperty":protected]=>
  string(9) "protected"
  ["somePrivateProperty":"SomeClass":private]=>
  string(6) "banana"
  ["someReadonlyProperty"]=>
  string(5) "mango"
}

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor_promotion_for_not_all_properties.php)

#### Property type declarations in constructor promotion

Note:

*Object properties* may not be typed *callable* due to engine ambiguity that would introduce. *Promoted arguments*, therefore, may not be *typed callable* either. Any other *type declaration* is permitted, however.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)

*Example: Constructor promotion property type declarations*

```php
<?php

class SomeClass
{
    function __construct(
        public mixed $mixedProperty = null,
        public bool $booleanProperty = true,
        public int $integerProperty = 5,
        public float $floatingPointProperty = 2.4,
        public string $stringProperty = 'hello',
        public array $arrayProperty = [3, 5, 7],
        public iterable $iterableProperty = [
            2 => "Hello, there!",
            'color' => 'orange',
            3.14 => 'PI',
        ],
        public OtherClass $objectProperty = new OtherClass(),
        public ?stdClass $simpleObjectProperty = null,
    )
    {
        $this->simpleObjectProperty = (object) [
            2 => "Hello, there!",
            'color' => 'orange',
            3.14 => 'PI',
        ];
    }
}

class OtherClass
{
}

$someObject = new SomeClass();

print(
    var_export($someObject->mixedProperty, true) . ' (' . gettype($someObject->mixedProperty) . ")\n"
    . var_export($someObject->booleanProperty, true) . ' (' . gettype($someObject->booleanProperty) . ")\n"
    . var_export($someObject->integerProperty, true) . ' (' . gettype($someObject->integerProperty) . ")\n"
    . var_export($someObject->floatingPointProperty, true) . ' (' . gettype($someObject->floatingPointProperty) . ")\n"
    . var_export($someObject->stringProperty, true) . ' (' . gettype($someObject->stringProperty) . ")\n"
    . var_export($someObject->arrayProperty, true) . ' (' . gettype($someObject->arrayProperty) . ")\n"
    . var_export($someObject->iterableProperty, true) . ' (' . gettype($someObject->iterableProperty) . ")\n"
    . var_export($someObject->objectProperty, true) . ' (' . gettype($someObject->objectProperty) . ")\n"
    . var_export($someObject->simpleObjectProperty, true) . ' (' . gettype($someObject->simpleObjectProperty) . ")\n"
);

```

**Result (PHP 8.4)**:

```
NULL (NULL)
true (boolean)
5 (integer)
2.4 (double)
'hello' (string)
array (
  0 => 3,
  1 => 5,
  2 => 7,
) (array)
array (
  2 => 'Hello, there!',
  'color' => 'orange',
  3 => 'PI',
) (array)
\OtherClass::__set_state(array(
)) (object)
(object) array(
   '2' => 'Hello, there!',
   'color' => 'orange',
   '3' => 'PI',
) (object)
```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor_promotion_property_type_declarations.php)

#### Property and argument restrictions in constructor promotions

Note:

As *promoted properties* are desugared to both a *property* as well as a *function parameter*, any and all *naming restrictions* for both *properties* as well as *parameters* apply.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)

#### Default values in constructor promotions

Note:

*Attributes* placed on a *promoted constructor argument* will be replicated to both the *property* and *argument*. *Default values* on a *promoted constructor argument* will be replicated only to the *argument* and not the *property*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion)

### Initializer restrictions

As of PHP 8.1.0, *objects* can be used as *default parameter values*, *static variables*, and *global constants*, as well as in *attribute arguments*. *Objects* can also be passed to `define()` now.

Note:

The use of a *dynamic* or *non-string class name* or an *anonymous class* is not allowed. The use of *argument unpacking* is not allowed. The use of unsupported *expressions* as *arguments* is not allowed.

*Example: Using new in initializers*

```php
<?php

// All allowed:
static $x = new Foo;

const C = new Foo;

function test($param = new Foo) {}

#[AnAttribute(new Foo)]
class Test {
    public function __construct(
        public $prop = new Foo,
    ) {}
}

// All not allowed (compile-time error):
function test(
    $a = new (CLASS_NAME_CONSTANT)(), // dynamic class name
    $b = new class {}, // anonymous class
    $c = new A(...[]), // argument unpacking
    $d = new B($abc), // unsupported constant expression
) {}
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.new)

### Inheritance

Note: *Parent constructors* are not called implicitly if the *child class* defines a *constructor*. In order to run a *parent constructor*, a call to `parent::__construct()` within the *child constructor* is required. If the *child* does not define a *constructor* then it may be inherited from the *parent class* just like a normal *class method* (if it was not declared as *private*).

*Example: Constructors in inheritance*

```php
<?php
class BaseClass {
    function __construct() {
        print "In BaseClass constructor\n";
    }
}

class SubClass extends BaseClass {
    function __construct() {
        parent::__construct();
        print "In SubClass constructor\n";
    }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor)

*Example: Constructor and inheritance*

```php
<?php

class SomeClass
{
    function __construct()
    {
        print("SomeClass constructor\n\n");
    }
}

print("Instantiating SomeClass...\n\n");

new SomeClass();

class OtherClass extends SomeClass
{
}

print("Instantiating OtherClass...\n\n");

new OtherClass();

class AnotherClass extends SomeClass
{
    function __construct()
    {
        print("AnotherClass constructor\n\n");
    }
}

print("Instantiating AnotherClass...\n\n");

new AnotherClass();

class DifferentClass extends SomeClass
{
    function __construct()
    {
        parent::__construct();
        print("DifferentClass constructor\n\n");
    }
}

print("Instantiating DifferentClass...\n\n");

new DifferentClass();

```

**Result (PHP 8.4)**:

```
Instantiating SomeClass...

SomeClass constructor

Instantiating OtherClass...

SomeClass constructor

Instantiating AnotherClass...

AnotherClass constructor

Instantiating DifferentClass...

SomeClass constructor

DifferentClass constructor

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor_and_inheritance.php)

#### Signature compatibility

Unlike other methods, `__construct()` is exempt from the usual *signature compatibility* rules when being extended.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor)

### Private constructor

PHP only supports a *single constructor* per *class*. In some cases, however, it may be desirable to allow an *object* to be *constructed* in different ways with different inputs. The recommended way to do so is by using *static methods* as *constructor wrappers*.

*Example: Using static creation methods*

```php
<?php
$some_json_string = '{ "id": 1004, "name": "Elephpant" }';
$some_xml_string = "<animal><id>1005</id><name>Elephpant</name></animal>";

class Product {

    private ?int $id;
    private ?string $name;

    private function __construct(?int $id = null, ?string $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromBasicData(int $id, string $name): static {
        $new = new static($id, $name);
        return $new;
    }

    public static function fromJson(string $json): static {
        $data = json_decode($json, true);
        return new static($data['id'], $data['name']);
    }

    public static function fromXml(string $xml): static {
        $data = simplexml_load_string($xml);
        $new = new static();
        $new->id = (int) $data->id;
        $new->name = $data->name;
        return $new;
    }
}

$p1 = Product::fromBasicData(5, 'Widget');
$p2 = Product::fromJson($some_json_string);
$p3 = Product::fromXml($some_xml_string);

var_dump($p1, $p2, $p3);
```

The *constructor* may be made *private* or *protected* to prevent it from being called externally. If so, only a *static method* will be able to instantiate the *class*. Because they are in the same *class definition* they have access to *private methods*, even if not of the same *object instance*. The *private constructor* is optional and may or may not make sense depending on the *use case*.

The three *public static methods* then demonstrate different ways of *instantiating* the *object*.

* `fromBasicData()` takes the exact parameters that are needed, then creates the object by calling the constructor and returning the result.
* `fromJson()` accepts a JSON string and does some pre-processing on it itself to convert it into the format desired by the constructor. It then returns the new object.
* `fromXml()` accepts an XML string, preprocesses it, and then creates a bare object. The constructor is still called, but as all of the parameters are optional the method skips them. It then assigns values to the object properties directly before returning the result.

In all three cases, the `static` *keyword* is translated into the name of the *class* the code is in. In this case, `Product`.

## Destructor

```
__destruct(): void
```

PHP possesses a *destructor* concept similar to that of other object-oriented languages, such as C++. The *destructor method* will be called as soon as there are no other *references* to a particular *object*, or in any order during the *shutdown sequence*.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.destructor)

*Example: Destructor*

```php
<?php

class SomeClass
{
    public static $instanceQuantity = 0;

    public function __destruct()
    {
        print(
            "Magic method __destruct\n\n"
        );

        self::$instanceQuantity--;
    }
}

function someLocalSpace()
{
    $someObject = new SomeClass();
    SomeClass::$instanceQuantity++;

    print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

    $otherObject = new SomeClass();
    SomeClass::$instanceQuantity++;

    print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);
}

someLocalSpace();

print('Instance quantity: ' . SomeClass::$instanceQuantity . PHP_EOL . PHP_EOL);

```

**Result (PHP 8.4)**:

```
Instance quantity: 1

Instance quantity: 2

Magic method __destruct

Magic method __destruct

Instance quantity: 0

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/constructor.php)

*Example: Destructor Example*

```php
<?php

class MyDestructableClass
{
    function __construct() {
        print "In constructor\n";
    }

    function __destruct() {
        print "Destroying " . __CLASS__ . "\n";
    }
}

$obj = new MyDestructableClass();
```

### Inheritance

Like *constructors*, *parent destructors* will not be called implicitly by the engine. In order to run a *parent destructor*, one would have to explicitly call `parent::__destruct()` in the *destructor body*. Also like *constructors*, a *child class* may *inherit* the *parent's destructor* if it does not implement one itself.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.destructor)

*Example: Destructor and inheritance*

```php
<?php

class SomeClass
{
    function __destruct()
    {
        print("SomeClass destructor\n\n");
    }
}

function someClassScope()
{
    print("Destroying SomeClass instance...\n\n");

    new SomeClass();
}

someClassScope();

class OtherClass extends SomeClass
{
}

function otherClassScope()
{
    print("Destroying OtherClass instance...\n\n");

    new OtherClass();

}

otherClassScope();

class AnotherClass extends SomeClass
{
    function __destruct()
    {
        print("AnotherClass destructor\n\n");
    }
}

function anotherClassScope()
{
    print("Destroying AnotherClass instance...\n\n");

    new AnotherClass();
}

anotherClassScope();

class DifferentClass extends SomeClass
{
    function __destruct()
    {
        parent::__destruct();
        print("DifferentClass destructor\n\n");
    }
}

function differentClassScope()
{
    print("Destroying DifferentClass instance...\n\n");

    new DifferentClass();
}

differentClassScope();

```

**Result (PHP 8.4)**:

```
Destroying SomeClass instance...

SomeClass destructor

Destroying OtherClass instance...

SomeClass destructor

Destroying AnotherClass instance...

AnotherClass destructor

Destroying DifferentClass instance...

SomeClass destructor

DifferentClass destructor

```

**Source code**:
[Example](../../../../example/code/classes_interfaces_traits/classes/constructors_and_destructors/destructor_and_inheritance.php)

### Destructor calling edge cases

The *destructor* will be called even if script execution is stopped using `exit()`. Calling `exit()` in a *destructor* will prevent the remaining *shutdown routines* from executing.

If a *destructor* creates new *references* to its *object*, it will not be called a second time when the *reference count* reaches zero again or during the *shutdown sequence*.

As of PHP 8.4.0, when *cycle collection* occurs during the execution of a *fiber*, the *destructors* of *objects* scheduled for *collection* are executed in a separate *fiber*, called the `gc_destructor_fiber`. If this *fiber* is suspended, a new one will be created to execute any remaining *destructors*. The previous `gc_destructor_fiber` will no longer be referenced by the *garbage collector* and may be collected if it is not referenced elsewhere. Objects whose *destructor* are *suspended* will not be collected until the *destructor* returns or the *fiber* itself is collected.

Note:

*Destructors* called during the *script shutdown* have *HTTP headers* already sent. The *working directory* in the *script shutdown* phase can be different with some *SAPIs* (e.g. Apache).

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.destructor)

Note:

Attempting to throw an *exception* from a *destructor* (called in the time of script termination) causes a fatal error.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.decon.php)

[▵ Up](#constructors_and_destructors)
[⌂ Home](../../../README.md)
[▲ Previous: Magic methods](./magic_methods.md)
[▼ Next: Objects](./objects.md)
