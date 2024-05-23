<?php

// "Interface to create an external Iterator."
// -- https://www.php.net/manual/en/class.iteratoraggregate.php

class SomeContainer implements IteratorAggregate
{
    private $storage = [];

    public function store(mixed $item)
    {
        $this->storage[] = $item;
    }

    // IteratorAggregate methods

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->storage);
    }
}

$someThings = new SomeContainer();

$someThings->store('pencil');
$someThings->store('bulb');
$someThings->store('spoon');

print('Is iterable: ' . (is_iterable($someThings) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

foreach ($someThings as $key => $value) {
    print('[' . $key . ']: ' . $value . PHP_EOL);
}
