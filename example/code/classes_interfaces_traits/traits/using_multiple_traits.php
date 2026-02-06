<?php

trait Presentable {
    const DESCRIPTION_TITLE = "Description: ";
    const CORE_TITLE = "Core: ";

    private string $presentationTitle = "";

    public function show() : void {
        if (strlen($this->presentationTitle)) {
            print ($this->presentationTitle . "\n");
        }
        print(self::DESCRIPTION_TITLE . $this->getLabel() . "\n"
          . self::CORE_TITLE . $this->getCore() . "\n");
    }
}

trait Typeable {
    private array $typeConverters;
    private string $type;

    private function setupTypeConverters() : void {
        $this->typeConverters = [
            'int' => function($value) { return (int)$value; },
            'float' => function($value) { return (float)$value; },
            'string' => function($value) { return $value; },
        ];
    }
}

class Value {
    use Presentable, Typeable;
    private string $name;
    private $value;

    public function __construct(string $value, string $type, string $name = "", string $presentationTitle = "") {
        $this->setupTypeConverters();

        $this->value = $this->typeConverters[$type]($value);
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

$temp = new Value(23.2, "float", "Good ambient temperature", "My favourite temperature");
$temp->show();
