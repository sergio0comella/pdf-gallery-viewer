=== PDF Gallery Viewer ===

Contributors: panezio  
Donate link: https://ko-fi.com/panezio  
Tags: business, directory  
Requires at least: 6.6 
Tested up to: 6.6  
Stable tag: 1.0.0
Requires PHP: 7.0  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A simple plugin that creates a responsive PDF gallery with thumbnail previews of PDF documents.

== Description ==

PDF Gallery Viewer is a WordPress plugin that allows you to create a beautiful and responsive PDF gallery on your website. Easily display PDF documents as visually appealing thumbnails, with an automatic preview of the first page of each PDF generated using Imagick (if available). Each document in the gallery includes a "View" link and a customizable title. The gallery layout is fully responsive, adapting from a grid view on larger screens to a single-column layout on mobile devices for an optimal viewing experience. Perfect for showcasing catalogs, portfolios, reports, and other downloadable content in an organized and professional manner.

Features:
- Displays a thumbnail preview of the first page of each PDF file.
- Responsive gallery layout: items display in a grid on desktop and stack vertically on mobile.
- Easily customizable title and "View" link for each document.
- Uses Flexbox and CSS Grid for a clean, modern design.
- Automatic image thumbnail generation using Imagick, with fallback to a default PDF icon if Imagick is unavailable.

Usage:
To add a PDF document to your gallery, use the shortcode `[pdf_gallery url="PDF_URL" title="Document Title"]`. Wrap multiple shortcodes within a `pdf-gallery-container` to create a complete gallery.

This plugin is ideal for anyone who needs to share multiple PDF files on their website while keeping the layout visually consistent and mobile-friendly.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload [`plugin-name`](link-to-github.zip) to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Is this a cool plugin? =

Yes

== Screenshots ==

1. Desktop view
2. Mobile view

== Changelog ==

= v1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0.0 =
Initial release of PDF Gallery Viewer, providing a responsive PDF gallery with automatic thumbnail generation.

