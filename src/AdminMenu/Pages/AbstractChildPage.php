<?php

namespace WPSR\AdminMenu\Pages;

abstract class AbstractChildPage
{
    protected $parentSlug;
    protected $pageTitle;
    protected $menuTitle;
    protected $capability;
    protected $menuSlug;
    protected $function;

    public function register()
    {
        $this->beforeRegister();

        add_submenu_page($this->parentSlug, $this->pageTitle, $this->menuTitle, $this->capability, $this->menuSlug, $this->function);
    }

    protected function beforeRegister()
    {
        if(is_array($this->function))
        {
            $templateClass = $this->function[0];
            $this->function[0] = new $templateClass;
        }
    }
}