--TEST--
Test eregi() function : error conditions - test bad regular expressions
--FILE--
<?php

/*
 * Prototype  : proto int eregi(string pattern, string string [, array registers])
 * Description: Regular expression match
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

/*
 * Test bad regular expressions
 */

echo '*** Testing eregi() : error conditions ***', PHP_EOL;

$regs = 'original';

echo PHP_EOL;
test_dump(eregi('', 'hello'));
echo PHP_EOL;
test_dump(eregi('c(d', 'hello'));
echo PHP_EOL;
test_dump(eregi('a[b', 'hello'));
echo PHP_EOL;
test_dump(eregi('c(d', 'hello'));
echo PHP_EOL;
test_dump(eregi('*', 'hello'));
echo PHP_EOL;
test_dump(eregi('+', 'hello'));
echo PHP_EOL;
test_dump(eregi('?', 'hello'));
echo PHP_EOL;
test_dump(eregi('(+?*)', 'hello', $regs));
echo PHP_EOL;
test_dump(eregi('h{256}', 'hello'));
echo PHP_EOL;
test_dump(eregi('h|', 'hello'));
echo PHP_EOL;
test_dump(eregi('h{0}', 'hello'));
echo PHP_EOL;
test_dump(eregi('h{2,1}', 'hello'));
echo PHP_EOL;
test_dump(eregi('[a-c-e]', 'd'));
echo PHP_EOL;
test_dump(eregi('\\', 'x'));
echo PHP_EOL;
test_dump(eregi('([9-0])', '1', $regs));
echo PHP_EOL;

//ensure $regs unchanged
test_dump($regs);

echo 'Done';

?>
--EXPECTF--
*** Testing eregi() : error conditions ***

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_EMPTY
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_EPAREN
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_EBRACK
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_EPAREN
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_BADRPT
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_BADRPT
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_BADRPT
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_BADRPT
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_BADBR
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_EMPTY
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_EMPTY
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_BADBR
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_ERANGE
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_EESCAPE
bool(false)

Deprecated: Function eregi() is deprecated
Warning: eregi(): REG_ERANGE
bool(false)

string(8) "original"
Done
