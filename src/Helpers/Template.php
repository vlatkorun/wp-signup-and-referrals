<?php

namespace WPSR\Helpers;

use Jenssegers\Blade\Blade;

class Template
{
    protected $data = [];

    protected $engine;

    protected $templateFile;

    protected static $instance;

    private function __construct()
    {
        if(!$this->engine instanceof Blade)
        {
            $this->engine = new Blade(wpsr_path('templates'), wpsr_path('templates/cache'));
        }
    }

    public static function make()
    {
        if(!static::$instance)
        {
            static::$instance = new static;
        }

        return static::$instance;
    }

    public function render($data = [], $template = null)
    {
        $data = $this->initData($data);

        if(!empty($data))
        {
            $this->data = array_merge($data, $this->data);
        }

        if(is_null($template))
        {
            $template = $this->templateFile;
        }

        return $this->engine->render($template, $this->data);
    }

    public function output($data = [], $template = null)
    {
        echo $this->render($data, $template);
    }

    protected function initData(array $data = [])
    {
        return $data;
    }
}