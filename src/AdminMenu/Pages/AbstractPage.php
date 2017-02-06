<?php

namespace WPSR\AdminMenu\Pages;

use WPSR\AdminMenu\PageHooks;

abstract class AbstractPage
{
    protected $pageTitle;
    protected $menuTitle;
    protected $capability;
    protected $menuSlug;
    protected $function;
    protected $iconUrl;
    protected $position;
    protected $subpages = [];

    public function register()
    {
        $this->beforeRegister();

        $hookName = add_menu_page($this->pageTitle, $this->menuTitle, $this->capability, $this->menuSlug, $this->function, $this->iconUrl, $this->position);

        PageHooks::addHook($hookName);

        if($this->hasSubPages())
        {
            foreach($this->subpages as $subPageClass)
            {
                (new $subPageClass)->register();
            }
        }
    }

    protected function beforeRegister()
    {
        if(is_array($this->function))
        {
            $templateClass = $this->function[0];
            $this->function[0] = new $templateClass;
        }
    }

    protected function hasSubPages()
    {
        return count($this->subpages) > 0;
    }
}