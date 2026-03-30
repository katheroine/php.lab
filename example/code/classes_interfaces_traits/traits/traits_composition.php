<?php

trait Describable {
    const DESCRIPTION_TITLE = "Description: ";

    private $presentationTitle = "";
}

trait Presentable {
    use Describable;

    const CORE_TITLE = "Core: ";

    public function show() : void {
        if (strlen($this->presentationTitle)) {
            print ($this->presentationTitle . "\n");
        }
        print(self::DESCRIPTION_TITLE . $this->getLabel() . "\n"
          . self::CORE_TITLE . $this->getCore() . "\n");
    }
}

class Value {
    use Presentable;
    private string $name;
    private float $value;

    public function __construct(float $value, string $name = "", string $presentationTitle = "") {
        $this->value = $value;
        $this->name = $name;
        $this->presentationTitle = $presentationTitle;
    }

    private function getLabel() : string {
        return $this->name;
    }

    private function getCore() : string {
        return $this->value;
    }
}

class Content {
    use Presentable;
    private string $description;
    private string $content;

    public function __construct(string $content, string $description = "", string $presentationTitle = "") {
        $this->content = $content;
        $this->description = $description;
        $this->presentationTitle = $presentationTitle;
    }

    private function getLabel() : string {
        return $this->description;
    }

    private function getCore() : string {
        return $this->content;
    }
}

$temp = new Value(23.2, "Good ambient temperature", "My favourite temperature");
$temp->show();

print("\n");

$lectio = new Content(
  "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
  "De beneficiis lectionis",
  "My favourite cite"
);
$lectio->show();

print("\n");
