<?php

namespace WPSR\CustomPosts;

abstract class AbstractCustomPost
{
    const NAME = '';

    protected $metaBoxes = [];
    protected $taxonomies = [];

    public function register()
    {
        register_post_type(static::NAME, $this->args());

        if($this->hasTaxonomies())
        {
            add_action('init', [$this, 'registerTaxonomies']);
        }

        if($this->hasMetaboxes())
        {
            add_action('add_meta_boxes_' . static::NAME, [$this, 'registerMetaBoxes']);
        }
    }

    public function registerTaxonomies()
    {
        foreach($this->taxonomies as $taxonomyClass)
        {
            $instance = new $taxonomyClass;
            register_taxonomy($taxonomyClass::NAME, static::NAME, $instance->args());
            register_taxonomy_for_object_type($taxonomyClass::NAME, static::NAME);
        }
    }

    public function registerMetaBoxes()
    {
        foreach($this->metaBoxes as $metaboxClass)
        {
            $instance = new $metaboxClass;
            add_meta_box(extract($instance->args()));
        }
    }

    public function hasMetaboxes(){
        return !empty($this->metaBoxes);
    }

    public function hasTaxonomies(){
        return !empty($this->taxonomies);
    }

    abstract protected function args();
}