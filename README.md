# Phrosthesis: ereg-pcre 🦿

> Prosthetic limbs for amputated PHP functions.

Restores the POSIX Extended regex family removed in PHP 7.0 — `ereg`, `eregi`,
`ereg_replace`, `eregi_replace`, `split`, `spliti`, `sql_regcase` — backed by PCRE.

## Install

```bash
composer require phrosthesis/ereg-pcre
```

Functions are registered automatically via Composer's files autoload.
No setup, no use, no config. Your legacy code just works again.

```php
require 'vendor/autoload.php';

if (ereg('^[a-z]+$', $username)) { /* ... */ }
$parts = split('[,;]', 'a,b;c');            // ['a', 'b', 'c']
$clean = ereg_replace('\s+', ' ', $input);  // collapse whitespace
```

## setScreaming()

Silent by default. No logs, no `E_USER_DEPRECATED`, no noise.

Want to find the call sites? Enable screaming before the first call:

```php
\Phrosthesis\Ereg\PcreLimb::setScreaming(true);
```

Every `ereg()` and friends will now trigger `E_USER_DEPRECATED` with the
direct call site:

```text
Usage of deprecated function `ereg` in /app/legacy/UserValidator.php:42
```

Disable:

```php
\Phrosthesis\Ereg\PcreLimb::setScreaming(false);
```

Use in dev/staging only. The setting is global and static — calls made before
`setScreaming(true)` stay silent.

## Compatibility

PHP 7.x and 8.x. `strict_types` is supported per-file: under
`strict_types=1`, `ereg(null, 'x')` throws `TypeError`; under `0`, `null`
coerces to `''`. The package's own declare only affects internal calls.

### Matches PHP 5 behavior

- `ereg`/`eregi` return the match length (or `1` for empty matches), `false` on miss.

- `$regs` is not touched on miss — original semantics, unlike preg_match.

- `ereg_replace`/`eregi_replace` return `false` on error, input string on no match.

- `split('x', 0)` means "no limit", not "one element".

- `sql_regcase` is byte-wise and ASCII-only, like C-locale PHP 5.

### Known divergences

- POSIX ERE → PCRE is not 1:1. `[[:alpha:]]` and friends work (PCRE supports
POSIX classes). `\<`, `\>` and `\{`, `\}` are not translated — in PCRE
they mean literals/quantifiers. Use `\b` for word boundaries.

- Non-ASCII in `sql_regcase` returns bytes as-is (`é` stays `é`, not `[Éé]`).
This matches PHP 5's C-locale behavior; it's not UTF-aware.

- Locale affects `strtoupper`/`strtolower` inside `sql_regcase`
(tr_TR differs from C). Use `setlocale(LC_CTYPE, 'C')` for predictability.

### Conflicts

- Defines global ereg*/split*/sql_regcase. If any are already defined
(another polyfill, extension, legacy code) — this package silently yields via
`function_exists` guards. First one loaded wins.

- Incompatible with `phrosthesis/ereg-mbstring` — Composer will refuse to install
both. Intentional: one limb, one prosthesis. Pick the mbstring backend if you
need POSIX ERE semantics and have ext-mbstring available.

## This is not a cure

Phrosthesis is a prosthesis, not a treatment. It stops fatal errors after
a PHP upgrade — nothing more. The ereg family was removed for good reasons:
security, performance, maintenance.

Recommended path: install → `setScreaming(true)` → find call sites →
migrate to preg_* → remove the package.

A prosthesis is temporary. Like any prosthesis.

## License

BSD 3-Clause.
