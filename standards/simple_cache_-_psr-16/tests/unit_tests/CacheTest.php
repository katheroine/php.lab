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

use PHPUnit\Framework\TestCase;

class CacheTest extends TestCase
{
    /**
     * @var string
     */
    private const CACHE_FULLY_QUALIFIED_CLASS_NAME = 'PHPLab\\StandardPSR16\\Cache';
    private const PSR_SIMPLE_CACHE_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\SimpleCache\\CacheInterface';

    /**
     * Instance of tested class.
     *
     * @var Cache
     */
    private Cache $cache;

    /**
     * Test if Cache class
     * has been created.
     */
    public function testCacheClassExists()
    {
        $this->assertTrue(
            class_exists(self::CACHE_FULLY_QUALIFIED_CLASS_NAME)
        );
    }

    /**
     * Test Cache class implements Psr\SimpleCache.
     */
    public function testImplementsPsrSimpleCacheInterface()
    {
        $this->assertImplements($this->cache, self::PSR_SIMPLE_CACHE_FULLY_QUALIFIED_INTERFACE_NAME);
    }

    /**
     * Assert object class implements given interface.
     *
     * @param mixed  $object
     * @param string $interface
     */
    private function assertImplements(mixed $object, string $interface): void
    {
        $implementedInterfaces = class_implements($object);
        $implementsInterface = in_array($interface, $implementedInterfaces);

        $this->assertTrue($implementsInterface);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->cache = new Cache();
    }
}
