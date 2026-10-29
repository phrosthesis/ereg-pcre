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
    function ereg($pattern = null, $string = null, &$regs = null)
    {
        \trigger_error('Function ereg() is deprecated', \E_USER_DEPRECATED);

        $nargs = \func_num_args();
        if ($nargs > 3) {
            \trigger_error("ereg() expects at most 3 parameters, $nargs given", \E_USER_WARNING);

            return null;
        } elseif ($nargs < 2) {
            \trigger_error("ereg() expects at least 2 parameters, $nargs given", \E_USER_WARNING);

            return null;
        }

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
    function eregi($pattern = null, $string = null, &$regs = null)
    {
        \trigger_error('Function eregi() is deprecated', \E_USER_DEPRECATED);

        $nargs = \func_num_args();
        if ($nargs > 3) {
            \trigger_error("eregi() expects at most 3 parameters, $nargs given", \E_USER_WARNING);

            return null;
        } elseif ($nargs < 2) {
            \trigger_error("eregi() expects at least 2 parameters, $nargs given", \E_USER_WARNING);

            return null;
        }

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
     * @return string|false
     */
    function ereg_replace(string $pattern, string $replacement, string $string)
    {
        \trigger_error('Function ereg_replace() is deprecated', \E_USER_DEPRECATED);

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
     * @return string|false
     */
    function eregi_replace(string $pattern, string $replacement, string $string)
    {
        \trigger_error('Function eregi_replace() is deprecated', \E_USER_DEPRECATED);

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
     * @return array|false
     */
    function split(string $pattern, string $string, int $limit = -1)
    {
        \trigger_error('Function split() is deprecated', \E_USER_DEPRECATED);

        $regex = new PcreLimb($pattern);

        return $regex->split($string, $limit);
    }
}

if (!function_exists('spliti')) {
    /**
     * Split string into array by regular expression case-insensitive
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.spliti.html
     * @return array|false
     */
    function spliti(string $pattern, string $string, int $limit = -1)
    {
        \trigger_error('Function spliti() is deprecated', \E_USER_DEPRECATED);

        $regex = new PcreLimb($pattern, 'i');

        return $regex->split($string, $limit);
    }
}

if (!function_exists('sql_regcase')) {
    /**
     * Make regular expression for case-insensitive match
     *
     * @see https://php-legacy-docs.zend.com/manual/php5/en/function.sql-regcase.html
     */
    function sql_regcase(string $string): string
    {
        \trigger_error('Function sql_regcase() is deprecated', \E_USER_DEPRECATED);

        $regex = new PcreLimb($string);

        return $regex->toCaseInsensitive();
    }
}
