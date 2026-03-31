[⌂ Home](../../../../README.md)
[▲ Previous: Errors](../../errors_and_exceptions/errors/errors.md)
[▼ Next: Attributes](../../attributes/attributes.md)

# Exceptions

## Definition

> In computing and computer programming, *exception handling* is the process of responding to the occurrence of **exceptions** – anomalous or exceptional conditions requiring special processing – during the *execution* of a program. In general, an *exception* breaks the normal flow of *execution* and executes a pre-registered *exception handler*; the details of how this is done depend on whether it is a hardware or software exception and how the software exception is implemented.
>
> *Exceptions* are defined by different layers of a computer system, and the typical layers are CPU-defined *interrupts*, operating system (OS)-defined *signals*, programming language-defined *exceptions*. Each layer requires different ways of exception handling although they may be interrelated, e.g. a CPU interrupt could be turned into an OS signal. Some *exceptions*, especially hardware ones, may be handled so gracefully that *execution* can resume where it was interrupted.
>
> The definition of an *exception* is based on the observation that each *procedure* has a *precondition*, a set of *circumstances* for which it will terminate "normally". An *exception handling* mechanism allows the *procedure* to raise an *exception* if this *precondition* is violated, for example if the *procedure* has been called on an abnormal set of *arguments*. The *exception handling* mechanism then handles the *exception*.
>
> The *precondition*, and the definition of *exception*, is subjective. The set of "normal" *circumstances* is defined entirely by the programmer, e.g. the programmer may deem division by zero to be undefined, hence an *exception*, or devise some behavior such as returning zero or a special "ZERO DIVIDE" value (circumventing the need for *exceptions*). Common *exceptions* include an invalid *argument* (e.g. value is outside of the domain of a function), an unavailable resource (like a missing file, a network drive error, or out-of-memory errors), or that the routine has detected a normal condition that requires special handling, e.g., attention, end of file. Social pressure is a major influence on the scope of *exceptions* and use of exception-handling mechanisms, i.e. "examples of use, typically found in core libraries, and code examples in technical books, magazine articles, and online discussion forums, and in an organization’s code standards".

*Exception handling* solves the semipredicate problem, in that the mechanism distinguishes normal return values from erroneous ones. In languages without built-in *exception handling* such as C, routines would need to signal the error in some other way, such as the common return code and `errno` pattern. Taking a broad view, *errors* can be considered to be a proper subset of *exceptions*, and explicit *error mechanisms* such as `errno` can be considered (verbose) forms of *exception handling*. The term "exception" is preferred to "error" because it does not imply that anything is wrong - a condition viewed as an *error* by one procedure or programmer may not be viewed that way by another.

-- [Wikipedia](https://en.wikipedia.org/wiki/Exception_handling)

## Description

PHP has an *exception model* similar to that of other programming languages. An *exception* can be *thrown*, and *caught* ("catched") within PHP. Code may be surrounded in a *`try` block*, to facilitate the catching of potential *exceptions*. Each `try` must have at least one corresponding `catch` or `finally` block.

If an *exception* is thrown and its current *function scope* has no *`catch` block*, the exception will "bubble up" the *call stack* to the calling *function* until it finds a matching *`catch` block*. All *`finally` blocks* it encounters along the way will be executed. If the *call stack* is *unwound* all the way to the *global scope* without encountering a matching *`catch` block*, the program will terminate with a fatal error unless a *global exception handler* has been set.

The thrown *object* must be an *instance* of `Throwable`. Trying to throw an *object* that is not will result in a PHP fatal error.

As of PHP 8.0.0, the *`throw` keyword* is an *expression* and may be used in any *expression* context. In prior versions it was a *statement* and was required to be on its own line.

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions)

*Example: Exception*

