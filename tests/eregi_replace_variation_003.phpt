--TEST--
Test eregi_replace() function : usage variations - unexpected type arg 3
--FILE--
<?php

/*
 * Prototype  : proto string eregi_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

function test_error_handler(int $err_no, string $err_msg)
{
    echo "Error: $err_msg", PHP_EOL;
}

set_error_handler('test_error_handler');

echo '*** Testing eregi_replace() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$pattern = '1';
$replacement = 'new value';

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
    echo test_dump(eregi_replace($pattern, $replacement, $value)), PHP_EOL;
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing eregi_replace() : usage variations ***

Arg value: int(0)
Error: Function eregi_replace() is deprecated
string(1) "0"

Arg value: int(1)
Error: Function eregi_replace() is deprecated
string(9) "new value"

Arg value: int(12345)
Error: Function eregi_replace() is deprecated
string(13) "new value2345"

Arg value: int(-2345)
Error: Function eregi_replace() is deprecated
string(5) "-2345"

Arg value: float(10.5)
Error: Function eregi_replace() is deprecated
string(12) "new value0.5"

Arg value: float(-10.5)
Error: Function eregi_replace() is deprecated
string(13) "-new value0.5"

Arg value: float(101234567000)
Error: Function eregi_replace() is deprecated
string(28) "new value0new value234567000"

Arg value: float(1.07654321E-9)
Error: Function eregi_replace() is deprecated
string(29) "new value.0765432new valueE-9"

Arg value: float(0.5)
Error: Function eregi_replace() is deprecated
string(3) "0.5"

Arg value: array(0) []
Error: Function eregi_replace() is deprecated
Error: eregi_replace() expects parameter 3 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(0)
]
Error: Function eregi_replace() is deprecated
Error: eregi_replace() expects parameter 3 to be string, array given
null

Arg value: array(1) [
    [0] =>
    int(1)
]
Error: Function eregi_replace() is deprecated
Error: eregi_replace() expects parameter 3 to be string, array given
null

Arg value: array(2) [
    [0] =>
    int(1)
    [1] =>
    int(2)
]
Error: Function eregi_replace() is deprecated
Error: eregi_replace() expects parameter 3 to be string, array given
null

Arg value: array(2) [
    ["color"] =>
    string(3) "red"
    ["item"] =>
    string(3) "pen"
]
Error: Function eregi_replace() is deprecated
Error: eregi_replace() expects parameter 3 to be string, array given
null

Arg value: null
Error: Function eregi_replace() is deprecated
string(0) ""

Arg value: bool(true)
Error: Function eregi_replace() is deprecated
string(9) "new value"

Arg value: bool(false)
Error: Function eregi_replace() is deprecated
string(0) ""

Arg value: string(0) ""
Error: Function eregi_replace() is deprecated
string(0) ""

Arg value: object(stdClass) {}
Error: Function eregi_replace() is deprecated
Error: eregi_replace() expects parameter 3 to be string, object given
null

Done
