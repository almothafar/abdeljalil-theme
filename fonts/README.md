# Fonts

Noto Kufi Arabic 2.109, SIL Open Font License 1.1 — the licence text is in [`OFL.txt`](OFL.txt). Upstream declares no Reserved Font Name, so the subsets here keep the family name `Noto Kufi Arabic`.

The theme ships four WOFF2 subsets instead of the two full TrueType files it used to. The originals were 357,068 bytes of font data that every visitor fetched before Arabic text could render in the intended face; these are 107,096, a 70% reduction on identical outlines.

| File | Bytes |
| --- | --- |
| `NotoKufiArabic-Regular-arabic.woff2` | 40,172 |
| `NotoKufiArabic-Regular-latin.woff2` | 13,368 |
| `NotoKufiArabic-Bold-arabic.woff2` | 40,236 |
| `NotoKufiArabic-Bold-latin.woff2` | 13,320 |

## Regenerating them

There is no build step in this repo and there should not be one: these are committed artifacts, rebuilt by hand on the rare occasion upstream releases a new version. What follows is the exact command that produced the files in this directory, so the next person does not have to guess at the flags.

Take the upstream TrueType files from <https://github.com/notofonts/arabic>, then, with [`fonttools`](https://pypi.org/project/fonttools/) and `brotli` installed in a throwaway virtualenv:

    ARABIC='U+0600-06FF,U+0750-077F,U+0870-08FF,U+FB50-FDFF,U+FE70-FEFF,U+10EFD-10EFF'
    LATIN='U+0000-017E,U+0218-0237,U+02C6-0328,U+1E80-1E9E,U+1EF2-1EF3,U+2009-204F,U+20AC,U+2122,U+2212-221A,U+25CC,U+2E41'

    for weight in Regular Bold; do
      pyftsubset "NotoKufiArabic-$weight.ttf" --unicodes="$ARABIC" --layout-features='*' --name-IDs='*' \
        --flavor=woff2 --output-file="NotoKufiArabic-$weight-arabic.woff2"
      pyftsubset "NotoKufiArabic-$weight.ttf" --unicodes="$LATIN" --layout-features='*' --name-IDs='*' \
        --flavor=woff2 --output-file="NotoKufiArabic-$weight-latin.woff2"
    done

Three flags are not optional:

- `--layout-features='*'` keeps every OpenType feature. Arabic is a joining script: without `init`, `medi`, `fina` and `rlig` every letter renders in its isolated form and the text becomes unreadable. `pyftsubset`'s default feature list is aimed at Latin and does not keep all of them.
- `--name-IDs='*'` keeps the whole name table, including the copyright notice and the licence URL that the OFL requires every copy to carry. The default keeps IDs 0–6 and would drop the licence URL.
- `--flavor=woff2` is what makes the output a WOFF2 rather than a TrueType with a different extension.

## About the ranges

They are derived from this font's own character map, not copied from a list. The two sets partition it exactly: every one of the 1,558 codepoints the original TrueType could render is claimed by exactly one of the two files, and none is claimed by both. The same 1,558 codepoints are covered by both weights.

Do not substitute Google Fonts' published `arabic` and `latin` ranges for this family. They were tried first and they miss 142 codepoints this font actually covers — Latin Extended-A, Arabic Extended-B and C, `U+1E80-1E9E`, and `U+25CC`, the dotted circle a lone combining mark renders on. A codepoint that no `unicode-range` claims falls through to the next font in the stack, so the effect is a silent switch to tahoma mid-word rather than an error.

The ranges must stay in step with the `unicode-range` descriptors in `style.css` and `editor-style.css`, which are identical to each other. If the font is ever updated, re-derive them rather than assuming the old ones still partition the new character map.

## Things measured and deliberately not done

- **Arabic Presentation Forms are kept.** `U+FB50-FDFF` and `U+FE70-FEFF` are 650 glyphs, and dropping them would take the two Arabic subsets from 80,408 bytes to 50,848. Modern Arabic does not use them — shaping derives those forms from the base block — but text pasted from older systems does, and the failure mode is a silent fallback in the middle of a word on old posts.
- **The Arabic/Latin split earns less than it looks.** Two full-coverage WOFF2 files, one per weight, would total 110,988 bytes against the 107,096 shipped here, because `U+0020` lives in the Latin subset and so any page with a space between two words fetches both. Nearly all of the 70% win is WOFF2, not the split. This is also why `almothafar_preload_critical_assets()` in `functions.php` preloads both regular-weight subsets rather than only the Arabic one: on this blog they are not independent, and preloading one of a pair that always load together just moves the problem to the other file. The split is kept because it is the shape the tracker asked for and because it costs nothing on HTTP/2, but collapsing to two files would be a defensible simplification.
