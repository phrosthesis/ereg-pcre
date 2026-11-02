<?php

require __DIR__ . '/vendor/autoload.php';

use Phrosthesis\Ereg\PcreLimb;

$errors = [
    [E_ERROR, E_USER_ERROR],
    [E_WARNING, E_USER_WARNING],
    [E_NOTICE, E_USER_NOTICE],
    [E_RECOVERABLE_ERROR],
    [E_DEPRECATED, E_USER_DEPRECATED],
];

foreach ($errors as [$e, $u]) {
    printf("(%6d) %016b | (%6d) %016b \n", $e, $e, $u, $u);
}

return;

ini_set('pcre.backtrack_limit', 3000);

(new PcreLimb('asd'))->match('asd');
(new PcreLimb('asd'))->match('asd', $regs);

var_dump(ereg(str_repeat('(.)', 2048), str_repeat('x', 2048)));
var_dump(ereg(str_repeat('(.)', 2048), str_repeat('x', 2048), $regs));
var_dump(count($regs));

