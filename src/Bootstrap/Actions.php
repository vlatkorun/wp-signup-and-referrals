<?php

namespace WPSR\Bootstrap;

use WPSR\Actions\AdminInit;
use WPSR\Actions\AdminMenu;

class Actions extends AbstractBootstrapper
{
    protected $adminActions = [
        AdminInit::class,
        AdminMenu::class,
    ];

    protected $siteActions = [

    ];

    protected $commonActions = [

    ];

    public function init()
    {
        $actions = [];

        if(is_admin())
        {
            foreach($this->adminActions as $class)
            {
                $actions[] = new $class;
            }
        }

        if(!is_admin())
        {
            foreach($this->siteActions as $class)
            {
                $actions[] = new $class;
            }
        }

        foreach($this->commonActions as $class)
        {
            $actions[] = new $class;
        }

        foreach($actions as $instance)
        {
            add_action($instance->name(), [$instance, 'action'], $instance->priority(), $instance->argumentsNumber());
        }
    }
}