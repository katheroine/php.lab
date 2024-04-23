<?php

// "Exception thrown if an error which can only be found on runtime occurs."
// -- https://www.php.net/manual/en/class.runtimeexception.php

function drawName() {
    $input = trim(readline('Name: '));

    if (strlen($input) == 0) {
        $inputPartials = [];
    } else {
        $inputPartials = explode(' ', $input);
    }

    $partialsNumber = count($inputPartials);

    if ($partialsNumber > 3 || $partialsNumber < 1) {
        throw new RuntimeException('Name should have from one to three parts.');
    }

    $names = [];

    foreach($inputPartials as $inputPartial) {
        $names[] = ucfirst($inputPartial);
    }

    return $names;
}

try {
    $names = drawName();

    $namesNumber = count($names);

    print("First name: {$names[0]}\n");
    if ($namesNumber == 3) {
        print("Second name: {$names[1]}\n");
        print("Last name: {$names[2]}\n");
    } elseif ($namesNumber == 2) {
        print("Last name: {$names[1]}\n");
    }
} catch (RuntimeException $exception) {
    print($exception->getMessage() . PHP_EOL);
}

print(PHP_EOL);
