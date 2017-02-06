<?php

namespace WPSR\Bootstrap;

class Javascript extends AbstractBootstrapper
{
    protected $admin = [
        [
            'name' => 'lodash',
            'filename' => 'assets/libs/lodash/dist/lodash.min.js',
            'dependencies' => []
        ],
        [
            'name' => 'settings.page',
            'filename' => 'assets/js/admin/settings.page.js',
            'dependencies' => ['jquery']
        ],
    ];

    protected $site = [

    ];

    protected $common = [

    ];

    public function init()
    {
        if(is_admin())
        {
            add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);
        }

        if(!is_admin())
        {
            add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        }
    }

    public function enqueueScripts()
    {
        $scripts = [];

        if(is_admin())
        {
            foreach($this->admin as $script)
            {
                $scripts[] = $script;
            }
        }

        if(!is_admin())
        {
            foreach($this->site as $script)
            {
                $scripts[] = $script;
            }
        }

        foreach($this->common as $script)
        {
            $scripts[] = $script;
        }

        foreach($scripts as $script)
        {
            $script['name'] = sprintf('%s-%s', Constants::PLUGIN_NAME, $script['name']);
            $script['filename'] = WPSR_PLUGIN_URL . '/' . $script['filename'];

            wp_enqueue_script($script['name'], $script['filename'], $script['dependencies'], Constants::PLUGIN_VERSION, $script['media']);
        }
    }
}