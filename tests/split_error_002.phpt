--TEST--
Test split() function : error conditions - test bad regular expressions
--FILE--
<?php

/*
 * Prototype  : proto array split(string pattern, string string [, int limit])
 * Description: Split string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

/*
 * Test bad regular expressions
 */

echo '*** Testing split() : error conditions ***', PHP_EOL;

$regs = 'original';

echo PHP_EOL;
test_dump(split('', 'hello'));
echo PHP_EOL;
test_dump(split('c(d', 'hello'));
echo PHP_EOL;
test_dump(split('a[b', 'hello'));
echo PHP_EOL;
test_dump(split('c(d', 'hello'));
echo PHP_EOL;
test_dump(split('*', 'hello'));
echo PHP_EOL;
test_dump(split('+', 'hello'));
echo PHP_EOL;
test_dump(split('?', 'hello'));
echo PHP_EOL;
test_dump(split('(+?*)', 'hello', $regs));
echo PHP_EOL;
test_dump(split('h{256}', 'hello'));
echo PHP_EOL;
test_dump(split('h|', 'hello'));
echo PHP_EOL;
test_dump(split('h{0}', 'hello'));
echo PHP_EOL;
test_dump(split('h{2,1}', 'hello'));
echo PHP_EOL;
test_dump(split('[a-c-e]', 'd'));
echo PHP_EOL;
test_dump(split('\\', 'x'));
echo PHP_EOL;
test_dump(split('([9-0])', '1', $regs));
echo PHP_EOL;

//ensure $regs unchanged
test_dump($regs);

echo 'Done';

?>
--EXPECTF--
*** Testing split() : error conditions ***

Deprecated: Function split() is deprecated
Warning: split(): REG_EMPTY
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_EPAREN
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_EBRACK
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_EPAREN
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_BADRPT
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_BADRPT
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_BADRPT
bool(false)

Deprecated: Function split() is deprecated
Warning: split() expects parameter 3 to be long, string given
null

Deprecated: Function split() is deprecated
Warning: split(): REG_BADBR
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_EMPTY
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_EMPTY
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_BADBR
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_ERANGE
bool(false)

Deprecated: Function split() is deprecated
Warning: split(): REG_EESCAPE
bool(false)

Deprecated: Function split() is deprecated
Warning: split() expects parameter 3 to be long, string given
null

string(8) "original"
Done
