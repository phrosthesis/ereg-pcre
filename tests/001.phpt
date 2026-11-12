--TEST--
RegReplace test 1
--FILE--
<?php

$a = 'abc123';
test_dump(ereg_replace('123', 'def', $a));

?>
--EXPECTF--
Deprecated: Function ereg_replace() is deprecated
string(6) "abcdef"
