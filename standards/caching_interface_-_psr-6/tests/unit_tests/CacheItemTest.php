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

class CacheItemTest extends TestCase
{
    /**
     * @var string
     */
    private const CACHE_ITEM_FULLY_QUALIFIED_CLASS_NAME = 'PHPLab\\StandardPSR6\\CacheItem';
    private const PSR_CACHING_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\CacheItemInterface';
    private const PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\InvalidArgumentException';
    private const KEY = 'some_key';

    /**
     * Instance of tested class.
     *
     * @var CacheItem
     */
    private CacheItem $cacheItem;

    /**
     * Test if CacheItem class has been created.
     */
    public function testCacheClassExists()
    {
        $this->assertTrue(
            class_exists(self::CACHE_ITEM_FULLY_QUALIFIED_CLASS_NAME)
        );
    }

    /**
     * Test CacheItem class implements Psr\Cache\CacheItem.
     */
    public function testImplementsPsrSimpleCacheInterface()
    {
        $this->assertImplements($this->cacheItem, self::PSR_CACHING_FULLY_QUALIFIED_INTERFACE_NAME);
    }

    /**
     * @dataProvider invalidTypeKeys
     */
    public function testConstructorWhenKeyHasWrongType(mixed $key, string $wrongKeyType)
    {
        $cacheClassName = self::CACHE_ITEM_FULLY_QUALIFIED_CLASS_NAME;

        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: '__construct',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: $wrongKeyType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        new $cacheClassName($key);
    }

    public function testConstructorWhenKeyIsShorterThanOneCharacter()
    {
        $cacheClassName = self::CACHE_ITEM_FULLY_QUALIFIED_CLASS_NAME;

        $expectedExceptionMessage = "Argument key should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        new $cacheClassName('');
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testConstructorWhenKeyNameContainsForbiddenCharacters($character)
    {
        $cacheClassName = self::CACHE_ITEM_FULLY_QUALIFIED_CLASS_NAME;

        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        new $cacheClassName($key);
    }

    /**
     * @dataProvider validKeys
     */
    public function testGetKey(string $expectedKey)
    {
        $cacheItem = new CacheItem($expectedKey);
        $actualKey = $cacheItem->getKey();

        $this->assertSame($expectedKey, $actualKey);
    }

    public function testGetWhenValueWasNotSet()
    {
        $result = $this->cacheItem->get();

        $this->assertNull($result);
    }

    public function testGetAndHitWhenShouldReturnNull()
    {
        $getResult = $this->cacheItem->get();
        $isHitResult = $this->cacheItem->isHit();

        $this->assertNull($getResult);
        $this->assertFalse($isHitResult);

        $this->cacheItem->set(null);
        $getResult = $this->cacheItem->get();
        $isHitResult = $this->cacheItem->isHit();

        $this->assertNull($getResult);
        $this->assertTrue($isHitResult);
    }

    public function testSetReturnsSelf()
    {
        $result = $this->cacheItem->set('Some value');

        $this->assertSame($this->cacheItem, $result);
    }

    /**
     * @dataProvider validValues
     */
    public function testSetAndGet(mixed $expectedValue)
    {
        $this->cacheItem->set($expectedValue);
        $actualValue = $this->cacheItem->get();

        $this->assertSame($expectedValue, $actualValue);
    }

    public function testIsHitWhenItemWasNotHit()
    {
        $result = $this->cacheItem->isHit();

        $this->assertFalse($result);

        $this->cacheItem->get();

        $this->assertFalse($result);
    }

    public function testIsHitWhenItemWasHit()
    {
        $this->cacheItem->set('Some value');
        $result = $this->cacheItem->isHit();

        $this->assertTrue($result);

        $this->cacheItem->get();
        $result = $this->cacheItem->isHit();

        $this->assertTrue($result);

        $this->cacheItem->set('Other value');
        $result = $this->cacheItem->isHit();

        $this->assertTrue($result);

        $this->cacheItem->get();
        $result = $this->cacheItem->isHit();

        $this->assertTrue($result);
    }

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
     * Build ArgumentTypeError exception message regular expression pattern.
     *
     * @param string $methodName
     * @param string $argumentName
     * @param string $argumentProperType
     * @param string $argumentGivenType
     * @param int $arguemntNumber Starts from 0
     *
     * @return string
     */
    private function buildArgumentTypeErrorMessagePattern(
        string $methodName,
        string $argumentName,
        string $argumentProperType,
        string $argumentGivenType,
        int $argumentNumber
    ): string {
        $messagePattern = '/' . preg_quote(
            "::{$methodName}(): "
            . 'Argument #' . strval($argumentNumber)
            . " (\${$argumentName}) must be of type {$argumentProperType}, "
            . "{$argumentGivenType} given"
        ) . '/';

        return $messagePattern;
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->cacheItem = new CacheItem(self::KEY);
    }
}
