# Logger interface - PSR-3

[Official documentation](https://www.php-fig.org/psr/psr-3/)

## Log levels

The `LoggerInterface` exposes eight methods to write logs to the eight [RFC 5424](https://datatracker.ietf.org/doc/html/rfc5424) levels:
* `debug`
* `info`
* `notice`
* `warning`
* `error`
* `critical`
* `alert`
* `emergency`

A ninth method, `log`, accepts a *log level* as the first argument. Calling this method with one of the *log level* constants MUST have the same result as calling the level-specific method.

Calling this method with a level not defined by this specification MUST throw a `Psr\Log\InvalidArgumentException` if the implementation does not know about the level.

Users SHOULD NOT use a custom level without knowing for sure the current implementation supports it.

## Message

Every method accepts a `string` as the message, or an object with a `__toString()` method. Implementors MAY have special handling for the passed objects. If that is not the case, implementors MUST cast it to a string.

### Placeholders

The message MAY contain *placeholders* which implementors MAY replace with values from the *context* array.

*Placeholder* names MUST correspond to keys in the *context* array.

*Placeholder* names MUST be delimited with a single opening brace `{` and a single closing brace `}`. There MUST NOT be any whitespace between the delimiters and the placeholder name.

Placeholder names SHOULD be composed only of the characters `A-Z`, `a-z`, `0-9`, underscore `_`, and period `.`. The use of other characters is reserved for future modifications of the placeholders specification.

Implementors MAY use placeholders to implement various escaping strategies and translate logs for display. Users SHOULD NOT pre-escape placeholder values since they can not know in which context the data will be displayed.

## Context

Every method accepts an array as **context** data. This is meant to hold any extraneous information that does not fit well in a string. The array can contain anything.

Implementors MUST ensure they treat context data with as much lenience as possible. A given value in the context MUST NOT throw an exception nor raise any php error, warning or notice.

If an Exception object is passed in the context data, it MUST be in the 'exception' key. Logging exceptions is a common pattern and this allows implementors to extract a stack trace from the exception when the log backend supports it. Implementors MUST still verify that the 'exception' key is actually an Exception before using it as such, as it MAY contain anything.

## Helper classes and interfaces

* The **`Psr\Log\AbstractLogger`** class lets you implement the `LoggerInterface` very easily by extending it and implementing the generic `log` method. The other eight methods are forwarding the message and context to it.

* Similarly, using the **`Psr\Log\LoggerTrait`** only requires you to implement the generic `log` method. Note that since traits can not implement interfaces, in this case you still have to implement `LoggerInterface`.

* The **`Psr\Log\NullLogger`** is provided together with the interface. It MAY be used by users of the interface to provide a fall-back "black hole" implementation if no logger is given to them. However, conditional logging may be a better approach if context data creation is expensive.

* The **`Psr\Log\LoggerAwareInterface`** only contains a `setLogger(LoggerInterface $logger)` method and can be used by frameworks to auto-wire arbitrary instances with a logger.

* The **`Psr\Log\LoggerAwareTrait`** trait can be used to implement the equivalent interface easily in any class. It gives you access to `$this->logger`.

* The **`Psr\Log\LogLevel`** class holds constants for the eight *log levels*.
