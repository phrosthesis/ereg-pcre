--TEST--
Test split() function : basic functionality - a few non-matches
--FILE--
<?php

/*
 * Prototype  : proto array split(string pattern, string string [, int limit])
 * Description: split string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

$replacement = 'r';

echo PHP_EOL;
test_dump(split('A', '-- a --'));
echo PHP_EOL;
test_dump(split('[A-Z]', '-- 0 --'));
echo PHP_EOL;
test_dump(split('(a){4}', '--- aaa ---'));
echo PHP_EOL;
test_dump(split('^a', '--- ba ---'));
echo PHP_EOL;
test_dump(split('b$', '--- ba ---'));
echo PHP_EOL;
test_dump(split('[:alpha:]', '--- x ---'));
echo PHP_EOL;

echo 'Done';

?>
--EXPECTF--
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(7) "-- a --"
]

Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(7) "-- 0 --"
]

Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(11) "--- aaa ---"
]

Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(10) "--- ba ---"
]

Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(10) "--- ba ---"
]

Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(9) "--- x ---"
]
Done