```php
<?php

class SomeException extends Exception
{
    public mixed $value;

    function __construct(mixed $value)
    {
        $this->value = $value;
        $this->message = "Value has beign given.";
    }
}

class OtherException extends SomeException
{
    function __construct(int $number)
    {
        $this->value = $number;
        $this->message = "Number has beign given.";
    }
}

function someRiskySituation(): void
{
    $input = readline("Input: ");

    if (empty($input)) {
        print("No exception.\n");
    } elseif (!is_numeric($input)) {
        throw new SomeException($input);
    } else {
        throw new OtherException($input);
    }
}

try {
    someRiskySituation();
} catch (OtherException $e) {
    print("Some exception: " . $e->getMessage() . " (" . $e->value . ")\n");
} catch (SomeException $e) {
    print("Other exception: " . $e->getMessage() . " (" . $e->value . ")\n");
} finally {
    print("Will always execute.\n");
}

print("Will also execute (due to exception has been catched).\n");

```

**Result (PHP 8.4)**:

```
Input:
No exception.
Will always execute.
Will also execute (due to exception has been catched).
```

```
Input: 1
Some exception: Number has beign given. (1)
Will always execute.
Will also execute (due to exception has been catched).
```

```
Input: a
Other exception: Value has beign given. (a)
Will always execute.
Will also execute (due to exception has been catched).
```

**Source code**:
[Example](../../../../example/code/errors_and_exceptions/exceptions/exception.php)

## Throwing exception

>>> `throw` expression

*Example: Throwing an exception*

```php
<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Continue execution
echo "Hello World\n";
?>
```

The above example will output:

```
0.2
Caught exception: Division by zero.
Hello World
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

*Example: Throw as an expression*

Only permitted in PHP 8.0.0 and later.

```php
<?php

function test() {
    do_something_risky() or throw new Exception('It did not work');
}

function do_something_risky() {
    return false; // Simulate failure
}

try {
    test();
} catch (Exception $e) {
    print $e->getMessage();
}
?>
```

The above example will output:

```
It did not work
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

*Example: Throwing an exception*

```php
<?php

throw new Exception('The exception has been thrown.');

```

**Result (PHP 8.4)**:

```
PHP Fatal error:  Uncaught Exception: The exception has been thrown. in /projects/php.lab/example/code/errors_and_exceptions/exceptions/throwing_exception.php:3
Stack trace:
#0 {main}
  thrown in /projects/php.lab/example/code/errors_and_exceptions/exceptions/throwing_exception.php on line 3
```

**Source code**:
[Example](../../../../example/code/errors_and_exceptions/exceptions/throwing_exception.php)

*Example: Throwing an defined exception*

```php
<?php

class SomeException extends Exception
{
    public string $name = 'Some exception';

    function __construct()
    {
        $this->message = 'The exception has been thrown.';
    }
}

throw new SomeException();

```

**Result (PHP 8.4)**:

```
PHP Fatal error:  Uncaught SomeException: The exception has been thrown. in /projects/php.lab/example/code/errors_and_exceptions/exceptions/throwing_defined_exception.php:13
Stack trace:
#0 {main}
  thrown in /projects/php.lab/example/code/errors_and_exceptions/exceptions/throwing_defined_exception.php on line 13
```

**Source code**:
[Example](../../../../example/code/errors_and_exceptions/exceptions/throwing_defined_exception.php)

## Catching exception

>>> `catch` block

A *`catch` block* defines how to respond to a thrown *exception*. A *`catch` block* defines one or more *types* of *exception* or *error* it can handle, and optionally a *variable* to which to assign the *exception*. (The *variable* was required prior to PHP 8.0.0.) The first *`catch` block* a thrown *exception* or error encounters that matches the *type* of the thrown *object* will handle the *object*.

Multiple *`catch` blocks* can be used to catch different *classes* of *exceptions*. Normal execution (when no *exception* is thrown within the *`try` block*) will continue after that last *`catch` block* defined in sequence. *Exceptions* can be *thrown* (or *re-thrown*) within a *`catch` block*. If not, execution will continue after the *`catch` block* that was triggered.

When an *exception* is thrown, code following the *statement* will not be executed, and PHP will attempt to find the first matching *`catch` block*. If an *exception* is not caught, a PHP fatal error will be issued with an `"Uncaught Exception ..."` message, unless a handler has been defined with `set_exception_handler()`.

As of PHP 7.1.0, a *`catch` block* may specify multiple *exceptions* using the pipe (`|`) character. This is useful for when different *exceptions* from different class hierarchies are handled the same.

