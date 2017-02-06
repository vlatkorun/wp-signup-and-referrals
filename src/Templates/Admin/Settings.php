<?php

namespace WPSR\Templates\Admin;

use WPSR\Helpers\Template;

class Settings extends Template
{
    protected $templateFile = 'admin.settings';

    protected function initData(array $data = [])
    {
        $data['pages'] = get_pages();
        $data['roles'] = get_editable_roles();

        if(array_key_exists('administrator', $data['roles']))
        {
            unset($data['roles']['administrator']);
        }

        return $data;
    }
}