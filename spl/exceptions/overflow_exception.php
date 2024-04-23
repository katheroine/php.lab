<?php

declare(strict_types=1);

// "Exception thrown when adding an element to a full container."
// -- https://www.php.net/manual/en/class.overflowexception.php

class Trio {
    const MAX_COUNT = 3;
    private array $items = [];
    private int $count = 0;
    public function add($item): void {
        if ($this->count >= self::MAX_COUNT) {
            throw new OverflowException('Container is already full.');
        } else {
            $this->items[] = $item;
            $this->count += 1;
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

    public function count(): int {
        return $this->count;
    }
}

function drawItems(): Trio {
    $input = trim(readline('Items to add (1 - ' . Trio::MAX_COUNT . '): '));
    $inputPartials = explode(' ', $input);

    $items = new Trio();

    foreach($inputPartials as $inputPartial) {
        $items->add($inputPartial);
    }

    return $items;
}

try {
    $items = drawItems();

    for($i = 0; $i < $items->count(); $i++) {
        print($items->get($i) . PHP_EOL);
    }
} catch (OverflowException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
