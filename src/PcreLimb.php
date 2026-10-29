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
     * @return string|false
     */
    public function replace(string $replacement, string $string)
    {
        return \preg_replace($this->toPcre(), $replacement, $string) ?? false;
    }

    /**
     * @return array|false
     */
    public function split(string $string, int $limit = -1)
    {
        if ($limit === 0) {
            $limit = -1;
        }

        return \preg_split($this->toPcre(), $string, $limit);
    }
}
