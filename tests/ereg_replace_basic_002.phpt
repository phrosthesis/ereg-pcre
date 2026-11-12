--TEST--
Test ereg_replace() function : basic functionality - a few non-matches
--FILE--
<?php

/*
 * Prototype  : proto string ereg_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

$replacement = 'r';

test_dump(ereg_replace('A', $replacement, 'a'));
test_dump(ereg_replace('[A-Z]', $replacement, '0'));
test_dump(ereg_replace('(a){4}', $replacement, 'aaa'));
test_dump(ereg_replace('^a', $replacement, 'ba'));
test_dump(ereg_replace('b$', $replacement, 'ba'));
test_dump(ereg_replace('[:alpha:]', $replacement, 'x'));

echo 'Done';

?>
--EXPECTF--
Deprecated: Function ereg_replace() is deprecated
string(1) "a"
Deprecated: Function ereg_replace() is deprecated
string(1) "0"
Deprecated: Function ereg_replace() is deprecated
string(3) "aaa"
Deprecated: Function ereg_replace() is deprecated
string(2) "ba"
Deprecated: Function ereg_replace() is deprecated
string(2) "ba"
Deprecated: Function ereg_replace() is deprecated
string(1) "x"
Done
