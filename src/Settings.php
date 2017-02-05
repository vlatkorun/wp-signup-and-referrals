<?php

namespace WPSR;

class Settings
{
    const CREATE_WP_USER_ON_SIGNUP_NAME = 'create_wp_user_on_signup';

    public function registerSettings()
    {
        register_setting('wpsr_settings', static::CREATE_WP_USER_ON_SIGNUP_NAME, 'intval');
    }
}