<?php

interface Presentation {
    public function getLabel() : string;
    public function show() : void;
}

abstract class Datum implements Presentation {
    protected string $description;

    public function __construct(string $description) {
        $this->description = $description;
    }

    public function getLabel() : string { // Can be implemented here or must be implemented in derived classes.
        return ("Description: " . $this->description);
    }
}

class Content extends Datum {
    protected string $core;

    public function __construct(string $core, string $description = "") {
        $this->core = $core;
        $this->description = $description;
    }

    public function show() : void { // Must be implemented.
        print($this->getLabel() . "\n"
          . "Core: " . $this->core . "\n");
    }
};

$lectio = new Content(
  "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
  "De beneficiis lectionis"
);
$lectio->show();
