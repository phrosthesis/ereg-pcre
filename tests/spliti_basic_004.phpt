--TEST--
Test spliti() function : basic functionality - confirm case insensitivity
--FILE--
<?php

/*
 * Prototype  : proto array spliti(string pattern, string string [, int limit])
 * Description: spliti string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

$replacement = 'r';

echo PHP_EOL;
test_dump(spliti('[a-z]', '--- A ---'));
echo PHP_EOL;
test_dump(spliti('[A-Z]', '--- a ---'));
echo PHP_EOL;
test_dump(spliti('[[:lower:]]', '--- A ---'));
echo PHP_EOL;
test_dump(spliti('[[:upper:]]', '--- a ---'));
echo PHP_EOL;

echo 'Done';

?>
--EXPECTF--
Deprecated: Function spliti() is deprecated
array(2) [
    [0] =>
    string(4) "--- "
    [1] =>
    string(4) " ---"
]

Deprecated: Function spliti() is deprecated
array(2) [
    [0] =>
    string(4) "--- "
    [1] =>
    string(4) " ---"
]

Deprecated: Function spliti() is deprecated
array(2) [
    [0] =>
    string(4) "--- "
    [1] =>
    string(4) " ---"
]

Deprecated: Function spliti() is deprecated
array(2) [
    [0] =>
    string(4) "--- "
    [1] =>
    string(4) " ---"
]

Done
