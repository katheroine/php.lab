[⌂ Home](../../../README.md)
[▲ Previous: Generators](../generators/generators.md)
[▼ Next: Classes](../classes_interfaces_traits/classes/classes.md)

# Fibers

***Fibers*** represent *full-stack, interruptible functions*. *Fibers* may be *suspended* from anywhere in the *call-stack*, *pausing* *execution* within the *fiber* until the *fiber* is *resumed* at a later time.

*Fibers* *pause* the entire *execution stack*, so the direct caller of the *function* does not need to change how it invokes the *function*.

*Execution* may be *interrupted* anywhere in the *call stack* using `Fiber::suspend()` (that is, the call to `Fiber::suspend()` may be in a deeply *nested function* or not even exist at all).

Unlike *stack-less generators*, each *fiber* has its own *call stack*, allowing them to be *paused* within deeply *nested function calls*. A *function* *declaring* an *interruption point* (that is, calling `Fiber::suspend()`) need not change its *return type*, unlike a *function* using `yield` which must return a *generator instance*.

*Fibers* can be *suspended* in any *function call*, including those called from within the PHP VM, such as *functions* provided to `array_map()` or *methods* called by `foreach` on an `Iterator` *object*.

Once *suspended*, *execution* of the *fiber* may be *resumed* with any value using *Fiber::resume()* or by *throwing* an *exception* into the *fiber* using `Fiber::throw()`. The *value* is *returned* (or *exception thrown*) from `Fiber::suspend()`.

Note: Prior to PHP 8.4.0, switching *fibers* during the *execution* of an *object destructor* was not allowed.

*Example: Basic usage*

```php
<?php
$fiber = new Fiber(function (): void {
   $value = Fiber::suspend('fiber');
   echo "Value used to resume fiber: ", $value, PHP_EOL;
});

$value = $fiber->start();

echo "Value from fiber suspending: ", $value, PHP_EOL;

$fiber->resume('test');
?>
```

The above example will output:

```
Value from fiber suspending: fiber
Value used to resume fiber: test
```

-- [PHP Reference](https://www.php.net/manual/en/language.fibers.php)

[▵ Up](#fibers)
[⌂ Home](../../../README.md)
[▲ Previous: Generators](../generators/generators.md)
[▼ Next: Classes](../classes_interfaces_traits/classes/classes.md)
