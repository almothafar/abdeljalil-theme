<!--
Soft-wrap prose: one long line per paragraph, no hard wrapping at a column. See AGENTS.md.
Delete any section that does not apply rather than writing "n/a" under it.
-->

## What and why

<!-- One or two paragraphs. What changed, and the reason, when the reason is not obvious from the diff. -->

Closes #

## Files changed, and what a deploy needs

<!--
The site is deployed by copying files to the live blog by hand, so list the files and say which ones actually affect the running site. Call out any pair that must be copied together -- style.css and functions.php always are, because they carry the same version number.
-->

| File | Affects the running site | What changed |
| --- | --- | --- |
|  |  |  |

## Decisions worth arguing about

<!-- Anything where you chose between real alternatives: which fix, where a thing lives, what was deliberately left out, an issue's suggestion you did not follow. Say what you picked and why. Delete this section if the change had no such choice in it. -->

## How to test

<!-- Delete the lines that do not apply. Keep the ones you actually ran, and say what you saw -- not what should happen. -->

**Lint.** There is no PHP on the usual machine, which is not a reason to skip this. Grab the `nts-Win32-x64` zip from <https://windows.php.net/downloads/releases/> (and `/archives/` for older versions), extract to a scratch directory, and run `php -l` over every `.php` file from there against both the oldest and newest PHP the `style.css` header claims. Nothing installed, nothing on `PATH`, delete it afterwards.

```
for f in $(find . -name '*.php' -not -path './.git/*'); do /path/to/php -l "$f"; done
```

- [ ] PHP _._ (oldest supported): clean
- [ ] PHP _._ (newest supported): clean

**Behaviour, for anything that changes output.** A lint only proves it parses. Stub the WordPress functions the change calls, copy the real implementations of the two or three that actually matter out of core, and assert on what the function prints. Run the same assertions against the commit before the fix: if they pass there, they are not testing the fix.

- [ ] Assertions: ___ passing, ___ of them failing against the previous commit
- [ ] Core functions copied rather than faked:

**Front end**, on a real install:

- [ ] Home
- [ ] A single post with comments
- [ ] A category archive
- [ ] A search result, and one with no results
- [ ] A page
- [ ] A 404
- [ ] `WP_DEBUG` on, no new notices
- [ ] Markup checked in view-source, not just by eye — this theme has a history of duplicate attributes and unbalanced `div`s that render fine until they do not
- [ ] RTL at a mobile width; the layout collapses to one column at 600px
- [ ] The post editor, if this touches enqueues, `theme.json` or editor styles

## Version bump

<!-- Required whenever style.css changes. The two must move together or browsers serve a stale stylesheet after an update. Delete this section if style.css is untouched. -->

- [ ] `style.css`, the `Version:` line in the theme header
- [ ] `functions.php`, the version argument to `wp_enqueue_style( 'abdeljalil-style', ... )`
- [ ] `Tested up to:` reflects the WordPress version this was actually verified against, and was not raised speculatively

## What was not verified

<!-- Say it plainly. "No WordPress install here, so the CSS change is reasoned rather than seen" is a useful thing for a reviewer to read; silence about it is not. -->

## Noted, not done here

<!-- Things spotted in passing and deliberately left alone, so they are not lost and not silently folded into this PR. Link an issue if one exists. -->
