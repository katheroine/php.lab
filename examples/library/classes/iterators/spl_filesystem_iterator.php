<?php
/*
 * Copyright (C) 2024-2026 Katarzyna Krasińska
 * PHP.lab - https://github.com/katheroine/php.lab
 * Licensed under GPL-3.0 - see LICENSE.md
 */

// -- https://www.php.net/manual/en/class.filesystemiterator.php

mkdir('some_directory');
mkdir('some_directory/other_directory');
touch('some_directory/some_file.ext');
touch('some_directory/other_directory/other_file.ext');
touch('some_directory/other_directory/another_file.ext');

$someIterator = new FilesystemIterator('some_directory/');

function display(FilesystemIterator $iterator) {
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
unlink('some_directory/other_directory/another_file.ext');
rmdir('some_directory/other_directory');
rmdir('some_directory');
