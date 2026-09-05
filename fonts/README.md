# Fonts

Noto Kufi Arabic 2.109, SIL Open Font License 1.1 — the licence text is in [`OFL.txt`](OFL.txt). Upstream declares no Reserved Font Name, so the files here keep the family name `Noto Kufi Arabic`.

The theme ships two WOFF2 files instead of the two TrueType files it used to. The originals were 357,068 bytes that every visitor fetched before Arabic could render in the intended face; these are 110,988, a 69% reduction. Nothing was removed to get there: every glyph, every codepoint and every OpenType feature of the original is present, and only the container changed.

| File | Bytes |
| --- | --- |
| `NotoKufiArabic-Regular.woff2` | 55,572 |
| `NotoKufiArabic-Bold.woff2` | 55,416 |

## Regenerating them

There is no build step in this repo and there should not be one: these are committed artifacts, rebuilt by hand on the rare occasion upstream releases a new version. What follows is the exact command that produced the files in this directory, so the next person does not have to guess at the flags.

Take the upstream TrueType files from <https://github.com/notofonts/arabic>, then, with [`fonttools`](https://pypi.org/project/fonttools/) and `brotli` installed in a throwaway virtualenv:

    for weight in Regular Bold; do
      pyftsubset "NotoKufiArabic-$weight.ttf" --unicodes='*' --layout-features='*' --name-IDs='*' \
        --flavor=woff2 --output-file="NotoKufiArabic-$weight.woff2"
    done

None of those flags is optional:

- `--unicodes='*'` keeps every character. Without it `pyftsubset` cuts down to a default set and you get a subset, which is not what this is.
- `--layout-features='*'` keeps every OpenType feature. Arabic is a joining script: without `init`, `medi`, `fina` and `rlig` every letter renders in its isolated form and the text becomes unreadable. `pyftsubset`'s default feature list is aimed at Latin and does not keep all of them.
- `--name-IDs='*'` keeps the whole name table, including the copyright notice and the licence URL that the OFL requires every copy to carry. The default keeps IDs 0–6 and would drop the licence URL.

`pyftsubset` is used rather than a plain WOFF2 conversion because it repacks the tables as it goes: the same fonts converted with `fontTools.ttLib` alone come to 120,240 bytes for no benefit. Both routes are lossless — 1,558 codepoints and 1,704 glyphs in and out — so the smaller one wins.

## Why there is no unicode-range here

An earlier revision of this work shipped four files, splitting Arabic from Latin behind `unicode-range` so a page would fetch only the scripts it used. It was measured on the live site and reverted, for two reasons worth recording so nobody re-derives them.

**It saved almost nothing.** All four files loaded on every page, because `U+0020` sits in the Latin subset and every page has a space between two words. The split came to 107,096 bytes against the 110,988 here — 3,892 bytes, for twice the requests.

**It had a failure mode this does not.** Ranges have to match the font's character map, and if they do not, the codepoints nobody claims fall through to the next font in the stack — silently, mid-word, with nothing in any console. That is not hypothetical: the first attempt used the `arabic` and `latin` ranges Google Fonts publishes for this family, and they miss 142 codepoints it actually covers, including all of Latin Extended-A. It was caught by a script, not by looking. Re-deriving those ranges correctly would be a standing obligation every time the font is updated. Two full-coverage files have no ranges and so cannot drift.

If the font is ever updated, the only check that matters is that the codepoint and glyph counts survive the conversion.

## One thing measured and not done

Dropping the Arabic Presentation Forms blocks (`U+FB50-FDFF`, `U+FE70-FEFF`) would remove 650 glyphs and save roughly 29 KB across the two weights. Modern Arabic does not use them — shaping derives those forms from the base block — but text pasted from older systems does, and this blog has posts going back to 2016. The failure mode is a silent fallback in the middle of a word on old posts, which is not worth 29 KB. Doing it would mean reintroducing subsetting, and with it the drift problem described above.
