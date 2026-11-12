--TEST--
Test sql_regcase() function : error conditions
--FILE--
<?php

/*
 * Prototype  : proto string sql_regcase(string string)
 * Description: Make regular expression for case insensitive match
 * Source code: ext/standard/reg.c
 * Alias to functions: msql_regcase
 */

echo '*** Testing sql_regcase() : error conditions ***', PHP_EOL;

// Zero arguments
echo PHP_EOL, '-- Testing sql_regcase() function with Zero arguments --', PHP_EOL;
test_dump(sql_regcase());

//Test sql_regcase with one more than the expected number of arguments
echo PHP_EOL, '-- Testing sql_regcase() function with more than expected no. of arguments --', PHP_EOL;
$string = 'string_val';
$extra_arg = 10;
test_dump(sql_regcase($string, $extra_arg));

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing sql_regcase() : error conditions ***

-- Testing sql_regcase() function with Zero arguments --
Deprecated: Function sql_regcase() is deprecated
Warning: sql_regcase() expects exactly 1 parameter, 0 given
null

-- Testing sql_regcase() function with more than expected no. of arguments --
Deprecated: Function sql_regcase() is deprecated
Warning: sql_regcase() expects exactly 1 parameter, 2 given
null

Done
