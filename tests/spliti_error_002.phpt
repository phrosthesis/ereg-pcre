--TEST--
Test spliti() function : error conditions - test bad regular expressions
--FILE--
<?php

/*
 * Prototype  : proto array spliti(string pattern, string string [, int limit])
 * Description: spliti string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

/*
 * Test bad regular expressions
 */

echo '*** Testing spliti() : error conditions ***', PHP_EOL;

$regs = 'original';

echo PHP_EOL;
test_dump(spliti('', 'hello'));
echo PHP_EOL;
test_dump(spliti('c(d', 'hello'));
echo PHP_EOL;
test_dump(spliti('a[b', 'hello'));
echo PHP_EOL;
test_dump(spliti('c(d', 'hello'));
echo PHP_EOL;
test_dump(spliti('*', 'hello'));
echo PHP_EOL;
test_dump(spliti('+', 'hello'));
echo PHP_EOL;
test_dump(spliti('?', 'hello'));
echo PHP_EOL;
test_dump(spliti('(+?*)', 'hello', $regs));
echo PHP_EOL;
test_dump(spliti('h{256}', 'hello'));
echo PHP_EOL;
test_dump(spliti('h|', 'hello'));
echo PHP_EOL;
test_dump(spliti('h{0}', 'hello'));
echo PHP_EOL;
test_dump(spliti('h{2,1}', 'hello'));
echo PHP_EOL;
test_dump(spliti('[a-c-e]', 'd'));
echo PHP_EOL;
test_dump(spliti('\\', 'x'));
echo PHP_EOL;
test_dump(spliti('([9-0])', '1', $regs));
echo PHP_EOL;

//ensure $regs unchanged
test_dump($regs);

echo 'Done';

?>
--EXPECTF--
*** Testing spliti() : error conditions ***

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_EMPTY
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_EPAREN
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_EBRACK
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_EPAREN
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_BADRPT
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_BADRPT
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_BADRPT
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti() expects parameter 3 to be long, string given
null

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_BADBR
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_EMPTY
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_EMPTY
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_BADBR
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_ERANGE
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti(): REG_EESCAPE
bool(false)

Deprecated: Function spliti() is deprecated
Warning: spliti() expects parameter 3 to be long, string given
null

string(8) "original"
Done
