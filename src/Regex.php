<?php

declare(strict_types=1);

namespace Phrosthesis\Ereg;

/**
 * @internal
 */
final class Regex
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
                $chars[$i] = '['.$char.\strtolower($char).']';
            } elseif ('a' <= $char && $char <= 'z') {
                $chars[$i] = '['.\strtoupper($char).$char.']';
            }
        }

        return \join($chars);
    }

    /**
     * @see https://en.wikibooks.org/wiki/Regular_Expressions/POSIX-Extended_Regular_Expressions
     */
    public function toPcre(): string
    {
        $delim = \strpbrk(\count_chars($this->pattern, 4), '!"#$%&\'*+,-./:;=?@^_`|~');
        if ($delim !== false) {
            $delim = $delim[0];

            return $delim.$this->pattern.$delim.$this->modifier;
        }

        return '~'.\str_replace('~', '\\~', $this->pattern).'~'.$this->modifier;
    }

    /**
     * @param array|null $regs
     * @return int|false
     */
    public function match(string $string, &$regs = null)
    {
        $matches = [];
        $result = \preg_match($this->toPcre(), $string, $matches);

        if ($result === 1) {
            $regs = $matches;
            return \strlen($matches[0]) ?: 1;
        }

        return false;
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
