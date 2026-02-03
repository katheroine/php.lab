[⌂ Home](../../../README.md)
[▲ Previous: Constructors and destructors](./constructors_and_destructors.md)
[▼ Next: Inheritance](./inheritance.md)

# Objects

## Object iteration

PHP provides a way for *objects* to be *defined* so it is possible to iterate through a *list of items*, with, for example a *`foreach` statement*. By default, all *visible properties* will be used for the *iteration*.

*Example: Simple object iteration*

```php
<?php
class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible() {
       echo "MyClass::iterateVisible:\n";
       foreach ($this as $key => $value) {
           print "$key => $value\n";
       }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";


$class->iterateVisible();

?>
```

The above example will output:

```
var1 => value 1
var2 => value 2
var3 => value 3

MyClass::iterateVisible:
var1 => value 1
var2 => value 2
var3 => value 3
protected => protected var
private => private var
```

As the output shows, the `foreach` iterated through all of the *visible properties* that could be accessed.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.iterations.php)

## Comparing objects

When using the *comparison operator* (`==`), *object variables* are compared in a simple manner, namely: Two *object instances* are *equal* if they have the same *attributes* and *values* (*values* are compared with `==`), and are *instances* of the same *class*.

When using the identity operator (`===`), *object variables* are identical if and only if they refer to the same *instance* of the same *class*.

An example will clarify these rules.

*Example: Example of object comparison*

```php
<?php
function bool2str($bool)
{
    if ($bool === false) {
        return 'FALSE';
    } else {
        return 'TRUE';
    }
}

function compareObjects(&$o1, &$o2)
{
    echo 'o1 == o2 : ' . bool2str($o1 == $o2) . "\n";
    echo 'o1 != o2 : ' . bool2str($o1 != $o2) . "\n";
    echo 'o1 === o2 : ' . bool2str($o1 === $o2) . "\n";
    echo 'o1 !== o2 : ' . bool2str($o1 !== $o2) . "\n";
}

class Flag
{
    public $flag;

    function __construct($flag = true) {
        $this->flag = $flag;
    }
}

class OtherFlag
{
    public $flag;

    function __construct($flag = true) {
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Two instances of the same class\n";
compareObjects($o, $p);

echo "\nTwo references to the same instance\n";
compareObjects($o, $q);

echo "\nInstances of two different classes\n";
compareObjects($o, $r);
?>
```

The above example will output:

```
Two instances of the same class
o1 == o2 : TRUE
o1 != o2 : FALSE
o1 === o2 : FALSE
o1 !== o2 : TRUE

Two references to the same instance
o1 == o2 : TRUE
o1 != o2 : FALSE
o1 === o2 : TRUE
o1 !== o2 : FALSE

Instances of two different classes
o1 == o2 : FALSE
o1 != o2 : TRUE
o1 === o2 : FALSE
o1 !== o2 : TRUE
```

Note:

Extensions can define own rules for their objects comparison (==).

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.object-comparison.php)

## Serializing objects - objects in sessions

`serialize()` returns a *string* containing a *byte-stream* representation of any *value* that can be stored in PHP. `unserialize()` can use this string to recreate the original *variable values*. Using `serialize` to save an *object* will save all *variables* in an *object*. The *methods* in an object will not be saved, only the *name* of the *class*.

In order to be able to `unserialize()` an *object*, the *class* of that *object* needs to be *defined*. That is, if you have an *object* of *class* `A` and *serialize* this, you'll get a *string* that refers to *class* `A` and contains all *values* of *variables* contained in it. If you want to be able to `unserialize` this in another file, an *object* of *class* `A`, the *definition* of *class* `A` must be present in that file first. This can be done for example by storing the *class definition* of *class* `A` in an *include file* and including this file or making use of the `spl_autoload_register()` function.

```php
<?php
// A.php:

  class A {
      public $one = 1;

      public function show_one() {
          echo $this->one;
      }
  }

// page1.php:

  include "A.php";

  $a = new A;
  $s = serialize($a);
  // store $s somewhere where page2.php can find it.
  file_put_contents('store', $s);

// page2.php:

  // this is needed for the unserialize to work properly.
  include "A.php";

  $s = file_get_contents('store');
  $a = unserialize($s);

  // now use the function show_one() of the $a object.
  $a->show_one();
?>
```

It is strongly recommended that if an application *serializes* *objects*, for use later in the application, that the application includes the *class definition* for that *object* throughout the application. Not doing so might result in an *object* being *unserialized* without a *class definition*, which will result in PHP giving the *object* a *class* of `__PHP_Incomplete_Class_Name`, which has no *methods* and would render the *object* useless.

So if in the example above `$a` became part of a session by adding a new *key* to the `$_SESSION` *superglobal array*, you should include the file `A.php` on all of your pages, not only `page1.php` and `page2.php`.

