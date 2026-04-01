<?php

try {
    $number = readline("Give some number: ");

    if ($number == 0) {
        throw new Exception('The exception has been thrown.');
    }
} catch (Exception $exception) {
    print("The exception has been catched.\n");
} finally {
    print("The code has been executed.\n");
}
