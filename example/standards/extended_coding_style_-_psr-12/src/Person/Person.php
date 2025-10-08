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

namespace PHPLab\StandardPSR12\Person;

use PHPLab\StandardPSR12\Person\Presentable;
use PHPLab\StandardPSR12\Person\Identifiable;

abstract class Person implements Presentable, Identifiable
{
    protected string $firstName;
    protected string $middleName;
    protected string $lastName;

    protected ?int $pesel;

    abstract protected function hasMiddleName(): bool;

    public function setName($firstName, $lastName, $middleName = '')
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }

    public function getName(): string
    {
        $name = $firstName
            . $this->hasMiddleName() ? $this->middleName : ' '
            . $lastName;

        return $name;
    }

    public function getPesel(): ?int
    {
        return $this->pesel;
    }
}
