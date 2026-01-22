<?php

function sourceValue($prompt, $validate)
{
    do {
        $value = (string)readline($prompt);
        $validation_message = $validate($value);

        if (empty($validation_message))
            break;

        print($validation_message . "\nTry again.\n");
    } while (true);

    return $value;
}

function validateTemperatureInCelsius($value)
{
    $message = "";

    if ($value > 26) {
        $message = "Temperature is to high for human health.";
    } else if ($value < 22) {
        $message = "Temperature is to low for human health.";
    }

    return $message;
}

$temperature = sourceValue("Give the ambient temperature in degrees Celsius: ", "validateTemperatureInCelsius");
print("Tempetature has been set to " . $temperature . " degree Celsius.\n");
