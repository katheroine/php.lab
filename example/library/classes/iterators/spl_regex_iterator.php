<?php

// "This iterator can be used to filter another iterator based on a regular expression."
// -- https://www.php.net/manual/en/class.regexiterator.php

$someIterator = new RegexIterator(
    new ArrayIterator(
        ['foo', 'bar', 'baz', 'dib', 'zim']
    ),
    '/^(ba|di)/'
);

foreach ($someIterator as $value) {
    echo $value . PHP_EOL;
}

print(PHP_EOL);
