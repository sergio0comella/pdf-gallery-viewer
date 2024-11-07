<?php
/*
Plugin Name: PDF Gallery Viewer
Description: A WordPress plugin that creates a responsive PDF gallery with thumbnail previews.
Version: 1.0.0
Author: Panezio
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Aggiunge il file PDF.js (libreria per visualizzare i PDF) e il nostro script personalizzato
function pdf_viewer_enqueue_scripts() {
    wp_enqueue_script('pdf-js', 'https://mozilla.github.io/pdf.js/build/pdf.js', array(), null, true);
    wp_enqueue_script('pdf-viewer-script', plugin_dir_url(__FILE__) . 'pdf-viewer.js', array('pdf-js'), null, true);
    wp_enqueue_style('pdf-viewer-style', plugin_dir_url(__FILE__) . 'pdf-viewer.css');
}
add_action('wp_enqueue_scripts', 'pdf_viewer_enqueue_scripts');

// Crea lo shortcode [pdf_viewer url="URL_DEL_PDF"]
function pdf_viewer_shortcode($atts) {
    $atts = shortcode_atts(array(
        'url' => '',
    ), $atts, 'pdf_viewer');

    if (empty($atts['url'])) {
        return '<p>URL del PDF non specificato.</p>';
    }

    return '<div class="pdf-viewer" data-url="' . esc_url($atts['url']) . '"></div>';
}
add_shortcode('pdf_viewer', 'pdf_viewer_shortcode');
