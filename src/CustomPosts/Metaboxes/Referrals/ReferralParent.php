<?php

namespace WPSR\CustomPosts\Metaboxes\Referrals;

use WPSR\CustomPosts\Metaboxes\AbstractMetabox;

class ReferralParent extends AbstractMetabox
{
    const NAME = 'wpsr_referral_parent';

    public function args()
    {
        return [
            [
                'id' => static::NAME,
                'title' => __('Referral Parent', 'wpsr'),
                'callback' => [$this, 'display'],
            ]
        ];
    }
}