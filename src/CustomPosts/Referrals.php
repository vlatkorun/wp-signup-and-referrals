<?php

namespace WPSR\CustomPosts;

use WPSR\CustomPosts\Metaboxes\Referrals\ReferralCode;
use WPSR\CustomPosts\Metaboxes\Referrals\ReferralParent;
use WPSR\CustomPosts\Metaboxes\Referrals\UserEmail;

class Referrals extends AbstractCustomPost
{
    const NAME = 'wpsr-referrals';

    protected $metaBoxes = [
        ReferralCode::class,
        ReferralParent::class,
        UserEmail::class,
    ];

    protected function args()
    {
        $labels = [
            'name' => __('Referrals', 'wpsr'),
            'singular_name' => __('Referral', 'wpsr'),
            'add_new' => __('Add New', 'wpsr'),
            'add_new_item' => __('Referrals Name', 'wpsr'),
            'edit_item' => __('Edit Referral', 'wpsr'),
            'new_item' => __('New Referral', 'wpsr'),
            'view_item' => __('View Referral','wpsr'),
            'search_items' => __('Search Referrals', 'wpsr'),
            'not_found' =>  __('Nothing found', 'wpsr'),
            'not_found_in_trash' => __('Nothing found in Trash', 'wpsr'),
            'parent_item_colon' => ''
        ];

        $args = [
            'labels' => $labels,
            'public' => false,
            'query_var' => false,
            'capability_type' => 'post',
            'supports' => ['title','author','custom-fields'],
            'rewrite' => false
        ];

        return $args;
    }
}