Beyond the above advice, note that you can also hook into the serialization and unserialization events on an object using the `__sleep()` and __wakeup() methods. Using __sleep() also allows you to only serialize a subset of the object's properties.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.serialization.php)

## Object cloning

Creating a copy of an *object* with fully replicated *properties* is not always the wanted behavior. A good example of the need for *copy constructors*, is if you have an object which represents a GTK window and the object holds the resource of this GTK window, when you create a duplicate you might want to create a new window with the same properties and have the new object hold the resource of the new window. Another example is if your *object* holds a *reference* to another *object* which it uses and when you replicate the parent *object* you want to create a new *instance* of this other *object* so that the replica has its own separate copy.

An *object* copy is created by using the `clone` *keyword* (which calls the object's `__clone()` *method* if possible).

`$copy_of_object = clone $object;`

When an *object* is *cloned*, PHP will perform a shallow copy of all of the *object's properties*. Any properties that are references to other variables will remain references.

```
__clone(): void
```

Once the *cloning* is complete, if a `__clone()` *method* is defined, then the newly created object's `__clone()` *method* will be called, to allow any necessary properties that need to be changed.

*Example: Cloning an object*

```php
<?php
class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print "Original Object:\n";
print_r($obj);

print "Cloned Object:\n";
print_r($obj2);

?>
```

The above example will output:

```
Original Object:
MyCloneable Object
(
    [object1] => SubObject Object
        (
            [instance] => 1
        )

    [object2] => SubObject Object
        (
            [instance] => 2
        )

)
Cloned Object:
MyCloneable Object
(
    [object1] => SubObject Object
        (
            [instance] => 3
        )

    [object2] => SubObject Object
        (
            [instance] => 2
        )

)
```

It is possible to access a *member* of a freshly *cloned object* in a single *expression*:

*Example: Access member of freshly cloned object*

```php
<?php
$dateTime = new DateTime();
echo (clone $dateTime)->format('Y');
?>
```

The above example will output something similar to:

```
2016
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.cloning.php)

## Objects and references

One of the key-points of PHP OOP that is often mentioned is that "objects are passed by references by default". This is not completely true. This section rectifies that general thought using some examples.

A PHP *reference* is an *alias*, which allows two different *variables* to write to the same *value*. In PHP, an *object variable* doesn't contain the *object* itself as *value*. It only contains an *object identifier* which allows *object accessors* to find the actual *object*. When an object is sent by argument, returned or assigned to another variable, the different variables are not aliases: they hold a copy of the identifier, which points to the same *object*.

*Example: References and objects*

```php
<?php
class A {
    public $foo = 1;
}

$a = new A;
$b = $a;     // $a and $b are copies of the same identifier
             // ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo."\n";


$c = new A;
$d = &$c;    // $c and $d are references
             // ($c,$d) = <id>

$d->foo = 2;
echo $c->foo."\n";


$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo."\n";

?>
```

The above example will output:

```
2
2
2
```

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.references.php)

## Lazy objects

A *lazy object* is an object whose initialization is *deferred* until its *state* is *observed* or *modified*. Some use-case examples include *dependency injection components* that provide *lazy services* fully initialized only if needed, ORMs providing *lazy entities* that *hydrate* themselves from the *database* only when accessed, or a *JSON parser* that delays *parsing* until elements are *accessed*.

Two *lazy object strategies* are supported: *ghost objects* and *virtual proxies*, hereafter referred to as *lazy ghosts* and *lazy proxies*. In both strategies, the *lazy object* is attached to an *initializer* or *factory* that is called automatically when its *state* is *observed* or *modified* for the first time. From an abstraction point of view, *lazy ghost objects* are indistinguishable from *non-lazy* ones: they can be used without knowing they are *lazy*, allowing them to be passed to and used by code that is unaware of laziness. *Lazy proxies* are similarly transparent, but care must be taken when their *identity* is used, as the *proxy* and its real *instance* have different *identities*.

Note: Version Information

Lazy objects were introduced in PHP 8.4.

### Creating lazy objects

It is possible to create a *lazy instance* of any user *defined class* or the `stdClass` *class* (other *internal classes* are not supported), or to reset an *instance* of these classes to make it *lazy*. The entry points for creating a *lazy object* are the `ReflectionClass::newLazyGhost()` and `ReflectionClass::newLazyProxy()` methods.

Both *methods* accept a *function* that is called when the *object* requires *initialization*. The function's expected behavior varies depending on the strategy in use, as described in the reference documentation for each *method*.

*Example: Creating a lazy ghost*

```php
<?php
class Example
{
    public function __construct(public int $prop)
    {
        echo __METHOD__, "\n";
    }
}

$reflector = new ReflectionClass(Example::class);
$lazyObject = $reflector->newLazyGhost(function (Example $object) {
    // Initialize object in-place
    $object->__construct(1);
});

var_dump($lazyObject);
var_dump(get_class($lazyObject));

// Triggers initialization
var_dump($lazyObject->prop);
?>
```

The above example will output:

```
lazy ghost object(Example)#3 (0) {
["prop"]=>
uninitialized(int)
}
string(7) "Example"
Example::__construct
int(1)
```

*Example: Creating a lazy proxy*

```php
<?php
class Example
{
    public function __construct(public int $prop)
    {
        echo __METHOD__, "\n";
    }
}

