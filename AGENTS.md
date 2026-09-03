# Abdeljalil Theme — agent guide

A classic (non-block) WordPress theme for an Arabic, right-to-left blog. Originally by Abdeljalil in
2016, modernized and maintained by [Al-Mothafar Al-Hasan](https://almothafar.com).

Plain PHP templates and one stylesheet. **No build step, no dependencies, no package manager** — no
`composer.json`, no `package.json`, no `node_modules`. What is in the repo is what ships. Do not
introduce a toolchain to solve a problem that a few lines of PHP or CSS solve.

## Layout

| Path | What it is |
|---|---|
| `functions.php` | Everything: theme setup, Customizer, enqueues, SEO output, comment callback |
| `header.php` `footer.php` `sidebar.php` | Chrome, wrapped around every page |
| `index.php` `archive.php` `search.php` `single.php` `page.php` `404.php` | The template hierarchy |
| `template-parts/` | Shared fragments pulled in with `get_template_part()` |
| `comments.php` `searchform.php` | Template overrides for core output |
| `style.css` | The whole design, plus the theme header WordPress reads |
| `fonts/` `images/` | Noto Kufi Arabic, and the header images offered in the Customizer |

## Non-negotiables

**Escape at output, with the function that matches the context.** `esc_html()` for text,
`esc_attr()` for attributes, `esc_url()` for URLs, `wp_kses_post()` for markup that may contain
allowed HTML. Escape at the point of echo, not earlier — an escaped value passed around is a value
nobody can tell is safe. `esc_attr()` is not a CSS escaper; hex colours get `sanitize_hex_color()`.

**Every user-facing string goes through the `abdeljalil` text domain** — `__()`, `_e()`, `esc_html__()`,
`_n()`. There is a lot of hard-coded Arabic in the templates that predates this rule; do not add
more, and wrap what you touch.

**RTL is the default, not an afterthought.** Use CSS logical properties — `inset-inline-start`,
`margin-block-end`, `padding-inline` — never `left`/`right`/`margin-left`. The theme has no
`rtl.css` and does not want one; `style.css` is RTL-first.

**Follow the WordPress PHP coding standards, as the file already does.** Tabs for indentation.
Spaces inside parentheses: `function foo( $bar )`. Yoda conditions: `if ( '' === $value )`. Array
syntax is long-form `array()` throughout — match it rather than mixing in `[]`.

**Prefix new functions `abdeljalil_`.** The file currently mixes `abdeljalil_` and `almothafar_`
(and `ALMOTHAFAR_` for constants), which is being tracked in #20. Do not add to the split.

**Do not put plugin behaviour in the theme.** Anything that should survive a theme switch — disabling
XML-RPC, analytics, redirects, custom post types — belongs in a plugin. A user who switches themes
should not silently lose or regain site behaviour.

**No remote assets.** No CDN stylesheets, scripts or fonts. Every asset is served from the theme
directory. Loading from a third party discloses every visitor's IP to that host and cannot be
audited. (One CDN dependency remains and is being removed in #11.)

**Do not reimplement what core already does.** Before adding output to `wp_head`, check whether
WordPress emits it already — canonical URLs, robots directives, sitemaps, feed links and the title
tag are all core's job. Duplicating them is worse than omitting them.

## Verifying a change

There is no test suite and no CI. Verification is manual, so say in the PR what you actually checked.

- **Front end:** home, a single post with comments, a category archive, a search result (including
  one with no results), a page, and a 404.
- **PHP notices:** run with `WP_DEBUG` on and confirm the change adds none.
- **Markup:** the theme has a history of duplicate-attribute and unbalanced-`div` bugs (#5, #6) —
  view source rather than trusting that it looks right.
- **RTL:** check the change at a mobile width too; the layout collapses to one column at 600px.
- **Editor:** if the change touches enqueues, `theme.json` or editor styles, open the post editor.

## Version bumping

The version lives in **two** places and they must move together:

- `style.css` — the `Version:` line in the theme header
- `functions.php` — the version argument passed to `wp_enqueue_style( 'abdeljalil-style', ... )`

If they disagree, browsers serve a stale stylesheet after an update. Bump both in the same commit.

`Tested up to:` in `style.css` should track the WordPress version the change was actually verified
against — do not raise it speculatively.

## Commits and pull requests

Short imperative subject, no trailing period. Explain *why* in the body when the reason is not
obvious from the diff. One logical change per PR.

Reference the issue the work belongs to (`Closes #12`). The tracker is organised into milestones
M1–M5, ordered by payoff — start at the lowest open milestone unless there is a reason not to.

Some issues deliberately overlap: #5, #14 and #16 all touch the same four listing templates, and #11
and #14 touch the same icon markup. Each of those issues carries a note saying which to land first.
Read it before starting, so the same lines are not rewritten twice.
