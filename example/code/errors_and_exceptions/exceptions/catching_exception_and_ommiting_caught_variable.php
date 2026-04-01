<?php

try {
    throw new Exception('The exception has been thrown.');
} catch (Exception) {
    print("The exception has been catched.\n");
}
