<?php

$text = "Omnis mundi creatura\n
quasi liber et pictura\n
nobis est in speculum:\n
nostrae vitae, nostrae mortis,\n
nostri status, nostrae sortis\n
fidele signaculum.\n";

$charactersNumber = strlen($text);
$wordsNumber = str_word_count($text);
$sentencesNumber = substr_count($text, '.') + substr_count($text, '!') + substr_count($text, '?');

printf("Length: %d, Words: %d, Sentences: %d\n", $charactersNumber, $wordsNumber, $sentencesNumber);

$words = str_word_count($text, 1); // array of words
$uniqueWordsNumber = count(array_unique($words));

printf("Unique words: %d\n", $uniqueWordsNumber);

$vowelsNumber = strlen(preg_replace('/[^aeiouAEIOU]/', '', $text));
$consonantsNumber = strlen(preg_replace('/[aeiouAEIOU\s]/', '', $text));
$spacesNumber = substr_count($text, ' ');
printf("Vowels: %d, Consonants: %d, Spaces: %d\n", $vowelsNumber, $consonantsNumber, $spacesNumber);
