--TEST--
Test split()
--FILE--
<?php

$a = split('[[:space:]]', "this is\ta\ntest");
echo count($a), PHP_EOL;
for ($i = 0; $i < count($a); $i++) {
    echo $a[$i], PHP_EOL;
}

?>
--EXPECTF--
Deprecated: Function split() is deprecated in %s on line %d
4
this
is
a
test
