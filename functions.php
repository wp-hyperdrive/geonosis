<?php

defined('ABSPATH') || exit("That's not how the Force works!");

class Geonosis
{
    public function init()
    {
        add_action('after_setup_theme', [$this, 'afterSetupTheme']);
    }

    public function afterSetupTheme()
    {
        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');

        add_theme_support('disable-custom-font-sizes');
        add_theme_support('disable-custom-colors');
        add_theme_support('disable-custom-gradients');
        add_theme_support('custom-line-height');
        remove_theme_support( 'core-block-patterns' );
    }
}

(new Geonosis)->init();
