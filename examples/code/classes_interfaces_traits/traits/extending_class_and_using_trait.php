<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

trait Identifiable
{
    protected static function processId(int $id): int
    {
        return $id + 3;
    }
}

class Information
{
    protected static int $datumId = 0;

    public function __construct(
        protected string $label,
        protected string $text
    ) {
        self::$datumId = $this->processId(self::$datumId);
    }

    protected static function processId(int $id): int
    {
        return $id + 2;
    }
}

class Article extends Information
{
    use Identifiable;

    public function getId(): int
    {
        return self::$datumId;
    }

    public function getTitle(): string
    {
        return $this->label;
    }

    public function getContent(): string
    {
        return $this->text;
    }
}

$someArticle = new Article(
    'C++ teaches more than any other programming language',
    "While modern languages like Python or Java automate many technical\n"
    . "details to improve developer productivity,\n"
    . "C++ leaves them in your hands, providing a deeper look at \"how computers think\"."
);

print(
    '#' . $someArticle->getId()
    . ' "' . $someArticle->getTitle() . '"' . PHP_EOL . PHP_EOL
    . $someArticle->getContent() . PHP_EOL . PHP_EOL
);
