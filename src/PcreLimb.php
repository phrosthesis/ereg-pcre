<?php

declare(strict_types=1);

namespace Phrosthesis\Ereg;

final class PcreLimb
{
    /**
     * @var bool
     */
    private static $isScreaming = false;

    /**
     * @return void
     */
    public static function setScreaming(bool $enable = true)
    {
        self::$isScreaming = $enable;
    }

    /**
     * @internal
     */
    public static function createRegex(string $pattern, string $modifier = ''): Regex
    {
        return new Regex($pattern, $modifier);
    }

    /**
     * @internal
     *
     * @param non-empty-string $function
     * @return void
     */
    public static function scream(string $function)
    {
        if (!self::$isScreaming || $function === '') {
            return;
        }

        $message = 'Usage of deprecated function `'.$function.'`';

        foreach (\debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS) as $trace) {
            if ($trace['function'] === $function && !isset($trace['class'])) {
                if (isset($trace['file'], $trace['line'])) {
                    $message .= ' in '.$trace['file'].':'.$trace['line'];
                }
                break;
            }
        }

        \trigger_error($message, \E_USER_DEPRECATED);
    }

    private function __construct() {}

    private function __clone() {}
}
