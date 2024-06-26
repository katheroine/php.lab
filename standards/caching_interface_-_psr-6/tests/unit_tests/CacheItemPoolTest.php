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

use PHPLab\StandardPSR6\CacheTest;

class CacheItemPoolTest extends CacheTest
{
    /**
     * @var string
     */
    private const CACHE_ITEM_POOL_FULLY_QUALIFIED_CLASS_NAME = 'PHPLab\\StandardPSR6\\CacheItemPool';
    private const PSR_CACHE_ITEM_POOL_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\CacheItemPoolInterface';
    private const PSR_CACHE_ITEM_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\CacheItemInterface';
    private const PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\InvalidArgumentException';

    /**
     * Instance of tested class.
     *
     * @var Cache
     */
    private CacheItemPool $cacheItemPool;

    /**
     * Test if Cache class has been created.
     */
    public function testCacheClassExists()
    {
        $this->assertTrue(
            class_exists(self::CACHE_ITEM_POOL_FULLY_QUALIFIED_CLASS_NAME)
        );
    }

    /**
     * Test Cache class implements Psr\Cache\CacheItemPoolInterface.
     */
    public function testImplementsPsrCacheItemPoolInterface()
    {
        $this->assertImplements($this->cacheItemPool, self::PSR_CACHE_ITEM_POOL_FULLY_QUALIFIED_INTERFACE_NAME);
    }

    /**
     * @dataProvider invalidTypeKeys
     */
    public function testHasItemWhenKeyHasWrongType(mixed $key, string $wrongKeyType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'hasItem',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: $wrongKeyType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItemPool->hasItem($key);
    }

    public function testHasItemWhenKeyIsShorterThanOneCharacter()
    {
        $expectedExceptionMessage = "Argument key should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cacheItemPool->hasItem('');
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testHasItemWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cacheItemPool->hasItem($key);
    }

    /**
     * @dataProvider invalidTypeKeys
     */
    public function testGetItemWhenKeyHasWrongType(mixed $key, string $wrongKeyType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'getItem',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: $wrongKeyType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItemPool->getItem($key);
    }

    public function testHasItemReturnsBool()
    {
        $result = $this->cacheItemPool->hasItem('some_key');

        $this->assertTrue(is_bool($result));
    }

    public function testHasItemWhenPoolIsEmpty()
    {
        $result = $this->cacheItemPool->hasItem('some_key');

        $this->assertFalse($result);
    }

    public function testGetItemWhenKeyIsShorterThanOneCharacter()
    {
        $expectedExceptionMessage = "Argument key should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cacheItemPool->getItem('');
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testGetItemWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cacheItemPool->getItem($key);
    }

    /**
     * @dataProvider invalidTypeMultipleKeys
     */
    public function testGetItemsWhenKeysHasWrongType(mixed $keys, string $wrongKeysType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'getItems',
            argumentName: 'keys',
            argumentProperType: 'array',
            argumentGivenType: $wrongKeysType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItemPool->getItems($keys);
    }

    /**
     * @dataProvider invalidTypeKeys
     */
    public function testDeleteItemWhenKeyHasWrongType(mixed $key, string $wrongKeyType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'deleteItem',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: $wrongKeyType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItemPool->deleteItem($key);
    }

    public function testDeleteItemWhenKeyIsShorterThanOneCharacter()
    {
        $expectedExceptionMessage = "Argument key should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cacheItemPool->deleteItem('');
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testDeleteItemWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cacheItemPool->deleteItem($key);
    }

    /**
     * @dataProvider invalidTypeMultipleKeys
     */
    public function testDeleteItemsWhenKeysHasWrongType(mixed $keys, string $wrongKeysType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'deleteItems',
            argumentName: 'keys',
            argumentProperType: 'array',
            argumentGivenType: $wrongKeysType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItemPool->deleteItems($keys);
    }

    /**
     * @dataProvider invalidTypeItems
     */
    public function testSaveWhenItemHasWrongType(mixed $item, string $wrongItemType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'save',
            argumentName: 'item',
            argumentProperType: self::PSR_CACHE_ITEM_FULLY_QUALIFIED_INTERFACE_NAME,
            argumentGivenType: $wrongItemType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItemPool->save($item);
    }

    /**
     * @dataProvider invalidTypeItems
     */
    public function testSaveDeferredWhenItemHasWrongType(mixed $item, string $wrongItemType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'saveDeferred',
            argumentName: 'item',
            argumentProperType: self::PSR_CACHE_ITEM_FULLY_QUALIFIED_INTERFACE_NAME,
            argumentGivenType: $wrongItemType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItemPool->saveDeferred($item);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->cacheItemPool = new CacheItemPool();
    }
}
