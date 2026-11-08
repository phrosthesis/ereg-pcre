<?php

declare(strict_types=1);

/**
 * Regular Expression (POSIX Extended)
 *
 * @see https://php-legacy-docs.zend.com/manual/php5/en/book.regex
 */

use Phrosthesis\Ereg\PcreLimb;

if (!function_exists('ereg')) {
    /**
     * Regular expression match
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.ereg.html
     * @deprecated
     *
     * @param string $pattern
     * @param string $string
     * @param array|null $regs
     * @return int|false|null
     */
    function ereg($pattern = '', $string = '', &$regs = null)
    {
        PcreLimb::deprecate(__FUNCTION__);

        $nargs = \func_num_args();
        if (!PcreLimb::checkArgsNumber(__FUNCTION__, $nargs, 2, 3)) {
            return null;
        }

        if (!PcreLimb::checkRegex(__FUNCTION__, $pattern)) {
            return false;
        }

        if (!PcreLimb::checkArgIsString(__FUNCTION__, 2, $string)) {
            return null;
        }

        $pattern = (string) $pattern;
        $string = (string) $string;

        $regex = new PcreLimb($pattern);
        if ($nargs === 2) {
            return $regex->match($string);
        }

        return $regex->match($string, $regs);
    }
}

if (!function_exists('eregi')) {
    /**
     * Case-insensitive regular expression match
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.eregi.html
     * @deprecated
     *
     * @param string $pattern
     * @param string $string
     * @param array|null $regs
     * @return int|false|null
     */
    function eregi($pattern = '', $string = '', &$regs = null)
    {
        PcreLimb::deprecate(__FUNCTION__);

        $nargs = \func_num_args();
        if (!PcreLimb::checkArgsNumber(__FUNCTION__, $nargs, 2, 3)) {
            return null;
        }

        if (!PcreLimb::checkRegex(__FUNCTION__, $pattern)) {
            return false;
        }

        if (!PcreLimb::checkArgIsString(__FUNCTION__, 2, $string)) {
            return null;
        }

        $pattern = (string) $pattern;
        $string = (string) $string;

        $regex = new PcreLimb($pattern, 'i');
        if (\func_num_args() === 2) {
            return $regex->match($string);
        }

        return $regex->match($string, $regs);
    }
}

if (!function_exists('ereg_replace')) {
    /**
     * Replace regular expression
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.ereg-replace.html
     * @deprecated
     *
     * @param string $pattern
     * @param string|int $replacement
     * @param string $string
     * @return string|false|null
     */
    function ereg_replace($pattern = '', $replacement = '', $string = '')
    {
        PcreLimb::deprecate(__FUNCTION__);

        if (!PcreLimb::checkArgsNumber(__FUNCTION__, \func_num_args(), 3, 3)) {
            return null;
        }

        if (!PcreLimb::checkRegex(__FUNCTION__, $pattern)) {
            return false;
        }

        if (!PcreLimb::checkArgIsString(__FUNCTION__, 3, $string)) {
            return null;
        }

        $pattern = (string) $pattern;
        $string = (string) $string;

        $regex = new PcreLimb($pattern);

        return $regex->replace($replacement, $string);
    }
}

if (!function_exists('eregi_replace')) {
    /**
     * Replace regular expression case-insensitive
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.eregi-replace.html
     * @deprecated
     *
     * @param string $pattern
     * @param string|int $replacement
     * @param string $string
     * @return string|false|null
     */
    function eregi_replace($pattern = '', $replacement = '', $string = '')
    {
        PcreLimb::deprecate(__FUNCTION__);

        if (!PcreLimb::checkArgsNumber(__FUNCTION__, \func_num_args(), 3, 3)) {
            return null;
        }

        if (!PcreLimb::checkRegex(__FUNCTION__, $pattern)) {
            return false;
        }

        if (!PcreLimb::checkArgIsString(__FUNCTION__, 3, $string)) {
            return null;
        }

        $pattern = (string) $pattern;
        $string = (string) $string;

        $regex = new PcreLimb($pattern, 'i');

        return $regex->replace($replacement, $string);
    }
}

if (!function_exists('split')) {
    /**
     * Split string into array by regular expression
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.split.html
     * @deprecated
     *
     * @param string $pattern
     * @param string $string
     * @param int $limit
     * @return array|false|null
     */
    function split($pattern = '', $string = '', $limit = -1)
    {
        PcreLimb::deprecate(__FUNCTION__);

        $nargs = \func_num_args();
        if (!PcreLimb::checkArgsNumber(__FUNCTION__, $nargs, 2, 3)) {
            return null;
        }

        if (!PcreLimb::checkRegex(__FUNCTION__, $pattern)) {
            return false;
        }

        if (!PcreLimb::checkArgIsString(__FUNCTION__, 2, $string)) {
            return null;
        }

        if (!PcreLimb::checkArgIsInt(__FUNCTION__, 3, $limit)) {
            return null;
        }

        if ($nargs === 3 && $limit < 1) {
            $limit = 1;
        }

        $pattern = (string) $pattern;
        $string = (string) $string;
        $limit = (int) $limit;

        $regex = new PcreLimb($pattern);

        return $regex->split($string, $limit);
    }
}

if (!function_exists('spliti')) {
    /**
     * Split string into array by regular expression case-insensitive
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.spliti.html
     * @deprecated
     *
     * @param string $pattern
     * @param string $string
     * @param int $limit
     * @return array|false|null
     */
    function spliti($pattern = '', $string = '', $limit = -1)
    {
        PcreLimb::deprecate(__FUNCTION__);

        $nargs = \func_num_args();
        if (!PcreLimb::checkArgsNumber(__FUNCTION__, $nargs, 2, 3)) {
            return null;
        }

        if (!PcreLimb::checkRegex(__FUNCTION__, $pattern)) {
            return false;
        }

        if (!PcreLimb::checkArgIsString(__FUNCTION__, 2, $string)) {
            return null;
        }

        if (!PcreLimb::checkArgIsInt(__FUNCTION__, 3, $limit)) {
            return null;
        }

        if ($nargs === 3 && $limit < 1) {
            $limit = 1;
        }

        $pattern = (string) $pattern;
        $string = (string) $string;
        $limit = (int) $limit;

        $regex = new PcreLimb($pattern, 'i');

        return $regex->split($string, $limit);
    }
}

if (!function_exists('sql_regcase')) {
    /**
     * Make regular expression for case-insensitive match
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.sql-regcase.html
     * @deprecated
     *
     * @param string $string
     * @return string|null
     */
    function sql_regcase($string = '')
    {
        PcreLimb::deprecate(__FUNCTION__);

        if (!PcreLimb::checkArgsNumber(__FUNCTION__, \func_num_args(), 1, 1)) {
            return null;
        }

        if (!PcreLimb::checkArgIsString(__FUNCTION__, 1, $string)) {
            return null;
        }

        $string = (string) $string;

        $regex = new PcreLimb($string);

        return $regex->toCaseInsensitive();
    }
}
