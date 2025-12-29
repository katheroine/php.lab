<?php

$value = readline("Give your nickname: ");

$nickname = $value ?: "unknown";

print("Your nickname is: {$nickname}\n");
