<?php

$s = "hello";
print("string \"hello\": {$s} (" . gettype($s) . ")\n");

$s = 'hello';
print("string 'hello': {$s} (" . gettype($s) . ")\n");

$s = <<<EOS
  Videmus nunc
  per speculum
  et in aenigmate.
EOS;

print "string from heredoc:\n{$s}\n\n";

