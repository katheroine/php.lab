<?php

$value = null ?? 'hello';
print("Value: {$value}\n");

$value = true ?? 'hello';
print("Value: {$value}\n");

$value = false ?? 'hello';
print("Value: {$value}\n");

$value = 'whatever' ?? 'hello';
print("Value: {$value}\n");
