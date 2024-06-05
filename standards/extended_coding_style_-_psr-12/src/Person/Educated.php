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

trait Educated
{
    public array $educations = [];

    public function isVirtual(): bool
    {
        return ! empty($this->educations);
    }

    public function addEducations(...$educations)
    {
        foreach ($educations as $education) {
            $this->educations[] = $education;
        }
    }
}
