--TEST--
Test split() function : usage variations  - out-of-range values for limit
--FILE--
<?php

/*
 * Prototype  : proto array split(string pattern, string string [, int limit])
 * Description: Split string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

echo "*** Testing split() : usage variations ***\n";

$pattern = '[[:space:]]';
$string = '1 2 3 4 5';
var_dump(split($pattern, $string, 0));
var_dump(split($pattern, $string, -10));

echo 'Done';

?>
--EXPECTF--
*** Testing split() : usage variations ***

Deprecated: Function split() is deprecated in %s on line %d
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Deprecated: Function split() is deprecated in %s on line %d
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}
Done
