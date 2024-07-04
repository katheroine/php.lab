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

class CacheItemPoolTest extends CacheTestCase
{
    /**
     * @var string
     */
    private const CACHE_ITEM_POOL_FULLY_QUALIFIED_CLASS_NAME = 'PHPLab\\StandardPSR6\\CacheItemPool';
    private const PSR_CACHE_ITEM_POOL_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\CacheItemPoolInterface';
    private const PSR_CACHE_ITEM_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\CacheItemInterface';
    private const PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Cache\\InvalidArgumentException';
    protected const STORAGE_FILE_ABSOLUTE_PATH = __DIR__
        . DIRECTORY_SEPARATOR . '/../fixtures/var/psr6cache.storage';

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

    public function testConstructorWhenArgumentHasWrongType()
    {
        $cacheClassName = self::CACHE_ITEM_POOL_FULLY_QUALIFIED_CLASS_NAME;

        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: '__construct',
            argumentName: 'storageFilePath',
            argumentProperType: 'string',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        new $cacheClassName(null);
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

    public function testHasItemWithSave()
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

        $result1 = $this->cacheItemPool->hasItem($key1);
        $result2 = $this->cacheItemPool->hasItem($key2);
        $result3 = $this->cacheItemPool->hasItem($key3);

        $this->assertTrue($result1);
        $this->assertTrue($result2);
        $this->assertTrue($result3);
    }

    public function testHasItemWithSaveDeferred()
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

        $result1 = $this->cacheItemPool->hasItem($key1);
        $result2 = $this->cacheItemPool->hasItem($key2);
        $result3 = $this->cacheItemPool->hasItem($key3);

        $this->assertTrue($result1);
        $this->assertTrue($result2);
        $this->assertTrue($result3);
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

