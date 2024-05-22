<?php

// "The SplFileObject class offers an object-oriented interface for a file."
// -- https://www.php.net/manual/en/class.splfileobject.php

const DIRECTORY_PATH = 'some_directory';
const FILE_PATH = DIRECTORY_PATH . DIRECTORY_SEPARATOR . 'some_file.ext';

mkdir(DIRECTORY_PATH);
touch(FILE_PATH);

$someFile = new SplFileObject(FILE_PATH);
file_put_contents(
    FILE_PATH,
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit.\n"
    . "Phasellus a metus dignissim, blandit tellus ac, convallis tortor.\n"
    . "Praesent vitae lacus mauris.\n"
    . "Curabitur suscipit auctor dapibus. Phasellus vel consectetur ex, vel placerat nisi.\n"
    . "Maecenas quis vulputate ex, consequat condimentum lacus."
);

print(file_get_contents(FILE_PATH));

print(PHP_EOL);

print('Basename: ' . $someFile->getBasename() . PHP_EOL);
print('Filename: ' . $someFile->getFilename() . PHP_EOL);
print('Pathname: ' . $someFile->getPathname() . PHP_EOL);
print('Extension: ' . $someFile->getExtension() . PHP_EOL);
print('Real path: ' . $someFile->getRealPath() . PHP_EOL);
print('Path info: ' . $someFile->getPathInfo() . PHP_EOL);
print('File info: ' . $someFile->getFileInfo() . PHP_EOL);
print('Size: ' . $someFile->getSize() . PHP_EOL);
print('Type: ' . $someFile->getType() . PHP_EOL);
print('Inode: ' . $someFile->getInode() . PHP_EOL);
print('Permissions mode: ' . $someFile->getPerms() . PHP_EOL);
print('Owner system ID: ' . $someFile->getOwner() . PHP_EOL);
print('Group system ID: ' . $someFile->getGroup() . PHP_EOL);

print(PHP_EOL);

print('A time: ' . $someFile->getATime() . PHP_EOL);
print('C time: ' . $someFile->getCTime() . PHP_EOL);
print('M time: ' . $someFile->getMTime() . PHP_EOL);

print(PHP_EOL);

print('Is file? ' . $someFile->isFile() . PHP_EOL);
print('Is directory? ' . $someFile->isDir() . PHP_EOL);
print('Is link? ' . $someFile->isLink() . PHP_EOL);

print(PHP_EOL);

print('Is readable? ' . $someFile->isReadable() . PHP_EOL);
print('Is writable? ' . $someFile->isWritable() . PHP_EOL);
print('Is executable? ' . $someFile->isExecutable() . PHP_EOL);

print(PHP_EOL);

print('As strig: ' . (string) $someFile . PHP_EOL);

print(PHP_EOL);

$someFile->openFile('r');

for ($someFile->rewind(); $someFile->valid(); $someFile->next()) {
    print('[' . $someFile->key() . ']: ' . $someFile->current() . PHP_EOL);
}

print(PHP_EOL);

unlink(FILE_PATH);
rmdir(DIRECTORY_PATH);

print(PHP_EOL);
