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

    public function testHasItemReturnsBool()
    {
        $result = $this->cacheItemPool->hasItem('some_key');

        $this->assertIsBool($result);
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

    public function testHasItemWhenPoolIsEmpty()
    {
        $result = $this->cacheItemPool->hasItem('some_key');

        $this->assertFalse($result);
    }

    public function testHasItemWithSaveWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);
        $this->cacheItemPool->save($item3);

        $result = $this->cacheItemPool->hasItem('unexistent');

        $this->assertFalse($result);
    }

    public function testHasItemWithSaveDeferredWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->saveDeferred($item1);
        $this->cacheItemPool->saveDeferred($item2);
        $this->cacheItemPool->saveDeferred($item3);

        $result = $this->cacheItemPool->hasItem('unexistent');

        $this->assertFalse($result);
    }

    public function testGetItemReturnsCacheItem()
    {
        $result = $this->cacheItemPool->getItem('some_key');

        $this->assertInstanceOf(CacheItem::class, $result);
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

    public function testGetItemWhenPoolIsEmpty()
    {
        $result = $this->cacheItemPool->getItem('some_key');

        $this->assertInstanceOf(CacheItem::class, $result);
        $this->assertFalse($result->isHit());
    }

    public function testGetItemWithSaveWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);
        $this->cacheItemPool->save($item3);

        $result = $this->cacheItemPool->getItem('unexistent');

        $this->assertInstanceOf(CacheItem::class, $result);
        $this->assertFalse($result->isHit());
    }

    public function testGetItemWithSaveDeferredWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->saveDeferred($item1);
        $this->cacheItemPool->saveDeferred($item2);
        $this->cacheItemPool->saveDeferred($item3);

        $result = $this->cacheItemPool->getItem('unexistent');

        $this->assertInstanceOf(CacheItem::class, $result);
        $this->assertFalse($result->isHit());
    }

    public function testGetItemsReturnsIterable()
    {
        $result = $this->cacheItemPool->getItems([]);

        $this->assertIsIterable($result);
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

    public function testGetItemsWhenKeysIsShorterThanOneCharacter()
    {
        $expectedExceptionMessage = "Argument keys item with index 0 should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cacheItemPool->getItems(['']);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testGetItemsWhenKeysContainForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument keys item with index 0 contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $keys = [
            $key,
        ];

        $this->cacheItemPool->getItems($keys);
    }

    public function testGetItemsWhenPoolIsEmpty()
    {
        $result = $this->cacheItemPool->getItems([]);

        $this->assertEmpty($result);
    }

    public function testGetItemsWithSaveWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);
        $this->cacheItemPool->save($item3);

        $result = $this->cacheItemPool->getItems(['unexistent']);

        $this->assertEmpty($result);
    }

    public function testGetItemsWithSaveDeferredWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->saveDeferred($item1);
        $this->cacheItemPool->saveDeferred($item2);
        $this->cacheItemPool->saveDeferred($item3);

        $result = $this->cacheItemPool->getItem('unexistent');

        $result = $this->cacheItemPool->getItems(['unexistent']);

        $this->assertEmpty($result);
    }

    public function testDeleteItemReturnsBool()
    {
        $result = $this->cacheItemPool->deleteItem('some_key');

        $this->assertIsBool($result);
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

    public function testDeleteItemWhenPoolIsEmpty()
    {
        $result = $this->cacheItemPool->deleteItem('some_key');

        $this->assertFalse($result);
    }

    public function testDeleteItemWithSaveWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);
        $this->cacheItemPool->save($item3);

        $result = $this->cacheItemPool->deleteItem('unexistent');

        $this->assertFalse($result);
    }

    public function testDeleteItemWithSaveDeferredWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->saveDeferred($item1);
        $this->cacheItemPool->saveDeferred($item2);
        $this->cacheItemPool->saveDeferred($item3);

        $result = $this->cacheItemPool->deleteItem('unexistent');

        $this->assertFalse($result);
    }

    public function testDeleteItemsReturnsBool()
    {
        $result = $this->cacheItemPool->deleteItems([]);

        $this->assertIsBool($result);
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

    public function testDeleteItemsWhenKeysIsShorterThanOneCharacter()
    {
        $expectedExceptionMessage = "Argument keys item with index 0 should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cacheItemPool->deleteItems(['']);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testDeleteItemsWhenKeysContainForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument keys item with index 0 contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $keys = [
            $key,
        ];

        $this->cacheItemPool->deleteItems($keys);
    }

    public function testDeleteItemsWhenPoolIsEmpty()
    {
        $result = $this->cacheItemPool->deleteItems(['some_key']);

        $this->assertFalse($result);
    }

    public function testDeleteItemsWithSaveWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);
        $this->cacheItemPool->save($item3);

        $result = $this->cacheItemPool->deleteItems(['unexistent']);

        $this->assertFalse($result);
    }

    public function testDeleteItemsWithSaveDeferredWhenKeyHasNoRelatedItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);
        $item3 = new CacheItem($key3);
        $item3->set($value3);

        $this->cacheItemPool->saveDeferred($item1);
        $this->cacheItemPool->saveDeferred($item2);
        $this->cacheItemPool->saveDeferred($item3);

        $result = $this->cacheItemPool->deleteItems(['unexistent']);

        $this->assertFalse($result);
    }

    public function testSaveReturnsBool()
    {
        $item = new CacheItem('some_key');
        $result = $this->cacheItemPool->save($item);

        $this->assertIsBool($result);
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

    public function testSaveDeferredReturnsBool()
    {
        $item = new CacheItem('some_key');
        $result = $this->cacheItemPool->saveDeferred($item);

        $this->assertIsBool($result);
    }

    public function testClearReturnsBool()
    {
        $result = $this->cacheItemPool->clear();

        $this->assertIsBool($result);
    }

    public function testCommitReturnsBool()
    {
        $result = $this->cacheItemPool->commit();

        $this->assertIsBool($result);
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
