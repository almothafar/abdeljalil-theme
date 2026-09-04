<!-- Soft-wrap prose: one long line per paragraph, no hard wrapping at a column. Drop a heading you have nothing to say under, and add your own where the change calls for it. -->

Closes #

## What this changes

<!-- What was wrong, or what is new. Enough that the diff makes sense to someone who has not read the issue. -->

## Why this way

<!-- Only when there was a real choice: what else you weighed, and why this one won. If the issue prescribed one thing and you did another, say so here, and why. -->

## How to test

<!--
Steps someone else can follow, in order, with what they should see at each one. Name the page and the thing to look at, not the intention -- "open a single post with comments: the author badge should sit on that post's author, not on user 1" beats "check the comments work".

Lint first, from a portable PHP build (AGENTS.md says where to get one and which versions):

    for f in $(find . -name '*.php' -not -path './.git/*'); do /path/to/php -l "$f"; done

If the change alters what a function prints, say what you asserted on and whether the same assertions fail against the commit before the fix. If they pass on both, they are not testing the fix.

AGENTS.md lists the rest of the passes worth making: the front-end pages, WP_DEBUG, view-source, RTL at a mobile width, and the editor when enqueues change.
-->

## What was not checked

<!-- Plainly, and it is not an admission of failure -- "not opened in a browser, so the 600px breakpoint is reasoned rather than seen" tells a reviewer exactly where to look. Silence reads as a claim that everything was. -->

## What to watch when it lands

<!-- Deployed by copying files across by hand, so: what has to be copied together (style.css and functions.php always do -- they carry the same version number), what changes for posts or settings that already exist, what a browser will hold in cache. Not a list of files; the diff already has those. -->
