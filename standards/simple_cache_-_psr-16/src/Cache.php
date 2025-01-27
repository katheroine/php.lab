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
    /**
     * Characters that cannot be contained by the key name.
     *
     * @var array
     */
    private const KEY_FORBIDDEN_CHARACTERS = ['{', '}', '(', ')', '/', '\\', '@', ':'];

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

        return $this->getFromStorageAndUpdate($key, $default);
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
    public function getMultiple(iterable $keys, mixed $default = null): iterable
    {
        $this->validateKeys($keys);

        return $this->getMultipleFromStorageAndUpdate($keys, $default);
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

        return $this->setInStorage($key, $value, $ttl);
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
    // \InvalidArgumentException thrown when $values is neither an array nor a Traversable
    // due to how the type declaration with strict_types works in PHP.
    public function setMultiple(iterable $values, null|int|\DateInterval $ttl = null): bool
    {
        $this->validateValues($values);

        return $this->setMultipleInStorage($values, $ttl);
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

        return $this->deleteFromStorage($key);
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
    // \InvalidArgumentException thrown when $keys is neither an array nor a Traversable
    // due to how the type declaration with strict_types works in PHP.
    public function deleteMultiple(iterable $keys): bool
    {
        $this->validateKeys($keys);

        return $this->deleteMultipleFromStorage($keys);
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

        return $this->checkExistanceInStorageAndUpdate($key);
    }

    /**
     * Wipes clean the entire cache's keys.
     *
     * @return bool True on success and false on failure.
     */
    public function clear(): bool
    {
        try {
            $this->persist([]);

            return true;
        } catch (\RuntimeException) {
            return false;
        }
    }

    /**
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function getFromStorageAndUpdate(string $key, mixed $default): mixed
    {
        try {
            $storage = $this->retrieve();

            if ($this->notExistent($key, $storage)) {
                return $default;
            }

            if ($this->expired($key, $storage)) {
                unset($storage[$key]);
                $this->persist($storage);

                return $default;
            }

            return $storage[$key]['value'];
        } catch (\RuntimeException) {
            return false;
        }
    }

    /**
     * @param iterable<string> $keys
     * @param mixed $default
     *
     * @return iterable<string, mixed>
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function getMultipleFromStorageAndUpdate(iterable $keys, mixed $default): iterable
    {
        try {
            $storage = $this->retrieve();
            $values = [];
            $updated = false;

            foreach ($keys as $key) {
                if ($this->notExistent($key, $storage)) {
                    $values[$key] = $default;
                } elseif ($this->expired($key, $storage)) {
                    unset($storage[$key]);
                    $updated = true;

                    $values[$key] = $default;
                } else {
                    $values[$key] = $storage[$key]['value'];
                }
            }

            if ($updated) {
                $this->persist($storage);
            }

            return $values;
        } catch (\RuntimeException) {
            return [];
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param null|int|\DateInterval $ttl
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function setInStorage(string $key, mixed $value, null|int|\DateInterval $ttl): bool
    {
        try {
            $storage = $this->retrieve();

            $storage[$key] = [
                'value' => $value,
                'expires' => $this->calculateExpiration($ttl),
            ];

            $this->persist($storage);

            return true;
        } catch (\RuntimeException) {
            return false;
        }
    }

    /**
     * @param iterable $values
     * @param null|int|\DateInterval $ttl
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function setMultipleInStorage(iterable $values, null|int|\DateInterval $ttl): bool
    {
        try {
            $storage = $this->retrieve();

            foreach ($values as $key => $value) {
                $storage[$key] = [
                    'value' => $value,
                    'expires' => $this->calculateExpiration($ttl),
                ];
            }

            $this->persist($storage);

            return true;
        } catch (\RuntimeException) {
            return false;
        }
    }

    /**
     * @param string $key
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function deleteFromStorage(string $key): bool
    {
        try {
            $storage = $this->retrieve();

            if (! array_key_exists($key, $storage)) {
                return false;
            }

            unset($storage[$key]);

            $this->persist($storage);

            return true;
        } catch (\RuntimeException) {
            return false;
        }
    }

    /**
     * @param iterable<string> $keys
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function deleteMultipleFromStorage(iterable $keys): bool
    {
        try {
            $storage = $this->retrieve();

            foreach ($keys as $key) {
                unset($storage[$key]);
            }

            $this->persist($storage);

            return true;
        } catch (\RuntimeException) {
            return false;
        }
    }

    /**
     * @param string $key
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    private function checkExistanceInStorageAndUpdate(string $key): bool
    {
        try {
            $storage = $this->retrieve();

            if ($this->expired($key, $storage)) {
                unset($storage[$key]);
                $this->persist($storage);

                return false;
            }

            $result = array_key_exists($key, $storage);

            return $result;
        } catch (\RuntimeException) {
            return false;
        }
    }

    /**
     * @param string $key
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateKey(string $key): void
    {
        foreach (self::KEY_FORBIDDEN_CHARACTERS as $forbiddenCharacter) {
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
            $this->validateKeysItem($key, $index);
        }
    }

    /**
     * @param  mixed $values
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateValues(iterable $values): void
    {
        $keys = array_keys((array) $values);
        foreach ($keys as $index => $key) {
            $this->validateValuesItemKey($key, $index);
        }
    }

    /**
     * @param mixed $keysItem
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateKeysItem(mixed $keysItem, int $index): void
    {
        $this->validateArgumentKey(
            key: $keysItem,
            index: $index,
            messageInvalidType: "Argument keys item with index %s must be type of string, %s given",
            messageForbiddenCharacter: "Argument keys item with index %s contains forbidden character %s"
        );
    }

    /**
     * @param mixed $valuesItemKey
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateValuesItemKey(mixed $valuesItemKey, int $index): void
    {
        $this->validateArgumentKey(
            key: $valuesItemKey,
            index: $index,
            messageInvalidType: "Argument values item with index %s key must be type of string, %s given",
            messageForbiddenCharacter: "Argument keys item with index %s contains forbidden character %s"
        );
    }

    /**
     * @param mixed $key
     * @param int $index
     * @param string $messageInvalidType Message for the invalid key type exception
     * with format for sprinft with index and type placeholders.
     * @param string $messageForbiddenCharacter Message for the forbidden character in key exception
     * with format for sprinft with index and forbidden character placeholders.
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateArgumentKey(mixed $key, int $index, string $messageInvalidType, string $messageForbiddenCharacter): void
    {
        if (! is_string($key)) {
            $type = gettype($key);

            throw new InvalidArgumentException(sprintf($messageInvalidType, $index, $type));
        }

        foreach (self::KEY_FORBIDDEN_CHARACTERS as $forbiddenCharacter) {
            if (str_contains((string) $key, $forbiddenCharacter)) {
                throw new InvalidArgumentException(sprintf($messageForbiddenCharacter, $index, $forbiddenCharacter));
            }
        }
    }

    /**
     * Read from the persistance source.
     *
     * @return array
     *
     * @throws \RuntimeException
     */
    private function retrieve(): array
    {
        $result = file_get_contents($this->storageFilePath);

        if ($result === false) {
            throw new \RuntimeException('Content cannot be retrieved.');
        }

        $storage = unserialize(
            $result
        ) ?: [];

        return $storage;
    }

    /**
     * Write to the persistance source.
     *
     * @param array $storage
     *
     * @return bool
     *
     * @throws \RuntimeException
     */
    private function persist(array $storage): void
    {
        $result = file_put_contents($this->storageFilePath, serialize($storage));

        if ($result === false) {
            throw new \RuntimeException('Content cannot be persisted.');
        }
    }

    /**
     * @param null|int|\DateInterval $ttl
     *
     * @return int
     */
    private function calculateExpiration(null|int|\DateInterval $ttl): ?int
    {
        if (is_null($ttl) || $ttl < 0) {
            return null;
        }

        if (is_int($ttl) && $ttl > 0) {
            return time() + $ttl;
        }
    }

    /**
     * @param string $key
     * @param array $storage
     *
     * @return bool
     */
    private function expired(string $key, array $storage): bool
    {
        $expired = isset($storage[$key]['expires'])
            && time() > $storage[$key]['expires'];

        return $expired;
    }

    /**
     * @param string $key
     * @param array $storage
     *
     * @return bool
     */
    private function notExistent($key, $storage): bool
    {
        $notExistent = ! array_key_exists($key, $storage);

        return $notExistent;
    }
}
