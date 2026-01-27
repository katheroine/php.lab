<?php

class Account
{
  public string $login = ""; // access level must be always defined
  public string $email = "";
  public bool $is_active = false;
  public int $id = 0;

  protected const CONNECTIONS_MAX_NUMBER = 10;
  protected array $connections = [];
  private int $connections_number = 0;

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
  public function add_connection(int $connected_account_id) {
    if ($this->connections_number == self::CONNECTIONS_MAX_NUMBER)
      return false;

    array_push($this->connections, $connected_account_id);
    $this->connections_number++;

    return true;
  }
}

class SocialMediaAccount extends Account {
  public function is_friend(int $checking_account_id) : bool {
    foreach($this->connections as $connection_account_id) {
      if ($checking_account_id == $connection_account_id)
        return true;
    }

    return false;
  }
}

$timothy = new SocialMediaAccount();

$timothy->login = "tim";
$timothy->email = "timothy.muppetone@gmail.com";
$timothy->is_active = true;

$timothy->display();
print("\n");

$timothy->add_connection(100);
print("Has connections: " . $timothy->has_connections() . "\n");
print("Is ID 100 a friend? " . $timothy->is_friend(100) . "\n");
print("Is ID 100 a friend? " . $timothy->is_friend(200) . "\n");
