<?php

namespace WPSR\AdminMenu;

use WPSR\AdminMenu\Pages\Main;

class MenuPages
{
    protected $pages = [
        Main::class,
    ];

    public function registerPages()
    {
        foreach($this->pages as $pageClass)
        {
            wpsr_with(new $pageClass)->register();
        }
    }
}