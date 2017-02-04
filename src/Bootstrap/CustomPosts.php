<?php

namespace WPSR\Bootstrap;

use WPSR\CustomPosts\Referrals;

class CustomPosts extends AbstractBootstrapper
{
    protected $customPosts = [
        Referrals::class,
    ];

    public function init()
    {
        foreach($this->customPosts as $class)
        {
            add_action('init', [wpsr_with(new $class), 'register']);
        }
    }
}