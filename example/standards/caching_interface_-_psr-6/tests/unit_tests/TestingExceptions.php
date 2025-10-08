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

trait TestingExceptions
{
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
    protected function buildArgumentTypeErrorMessagePattern(
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
}