    public function testGetItemWithSave()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);
        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);
        $expectedItem3 = new CacheItem($key3);
        $expectedItem3->set($value3);

        $this->cacheItemPool->save($expectedItem1);
        $this->cacheItemPool->save($expectedItem2);
        $this->cacheItemPool->save($expectedItem3);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);

        $this->assertSame($expectedItem1, $actualItem1);
        $this->assertSame($expectedItem2, $actualItem2);
        $this->assertSame($expectedItem3, $actualItem3);
    }

    public function testGetItemWithSaveDeferred()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);
        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);
        $expectedItem3 = new CacheItem($key3);
        $expectedItem3->set($value3);

        $this->cacheItemPool->saveDeferred($expectedItem1);
        $this->cacheItemPool->saveDeferred($expectedItem2);
        $this->cacheItemPool->saveDeferred($expectedItem3);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);

        $this->assertSame($expectedItem1, $actualItem1);
        $this->assertSame($expectedItem2, $actualItem2);
        $this->assertSame($expectedItem3, $actualItem3);
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

    public function testGetItemsWhenOneOfKeysIsShorterThanOneCharacter()
    {
        $expectedExceptionMessage = "Argument keys item with index 0 should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cacheItemPool->getItems(['']);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testGetItemsWhenOneOfKeysContainForbiddenCharacter($character)
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

    public function testGetItemsWithSave()
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

        $actualItems13 =  $this->cacheItemPool->getItems([$key1, $key3]);
        $this->assertSame([
            $key1 => $item1,
            $key3 => $item3,
        ], $actualItems13);

        $actualItems21 =  $this->cacheItemPool->getItems([$key2, $key1]);
        $this->assertSame([
            $key2 => $item2,
            $key1 => $item1,
        ], $actualItems21);

        $actualItems23 =  $this->cacheItemPool->getItems([$key2, $key3]);
        $this->assertSame([
            $key2 => $item2,
            $key3 => $item3,
        ], $actualItems23);

        $actualItems213 =  $this->cacheItemPool->getItems([$key2, $key1, $key3]);
        $this->assertSame([
            $key2 => $item2,
            $key1 => $item1,
            $key3 => $item3,
        ], $actualItems213);
    }

    public function testGetItemsWithSaveDeferred()
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

        $actualItems13 =  $this->cacheItemPool->getItems([$key1, $key3]);
        $this->assertSame([
            $key1 => $item1,
            $key3 => $item3,
        ], $actualItems13);

        $actualItems21 =  $this->cacheItemPool->getItems([$key2, $key1]);
        $this->assertSame([
            $key2 => $item2,
            $key1 => $item1,
        ], $actualItems21);

        $actualItems23 =  $this->cacheItemPool->getItems([$key2, $key3]);
        $this->assertSame([
            $key2 => $item2,
            $key3 => $item3,
        ], $actualItems23);

        $actualItems213 =  $this->cacheItemPool->getItems([$key2, $key1, $key3]);
        $this->assertSame([
            $key2 => $item2,
            $key1 => $item1,
            $key3 => $item3,
        ], $actualItems213);
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

    public function testDeleteItemWhenStorageDoesNotExist()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
        ) = $this->provideItemElements();
        $emptyItem = new CacheItem('-');

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);

        $this->assertEquals($item1, $actualItem1);
        $this->assertEquals($item2, $actualItem2);

        $result = $this->cacheItemPool->deleteItem($key1);

        $actualItem1 = $this->cacheItemPool->getItem($key1);

        $this->assertTrue($result);
        $this->assertEquals($emptyItem, $actualItem1);

        $this->deleteContentStorage();

        $result = $this->cacheItemPool->deleteItem($key2);

        $actualItem2 = $this->cacheItemPool->getItem($key2);

        $this->assertTrue($result);
        $this->assertEquals($emptyItem, $actualItem2);
    }

    public function testDeleteItemWhenStorgeIsNotAccessible()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
        ) = $this->provideItemElements();
        $emptyItem = new CacheItem('-');

        $item1 = new CacheItem($key1);
        $item1->set($value1);
        $item2 = new CacheItem($key2);
        $item2->set($value2);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);

        $this->assertEquals($item1, $actualItem1);
        $this->assertEquals($item2, $actualItem2);

        $result = $this->cacheItemPool->deleteItem($key1);

        $actualItem1 = $this->cacheItemPool->getItem($key1);

        $this->assertTrue($result);
        $this->assertEquals($emptyItem, $actualItem1);

        $this->makeUnaccessibleContentStorage();

        $result = $this->cacheItemPool->deleteItem($key2);

        $actualItem2 = $this->cacheItemPool->getItem($key2);

        $this->assertFalse($result);
        $this->assertEquals($emptyItem, $actualItem2);
    }

    public function testDeleteItemWithSaveAndGetItems()
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

        $result1 = $this->cacheItemPool->deleteItem($key2);

        $expectedItems1 = $expectedContent1 = [
            $key1 => $item1,
            $key3 => $item3,
        ];
        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);
        $actualContent1 = $this->getStoredContent();

        $this->assertTrue($result1);
        $this->assertSame($expectedItems1, $actualItems1);
        $this->assertSameSize($expectedContent1, $actualContent1);

        $result2 = $this->cacheItemPool->deleteItem($key1);

        $expectedItems2 = $expectedContent2 = [
            $key3 => $item3,
        ];
        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);
        $actualContent2 = $this->getStoredContent();

        $this->assertTrue($result2);
        $this->assertSame($expectedItems2, $actualItems2);
        $this->assertSameSize($expectedContent2, $actualContent2);

        $result3 = $this->cacheItemPool->deleteItem($key3);

        $actualItems3 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);
        $actualContent3 = $this->getStoredContent();

        $this->assertTrue($result3);
        $this->assertSame([], $actualItems3);
        $this->assertSameSize([], $actualContent3);
    }

    public function testDeleteItemWithSaveDeferredAndGetItems()
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

        $result1 = $this->cacheItemPool->deleteItem($key2);

        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result1);
        $this->assertSame([
            $key1 => $item1,
            $key3 => $item3,
        ], $actualItems1);

        $result2 = $this->cacheItemPool->deleteItem($key1);

        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result2);
        $this->assertSame([
            $key3 => $item3,
        ], $actualItems2);

        $result3 = $this->cacheItemPool->deleteItem($key3);

        $actualItems3 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result3);
        $this->assertSame([], $actualItems3);
    }

    public function testDeleteItemsReturnsBool()
    {
        $result = $this->cacheItemPool->deleteItems([]);

        $this->assertIsBool($result);
    }

    /**
     * @dataProvider invalidTypeMultipleKeys
     */
    public function testDeleteItemsWhenOneOfKeysHasWrongType(mixed $keys, string $wrongKeysType)
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

    public function testDeleteItemsWhenOneOfKeysIsShorterThanOneCharacter()
    {
        $expectedExceptionMessage = "Argument keys item with index 0 should consist of at least one character";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_INTERFACE_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cacheItemPool->deleteItems(['']);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testDeleteItemsWhenOneOfKeysContainForbiddenCharacter($character)
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

    public function testDeleteItemsWithSaveWhenOneOfKeysHasNoRelatedItem()
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

    public function testDeleteItemsWithSaveDeferredWhenOneOfKeysHasNoRelatedItem()
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

    public function testDeleteItemsWhenStorageDoesNotExist()
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

        $result1 = $this->cacheItemPool->deleteItems([
            $key1,
        ]);

        $expectedItems1 = [
            $key2 => $item2,
            $key3 => $item3,
        ];
        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result1);
        $this->assertSame($expectedItems1, $actualItems1);

        $this->deleteContentStorage();

        $result2 = $this->cacheItemPool->deleteItems([
            $key2,
        ]);

        $expectedItems2 = [
            $key3 => $item3,
        ];
        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result2);
        $this->assertSame($expectedItems2, $actualItems2);
    }

    public function testDeleteItemsWhenStorgeIsNotAccessible()
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

        $result1 = $this->cacheItemPool->deleteItems([
            $key1,
        ]);

        $expectedItems1 = [
            $key2 => $item2,
            $key3 => $item3,
        ];
        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result1);
        $this->assertSame($expectedItems1, $actualItems1);

        $this->makeUnaccessibleContentStorage();

        $result2 = $this->cacheItemPool->deleteItems([
            $key2,
        ]);

        $expectedItems2 = [
            $key3 => $item3,
        ];
        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertFalse($result2);
        $this->assertSame($expectedItems2, $actualItems2);
    }

    public function testDeleteItemsWithSaveWhenOneOfKeysHasRelateItemAndOtherDoNot()
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

        $result = $this->cacheItemPool->deleteItems([
            'unexistent',
            $key1,
        ]);

        $this->assertFalse($result);
    }

    public function testDeleteItemsWithSaveDeferredWhenOneOfKeysHasRelateItemAndOtherDoNot()
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

        $result = $this->cacheItemPool->deleteItems([
            'unexistent',
            $key1,
        ]);

        $this->assertFalse($result);
    }

    public function testDeleteItemsWithSaveAndGetItems()
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

        $result1 = $this->cacheItemPool->deleteItems([
            $key3,
            $key1,
        ]);

        $expectedItems1 = $expectedContent1 = [
            $key2 => $item2,
        ];
        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);
        $actualContent1 = $this->getStoredContent();

        $this->assertTrue($result1);
        $this->assertSame($expectedItems1, $actualItems1);
        $this->assertSameSize($expectedContent1, $actualContent1);

        $result2 = $this->cacheItemPool->deleteItems([
            $key2,
        ]);

        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);
        $actualContent2 = $this->getStoredContent();

        $this->assertTrue($result2);
        $this->assertSame([], $actualItems2);
        $this->assertSameSize([], $actualContent2);
    }

    public function testDeleteItemsWithSaveDeferredAndGetItems()
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

        $result1 = $this->cacheItemPool->deleteItems([
            $key3,
            $key1,
        ]);

        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result1);
        $this->assertSame([
            $key2 => $item2,
        ], $actualItems1);

        $result2 = $this->cacheItemPool->deleteItems([
            $key2,
        ]);

        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result2);
        $this->assertSame([], $actualItems2);
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

    public function testSaveWhenStorageDoesNotExist()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
        ) = $this->provideItemElements();

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);
        $result = $this->cacheItemPool->save($expectedItem1);
        $actualItem1 = $this->cacheItemPool->getItem($key1);

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);

        $this->deleteContentStorage();

        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);
        $result = $this->cacheItemPool->save($expectedItem2);
        $actualItem2 = $this->cacheItemPool->getItem($key2);

        $this->assertTrue($result);
        $this->assertEquals($expectedItem2, $actualItem2);
    }

    public function testSaveWhenStorgeIsNotAccessible()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
        ) = $this->provideItemElements();

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);
        $result = $this->cacheItemPool->save($expectedItem1);
        $actualItem1 = $this->cacheItemPool->getItem($key1);

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);

        $this->makeUnaccessibleContentStorage();

        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);
        $result = $this->cacheItemPool->save($expectedItem2);
        $actualItem2 = $this->cacheItemPool->getItem($key2);

        $this->assertFalse($result);
        $this->assertEquals($expectedItem2, $actualItem2);
    }

    public function testSaveWithGetItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();
        $key4 = 'unexistent';

        $initialItem = new CacheItem('-');

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);

        $result = $this->cacheItemPool->save($expectedItem1);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);
        $actualItem4 = $this->cacheItemPool->getItem($key4);

        $expectedContent = [
            $key1 => $expectedItem1,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($initialItem, $actualItem2);
        $this->assertEquals($initialItem, $actualItem3);
        $this->assertEquals($initialItem, $actualItem4);
        $this->assertEquals($expectedContent, $actualContent);

        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);

        $result = $this->cacheItemPool->save($expectedItem2);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);
        $actualItem4 = $this->cacheItemPool->getItem($key4);

        $expectedContent = [
            $key1 => $expectedItem1,
            $key2 => $expectedItem2,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($expectedItem2, $actualItem2);
        $this->assertEquals($initialItem, $actualItem3);
        $this->assertEquals($initialItem, $actualItem4);
        $this->assertEquals($expectedContent, $actualContent);

        $expectedItem3 = new CacheItem($key3);
        $expectedItem3->set($value3);

        $result = $this->cacheItemPool->save($expectedItem3);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);
        $actualItem4 = $this->cacheItemPool->getItem($key4);

        $expectedContent = [
            $key1 => $expectedItem1,
            $key2 => $expectedItem2,
            $key3 => $expectedItem3,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($expectedItem2, $actualItem2);
        $this->assertEquals($expectedItem3, $actualItem3);
        $this->assertEquals($initialItem, $actualItem4);
        $this->assertEquals($expectedContent, $actualContent);
    }

    public function testSaveDeferredReturnsBool()
    {
        $item = new CacheItem('some_key');
        $result = $this->cacheItemPool->saveDeferred($item);

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

    public function testSaveDeferredWithGetItem()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();
        $key4 = 'unexistent';

        $initialItem = new CacheItem('-');

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);

        $result = $this->cacheItemPool->saveDeferred($expectedItem1);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);
        $actualItem4 = $this->cacheItemPool->getItem($key4);

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($initialItem, $actualItem2);
        $this->assertEquals($initialItem, $actualItem3);
        $this->assertEquals($initialItem, $actualItem4);

        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);

        $result = $this->cacheItemPool->saveDeferred($expectedItem2);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);
        $actualItem4 = $this->cacheItemPool->getItem($key4);

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($expectedItem2, $actualItem2);
        $this->assertEquals($initialItem, $actualItem3);
        $this->assertEquals($initialItem, $actualItem4);

        $expectedItem3 = new CacheItem($key3);
        $expectedItem3->set($value3);

        $result = $this->cacheItemPool->saveDeferred($expectedItem3);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);
        $actualItem4 = $this->cacheItemPool->getItem($key4);

        $this->assertTrue($result);
        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($expectedItem2, $actualItem2);
        $this->assertEquals($expectedItem3, $actualItem3);
        $this->assertEquals($initialItem, $actualItem4);

        $actualContent = $this->getStoredContent();

        $this->assertEquals([], $actualContent);
    }

    public function testClearReturnsBool()
    {
        $result = $this->cacheItemPool->clear();

        $this->assertIsBool($result);
    }

    public function testClearWhenStorageDoesNotExist()
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

        $result1 = $this->cacheItemPool->clear();

        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result1);
        $this->assertEmpty($actualItems1);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);
        $this->cacheItemPool->save($item3);

        $this->deleteContentStorage();

        $result2 = $this->cacheItemPool->clear();

        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result2);
        $this->assertEmpty($actualItems2);
    }

    public function testClearWhenStorgeIsNotAccessible()
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

        $result1 = $this->cacheItemPool->clear();

        $actualItems1 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertTrue($result1);
        $this->assertEmpty($actualItems1);

        $this->cacheItemPool->save($item1);
        $this->cacheItemPool->save($item2);
        $this->cacheItemPool->save($item3);

        $this->makeUnaccessibleContentStorage();

        $result2 = $this->cacheItemPool->clear();

        $actualItems2 = $this->cacheItemPool->getItems([$key1, $key2, $key3]);

        $this->assertFalse($result2);
        $this->assertEmpty($actualItems2);
    }

    public function testClear()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();
        $initialItem = new CacheItem('-');

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);
        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);
        $expectedItem3 = new CacheItem($key3);
        $expectedItem3->set($value3);

        $this->cacheItemPool->save($expectedItem1);
        $this->cacheItemPool->save($expectedItem2);
        $this->cacheItemPool->save($expectedItem3);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);

        $expectedContent = [
            $key1 => $expectedItem1,
            $key2 => $expectedItem2,
            $key3 => $expectedItem3,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($expectedItem2, $actualItem2);
        $this->assertEquals($expectedItem3, $actualItem3);
        $this->assertEquals($expectedContent, $actualContent);

        $result = $this->cacheItemPool->clear();

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);

        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($initialItem, $actualItem1);
        $this->assertEquals($initialItem, $actualItem2);
        $this->assertEquals($initialItem, $actualItem3);
        $this->assertEmpty($actualContent);
    }

    public function testCommitReturnsBool()
    {
        $result = $this->cacheItemPool->commit();

        $this->assertIsBool($result);
    }

    public function testCommitWhenStorageDoesNotExist()
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

        $actualContent = $this->getStoredContent();

        $this->assertEquals([], $actualContent);

        $result = $this->cacheItemPool->commit();

        $expectedContent = [
            $key1 => $item1,
            $key2 => $item2,
            $key3 => $item3,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($expectedContent, $actualContent);

        $this->cacheItemPool->saveDeferred($item1);
        $this->cacheItemPool->saveDeferred($item2);
        $this->cacheItemPool->saveDeferred($item3);

        $this->deleteContentStorage();

        $result = $this->cacheItemPool->commit();

        $expectedContent = [
            $key1 => $item1,
            $key2 => $item2,
            $key3 => $item3,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($expectedContent, $actualContent);
    }

    public function testCommitWhenStorgeIsNotAccessible()
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

        $actualContent = $this->getStoredContent();

        $this->assertEquals([], $actualContent);

        $result = $this->cacheItemPool->commit();

        $expectedContent = [
            $key1 => $item1,
            $key2 => $item2,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($expectedContent, $actualContent);

        $this->cacheItemPool->saveDeferred($item3);

        $this->makeUnaccessibleContentStorage();

        $result = $this->cacheItemPool->commit();

        $this->makeAccessibleContentStorage();

        $actualContent = $this->getStoredContent();

        $this->assertFalse($result);
        $this->assertEquals($expectedContent, $actualContent);
    }

    public function testCommit()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideItemElements();

        $expectedItem1 = new CacheItem($key1);
        $expectedItem1->set($value1);
        $expectedItem2 = new CacheItem($key2);
        $expectedItem2->set($value2);
        $expectedItem3 = new CacheItem($key3);
        $expectedItem3->set($value3);

        $this->cacheItemPool->saveDeferred($expectedItem1);
        $this->cacheItemPool->saveDeferred($expectedItem2);
        $this->cacheItemPool->saveDeferred($expectedItem3);

        $actualItem1 = $this->cacheItemPool->getItem($key1);
        $actualItem2 = $this->cacheItemPool->getItem($key2);
        $actualItem3 = $this->cacheItemPool->getItem($key3);

        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedItem1, $actualItem1);
        $this->assertEquals($expectedItem2, $actualItem2);
        $this->assertEquals($expectedItem3, $actualItem3);
        $this->assertEquals([], $actualContent);

        $this->cacheItemPool->commit();

        $expectedContent = [
            $key1 => $expectedItem1,
            $key2 => $expectedItem2,
            $key3 => $expectedItem3,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedContent, $actualContent);
    }

    /**
     * Read content from the persistance source.
     *
     * @return array
     */
    private function getStoredContent(): array
    {
        return unserialize(file_get_contents(self::STORAGE_FILE_ABSOLUTE_PATH)) ?: [];
    }

    /**
     * Create persistance source.
     */
    private function createContentStorage(): void
    {
        file_put_contents(self::STORAGE_FILE_ABSOLUTE_PATH, '');
    }

    /**
     * Delete persistance source.
     */
    private function deleteContentStorage(): void
    {
        unlink(self::STORAGE_FILE_ABSOLUTE_PATH);
    }

    /**
     * Make persistance source unaccessible due to permissions mode.
     */
    private function makeUnaccessibleContentStorage(): void
    {
        chmod(self::STORAGE_FILE_ABSOLUTE_PATH, 0000);
    }

    /**
     * Make persistance source unaccessible due to permissions mode.
     */
    private function makeAccessibleContentStorage(): void
    {
        chmod(self::STORAGE_FILE_ABSOLUTE_PATH, 0777);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->cacheItemPool = new CacheItemPool(self::STORAGE_FILE_ABSOLUTE_PATH);
        $this->createContentStorage();
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
        $this->deleteContentStorage();
    }
}
