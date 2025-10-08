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

use DateTime;

class CacheItemTest extends CacheTestCase
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
    public function testImplementsPsrCacheItemInterface()
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

    public function testExpiresAtReturnsSelf()
    {
        $result = $this->cacheItem->expiresAt(new DateTime());

        $this->assertSame($this->cacheItem, $result);
    }

    public function testExpiresAtWhenExpirationIsNull()
    {
        $expectedValue = 'Some value';

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);

        $this->cacheItem->set($expectedValue);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        $this->cacheItem->expiresAt(null);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        sleep(1);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);
    }

    /**
     * @dataProvider times
     */
    public function testExpiresAtWhenExpirationIsDateTime(int $time)
    {
        $expiration = new \DateTime('+' . $time . ' second');
        $expectedValue = 'Some value';

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);

        $this->cacheItem->set($expectedValue);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        $this->cacheItem->expiresAt($expiration);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        sleep($time + 1);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);
    }

    /**
     * @dataProvider invalidTypeExpirations
     */
    public function testExpiresAtWhenExpirationHasWrongType(mixed $expiration, string $wrongExpirationType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'expiresAt',
            argumentName: 'expiration',
            argumentProperType: '?DateTimeInterface',
            argumentGivenType: $wrongExpirationType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItem->expiresAt($expiration);
    }

    public function testExpiresAfterReturnsSelf()
    {
        $result = $this->cacheItem->expiresAfter(1);

        $this->assertSame($this->cacheItem, $result);

        $result = $this->cacheItem->expiresAfter(new \DateInterval('PT1S'));

        $this->assertSame($this->cacheItem, $result);
    }

    /**
     * @dataProvider invalidTypeTimes
     */
    public function testExpiresAfterWhenExpirationHasWrongType(mixed $time, string $wrongTimeType)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: 'expiresAfter',
            argumentName: 'time',
            argumentProperType: 'DateInterval|int|null',
            argumentGivenType: $wrongTimeType,
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->cacheItem->expiresAfter($time);
    }

    public function testExpiresAfterWhenTimeIsNull()
    {
        $expectedValue = 'Some value';

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);

        $this->cacheItem->set($expectedValue);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        $this->cacheItem->expiresAfter(null);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        sleep(1);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);
    }

    /**
     * @dataProvider times
     */
    public function testExpiresAfterWhenTimeIsInteger(int $timeAsInteger)
    {
        $expectedValue = 'Some value';

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);

        $this->cacheItem->set($expectedValue);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        $this->cacheItem->expiresAfter($timeAsInteger);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        sleep($timeAsInteger + 1);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);
    }

    /**
     * @dataProvider times
     */
    public function testExpiresAfterWhenTimeIsDateInterval(int $timeAsInteger)
    {
        $timeAsDateInterval = new \DateInterval('PT' . $timeAsInteger . 'S');
        $expectedValue = 'Some value';

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);

        $this->cacheItem->set($expectedValue);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        $this->cacheItem->expiresAfter($timeAsDateInterval);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertTrue($hitResult);
        $this->assertSame($expectedValue, $actualValue);

        sleep($timeAsInteger + 1);

        $hitResult = $this->cacheItem->isHit();
        $actualValue = $this->cacheItem->get();
        $this->assertFalse($hitResult);
        $this->assertNull($actualValue);
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
