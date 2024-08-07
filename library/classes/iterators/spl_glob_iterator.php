<?php

// "The DirectoryIterator class provides a simple interface for viewing the contents of filesystem directories."
// -- https://www.php.net/manual/en/class.directoryiterator.php

mkdir('some_directory');
mkdir('some_directory/other_directory');
touch('some_directory/some_file.ext');
touch('some_directory/other_directory/other_file.ext');
touch('some_directory/another_file.oth');

$someIterator = new GlobIterator('some_directory/*.ext');

function display(GlobIterator $iterator) {
    foreach ($iterator as $key => $file) {
        print('[' . $key . ']: ' . $file->getFilename() . ' : ' . $file->getPathname() . PHP_EOL);
    }
}

display($someIterator);

print(PHP_EOL);

for ($someIterator->rewind(); $someIterator->valid(); $someIterator->next()) {
    print('[' . $someIterator->key() . ']: ' . $someIterator->current() . PHP_EOL);
}

print(PHP_EOL);

unlink('some_directory/some_file.ext');
unlink('some_directory/other_directory/other_file.ext');
unlink('some_directory/another_file.oth');
rmdir('some_directory/other_directory');
rmdir('some_directory');