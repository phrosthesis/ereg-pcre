--TEST--
Test eregi_replace() function : usage variations - unexpected type arg 2
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
$pattern = b'ell';
$string = 'hello!';

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

// loop through each element of the array for replacement

foreach ($values as $value) {
    try {
        echo PHP_EOL, "Arg value '$value'", PHP_EOL;
    } catch (Throwable $err) {
        echo 'Error: ', $err->getMessage(), PHP_EOL, "Arg value ''", PHP_EOL;
    }
    var_dump(urlencode(eregi_replace($pattern, $value, $string)));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing eregi_replace() : usage variations ***
Error: Undefined variable: undefined_var
Error: Undefined variable: unset_var

Arg value '0'
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value '1'
Error: Function eregi_replace() is deprecated
string(8) "h%01o%21"

Arg value '12345'
Error: Function eregi_replace() is deprecated
string(6) "h9o%21"

Arg value '-2345'
Error: Function eregi_replace() is deprecated
string(8) "h%D7o%21"

Arg value '10.5'
Error: Function eregi_replace() is deprecated
string(8) "h%0Ao%21"

Arg value '-10.5'
Error: Function eregi_replace() is deprecated
string(8) "h%F6o%21"

Arg value '101234567000'
Error: Function eregi_replace() is deprecated
string(%d) "h%so%21"

Arg value '1.07654321E-9'
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value '0.5'
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Error: Array to string conversion
Arg value 'Array'
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Error: Array to string conversion
Arg value 'Array'
Error: Function eregi_replace() is deprecated
string(8) "h%01o%21"

Error: Array to string conversion
Arg value 'Array'
Error: Function eregi_replace() is deprecated
string(8) "h%01o%21"

Error: Array to string conversion
Arg value 'Array'
Error: Function eregi_replace() is deprecated
string(8) "h%01o%21"

Error: Array to string conversion
Arg value 'Array'
Error: Function eregi_replace() is deprecated
string(8) "h%01o%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value '1'
Error: Function eregi_replace() is deprecated
string(8) "h%01o%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value '1'
Error: Function eregi_replace() is deprecated
string(8) "h%01o%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Error: Object of class stdClass could not be converted to string
Arg value ''
Error: Function eregi_replace() is deprecated
Error: Object of class stdClass could not be converted to int
string(8) "h%01o%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Arg value ''
Error: Function eregi_replace() is deprecated
string(5) "ho%21"

Done
