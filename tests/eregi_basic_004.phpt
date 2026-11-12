--TEST--
Test eregi() function : basic functionality - a few non-matches
--FILE--
<?php

/*
 * Prototype  : proto int eregi(string pattern, string string [, array registers])
 * Description: Regular expression match
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

$regs = 'original';

test_dump(eregi('[A-Z]', '0', $regs));
test_dump(eregi('(a){4}', 'aaa', $regs));
test_dump(eregi('^a', 'ba', $regs));
test_dump(eregi('b$', 'ba', $regs));
test_dump(eregi('[:alpha:]', 'x', $regs));

// Ensure $regs is unchanged
echo PHP_EOL;
test_dump($regs);

echo 'Done';

?>
--EXPECTF--
Deprecated: Function eregi() is deprecated
bool(false)
Deprecated: Function eregi() is deprecated
bool(false)
Deprecated: Function eregi() is deprecated
bool(false)
Deprecated: Function eregi() is deprecated
bool(false)
Deprecated: Function eregi() is deprecated
bool(false)

string(8) "original"
Done
