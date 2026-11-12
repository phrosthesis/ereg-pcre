--TEST--
RegReplace test 2
--FILE--
<?php

$a = 'abc123';
test_dump(ereg_replace('123', '', $a));

?>
--EXPECTF--
Deprecated: Function ereg_replace() is deprecated
string(3) "abc"
