<?php

class Card
{
    private function __construct(
        private string $name,
        private string $surname,
        private string $title,
        private int $experienceLevel,
    ) {
    }

    public static function createFromDescriptionAndLevel(string $description, int $experienceLevel = 0): self
    {
        $name = '';
        $surname = '';
        $title = '';

        $fields = explode(' ', $description);

        if (isset($fields[0])) {
            $name = static::groomField($fields[0]);

            if (isset($fields[1])) {
                $surname = static::groomField($fields[1]);

                if (isset($fields[2])) {
                    $title = static::groomField($fields[2]);
                }
            }
        }

        return new self(
            $name,
            $surname,
            $title,
            $experienceLevel,
        );
    }

    private static function groomField(string $field): string
    {
        return ucfirst(strtolower(trim($field, ',;.')));
    }
}

$someCard = Card::createFromDescriptionAndLevel('Amadeus Mozarella, cheesemaker', 5);

var_dump($someCard);
