# Copilot instructions — Abdeljalil Theme

A classic (non-block) WordPress theme for an Arabic, right-to-left blog. Plain PHP templates and one
stylesheet, no build step, no package manager.

The full guide is [`AGENTS.md`](../AGENTS.md): coding standards, verification steps, the
version-bumping rule and the boundaries on what belongs in a theme. Read it. Repeated here are only
the three things most often got wrong in this repo.

- **Escape at output, with the function that matches the context.** `esc_html()` for text,
  `esc_attr()` for attributes, `esc_url()` for URLs. `esc_attr()` is not a CSS escaper; hex colours
  get `sanitize_hex_color()`.
- **Use CSS logical properties** such as `inset-inline-start` and `margin-block-end`, not
  `left`/`right`. There is no `rtl.css`; `style.css` is RTL-first.
- **Every user-facing string goes through the `abdeljalil` text domain**, via `__()`, `_e()` or
  `esc_html__()`.
- **Prefix new functions `almothafar_`**, matching the constants and the newer code. `abdeljalil_`
  is the original 2016 layer; leave those names alone rather than extending them. Note the text
  domain above is a different thing entirely and never changes.

<!--
Why this file exists alongside AGENTS.md: Copilot Chat does not read AGENTS.md in JetBrains, Visual
Studio, Eclipse or Xcode, and @ file references expand only in Copilot CLI. This path is the one
instruction file every Copilot surface reads. Keep it short and let AGENTS.md carry the detail.
-->
