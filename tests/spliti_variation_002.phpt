--TEST--
Test spliti() function : usage variations - unexpected type for arg 2
--FILE--
<?php

/*
 * Prototype  : proto array spliti(string pattern, string string [, int limit])
 * Description: spliti string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

set_error_handler('test_error_handler');

echo '*** Testing spliti() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$pattern = 'r|j|E';
$limit = 5;

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
    echo PHP_EOL, 'Arg value: ', test_dump($value), PHP_EOL;
    echo test_dump(spliti($pattern, $value, $limit)), PHP_EOL;
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing spliti() : usage variations ***

Arg value: int(0)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(1) "0"
]

Arg value: int(1)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(1) "1"
]

Arg value: int(12345)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(5) "12345"
]

Arg value: int(-2345)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(5) "-2345"
]

Arg value: float(10.5)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(4) "10.5"
]

Arg value: float(-10.5)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(5) "-10.5"
]

Arg value: float(101234567000)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(12) "101234567000"
]

Arg value: float(1.07654321E-9)
Error: Function spliti() is deprecated
array(2) [
    [0] =>
    string(10) "1.07654321"
    [1] =>
    string(2) "-9"
]

Arg value: float(0.5)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(3) "0.5"
]

Arg value: array(0) []
Error: Function spliti() is deprecated
Error: spliti() expects parameter 2 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(0)
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 2 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(1)
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 2 to be string, array given
null

Arg value: array(2) [
    [0] =>
    int(1)
    [1] =>
    int(2)
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 2 to be string, array given
null

Arg value: array(2) [
    ["color"] =>
    string(3) "red"
    ["item"] =>
    string(3) "pen"
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 2 to be string, array given
null

Arg value: null
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(0) ""
]

Arg value: bool(true)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(1) "1"
]

Arg value: bool(false)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(0) ""
]

Arg value: string(0) ""
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(0) ""
]

Arg value: object(stdClass) {}
Error: Function spliti() is deprecated
Error: spliti() expects parameter 2 to be string, object given
null

Done
