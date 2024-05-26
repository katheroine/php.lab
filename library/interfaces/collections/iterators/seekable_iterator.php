<?php

// "The Seekable iterator."
// -- https://www.php.net/manual/en/class.seekableiterator.php

class SomeContainer implements SeekableIterator
{
    private $storage = [];
    private bool $valid = true;

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    // SeekableIterator methods

    public function seek(int $offset): void
    {
        if($offset < 0) {
            throw new OutOfBoundsException("Offest must be greater than zero, {$offset} given.");
        }

        $storageLength = count($this->storage);

        if($offset > $storageLength) {
            throw new OutOfBoundsException("Offest must be lesser than storage length which is {$storageLength}, {$offset} given.");
        }

        for ($this->rewind(); $offset; $this->next()) {
            $offset--;
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
$someThings->store('spoon');
$someThings->store('scissors');
$someThings->store('mirror');

print('Is iterable: ' . (is_iterable($someThings) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

for ($someThings->rewind(); $someThings->valid(); $someThings->next()) {
    print('[' . $someThings->key() . ']: ' . $someThings->current() . PHP_EOL);
}

$someThings->rewind();

print(PHP_EOL);

$someThings->seek(2);

print($someThings->current() . PHP_EOL . PHP_EOL);

try {
    $someThings->seek(-1);
} catch (OutOfBoundsException $e) {
    print($e->getMessage() . PHP_EOL);
}

try {
    $someThings->seek(9);
} catch (OutOfBoundsException $e) {
    print($e->getMessage() . PHP_EOL);
}
