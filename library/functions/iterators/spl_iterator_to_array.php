<?php

// "Copy the iterator into an array"
// -- https://www.php.net/manual/en/function.iterator-to-array.php

class SomeIterator implements Iterator
{
    private $storage = [];
    private bool $valid = true;

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    public function current(): mixed
    {
        return current($this->storage);
    }

    public function key(): mixed
    {
        return key($this->storage);
    }

    public function next(): void
    {
        $this->valid = next($this->storage) ? true : false;
    }

    public function rewind(): void
    {
        reset($this->storage);
        $this->valid = true;
    }

    public function valid(): bool
    {
        return $this->valid;
    }
}

$someIterator = new SomeIterator();

$someIterator->store('pencil');
$someIterator->store('bulb');
$someIterator->store('spoon');

var_dump($someIterator);

print(PHP_EOL);

$someArray = iterator_to_array($someIterator);

var_dump($someArray);

print(PHP_EOL);
