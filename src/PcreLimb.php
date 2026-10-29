<?php

declare(strict_types=1);

namespace Phrosthesis\Ereg;

final class PcreLimb
{
    /**
     * @deprecated
     * @var bool
     */
    private static $isScreaming = true;

    /**
     * @deprecated
     *
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
     * @deprecated
     *
     * @param non-empty-string $function
     * @return void
     */
    public static function scream(string $function)
    {
        if (!self::$isScreaming || $function === '') {
            return;
        }

        \trigger_error("Function $function() is deprecated", \E_USER_DEPRECATED);
    }

    private function __construct() {}

    private function __clone() {}
}
