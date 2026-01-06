<?php

$now = "afternoon";

$greetings = match($now) {
    "morning" => "Good morning!",
    "afternoon" => "Good afternoon!",
    "evening" => "Good evening!",
    "night" => "Good evening!",
};

print($greetings . PHP_EOL);

$now = "evening";

$greetings = match($now) {
    "morning" => "Good morning!",
    "afternoon" => "Good afternoon!",
    "evening", "night" => "Good evening!",
};

print($greetings . PHP_EOL);

$now = "other";

$greetings = match($now) {
    "morning" => "Good morning!",
    "afternoon" => "Good afternoon!",
    "evening" => "Good evening!",
    "night" => "Good evening!",
    default => "Hello!",
};

print($greetings . PHP_EOL);
