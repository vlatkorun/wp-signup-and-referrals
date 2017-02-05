<?php

namespace WPSR\Bootstrap;

use WPSR\Helpers\Template;

class TemplateEngine extends AbstractBootstrapper
{
    public function init()
    {
        add_action('init', [$this, 'initTemplateEngine']);
    }

    protected function initTemplateEngine()
    {
        Template::make();
    }
}