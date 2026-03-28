<?php

$someObject = new class {
};

print('Type: ' . gettype($someObject) . PHP_EOL);
print('Class: ' . get_class($someObject) . PHP_EOL);
