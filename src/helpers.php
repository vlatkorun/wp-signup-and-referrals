<?php

if (! function_exists('wpsr_with')) {
    function wpsr_with($object)
    {
        return $object;
    }
}

if(! function_exists('wpsr_path')) {
    function wpsr_path($path = '')
    {
        return !empty($path) ? WPSR_PLUGIN_DIR . $path : WPSR_PLUGIN_DIR;
    }
}

if(! function_exists('wpsr_asset')) {
    function wpsr_asset($path = '')
    {
        return !empty($path) ? WPSR_PLUGIN_URL . $path : WPSR_PLUGIN_URL;
    }
}