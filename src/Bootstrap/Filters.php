<?php

namespace WPSR\Bootstrap;

class Filters extends AbstractBootstrapper
{
    protected $adminFilters = [
        
    ];

    protected $siteFilters = [

    ];

    protected $commonFilters = [

    ];

    public function init()
    {
        $filters = [];

        if(is_admin())
        {
            foreach($this->adminFilters as $class)
            {
                $filters[] = new $class;
            }
        }

        if(!is_admin())
        {
            foreach($this->siteFilters as $class)
            {
                $filters[] = new $class;
            }
        }

        foreach($this->commonFilters as $class)
        {
            $filters[] = new $class;
        }

        foreach($filters as $instance)
        {
            add_filter($instance->name(), [$instance, 'filter'], $instance->priority(), $instance->argumentsNumber());
        }
    }
}