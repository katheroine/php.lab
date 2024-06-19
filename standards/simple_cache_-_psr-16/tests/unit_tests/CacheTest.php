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
     * Test if Cache class has been created.
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

    public function testGetWhenStorgeDoesNotExist()
    {
        $this->setUpStoredContent();
        list(
            list($key1, $value1),
            list($key2),
        ) = $this->provideContentElements();

        $result = $this->cache->get($key1);
        $this->assertEquals($value1, $result);

        $this->deleteContentStorage();

        $result = $this->cache->get($key2);
        $this->assertFalse($result);

        $this->createContentStorage();
    }

    public function testGet()
    {
        $this->setUpStoredContent();
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
        ) = $this->provideContentElements();

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

    public function testSetWhenStorgeDoesNotExist()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
        ) = $this->provideContentElements();

        $result = $this->cache->set($key1, $value1);
        $this->assertTrue($result);

        $this->deleteContentStorage();

        $result = $this->cache->set($key2, $value2);
        $this->assertFalse($result);

        $this->createContentStorage();
    }

    public function testSet()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideContentElements();

        $result = $this->cache->set($key1, $value1);

        $expectedContent = [
            $key1 => $value1,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedContent, $actualContent);
        $this->assertEquals(true, $result);

        $result = $this->cache->set($key2, $value2);

        $expectedContent = [
            $key1 => $value1,
            $key2 => $value2,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedContent, $actualContent);
        $this->assertEquals(true, $result);

        $result = $this->cache->set($key3, $value3);

        $expectedContent = [
            $key1 => $value1,
            $key2 => $value2,
            $key3 => $value3,
        ];
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedContent, $actualContent);
        $this->assertEquals(true, $result);
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

    public function testDeleteWhenStorgeDoesNotExist()
    {
        $this->setUpStoredContent();
        list(
            list($key1),
            list($key2),
        ) = $this->provideContentElements();

        $result = $this->cache->delete($key1);
        $this->assertTrue($result);

        $this->deleteContentStorage();

        $result = $this->cache->delete($key2);
        $this->assertFalse($result);

        $this->createContentStorage();
    }

    /**
     * @dataProvider keyValueDataProvider
     */
    public function testDelete($situation, $key, $expectedResult)
    {
        $this->setUpStoredContent();
        $expectedContent = $this->provideContent();

        $title = $situation . ' ' . $key;

        $actualResult = $this->cache->delete($key);

        unset($expectedContent[$key]);
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedResult, $actualResult, $title);
        $this->assertEquals($expectedContent, $actualContent, $title);
    }

    public function testClear()
    {
        $this->setUpStoredContent();

        $this->cache->clear();

        $content = $this->getStoredContent();

        $this->assertEmpty($content);
    }

    public function testHasWhenKeyHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'has',
            argumentName: 'key',
            argumentProperType: 'string',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cache->has(null);
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

    public function testGetMultipleWhenSingleKeyHasWrongType()
    {
        $expectedExceptionMessage = "Argument keys item with index 0 must be type of string, NULL given";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cache->getMultiple([null]);
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

    public function testGetMultipleWhenStorgeDoesNotExist()
    {
        $this->setUpStoredContent();
        list(
            list($key1, $expectedValue1),
            list($key2),
            list($key3, $expectedValue3)
        ) = $this->provideContentElements();

        $actualValues13 = $this->cache->getMultiple([$key1, $key3]);
        $this->assertEquals([
            $key1 => $expectedValue1,
            $key3 => $expectedValue3
        ], $actualValues13);

        $this->deleteContentStorage();

        $result = $this->cache->getMultiple([$key2, $key1]);
        $this->assertEmpty($result);

        $this->createContentStorage();
    }

    public function testGetMultiple()
    {
        $this->setUpStoredContent();
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3)
        ) = $this->provideContentElements();

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

    public function testSetMultipleWhenSingleKeyHasWrongType()
    {
        $expectedExceptionMessage = "Argument values item with index 0 key must be type of string, integer given";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cache->setMultiple([1 => 'Some value.']);
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

    public function testSetMultipleWhenStorgeDoesNotExist()
    {
        $this->setUpStoredContent();
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3)
        ) = $this->provideContentElements();

        $result = $this->cache->setMultiple([
            $key1 => $value1,
            $key2 => $value2,
        ]);
        $this->assertTrue($result);

        $this->deleteContentStorage();

        $result = $this->cache->setMultiple([
            $key3 => $value3,
        ]);
        $this->assertFalse($result);

        $this->createContentStorage();
    }

    public function testSetMultiple()
    {
        list(
            list($key1, $value1),
            list($key2, $value2),
            list($key3, $value3),
        ) = $this->provideContentElements();

        $expectedValues = [
            $key3 => $value3,
            $key1 => $value1,
        ];
        $result = $this->cache->setMultiple($expectedValues);
        $actualValues = $this->getStoredContent();
        $this->assertEquals($expectedValues, $actualValues);
        $this->assertEquals(true, $result);

        $expectedValues = [
            $key3 => $value3,
            $key1 => $value1,
            $key2 => $value2,
        ];
        $result = $this->cache->setMultiple([
            $key2 => $value2,
        ]);
        $actualValues = $this->getStoredContent();
        $this->assertEquals($expectedValues, $actualValues);
        $this->assertEquals(true, $result);
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

    public function testDeleteMultipleWhenSingleKeyHasWrongType()
    {
        $expectedExceptionMessage = "Argument keys item with index 0 must be type of string, NULL given";

        $this->expectException(self::PSR_INVALID_ARGUMENT_EXCEPTION_FULLY_QUALIFIED_CLASS_NAME);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $this->cache->deleteMultiple([null]);
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

    public function testDeleteMultipleWhenKeyHasNoRelatedValue()
    {
        $this->setUpStoredContent();

        $expectedContent = $this->provideContent();

        $result = $this->cache->deleteMultiple(['unexistent']);

        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedContent, $actualContent);
        $this->assertTrue($result);
    }

    public function testDeleteMultipleWhenStorgeDoesNotExist()
    {
        $this->setUpStoredContent();
        list(
            list($key1),
            list($key2),
            list($key3),
        ) = $this->provideContentElements();

        $result = $this->cache->deleteMultiple([
            $key3,
            $key1,
        ]);
        $this->assertTrue($result);

        $this->deleteContentStorage();

        $result = $this->cache->deleteMultiple([
            $key2,
        ]);
        $this->assertFalse($result);
    }

    public function testDeleteMultiple()
    {
        $this->setUpStoredContent();
        list(
            list($key1),
            list($key2, $value2),
            list($key3),
        ) = $this->provideContentElements();

        $expectedContent = [
            $key2 => $value2,
        ];
        $result = $this->cache->deleteMultiple([
            $key3,
            $key1,
        ]);
        $actualContent = $this->getStoredContent();
        $this->assertEquals($expectedContent, $actualContent);
        $this->assertTrue($result);

        $expectedContent = [];
        $result = $this->cache->deleteMultiple([
            $key2,
        ]);
        $actualContent = $this->getStoredContent();
        $this->assertEquals($expectedContent, $actualContent);
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
     * Provide key - value pairs and the correct results
     * of the value retrieving process for for each case.
     *
     * @return array
     */
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
     * Save content fixture in the persistance source.
     *
     * @return void
     */
    private function setUpStoredContent(): void
    {
        $content = $this->provideContent();

        $this->setStoredContent($content);
    }

    /**
     * Read content fixture from the persistance source.
     *
     * @return array
     */
    private function provideContent(): array
    {
        list(
            list($key1, $expectedValue1),
            list($key2, $expectedValue2),
            list($key3, $expectedValue3),
        ) = $this->provideContentElements();

        $content = [
            $key1 => $expectedValue1,
            $key2 => $expectedValue2,
            $key3 => $expectedValue3,
        ];

        return $content;
    }

    /**
     * Provide key - value pairs of the content fixture.
     *
     * @return array
     */
    private function provideContentElements(): array
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

    /**
     * Save content in the persistance source.
     *
     * @return void
     */
    private function setStoredContent(array $content): void
    {
        file_put_contents(self::STORAGE_FILE_ABSOLUTE_PATH, serialize($content));
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
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->cache = new Cache(self::STORAGE_FILE_ABSOLUTE_PATH);
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
