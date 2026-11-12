--TEST--
Test sql_regcase() function : basic functionality
--FILE--
<?php

/*
 * Prototype  : proto string sql_regcase(string string)
 * Description: Make regular expression for case insensitive match
 * Source code: ext/standard/reg.c
 * Alias to functions: msql_regcase
 */

echo '*** Testing sql_regcase() : basic functionality ***', PHP_EOL;

// Initialise all required variables
$string = 'string_Val-0';

// Calling sql_regcase() with all possible arguments
echo PHP_EOL;
test_dump(sql_regcase($string));
echo PHP_EOL;

echo 'Done';

?>
--EXPECTF--
*** Testing sql_regcase() : basic functionality ***

Deprecated: Function sql_regcase() is deprecated
string(39) "[Ss][Tt][Rr][Ii][Nn][Gg]_[Vv][Aa][Ll]-0"

Done
