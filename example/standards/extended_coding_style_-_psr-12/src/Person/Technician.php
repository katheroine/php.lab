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

use PHPLab\StandardPSR12\Person\Person;
use PHPLab\StandardPSR12\Person\Skilled;
use PHPLab\StandardPSR12\Person\Educated;

class Technician extends Person
{
    use Educated {
        Educated::isVirtual as isEducated;
    }

    use Skilled {
        Skilled::isVirtual as isSkilled;
    }

    protected function hasMiddleName(): bool
    {
        return false;
    }

    final public function isVirtual(): bool
    {
        $isVirtual = $this->isEducated() && $this->isSkilled();

        return $isVirtual;
    }
}
