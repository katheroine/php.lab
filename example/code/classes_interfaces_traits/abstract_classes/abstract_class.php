<?php

abstract class Datum {
    protected string $description;

    public function formatDescriptionAsText() : string {
        return ("Description: " . $this->description);
    }
}

class Content extends Datum {
    protected string $core;

    public function __construct(string $core, string $description = "") {
        $this->core = $core;
        $this->description = $description;
    }

    public function formatCoreAsText() : string {
        return ("Core: " . $this->core);
    }

    public function show() : void {
        print($this->formatDescriptionAsText() . "\n"
          . $this->formatCoreAsText() . "\n");
    }
};

// $data = new Datum(); // One cannot instantiate.

$lectio = new Content(
  "In omnibus requiem quaesivi, et nusquam inveni nisi in angulo cum libro.",
  "De beneficiis lectionis"
);

$lectio->show();
