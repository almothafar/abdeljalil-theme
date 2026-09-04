# Abdeljalil Theme v2.0

A modernized Arabic RTL WordPress theme with responsive design, HTML5 semantics, and enhanced security.

![Version](https://img.shields.io/badge/version-2.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-5.7%2B-21759b.svg)
![PHP](https://img.shields.io/badge/PHP-7.4%2B-777bb4.svg)
![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)
![RTL](https://img.shields.io/badge/RTL-yes-success.svg)
![Responsive](https://img.shields.io/badge/responsive-yes-success.svg)

## 📖 About

Originally created by Abdeljalil in 2016, this theme has been completely modernized and maintained by **Al-Mothafar Al-Hasan** in 2025.

The theme has been rebuilt from the ground up to meet modern WordPress and web standards while maintaining its classic RTL Arabic design aesthetic.

## ✨ Features

- ✅ **RTL (Right-to-Left) Support** - Fully optimized for Arabic content
- ✅ **Fully Responsive** - Mobile-first design with comprehensive breakpoints
- ✅ **HTML5 Semantic Markup** - Modern, accessible code
- ✅ **Security Hardened** - Removed malware, added input sanitization
- ✅ **WordPress 5.7+ Compatible** - Uses current WordPress APIs
- ✅ **PHP 7.4+ Compatible** - No deprecated functions
- ✅ **Modern Social Sharing** - Facebook, X, LinkedIn, Telegram, WhatsApp
- ✅ **Customizable Social Media Links** - Add your social profiles via Theme Customizer
- ✅ **Social Icons in Header** - Display GitHub, LinkedIn, X, Facebook, Steam icons
- ✅ **Footer Navigation** - Page links moved to footer with clean flex layout
- ✅ **Custom Header Images** - 8 built-in headers + upload your own
- ✅ **Custom Background** - Change colors via Customizer
- ✅ **Threaded Comments** - Nested comment support
- ✅ **Widget Ready** - Customizable sidebar
- ✅ **Translation Ready** - i18n/l10n support
- ✅ **Accessibility Improvements** - ARIA roles and screen reader text
- ✅ **CSS Variables** - Easy theme customization with CSS custom properties
- ✅ **SEO Optimized** - Meta descriptions, Open Graph tags, structured data (canonical and robots tags are left to WordPress core)

## 🚀 Installation

1. Download the theme zip file
2. Go to WordPress Admin → Appearance → Themes → Add New
3. Click "Upload Theme" and select the zip file
4. Click "Install Now" and then "Activate"

## 📱 Responsive Breakpoints

- **Desktop**: > 1200px (full layout with sidebar)
- **Tablet**: 600px - 1200px (adjusted sidebar width)
- **Mobile**: ≤ 600px (stacked single-column layout)

## 🔒 Security Improvements (v2.0)

- ✅ Removed 220+ lines of malicious backdoor code
- ✅ Implemented proper input sanitization (`esc_url()`, `esc_html()`, `esc_attr()`)
- ✅ Removed WordPress version exposure
- ⚠️ XML-RPC was disabled here in v2.0. It has moved out of the theme (see Unreleased below), because site-wide behaviour should not depend on which theme is active
- ✅ Removed hardcoded tracking IDs
- ✅ Modern script enqueueing (no inline JavaScript)

## 🎨 Customization

### Social Media Links (NEW in v2.0)
1. Go to **Appearance → Customize → روابط التواصل الاجتماعي (Social Media Links)**
2. Enter your username for each platform:
   - **GitHub**: Your GitHub username → becomes `github.com/username`
   - **LinkedIn**: Your LinkedIn username → becomes `linkedin.com/in/username`
   - **X**: Your X username → becomes `x.com/username`
   - **Facebook**: Your Facebook username → becomes `fb.me/username`
   - **Steam**: Your Steam ID → becomes `steamcommunity.com/id/username`
3. Social icons will appear in the header navigation bar (right side for RTL)
4. Leave blank to hide any social icon

### Custom Header
1. Go to **Appearance → Header**
2. Choose from 8 pre-installed headers or upload your own (1200×190px recommended)
3. Toggle header text visibility

### Custom Background
1. Go to **Appearance → Background**
2. Choose a color or upload an image

### Widgets
1. Go to **Appearance → Widgets**
2. Add widgets to "السايدبار" (Sidebar)

### Menus
1. Go to **Appearance → Menus**
2. Create a menu and assign it to "Primary Menu"
3. Menu will appear in the footer

## 🛠️ Changelog

### Unreleased
**Add theme.json and editor styles, and fix the WordPress 7.0 editor regression**

- The post editor was composing in a serif, left-to-right browser default with no relation to the published page. WordPress 7.0 types the stylesheet it generates for a classic theme as the theme's own, so the editor skips its default styles on the assumption that the theme supplies them -- and this one supplied none. It now ships `editor-style.css`, so the canvas uses Noto Kufi Arabic, right to left, at the same size as the front end.
- Added `theme.json`. The colours from `:root` are now offered as editor presets, the design tools are switched on through `appearanceTools`, and blocks know the article column is 828px wide rather than guessing. The front end is unchanged apart from one thing noted below.
- Blocks inserted in the editor previously had no idea how wide the column they land in is. `layout.contentSize` is 828px, which is what 69% of the 1200px container actually measures, so a wide-aligned block now spans the container rather than overflowing it.
- New theme supports: `custom-logo` (the Open Graph tags already looked for a logo the theme gave no way to set), `align-wide`, `customize-selective-refresh-widgets`, and `post-formats`.
- Adding `theme.json` makes WordPress drop `classic-themes.css`, which was the only thing giving Button blocks their pill shape. That styling is restored through `styles.elements.button`, so buttons in existing posts look the same as before.

**Correct the version headers and drop the dead html5 arguments**

- `Requires at least` moves from 5.0 to 5.7, re-derived from what the theme actually calls. The newest core APIs in it are the `wp_robots` filter and `wp_robots_no_robots()`, both 5.7.0. Below that the theme did not fatal -- the filter simply never fired, so author, date and search archives quietly stopped being de-indexed.
- The requirements are now declared in one place, the `style.css` theme header. The `functions.php` docblock and the theme description used to restate them, and had drifted to claiming "WordPress 6.8+ and PHP 8.4+", which contradicted the headers three lines below.
- Dropped the `html5` feature's `style` and `script` arguments, which WordPress 7.0 deprecated and ignores. On 5.7 to 6.9 this puts a redundant `type='text/css'` back on the stylesheet link, and on 5.7 to 6.3 a `type='text/javascript'` on the comment-reply script; both are valid HTML5 and nothing behaves differently.
- Theme version 2.1 to 2.2. The previous release changed `style.css` without moving the version, so caches still holding 2.1 were rendering the new inline SVG icons unsized.

**Drop the Font Awesome CDN and inline the nine icons as SVG**

- Removed the Font Awesome stylesheet that was loaded from cdnjs on every page. It cost 325,244 bytes across three render-blocking cross-origin requests -- a 90 KB stylesheet and two complete icon fonts -- and disclosed every visitor's IP address to Cloudflare, to draw nine pictures. The theme now makes no third-party requests at all.
- The nine icons ship inline, from `almothafar_icon()`, at about 9 KB on a post page. They are Font Awesome Free 7.3.1 paths under CC BY 4.0; each keeps its attribution comment in the rendered output. See Credits below.
- Two of the class names the theme used were legacy aliases that only resolved through Font Awesome's version 4 compatibility shim: `fa-search` (now `magnifying-glass`) and `fa-telegram-plane` (now `telegram`). Both would have broken silently when upstream drops the shim.

**Stop duplicating what WordPress core already does**

- Removed the duplicate `<link rel="canonical">`. Core's `rel_canonical()` is the only one now, and archive pages no longer get a theme-invented canonical.
- Moved the robots directives onto core's `wp_robots` filter, so one `<meta name="robots">` is rendered instead of two. Paginated archives are no longer `noindex`, which is what lets crawlers reach older posts.
- Removed the three sitemap filters. Core's defaults apply again, including honouring the "Discourage search engines from indexing this site" setting that the theme previously overrode.
- Removed the `robots_txt` filter. Crawl policy belongs to the server or a plugin.
- Stopped enqueueing jQuery. The theme ships no JavaScript.
- Removed the `xmlrpc_enabled` filter. Disabling XML-RPC is a site decision, not a theme one -- it should not switch off when you change themes. To keep it disabled, install a plugin such as [Remove XML-RPC Methods](https://wordpress.org/plugins/wee-remove-xmlrpc-methods/), which also closes the pingback methods the theme filter never covered.

### Version 2.0 (2025)
**Complete Theme Modernization by Al-Mothafar Al-Hasan**

#### New Features ✨
- **Customizable Social Media Links** - Add GitHub, LinkedIn, X, Facebook, Steam profiles via Theme Customizer
- **Social Icons in Header** - Beautiful Font Awesome icons in navigation bar with hover effects
- **Footer Navigation** - Page menu moved from header to footer with clean flex layout
- **SEO Enhancements** - Added meta descriptions, canonical URLs, Open Graph tags, JSON-LD structured data
- **Modern Social Sharing** - Updated sharing buttons (Facebook, X, LinkedIn, Telegram, WhatsApp)
- **CSS Variables** - Theme dimensions now use CSS custom properties for easy customization
- **Theme Constants** - PHP constants for dimensions (header, thumbnails, content width)

#### Security Fixes 🔒
- Removed 220+ lines of malware/backdoor code from functions.php
- Added comprehensive input sanitization (`esc_url()`, `esc_html()`, `esc_attr()`)
- Removed WordPress version information
- Disabled XML-RPC to prevent brute force attacks
- Removed hardcoded Google Analytics/AdSense tracking IDs

#### WordPress & PHP Compatibility 🔧
- Updated to WordPress 6.8+ APIs
- PHP 8.4+ compatible
- Replaced all deprecated functions
- Added modern theme support features
- Uses WordPress bundled jQuery (removed old jQuery 1.6.2)

#### HTML5 & Semantics 📝
- Converted to HTML5 DOCTYPE
- Added semantic HTML5 elements (`<nav>`, `<header>`, `<footer>`, `<article>`)
- Implemented ARIA roles for accessibility
- Added `wp_body_open()` hook support

#### Responsive Design 📱
- Mobile-first CSS architecture with Flexbox
- Comprehensive responsive breakpoints (1200px, 600px)
- Fluid images and embeds
- Touch-friendly navigation and social icons
- Print stylesheet for better printing

#### Code Quality 💎
- Cleaned up unused JavaScript files
- Modern CSS with CSS variables and better organization
- Improved accessibility (ARIA labels, screen reader text)
- Proper script/style enqueueing (no inline JavaScript)
- HTML5 search form
- Modern WordPress comment form API

### Version 1.0 (2016)
- Original release by Abdeljalil

## 👨‍💻 Credits

### Bundled Resources

The theme ships these and loads nothing from a third party at runtime.

- **Icons** -- nine [Font Awesome Free](https://fontawesome.com) 7.3.1 icons, inlined as SVG in `functions.php`. Icons are licensed [CC BY 4.0](https://fontawesome.com/license/free); each one carries its attribution comment in the rendered page.
- **Fonts** -- [Noto Kufi Arabic](https://fonts.google.com/noto/specimen/Noto+Kufi+Arabic), licensed [SIL Open Font License 1.1](https://openfontlicense.org), in `fonts/`.

### Original Theme
- **Author**: Abdeljalil
- **Year**: 2016

### Modernization & Maintenance
- **Maintainer**: Al-Mothafar Al-Hasan
- **Website**: [almothafar.com](https://almothafar.com)
- **GitHub**: [@almothafar](https://github.com/almothafar)
- **LinkedIn**: [linkedin.com/in/almothafar](https://linkedin.com/in/almothafar)
- **X**: [@almothafar](https://x.com/almothafar)
- **Facebook**: [fb.me/almothafar](https://fb.me/almothafar)
- **Telegram**: [@almothafar](https://t.me/almothafar)

## 📄 License

This theme is licensed under the **GNU General Public License v2 or later**.

```
Copyright (C) 2016 Abdeljalil (Original Theme)
Copyright (C) 2025 Al-Mothafar Al-Hasan (Modernization)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
```

**Use it freely, modify it, and share it!** ❤️

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📞 Support

If you encounter any issues or have questions:

1. Check the [Issues](https://github.com/almothafar/abdeljalil-theme/issues) page
2. Create a new issue if your problem isn't already listed
3. Contact: [almothafar.com](https://almothafar.com)

## 🙏 Acknowledgments

- Original theme design by Abdeljalil
- WordPress community for excellent documentation
- All contributors and users

---

Made with ❤️ by [Al-Mothafar Al-Hasan](https://almothafar.com)
