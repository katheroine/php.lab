<?php

// "Classes implementing RecursiveIterator can be used to iterate over iterators recursively."
// -- https://www.php.net/manual/en/class.recursiveiterator.php

class SomeContainer implements RecursiveIterator
{
    private $storage = [];
    private bool $valid = true;

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    public function __construct(array $storage = [])
    {
        $this->storage = $storage;
    }

    // RecursiveIterator methods

    public function hasChildren(): bool
    {
        return is_iterable($this->current());
    }

    public function getChildren(): ?RecursiveIterator
    {
        if ($this->hasChildren()) {
            return new self($this->current());
        } else {
            return null;
        }
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

$someThings = new SomeContainer();

$someThings->store('pencil');
$someThings->store('bulb');
$someThings->store([1, 2, 3, ['a', 'b', 'c']]);
$someThings->store('spoon');

print('Is iterable: ' . (is_iterable($someThings) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

function display(RecursiveIterator $iterator) {
    for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
        if ($iterator->hasChildren()) {
            display($iterator->getChildren());
        } else {
            print('[' . $iterator->key() . ']: ' . $iterator->current() . PHP_EOL);
        }
    }
}

display($someThings);
