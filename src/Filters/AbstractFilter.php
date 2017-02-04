<?php

namespace WPSR\Filters;

abstract class AbstractFilter
{
    protected $name;
    protected $priority = 10;
    protected $accepted_args = 1;

    public function name()
    {
        return $this->name;
    }

    public function priority()
    {
        return $this->priority;
    }

    public function argumentsNumber()
    {
        return $this->accepted_args;
    }

    public function acceptedArgs()
    {
        return $this->accepted_args;
    }

    abstract public function handler();
}