$reflector = new ReflectionClass(Example::class);
$lazyObject = $reflector->newLazyProxy(function (Example $object) {
    // Create and return the real instance
    return new Example(1);
});

var_dump($lazyObject);
var_dump(get_class($lazyObject));

// Triggers initialization
var_dump($lazyObject->prop);
?>
```

The above example will output:

```
lazy proxy object(Example)#3 (0) {
  ["prop"]=>
  uninitialized(int)
}
string(7) "Example"
Example::__construct
int(1)
```

Any *access* to *properties* of a *lazy object* triggers its *initialization* (including via `ReflectionProperty`). However, certain *properties* might be known in advance and should not trigger *initialization* when accessed:

*Example: Initializing properties eagerly*

```php
<?php
class BlogPost
{
    public function __construct(
        public int $id,
        public string $title,
        public string $content,
    ) { }
}

$reflector = new ReflectionClass(BlogPost::class);

$post = $reflector->newLazyGhost(function ($post) {
    $data = fetch_from_store($post->id);
    $post->__construct($data['id'], $data['title'], $data['content']);
});

// Without this line, the following call to ReflectionProperty::setValue() would
// trigger initialization.
$reflector->getProperty('id')->skipLazyInitialization($post);
$reflector->getProperty('id')->setValue($post, 123);

// Alternatively, one can use this directly:
$reflector->getProperty('id')->setRawValueWithoutLazyInitialization($post, 123);

