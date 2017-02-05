<?php

namespace WPSR\AdminMenu;

class MenuPages
{
    protected $pages = [

    ];

    public function registerPages()
    {
        foreach($this->pages as $pageClass)
        {
            wpsr_with(new $pageClass)->register();
        }
    }
}