<?php

namespace WPSR\Actions;

abstract class AbstractAction
{
    protected $name;
    protected $priority = 10;
    protected $argumentsNumber = 1;

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
        return $this->argumentsNumber;
    }

    abstract public function action();
}