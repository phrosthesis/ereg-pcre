<?php

declare(strict_types=1);

/**
 * @internal
 *
 * @param mixed $value
 * @return void
 */
function test_dump($value, string $indent = '')
{
    echo $indent, test_get_type($value);

    if (is_string($value)) {
        echo ' ', test_quote($value);
    } elseif (is_array($value)) {
        echo ' [';
        test_dump_entries($value, $indent);
        echo ']';
    } elseif (is_object($value)) {
        echo ' {';
        test_dump_entries((array) $value, $indent);
        echo '}';
    }

    echo PHP_EOL;
}

/**
 * @internal
 *
 * @param mixed $value
 */
function test_get_type($value): string
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
 *
 * @return void
 */
function test_dump_entries(array $entries, string $indent = '')
{
    if (!$entries) {
        return;
    }

    echo PHP_EOL, $indent;
    foreach ($entries as $key => $value) {
        if (\is_string($key)) {
            $key = test_quote($key);
        }
        echo '    [', $key, '] =>', PHP_EOL, $indent;
        test_dump($value, $indent . '    ');
        echo $indent;
    }
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
        if ($byte < ' ' || $byte >= "\x7F") {
            $byte = sprintf('\x%02X', ord($byte));
        }
    }

    return sprintf('"%s"', join($bytes));
}

/**
 * @internal
 *
 * @return void
 */
function test_error_handler(int $err_no, string $err_msg)
{
    echo "Error: $err_msg", PHP_EOL;
}
