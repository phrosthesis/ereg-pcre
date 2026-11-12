--TEST--
Test eregi_replace() function : basic functionality - a few non-matches
--FILE--
<?php

/*
 * Prototype  : proto string eregi_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

$replacement = 'r';

echo PHP_EOL;
test_dump(eregi_replace('[A-Z]', $replacement, '0'));
echo PHP_EOL;
test_dump(eregi_replace('(a){4}', $replacement, 'aaa'));
echo PHP_EOL;
test_dump(eregi_replace('^a', $replacement, 'ba'));
echo PHP_EOL;
test_dump(eregi_replace('b$', $replacement, 'ba'));
echo PHP_EOL;
test_dump(eregi_replace('[:alpha:]', $replacement, 'x'));
echo PHP_EOL;

echo 'Done';

?>
--EXPECTF--
Deprecated: Function eregi_replace() is deprecated
string(1) "0"

Deprecated: Function eregi_replace() is deprecated
string(3) "aaa"

Deprecated: Function eregi_replace() is deprecated
string(2) "ba"

Deprecated: Function eregi_replace() is deprecated
string(2) "ba"

Deprecated: Function eregi_replace() is deprecated
string(1) "x"

Done