As of PHP 8.0.0, the *variable name* for a caught *exception* is optional. If not specified, the *`catch` block* will still execute but will not have access to the thrown *object*.

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.catch)

*Example: Catching an exception*

```php
<?php

try {
    throw new Exception('The exception has been thrown.');
} catch (Exception $exception) {
    print("The exception has been catched:\n");
    print_r($exception);
}

```

**Result (PHP 8.4)**:

```
The exception has been catched:
Exception Object
(
    [message:protected] => The exception has been thrown.
    [string:Exception:private] =>
    [code:protected] => 0
    [file:protected] => /projects/php.lab/example/code/errors_and_exceptions/exceptions/catching_exception.php
    [line:protected] => 4
    [trace:Exception:private] => Array
        (
        )

    [previous:Exception:private] =>
)
```

**Source code**:
[Example](../../../../example/code/errors_and_exceptions/exceptions/catching_exception.php)

*Example: Catching a defined exception*

```php
<?php

class SomeException extends Exception
{
    public string $name = 'Some exception';

    function __construct()
    {
        $this->message = 'The exception has been thrown.';
    }
}

try {
    throw new SomeException();
} catch (Exception $exception) {
    print("The exception has been catched:\n");
    print_r($exception);
}

```

**Result (PHP 8.4)**:

```
The exception has been catched:
SomeException Object
(
    [message:protected] => The exception has been thrown.
    [string:Exception:private] =>
    [code:protected] => 0
    [file:protected] => /media/storage/repository/php/php.lab/example/code/errors_and_exceptions/exceptions/catching_defined_exception.php
    [line:protected] => 14
    [trace:Exception:private] => Array
        (
        )

    [previous:Exception:private] =>
    [name] => Some exception
)
```

**Source code**:
[Example](../../../../example/code/errors_and_exceptions/exceptions/catching_defined_exception.php)

*Example: Omitting the caught variable*

Only permitted in PHP 8.0.0 and later.

```php
<?php

class SpecificException extends Exception {}

function test() {
    throw new SpecificException('Oopsie');
}

try {
    test();
} catch (SpecificException) {
    print "A SpecificException was thrown, but we don't care about the details.";
}
?>
```

The above example will output:

```
A SpecificException was thrown, but we don't care about the details.
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

*Example: Multi `catch` exception handling*

```php
<?php

class MyException extends Exception { }

class MyOtherException extends Exception { }

class Test {
    public function testing() {
        try {
            throw new MyException();
        } catch (MyException | MyOtherException $e) {
            var_dump(get_class($e));
        }
    }
}

$foo = new Test;
$foo->testing();

?>
```

The above example will output:

```
string(11) "MyException"
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

*Example: Catching various exception types*

```php
<?php

class NumberValueException extends Exception
{
    public int $number;
}

class ZeroException extends NumberValueException
{
    public function __construct(int $number)
    {
        $this->number = $number;
        $this->message = "0 number has beign given.";
    }
}

class OneException extends NumberValueException
{
    public function __construct(int $number)
    {
        $this->number = $number;
        $this->message = "1 number has beign given.";
    }
}

class ThousandException extends NumberValueException
{
    public function __construct(int $number)
    {
        $this->number = $number;
        $this->message = "1000 number has beign given.";
    }
}

function drawNumber()
{
    $number = readline("Give some number: ");

    if ($number == 0) {
        throw new ZeroException($number);
    } elseif ($number == 1) {
        throw new OneException($number);
    } elseif ($number == 1000) {
        throw new ThousandException($number);
    } elseif ($number == 10000) {
        throw new NumberValueException();
    }

    return $number;
}

print("Program begin...\n");

try {
    print("Risky code...\n");

    $number = drawNumber();

    print("Given number " . $number . " didn't case exception throwing.\n");
} catch (ZeroException $e) {
    print("CASE 1: " . $e->getMessage() . " (" . $e->number . ")\n");
} catch (OneException $e) {
    print("CASE 2: " . $e->getMessage() . " (" . $e->number . ")\n");
} catch (ThousandException $e) {
    print("CASE 3: " . $e->getMessage() . " (" . $e->number . ")\n");
} catch (Exception) {
    print("Exception of unknown type catched.\n");
}

print("Program end...\n");

```

