<?php

namespace WPSR\AdminMenu\Pages;

use WPSR\Templates\Admin\Dashboard as Template;

class Dashboard extends AbstractChildPage
{
    const PAGE_SLUG = 'wpsr-dashboard';

    protected $parentSlug = 'wpsr-dashboard';
    protected $pageTitle;
    protected $menuTitle;
    protected $capability = 'manage_options'; //Only Administrators can access this page
    protected $menuSlug = 'wpsr-dashboard';
    protected $function = [Template::class, 'output']; //which file to use to render the html

    protected function beforeRegister()
    {
        $this->pageTitle = __('Dashboard', 'wpsr');
        $this->menuTitle = __('Dashboard', 'wpsr');
        $this->menuSlug =  static::PAGE_SLUG;

        parent::beforeRegister();
    }
}