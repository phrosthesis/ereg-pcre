<?php

declare(strict_types=1);

/**
 * @internal
 *
 * @param mixed $value
 */
function test_dump($value, string $indent = ''): string
{
    $dump = $indent . test_dump_header($value);

    if (is_string($value)) {
        $dump .= ' ' . test_quote($value);
    } elseif (is_array($value)) {
        $dump .= ' [' . test_dump_entries($value, $indent) . ']';
    } elseif (is_object($value)) {
        $dump .= ' {' . test_dump_entries((array) $value, $indent) . '}';
    }

    return $dump;
}

/**
 * @internal
 *
 * @param mixed $value
 */
function test_dump_header($value): string
{
    if ($value === null) {
        return 'null';
    }
    if ($value === false) {
        return 'bool(false)';
    }
    if ($value === true) {
        return 'bool(true)';
    }

    switch (gettype($value)) {
        case 'integer':
            return sprintf('int(%d)', $value);
        case 'double':
            return sprintf('float(%s)', $value);
        case 'string':
            return sprintf('string(%d)', strlen($value));
        case 'array':
            return sprintf('array(%d)', count($value));
        case 'object':
            return sprintf('object(%s)', get_class($value));
        case 'resource':
            return 'resource';
        case 'resource (closed)':
        case 'unknown type':
            return 'resource(closed)';
    }

    return 'unknown';
}

/**
 * @internal
 */
function test_dump_entries(array $entries, string $indent = ''): string
{
    if (!$entries) {
        return '';
    }

    $dump = PHP_EOL . $indent;
    foreach ($entries as $key => $value) {
        if (\is_string($key)) {
            $key = test_quote($key);
        }
        $dump .= '    [' . $key . '] =>' . PHP_EOL . $indent;
        $dump .= test_dump($value, $indent . '    ') . PHP_EOL . $indent;
    }

    return $dump;
}

/**
 * @internal
 */
function test_quote(string $string): string
{
    if ($string === '') {
        return '""';
    }

    $bytes = str_split($string);
    foreach ($bytes as &$byte) {
        $byte = addcslashes($byte, "\n\r\t\v\f\\\"");
        if ($byte === "\e") {
            $byte = '\e';
        }
        if ($byte < ' ' || $byte === "\x7F") {
            $byte = sprintf('\x%02X', ord($byte));
        }
    }

    return sprintf('"%s"', join($bytes));
}
