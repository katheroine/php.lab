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
    private const PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME = 'Psr\\SimpleCache\\InvalidArgumentException';
    protected const STORAGE_FILE_ABSOLUTE_PATH = __DIR__
        . DIRECTORY_SEPARATOR . '/../fixtures/var/psr16cache.storage';

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

    public function testConstructorWhenArgumentHasWrongType()
    {
        $cacheClassName = self::CACHE_FULLY_QUALIFIED_CLASS_NAME;

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

    public function testGetWhenKeyHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'get',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->get(null);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testGetWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cache->get($key);
    }

    public function testGetWhenKeyHasNoRelatedValue()
    {
        $this->setUpStoredContent();

        $value = $this->cache->get('unexistent');

        $this->assertNull($value);
    }

    public function testGetWhenKeyHasNoRelatedValueAndDefaultIsSet()
    {
        $this->setUpStoredContent();

        $expectedValue = 'none';
        $actualValue = $this->cache->get('unexistent', $expectedValue);

        $this->assertEquals($expectedValue, $actualValue);
    }

    public function testGet()
    {
        list(
            list($key, $expectedValue),
        ) = $this->setUpStoredContent();

        $actualValue = $this->cache->get($key);

        $this->assertEquals($expectedValue, $actualValue);
    }

    public function testGetSeveralTimes()
    {
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
        ) = $this->setUpStoredContent();

        $actualValue3 = $this->cache->get($key3);
        $this->assertEquals($expectedValue3, $actualValue3);

        $actualValue1 = $this->cache->get($key1);
        $this->assertEquals($expectedValue1, $actualValue1);

        $actualValue2 = $this->cache->get($key2);
        $this->assertEquals($expectedValue2, $actualValue2);
    }

    public function testSetWhenKeyHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'set',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->set(null, 'Some value.');
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testSetWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cache->set($key, 'Some value.');
    }

    public function testSet()
    {
        $key = 'some_key';
        $expectedValue = 'Some value';

        $result = $this->cache->set($key, $expectedValue);

        $content = $this->getStoredContent();
        $actualValue = $content[$key];

        $this->assertEquals($expectedValue, $actualValue);
        $this->assertEquals(true, $result);
    }

    public function testSetSeveralTimes()
    {
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
        ) = $this->setUpStoredContent();

        $result3 = $this->cache->set($key3, $expectedValue3);
        $result1 = $this->cache->set($key1, $expectedValue1);
        $result2 = $this->cache->get($key2, $expectedValue2);

        $content = $this->getStoredContent();
        $actualValue1 = $content[$key1];
        $actualValue2 = $content[$key2];
        $actualValue3 = $content[$key3];

        $this->assertEquals($expectedValue1, $actualValue1);
        $this->assertEquals($expectedValue2, $actualValue2);
        $this->assertEquals($expectedValue3, $actualValue3);

        $this->assertEquals(true, $result1);
        $this->assertEquals(true, $result2);
        $this->assertEquals(true, $result3);
    }

    public function testDeleteWhenKeyHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'delete',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->delete(null);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testDeleteWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cache->delete($key);
    }

    /**
     * @dataProvider keyValueDataProvider
     */
    public function testDelete($situation, $key, $expectedResult)
    {
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
            $expectedContent
        ) = $this->setUpStoredContent();

        $title = $situation . ' ' . $key;

        $actualResult = $this->cache->delete($key);

        unset($expectedContent[$key]);
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedResult, $actualResult, $title);
        $this->assertEquals($expectedContent, $actualContent, $title);
    }

    public function testClear()
    {
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
        ) = $this->setUpStoredContent();

        $this->cache->clear();

        $content = $this->getStoredContent();

        $this->assertEmpty($content);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testHasWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument key contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cache->has($key);
    }

    /**
     * @dataProvider keyValueDataProvider
     */
    public function testHas($situation, $key, $expectedResult)
    {
        $this->setUpStoredContent();

        $title = $situation . ' ' . $key;

        $actualResult = $this->cache->has($key);

        $this->assertEquals($expectedResult, $actualResult, $title);
    }

    public function testGetMultipleWhenKeysHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'getMultiple',
            argumentName: 'keys',
            argumentProperType: 'Traversable|array',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->getMultiple(null);
    }

    public function testGetMultipleWhenKeysIsNotIterableAndNotTraversable()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'getMultiple',
            argumentName: 'keys',
            argumentProperType: 'Traversable|array',
            argumentGivenType: 'string',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->getMultiple('orange');
    }

    public function testGetMultipleWhenKeysIsIterableAndNotTraversable()
    {
        $result = $this->cache->getMultiple([]);

        $this->assertTrue(is_iterable($result));
    }

    public function testGetMultipleWhenKeysIsIterableAndTraversable()
    {
        $result = $this->cache->getMultiple(new \ArrayObject([]));

        $this->assertTrue(is_iterable($result));

        $result = $this->cache->getMultiple(new \ArrayIterator([]));

        $this->assertTrue(is_iterable($result));
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testGetMultipleWhenKeysNamesContainForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument keys item with index 0 contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $keys = [
            $key,
        ];

        $this->cache->getMultiple($keys);
    }

    public function testGetMultipleWhenKeyHasNoRelatedValue()
    {
        $this->setUpStoredContent();

        $value = $this->cache->getMultiple(['unexistent']);

        $this->assertEmpty($value);
    }

    public function testGetMultipleWhenKeyHasNoRelatedValueAndDefaultIsSet()
    {
        $this->setUpStoredContent();

        $expectedValue = ['none'];
        $actualValue = $this->cache->getMultiple(['unexistent'], $expectedValue);

        $this->assertEquals($expectedValue, $actualValue);
    }

    public function testGetMultiple()
    {
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
        ) = $this->setUpStoredContent();

        $actualValues13 = $this->cache->getMultiple([$key1, $key3]);
        $this->assertEquals([
            $key1 => $expectedValue1,
            $key3 => $expectedValue3
        ], $actualValues13);

        $actualValues21 = $this->cache->getMultiple([$key2, $key1]);
        $this->assertEquals([
            $key2 => $expectedValue2,
            $key1 => $expectedValue1
        ], $actualValues21);

        $actualValues23 = $this->cache->getMultiple([$key2, $key3]);
        $this->assertEquals([
            $key2 => $expectedValue2,
            $key3 => $expectedValue3
        ], $actualValues23);
    }

    public function testSetMultipleWhenValuesHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'setMultiple',
            argumentName: 'values',
            argumentProperType: 'Traversable|array',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->setMultiple(null);
    }

    public function testSetMultipleWhenValuesIsNotIterableAndNotTraversable()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'setMultiple',
            argumentName: 'values',
            argumentProperType: 'Traversable|array',
            argumentGivenType: 'string',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->setMultiple('orange');
    }

    public function testSetMultipleWhenValuesIsIterableAndNotTraversable()
    {
        $result = $this->cache->setMultiple([]);

        $this->assertTrue($result);
    }

    public function testSetMultipleWhenValuesIsIterableAndTraversable()
    {
        $result = $this->cache->setMultiple(new \ArrayObject([]));

        $this->assertTrue($result);

        $result = $this->cache->setMultiple(new \ArrayIterator([]));

        $this->assertTrue($result);
    }

    public function testSetMultiple()
    {
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
        ) = $this->setUpStoredContent();

        $expectedValues = [
            $key3 => $expectedValue3,
            $key1 => $expectedValue1,
            $key2 => $expectedValue2,
        ];

        $result = $this->cache->setMultiple($expectedValues);

        $actualValues = $this->getStoredContent();

        $this->assertEquals($expectedValues, $actualValues);
        $this->assertEquals(true, $result);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testSetMultipleWhenKeysNamesContainForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument keys item with index 0 contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $values = [
            $key => 'Some value.',
        ];

        $this->cache->setMultiple($values);
    }

    public function testDeleteMultipleWhenKeysHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'deleteMultiple',
            argumentName: 'keys',
            argumentProperType: 'Traversable|array',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->deleteMultiple(null);
    }

    public function testDeleteMultipleWhenKeysIsNotIterableAndNotTraversable()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'deleteMultiple',
            argumentName: 'keys',
            argumentProperType: 'Traversable|array',
            argumentGivenType: 'string',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->deleteMultiple('orange');
    }

    public function testDeleteMultipleWhenKeysIsIterableAndNotTraversable()
    {
        $result = $this->cache->deleteMultiple([]);

        $this->assertTrue($result);
    }

    public function testDeleteMultipleWhenKeysIsIterableAndTraversable()
    {
        $result = $this->cache->deleteMultiple(new \ArrayObject([]));

        $this->assertTrue($result);

        $result = $this->cache->deleteMultiple(new \ArrayIterator([]));

        $this->assertTrue($result);
    }

    /**
     * @dataProvider keyNameForbiddenCharacters
     */
    public function testDeleteMultipleWhenKeyNameContainsForbiddenCharacters($character)
    {
        $expectedExceptionMessage = "Argument keys item with index 0 contains forbidden character {$character}";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $keys = [
            $key,
        ];

        $this->cache->deleteMultiple($keys);
    }

    public function testDeleteMultiple()
    {
        list(
            list($key1),
            ,
            list($key3),
            $expectedContent
        ) = $this->setUpStoredContent();

        $result = $this->cache->deleteMultiple([
            $key3,
            $key1
        ]);

        unset($expectedContent[$key1]);
        unset($expectedContent[$key3]);
        $actualContent = $this->getStoredContent();

        $this->assertTrue($result);
        $this->assertEquals($expectedContent, $actualContent);
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

    public static function keyValueDataProvider(): array
    {
        return [
            [
                'situation' => 'Unexistent key',
                'key' => 'unexistent',
                'expectedResult' => false,
            ],
            [
                'situation' => 'Existent key',
                'key' => 'other.key',
                'expectedResult' => true,
            ],
            [
                'situation' => 'Low caps version of existent key',
                'key' => 'anotherkey10',
                'expectedResult' => false,
            ],
            [
                'situation' => 'Existent key',
                'key' => 'ANOTHERkey10',
                'expectedResult' => true,
            ],
            [
                'situation' => 'High caps version of existent key',
                'key' => 'SOME_key',
                'expectedResult' => false,
            ],
            [
                'situation' => 'Existent key',
                'key' => 'some_key',
                'expectedResult' => true,
            ],
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

    private function buildArgumentTypeErrorMessagePattern(
        string $methodName,
        string $argumentName,
        string $argumentProperType,
        string $argumentGivenType,
        int $argumentNumber
    ) {
        $messagePattern = '/' . preg_quote(
            "::{$methodName}(): "
            . 'Argument #' . strval($argumentNumber)
            . " (\${$argumentName}) must be of type {$argumentProperType}, "
            . "{$argumentGivenType} given"
        ) . '/';

        return $messagePattern;
    }

    private function setUpStoredContent(): array
    {
        $key1 = 'some_key';
        $expectedValue1 = 'Some value';
        $key2 = 'other.key';
        $expectedValue2 = 87539;
        $key3 = 'ANOTHERkey10';
        $expectedValue3 = ['color' => 'orange'];

        $expectedContent = [
            $key1 => $expectedValue1,
            $key2 => $expectedValue2,
            $key3 => $expectedValue3,
        ];

        $this->setStoredContent($expectedContent);

        return [
            [$key1, $expectedValue1],
            [$key2, $expectedValue2],
            [$key3, $expectedValue3],
            $expectedContent
        ];
    }

    private function setStoredContent(array $content): void
    {
        file_put_contents(self::STORAGE_FILE_ABSOLUTE_PATH, serialize($content));
    }

    private function getStoredContent(): array
    {
        return unserialize(file_get_contents(self::STORAGE_FILE_ABSOLUTE_PATH)) ?: [];
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->cache = new Cache(self::STORAGE_FILE_ABSOLUTE_PATH);
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
        file_put_contents(self::STORAGE_FILE_ABSOLUTE_PATH, '');
    }
}
