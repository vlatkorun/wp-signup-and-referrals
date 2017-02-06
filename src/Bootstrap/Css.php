<?php

namespace WPSR\Bootstrap;

class Css extends AbstractBootstrapper
{
    protected $admin = [
        [
            'name' => 'font-awesome',
            'filename' => 'assets/libs/font-awesome/css/font-awesome.min.css',
            'dependencies' => []
        ],
        [
            'name' => 'main',
            'filename' => 'assets/css/admin/main.css',
            'dependencies' => []
        ]
    ];

    protected $site = [

    ];

    protected $common = [

    ];

    public function init()
    {
        if(is_admin())
        {
            add_action('admin_enqueue_scripts', [$this, 'enqueueCss']);
        }

        if(!is_admin())
        {
            add_action('wp_enqueue_scripts', [$this, 'enqueueCss']);
        }
    }

    public function enqueueCss()
    {
        $css = [];

        if(is_admin())
        {
            foreach($this->admin as $stylesheet)
            {
                $css[] = $stylesheet;
            }
        }

        if(!is_admin())
        {
            foreach($this->site as $stylesheet)
            {
                $css[] = $stylesheet;
            }
        }

        foreach($this->common as $stylesheet)
        {
            $css[] = $stylesheet;
        }

        foreach($css as $stylesheet)
        {
            $stylesheet['name'] = sprintf('%s-%s', Constants::PLUGIN_NAME, $stylesheet['name']);
            $stylesheet['filename'] = WPSR_PLUGIN_URL . '/' . $stylesheet['filename'];

            wp_enqueue_style($stylesheet['name'], $stylesheet['filename'], $stylesheet['dependencies'], Constants::PLUGIN_VERSION, $stylesheet['media']);
        }
    }
}