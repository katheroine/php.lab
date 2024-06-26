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
