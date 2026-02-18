<?php

$scientificNotationWithoutSign = 5e3;
print("5e3: ");
var_dump($scientificNotationWithoutSign);

$scientificNotationWithoutSign = 5E3;
print("5E3: ");
var_dump($scientificNotationWithoutSign);

print(PHP_EOL);

$scinetifictNotificationPlusSign = 5e+3;
print("5e+3: ");
var_dump($scinetifictNotificationPlusSign);

$scinetifictNotificationPlusSign = 5E+3;
print("5E+3: ");
var_dump($scinetifictNotificationPlusSign);

print(PHP_EOL);

$scientificNotificationMinusSign = 5e-3;
print("5e-3: ");
var_dump($scientificNotificationMinusSign);

$scientificNotificationMinusSign = 5E-3;
print("5E-3: ");
var_dump($scientificNotificationMinusSign);

print(PHP_EOL);
