# Event dispatcher - PSR-14

[Official documentation](https://www.php-fig.org/psr/psr-14/)

## Event dispatching

**Event Dispatching** is a common and well-tested mechanism to allow developers to inject logic into an application easily and consistently.

The goal of this PSR is to establish a common mechanism for event-based extension and collaboration so that libraries and components may be reused more freely between various applications and frameworks.

Having common interfaces for dispatching and handling events allows developers to create libraries that can interact with many frameworks and other libraries in a common fashion.

Some examples:

* A security framework that will prevent saving/accessing data when a user doesn't have permission.
* A common full page caching system.
* Libraries that extend other libraries, regardless of what framework they are both integrated into.
* A logging package to track all actions taken within the application

**Event** - An *Event* is a message produced by an *Emitter*. It may be any arbitrary PHP object.

**Emitter** - An *Emitter* is any arbitrary code that wishes to dispatch an *Event*. This is also known as the "calling code". It is not represented by any particular data structure but refers to the use case.

**Listener** - A *Listener* is any PHP callable that expects to be passed an *Event*. Zero or more *Listeners* may be passed the same *Event*. A *Listener* MAY enqueue some other asynchronous behavior if it so chooses.

**Dispatcher** - A *Dispatcher* is a service object that is given an *Event* object by an *Emitter*. The *Dispatcher* is responsible for ensuring that the *Event* is passed to all relevant *Listeners*, but MUST defer determining the responsible *Listeners* to a *Listener Provider*.

**Listener Provider** - A *Listener Provider* is responsible for determining what *Listeners* are relevant for a given *Event*, but MUST NOT call the *Listeners* itself. A *Listener Provider* may specify zero or more relevant *Listeners*.
