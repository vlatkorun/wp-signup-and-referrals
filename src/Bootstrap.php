<?php

namespace WPSR;

use WPSR\Bootstrap\Constants;
use WPSR\Bootstrap\Internationalization;

class Bootstrap
{
    protected $boostrappers = [
//        Constants::class,
        Internationalization::class,
    ];

    public function start() {
        foreach ($this->boostrappers as $className) {
            wpsr_with(new $className)->init();
        }
    }
}