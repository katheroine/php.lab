<?php

trait Content {
    protected string $label;

    public function set_label(string $label) : void {
        $this->label = $label;
    }

    public function get_label() : string {
        return $this->label;
    }
}

class Snippet {
    use Content {
        set_label as protected;
        get_label as protected;
    }

    private string $core;

    public function set_content_label(string $label) : void {
        $this->set_label($label);
    }

    public function get_content_label() : string {
        return $this->get_label();
    }

    public function set_core(string $core) : void {
        $this->core = $core;
    }

    public function show() : void {
        print("Content label: " . $this->get_label()
            . "\nSnippet core: " . $this->core . "\n\n");
    }
}

$ancient_summerian_inventory_list = new Snippet();

// $ancient_summerian_inventory_list->set_label("Sumerian text");
$ancient_summerian_inventory_list->set_content_label("Sumerian text");
$ancient_summerian_inventory_list->set_core("Some text in cuneiform writing...");

$ancient_summerian_inventory_list->show();
