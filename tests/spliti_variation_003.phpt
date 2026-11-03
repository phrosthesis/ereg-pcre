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

function test_error_handler(int $err_no, string $err_msg)
{
    echo "Error: $err_msg", PHP_EOL;
}

set_error_handler('test_error_handler');

echo '*** Testing spliti() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$pattern = b'[[:space:]]';
$string = '1 2 3 4 5';

//get an unset variable
$unset_var = 10;
unset($unset_var);

//array of values to iterate over
$values = array(
    // float data
    10.5,
    -10.5,
    10.7654321E-10,
    .5,

    // array data
    array(),
    array(0),
    array(1),
    array(1, 2),
    array('color' => 'red', 'item' => 'pen'),

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
    new stdClass(),

    // undefined data
    @$undefined_var,

    // unset data
    @$unset_var,
);

// loop through each element of the array for limit

foreach ($values as $value) {
    try {
        echo PHP_EOL, "Arg value '$value'", PHP_EOL;
    } catch (Throwable $err) {
        echo 'Error: ', $err->getMessage(), PHP_EOL, "Arg value ''", PHP_EOL;
    }
    var_dump(spliti($pattern, $string, $value));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing spliti() : usage variations ***
Error: Undefined variable: undefined_var
Error: Undefined variable: unset_var

Arg value '10.5'
Error: Function spliti() is deprecated
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

Arg value '-10.5'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value '1.07654321E-9'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value '0.5'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, array given
NULL

Arg value ''
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value ''
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value '1'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value ''
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value '1'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value ''
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value ''
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, string given
NULL

Arg value ''
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, string given
NULL

Arg value 'string'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, string given
NULL

Arg value 'string'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, string given
NULL

Error: Object of class stdClass could not be converted to string
Arg value ''
Error: Function spliti() is deprecated
Error: spliti() expects parameter 3 to be long, object given
NULL

Arg value ''
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Arg value ''
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(9) "1 2 3 4 5"
}

Done
