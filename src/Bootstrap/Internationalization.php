<?php

namespace WPSR\Bootstrap;

class Internationalization extends AbstractBootstrapper
{
    public function init()
    {
        add_action('plugins_loaded', [$this, 'loadPluginTextDomain']);
    }

    public function initLanguages()
    {

    }

    public function loadPluginTextDomain()
    {
        load_plugin_textdomain('wpsr', false, wpsr_path('languages'));
    }
}