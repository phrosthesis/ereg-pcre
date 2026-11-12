--TEST--
Test spliti() function : basic functionality - a few non-matches
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
test_dump(spliti('[A-Z]', '-- 0 --'));
echo PHP_EOL;
test_dump(spliti('(a){4}', '--- aaa ---'));
echo PHP_EOL;
test_dump(spliti('^a', '--- ba ---'));
echo PHP_EOL;
test_dump(spliti('b$', '--- ba ---'));
echo PHP_EOL;
test_dump(spliti('[:alpha:]', '--- x ---'));
echo PHP_EOL;

echo 'Done';

?>
--EXPECTF--
Deprecated: Function spliti() is deprecated
array(1) [
    [0] =>
    string(7) "-- 0 --"
]

Deprecated: Function spliti() is deprecated
array(1) [
    [0] =>
    string(11) "--- aaa ---"
]

Deprecated: Function spliti() is deprecated
array(1) [
    [0] =>
    string(10) "--- ba ---"
]

Deprecated: Function spliti() is deprecated
array(1) [
    [0] =>
    string(10) "--- ba ---"
]

Deprecated: Function spliti() is deprecated
array(1) [
    [0] =>
    string(9) "--- x ---"
]

Done
