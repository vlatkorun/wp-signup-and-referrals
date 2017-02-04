<?php

namespace WPSR\CustomPosts\Metaboxes\Referrals;

use WPSR\CustomPosts\Metaboxes\AbstractMetabox;

class UserEmail extends AbstractMetabox
{
    const NAME = 'wpsr_referral_user_email';

    public function args()
    {
        return [
            [
                'id' =>  static::NAME,
                'title' => __('Referral User Email', 'wpsr'),
                'callback' => [$this, 'display'],
            ]
        ];
    }
}