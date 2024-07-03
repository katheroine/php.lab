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

namespace PHPLab\StandardPSR6;

use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\CacheItemInterface;

class CacheItemPool extends Cache implements CacheItemPoolInterface
{
    /**
     * Storage file absolute path.
     *
     * @var string
     */
    private string $storageFilePath;

    /**
     * Deferred cache items
     */
    private array $cacheItems = [];

    /**
     * @param string $storageFilePath
     */
    public function __construct(string $storageFilePath)
    {
        $this->storageFilePath = $storageFilePath;
    }

    /**
     * Confirms if the cache contains specified cache item.
     *
     * Note: This method MAY avoid retrieving the cached value for performance reasons.
     * This could result in a race condition with CacheItemInterface::get(). To avoid
     * such situation use CacheItemInterface::isHit() instead.
     *
     * @param string $key
     *   The key for which to check existence.
     *
     * @throws InvalidArgumentException
     *   If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return bool
     *   True if item exists in the cache, false otherwise.
     */
    public function hasItem(string $key): bool
    {
        $this->validateKey($key);

        $hasItem = array_key_exists($key, $this->cacheItems);

        return $hasItem;
    }

    /**
     * Returns a Cache Item representing the specified key.
     *
     * This method must always return a CacheItemInterface object, even in case of
     * a cache miss. It MUST NOT return null.
     *
     * @param string $key
     *   The key for which to return the corresponding Cache Item.
     *
     * @throws InvalidArgumentException
     *   If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return CacheItemInterface
     *   The corresponding Cache Item.
     */
    public function getItem(string $key): CacheItemInterface
    {
        $this->validateKey($key);

        if (! isset($this->cacheItems[$key])) {
            return new CacheItem('-');
        }

        return $this->cacheItems[$key];
    }

    /**
     * Returns a traversable set of cache items.
     *
     * @param string[] $keys
     *   An indexed array of keys of items to retrieve.
     *
     * @throws InvalidArgumentException
     *   If any of the keys in $keys are not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return iterable
     *   An iterable collection of Cache Items keyed by the cache keys of
     *   each item. A Cache item will be returned for each key, even if that
     *   key is not found. However, if no keys are specified then an empty
     *   traversable MUST be returned instead.
     */
    public function getItems(array $keys = []): iterable
    {
        $this->validateKeys($keys);

        $items = [];

        foreach ($keys as $key) {
            if (isset($this->cacheItems[$key])) {
                $items[$key] = $this->cacheItems[$key];
            }
        }

        return $items;
    }

    /**
     * Removes the item from the pool.
     *
     * @param string $key
     *   The key to delete.
     *
     * @throws InvalidArgumentException
     *   If the $key string is not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return bool
     *   True if the item was successfully removed. False if there was an error.
     */
    public function deleteItem(string $key): bool
    {
        $this->validateKey($key);

        if (! isset($this->cacheItems[$key])) {
            return false;
        }

        unset($this->cacheItems[$key]);

        $result = $this->commit();

        return $result;
    }

    /**
     * Removes multiple items from the pool.
     *
     * @param string[] $keys
     *   An array of keys that should be removed from the pool.
     *
     * @throws InvalidArgumentException
     *   If any of the keys in $keys are not a legal value a \Psr\Cache\InvalidArgumentException
     *   MUST be thrown.
     *
     * @return bool
     *   True if the items were successfully removed. False if there was an error.
     */
    public function deleteItems(array $keys): bool
    {
        $this->validateKeys($keys);

        $searchResult = true;

        foreach ($keys as $key) {
            if (! isset($this->cacheItems[$key])) {
                $searchResult = false;
            } else {
                unset($this->cacheItems[$key]);
            }
        }

        $commitResult = $this->commit();

        return $searchResult && $commitResult;
    }

    /**
     * Persists a cache item immediately.
     *
     * @param CacheItemInterface $item
     *   The cache item to save.
     *
     * @return bool
     *   True if the item was successfully persisted. False if there was an error.
     */
    public function save(CacheItemInterface $item): bool
    {
        $this->cacheItems[$item->getKey()] = $item;

        $result = $this->commit();

        return $result;
    }

    /**
     * Sets a cache item to be persisted later.
     *
     * @param CacheItemInterface $item
     *   The cache item to save.
     *
     * @return bool
     *   False if the item could not be queued or if a commit was attempted and failed. True otherwise.
     */
    public function saveDeferred(CacheItemInterface $item): bool
    {
        $this->cacheItems[$item->getKey()] = $item;

        return true;
    }

    /**
     * Deletes all items in the pool.
     *
     * @return bool
     *   True if the pool was successfully cleared. False if there was an error.
     */
    public function clear(): bool
    {
        $this->cacheItems = [];
        $result = file_put_contents($this->storageFilePath, '') === 0;

        return $result;
    }

    /**
     * Persists any deferred cache items.
     *
     * @return bool
     *   True if all not-yet-saved items were successfully saved or there were none. False otherwise.
     */
    public function commit(): bool
    {
        $result = (bool) file_put_contents($this->storageFilePath, serialize($this->cacheItems));

        return $result;
    }
}
