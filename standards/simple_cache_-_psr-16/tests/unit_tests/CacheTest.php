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

    public function testGetWhenKeyHasNoRelatedValue()
    {
        $value = $this->cache->get('unexistent');

        $this->assertEquals(null, $value);
    }

    public function testGet()
    {
        $key = 'some_key';
        $expectedValue = 'Some value';

        $this->setStoredContent([
            $key => $expectedValue,
        ]);

        $actualValue = $this->cache->get($key);

        $this->assertEquals($expectedValue, $actualValue);
    }

    public function testGetMultipleTimes()
    {
        $key1 = 'some_key';
        $expectedValue1 = 'Some value';
        $key2 = 'other.key';
        $expectedValue2 = 87539;
        $key3 = 'ANOTHERkey10';
        $expectedValue3 = ['color' => 'orange'];

        $this->setStoredContent([
            $key1 => $expectedValue1,
            $key2 => $expectedValue2,
            $key3 => $expectedValue3,
        ]);

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

        $this->expectException(\InvalidArgumentException::class);
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
    }

    public function testSetMultipleTimes()
    {
        $key1 = 'some_key';
        $expectedValue1 = 'Some value';
        $key2 = 'other.key';
        $expectedValue2 = 87539;
        $key3 = 'ANOTHERkey10';
        $expectedValue3 = ['color' => 'orange'];

        $this->setStoredContent([
            $key1 => $expectedValue1,
            $key2 => $expectedValue2,
            $key3 => $expectedValue3,
        ]);

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

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

        $key = $character . 'some_key';

        $this->cache->delete($key);
    }

    /**
     * @dataProvider deletionDataProvider
     */
    public function testDelete($situation, $key, $expectedResult)
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

        $title = $situation . ' ' . $key;

        $actualResult = $this->cache->delete($key);

        unset($expectedContent[$key]);
        $actualContent = $this->getStoredContent();

        $this->assertEquals($expectedResult, $actualResult, $title);
        $this->assertEquals($expectedContent, $actualContent, $title);
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

    public static function deletionDataProvider(): array
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
