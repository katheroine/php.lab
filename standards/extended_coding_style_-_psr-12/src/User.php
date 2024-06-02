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

namespace PHPLab\StandardPSR12;

class User
{
    public const STATUS_HALTING = 'halting';
    public const STATUS_CERTAIN = 'certain';
    public const STATUS_INVOLVED = 'involved';

    public bool $registered = true;
    public int $level = 0;
    public string $firstName;
    public string $middleName;
    public string $lastName;
    public string $nickname = '';

    public function levelUp()
    {
        $this->level++;
    }

    public function isActive()
    {
        $isActive = $this->registered ?: (bool) $this->level;

        return $isActive;
    }

    public function isWorking()
    {
        $isWorking = (bool) $this->level;

        return $isWorking;
    }

    public function getLabel()
    {
        $label = empty($this->nickname) ? $this->firstName : $this->nickname;

        return $label;
    }

    public function getStatus()
    {
        if (! $this->registered) {
            $status = self::STATUS_HALTING;
        } elseif ($this->level > 10) {
            $status = self::STATUS_INVOLVED;
        } else {
            $status = self::STATUS_CERTAIN;
        }

        return $status;
    }
}
