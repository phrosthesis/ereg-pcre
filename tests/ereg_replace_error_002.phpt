--TEST--
Test ereg_replace() function : error conditions - bad regular expressions
--FILE--
<?php

/*
 * Prototype  : proto string ereg_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

echo '*** Testing ereg_replace() : bad REs ***', PHP_EOL, PHP_EOL;

test_dump(ereg_replace('', 'hello', 'some string'));
test_dump(ereg_replace('c(d', 'hello', 'some string'));
test_dump(ereg_replace('a[b', 'hello', 'some string'));
test_dump(ereg_replace('c(d', 'hello', 'some string'));
test_dump(ereg_replace('*', 'hello', 'some string'));
test_dump(ereg_replace('+', 'hello', 'some string'));
test_dump(ereg_replace('?', 'hello', 'some string'));
test_dump(ereg_replace('(+?*)', 'hello', 'some string'));
test_dump(ereg_replace('h{256}', 'hello', 'some string'));
test_dump(ereg_replace('h|', 'hello', 'some string'));
test_dump(ereg_replace('h{0}', 'hello', 'some string'));
test_dump(ereg_replace('h{2,1}', 'hello', 'some string'));
test_dump(ereg_replace('[a-c-e]', 'd', 'some string'));
test_dump(ereg_replace('\\', 'x', 'some string'));
test_dump(ereg_replace('([9-0])', '1', 'some string'));

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing ereg_replace() : bad REs ***

Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_EMPTY
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_EPAREN
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_EBRACK
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_EPAREN
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_BADRPT
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_BADRPT
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_BADRPT
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_BADRPT
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_BADBR
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_EMPTY
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_EMPTY
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_BADBR
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_ERANGE
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_EESCAPE
bool(false)
Deprecated: Function ereg_replace() is deprecated
Warning: ereg_replace(): REG_ERANGE
bool(false)

Done
