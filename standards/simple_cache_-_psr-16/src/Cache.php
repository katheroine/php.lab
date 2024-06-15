<?php

/*
 * This file is part of the PHP.lab package.
 *
 * (c) 2024 Katarzyna Krasińska <katheroine@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace PHPLab\StandardPSR16;

use Psr\SimpleCache\CacheInterface as CacheInterface;

class Cache implements CacheInterface
{
    private const FORBIDDEN_CHARACTERS = ['{', '}', '(', ')', '/', '\\', '@', ':'];
    /**
     * Storage file absolute path.
     *
     * @var string
     */
    private string $storageFilePath;

    /**
     * @param string $storageFilePath
     */
    public function __construct(string $storageFilePath)
    {
        $this->storageFilePath = $storageFilePath;
    }

    /**
     * Fetches a value from the cache.
     *
     * @param string $key The unique key of this item in the cache.
     * @param mixed $default Default value to return if the key does not exist.
     *
     * @return mixed The value of the item from the cache, or $default in case of cache miss.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * MUST be thrown if the $key string is not a legal value.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $this->validateKey($key);

        $storage = $this->retrieve();

        if (! array_key_exists($key, $storage)) {
            return $default;
        }

        return $storage[$key];
    }

    /**
     * Persists data in the cache, uniquely referenced by a key with an optional expiration TTL time.
     *
     * @param string $key The key of the item to store.
     * @param mixed $value The value of the item to store, must be serializable.
     * @param null|int|\DateInterval $ttl Optional. The TTL value of this item. If no value is sent and
     * the driver supports TTL then the library may set a default value
     * for it or let the driver take care of that.
     *
     * @return bool True on success and false on failure.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * MUST be thrown if the $key string is not a legal value.
     */
    public function set(string $key, mixed $value, null|int|\DateInterval $ttl = null): bool
    {
        $this->validateKey($key);

        $storage = $this->retrieve();

        $storage[$key] = $value;

        $result = $this->persist($storage);

        return $result;
    }

    /**
     * Delete an item from the cache by its unique key.
     *
     * @param string $key The unique cache key of the item to delete.
     *
     * @return bool True if the item was successfully removed. False if there was an error.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * MUST be thrown if the $key string is not a legal value.
     */
    public function delete(string $key): bool
    {
        $this->validateKey($key);

        $storage = $this->retrieve();

        if (! array_key_exists($key, $storage)) {
            return false;
        }

        unset($storage[$key]);

        $result = $this->persist($storage);

        return $result;
    }

    /**
     * Obtains multiple cache items by their unique keys.
     *
     * @param iterable<string> $keys A list of keys that can be obtained in a single operation.
     * @param mixed $default Default value to return for keys that do not exist.
     *
     * @return iterable<string, mixed> A list of key => value pairs. Cache keys that do not exist or are stale will have $default as value.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * MUST be thrown if $keys is neither an array nor a Traversable,
     * or if any of the $keys are not a legal value.
     */
    public function getMultiple(iterable $keys, mixed $default = []): iterable // Default value of $default differs from the interface (null).
    {
        $this->validateKeys($keys);

        $storage = $this->retrieve();
        $values = [];

        foreach ($keys as $key) {
            if (! array_key_exists($key, $storage)) {
                return $default;
            }

            $values[$key] = $storage[$key];
        }

        return $values;
    }

    /**
     * Persists a set of key => value pairs in the cache, with an optional TTL.
     *
     * @param iterable $values A list of key => value pairs for a multiple-set operation.
     * @param null|int|\DateInterval $ttl Optional. The TTL value of this item. If no value is sent and
     * the driver supports TTL then the library may set a default value
     * for it or let the driver take care of that.
     *
     * @return bool True on success and false on failure.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * MUST be thrown if $values is neither an array nor a Traversable,
     * or if any of the $values are not a legal value.
     */
    public function setMultiple(iterable $values, null|int|\DateInterval $ttl = null): bool
    {
    }

    /**
     * Deletes multiple cache items in a single operation.
     *
     * @param iterable<string> $keys A list of string-based keys to be deleted.
     *
     * @return bool True if the items were successfully removed. False if there was an error.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * MUST be thrown if $keys is neither an array nor a Traversable,
     * or if any of the $keys are not a legal value.
     */
    public function deleteMultiple(iterable $keys): bool
    {
    }

    /**
     * Wipes clean the entire cache's keys.
     *
     * @return bool True on success and false on failure.
     */
    public function clear(): bool
    {
        $result = $this->persist([]);

        return $result;
    }

    /**
     * Determines whether an item is present in the cache.
     *
     * NOTE: It is recommended that has() is only to be used for cache warming type purposes
     * and not to be used within your live applications operations for get/set, as this method
     * is subject to a race condition where your has() will return true and immediately after,
     * another script can remove it making the state of your app out of date.
     *
     * @param string $key The cache item key.
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * MUST be thrown if the $key string is not a legal value.
     */
    public function has(string $key): bool
    {
        $this->validateKey($key);

        $storage = $this->retrieve();
        $result = array_key_exists($key, $storage);

        return $result;
    }

    /**
     * @param string $key
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateKey(string $key): void
    {
        foreach (self::FORBIDDEN_CHARACTERS as $forbiddenCharacter) {
            if (str_contains($key, $forbiddenCharacter)) {
                throw new InvalidArgumentException("Argument key contains forbidden character {$forbiddenCharacter}");
            }
        }
    }

    /**
     * @param array $keys
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateKeys(iterable $keys): void
    {
        foreach ($keys as $index => $key) {
            foreach (self::FORBIDDEN_CHARACTERS as $forbiddenCharacter) {
                if (str_contains($key, $forbiddenCharacter)) {
                    throw new InvalidArgumentException("Argument keys item with index {$index} contains forbidden character {$forbiddenCharacter}");
                }
            }
        }
    }

    /**
     * Read from the persistance source.
     *
     * @return array
     */
    private function retrieve(): array
    {
        $storage = unserialize(
            file_get_contents($this->storageFilePath)
        ) ?: [];

        return $storage;
    }

    /**
     * Write to the persistance source.
     *
     * @param array $storage
     *
     * @return bool
     */
    private function persist(array $storage): bool
    {
        $result = file_put_contents($this->storageFilePath, serialize($storage));

        return (bool) $result;
    }
}
