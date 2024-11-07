<?php
/*
Plugin Name: PDF Gallery Viewer
Description: A WordPress plugin that creates a responsive PDF gallery with thumbnail previews.
Version: 1.0.0
Author: Panezio
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function pdf_gallery_enqueue_styles()
{
    wp_enqueue_style('pdf-gallery-style', plugin_dir_url(__FILE__) . 'pdf-gallery-viewer.css');
}
add_action('wp_enqueue_scripts', 'pdf_gallery_enqueue_styles');

function pdf_gallery_generate_thumbnail($pdf_url)
{
    $upload_dir = wp_upload_dir();
    $pdf_path = str_replace(trailingslashit(site_url()), ABSPATH, $pdf_url);
    $image_path = $upload_dir['path'] . '/' . md5($pdf_url) . '.jpg';

    if (!file_exists($image_path) && class_exists('Imagick')) {
        try {
            $imagick = new Imagick();
            $imagick->setResolution(150, 150);
            $imagick->readImage($pdf_path . '[0]');
            $imagick->setImageFormat('jpeg');
            $imagick->writeImage($image_path);
            $imagick->clear();
            $imagick->destroy();
        } catch (Exception $e) {
            return plugin_dir_url(__FILE__) . 'pdf-icon.png';
        }
    }

    return file_exists($image_path) ? $upload_dir['url'] . '/' . basename($image_path) : plugin_dir_url(__FILE__) . 'pdf-icon.png';
}

function pdf_gallery_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'url' => '',
        'title' => '',
        'text_link' => "View"
    ), $atts, 'pdf_gallery');

    if (empty($atts['url'])) {
        return '<p>PDF Url required</p>';
    }

    $thumbnail_url = pdf_gallery_generate_thumbnail($atts['url']);

    return '
    <div class="pdf-gallery-container">
        <div class="pdf-gallery-item">
            <div class="pdf-icon">
                <img src="' . esc_url($thumbnail_url) . '" alt="PDF Preview">
            </div>
            <div class="pdf-info">
                <a href="' . esc_url($atts['url']) . '" target="_blank" class="pdf-view-link">"'
                . esc_html($atts['text_link']). '"</a>
                <div class="pdf-title">' . esc_html($atts['title']) . '</div>
            </div>
        </div>
    </div>';
}
add_shortcode('pdf_gallery', 'pdf_gallery_shortcode');
