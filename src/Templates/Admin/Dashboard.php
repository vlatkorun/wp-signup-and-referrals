<?php

namespace WPSR\Templates\Admin;

use WPSR\Helpers\Template;

class Dashboard extends Template
{
    protected $templateFile = 'admin.dashboard';

    protected function initData(array $data = [])
    {
        return $data;
    }
}