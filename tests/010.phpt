--TEST--
Long back references
--FILE--
<?php

$a = 'abc122222222223';
test_dump(ereg_replace('1(2*)3', '\\1def\\1', $a));

?>
--EXPECTF--
Deprecated: Function ereg_replace() is deprecated
string(26) "abc2222222222def2222222222"
