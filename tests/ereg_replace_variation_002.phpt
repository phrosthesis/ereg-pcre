--TEST--
Test ereg_replace() function : usage variations - unexpected type arg 2
--FILE--
<?php

/*
 * Prototype  : proto string ereg_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

echo '*** Testing ereg_replace() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$pattern = 'ell';
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

// loop through each element of the array for replacement

foreach ($values as $value) {
    echo PHP_EOL, 'Arg value: ';
    test_dump($value);
    test_dump(ereg_replace($pattern, $value, $string));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing ereg_replace() : usage variations ***

Arg value: int(0)
Deprecated: Function ereg_replace() is deprecated
string(3) "ho!"

Arg value: int(1)
Deprecated: Function ereg_replace() is deprecated
string(4) "h\x01o!"

Arg value: int(12345)
Deprecated: Function ereg_replace() is deprecated
string(4) "h9o!"

Arg value: int(-2345)
Deprecated: Function ereg_replace() is deprecated
string(4) "h\xD7o!"

Arg value: float(10.5)
Deprecated: Function ereg_replace() is deprecated
string(4) "h\no!"

Arg value: float(-10.5)
Deprecated: Function ereg_replace() is deprecated
string(4) "h\xF6o!"

Arg value: float(101234567000)
Deprecated: Function ereg_replace() is deprecated
string(4) "h%so!"

Arg value: float(1.07654321E-9)
Deprecated: Function ereg_replace() is deprecated
string(3) "ho!"

Arg value: float(0.5)
Deprecated: Function ereg_replace() is deprecated
string(3) "ho!"

Arg value: array(0) []
Deprecated: Function ereg_replace() is deprecated
string(3) "ho!"

Arg value: array(1) [
    [0] =>
    int(0)
]
Deprecated: Function ereg_replace() is deprecated
string(4) "h\x01o!"

Arg value: array(1) [
    [0] =>
    int(1)
]
Deprecated: Function ereg_replace() is deprecated
string(4) "h\x01o!"

Arg value: array(2) [
    [0] =>
    int(1)
    [1] =>
    int(2)
]
Deprecated: Function ereg_replace() is deprecated
string(4) "h\x01o!"

Arg value: array(2) [
    ["color"] =>
    string(3) "red"
    ["item"] =>
    string(3) "pen"
]
Deprecated: Function ereg_replace() is deprecated
string(4) "h\x01o!"

Arg value: null
Deprecated: Function ereg_replace() is deprecated
string(3) "ho!"

Arg value: bool(true)
Deprecated: Function ereg_replace() is deprecated
string(4) "h\x01o!"

Arg value: bool(false)
Deprecated: Function ereg_replace() is deprecated
string(3) "ho!"

Arg value: string(0) ""
Deprecated: Function ereg_replace() is deprecated
string(3) "ho!"

Arg value: object(stdClass) {}
Deprecated: Function ereg_replace() is deprecated
Error: Object of class stdClass could not be converted to int
string(4) "h\x01o!"

Done
