<?php

/**
 * POSIX regular expressions each coupled with a string that they match,
 * based on documentation on https://www.tin.org/bin/man.cgi?section=7&topic=regex .
 */
$expressions = [
    //[pattern, string to match]
    ['..(a|b|c)(a|b|c)..',                    '--- ab ---'],
    ['()',                                    ''],
    ['()',                                    'abcdef'],
    ['[x]|[^x]',                              'abcdef'],
    ['(a{1})(a{1,}) (b{1,3}) (c+) (d?ddd|e)', '--- aaa bbb ccc ddd ---'],
    ['\\\\\`\^\.\[\$\(\)\|\*\+\?\{\\\'',      '\\`^.[$()|*+?{\''],
    ['\\a',                                   'a'],
    ['[0-9][^0-9]',                           '2a'],
    ['^[[:alnum:]]{62,62}$',                  '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'],
    ['^[[:digit:]]{5}',                       '0123456789'],
    ['[[:digit:]]{5}$',                       '0123456789'],
    ['[[:blank:]]{1,10}',                     "\n \t"],
    ['[[:print:]]{3}',                        ' a ']
];
