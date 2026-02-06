<?php

interface Presentation {
    public function getLabel() : string;
    public function show() : void;
}

class Datum implements Presentation {
    protected string $description;

    public function __construct(string $description) {
        $this->description = $description;
    }

    public function getLabel() : string { // Must be implemented.
        return ("Description: " . $this->description);
    }

    public function show() : void { // Must be implemented.
        print($this->getLabel() . "\n");
    }
}

class Content extends Datum {
    protected string $core;

    public function __construct(string $core, string $description = "") {
        $this->core = $core;
        $this->description = $description;
    }

    public function show() : void {
        print($this->getLabel() . "\n"
          . "Core: " . $this->core . "\n");
    }
}

$color = new Datum("Favourite color");
$color->show();

print("\n");

$lectio = new Content(
  "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
  "De beneficiis lectionis"
);
$lectio->show();

print("\n");
