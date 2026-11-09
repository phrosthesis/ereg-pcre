--TEST--
Test eregi() function : usage variations - unexpected type arg 2
--FILE--
<?php

/*
 * Prototype  : proto int eregi(string pattern, string string [, array registers])
 * Description: Regular expression match
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

set_error_handler('test_error_handler');

echo '*** Testing eregi() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$pattern = '1';
$registers = [];

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

// loop through each element of the array for string

foreach ($values as $value) {
    echo PHP_EOL, 'Arg value: ';
    test_dump($value);
    test_dump(eregi($pattern, $value, $registers));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing eregi() : usage variations ***

Arg value: int(0)
Error: Function eregi() is deprecated
bool(false)

Arg value: int(1)
Error: Function eregi() is deprecated
int(1)

Arg value: int(12345)
Error: Function eregi() is deprecated
int(1)

Arg value: int(-2345)
Error: Function eregi() is deprecated
bool(false)

Arg value: float(10.5)
Error: Function eregi() is deprecated
int(1)

Arg value: float(-10.5)
Error: Function eregi() is deprecated
int(1)

Arg value: float(101234567000)
Error: Function eregi() is deprecated
int(1)

Arg value: float(1.07654321E-9)
Error: Function eregi() is deprecated
int(1)

Arg value: float(0.5)
Error: Function eregi() is deprecated
bool(false)

Arg value: array(0) []
Error: Function eregi() is deprecated
Error: eregi() expects parameter 2 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(0)
]
Error: Function eregi() is deprecated
Error: eregi() expects parameter 2 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(1)
]
Error: Function eregi() is deprecated
Error: eregi() expects parameter 2 to be string, array given
null

Arg value: array(2) [
    [0] =>
    int(1)
    [1] =>
    int(2)
]
Error: Function eregi() is deprecated
Error: eregi() expects parameter 2 to be string, array given
null

Arg value: array(2) [
    ["color"] =>
    string(3) "red"
    ["item"] =>
    string(3) "pen"
]
Error: Function eregi() is deprecated
Error: eregi() expects parameter 2 to be string, array given
null

Arg value: null
Error: Function eregi() is deprecated
bool(false)

Arg value: bool(true)
Error: Function eregi() is deprecated
int(1)

Arg value: bool(false)
Error: Function eregi() is deprecated
bool(false)

Arg value: string(0) ""
Error: Function eregi() is deprecated
bool(false)

Arg value: object(stdClass) {}
Error: Function eregi() is deprecated
Error: eregi() expects parameter 2 to be string, object given
null

Done
