# Copilot instructions — Abdeljalil Theme

A classic (non-block) WordPress theme for an Arabic, right-to-left blog. Plain PHP templates and one
stylesheet. There is no build step and no package manager — no `composer.json`, no `package.json`.
Do not introduce a toolchain.

The full guide is [`AGENTS.md`](../AGENTS.md). The rules that matter most:

- **Escape at output, with the matching function.** `esc_html()` for text, `esc_attr()` for
  attributes, `esc_url()` for URLs, `wp_kses_post()` for markup. Hex colours get
  `sanitize_hex_color()` — `esc_attr()` is not a CSS escaper.
- **Wrap user-facing strings** in the `abdeljalil` text domain (`__()`, `_e()`, `esc_html__()`).
- **RTL first.** Use CSS logical properties (`inset-inline-start`, `margin-block-end`), never
  `left`/`right`. There is no `rtl.css`.
- **WordPress PHP coding standards**, as the files already follow them: tabs, spaces inside
  parentheses `function foo( $bar )`, Yoda conditions, long-form `array()`.
- **Prefix new functions `abdeljalil_`** (see #20 — do not add to the existing prefix split).
- **No plugin behaviour in the theme.** Anything that should survive a theme switch belongs in a
  plugin.
- **No remote assets.** Everything ships from the theme directory.
- **Do not duplicate core.** WordPress already emits canonical URLs, robots directives, sitemaps and
  the title tag.

There is no test suite. Verify manually across home, single post, archive, search, page and 404,
with `WP_DEBUG` on, and view source rather than trusting that it looks right.

The version lives in both `style.css` (`Version:`) and the `wp_enqueue_style()` call in
`functions.php`. Bump both together or browsers serve a stale stylesheet.
