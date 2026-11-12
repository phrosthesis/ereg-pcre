--TEST--
Test split()
--FILE--
<?php

test_dump(split('[[:space:]]', "this is\ta\ntest"));

?>
--EXPECTF--
Deprecated: Function split() is deprecated
array(4) [
    [0] =>
    string(4) "this"
    [1] =>
    string(2) "is"
    [2] =>
    string(1) "a"
    [3] =>
    string(4) "test"
]
