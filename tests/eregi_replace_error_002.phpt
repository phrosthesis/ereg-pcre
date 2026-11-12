--TEST--
Test eregi_replace() function : error conditions - bad regular expressions
--FILE--
<?php

/*
 * Prototype  : proto string eregi_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

echo '*** Testing eregi_replace() : bad REs ***', PHP_EOL;

echo PHP_EOL;
test_dump(eregi_replace('', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('c(d', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('a[b', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('c(d', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('*', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('+', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('?', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('(+?*)', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('h{256}', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('h|', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('h{0}', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('h{2,1}', 'hello', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('[a-c-e]', 'd', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('\\', 'x', 'some string'));
echo PHP_EOL;
test_dump(eregi_replace('([9-0])', '1', 'some string'));
echo PHP_EOL;

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing eregi_replace() : bad REs ***

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_EMPTY
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_EPAREN
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_EBRACK
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_EPAREN
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_BADRPT
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_BADRPT
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_BADRPT
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_BADRPT
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_BADBR
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_EMPTY
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_EMPTY
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_BADBR
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_ERANGE
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_EESCAPE
bool(false)

Deprecated: Function eregi_replace() is deprecated
Warning: eregi_replace(): REG_ERANGE
bool(false)

Done
