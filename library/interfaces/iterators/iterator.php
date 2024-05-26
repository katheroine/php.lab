<?php

// "Interface to detect if a class is traversable using foreach."
// -- https://www.php.net/manual/en/class.traversable.php

class SomeContainer implements Iterator
{
    private $storage = [];
    private bool $valid = true;

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    // Iterator methods

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
$someThings->store('spoon');

print('Is iterable: ' . (is_iterable($someThings) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

for ($someThings->rewind(); $someThings->valid(); $someThings->next()) {
    print('[' . $someThings->key() . ']: ' . $someThings->current() . PHP_EOL);
}

$someThings->rewind();

print(PHP_EOL);

foreach ($someThings as $key => $value) {
    print('[' . $key . ']: ' . $value . PHP_EOL);
}

