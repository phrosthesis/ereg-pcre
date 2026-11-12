--TEST--
Test ereg() function : error conditions - test bad regular expressions
--FILE--
<?php

/*
 * Prototype  : proto int ereg(string pattern, string string [, array registers])
 * Description: Regular expression match
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

/*
 * Test bad regular expressions
 */

echo '*** Testing ereg() : error conditions ***', PHP_EOL;

$regs = 'original';

test_dump(ereg('', 'hello'));
test_dump(ereg('c(d', 'hello'));
test_dump(ereg('a[b', 'hello'));
test_dump(ereg('c(d', 'hello'));
test_dump(ereg('*', 'hello'));
test_dump(ereg('+', 'hello'));
test_dump(ereg('?', 'hello'));
test_dump(ereg('(+?*)', 'hello', $regs));
test_dump(ereg('h{256}', 'hello'));
test_dump(ereg('h|', 'hello'));
test_dump(ereg('h{0}', 'hello'));
test_dump(ereg('h{2,1}', 'hello'));
test_dump(ereg('[a-c-e]', 'd'));
test_dump(ereg('\\', 'x'));
test_dump(ereg('([9-0])', '1', $regs));

//ensure $regs unchanged
echo PHP_EOL;
test_dump($regs);

echo 'Done';

?>
--EXPECTF--
*** Testing ereg() : error conditions ***
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_EMPTY
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_EPAREN
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_EBRACK
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_EPAREN
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_BADRPT
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_BADRPT
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_BADRPT
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_BADRPT
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_BADBR
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_EMPTY
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_EMPTY
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_BADBR
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_ERANGE
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_EESCAPE
bool(false)
Deprecated: Function ereg() is deprecated
Warning: ereg(): REG_ERANGE
bool(false)

string(8) "original"
Done
