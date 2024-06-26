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

use Psr\Cache\CacheItemInterface;

class CacheItem extends Cache implements CacheItemInterface
{
    /**
     * @var string
     */
    private string $key;

    /**
     * @var mixed
     */
    private mixed $value = null;

    /**
     * @var bool
     */
    private bool $isHit = false;

    private $expiresAt = null;

    /**
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->validateKey($key);

        $this->key = $key;
    }

    /**
     * Confirms if the cache item lookup resulted in a cache hit.
     *
     * Note: This method MUST NOT have a race condition between calling isHit()
     * and calling get().
     *
     * @return bool
     *   True if the request resulted in a cache hit. False otherwise.
     */
    public function isHit(): bool
    {
        if ($this->expired()) {
            $this->reset();
        }

        return $this->isHit;
    }

    /**
     * Returns the key for the current cache item.
     *
     * The key is loaded by the Implementing Library, but should be available to
     * the higher level callers when needed.
     *
     * @return string
     *   The key string for this cache item.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Retrieves the value of the item from the cache associated with this object's key.
     *
     * The value returned must be identical to the value originally stored by set().
     *
     * If isHit() returns false, this method MUST return null. Note that null
     * is a legitimate cached value, so the isHit() method SHOULD be used to
     * differentiate between "null value was found" and "no value was found."
     *
     * @return mixed
     *   The value corresponding to this cache item's key, or null if not found.
     */
    public function get(): mixed
    {
        return $this->value;
    }

    /**
     * Sets the value represented by this cache item.
     *
     * The $value argument may be any item that can be serialized by PHP,
     * although the method of serialization is left up to the Implementing
     * Library.
     *
     * @param mixed $value
     *   The serializable value to be stored.
     *
     * @return static
     *   The invoked object.
     */
    public function set(mixed $value): static
    {
        $this->value = $value;
        $this->isHit = true;

        return $this;
    }

    /**
     * Sets the expiration time for this cache item.
     *
     * @param ?\DateTimeInterface $expiration
     *   The point in time after which the item MUST be considered expired.
     *   If null is passed explicitly, a default value MAY be used. If none is set,
     *   the value should be stored permanently or for as long as the
     *   implementation allows.
     *
     * @return static
     *   The called object.
     */
    public function expiresAt(?\DateTimeInterface $expiration): static
    {
        if (is_null($expiration)) {
            return $this;
        }

        $this->expiresAt = $expiration->getTimestamp();

        return $this;
    }

    /**
     * Sets the expiration time for this cache item.
     *
     * @param int|\DateInterval|null $time
     *   The period of time from the present after which the item MUST be considered
     *   expired. An integer parameter is understood to be the time in seconds until
     *   expiration. If null is passed explicitly, a default value MAY be used.
     *   If none is set, the value should be stored permanently or for as long as the
     *   implementation allows.
     *
     * @return static
     *   The called object.
     */
    public function expiresAfter(int|\DateInterval|null $time): static
    {
        if (is_null($time)) {
            return $this;
        }

        if ($time instanceof \DateInterval) {
            $unifiedTime = $time->s;
        } elseif (is_int($time)) {
            $unifiedTime = $time;
        }

        $this->expiresAt = time() + $unifiedTime;

        return $this;
    }

    /**
     * @return bool
     */
    private function expired(): bool
    {
        $expired = ! is_null($this->expiresAt)
            && (time() > $this->expiresAt);

        return $expired;
    }

    private function reset(): void
    {
        $this->isHit = false;
        $this->value = null;
    }
}
