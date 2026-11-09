--TEST--
Test ereg() function : usage variations - unexpected type arg 1
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
    echo "Error: $err_msg", PHP_EOL;
}

set_error_handler('test_error_handler');

echo '*** Testing ereg() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$string = '1';
$registers = [1, 2];

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

    // boolean data
    true,
    false,

    // empty data
    '',

    // object data
    new stdClass()
];

// loop through each element of the array for pattern

foreach ($values as $value) {
    echo PHP_EOL, 'Arg value: ', test_dump($value), PHP_EOL;
    echo test_dump(ereg($value, $string, $registers)), PHP_EOL;
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing ereg() : usage variations ***

Arg value: int(0)
Error: Function ereg() is deprecated
bool(false)

Arg value: int(1)
Error: Function ereg() is deprecated
int(1)

Arg value: int(12345)
Error: Function ereg() is deprecated
bool(false)

Arg value: int(-2345)
Error: Function ereg() is deprecated
bool(false)

Arg value: float(10.5)
Error: Function ereg() is deprecated
bool(false)

Arg value: float(-10.5)
Error: Function ereg() is deprecated
bool(false)

Arg value: float(101234567000)
Error: Function ereg() is deprecated
bool(false)

Arg value: float(1.07654321E-9)
Error: Function ereg() is deprecated
bool(false)

Arg value: float(0.5)
Error: Function ereg() is deprecated
bool(false)

Arg value: array(0) []
Error: Function ereg() is deprecated
Error: Array to string conversion
bool(false)

Arg value: array(1) [
    [0] =>
    int(0)
]
Error: Function ereg() is deprecated
Error: Array to string conversion
bool(false)

Arg value: array(1) [
    [0] =>
    int(1)
]
Error: Function ereg() is deprecated
Error: Array to string conversion
bool(false)

Arg value: array(2) [
    [0] =>
    int(1)
    [1] =>
    int(2)
]
Error: Function ereg() is deprecated
Error: Array to string conversion
bool(false)

Arg value: array(2) [
    ["color"] =>
    string(3) "red"
    ["item"] =>
    string(3) "pen"
]
Error: Function ereg() is deprecated
Error: Array to string conversion
bool(false)

Arg value: null
Error: Function ereg() is deprecated
Error: ereg(): REG_EMPTY
bool(false)

Arg value: bool(true)
Error: Function ereg() is deprecated
int(1)

Arg value: bool(false)
Error: Function ereg() is deprecated
Error: ereg(): REG_EMPTY
bool(false)

Arg value: string(0) ""
Error: Function ereg() is deprecated
Error: ereg(): REG_EMPTY
bool(false)

Arg value: object(stdClass) {}
Error: Function ereg() is deprecated
Error: Object of class stdClass could not be converted to string
Error: Object of class stdClass to string conversion
bool(false)

Done
