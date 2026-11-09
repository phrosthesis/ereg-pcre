--TEST--
Test eregi() function : usage variations - unexpected type for arg 3
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
$pattern = 'h(.*)lo!';
$string = 'hello!';

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

    // null data
    null,

    // boolean data
    true,
    false,

    // empty data
    '',

    // string data
    'string',

    // object data
    new stdClass()
];

// loop through each element of the array for registers

foreach ($values as $value) {
    echo PHP_EOL, 'Arg value: ';
    test_dump($value);
    test_dump(eregi($pattern, $string, $value));
    test_dump($value);
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing eregi() : usage variations ***

Arg value: int(0)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: int(1)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: int(12345)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: int(-2345)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: float(10.5)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: float(-10.5)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: float(101234567000)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: float(1.07654321E-9)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: float(0.5)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: null
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: bool(true)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: bool(false)
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: string(0) ""
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: string(6) "string"
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Arg value: object(stdClass) {}
Error: Function eregi() is deprecated
int(6)
array(2) [
    [0] =>
    string(6) "hello!"
    [1] =>
    string(2) "el"
]

Done
