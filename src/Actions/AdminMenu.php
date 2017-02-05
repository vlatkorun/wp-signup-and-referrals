<?php

namespace WPSR\Actions;

use WPSR\AdminMenu\MenuPages;

class AdminMenu extends AbstractAction
{
    protected $name = 'admin_menu';
    protected $priority = 10;
    protected $argumentsNumber = 1;

    public function action()
    {
        $this->registerPages();
    }

    protected function registerPages()
    {
        wpsr_with(new MenuPages())->registerPages();
    }
}