--TEST--
Test split() function : usage variations - unexpected type for arg 1
--FILE--
<?php

/*
 * Prototype  : proto array split(string pattern, string string [, int limit])
 * Description: Split string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

set_error_handler('test_error_handler');

echo '*** Testing split() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$string = '1 a 1 Array 1 c ';
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

// loop through each element of the array for pattern

foreach ($values as $value) {
    echo PHP_EOL, 'Arg value: ';
    test_dump($value);
    test_dump(split($value, $string, $limit));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing split() : usage variations ***

Arg value: int(0)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: int(1)
Deprecated: Function split() is deprecated
array(4) [
    [0] =>
    string(0) ""
    [1] =>
    string(3) " a "
    [2] =>
    string(7) " Array "
    [3] =>
    string(3) " c "
]

Arg value: int(12345)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: int(-2345)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: float(10.5)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: float(-10.5)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: float(101234567000)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: float(1.07654321E-9)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: float(0.5)
Deprecated: Function split() is deprecated
array(1) [
    [0] =>
    string(16) "1 a 1 Array 1 c "
]

Arg value: array(0) []
Deprecated: Function split() is deprecated
Warning: split() expects parameter 1 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(0)
]
Deprecated: Function split() is deprecated
Warning: split() expects parameter 1 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(1)
]
Deprecated: Function split() is deprecated
Warning: split() expects parameter 1 to be string, array given
null

Arg value: array(2) [
    [0] =>
    int(1)
    [1] =>
    int(2)
]
Deprecated: Function split() is deprecated
Warning: split() expects parameter 1 to be string, array given
null

Arg value: array(2) [
    ["color"] =>
    string(3) "red"
    ["item"] =>
    string(3) "pen"
]
Deprecated: Function split() is deprecated
Warning: split() expects parameter 1 to be string, array given
null

Arg value: null
Deprecated: Function split() is deprecated
Warning: split(): REG_EMPTY
bool(false)

Arg value: bool(true)
Deprecated: Function split() is deprecated
array(4) [
    [0] =>
    string(0) ""
    [1] =>
    string(3) " a "
    [2] =>
    string(7) " Array "
    [3] =>
    string(3) " c "
]

Arg value: bool(false)
Deprecated: Function split() is deprecated
Warning: split(): REG_EMPTY
bool(false)

Arg value: string(0) ""
Deprecated: Function split() is deprecated
Warning: split(): REG_EMPTY
bool(false)

Arg value: object(stdClass) {}
Deprecated: Function split() is deprecated
Warning: split() expects parameter 1 to be string, object given
null

Done
