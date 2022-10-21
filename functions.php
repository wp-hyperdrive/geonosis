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
    }
}

(new Geonosis)->init();
