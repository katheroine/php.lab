<?php

// "Interface for external iterators or objects that can be iterated themselves internally."
// -- https://www.php.net/manual/en/class.iterator.php

class SomeContainer implements Iterator
{
    private array $storage = [];
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
$someThings->store('spoon');

print('Is iterable: ' . (is_iterable($someThings) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

for ($someThings->rewind(); $someThings->valid(); $someThings->next()) {
    print('[' . $someThings->key() . ']: ' . $someThings->current() . PHP_EOL);
}


