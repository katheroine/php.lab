<?php

$i = 1; $f = 2.3; $s = "apple";

// Wanrning!
// Placing interpolated variables inside strings without {} is not recommended.
// Quoted keys cannot be parsed.

echo "\$i = $i, \$f = {$f}, \$s = ${s}\n\n";

$a = [
  "orange",
  "blue",
  "green",
];

echo "\$a[0] = $a[0], \$a[1] = {$a[1]}, \$a[2] = ${a[2]}\n\n";

$g = [
  'text_0' => "Stat rosa pristina nomine, nomina nuda tenemus.",
  'text_1' => "Omnis mundi creatura quasi liber et pictura nobis est in speculum.",
  'text_2' => "Videmus nunc per speculum et in aenigmate.",
];

// Warning!
// Using associative array keys without quotes is not recommended.
// This syntax is proper but for defined constants.
// But if it is used inside the interpolated string without {} it is proper.

echo "\$g['text_0']: $g[text_0]\n";
echo "\$g['text_1']: {$g['text_1']}\n";
echo "\$g['text_2']: ${g['text_2']}\n\n";

$o = new class {
  public string $nickname = "katheroine";
  public string $profession = "programmer";
  public string $os = "Linux";
};

echo "\$o->nickname: $o->nickname\n";
echo "\$o->profession: {$o->profession}\n";
//echo "\$o->os: ${o->os}\n"; // error
echo "\n";
