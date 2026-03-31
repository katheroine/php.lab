<?php

try {
    throw new Exception('The exception has been thrown.');
} catch (Exception $exception) {
    print("The exception has been catched:\n");
    print_r($exception);
}
