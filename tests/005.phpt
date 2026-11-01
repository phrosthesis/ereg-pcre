--TEST--
Test Regular expression register support in ereg
--FILE--
<?php

$a = 'This is a nice and simple string';
echo ereg('.*(is).*(is).*', $a, $registers);
echo PHP_EOL;
echo $registers[0];
echo PHP_EOL;
echo $registers[1];
echo PHP_EOL;
echo $registers[2];
echo PHP_EOL;

?>
--EXPECTF--
Deprecated: Function ereg() is deprecated in %s on line %d
32
This is a nice and simple string
is
is
