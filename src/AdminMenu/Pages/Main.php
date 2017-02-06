<?php

namespace WPSR\AdminMenu\Pages;

use WPSR\Templates\Admin\None as Template;

class Main extends AbstractPage
{
    protected $pageTitle;
    protected $menuTitle;
    protected $capability = 'manage_options'; //Only Administrators can access this page
    protected $menuSlug = 'wpsr-dashboard';
    protected $function = [Template::class, 'output']; //which file to use to render the html
    protected $iconUrl = 'dashicons-universal-access-alt';
    protected $position = 9;
    protected $subpages = [
        Dashboard::class,
        Settings::class,
    ];

    protected function beforeRegister()
    {
        $this->pageTitle = __('WP Sign Up and Referrals', 'wpsr');
        $this->menuTitle = __('WP Sign Up and Referrals', 'wpsr');

        parent::beforeRegister();
    }
}