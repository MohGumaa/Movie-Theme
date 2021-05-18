<?php
    /**
     *  Move Theme's functions and definitions
     */

    /**
     * Set the maximum content width based on the theme's design and stylesheet.
     * This will limit the width of all uploaded images and embeds.
     */
    if ( ! isset( $content_width ) )
        $content_width = 800; /* pixels */

    if (! function_exists('movietheme_setup')) :

        /** 
         * Sets up theme defaults and registers support for various Wordpress 
         * Features.
         * 
         * Hooked after setup theme which run before init hook
         * where init is late for post thumbnails
        */

        function movietheme_setup() {

            // Make Theme available for translations
            load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );
            add_theme_support( 'automatic-feed-links' );
            add_theme_support('title-tag');
            add_theme_support( 'post-thumbnails' );
            // add_theme_support('menus'); // check if is not there

            // Post Format
            add_theme_support( 'post-formats',  array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

            // Menus Location
            register_nav_menus (
                array(
                    'primary-menu' => __('Primary Menu Desktop', 'movietheme' ),
                    'mobile-menu' => __('Mobile Menu', 'movietheme')
                )
            );
        }

    endif;

    add_action('after_setup_theme', 'movietheme_setup');

    // Add Theme Style
    function movietheme_style() {
        
        wp_enqueue_style('slider','https://unpkg.com/swiper/swiper-bundle.css');
        wp_enqueue_style('swiper' ,'https://unpkg.com/swiper/swiper-bundle.min.css');
        wp_enqueue_style('font-awesome-free', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
        wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], false, 'all');
    }

    add_action('wp_enqueue_scripts', 'movietheme_style');

    // Add Theme Scripts
    function movietheme_script() {

        wp_enqueue_script('jquery');
        wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.js');
        wp_enqueue_script('swiper-min', 'https://unpkg.com/swiper/swiper-bundle.min.js');
        wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', 'jquery', false, true);
    }

    add_action('wp_enqueue_scripts', 'movietheme_script');