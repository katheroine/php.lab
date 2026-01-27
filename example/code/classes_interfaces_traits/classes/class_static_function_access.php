#!/usr/bin/php8.1
<?php

class Token {
    public static int $number;
    public string $color = "";
    public function update(int $number, string $color): void {
        self::$number = $number;
        $this->color = $color;
    }
    public static function reset(): void {
        self::$number = 0;
    }
}

Token::reset();
print("Token::number: " . Token::$number . "\n");

print("\n");

$some_token = new Token();

$some_token->update(5, "magenta");
print("\$some_token->color: {$some_token->color}\n");
print("Token::number: " . Token::$number . "\n");

print("\n");

$reference_to_token = &$some_token;

$reference_to_token->update(6, "amaranthine");
print("\$some_token->color: {$some_token->color}\n");
print("Token::number: " . Token::$number . "\n");

print("\n");
