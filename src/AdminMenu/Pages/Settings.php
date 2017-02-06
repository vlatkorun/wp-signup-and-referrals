<?php

namespace WPSR\AdminMenu\Pages;

use WPSR\Templates\Admin\Settings as Template;

class Settings extends AbstractChildPage
{
    const PAGE_SLUG = 'wpsr-settings';

    protected $parentSlug = 'wpsr-dashboard';
    protected $pageTitle;
    protected $menuTitle;
    protected $capability = 'manage_options'; //Only Administrators can access this page
    protected $function = [Template::class, 'output']; //which file to use to render the html

    protected function beforeRegister()
    {
        $this->pageTitle = __('Settings', 'wpsr');
        $this->menuTitle = __('Settings', 'wpsr');
        $this->menuSlug =  static::PAGE_SLUG;

        parent::beforeRegister();
    }
}