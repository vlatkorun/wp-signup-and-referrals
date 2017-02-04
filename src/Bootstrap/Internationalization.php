<?php

namespace WPSR\Bootstrap;

class Internationalization extends AbstractBootstrapper
{
    public function init()
    {
        $this->initLanguages();
        $this->loadPluginTextDomain('wpsr', wpsr_path('languages'));
    }

    public function initLanguages()
    {
        add_action('plugins_loaded', [$this, 'loadPluginTextDomain']);
    }

    public function loadPluginTextDomain($domain, $path)
    {
        if(is_dir($path))
        {
            load_plugin_textdomain($domain, false, $path);
        }
    }
}