**Result (PHP 8.4)**:

```
Program begin...
Risky code...
Give some number:
Given number  didn't case exception throwing.
Program end...
```

```
Program begin...
Risky code...
Give some number: 0
CASE 1: 0 number has beign given. (0)
Program end...
```

```
Program begin...
Risky code...
Give some number: 1
CASE 2: 1 number has beign given. (1)
Program end...
```

```
Program begin...
Risky code...
Give some number: 2
Given number 2 didn't case exception throwing.
Program end...
```

```
Program begin...
Risky code...
Give some number: 1000
CASE 3: 1000 number has beign given. (1000)
Program end...
```

```
Program begin...
Risky code...
Give some number: 10000
Exception of unknown type catched.
Program end...
```

**Source code**:
[Example](../../../../example/code/errors_and_exceptions/exceptions/catching_exceptions_of_various_types.php)

## Code always executed

>>> `finally` block

A *`finally` block* may also be specified after or instead of *`catch` blocks*. Code within the finally block will always be executed after the `try` and `catch` blocks, regardless of whether an *exception* has been thrown, and before normal execution resumes.

One notable interaction is between the *`finally` block* and a *`return` statement*. If a *`return` statement* is encountered inside either the `try` or the `catch` blocks, the *`finally` block* will still be executed. Moreover, the *`return` statement* is evaluated when encountered, but the result will be returned after the *`finally` block* is executed. Additionally, if the *`finally` block* also contains a *`return` statement*, the value from the *`finally` block* is returned.

Another notable interaction is between an *exception* thrown from within a *`try` block*, and an exception thrown from within a *`finally` block*. If both blocks throw an *exception*, then the *exception* thrown from the *`finally` block* will be the one that is propagated, and the *exception* thrown from the *`try` block* will be used as its previous *exception*.

*Example: Exception handling with a `finally` block*

```php
<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "First finally.\n";
}

try {
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "Second finally.\n";
}

// Continue execution
echo "Hello World\n";
?>
```

The above example will output:

```
0.2
First finally.
Caught exception: Division by zero.
Second finally.
Hello World
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

*Example: Interaction between the `finally` block and `return`*

```php
<?php

function test() {
    try {
        throw new Exception('foo');
    } catch (Exception $e) {
        return 'catch';
    } finally {
        return 'finally';
    }
}

echo test();
?>
```

The above example will output:

```
finally
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

## Global exception handler

If an *exception* is allowed to bubble up to the *global scope*, it may be caught by a *global exception handler* if set. The `set_exception_handler()` function can set a *function* that will be called in place of a *`catch` block* if no other block is invoked. The effect is essentially the same as if the entire program were wrapped in a *`try`-`catch` block* with that function as the `catch`.

## Notes

Note:

Internal PHP functions mainly use *error reporting*, only modern object-oriented extensions use *exceptions*. However, *errors* can be easily translated to *exceptions* with `ErrorException`. This technique only works with non-fatal *errors*, however.

*Example: Converting error reporting to exceptions*

```php
<?php
function exceptions_error_handler($severity, $message, $filename, $lineno) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
}

set_error_handler('exceptions_error_handler');
?>
```

Tip

The *Standard PHP Library (SPL)* provides a good number of built-in *exceptions*.

## Examples

*Example: Nested exception*

```php
<?php

class MyException extends Exception { }

class Test {
    public function testing() {
        try {
            try {
                throw new MyException('foo!');
            } catch (MyException $e) {
                // rethrow it
                throw $e;
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

$foo = new Test;
$foo->testing();

?>
```

The above example will output:

```
string(4) "foo!"
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

*Example: Exception in `try` and in `finally`*

```php
<?php

try {
    try {
        throw new Exception(message: 'Third', previous: new Exception('Fourth'));
    } finally {
        throw new Exception(message: 'First', previous: new Exception('Second'));
    }
} catch (Exception $e) {
    var_dump(
        $e->getMessage(),
        $e->getPrevious()->getMessage(),
        $e->getPrevious()->getPrevious()->getMessage(),
        $e->getPrevious()->getPrevious()->getPrevious()->getMessage(),
    );
}
```

The above example will output:

```
string(5) "First"
string(6) "Second"
string(5) "Third"
string(6) "Fourth"
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.php#language.exceptions.examples)

