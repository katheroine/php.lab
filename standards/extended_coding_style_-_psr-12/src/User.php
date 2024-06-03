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

    public bool $isRegistered = false;
    public int $level = 0;
    public string $firstName;
    public string $middleName;
    public string $lastName;
    public string $nickname = '';

    public array $skills = [];

    public function levelUp()
    {
        $this->level++;
    }

    public function isActive()
    {
        $isActive = $this->isRegistered ?: (bool) $this->level;

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
        if (! $this->isRegistered) {
            $status = self::STATUS_HALTING;
        } elseif ($this->level > 10) {
            $status = self::STATUS_INVOLVED;
        } else {
            $status = self::STATUS_CERTAIN;
        }

        return $status;
    }

    public function getStatusDescription()
    {
        $status = $this->getStatus();

        switch($status) {
            case self::STATUS_HALTING:
                $description = "Started to use the application.";
                break;
            case self::STATUS_CERTAIN:
                $description = "Using the application.";
                break;
            case self::STATUS_INVOLVED:
                $description = "Engeged in using the application";
                break;
            default:
                $description = "";
                break;
        }

        return $description;
    }

    public function getLevelVisualisation()
    {
        $quantity = $this->level;
        $visualisation = '';

        while ($quantity > 0) {
            $visualisation .= '*';

            $quantity--;
        }

        return $visualisation;
    }

    public function getLevelUpgradeVisualisation($upgrade = 1)
    {
        if($upgrade <= 0) {
            return;
        }

        $visualisation = '';

        do {
            $visualisation .= '#';

            $upgrade--;
        } while ($upgrade > 0);

        return $visualisation;
    }

    public function getSkillsVisualisation()
    {
        $skillsCount = count($this->skills);
        $skills = array_column($this->skills, 'name');
        $visualisation = '';

        for ($i = 1; $i <= $skillsCount; $i++) {
            $visualisation .= $i . '. ' . $skills[$i - 1] . ', ';
        }

        return $visualisation;
    }

    public function makeSkillsPresentation($skillPresentation)
    {
        foreach($this->skills as $skillCodename => $skill) {
            $skillPresentation($skillCodename, $skill);
        }
    }
}
