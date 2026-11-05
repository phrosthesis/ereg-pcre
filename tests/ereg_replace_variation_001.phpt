--TEST--
Test ereg_replace() function : usage variations - unexpected type arg 1
--FILE--
<?php

/*
 * Prototype  : proto string ereg_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

function test_error_handler(int $err_no, string $err_msg)
{
    echo "Error: $err_msg", PHP_EOL;
}

set_error_handler('test_error_handler');

echo '*** Testing ereg_replace() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$replacement = 'new';
$string = 'original';

//array of values to iterate over
$values = [
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
    [],
    [0],
    [1],
    [1, 2],
    ['color' => 'red', 'item' => 'pen'],

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
    new stdClass()
];

// loop through each element of the array for pattern

foreach ($values as $value) {
    try {
        echo PHP_EOL, "Arg value '$value'", PHP_EOL;
    } catch (Throwable $err) {
        echo 'Error: ', $err->getMessage(), PHP_EOL, "Arg value ''", PHP_EOL;
    }
    var_dump(ereg_replace($value, $replacement, $string));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing ereg_replace() : usage variations ***

Arg value '0'
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Arg value '1'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value '12345'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value '-2345'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value '10.5'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value '-10.5'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value '101234567000'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value '1.07654321E-9'
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Arg value '0.5'
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Error: Array to string conversion
Arg value 'Array'
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Error: Array to string conversion
Arg value 'Array'
Error: Function ereg_replace() is deprecated
string(8) "original"

Error: Array to string conversion
Arg value 'Array'
Error: Function ereg_replace() is deprecated
string(8) "original"

Error: Array to string conversion
Arg value 'Array'
Error: Function ereg_replace() is deprecated
string(8) "original"

Error: Array to string conversion
Arg value 'Array'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value ''
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Arg value ''
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Arg value '1'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value ''
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Arg value '1'
Error: Function ereg_replace() is deprecated
string(8) "original"

Arg value ''
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Arg value ''
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Arg value ''
Error: Function ereg_replace() is deprecated
Error: ereg_replace(): REG_EMPTY
bool(false)

Error: Object of class stdClass could not be converted to string
Arg value ''
Error: Function ereg_replace() is deprecated
Error: Object of class stdClass could not be converted to int
string(8) "original"

Done
