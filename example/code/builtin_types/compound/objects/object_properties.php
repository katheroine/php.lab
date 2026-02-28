<?php

class Data
{
    public $programmingLanguage;
    public $database;
    protected $operatingSystem = 'Unix';
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }
}

$data = new Data(1024);
$data->setOperatingSystem('Linux');
$data->database = 'MongoDB';
$data->programmingLanguage = 'PHP';

print("Data:\n\n");
var_dump($data);
print(PHP_EOL);
print("id: {$data->getId()}\n");
print("operating system: {$data->getOperatingSystem()}\n");
print("database: {$data->database}\n");
print("programming language: {$data->programmingLanguage}\n\n");
