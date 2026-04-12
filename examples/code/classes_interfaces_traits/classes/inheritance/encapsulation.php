<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

class Account
{
    public string $login = "";
    public string $email = "";
    public bool $isActive = false;
    public int $id = 0;

    protected const CONNECTIONS_MAX_NUMBER = 10;
    protected array $connections = [];
    private int $connectionsNumber = 0;

    public function display(): void
    {
        print("ID: " . $this->id . "\n"
            . "Login: " . $this->login . "\n"
            . "E-mail: " . $this->email . "\n"
            . "Is active: " . $this->isActive . "\n"
            . "Has connections: " . $this->hasConnections() . "\n"
        );
    }

    public function hasConnections(): bool
    {
        return ($this->connectionsNumber > 0);
    }

    public function addConnection(int $connectedAccountId): bool
    {
        if ($this->connectionsNumber == self::CONNECTIONS_MAX_NUMBER) {
            return false;
        }

        array_push($this->connections, $connectedAccountId);
        $this->connectionsNumber++;

        return true;
    }
}

class SocialMediaAccount extends Account
{
    public function isFriend(int $checkingAccountId): bool
    {
        foreach ($this->connections as $connectionAccountId) {
            if ($checkingAccountId == $connectionAccountId) {
                return true;
            }
        }

        return false;
    }
}

$timothy = new SocialMediaAccount();

$timothy->login = "tim";
$timothy->email = "timothy.muppetone@gmail.com";
$timothy->isActive = true;

$timothy->display();
print(PHP_EOL);

$timothy->addConnection(100);
print("Has connections: {$timothy->hasConnections()}\n");
print("Is ID 100 a friend? {$timothy->isFriend(100)}\n");
print("Is ID 200 a friend? {$timothy->isFriend(200)}\n");
print(PHP_EOL);
