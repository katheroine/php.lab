<?php

trait Presentable
{
    const DESCRIPTION_TITLE = "Description: ";
    const CORE_TITLE = "Core: ";

    private $presentationTitle = "";

    abstract function getLabel(): string;
    abstract function getCore(): string;

    public function show(): void
    {
        if (strlen($this->presentationTitle)) {
            print($this->presentationTitle . PHP_EOL);
        }
        print(
            self::DESCRIPTION_TITLE . $this->getLabel() . PHP_EOL
            . self::CORE_TITLE . $this->getCore() . PHP_EOL
            . PHP_EOL
        );
    }
}

class Value
{
    use Presentable;

    public function __construct(
        private float $value,
        private string $name,
        string $presentationTitle = ""
    ) {
        $this->presentationTitle = $presentationTitle;
    }

    private function getLabel(): string
    {
        return $this->name;
    }

    private function getCore(): string
    {
        return $this->value;
    }
}

class Content
{
    use Presentable;

    public function __construct(
        private string $content,
        private string $description = "",
        string $presentationTitle = ""
    ) {
        $this->presentationTitle = $presentationTitle;
    }

    private function getLabel(): string
    {
        return $this->description;
    }

    private function getCore(): string
    {
        return $this->content;
    }
}

$temp = new Value(23.2, "Good ambient temperature", "My favourite temperature");
$temp->show();

$lectio = new Content(
    "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
    "De beneficiis lectionis",
    "My favourite cite"
);
$lectio->show();
