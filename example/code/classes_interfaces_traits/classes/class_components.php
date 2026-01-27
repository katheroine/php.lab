<?php

class Account {
  public string $login = "";
  public string $email = "";
  public bool $is_active = false;
  public int $id = 0;

  public const CONNECTIONS_MAX_NUMBER = 10;
  public array $connections = [];
  public int $connections_number = 0;

  public function display() : void {
    print("ID: " . $this->id . "\n"
      . "Login: " . $this->login . "\n"
      . "E-mail: " . $this->email . "\n"
      . "Is active: " . $this->is_active . "\n"
      . "Has connections: " . $this->has_connections() . "\n"
    );
  }

  public function has_connections() : bool {
    return ($this->connections_number > 0);
  }
}

$timothy = new Account();

$timothy->login = "tim";
$timothy->email = "timothy.muppetone@gmail.com";
$timothy->is_active = true;

$timothy->display();
