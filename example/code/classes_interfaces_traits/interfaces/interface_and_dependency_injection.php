<?php

interface Presentable
{
    public function getId(): int;
    public function getTitle(): string;
    public function getContent(): string;
}

class Note implements Presentable
{
    private static int $datumId = 0;

    public function __construct(
        private string $label,
        private string $text
    ) {
        ++self::$datumId;
    }

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

class Article implements Presentable
{
    public function __construct(
        private int $tag,
        private string $header,
        private string $body
    ) {
    }

    public function getId(): int
    {
        return $this->tag;
    }

    public function getTitle(): string
    {
        return $this->header;
    }

    public function getContent(): string
    {
        return $this->body;
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

$someNote = new Note(
    'Python and prototyping',
    "Python is widely considered excellent for prototyping.\n"
    . "It is one of the most popular languages for rapid application development\n"
    . "because it allows developers to move from an idea to a working concept\n"
    . "much faster than lower-level languages like C++ or Java."
);

$someArticle = new Article(
    '1024',
    'C++ teaches more than any other programming language',
    "While modern languages like Python or Java automate many technical\n"
    . "details to improve developer productivity,\n"
    . "C++ leaves them in your hands, providing a deeper look at \"how computers think\"."
);

display($someNote);
display($someArticle);
