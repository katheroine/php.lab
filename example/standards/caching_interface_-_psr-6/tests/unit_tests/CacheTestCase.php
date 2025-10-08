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

use PHPUnit\Framework\TestCase;

abstract class CacheTestCase extends TestCase
{
    use TestingImplementation;
    use TestingExceptions;

    /**
     * Provide characters that aren't allowed
     * to be placed into the key name.
     *
     * @return array
     */
    public static function keyNameForbiddenCharacters(): array
    {
        return [
            ['{'],
            ['}'],
            ['('],
            [')'],
            ['/'],
            ['\\'],
            ['@'],
            [':'],
        ];
    }

    /**
     * Provide strings that can be used as the valid keys.
     *
     * @return array
     */
    public static function validKeys(): array
    {
        return [
            ['some_key'],
            ['other.key'],
            ['ANOTHERkey10'],
        ];
    }

    /**
     * Provide keys of invalid types.
     *
     * @return array
     */
    public static function invalidTypeKeys(): array
    {
        return [
            [null, 'null'],
            [10, 'int'],
            [10.5, 'float'],
            [[], 'array'],
            [new \stdClass(), 'stdClass'],
        ];
    }

    /**
     * Provide multiple keys of invalid types.
     *
     * @return array
     */
    public static function invalidTypeMultipleKeys(): array
    {
        return [
            [null, 'null'],
            [10, 'int'],
            [10.5, 'float'],
            ['some_key', 'string'],
            [new \stdClass(), 'stdClass'],
        ];
    }

    /**
     * Provide data that can be used as the valid values.
     *
     * @return array
     */
    public static function validValues(): array
    {
        return [
            [null],
            [true],
            [10],
            [10.5],
            ['Some value'],
            [[1, 2, 'three']],
            [(object) ['type' => 'fruit', 'name' => 'orange']],
        ];
    }

    /**
     * Provide expirations of invalid types.
     *
     * @return array
     */
    public static function invalidTypeExpirations(): array
    {
        return [
            [10, 'int'],
            [10.5, 'float'],
            [[], 'array'],
            [new \stdClass(), 'stdClass'],
        ];
    }

    /**
     * Provide times of invalid types.
     *
     * @return array
     */
    public static function invalidTypeTimes(): array
    {
        return [
            [10.5, 'float'],
            [[], 'array'],
            [new \stdClass(), 'stdClass'],
        ];
    }

    public static function times(): array
    {
        return [
            [0],
            [1],
            [2],
        ];
    }

    public static function invalidTypeItems(): array
    {
        return [
            [null, 'null'],
            [10, 'int'],
            [10.5, 'float'],
            [[], 'array'],
            [new \stdClass(), 'stdClass'],
        ];
    }

    /**
     * Provide key - value pairs of the content fixture.
     *
     * @return array
     */
    protected function provideItemElements(): array
    {
        $key1 = 'some_key';
        $expectedValue1 = 'Some value';
        $key2 = 'other.key';
        $expectedValue2 = 87539;
        $key3 = 'ANOTHERkey10';
        $expectedValue3 = ['color' => 'orange'];

        $contentElements = [
            [$key1, $expectedValue1],
            [$key2, $expectedValue2],
            [$key3, $expectedValue3],
        ];

        return $contentElements;
    }
}
