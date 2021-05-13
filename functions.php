<?php

    // Add Theme Support
    function movietheme_support() {
        add_theme_support('title-tag');
        add_theme_support('menus');
    }

    add_action('after_setup_theme', 'movietheme_support');

    // Menus Location
    register_nav_menus (
        array(
            'primary-menu' => __('Primary Menu Desktop'),
            'mobile-menu' => __('Mobile Menu')
        )
    );

    // Add Theme Style
    function movietheme_style() {
        wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], false, 'all');
        wp_enqueue_style('font-awesome-free', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    }

    add_action('wp_enqueue_scripts', 'movietheme_style');

    // Add Theme Scripts
    function movietheme_script() {

        wp_enqueue_script('jquery');
        wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', 'jquery', false, true);
    }

    add_action('wp_enqueue_scripts', 'movietheme_script');