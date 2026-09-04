# Abdeljalil Theme — agent guide

A classic (non-block) WordPress theme for an Arabic, right-to-left blog. Originally by Abdeljalil in
2016, modernized and maintained by [Al-Mothafar Al-Hasan](https://almothafar.com).

Plain PHP templates and one stylesheet, served exactly as committed. There is no build step and no
package manager today. If a task genuinely needs one, say so in the PR rather than adding it quietly,
and commit the output rather than building on demand.

`functions.php` is the one thing worth knowing about the layout: roughly 800 lines holding theme
setup, the Customizer, enqueues, all SEO output and the comment callback. It is divided into sections
by `/****...****/` banner comments. Put new code in the section it belongs to, and add a banner if it
needs a new one.

## Rules

**Escape at output, with the function that matches the context.** `esc_html()` for text,
`esc_attr()` for attributes, `esc_url()` for URLs, `wp_kses_post()` for markup that may contain
allowed HTML. Escape at the point of echo, not earlier: an escaped value passed around is a value
nobody can tell is safe. `esc_attr()` is not a CSS escaper, and hex colours get
`sanitize_hex_color()`.

**Every user-facing string goes through the `abdeljalil` text domain**, via `__()`, `_e()`,
`esc_html__()` or `_n()`. Plenty of hard-coded Arabic predates this rule. Do not add more, and wrap
what you touch.

**Use CSS logical properties** such as `inset-inline-start`, `margin-block-end` and `padding-inline`,
not `left`/`right`/`margin-left`. There is no `rtl.css`; `style.css` is RTL-first and stays that way.

**Follow the WordPress PHP coding standards, as the files already do.** Tabs for indentation. Spaces
inside parentheses: `function foo( $bar )`. Yoda conditions: `if ( '' === $value )`. Long-form
`array()`, not `[]`.

**Prefix new functions `almothafar_`,** matching the constants (`ALMOTHAFAR_`) and the newer
code. `abdeljalil_` is the original 2016 layer -- leave those names alone, but do not add
to them. The `abdeljalil` text domain is unrelated to this and never changes: it is tied to
the theme slug in `style.css`.

**Do not put plugin behaviour in the theme.** Anything that should survive a theme switch, such as
disabling XML-RPC, analytics, redirects or custom post types, belongs in a plugin. A user who
switches themes should not silently lose or regain site behaviour.

**No remote assets.** No CDN stylesheets, scripts or fonts. Everything ships from the theme
directory. Loading from a third party discloses every visitor's IP to that host and cannot be
audited.

**Do not reimplement what core already does.** Before adding output to `wp_head`, check whether
WordPress emits it already. Canonical URLs, robots directives, sitemaps, feed links and the title tag
are all core's job. Duplicating them is worse than omitting them.

## Verifying a change

There is no test suite and no CI, so verification is manual. Say in the PR what you actually checked.

- **PHP lint, before anything else.** No PHP is installed on the machine this is usually written
  on, which is not a reason to skip the check. Download a portable build — the `nts-Win32-x64` zip
  from <https://windows.php.net/downloads/releases/> — extract it to a scratch directory and run
  `php -l` over every `.php` file from there. No install, nothing on `PATH`, delete it afterwards.
  Lint against both the oldest and the newest PHP the theme header claims to support.
- **Output-changing code deserves more than a lint.** Stub the WordPress functions a change calls,
  copy the real implementations of the two or three that actually matter out of core, and assert on
  what the function prints. That is how the share-URL encoding was verified — and how a regression
  in it was caught, by running the same assertions against the previous commit.
- **Front end:** home, a single post with comments, a category archive, a search result (including
  one with no results), a page, and a 404.
- **PHP notices:** run with `WP_DEBUG` on and confirm the change adds none.
- **Markup:** view source rather than trusting that it looks right. This theme has a history of
  duplicate attributes and unbalanced `div`s that render fine until they do not.
- **RTL:** check at a mobile width too; the layout collapses to one column at 600px.
- **Editor:** if the change touches enqueues, `theme.json` or editor styles, open the post editor.

## Version bumping

The version lives in two places and they must move together:

- `style.css`, the `Version:` line in the theme header
- `functions.php`, the version argument passed to `wp_enqueue_style( 'abdeljalil-style', ... )`

If they disagree, browsers serve a stale stylesheet after an update. Bump both in the same commit.
`Tested up to:` should track the WordPress version the change was actually verified against; do not
raise it speculatively.

## Commits and pull requests

Short imperative subject, no trailing period. Explain why in the body when the reason is not obvious
from the diff. One logical change per PR, and reference the issue it closes.

Issues that overlap with another carry a note saying which to land first. Read it before starting, so
the same lines are not rewritten twice.

[`.github/PULL_REQUEST_TEMPLATE.md`](.github/PULL_REQUEST_TEMPLATE.md) is what GitHub prefills a description with. Write prose under its headings, not a form, and never restate the diff — it asks only for what the diff cannot show: why this approach and not the one you rejected, how someone else can test it, what you did not check, and what to watch for when the files are copied to the live site. Drop a heading you have nothing to say under, and add one where the change calls for it.

**Soft-wrap prose; do not hard-wrap it at a column.** One long line per paragraph in Markdown files, pull request descriptions and commit message bodies, and let the editor or the renderer wrap it. GitHub reflows prose when it renders, so hard-wrapped paragraphs arrive broken at a width that matches nobody's viewport, and changing one word reflows every following line in the diff. List items, table rows and headings stay one per line, as they already are. None of this applies to code or to comments inside code, which follow the WordPress standards above. Most of the Markdown here, this file included, predates the rule and is still wrapped at 100. Do not add more, and reflow what you touch.
