<?php

// "Classes implementing OuterIterator can be used to iterate over iterators."
// -- https://www.php.net/manual/en/class.outeriterator.php

class SomeContainer
{
    private array $storage = [];

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }
}

class SomeContainerIteratorIterator implements OuterIterator
{
    private ArrayIterator $innerIterator;

    // OuterIterator method
    public function getInnerIterator(): ?Iterator
    {
        return count($this->storage);
    }
}

$someThings = new SomeContainer();

print('Count: ' . count($someThings) . PHP_EOL);

$someThings->store('pencil');
$someThings->store('bulb');
$someThings->store('spoon');

print('Count: ' . count($someThings) . PHP_EOL);