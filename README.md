# Abdeljalil Theme v2.0

A modernized Arabic RTL WordPress theme with responsive design, HTML5 semantics, and enhanced security.

![Version](https://img.shields.io/badge/version-2.0-blue.svg)
![WordPress](https://img.shields.io/badge/WordPress-6.8%2B-21759b.svg)
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
- ✅ **Security Hardened** - Removed malware, added input sanitization, disabled XML-RPC
- ✅ **WordPress 6.8+ Compatible** - Uses latest WordPress APIs
- ✅ **PHP 8.4+ Compatible** - No deprecated functions
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
- ✅ **SEO Optimized** - Meta descriptions, canonical URLs, Open Graph tags, structured data

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
- ✅ Disabled XML-RPC to prevent brute force attacks
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
