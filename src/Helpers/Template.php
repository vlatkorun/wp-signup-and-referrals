<?php

namespace WPSR\Helpers;

class Template
{
    protected $data = [];
    
    protected $templateFile;

    protected $engine;

    public function __construct()
    {
        $this->engine = TemplateEngine::make();
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
        if(is_string($data))
        {
            $data = [];
        }

        echo $this->render($data, $template);
    }

    protected function initData(array $data = [])
    {
        return $data;
    }
}