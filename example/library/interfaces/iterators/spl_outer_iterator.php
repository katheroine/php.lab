<?php

// "Classes implementing OuterIterator can be used to iterate over iterators."
// -- https://www.php.net/manual/en/class.outeriterator.php

class SomeContainer implements OuterIterator
{
    private array $storage = [];
    private bool $valid = true;
    // private Iterator $innerIterator;

    public function store(Iterator $iterator)
    {
        $this->storage[] = $iterator;
    }

    // OuterIterator methods

    public function getInnerIterator()
    {
        return $this->current();
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

$someIterators = new SomeContainer();

$someIterators->store(new ArrayIterator([1, 2, 3]));
$someIterators->store(new ArrayIterator(['a', 'b', 'c']));
$someIterators->store(new ArrayIterator(['red', 'blue', 'yellow']));

for ($someIterators->rewind(); $someIterators->valid(); $someIterators->next()) {
    $someThings = $someIterators->getInnerIterator();

    for ($someThings->rewind(); $someThings->valid(); $someThings->next()) {
        print('[' . $someThings->key() . ']: ' . $someThings->current() . ' ');
    }

    print(PHP_EOL);
}
