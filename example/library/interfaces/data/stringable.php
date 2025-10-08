<?php

// "The Stringable interface denotes a class as having a __toString() method.
// Unlike most interfaces, Stringable is implicitly present on any class
// that has the magic __toString() method defined,
// although it can and should be declared explicitly."
// -- https://www.php.net/manual/en/class.stringable.php

class SomeContainer implements Stringable
{
    private $storage = [];

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    // Stringable method

    public function __toString(): string
    {
        $string = '';

        foreach($this->storage as $key => $value) {
            $string .= "{$key}: {$value}\n";
        }

        return $string;
    }
}

$someThings = new SomeContainer();

$someThings->store('pencil');
$someThings->store('bulb');
$someThings->store('spoon');

print($someThings . PHP_EOL);
