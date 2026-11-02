--TEST--
Test sql_regcase() function : usage variations - unexpected arg type
--FILE--
<?php

/*
 * Prototype  : proto string sql_regcase(string string)
 * Description: Make regular expression for case insensitive match
 * Source code: ext/standard/reg.c
 * Alias to functions: msql_regcase
 */

function test_error_handler(int $err_no, string $err_msg)
{
    echo "Error: $err_no - $err_msg", PHP_EOL;
}

set_error_handler('test_error_handler');

echo '*** Testing sql_regcase() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)

//get an unset variable
$unset_var = 10;
unset($unset_var);

//array of values to iterate over
$values = array(
    // int data
    0,
    1,
    12345,
    -2345,

    // float data
    10.5,
    -10.5,
    10.1234567e10,
    10.7654321E-10,
    .5,

    // array data
    array(),
    array(0),
    array(1),
    array(1, 2),
    array('color' => 'red', 'item' => 'pen'),

    // null data
    null,
    null,

    // boolean data
    true,
    false,
    true,
    false,

    // empty data
    '',
    '',

    // object data
    new stdClass(),

    // undefined data
    $undefined_var,

    // unset data
    $unset_var,
);

// loop through each element of the array for string

foreach ($values as $value) {
    echo PHP_EOL, "Arg value <$value>", PHP_EOL;
    var_dump(sql_regcase($value));
}

echo 'Done';

?>
--EXPECTF--
*** Testing sql_regcase() : usage variations ***
Error: 8 - Undefined variable: undefined_var
Error: 8 - Undefined variable: unset_var

Arg value <0>
Error: %d - Function sql_regcase() is deprecated
string(1) "0"

Arg value <1>
Error: %d - Function sql_regcase() is deprecated
string(1) "1"

Arg value <12345>
Error: %d - Function sql_regcase() is deprecated
string(5) "12345"

Arg value <-2345>
Error: %d - Function sql_regcase() is deprecated
string(5) "-2345"

Arg value <10.5>
Error: %d - Function sql_regcase() is deprecated
string(4) "10.5"

Arg value <-10.5>
Error: %d - Function sql_regcase() is deprecated
string(5) "-10.5"

Arg value <101234567000>
Error: %d - Function sql_regcase() is deprecated
string(12) "101234567000"

Arg value <1.07654321E-9>
Error: %d - Function sql_regcase() is deprecated
string(16) "1.07654321[Ee]-9"

Arg value <0.5>
Error: %d - Function sql_regcase() is deprecated
string(3) "0.5"

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function sql_regcase() is deprecated
Error: %d - sql_regcase() expects parameter 1 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function sql_regcase() is deprecated
Error: %d - sql_regcase() expects parameter 1 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function sql_regcase() is deprecated
Error: %d - sql_regcase() expects parameter 1 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function sql_regcase() is deprecated
Error: %d - sql_regcase() expects parameter 1 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function sql_regcase() is deprecated
Error: %d - sql_regcase() expects parameter 1 to be string, array given
NULL

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""

Arg value <1>
Error: %d - Function sql_regcase() is deprecated
string(1) "1"

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""

Arg value <1>
Error: %d - Function sql_regcase() is deprecated
string(1) "1"

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""

Error: 4096 - Object of class stdClass could not be converted to string
Arg value <>
Error: %d - Function sql_regcase() is deprecated
Error: %d - sql_regcase() expects parameter 1 to be string, object given
NULL

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""

Arg value <>
Error: %d - Function sql_regcase() is deprecated
string(0) ""
Done
