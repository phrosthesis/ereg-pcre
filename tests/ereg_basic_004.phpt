--TEST--
Test ereg() function : basic functionality - a few non-matches
--FILE--
<?php

/*
 * Prototype  : proto int ereg(string pattern, string string [, array registers])
 * Description: Regular expression match
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

$regs = 'original';

test_dump(ereg('A', 'a', $regs));
test_dump(ereg('[A-Z]', '0', $regs));
test_dump(ereg('(a){4}', 'aaa', $regs));
test_dump(ereg('^a', 'ba', $regs));
test_dump(ereg('b$', 'ba', $regs));
test_dump(ereg('[:alpha:]', 'x', $regs));

// Ensure $regs is unchanged
echo PHP_EOL;
test_dump($regs);

echo 'Done';

?>
--EXPECTF--
Deprecated: Function ereg() is deprecated
bool(false)
Deprecated: Function ereg() is deprecated
bool(false)
Deprecated: Function ereg() is deprecated
bool(false)
Deprecated: Function ereg() is deprecated
bool(false)
Deprecated: Function ereg() is deprecated
bool(false)
Deprecated: Function ereg() is deprecated
bool(false)

string(8) "original"
Done
