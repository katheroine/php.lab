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

namespace PHPLab\StandardPSR3;

use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    /**
     * @var string
     */
    private const LOGGER_FULLY_QUALIFIED_CLASS_NAME = 'PHPLab\\StandardPSR3\\Logger';
    private const PSR_LOGGER_FULLY_QUALIFIED_INTERFACE_NAME = 'Psr\\Log\\LoggerInterface';

    /**
     * Instance of tested class.
     *
     * @var Logger
     */
    private Logger $logger;

    /**
     * Test if Logger class
     * has been created.
     */
    public function testLoggerClassExists()
    {
        $this->assertTrue(
            class_exists(self::LOGGER_FULLY_QUALIFIED_CLASS_NAME)
        );
    }

    /**
     * Test Logger class implements Psr\Log\LoggerInterface.
     */
    public function testImplementsPsrLoggerInterface()
    {
        $this->assertImplements($this->logger, self::PSR_LOGGER_FULLY_QUALIFIED_INTERFACE_NAME);
    }

    public function testConstructorWhenArgumentHasWrongType()
    {
        $loggerClassName = self::LOGGER_FULLY_QUALIFIED_CLASS_NAME;

        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName: '__construct',
            argumentName: 'logsFilePath',
            argumentProperType: 'string',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        new $loggerClassName(null);
    }

    /**
     * @dataProvider loggerInterfaceMethodsProvider
     */
    public function testLoggerInterfaceMethodsWhenItsMessageArgumentHasWrongType(string $methodName)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            $methodName,
            argumentName: 'message',
            argumentProperType: 'Stringable|string',
            argumentGivenType: 'null',
            argumentNumber: 1
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->logger->$methodName(null, []);
    }

    /**
     * @dataProvider loggerInterfaceMethodsProvider
     */
    public function testLoggerInterfaceMethodsWhenItsContextArgumentHasWrongType(string $methodName)
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            $methodName,
            argumentName: 'context',
            argumentProperType: 'array',
            argumentGivenType: 'null',
            argumentNumber: 2
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->logger->$methodName('', null);
    }

    public function testLogWhenItsMessageArgumentHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName:'log',
            argumentName: 'message',
            argumentProperType: 'Stringable|string',
            argumentGivenType: 'null',
            argumentNumber: 2
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->logger->log('', null, []);
    }

    public function testLogWhenItsContextArgumentHasWrongType()
    {
        $expectedErrorMessagePattern = $this->buildArgumentTypeErrorMessagePattern(
            methodName:'log',
            argumentName: 'context',
            argumentProperType: 'array',
            argumentGivenType: 'null',
            argumentNumber: 3
        );

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessageMatches($expectedErrorMessagePattern);

        $this->logger->log('', '', null);
    }

    /**
     * Provide file paths
     * and appropriate extension.
     *
     * @return array
     */
    public static function loggerInterfaceMethodsProvider(): array
    {
        return [
            ['emergency'],
            ['alert'],
            ['critical'],
            ['error'],
            ['warning'],
            ['notice'],
            ['info'],
            ['debug'],
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

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->logger = new Logger('');
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }
}
