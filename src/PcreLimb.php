<?php

declare(strict_types=1);

namespace Phrosthesis\Ereg;

/**
 * @internal
 */
final class PcreLimb
{
    /**
     * @var string
     * @readonly
     */
    private $pattern;

    /**
     * @var 'i'|''
     * @readonly
     */
    private $modifier;

    /**
     * @return void
     */
    public static function deprecate(string $function)
    {
        \assert($function !== '');

        \trigger_error("Function $function() is deprecated", \E_USER_DEPRECATED);
    }

    /**
     * @return bool
     */
    public static function checkArgsNumber(string $function, int $n, int $min, int $max = -1)
    {
        \assert($function !== '');
        \assert($n >= 0);
        \assert($min >= 0);
        \assert($max < 0 || $min <= $max);

        if ($min === $max) {
            if ($n !== $min) {
                if ($min === 1) {
                    \trigger_error("$function() expects exactly 1 parameter, $n given", \E_USER_WARNING);
                } else {
                    \trigger_error("$function() expects exactly $min parameters, $n given", \E_USER_WARNING);
                }

                return false;
            }

            return true;
        }

        if ($n < $min) {
            if ($min === 1) {
                \trigger_error("$function() expects at least 1 parameter, $n given", \E_USER_WARNING);
            } else {
                \trigger_error("$function() expects at least $min parameters, $n given", \E_USER_WARNING);
            }

            return false;
        }

        if ($max >= 0 && $n > $max) {
            if ($max === 1) {
                \trigger_error("$function() expects at most 1 parameter, $n given", \E_USER_WARNING);
            } else {
                \trigger_error("$function() expects at most $max parameters, $n given", \E_USER_WARNING);
            }

            return false;
        }

        return true;
    }

    public static function checkArgIsString(string $function, int $n, $value): bool
    {
        \assert($function !== '');
        \assert($n > 0);

        if (\is_array($value)) {
            \trigger_error("$function() expects parameter $n to be string, array given", \E_USER_WARNING);
            return false;
        }

        if (\is_object($value) && !\method_exists($value, '__toString')) {
            \trigger_error("$function() expects parameter $n to be string, object given", \E_USER_WARNING);
            return false;
        }

        return true;
    }

    public static function checkArgIsInt(string $function, int $n, $value): bool
    {
        \assert($function !== '');
        \assert($n > 0);

        if (\is_array($value)) {
            \trigger_error("$function() expects parameter $n to be long, array given", \E_USER_WARNING);
            return false;
        }

        if (\is_object($value)) {
            \trigger_error("$function() expects parameter $n to be long, object given", \E_USER_WARNING);
            return false;
        }

        if (\is_string($value) && !\is_numeric($value)) {
            \trigger_error("$function() expects parameter $n to be long, string given", \E_USER_WARNING);
            return false;
        }

        return true;
    }

    public static function checkRegex(string $function, $pattern): bool
    {
        \assert($function !== '');

        if (\is_object($pattern)) {
            $pattern = (int) $pattern;
        }

        if (!$pattern) {
            \trigger_error("$function(): REG_EMPTY", \E_USER_WARNING);
            return false;
        }

        return true;
    }

    /**
     * @param string $pattern
     * @param 'i'|'' $modifier
     */
    public function __construct(string $pattern, string $modifier = '')
    {
        $this->pattern = $pattern;
        $this->modifier = $modifier;
    }

    public function toCaseInsensitive(): string
    {
        $chars = \str_split($this->pattern);
        foreach ($chars as $i => $char) {
            if ('A' <= $char && $char <= 'Z') {
                $chars[$i] = '[' . $char . \strtolower($char) . ']';
            } elseif ('a' <= $char && $char <= 'z') {
                $chars[$i] = '[' . \strtoupper($char) . $char . ']';
            }
        }

        return \join($chars);
    }

    /**
     * @see https://en.wikibooks.org/wiki/Regular_Expressions/POSIX-Extended_Regular_Expressions
     */
    public function toPcre(): string
    {
        $delim = \count_chars($this->pattern, 4); // get bytes not used in pattern
        $delim = \strpbrk($delim, '!"#$%&\'*+,-./:;=?@^_`|~'); // find delimiter candidate
        if ($delim !== false) {
            return $delim[0] . $this->pattern . $delim[0] . $this->modifier;
        }

        return '~' . \addcslashes($this->pattern, '~') . '~' . $this->modifier;
    }

    /**
     * @param array|null $regs
     * @return int|false
     */
    public function match(string $string, &$regs = null)
    {
        $matches = [];
        $result = \preg_match($this->toPcre(), $string, $matches);

        if ($result !== 1) {
            return false;
        }

        $result = \strlen($matches[0]);
        if (\func_num_args() > 1) {
            $regs = $matches;
        } else {
            $result = 1;
        }

        return $result ?: 1;
    }

    /**
     * @param mixed $replacement
     * @return string|false
     */
    public function replace($replacement, string $string)
    {
        if (!\is_string($replacement)) {
            $replacement = (int) $replacement;
            $replacement = $replacement ? \chr($replacement & 0xFF) : '';
        }

        return \preg_replace($this->toPcre(), $replacement, $string) ?? false;
    }

    /**
     * @return array|false
     */
    public function split(string $string, int $limit = -1)
    {
        return \preg_split($this->toPcre(), $string, $limit);
    }
}
