<?php

trait Data {
    protected string $label;

    public function set_label(string $label) : void {
        $this->label = $label;
    }

    public function get_label() : string {
        return $this->label;
    }
}

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
    use Data, Content {
        Content::set_label insteadof Data;
        Data::set_label as data_set_label;
        Content::get_label insteadof Data;
        Data::get_label as data_get_label;
    }

    private string $core;

    public function set_data_label(string $label) : void {
        $this->data_set_label($label);
    }

    public function set_content_label(string $label) : void {
        $this->set_label($label);
    }

    public function set_core(string $core) : void {
        $this->core = $core;
    }

    public function show() : void {
        print("Data label: " . $this->data_get_label()
            . "\nContent label: " . $this->get_label()
            . "\nSnippet core: " . $this->core . "\n\n");
    }
}

$ancient_summerian_inventory_list = new Snippet();

$ancient_summerian_inventory_list->set_data_label("Inventory list");
$ancient_summerian_inventory_list->set_content_label("Sumerian text");
$ancient_summerian_inventory_list->set_core("Some text in cuneiform writing...");

$ancient_summerian_inventory_list->show();
