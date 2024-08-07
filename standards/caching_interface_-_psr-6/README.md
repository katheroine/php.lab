# Caching interface - PSR-6

[Official documentation](https://www.php-fig.org/psr/psr-6/)

## Caching

**Caching** is a common way to *improve the performance* of any project, making caching libraries one of the most common features of many frameworks and libraries. This has lead to a situation where many libraries build their own caching libraries, with various levels of functionality. These differences are causing developers to have to learn multiple systems which may or may not provide the functionality they need. In addition, the developers of caching libraries themselves face a choice between only supporting a limited number of frameworks or creating a large number of adapter classes.

A common interface for caching systems will solve these problems. Library and framework developers can count on the caching systems working the way they're expecting, while the developers of caching systems will only have to implement a single set of interfaces rather than a whole assortment of adapters.

The goal of this PSR is to allow developers to create cache-aware libraries that can be integrated into existing frameworks and systems without the need for custom development.

**Calling Library** - The library or code that actually needs the cache services. This library will utilize caching services that implement this standard's interfaces, but will otherwise have no knowledge of the implementation of those caching services.

**Implementing Library** - This library is responsible for implementing this standard in order to provide caching services to any *Calling Library*. The *Implementing Library* MUST provide classes which implement the `Cache\CacheItemPoolInterface` and `Cache\CacheItemInterface` interfaces. Implementing Libraries MUST support at minimum *TTL* functionality as described below with whole-second granularity.

**TTL** - *The Time To Live* (**TTL**) of an item is the amount of time between when that item is stored and it is considered stale. The *TTL* is normally defined by an `integer` representing time in seconds, or a `DateInterval` object.

An item with a `300` second *TTL* stored at `1:30:00` will have an expiration of `1:35:00`.

***
*Implementing Libraries* MAY expire an item before its requested *Expiration Time*, but MUST treat an item as expired once its *Expiration Time* is reached.
If a calling library asks for an item to be saved but does not specify an expiration time, or specifies a null expiration time or *TTL*, an *Implementing Library* MAY use a configured *default duration*.
If no *default duration* has been set, the *Implementing Library* MUST interpret that as a request to cache the item forever, or for as long as the underlying implementation supports.
***

**Expiration** - The actual time when an item is set to go stale. This is typically calculated by adding the *TTL* to the time when an object is stored, but may also be explicitly set with `DateTime` object.

**Key** - A `string` of at least one character that uniquely identifies a cached item. *Implementing Libraries* MUST support keys consisting of the characters `A-Z`, `a-z`, `0-9`, `_`, and `.` in any order in `UTF-8` encoding and a length of up to `64` characters. Implementing libraries MAY support additional characters and encodings or longer lengths, but must support at least that minimum. Libraries are responsible for their own escaping of key strings as appropriate, but MUST be able to return the original unmodified key string. The following characters are reserved for future extensions and MUST NOT be supported by implementing libraries: `{}()/\@`:

**Hit** - A *cache hit* occurs when a *Calling Library* requests an *item* by *key* and a matching value is found for that key, and that value has not expired, and the value is not invalid for some other reason. *Calling Libraries* SHOULD make sure to verify `isHit()` on all `get()` calls.

**Miss** - A *cache miss* is the opposite of a *cache hit*. A *cache miss* occurs when a *Calling Library* requests an *item* by *key* and that value not found for that *key*, or the value was found but has expired, or the value is invalid for some other reason. An expired value MUST always be considered a cache miss.

**Deferred** - A *deferred cache* save indicates that *a cache item may not be persisted immediately by the pool*. A *Pool* object MAY delay persisting a deferred *cache item* in order to take advantage of bulk-set operations supported by some storage engines. A *Pool* MUST ensure that any deferred cache items are eventually persisted and data is not lost, and MAY persist them before a *Calling Library* requests that they be persisted. When a *Calling Library* invokes the `commit()` method all outstanding deferred items MUST be persisted. An *Implementing Library* MAY use whatever logic is appropriate to determine when to persist deferred items, such as an object destructor, persisting all on `save()`, a timeout or max-items check or any other appropriate logic. Requests for a cache item that has been deferred MUST return the deferred but not-yet-persisted item.

## Data

Implementing libraries MUST support all serializable PHP data types, including:

* **`Strings`** - Character `strings` of arbitrary size in any PHP-compatible encoding.
* **`Integers`** - All `integers` of any size supported by PHP, up to `64-bit` signed.
* **`Floats`** - All `signed floating point` values.
* **`Booleans`** - `True` and `False`.
* **`Null`** - The `null` value.
* **`Arrays`** - Indexed, associative and multidimensional `arrays` of arbitrary depth.
* **`Objects`** - Any object that supports lossless serialization and deserialization such that `$o == unserialize(serialize($o))`. Objects MAY leverage PHP's Serializable interface, `__sleep()` or `__wakeup()` magic methods, or similar language functionality if appropriate.
All data passed into the Implementing Library MUST be returned exactly as passed. That includes the variable type. That is, it is an error to return `(string) 5` if `(int) 5` was the value saved. Implementing Libraries MAY use PHP's `serialize()`/`unserialize()` functions internally but are not required to do so. Compatibility with them is simply used as a baseline for acceptable object values.

If it is not possible to return the exact saved value for any reason, implementing libraries MUST respond with a cache miss rather than corrupted data.

## Pool

The **Pool** represents a collection of items in a caching system. The *pool* is a logical *Repository* of all *items* it contains. All cacheable *items* are retrieved from the *Pool* as an `Item` object, and all interaction with the whole universe of cached objects happens through the *Pool*.

## Items

An **Item** represents a single *key/value pair* within a *Pool*. The *key* is the primary unique identifier for an *Item* and MUST be immutable. The Value MAY be changed at any time.

## Error handling

While caching is often an important part of application performance, it should never be a critical part of application functionality. Thus, an error in a cache system SHOULD NOT result in application failure. For that reason, *Implementing Libraries* MUST NOT throw exceptions other than those defined by the interface, and SHOULD trap any errors or exceptions triggered by an underlying data store and not allow them to bubble.

An Implementing Library SHOULD log such errors or otherwise report them to an administrator as appropriate.

If a Calling Library requests that one or more Items be deleted, or that a pool be cleared, it MUST NOT be considered an error condition if the specified key does not exist. The post-condition is the same (the key does not exist, or the pool is empty), thus there is no error condition.

