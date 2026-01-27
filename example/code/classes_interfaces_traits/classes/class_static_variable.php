#!/usr/bin/php8.2
<?php

class Token {
  public static int $number;
  public string $color;
}

Token::$number = 0;

print("Token::number: " . Token::$number . "\n\n");

$token_1 = new Token;
$token_2 = new Token;
$token_3 = new Token;

Token::$number = 3;
$token_1->color = "blue";
$token_2->color = "orange";
$token_3->color = "violet";

print("\$token_1->color: {$token_1->color}\n");
print("\$token_2->color: {$token_2->color}\n");
print("\$token_3->color: {$token_3->color}\n");

print("\nToken::number: " . Token::$number . "\n\n");

Token::$number = 1;
$token_1->color = "petrol";

print("\$token_1->color: {$token_1->color}\n");
print("\$token_2->color: {$token_2->color}\n");
print("\$token_3->color: {$token_3->color}\n");

print("\nToken::number: " . Token::$number . "\n\n");

Token::$number = 2;
$token_2->color = "ginger";

print("\$token_1->color: {$token_1->color}\n");
print("\$token_2->color: {$token_2->color}\n");
print("\$token_3->color: {$token_3->color}\n");

print("\nToken::number: " . Token::$number . "\n\n");
