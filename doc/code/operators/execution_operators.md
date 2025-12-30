[⌂ Home](../../../README.md)
[▲ Previous: Error control operators](./error_control_operators.md)

# Execution operators

PHP supports one **execution operator**: *backticks* (` `` `). Note that these are not single-quotes! PHP will attempt to execute the contents of the *backticks* as a shell command; the output will be returned (i.e., it won't simply be dumped to output; it can be assigned to a variable). Use of the *backtick operator* is identical `to shell_exec()`.

*Example: Backtick operator*

```php
<?php
$output = `ls -al`;
echo "<pre>$output</pre>";
?>
```

Note:

The *backtick operator* is disabled when `shell_exec()` is disabled.

Note:

Unlike some other languages, backticks have no special meaning within double-quoted strings.

[▵ Up](#execution-operators)
[⌂ Home](../../../README.md)
[▲ Previous: Error control operators](./error_control_operators.md)
