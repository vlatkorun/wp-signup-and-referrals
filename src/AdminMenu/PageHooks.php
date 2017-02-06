<?php

namespace WPSR\AdminMenu;

class PageHooks
{
    static $hooks = [];

    public static function addHook($name)
    {
        if(!static::hasHook($name))
        {
            static::$hooks[] = $name;
        }
    }

    public static function getHooks()
    {
        return static::$hooks;
    }

    public static function hasHook($name)
    {
        $hookPresent = false;

        foreach(static::$hooks as $hook)
        {
            if($hook === $name)
            {
                $hookPresent = true;
                break;
            }
        }

        return $hookPresent;
    }
}