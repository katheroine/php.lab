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

$validateHumidityInPercents = function(float $value): string {
    if ($value > 60) {
        return "Humidity is to high for human health.";
    } else if ($value < 40) {
        return "Humidity is to low for human health.";
    }

    return '';
};

$temperature = sourceValue("Give the ambient temperature in degrees Celsius: ", "validateTemperatureInCelsius");
print("Tempetature has been set to " . $temperature . " degree Celsius.\n");

$humidity = sourceValue("Give the air humidity in percents: ", $validateHumidityInPercents);
print("Humidity has been set to " . $humidity . " percent.\n");

$pressure = sourceValue("Give the atmospheric pressure in hectopascals: ", function($value) {
  if ($value != 1013.25) {
    return "Pressure is not perfect.";
  }

  return '';
});
print("Pressure has been set to " . $pressure . " hectopascals.\n");
