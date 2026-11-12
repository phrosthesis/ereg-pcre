--TEST--
replace empty matches
--FILE--
<?php

test_dump(ereg_replace('^', 'z', 'abc123'));

?>
--EXPECTF--
Deprecated: Function ereg_replace() is deprecated
string(7) "zabc123"
