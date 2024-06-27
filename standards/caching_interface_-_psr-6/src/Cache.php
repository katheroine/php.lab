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
     * @param array $keys
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function validateKeys(iterable $keys): void
    {
        foreach ($keys as $index => $key) {
            $this->validateKeysItem($key, $index);
        }
    }

    /**
     * @param mixed $keysItem
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateKeysItem(mixed $keysItem, int $index): void
    {
        $this->validateArgumentKey(
            key: $keysItem,
            index: $index,
            messageInvalidType: "Argument keys item with index %s must be type of string, %s given",
            messageForbiddenCharacter: "Argument keys item with index %s contains forbidden character %s"
        );
    }

    /**
     * @param mixed $key
     * @param int $index
     * @param string $messageInvalidType Message for the invalid key type exception
     * with format for sprinft with index and type placeholders.
     * @param string $messageForbiddenCharacter Message for the forbidden character in key exception
     * with format for sprinft with index and forbidden character placeholders.
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function validateArgumentKey(mixed $key, int $index, string $messageInvalidType, string $messageForbiddenCharacter): void
    {
        if (! is_string($key)) {
            $type = gettype($key);

            throw new InvalidArgumentException(sprintf($messageInvalidType, $index, $type));
        }

        if (strlen($key) < 1) {
            throw new InvalidArgumentException("Argument keys item with index {$index} should consist of at least one character");
        }

        foreach (self::KEY_FORBIDDEN_CHARACTERS as $forbiddenCharacter) {
            if (str_contains((string) $key, $forbiddenCharacter)) {
                throw new InvalidArgumentException(sprintf($messageForbiddenCharacter, $index, $forbiddenCharacter));
            }
        }
    }

    /**
     * @param string $key
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    protected function validateKey(string $key): void
    {
        if (strlen($key) < 1) {
            throw new InvalidArgumentException("Argument key should consist of at least one character");
        }

        foreach (self::KEY_FORBIDDEN_CHARACTERS as $forbiddenCharacter) {
            if (str_contains($key, $forbiddenCharacter)) {
                throw new InvalidArgumentException("Argument key contains forbidden character {$forbiddenCharacter}");
            }
        }
    }
}
