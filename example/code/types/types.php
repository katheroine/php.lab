<?php

$n = null;
$b = true;
$i = 5;
$d = 2.4;
$s = "hello";
$a = [3, 5, 7];
$h = [
  2 => "Hello, there!",
  'color' => 'orange',
  3.14 => 'PI',
];
$u = function(int $number) {
  return $number * 3;
};
$o = (object) [
  2 => "Hello, there!",
  'color' => 'orange',
  3.14 => 'PI',
];
$co = new class {
  private int $number;
  public function set_number(int $number): void {
    $this->number = $number;
  }
  public function get_number(): int {
    return $this->number;
  }
};

echo "\$n = null; // null: " . $n . " (" . gettype($n) . ")\n\n";

echo "\$b = true; // boolean: " . $b . " (" . gettype($b) . ")\n\n";

echo "\$i = 5; // integer: " . $i . " (" . gettype($i) . ")\n\n";

echo "\$d = 2.4; // floating point double precision: " . $d . " (" . gettype($d) . ")\n\n";

echo "\$s = \"hello\"; // string: " . $s . " (" . gettype($s) . ")\n\n";

echo "\$a = [3, 5, 7]; // array:\n";
print_r($a);
echo "(" . gettype($a) . ")\n\n";

echo "\$h = [\n  2 => \"Hello, there!\",\n  'color' => 'orange',\n  3.14 => 'PI',\n];\n// hash:\n";
print_r($h);
echo "(" . gettype($h) . ")\n\n";

echo "\$u = function(int \$number) {\n  return number * 3;\n};\n// function:\n";
print_r($u);
echo "(" . gettype($u) . ")\n\n";

echo "\$o = (object) [  2 => \"Hello, there!\",\n  'color' => 'orange',\n  3.14 => 'PI',\n];\n// object (created from hash):\n";
print_r($o);
echo "(" . gettype($o) . ")\n\n";

echo "\$co = new class {\n  private int \$number;
  public function set_number(int \$number): void {\n    \$this->number = \$number;\n  }
  public function get_number(): int {\n    return \$number;\n  }\n};
// object (created from anonymous class):\n";
print_r($co);
echo "(" . gettype($co) . ")\n\n";
