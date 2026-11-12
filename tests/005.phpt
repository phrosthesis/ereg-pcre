--TEST--
Test Regular expression register support in ereg
--FILE--
<?php

$a = 'This is a nice and simple string';
test_dump(ereg('.*(is).*(is).*', $a, $registers));
test_dump($registers);

?>
--EXPECTF--
Deprecated: Function ereg() is deprecated
int(32)
array(3) [
    [0] =>
    string(32) "This is a nice and simple string"
    [1] =>
    string(2) "is"
    [2] =>
    string(2) "is"
]
