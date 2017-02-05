<?php

namespace WPSR;

use WPSR\Bootstrap\Constants;
use WPSR\Bootstrap\Internationalization;
use WPSR\Bootstrap\Actions;
use WPSR\Bootstrap\Filters;
use WPSR\Bootstrap\TemplateEngine;
use WPSR\Bootstrap\Javascript;
use WPSR\Bootstrap\Css;

class Bootstrap
{
    protected $boostrappers = [
        Internationalization::class,
        TemplateEngine::class,
        Actions::class,
        Filters::class,
        Javascript::class,
        Css::class,
    ];

    public function start() {
        foreach ($this->boostrappers as $className) {
            wpsr_with(new $className)->init();
        }
    }
}