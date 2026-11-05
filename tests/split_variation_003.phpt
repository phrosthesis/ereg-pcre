--TEST--
Test split() function : usage variations - unexpected type for arg 3
--FILE--
<?php

/*
 * Prototype  : proto array split(string pattern, string string [, int limit])
 * Description: Split string into array by regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

function test_error_handler(int $err_no, string $err_msg)
{
    echo "Error: $err_msg", PHP_EOL;
}

set_error_handler('test_error_handler');

echo '*** Testing split() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$pattern = b'[[:space:]]';
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
    null,

    // boolean data
    true,
    false,
    true,
    false,

    // empty data
    '',
    '',

    // string data
    'string',
    'string',

    // object data
    new stdClass()
];

// loop through each element of the array for limit

foreach ($values as $value) {
    try {
        echo PHP_EOL, "Arg value: '$value'", PHP_EOL;
    } catch (Throwable $err) {
        echo 'Error: ', $err->getMessage(), PHP_EOL, "Arg value: ''", PHP_EOL;
    }
    var_dump(split($pattern, $string, $value));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing split() : usage variations ***

Arg value: float(10.5)
Error: Function split() is deprecated
array(5) {
  [0]=>
  string(1) "1"
  [1]=>
  string(1) "2"
  [2]=>
  string(1) "3"
  [3]=>
  string(1) "4"
  [4]=>
  string(1) "5"
}

Arg value: float(-10.5)
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: '1.07654321E-9'
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: float(0.5)
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Error: Array to string conversion
Arg value: 'Array'
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value: 'Array'
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value: 'Array'
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value: 'Array'
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value: 'Array'
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, array given
NULL

Arg value: ''
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: ''
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: '1'
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: ''
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: '1'
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: ''
Error: Function split() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value: ''
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, string given
NULL

Arg value: ''
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, string given
NULL

Arg value: 'string'
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, string given
NULL

Arg value: 'string'
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, string given
NULL

Error: Object of class stdClass could not be converted to string
Arg value: ''
Error: Function split() is deprecated
Error: split() expects parameter 3 to be long, object given
NULL

Done
