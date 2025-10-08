<?php

// "Interface to provide accessing objects as arrays."
// -- https://www.php.net/manual/en/class.arrayaccess.php

class SomeContainer implements ArrayAccess
{
    private $storage = [];

    // ArrayAccess methods

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->storage[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->storage[$offset] ?? null;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->storage[] = $value;
        } else {
            $this->storage[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->storage[$offset]);
    }
}

$someThings = new SomeContainer();

$someThings[] = 'pencil';
$someThings[] = 'bulb';
$someThings[] = 'spoon';

print('Is array: ' . (is_array($someThings) ? 'yes' : 'no') . PHP_EOL . PHP_EOL);

for ($i = 0; $i < 3; $i++) {
    print('[' . $i . ']: ' . $someThings[$i] . PHP_EOL);
}
