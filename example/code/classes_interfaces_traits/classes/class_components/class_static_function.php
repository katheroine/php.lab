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

$token_1 = new Token();
$token_2 = new Token();
$token_3 = new Token();

$token_1->update(1, "blue");
$token_2->update(2, "orange");
$token_3->update(3, "violet");

print("\$token_1->color: {$token_1->color}\n");
print("\$token_2->color: {$token_2->color}\n");
print("\$token_3->color: {$token_3->color}\n");

print("\nToken::number: " . Token::$number . "\n\n");

Token::reset();

print("\$token_1->color: {$token_1->color}\n");
print("\$token_2->color: {$token_2->color}\n");
print("\$token_3->color: {$token_3->color}\n");

print("\nToken::number: " . Token::$number . "\n\n");

$token_1->update(5, "magenta");
$token_2->update(6, "amaranthine");
$token_3->update(7, "navy");

print("\$token_1->color: {$token_1->color}\n");
print("\$token_2->color: {$token_2->color}\n");
print("\$token_3->color: {$token_3->color}\n");

print("\nToken::number: " . Token::$number . "\n\n");

$token_1->reset();

print("\$token_1->color: {$token_1->color}\n");
print("\$token_2->color: {$token_2->color}\n");
print("\$token_3->color: {$token_3->color}\n");

print("\nToken::number: " . Token::$number . "\n\n");
