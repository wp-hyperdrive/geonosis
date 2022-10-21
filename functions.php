<?php

defined('ABSPATH') || exit("That's not how the Force works!");

class Geonosis
{
    protected $version;

    public function init(): void
    {
        $this->version = wp_get_theme()->get('Version');

        add_action('after_setup_theme', [$this, 'themeSupport']);
        add_action('after_setup_theme', [$this, 'registerTranslation']);
        add_action('after_setup_theme', [$this, 'registerNavigationMenus']);

        add_action('wp_enqueue_scripts', [$this, 'loadStyles']);
        add_action('wp_enqueue_scripts', [$this, 'loadScripts']);
    }

    public function themeSupport(): void
    {
        add_theme_support('editor-styles');
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');
        add_theme_support('responsive-embeds');

        add_theme_support('disable-custom-font-sizes');
        add_theme_support('disable-custom-colors');
        add_theme_support('disable-custom-gradients');

        remove_theme_support('core-block-patterns');

        add_theme_support(
            'html5',
            [
                'comment-form',
                'gallery',
                'style',
                'script',
            ]
        );
    }

    public function registerTranslation(): void
    {
        load_theme_textdomain('geonosis', get_template_directory() . '/languages');
    }

    public function registerNavigationMenus(): void
    {
        register_nav_menus([
            'primary' => esc_html__('Primary Menu', 'geonosis'),
            'footer'  => esc_html__('Footer Menu', 'geonosis'),
        ]);
    }

    public function loadStyles(): void
    {
        $path = get_stylesheet_directory_uri() . '/dist/style.css';
        if (!file_exists($path)) {
            return;
        }
        wp_enqueue_style('geonosis-style', $path, [], $this->version);
    }

    public function loadScripts(): void
    {
        $path = get_template_directory_uri() . '/dist/app.js';
        if (!file_exists($path)) {
            return;
        }
        wp_enqueue_script('geonosis-js', $path, [ 'jquery' ], $this->version, true);

    }
}

(new Geonosis)->init();
