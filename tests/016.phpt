--TEST--
test backslash handling in regular expressions
--FILE--
<?php

test_dump(ereg_replace('\?', 'abc', '?123?'));

?>
--EXPECTF--
Deprecated: Function ereg_replace() is deprecated
string(9) "abc123abc"