## Extending exceptions

A user-defined *exception class* can be *defined* by *extending* the built-in `Exception` *class*. The *members* and *properties* below, show what is accessible within the *child class* that derives from the built-in `Exception` *class*.

*Example: The built-in `Exception` class*

```php
<?php
class Exception implements Throwable
{
    protected $message = 'Unknown exception';   // exception message
    private   $string;                          // __toString cache
    protected $code = 0;                        // user defined exception code
    protected $file;                            // source filename of exception
    protected $line;                            // source line of exception
    private   $trace;                           // backtrace
    private   $previous;                        // previous exception if nested exception

    public function __construct($message = '', $code = 0, ?Throwable $previous = null);

    final private function __clone();           // Inhibits cloning of exceptions.

    final public  function getMessage();        // message of exception
    final public  function getCode();           // code of exception
    final public  function getFile();           // source filename
    final public  function getLine();           // source line
    final public  function getTrace();          // an array of the backtrace()
    final public  function getPrevious();       // previous exception
    final public  function getTraceAsString();  // formatted string of trace

    // Overrideable
    public function __toString();               // formatted string for display
}
?>
```

If a *class* *extends* the built-in *exception class* and re-defines the *constructor*, it is highly recommended that it also call `parent::__construct()` to ensure all available data has been properly assigned. The `__toString()` method can be *overridden* to provide a custom output when the *object* is presented as a *string*.

Note:

*Exceptions* cannot be *cloned*. Attempting to *clone* an `Exception` will result in a fatal `E_ERROR` error.

*Example: Extending the `Exception` class*

```php
<?php
/**
 * Define a custom exception class
 */
class MyException extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, ?Throwable $previous = null) {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}


/**
 * Create a class to test the exception
 */
class TestException
{
    public $var;

    const THROW_NONE    = 0;
    const THROW_CUSTOM  = 1;
    const THROW_DEFAULT = 2;

    function __construct($avalue = self::THROW_NONE) {

        switch ($avalue) {
            case self::THROW_CUSTOM:
                // throw custom exception
                throw new MyException('1 is an invalid parameter', 5);
                break;

            case self::THROW_DEFAULT:
                // throw default one.
                throw new Exception('2 is not allowed as a parameter', 6);
                break;

            default:
                // No exception, object will be created.
                $this->var = $avalue;
                break;
        }
    }
}


// Example 1
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (MyException $e) {      // Will be caught
    echo "Caught my exception\n", $e;
    $e->customFunction();
} catch (Exception $e) {        // Skipped
    echo "Caught Default Exception\n", $e;
}

// Continue execution
var_dump($o); // Null
echo "\n\n";


// Example 2
try {
    $o = new TestException(TestException::THROW_DEFAULT);
} catch (MyException $e) {      // Doesn't match this type
    echo "Caught my exception\n", $e;
    $e->customFunction();
} catch (Exception $e) {        // Will be caught
    echo "Caught Default Exception\n", $e;
}

// Continue execution
var_dump($o); // Null
echo "\n\n";


// Example 3
try {
    $o = new TestException(TestException::THROW_CUSTOM);
} catch (Exception $e) {        // Will be caught
    echo "Default Exception caught\n", $e;
}

// Continue execution
var_dump($o); // Null
echo "\n\n";


// Example 4
try {
    $o = new TestException();
} catch (Exception $e) {        // Skipped, no exception
    echo "Default Exception caught\n", $e;
}

// Continue execution
var_dump($o); // TestException
echo "\n\n";
?>
```

-- [PHP Reference](https://www.php.net/manual/en/language.exceptions.extending.php)

[▵ Up](#exceptions)
[⌂ Home](../../../../README.md)
[▲ Previous: Errors](../../errors_and_exceptions/errors/errors.md)
[▼ Next: Attributes](../../attributes/attributes.md)
