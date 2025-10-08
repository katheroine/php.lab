# Simple cache - PSR-16

[Official documentation](https://www.php-fig.org/psr/psr-16/)

## Caching

**Caching** is a common way to *improve the performance* of any project, making caching libraries one of the most common features of many frameworks and libraries. Interoperability at this level means libraries can drop their own caching implementations and easily rely on the one given to them by the framework, or another dedicated cache library.

[PSR-6](https://www.php-fig.org/psr/psr-6) solves this problem already, but in a rather formal and verbose way for what the most simple use cases need. This simpler approach aims to build a standardized streamlined interface for common cases. It is independent of PSR-6 but has been designed to make *compatibility with PSR-6* as straightforward as possible.

Definitions for Calling Library, Implementing Library, TTL, Expiration and Key are copied from PSR-6 as the same assumptions are true.

**Calling Library** - The library or code that actually needs the cache services. This library will utilize caching services that implement this standard's interfaces, but will otherwise have no knowledge of the implementation of those caching services.

**Implementing Library** - This library is responsible for implementing this standard in order to provide caching services to any *Calling Library*. The Implementing Library MUST provide a class implementing the `Psr\SimpleCache\CacheInterface` interface. *Implementing Libraries* MUST support at minimum *TTL* functionality as described below with whole-second granularity.

**TTL** - *The Time To Live* (**TTL**) of an item is the amount of time between when that item is stored and it is considered stale. The *TTL* is normally defined by an `integer` representing time in seconds, or a `DateInterval` object.

An item with a `300` second TTL stored at `1:30:00` will have an expiration of `1:35:00`.

***
*Implementing Libraries* MAY expire an item before its requested *Expiration Time*, but MUST treat an item as expired once its *Expiration Time* is reached.
If a calling library asks for an item to be saved but does not specify an expiration time, or specifies a null expiration time or *TTL*, an *Implementing Library* MAY use a configured *default duration*.
If no *default duration* has been set, the *Implementing Library* MUST interpret that as a request to cache the item forever, or for as long as the underlying implementation supports.
If a negative or zero TTL is provided, the item MUST be deleted from the cache if it exists, as it is expired already.
***

*Implementations MAY provide a mechanism for a user to specify a default TTL if one is not specified for a specific cache item.* If no user-specified default is provided implementations MUST default to the maximum legal value allowed by the underlying implementation. If the underlying implementation does not support TTL, the user-specified TTL MUST be silently ignored.

**Expiration** - The actual time when an item is set to go stale. This is calculated by adding the *TTL* to the time when an object is stored.

**Key** - A `string` of at least one character that uniquely identifies a cached item. *Implementing Libraries* MUST support keys consisting of the characters `A-Z`, `a-z`, `0-9`, `_`, and `.` in any order in `UTF-8` encoding and a length of up to `64` characters. *Implementing Libraries* MAY support additional characters and encodings or longer lengths, but MUST support at least that minimum. Libraries are responsible for their own escaping of key strings as appropriate, but MUST be able to return the original unmodified key string. The following characters are reserved for future extensions and MUST NOT be supported by implementing libraries: `{}()/\@:`

**Cache** - An object that implements the `Psr\SimpleCache\CacheInterface` interface.

**Cache Misses** - A cache miss will return `null` and therefore detecting if one stored `null` is not possible. **This is the main deviation from PSR-6's assumptions.**

## Data

Implementing libraries MUST support all serializable PHP data types, including:

* **`Strings`** - Character strings of arbitrary size in any PHP-compatible encoding.
* **`Integers`** - All integers of any size supported by PHP, up to 64-bit signed.
* **`Floats`** - All signed floating point values.
* **`Booleans`** - True and False.
* **`Null`** - The null value (although it will not be distinguishable from a cache miss when reading it back out).
* **`Arrays`** - Indexed, associative and multidimensional arrays of arbitrary depth.
* **`Objects`** - Any object that supports lossless serialization and deserialization such that `$o == unserialize(serialize($o))`. Objects MAY leverage PHP's Serializable interface, `__sleep()` or `__wakeup()` magic methods, or similar language functionality if appropriate.
All data passed into the Implementing Library MUST be returned exactly as passed. That includes the variable type. That is, it is an error to return (string) 5 if (int) 5 was the value saved. Implementing Libraries MAY use PHP's `serialize()`/`unserialize()` functions internally but are not required to do so. Compatibility with them is simply used as a baseline for acceptable object values.

If it is not possible to return the exact saved value for any reason, implementing libraries MUST respond with a cache miss rather than corrupted data.
