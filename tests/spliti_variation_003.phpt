--TEST--
Test spliti() function : usage variations - unexpected type for arg 3
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
$pattern = '[[:space:]]';
$string = '1 2 3 4 5';

//array of values to iterate over
$values = [
    // float data
    10.5,
    -10.5,
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

    // string data
    'string',

    // object data
    new stdClass()
];

// loop through each element of the array for limit

foreach ($values as $value) {
    echo PHP_EOL, 'Arg value: ';
    test_dump($value);
    test_dump(spliti($pattern, $string, $value));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing spliti() : usage variations ***

Arg value: float(10.5)
Error: Function spliti() is deprecated
array(5) [
    [0] =>
    string(1) "1"
    [1] =>
    string(1) "2"
    [2] =>
    string(1) "3"
    [3] =>
    string(1) "4"
    [4] =>
    string(1) "5"
]

Arg value: float(-10.5)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(9) "1 2 3 4 5"
]

Arg value: float(1.07654321E-9)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(9) "1 2 3 4 5"
]

Arg value: float(0.5)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(9) "1 2 3 4 5"
]

Arg value: array(0) []
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
null

Arg value: array(1) [
    [0] =>
    int(0)
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
null

Arg value: array(1) [
    [0] =>
    int(1)
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
null

Arg value: array(2) [
    [0] =>
    int(1)
    [1] =>
    int(2)
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
null

Arg value: array(2) [
    ["color"] =>
    string(3) "red"
    ["item"] =>
    string(3) "pen"
]
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
null

Arg value: null
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(9) "1 2 3 4 5"
]

Arg value: bool(true)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(9) "1 2 3 4 5"
]

Arg value: bool(false)
Error: Function spliti() is deprecated
array(1) [
    [0] =>
    string(9) "1 2 3 4 5"
]

Arg value: string(0) ""
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, string given
null

Arg value: string(6) "string"
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, string given
null

Arg value: object(stdClass) {}
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, object given
null

Done