// The id property can be accessed without triggering initialization
var_dump($post->id);
?>
```

The `ReflectionProperty::skipLazyInitialization()` and `ReflectionProperty::setRawValueWithoutLazyInitialization()` *methods* offer ways to bypass *lazy-initialization* when *accessing* a *property*.

### About lazy object strategies

*Lazy ghosts* are *objects* that *initialize* in-place and, once *initialized*, are indistinguishable from an *object* that was never *lazy*. This strategy is suitable when we control both the *instantiation* and *initialization* of the *object*, making it unsuitable if either of these is managed by another party.

*Lazy proxies*, once initialized, act as *proxies* to a real *instance*: any operation on an initialized *lazy proxy* is forwarded to the real *instance*. The creation of the real *instance* can be *delegated* to another party, making this strategy useful in cases where *lazy ghosts* are unsuitable. Although *lazy proxies* are nearly as transparent as *lazy ghosts*, caution is needed when their *identity* is used, as the *proxy* and its real *instance* have distinct *identities*.

### Lifecycle of lazy objects

*Objects* can be made *lazy* at *instantiation* time using `ReflectionClass::newLazyGhost()` or `ReflectionClass::newLazyProxy()`, or after *instantiation* by using `ReflectionClass::resetAsLazyGhost()` or `ReflectionClass::resetAsLazyProxy()`. Following this, a *lazy object* can become *initialized* through one of the following operations:

* Interacting with the *object* in a way that triggers *automatic initialization*.
* Marking all its *properties* as *non-lazy* using `ReflectionProperty::skipLazyInitialization()` or `ReflectionProperty::setRawValueWithoutLazyInitialization()`.
* Calling explicitly `ReflectionClass::initializeLazyObject()` or `ReflectionClass::markLazyObjectAsInitialized()`.

As *lazy objects* become initialized when all their *properties* are marked *non-lazy*, the above methods will not mark an *object* as *lazy* if no *properties* could be marked as *lazy*.

### Initialization triggers

*Lazy objects* are designed to be fully transparent to their consumers, so normal operations that *observe* or *modify* the *object's state* will automatically trigger *initialization* before the operation is performed. This includes, but is not limited to, the following operations:

* Reading or writing a *property*.
* Testing if a *property* is set or unsetting it.
* Accessing or modifying a *property* via `ReflectionProperty::getValue()`, `ReflectionProperty::getRawValue()`, `ReflectionProperty::setValue()`, or `ReflectionProperty::setRawValue()`.
* Listing *properties* with `ReflectionObject::getProperties()`, `ReflectionObject::getProperty()`, `get_object_vars()`.
* *Iterating* over *properties* of an *object* that does not implement `Iterator` or `IteratorAggregate` using `foreach`.
* *Serializing* the *object* with `serialize()`, `json_encode()`, etc.
* *Cloning* the object.

Method calls that do not *access* the *object state* will not trigger *initialization*. Similarly, interactions with the object that invoke magic methods or hook functions will not trigger initialization if these methods or functions do not access the object's state.

#### Non-triggering operations

The following specific *methods* or low-level operations allow *access* or *modification* of *lazy objects* without triggering *initialization*:

* Marking *properties* as *non-lazy* with `ReflectionProperty::skipLazyInitialization()` or `ReflectionProperty::setRawValueWithoutLazyInitialization()`.
* Retrieving the internal representation of *properties* using `get_mangled_object_vars()` or by *casting* the *object* to an *array*.
* Using `serialize()` when `ReflectionClass::SKIP_INITIALIZATION_ON_SERIALIZE` is set, unless `__serialize()` or `__sleep()` trigger *initialization*.
* Calling to `ReflectionObject::__toString()`.
* Using `var_dump()` or `debug_zval_dump()`, unless `__debugInfo()` triggers *initialization*.

### Initialization sequence

This section outlines the sequence of operations performed when *initialization* is triggered, based on the strategy in use.

#### Ghost objects

* The *object* is marked as *non-lazy*.
* *Properties* not initialized with `ReflectionProperty::skipLazyInitialization()` or `ReflectionProperty::setRawValueWithoutLazyInitialization()` are set to their *default values*, if any. At this stage, the *object* resembles one created with `ReflectionClass::newInstanceWithoutConstructor()`, except for already initialized *properties*.
* The *initializer function* is then called with the *object* as its first parameter. The *function* is expected, but not required, to *initialize* the *object state*, and must return `null` or no value. The *object* is no longer *lazy* at this point, so the function can *access* its *properties* directly.

After *initialization*, the *object* is indistinguishable from an *object* that was never *lazy*.

#### Proxy objects

* The *object* is marked as *non-lazy*.
* Unlike *ghost objects*, the properties of the *object* are not modified at this stage.
* The *factory function* is called with the *object* as its first *parameter* and must return a *non-lazy instance* of a compatible *class*.
* The returned *instance* is referred to as the real *instance* and is attached to the *proxy*.
* The *proxy's property values* are discarded as though `unset()` was called.

After *initialization*, accessing any *property* on the proxy will `yield` the same *result* as accessing the corresponding *property* on the real *instance*; all *property accesses* on the *proxy* are forwarded to the real *instance*, including declared, dynamic, non-existing, or properties marked with `ReflectionProperty::skipLazyInitialization()` or `ReflectionProperty::setRawValueWithoutLazyInitialization()`.

The *proxy object* itself is not replaced or substituted for the real instance.

While the *factory* receives the *proxy* as its first *parameter*, it is not expected to *modify* it (modifications are allowed but will be lost during the final *initialization* step). However, the *proxy* can be used for decisions based on the values of *initialized properties*, the *class*, the *object* itself, or its *identity*. For instance, the *initializer* might use an initialized property's value when creating the real *instance*.

### Common behavior

The *scope* and *`$this` context* of the *initializer* or *factory function* remains unchanged, and usual *visibility constraints* apply.

After successful *initialization*, the *initializer* or *factory function* is no longer referenced by the *object* and may be released if it has no other *references*.

If the *initializer* throws an *exception*, the *object state* is reverted to its pre-initialization state and the *object* is marked as *lazy* again. In other words, all effects on the *object* itself are reverted. Other side effects, such as effects on other *objects*, are not reverted. This prevents exposing a partially *initialized instance* in case of failure.

### Cloning

*Cloning* a *lazy object* triggers its *initialization* before the *clone* is created, resulting in an *initialized object*.

For proxy *objects*, both the *proxy* and its real *instance* are *cloned*, and the *clone* of the *proxy* is returned. The `__clone` method is called on the real *instance*, not on the *proxy*. The cloned *proxy* and real *instance* are linked as they are during *initialization*, so *accesses* to the proxy *clone* are forwarded to the real *instance clone*.

This behavior ensures that the *clone* and the original *object* maintain separate *states*. Changes to the original *object* or its *initializer's state* after cloning do not affect the *clone*. Cloning both the *proxy* and its real *instance*, rather than returning a *clone* of the real *instance* alone, ensures that the *clone operation* consistently returns an *object* of the same *class*.

### Destructors

For *lazy ghosts*, the *destructor* is only called if the *object* has been *initialized*. For *proxies*, the *destructor* is only called on the real *instance*, if one exists.

The `ReflectionClass::resetAsLazyGhost()` and `ReflectionClass::resetAsLazyProxy()` methods may invoke the *destructor* of the *object* being reset.

-- [PHP Reference](https://www.php.net/manual/en/language.oop5.lazy-objects.php)

[▵ Up](#objects)
[⌂ Home](../../../README.md)
[▲ Previous: Constructors and destructors](./constructors_and_destructors.md)
[▼ Next: Inheritance](./inheritance.md)
