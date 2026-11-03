--TEST--
Test spliti() function : usage variations - unexpected type for arg 1
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
$string = '1 a 1 Array 1 c ';
$limit = 5;

//get an unset variable
$unset_var = 10;
unset($unset_var);

//array of values to iterate over
$values = array(
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

    // object data
    new stdClass(),

    // undefined data
    $undefined_var,

    // unset data
    $unset_var,
);

// loop through each element of the array for pattern

foreach ($values as $value) {
    try {
        echo PHP_EOL, "Arg value '$value'", PHP_EOL;
    } catch (Throwable $err) {
        echo 'Error: ', $err->getMessage(), PHP_EOL, "Arg value ''", PHP_EOL;
    }
    var_dump(spliti($value, $string, $limit));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing spliti() : usage variations ***
Error: Undefined variable: undefined_var
Error: Undefined variable: unset_var

Arg value '0'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Arg value '1'
Error: Function spliti() is deprecated
array(4) {
  [0]=>
  string(0) ""
  [1]=>
  string(3) " a "
  [2]=>
  string(7) " Array "
  [3]=>
  string(3) " c "
}

Arg value '12345'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Arg value '-2345'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Arg value '10.5'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Arg value '-10.5'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Arg value '101234567000'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Arg value '1.07654321E-9'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Arg value '0.5'
Error: Function spliti() is deprecated
array(1) {
  [0]=>
  string(16) "1 a 1 Array 1 c "
}

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 1 to be string, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 1 to be string, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 1 to be string, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 1 to be string, array given
NULL

Error: Array to string conversion
Arg value 'Array'
Error: Function spliti() is deprecated
Error: spliti() expects parameter 1 to be string, array given
NULL

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)

Arg value '1'
Error: Function spliti() is deprecated
array(4) {
  [0]=>
  string(0) ""
  [1]=>
  string(3) " a "
  [2]=>
  string(7) " Array "
  [3]=>
  string(3) " c "
}

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)

Arg value '1'
Error: Function spliti() is deprecated
array(4) {
  [0]=>
  string(0) ""
  [1]=>
  string(3) " a "
  [2]=>
  string(7) " Array "
  [3]=>
  string(3) " c "
}

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)
Error: Object of class stdClass could not be converted to string, %s(73)

Arg value ''
Error: Function spliti() is deprecated
Error: spliti() expects parameter 1 to be string, object given
NULL

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)

Arg value ''
Error: Function spliti() is deprecated
Error: spliti(): REG_EMPTY
bool(false)

Done
