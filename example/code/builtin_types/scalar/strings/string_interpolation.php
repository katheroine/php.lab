<?php

$someNumber = 1; $someValue = 2.3; $someText = 'apple';

// Wanrning!
// Placing interpolated variables inside strings without {} is not recommended.
// Using ${variable} instead of {$variable} is deprecated.
// Quoted keys cannot be parsed.

print("Some number: $someNumber\nSome value: {$someValue}\nSome text: ${someText}\n\n");

$someArray = [
  'orange',
  'blue',
  'green',
];

print("First array element: $someArray[0]\nSecond array element: {$someArray[1]}\nThird array element: ${someArray[2]}\n\n");

$otherArray = [
  'text_0' => "Stat rosa pristina nomine, nomina nuda tenemus.",
  'text_1' => "Omnis mundi creatura quasi liber et pictura nobis est in speculum.",
  'text_2' => "Videmus nunc per speculum et in aenigmate.",
];

// Warning!
// Using associative array keys without quotes is not recommended.
// This syntax is proper but for defined constants.
// But if it is used inside the interpolated string without {} it is proper.

print("First associative array element: $otherArray[text_0]\n");
print("Second associative array element: {$otherArray['text_1']}\n");
print("Third associative array element: ${otherArray['text_2']}\n\n");

$someObject = new class {
  public string $someProperty = "fruit";
  public string $otherProperty = "flower";
  public string $anotherProperty = "animal";
};

print("Some object property: $someObject->someProperty\n");
print("Other object property: {$someObject->otherProperty}\n");
// print("Another object property: ${someObject->anotherProperty}\n");
// PHP Fatal error:  Uncaught Error: Undefined constant "someObject"
print(PHP_EOL);
