<?php

interface Presentable
{
    public function getId(): int;
    public function getTitle(): string;
    public function getContent(): string;
}

abstract class Information
{
    protected static int $datumId = 0;

    public function __construct(
        protected string $label,
        protected string $text
    ) {
        self::$datumId = $this->processId(self::$datumId);
    }

    abstract protected function processId(int $id): int;
}

class Article extends Information implements Presentable
{
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

    protected function processId(int $id): int
    {
        return ++$id;
    }
}

function display(Presentable $presentable)
{
    print(
        '#' . $presentable->getId()
        . ' "' . $presentable->getTitle() . '"' . PHP_EOL . PHP_EOL
        . $presentable->getContent() . PHP_EOL . PHP_EOL
    );
}

$someArticle = new Article(
    'C++ teaches more than any other programming language',
    "While modern languages like Python or Java automate many technical\n"
    . "details to improve developer productivity,\n"
    . "C++ leaves them in your hands, providing a deeper look at \"how computers think\"."
);

display($someArticle);
