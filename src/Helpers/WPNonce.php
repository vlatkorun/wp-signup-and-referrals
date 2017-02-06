<?php

namespace WPSR\Helpers;

class WPNonce
{
    const NONCE_NAME = 'wpsr_nonce';

    public static function create($name = '')
    {
        $name = $name ? $name : static::NONCE_NAME;
        return wp_create_nonce($name);
    }

    public static function verify($name = '')
    {
        $name = $name ? $name : static::NONCE_NAME;

        $nonce = null;

        if(!empty($_GET[$name]))
        {
            $nonce = $_GET[$name];
        }

        if(!empty($_POST[$name]) && is_null($nonce))
        {
            $nonce = $_POST[$name];
        }

        return wp_verify_nonce(strval($nonce), $name) !== false;
    }
}