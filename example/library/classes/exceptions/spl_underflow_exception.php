<?php

declare(strict_types=1);

// "Exception thrown when performing an invalid operation on an empty container, such as removing an element."
// -- https://www.php.net/manual/en/class.underflowexception.php

class Trio {
    const MAX_COUNT = 3;
    private array $items = [];
    private int $count = 0;
    public function add($item): bool
    {
        if ($this->count >= self::MAX_COUNT) {
            return false;
        } else {
            $this->items[] = $item;
            $this->count += 1;

            return true;
        }
    }

    public function get(int $index)
    {
        if ($index < self::MAX_COUNT) {
            return $this->items[$index];
        } else {
            return false;
        }
    }

    public function remove()
    {
        if ($this->count == 0) {
            throw new UnderflowException('Container is already empty.');
            // extends RuntimeException
        } else {
            unset($this->items[$this->count - 1]);
            $this->count -= 1;
        }
    }

    public function count(): int {
        return $this->count;
    }
}

function drawNumberAndRemove(Trio &$items) {
    for($i = 0; $i < $items->count(); $i++) {
        print($items->get($i) . PHP_EOL);
    }

    print(PHP_EOL);

    $input = trim(readline('Number of to remove (0 - ' . Trio::MAX_COUNT . '): '));

    for($i = 0; $i < $input; $i++) {
        $items->remove();
    }

    return $items;
}

try {
    $items = new Trio();
    $items->add('rose');
    $items->add('orange');
    $items->add('violet');

    drawNumberAndRemove($items);

    for($i = 0; $i < $items->count(); $i++) {
        print($items->get($i) . PHP_EOL);
    }
} catch (UnderflowException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);

