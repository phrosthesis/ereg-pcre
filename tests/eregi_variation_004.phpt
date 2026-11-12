--TEST--
Test eregi() function : usage variations - pass non-variable as arg 3, which is pass-by-ref.
--FILE--
<?php

/*
 * Prototype  : proto int eregi(string pattern, string string [, array registers])
 * Description: Regular expression match
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

test_dump(eregi('l{2}', 'hello', str_repeat('x', 1)));
echo 'Done';

?>
--EXPECTF--
Notice: Only variables should be passed by reference
Deprecated: Function eregi() is deprecated
int(2)
Done
