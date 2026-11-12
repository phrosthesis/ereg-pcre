--TEST--
simple ereg test
--FILE--
<?php

$a = 'This is a nice and simple string';
if (ereg('.*nice and simple.*', $a)) {
    echo 'ok', PHP_EOL;
}
if (!ereg(".*doesn't exist.*", $a)) {
    echo 'ok', PHP_EOL;
}

?>
--EXPECTF--
Deprecated: Function ereg() is deprecated
ok
Deprecated: Function ereg() is deprecated
ok
