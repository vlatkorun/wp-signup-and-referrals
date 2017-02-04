<?php

namespace WPSR\CustomPosts\Metaboxes;

abstract class AbstractMetabox
{
    const NAME = '';

    public function display(){

    }

    abstract public function args();
}