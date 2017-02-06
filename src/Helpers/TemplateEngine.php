<?php

namespace WPSR\Helpers;

use Jenssegers\Blade\Blade;

class TemplateEngine
{
    protected static $instance;

    protected $engine;

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

    public function render($template, array $data = [])
    {
        return $this->engine->render($template, $data);
    }
}