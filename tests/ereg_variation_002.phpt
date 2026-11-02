--TEST--
Test ereg() function : usage variations - unexpected type arg 2
--FILE--
<?php

/*
 * Prototype  : proto int ereg(string pattern, string string [, array registers])
 * Description: Regular expression match
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

function test_error_handler(int $err_no, string $err_msg)
{
    echo "Error: $err_no - $err_msg", PHP_EOL;
}

set_error_handler('test_error_handler');

echo '*** Testing ereg() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$pattern = '1';
$registers = array();

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
    var_dump(ereg($pattern, $value, $registers));
}

echo 'Done';

?>
--EXPECTF--
*** Testing ereg() : usage variations ***
Error: 8 - Undefined variable: undefined_var
Error: 8 - Undefined variable: unset_var

Arg value <0>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <1>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <12345>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <-2345>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <10.5>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <-10.5>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <101234567000>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <1.07654321E-9>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <0.5>
Error: %d - Function ereg() is deprecated
bool(false)

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function ereg() is deprecated
Error: %d - ereg() expects parameter 2 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function ereg() is deprecated
Error: %d - ereg() expects parameter 2 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function ereg() is deprecated
Error: %d - ereg() expects parameter 2 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function ereg() is deprecated
Error: %d - ereg() expects parameter 2 to be string, array given
NULL

Error: 8 - Array to string conversion
Arg value <Array>
Error: %d - Function ereg() is deprecated
Error: 2 - ereg() expects parameter 2 to be string, array given
NULL

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <1>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <1>
Error: %d - Function ereg() is deprecated
int(1)

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)
Error: 4096 - Object of class stdClass could not be converted to string, %s(73)

Arg value <>
Error: %d - Function ereg() is deprecated
Error: 2 - ereg() expects parameter 2 to be string, object given
NULL

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)

Arg value <>
Error: %d - Function ereg() is deprecated
bool(false)
Done
