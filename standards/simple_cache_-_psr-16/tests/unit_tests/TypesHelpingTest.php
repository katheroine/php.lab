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

/**
 * Helps to ensure which types are iterable, traversable, etc.
 * to use them in tests of the class interface
 */
class TypesHelpingTest extends TestCase
{
    private string $exampleString = 'orange';
    private array $exampleArray = [1, 2, 3];
    private \ArrayIterator $exampleArrayIterator;

    public function testStringIsNotIterable()
    {
        $this->assertFalse(is_iterable($this->exampleString));
    }

    public function testStringIsNotTraversable()
    {
        $this->assertFalse($this->exampleString instanceof \Traversable);
    }

    public function testArrayIsIterable()
    {
        $this->assertTrue(is_iterable($this->exampleArray));
    }

    public function testArrayIsNotTraversable()
    {
        $this->assertFalse($this->exampleArray instanceof \Traversable);
    }

    public function testArrayIteratorIsIterable()
    {
        $this->assertTrue(is_iterable($this->exampleArrayIterator));
    }

    public function testArrayIteratorIsTraversable()
    {
        $this->assertTrue($this->exampleArrayIterator instanceof \Traversable);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->exampleArrayIterator = new \ArrayIterator($this->exampleArray);
    }
}
