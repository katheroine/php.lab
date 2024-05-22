<?php

// "The RecursiveDirectoryIterator provides an interface for iterating recursively over filesystem directories."
// -- https://www.php.net/manual/en/class.recursivedirectoryiterator.php

mkdir('some_directory');
mkdir('some_directory/other_directory');
touch('some_directory/some_file.ext');
touch('some_directory/other_directory/other_file.ext');
touch('some_directory/other_directory/another_file.ext');

$someIterator = new RecursiveDirectoryIterator('some_directory/');

function display(RecursiveDirectoryIterator $iterator) {
    for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
        if ($iterator->hasChildren()) {
            display($iterator->getChildren());
        } else {
            print(
                '[' . $iterator->key() . ']: ' . $iterator->current() . PHP_EOL
                . $iterator->getFilename() . ' : ' . $iterator->getPathname() . PHP_EOL . PHP_EOL
            );
        }
    }
}

display($someIterator);

print(PHP_EOL);

unlink('some_directory/some_file.ext');
unlink('some_directory/other_directory/other_file.ext');
unlink('some_directory/other_directory/another_file.ext');
rmdir('some_directory/other_directory');
rmdir('some_directory');
