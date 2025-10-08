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

abstract class Cache
{
    /**
     * Characters that cannot be contained by the key name.
     *
     * @var array
     */
    protected const KEY_FORBIDDEN_CHARACTERS = ['{', '}', '(', ')', '/', '\\', '@', ':'];

    /**
     * @param string $key
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function validateKey(string $key): void
    {
        $this->validateKeyAgainstLength($key);
        $this->validateKeyAgainstForbiddenCharacters($key);
    }

    /**
     * @param array $keys
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function validateKeys(iterable $keys): void
    {
        foreach ($keys as $index => $key) {
            $this->validateKeyAgainstType($key, $index);
            $this->validateKeyAgainstLength($key, $index);
            $this->validateKeyAgainstForbiddenCharacters($key, $index);
        }
    }

    private function validateKeyAgainstType(mixed $key, int $index)
    {
        if (! is_string($key)) {
            $type = gettype($key);
            $message = "Argument keys item with index %s must be type of string, %s given";

            throw new InvalidArgumentException(sprintf($message, $index, $type));
        }
    }

    private function validateKeyAgainstLength(mixed $key, ?int $index = null)
    {
        if (is_null($index)) {
            $message = "Argument key should consist of at least one character";
        } else {
            $message = "Argument keys item with index {$index} should consist of at least one character";
        }

        if (strlen($key) < 1) {
            throw new InvalidArgumentException($message);
        }
    }

    private function validateKeyAgainstForbiddenCharacters(mixed $key, ?int $index = null)
    {
        if (is_null($index)) {
            $message = "Argument key contains forbidden character %s";
        } else {
            $message = "Argument keys item with index {$index} contains forbidden character %s";
        }

        foreach (self::KEY_FORBIDDEN_CHARACTERS as $forbiddenCharacter) {
            if (str_contains($key, $forbiddenCharacter)) {
                throw new InvalidArgumentException(sprintf($message, $forbiddenCharacter));
            }
        }
    }
}
