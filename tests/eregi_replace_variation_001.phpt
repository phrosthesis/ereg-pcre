--TEST--
Test eregi_replace() function : usage variations - unexpected type arg 1
--FILE--
<?php

/*
 * Prototype  : proto string eregi_replace(string pattern, string replacement, string string)
 * Description: Replace regular expression
 * Source code: ext/standard/reg.c
 * Alias to functions:
 */

echo '*** Testing eregi_replace() : usage variations ***', PHP_EOL;

// Initialise function arguments not being substituted (if any)
$replacement = 'new';
$string = 'original';

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
    new stdClass()
];

// loop through each element of the array for pattern

foreach ($values as $value) {
    try {
        echo PHP_EOL, "Arg value: '$value'", PHP_EOL;
    } catch (Throwable $err) {
        echo 'Error: ', $err->getMessage(), PHP_EOL, "Arg value: ''", PHP_EOL;
    }
    var_dump(eregi_replace($value, $replacement, $string));
}

echo PHP_EOL, 'Done';

?>
--EXPECTF--
*** Testing eregi_replace() : usage variations ***

Arg value: '0'
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Arg value: '1'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: int(12345)
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: int(-2345)
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: float(10.5)
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: float(-10.5)
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: '101234567000'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: '1.07654321E-9'
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Arg value: float(0.5)
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Error: Array to string conversion
Arg value: 'Array'
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Error: Array to string conversion
Arg value: 'Array'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Error: Array to string conversion
Arg value: 'Array'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Error: Array to string conversion
Arg value: 'Array'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Error: Array to string conversion
Arg value: 'Array'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: ''
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Arg value: ''
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Arg value: '1'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: ''
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Arg value: '1'
Deprecated: Function eregi_replace() is deprecated
string(8) "original"

Arg value: ''
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Arg value: ''
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Arg value: ''
Deprecated: Function eregi_replace() is deprecated
Error: eregi_replace(): REG_EMPTY
bool(false)

Error: Object of class stdClass could not be converted to string
Arg value: ''
Deprecated: Function eregi_replace() is deprecated
Error: Object of class stdClass could not be converted to int
string(8) "original"

Done
